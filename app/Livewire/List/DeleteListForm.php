<?php

namespace App\Livewire\List;

use App\Models\Lists;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Livewire\Component;

class DeleteListForm extends Component
{
    #[Locked]
    public Lists $list;

    public bool $confirmingListDeletion = false;
    public string $listName = '';

    public function confirmListDeletion()
    {
        $this->resetErrorBag();
        $this->listName = '';
        $this->dispatch('confirming-delete-list');
        $this->confirmingListDeletion = true;
    }

    public function deleteList()
    {
        $this->resetErrorBag();

        if (!$this->list->name === $this->listName) {
            throw ValidationException::withMessages([
                'listName' => "This list name is not correct.",
            ]);
        }

        $this->list->delete();
        $this->redirectRoute('home');
    }

    public function render()
    {
        return view('list.settings.delete-list-form');
    }
}
