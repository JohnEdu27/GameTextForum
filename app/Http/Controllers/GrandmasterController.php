<?php

namespace App\Http\Controllers;

class GrandmasterController extends Controller
{
    public function index()
    {
        // The route is also protected by the role:grandmaster middleware.
        return view('layouts.grandmaster');
    }
}
