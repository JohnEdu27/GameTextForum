<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class GamerController extends Controller
{
    public function homepage() {
        return view('layouts.gaming');
    }

    public function saveSortPreference(Request $request)
{
    $request->validate([
        'sort' => 'required|in:newest,oldest',
    ]);

    $user = Auth::user();
    $user->sort_preferences = $request->sort;
    $user->save();

    return redirect()->back();
}


    public function index()
    {
        $user = Auth::user();
        
        // Fall back to 'newest' if it's currently null
        $sortOrder = $user->sort_preferences ?? 'newest';

        $posts = Post::with('user')
                     ->orderBy('created_at', $sortOrder === 'oldest' ? 'asc' : 'desc')
                     ->get();

        return view('homepage', compact('posts'));
    }

}



