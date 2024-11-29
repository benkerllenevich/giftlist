<?php

namespace App\Livewire\List;

use App\Models\Lists;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Locked;
use Livewire\Component;

class UseCategoriesForm extends Component
{
    #[Locked]
    public Lists $list;
    public bool $enabled;

    protected $listeners = [
        'toggled-category' => '$refresh',
    ];

    public function mount()
    {
        $this->enabled = $this->list->has_categories;
    }

    public function toggleCategories()
    {
        Gate::authorize('manage', $this->list);

        if ($this->enabled) {
            $this->enabled = false;
        } else {
            $this->enabled = true;
        }

        $this->list->has_categories = $this->enabled;
        $this->list->save();

        $this->dispatch('toggled-category');
    }

    public function render()
    {
        return view('list.settings.use-categories-form');
    }
}
