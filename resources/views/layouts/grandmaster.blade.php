@extends('layouts.auth')
@section('title', 'Grandmaster Dashboard')
@section('content')
    <div class="text-center">
        <h1 class="font-gaming text-2xl font-bold text-white">Grandmaster Dashboard</h1>
        <p class="text-zinc-400 mt-2">Welcome, {{ auth()->user()->name }}.</p>
        <p class="text-xs text-blue-400 uppercase tracking-wider mt-3">Role: {{ auth()->user()->role }}</p>
        <a href="{{ route('homepage') }}" class="inline-block mt-6 text-blue-400 hover:underline">Back to forum</a>
    </div>

