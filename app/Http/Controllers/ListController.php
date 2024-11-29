<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ListController extends Controller
{
    public function items(Request $request, string $id): View
    {
        $list = $request->user()->lists()->where('id', $id)->first(['id', 'name', 'has_categories']);
        if ($request->user()->cannot('manage', $list)) {
            abort(404);
        }

        return view('list.items.show', [
            'list' => $list
        ]);
    }

    public function categories(Request $request, string $id): View
    {
        $list = $request->user()->lists()->where('id', $id)->first(['id', 'name', 'has_categories']);
        if ($request->user()->cannot('manage', $list) || !$list->has_categories) {
            abort(404);
        }

        return view('list.categories.show', [
            'list' => $list
        ]);
    }

    public function settings(Request $request, string $id): View
    {
        $list = $request->user()->lists()->where('id', $id)->first(['id', 'name', 'visibility', 'has_categories']);
        if ($request->user()->cannot('manage', $list)) {
            abort(404);
        }

        return view('list.settings.show', [
            'list' => $list
        ]);
    }
}
