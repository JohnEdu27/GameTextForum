@extends('layouts.gaming')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Banner Card -->
    <div class="relative bg-gradient-to-r from-gaming-800 to-gaming-700 border border-gaming-700 rounded-2xl p-6 overflow-hidden shadow-xl">
        <div class="absolute -right-10 -bottom-10 opacity-10 pointer-events-none">
            <i class="fa-solid fa-gamepad text-9xl"></i>
        </div>
        <div class="relative z-10">
            <h1 class="font-gaming text-3xl font-bold tracking-wide text-white">Welcome back, Commander!</h1>
            <p class="text-gray-400 mt-1 text-sm max-w-xl">Your squad is currently online. Check out the latest tournaments and claim your weekly rewards.</p>
            <div class="mt-4 flex space-x-3">
                <button class="px-5 py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-medium text-sm rounded-lg shadow-lg shadow-blue-600/30 transition-all">
                    Resume Playing
                </button>
                <button class="px-5 py-2.5 bg-gaming-900/60 hover:bg-gaming-900 text-gray-300 border border-gaming-700 font-medium text-sm rounded-lg transition-all">
                    View Profile
                </button>
            </div>
        </div>
    </div>

    <!-- Content Grid Example -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-gaming-800/50 border border-gaming-700/60 rounded-xl p-5">
            <h3 class="font-gaming text-lg font-semibold text-white mb-3">Active Tournaments</h3>
            <p class="text-sm text-gray-400">No active matches found. Join a queue to start competing.</p>
        </div>
        <div class="bg-gaming-800/50 border border-gaming-700/60 rounded-xl p-5">
            <h3 class="font-gaming text-lg font-semibold text-white mb-3">Friends Online (4)</h3>
            <p class="text-sm text-gray-400">Your friends list will load here.</p>
        </div>
    </div>
</div>
@endsection