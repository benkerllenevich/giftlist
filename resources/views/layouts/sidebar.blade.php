<x-app-layout>
    <x-slot name="header">
        @livewire('list.list-name', ['defaultName' => $list->name])
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="py-6 flex text-sm items-center gap-1 text-indigo-700">
            <a href="{{ route('home') }}" class="flex items-center ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>

                <span>Back</span>
            </a>
        </div>
        <div class="w-full flex flex-col lg:flex-row gap-12">
            <div class="h-min overflow-hidden lg:max-w-xs w-full bg-white border border-gray-200 rounded-md flex flex-col divide-solid divide-y divide-gray-100">
                <x-sidebar-nav-button :href="route('list.items', ['id' => $list->id])" :active="request()->routeIs('list.items')">
                    Items
                </x-sidebar-nav-button>

                <x-sidebar-nav-button :href="route('list.settings', ['id' => $list->id])" :active="request()->routeIs('list.settings')">
                    Settings
                </x-sidebar-nav-button>
            </div>

            <div>
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>
