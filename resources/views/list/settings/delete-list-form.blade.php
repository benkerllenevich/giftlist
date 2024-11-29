<x-action-section>
    <x-slot name="title">
        {{ __('Delete List') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Permanently delete this list.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Once your list is deleted, all of its resources and data will be permanently deleted. Before deleting your list, please download any data or information that you wish to retain.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmListDeletion" wire:loading.attr="disabled">
                {{ __('Delete List') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingListDeletion">
            <x-slot name="title">
                {{ __('Delete List') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete your account? Once your list is deleted, all of its resources and data will be permanently deleted. Please enter this list\'s name to confirm you would like to permanently delete this list.') }}

                <div class="mt-4" x-data="{}"
                     x-on:confirming-delete-list.window="setTimeout(() => $refs.listName.focus(), 250)">
                    <x-input type="text" class="mt-1 block w-3/4"
                             placeholder="{{ $list->name }}"
                             x-ref="listName"
                             wire:model="listName"
                             wire:keydown.enter="deleteList"/>

                    <x-input-error for="listName" class="mt-2"/>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingListDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteList" wire:loading.attr="disabled">
                    {{ __('Delete List') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
