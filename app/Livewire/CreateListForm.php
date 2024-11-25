<?php

namespace App\Livewire;

use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateListForm extends Component
{
    public bool $creatingList = false;

    #[Validate('required|min:5|max:100')]
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
        $this->validate();

        // check if list with name exists
        if (Lists::whereBelongsTo($request->user())->where('name', $this->name)->exists()) {
            throw ValidationException::withMessages([
                'name' => 'A list with this name already exists.'
            ]);
        }

        $list = new Lists();
        $list->name = $this->name;
        $request->user()->lists()->save($list);

        $this->redirectRoute('list', ['id' => $list->id]);
    }

    public function render()
    {
        return view('dashboard.create-list-form');
    }
}
