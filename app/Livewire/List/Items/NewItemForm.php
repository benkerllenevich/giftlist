<?php

namespace App\Livewire\List\Items;

use App\Models\Item;
use App\Models\Lists;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Locked;
use Livewire\Component;
use function PHPUnit\Framework\isNull;

class NewItemForm extends Component
{
    #[Locked]
    public Lists $list;

    public bool $creatingItem = false;
    public string $name = '';
    public string $url = '';
    public string $categoryId = '';
    public string $description = '';

    public function startCreatingItem()
    {
        $this->resetErrorBag();

        $this->creatingItem = true;
        $this->name = '';
        $this->url = '';
        $this->categoryId = '';
        $this->description = '';

        $this->dispatch('creating-item');
    }

    public function createItem()
    {
        Gate::authorize('manage', $this->list);

        $this->resetErrorBag();
        $this->name = trim($this->name);
        $this->validate(Item::$validationRules);

        $item = new Item();
        $item->name = $this->name;
        $item->url = $this->url;
        $item->description = $this->description;

        if ($this->list->has_categories && $this->categoryId != '') {
            $item->category_id = $this->categoryId;
        }
        /*
        if ($this->list->has_categories) {
            $category = $this->list->categories()->where('id', $this->categoryId)->first();
            $category->items()->save($item);
        } else {

        } */
        $this->list->items()->save($item);

        $this->creatingItem = false;
        $this->dispatch('created-item');
    }

    public function render()
    {
        return view('list.items.new-item-form');
    }
}
