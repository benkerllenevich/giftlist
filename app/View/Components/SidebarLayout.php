<?php

namespace App\View\Components;

use App\Models\Lists;
use Illuminate\View\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;

class SidebarLayout extends Component
{
    public Lists $list;

    public function __construct(Lists $list)
    {
        $this->list = $list;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.sidebar');
    }
}
