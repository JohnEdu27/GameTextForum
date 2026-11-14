<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamerController extends Controller
{
    public function homepage() {
        return view('layouts.gaming');
    }
}
