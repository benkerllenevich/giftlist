<x-sidebar-layout :list="$list">
    <div class="flex flex-col gap-6">
        <div class="flex justify-end gap-3">
            @if ($list->has_categories)
                <livewire:list.category.new-category-form :list="$list" />
            @endif

            <x-button>
                New Item
            </x-button>
        </div>

        <div>
            @if ($list->has_categories)
                <livewire:list.category.category-sections :list="$list">
            @else
                no categories
            @endif
        </div>
    </div>
</x-sidebar-layout>
