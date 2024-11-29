<?php

namespace App\Livewire\List;

use App\Enums\ListVisibility;
use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Locked;
use Livewire\Component;
use function Pest\Laravel\get;

class UpdateListInformationForm extends Component
{
    #[Locked]
    public Lists $list;

    public String $name;
    public ListVisibility $visibility;

    public function mount()
    {
        $this->name = $this->list->name;
        $this->visibility = $this->list->visibility;
    }

    public function updateListInformation(Request $request)
    {
        Gate::authorize('manage', $this->list);
        $this->resetErrorBag();
        $this->name = trim($this->name);
        $this->validate(Lists::$validationRules);

        if (Lists::whereBelongsTo($request->user())->where('name', $this->name)->exists() && $this->name !== $this->list->name) {
            throw ValidationException::withMessages([
                'name' => 'A list with this name already exists.'
            ]);
        }

        $this->list->name = $this->name;
        $this->list->visibility = $this->visibility;
        $this->list->save();

        $this->dispatch('list-info-saved', name: $this->name);
    }

    public function render()
    {
        return view('list.settings.update-list-information-form');
    }
}
