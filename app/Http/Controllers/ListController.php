<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListController extends Controller
{
    public function index(Request $request): View
    {
        $lists = $request->user()->lists()->get(['id', 'name']);

        return view('dashboard.index', [
            'lists' => $lists
        ]);
    }

    public function show(Request $request, String $id): View
    {
        $list = $request->user()->lists()->where('id', $id)->first(['id', 'name']);

        return view('dashboard.show', [
            'list' => $list
        ]);
    }
}
