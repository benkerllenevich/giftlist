<?php

namespace App\Livewire\List\Items;

use App\Models\Category;
use App\Models\Lists;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class ItemsTable extends Component
{
    #[Locked]
    public Lists $list;
    #[Locked]
    public ?Category $category = null;
    public bool $uncategorized = false;
    public $items;

    public function newItems()
    {
        $model = $this->category ?? $this->list;
        if ($this->uncategorized) {
            $this->items = $model->items()->where('category_id', null)->get(['id', 'name', 'url', 'description']);
        } else {
            $this->items = $model->items()->get(['id', 'name', 'url', 'description']);
        }
    }

    #[On('created-item')]
    public function createdItem()
    {
        $this->newItems();
        $this->render();
    }

    public function mount()
    {
        $this->newItems();
    }

    public function render()
    {
        return view('list.items.items-table');
    }
}
