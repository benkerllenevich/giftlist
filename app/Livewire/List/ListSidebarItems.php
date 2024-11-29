<?php

namespace App\Livewire\List;

use App\Models\Lists;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ListSidebarItems extends Component
{
    #[Locked]
    public Lists $list;
    public string $routeName;

    protected $listeners = [
        'toggled-category' => '$refresh',
    ];

    public function mount()
    {
        $this->routeName = Route::currentRouteName();
    }

    public function render()
    {
        return view('list.list-sidebar-items');
    }
}
