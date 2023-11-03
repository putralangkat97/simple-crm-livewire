<div class="flex flex-col">
    {{ json_encode($checkbox) }}
    <div class="flex justify-between items-center mb-3">
        <div class="flex items-center">
            <div class="mr-4">
                <label for="number" class="inline text-sm font-medium">Per page</label>
                <select id="number"
                    class="py-2 px-3 pr-9 w-20 border-gray-300 text-sm focus:border-blue-500 focus:ring-blue-500"
                    wire:model.live="perPage">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="mr-4">
                <div class="relative" x-data="{ activeMenu: false }">
                    <button id="" type="button"
                        class="py-2 px-3 inline-flex justify-center items-center gap-2 border border-gray-300 font-medium bg-white text-gray-700 shadow-sm hover:bg-gray-50 focus:border-blue-500 focus:ring-blue-500 transition-all text-sm"
                        x-on:click="activeMenu = !activeMenu">
                        Bulk Action
                        <svg class="w-2.5 h-2.5 text-gray-600" width="16" height="16" viewBox="0 0 16 16"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                    <div class="absolute transition-[opacity,margin] duration-[0.1ms] w-72 z-10 mt-2 bg-white shadow"
                        x-show="activeMenu" x-on:click.outside="activeMenu = false" x-transition:leave.duration.200ms
                        x-transition:enter.duration.200ms>
                        <button
                            class="w-full flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                            wire:click="delete">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
            @if (count($checkbox) > 0)
                <div class="">
                    <span>{{ count($checkbox) > 0 ? count($checkbox) . ' ' : '' }}Item{{ count($checkbox) > 1 ? '(s)' : '' }}
                        selected</span>
                </div>
            @endif
        </div>
        <div class="flex items-end">
            @if ($search)
                <button class="hover:underline mr-3 text-gray-700 hover:text-gray-800"
                    wire:click="resetSearch">reset</button>
            @endif
            <div class="relative">
                <input type="text" id="search" wire:model.live.debounce.500ms="search"
                    class="py-2 px-4 pr-11 w-full border-gray-300 placeholder:text-gray-400 block w-full text-sm focus:z-10 focus:border-zinc-900 focus:ring-zinc-900 shadow-sm"
                    placeholder="Search customer..." autocomplete="off">
                <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-4">
                    <div class="animate-spin inline-block w-4 h-4 border border-current border-t-transparent text-gray-500 rounded-full"
                        role="status" wire:loading>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="relative border shadow-sm overflow-hidden">
                <div class="absolute top-1/2 left-1/2 animate-bounce inline-block text-gray-900" wire:loading
                    wire:target="search">
                    <span class="">Loading...</span>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 pl-4">
                                <div class="flex items-center h-5">
                                    <input type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-200 text-zinc-900 focus:ring-zinc-900"
                                        id="checkbox-1">
                                    <label for="checkbox-1" class="sr-only">Checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Full Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Country
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200" wire:loading.class="opacity-25" wire:target="search">
                        @foreach ($customers as $customer)
                            <tr>
                                <td class="py-2 pl-4">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" value="{{ $customer->id }}"
                                            class="shrink-0 mt-0.5 border-gray-200 text-zinc-900 focus:ring-zinc-900"
                                            wire:model.live="checkbox">
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-800">
                                    <div class="flex flex-col">
                                        <span class="font-medium">{{ $customer->full_name }}</span>
                                        <span class="text-xs text-gray-600">{{ $customer->phone }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800">
                                    {{ $customer->email }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800">{{ $customer->country }}
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium">
                                    <a class="text-blue-500 hover:text-blue-700" href="#">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-4">
        {{ $customers->links() }}
    </div>
</div>
