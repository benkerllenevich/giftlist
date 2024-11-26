<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function lists(Request $request): View
    {
        $lists = $request->user()->lists()->get(['id', 'name']);

        return view('dashboard.show', [
            'lists' => $lists
        ]);
    }
}
