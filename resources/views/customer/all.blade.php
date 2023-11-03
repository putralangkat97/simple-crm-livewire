<x-app-layout>
    <x-slot name="pageTitle">
        <h2 class="font-semibold text-xl text-zinc-900 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="p-2">
        @livewire('customer.customer-list')
    </div>
</x-app-layout>
