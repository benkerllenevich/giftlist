<x-sidebar-layout :list="$list">
    @livewire('list.update-list-information-form', ['list' => $list])
    <x-section-border />
</x-sidebar-layout>
