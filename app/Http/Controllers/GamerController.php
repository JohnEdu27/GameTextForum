<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamerController extends Controller
{
    public function homepage()
    {
        return view('layouts.gaming');
    }

    public function saveSortPreference(Request $request)
    {
        $validated = $request->validate([
            'sort' => ['required', 'in:newest,oldest'],
        ]);

        $request->user()->update(['sort_preferences' => $validated['sort']]);

        return back()->with('success', 'Saved!');
    }
}
