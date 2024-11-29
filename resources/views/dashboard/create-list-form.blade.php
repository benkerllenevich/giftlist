<div>
    <button wire:click="startCreatingList" wire:loading.attr="disabled"
            class="bg-white border border-gray-200 w-48 h-56 rounded-lg flex flex-col gap-2.5 items-center justify-center hover:bg-gray-50 hover:border-gray-300 hover:text-gray-500 transition ease-in-out duration-150">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=".5" stroke="currentColor"
             class="size-20 text-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
        </svg>


        <span class="font-medium text-black">
            Create list...
        </span>
    </button>

    <x-dialog-modal wire:model.live="creatingList">
        <x-slot name="title">
            {{ __('Create New List') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Please enter the name of the list you would like to create.') }}

            <div class="mt-4" x-data="{}" x-on:creating-list.window="setTimeout(() => $refs.name.focus(), 250)">
                <x-input type="text" class="mt-1 block w-3/4"
                         placeholder="{{ __('Name') }}"
                         x-ref="name"
                         wire:model="name"
                         wire:keydown.enter="createList"/>

                <x-input-error for="name" class="mt-2"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('creatingList')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3"
                      wire:click="createList"
                      wire:loading.attr="disabled">
                {{ __('Create List') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>
