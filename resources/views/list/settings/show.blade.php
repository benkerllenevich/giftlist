<x-sidebar-layout :list="$list">
    <livewire:list.settings.update-list-information-form :list="$list"/>
    <x-section-border/>
    <livewire:list.settings.use-categories-form :list="$list"/>
    <x-section-border/>
    <livewire:list.settings.delete-list-form :list="$list"/>
</x-sidebar-layout>
