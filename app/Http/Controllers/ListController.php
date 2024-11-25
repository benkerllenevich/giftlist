<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListController extends Controller
{
    public function index(Request $request): View
    {
        $lists = $request->user()->lists()->get(['name']);

        return view('dashboard', [
            'lists' => $lists
        ]);
    }
}
