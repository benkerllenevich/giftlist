<x-action-section>
    <x-slot name="title">
        {{ __('Categories') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Enable or disable the use of categories to sort items.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                {{ __('Categories are enabled.') }}
            @else
                {{ __('Categories are disabled.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('When categories are enabled, all items will fall under categories that you can create. Without categories, items will not be sorted.') }}
            </p>
        </div>

        <div class="flex items-center mt-5">
            <x-button wire:click="toggleCategories" wire:loading.attr="disabled">
                {{ $this->enabled ? __('Disable') : __('Enable') }}
            </x-button>

            <x-action-message class="ms-3" on="toggled-category">
                {{ __('Done.') }}
            </x-action-message>
        </div>
    </x-slot>
</x-action-section>
