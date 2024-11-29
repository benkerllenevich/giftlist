<?php

namespace App\Livewire\List;

use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class ListName extends Component
{
    #[Locked]
    public string $defaultName;

    public string $name;

    public function mount(string $defaultName)
    {
        $this->defaultName = $defaultName;
        $this->name = $defaultName;
    }

    #[On('list-info-saved')]
    public function updateName(string $name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('list.list-name');
    }
}
