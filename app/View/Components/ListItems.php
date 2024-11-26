<?php

namespace App\View\Components;

use App\Models\Lists;
use Illuminate\View\Component;
use Illuminate\View\View;

class ListItems extends Component
{
    public Lists $list;

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('list.items');
    }
}
