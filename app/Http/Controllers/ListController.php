<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListController extends Controller
{
    public function items(Request $request, String $id): View
    {
        $list = $request->user()->lists()->where('id', $id)->first(['id', 'name']);

        return view('list.items', [
            'list' => $list
        ]);
    }

    public function settings(Request $request, String $id): View
    {
        $list = $request->user()->lists()->where('id', $id)->first(['id', 'name']);

        return view('list.items', [
            'list' => $list
        ]);
    }
}
