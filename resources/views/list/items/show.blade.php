<x-sidebar-layout :list="$list">
    <div class="flex flex-col gap-6">
        <div class="flex justify-end gap-3">
            @if ($list->has_categories)
                <livewire:list.category.new-category-form :list="$list"/>
            @endif

            <livewire:list.items.new-item-form :list="$list"/>
        </div>

        <div>
            @if ($list->has_categories)
                <livewire:list.category.categories :list="$list">
                    @else
                        no categories
            @endif
        </div>
    </div>
</x-sidebar-layout>
