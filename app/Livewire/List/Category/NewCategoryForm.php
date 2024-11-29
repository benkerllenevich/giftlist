<?php

namespace App\Livewire\List\Category;

use App\Models\Category;
use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Livewire\Component;

class NewCategoryForm extends Component
{
    #[Locked]
    public Lists $list;

    public bool $creatingCategory = false;
    public string $name = '';

    public function startCreatingCategory()
    {
        $this->resetErrorBag();

        $this->creatingCategory = true;
        $this->name = '';

        $this->dispatch('creating-category');
    }

    public function createCategory(Request $request)
    {
        Gate::authorize('manage', $this->list);

        $this->resetErrorBag();
        $this->name = trim($this->name);
        $this->validate(Category::$validationRules);

        // check if category with name exists
        if (Category::whereBelongsTo($this->list)->where('name', $this->name)->exists()) {
            throw ValidationException::withMessages([
                'name' => 'A category with this name already exists.'
            ]);
        }

        $category = new Category();
        $category->name = $this->name;
        $this->list->categories()->save($category);

        $this->creatingCategory = false;
        $this->dispatch('created-category');
    }

    public function render()
    {
        return view('list.items.category.new-category-form');
    }
}
