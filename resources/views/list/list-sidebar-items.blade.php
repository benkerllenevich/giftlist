<div class="h-min overflow-hidden lg:max-w-xs w-full bg-white border border-gray-200 rounded-md flex flex-col divide-solid divide-y divide-gray-100">
    <x-sidebar-nav-button :href="route('list.items', ['id' => $list->id])"
                          :active="$routeName == 'list.items'">
        Items
    </x-sidebar-nav-button>

    @if ($list->has_categories)
        <x-sidebar-nav-button :href="route('list.categories', ['id' => $list->id])"
                              :active="$routeName == 'list.categories'">
            Categories
        </x-sidebar-nav-button>
    @endif

    <x-sidebar-nav-button :href="route('list.settings', ['id' => $list->id])"
                          :active="$routeName == 'list.settings'">
        Settings
    </x-sidebar-nav-button>
</div>
