<x-app-layout>
    <x-slot name="listName">
        {{ $list->name }}
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-12">
        <div class="overflow-hidden lg:max-w-xs w-full bg-white border border-gray-200 rounded-md flex flex-col divide-solid divide-y divide-gray-100">
            <x-sidebar-nav-button :href="route('list', ['id' => $list->id])" :active="request()->routeIs('list')">
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
</x-app-layout>
