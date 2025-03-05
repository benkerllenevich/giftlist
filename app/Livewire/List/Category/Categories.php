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

    public function loadCategories()
    {
        $this->categories = $this->list->categories()->get(['id', 'name']);
        if ($this->list->items()->where('category_id', null)->count() > 0) {
            $this->hasUncategorized = true;
        }
    }

    public function mount()
    {
        $this->loadCategories();
    }

    #[On('created-category')]
    #[On('updated-category')]
    #[On('deleted-category')]
    #[On('created-item')]
    public function reload()
    {
        $this->loadCategories();
        $this->render();
    }

    public function render()
    {
        return view('list.items.category.categories');
    }
}
