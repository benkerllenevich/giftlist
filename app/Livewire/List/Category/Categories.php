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
    public bool $hasUncategorized = false;

    public function mount()
    {
        $this->categories = $this->list->categories()->get(['id', 'name']);
        if ($this->list->items()->where('category_id', null)->count() > 0) {
            $this->hasUncategorized = true;
        }
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
