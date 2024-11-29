<x-form-section submit="updateListInformation">
    <x-slot name="title">
        {{ __('List Profile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your list\'s name, visibility, and other profile information.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}"/>
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name" required/>
            <x-input-error for="name" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="visibility" value="{{ __('Visibility') }}"/>
            <x-select id="visibility" class="mt-1 block w-full" wire:model="visibility">
                @foreach(\App\Enums\ListVisibility::cases() as $status)
                    <option value="{{ $status->value }}" {!! $visibility == $status ? "selected" : "" !!}>
                        {{ $status->name() }}
                    </option>
                @endforeach
            </x-select>
            <!-- todo: add verification -->
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="list-info-saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
