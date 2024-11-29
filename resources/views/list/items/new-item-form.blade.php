<div>
    <x-button wire:click="startCreatingItem" wire:loading.attr="disabled">
        New Item
    </x-button>

    <x-dialog-modal wire:model.live="creatingItem">
        <x-slot name="title">
            {{ __('Create New Item') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Please enter the name of the item you would like to create.') }}

            <div class="mt-4" x-data="{}" x-on:creating-category.window="setTimeout(() => $refs.name.focus(), 250)">
                <x-input type="text" class="mt-1 block w-3/4"
                         placeholder="{{ __('Name') }}"
                         x-ref="name"
                         wire:model="name"
                         wire:keydown.enter="createCategory"/>

                <x-input-error for="name" class="mt-2"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('creatingCategory')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3"
                      wire:click="createCategory"
                      wire:loading.attr="disabled">
                {{ __('Create Category') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
