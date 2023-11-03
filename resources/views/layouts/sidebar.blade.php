<aside class="lg:fixed lg:flex flex-col lg:flex-row lg:h-screen w-full lg:w-80 bg-zinc-900 z-50 lg:z-0 lg:overflow-y-auto">
    <div x-on:click.away="open = false" class="flex flex-col w-full text-white flex-shrink-0 border-b lg:border-0"
        x-data="{ open: false }">
        <div
            class="flex-shrink-0 px-8 lg:px-2 text-left pt-4 pb-4 lg:pt-8 lg:pb-4 flex flex-row lg:flex-col gap-4 items-center justify-between">
            <x-application-logo class="w-14 h-14 lg:w-20 lg:h-20 inline -mt-1 mr-3 fill-white" />
            <a href="{{ route('dashboard') }}"
                class="hidden lg:block text-sm text-center lg:text-lg font-medium tracking-widest uppercase text-white focus:outline-none focus:shadow-outline">
                {{ config('app.name', 'Admin Dashboard') }}
            </a>
            <button class=" lg:hidden focus:outline-none focus:shadow-outline text-white" x-on:click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{ 'block': open, 'hidden': !open }"
            class="flex-grow items-left lg:block px-3 pb-0 lg:pb-8">
            <div class="ml-1 text-gray-500 text-sm mt-4 mb-2">Menu</div>
            <div class="space-y-3 mb-4">
                <a href="{{ route('dashboard') }}"
                    class="flex flex-row items-center hover:bg-blue-200 hover:text-zinc-900 mt-3 lg:mt-0 px-4 py-2 transition-colors duration-300 {{ request()->routeIs('dashboard') ? 'text-zinc-900 bg-blue-200' : 'text-white' }}" wire:navigate.hover>
                    <span class="font-semibold">Dashboard</span>
                </a>
                <a href="{{ route('customer.all') }}"
                    class="flex flex-row items-center hover:bg-blue-200 hover:text-zinc-900 mt-3 lg:mt-0 px-4 py-2 transition-colors duration-300 {{ request()->routeIs('customer.*') ? 'text-zinc-900 bg-blue-200' : 'text-white' }}" wire:navigate.hover>
                    <span class="font-semibold">Customer</span>
                </a>
            </div>
            <div class="lg:hidden flex-grow mt-6 lg:mt-0">
                <span class="text-white text-sm">{{ Auth::user()->name }}</span>
                <div class="flex flex-row items-center text-white hover:text-white mt-2">
                    <a href="{{ route('profile.edit') }}"
                        class="flex flex-row items-center hover:bg-blue-200 hover:text-zinc-900 mt-3 lg:mt-0 px-4 py-2 transition-colors duration-300 text-white font-semibold w-full {{ request()->routeIs('profile.*') ? 'text-zinc-900 bg-blue-200' : 'text-white' }}" wire:navigate.hover>
                        <span>Profile</span>
                    </a>
                </div>
                <div class="flex flex-row items-center mb-3 text-white hover:text-white">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <a href="#"
                            class="flex flex-row items-center mb-3 hover:bg-blue-200 hover:text-zinc-900 mt-3 lg:mt-0 px-4 py-2 transition-colors duration-300 text-white font-semibold"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                            <span>Logout</span>
                        </a>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</aside>
