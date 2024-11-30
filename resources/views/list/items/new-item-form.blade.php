<div>
    <x-button wire:click="startCreatingItem" wire:loading.attr="disabled">
        New Item
    </x-button>

    <x-dialog-modal wire:model.live="creatingItem">
        <x-slot name="title">
            {{ __('Create New Item') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4" x-on:creating-item.window="setTimeout(() => $refs.name.focus(), 250)">
                <x-label for="name">Name</x-label>
                <x-input id="name" type="text" class="mt-1 block w-3/4"
                         placeholder="{{ __('Name') }}"
                         wire:model="name"
                         wire:keydown.enter="createItem"/>
                <x-input-error for="name" class="mt-2"/>
            </div>

            @if ($list->has_categories)
                <div class="mt-4">
                    <x-label for="category">Category</x-label>
                    <x-select id="category" class="mt-1 block w-3/4" wire:model="categoryId">
                        @foreach($list->categories()->get(['id', 'name']) as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
            @endif

            <div class="mt-4">
                <x-label for="url">URL</x-label>
                <x-input id="url" type="text" class="mt-1 block w-3/4"
                         placeholder="{{ __('URL') }}"
                         wire:model="url"
                         wire:keydown.enter="createItem"/>
                <x-input-error for="url" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-label for="description">Description</x-label>
                <textarea id="description" class="resize-y min-h-20 mt-1 block w-3/4 border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md"
                         wire:model="url"
                         wire:keydown.enter="createItem">
                </textarea>
                <x-input-error for="description" class="mt-2"/>
            </div>


        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('creatingItem')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3"
                      wire:click="createItem"
                      wire:loading.attr="disabled">
                {{ __('Create Item') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
