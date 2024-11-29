<x-sidebar-layout :list="$list">
    <livewire:list.update-list-information-form :list="$list"/>
    <x-section-border/>
    <livewire:list.use-categories-form :list="$list"/>
    <x-section-border/>
    <livewire:list.delete-list-form :list="$list"/>
</x-sidebar-layout>
