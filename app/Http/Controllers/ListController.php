<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ListController extends Controller
{
    public function items(Request $request, String $id): View
    {
        $list = $request->user()->lists()->where('id', $id)->first(['id', 'name']);
        if ($request->user()->cannot('manage', $list)) {
            abort(404);
        }

        return view('list.items', [
            'list' => $list
        ]);
    }

    public function settings(Request $request, String $id): View
    {
        $list = $request->user()->lists()->where('id', $id)->first(['id', 'name', 'visibility', 'has_categories']);
        if ($request->user()->cannot('manage', $list)) {
            abort(404);
        }

        return view('list.settings', [
            'list' => $list
        ]);
    }
}
