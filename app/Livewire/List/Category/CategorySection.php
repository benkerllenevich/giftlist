<?php

namespace App\Livewire\List\Category;

use App\Models\Category;
use App\Models\Lists;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class CategorySection extends Component
{
    #[Locked]
    public Lists $list;

    #[Locked]
    public ?Category $category = null;

    public bool $settingsOpen = false;
    public $settingsState = [];


    public bool $deletingOpen = false;
    public $deletingState = [];

    public bool $expanded = false;


    public function openSettings()
    {
        $this->resetErrorBag();
        $this->settingsOpen = true;
        $this->settingsState = [
            'name' => $this->category->name,
        ];
    }

    public function saveSettings()
    {
        Gate::authorize('manage', $this->category->lists);
        $this->resetErrorBag();

        Validator::make($this->settingsState, Category::$validationRules)->validate();
        if (Category::whereBelongsTo($this->category->lists)->where('name', $this->settingsState['name'])->exists() && $this->category->name !== $this->settingsState['name']) {
            throw ValidationException::withMessages([
                'name' => 'A category with this name already exists.'
            ]);
        }

        $this->category->name = $this->settingsState['name'];
        $this->category->save();

        $this->settingsOpen = false;
        $this->dispatch('updated-category');
    }

    public function openDeleting()
    {
        $this->resetErrorBag();
        $this->deletingOpen = true;
        $this->settingsOpen = false;
        $this->deletingState = [
            'name' => '',
            'deleteItems' => false
        ];
    }

    public function deleteCategory()
    {
        Gate::authorize('manage', $this->category->lists);
        $this->resetErrorBag();

        if (!$this->category->name === $this->deletingState['name']) {
            throw ValidationException::withMessages([
                'categoryName' => "This category name is not correct.",
            ]);
        }

        if ($this->deletingState['deleteItems']) {
            $this->category->items()->delete();
        }

        $this->category->delete();
        $this->dispatch('deleted-category');
    }

    public function toggleExpand()
    {
        if ($this->expanded) {
            $this->expanded = false;
        } else {
            if (is_null($this->category)) {
                $this->dispatch('close-all', id: '');
            } else {
                $this->dispatch('close-all', id: $this->category->id);
            }
            $this->expanded = true;
        }
    }

    #[On('close-all')]
    public function closeAll(string $id)
    {
        $categoryId = is_null($this->category) ? '' : $this->category->id;
        if ($categoryId !== $id) {
            $this->expanded = false;
        }
    }

    public function render()
    {
        return view('list.items.category.category-section');
    }
}
