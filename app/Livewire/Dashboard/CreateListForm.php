<?php

namespace App\Livewire\Dashboard;

use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CreateListForm extends Component
{
    public bool $creatingList = false;

    public string $name = '';

    public function startCreatingList()
    {
        $this->resetErrorBag();

        $this->creatingList = true;
        $this->name = '';

        $this->dispatch('creating-list');
    }

    public function createList(Request $request)
    {
        $this->resetErrorBag();
        $this->name = trim($this->name);
        $this->validate(Lists::$validationRules);

        // check if list with name exists
        if (Lists::whereBelongsTo($request->user())->where('name', $this->name)->exists()) {
            throw ValidationException::withMessages([
                'name' => 'A list with this name already exists.'
            ]);
        }

        $list = new Lists();
        $list->name = $this->name;
        $request->user()->lists()->save($list);

        $this->redirectRoute('list.items', ['id' => $list->id]);
    }

    public function render()
    {
        return view('dashboard.create-list-form');
    }
}
