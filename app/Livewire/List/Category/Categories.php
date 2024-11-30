<?php

namespace App\Livewire\List\Category;

use App\Models\Lists;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Categories extends Component
{
    #[Locked]
    public Lists $list;
    public $categories;

    public function mount()
    {
        $this->categories = $this->list->categories()->get(['id', 'name']);
    }

    #[On('created-category')]
    #[On('updated-category')]
    #[On('deleted-category')]
    public function reload()
    {
        $this->categories = $this->list->categories()->get(['id', 'name']);
        $this->render();
    }

    public function render()
    {
        return view('list.items.category.categories');
    }
}
