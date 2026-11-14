@extends('layouts.auth')

@section('title', 'Register')

@section('content')
	<div class="text-center mb-6">
	    <div class="w-12 h-12 rounded-xl bg-zinc-900 border border-zinc-800 flex items-center justify-center text-blue-500 mx-auto mb-3 shadow-inner">
	        <i class="fa-solid fa-gamepad text-xl"></i>
	    </div>
	    <h1 class="font-gaming text-2xl font-bold uppercase tracking-wider text-white">
	        Game<span class="text-blue-500">Text</span> <span class="text-zinc-500 text-sm">Forum</span>
	    </h1>
	    <p class="text-xs text-zinc-400 mt-1">Join the community</p>
	</div>

    <!-- Your Register Form Here -->
    <form method="POST" action="/register" class="space-y-4">
        @csrf

        <div>
        <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1">Email</label>
        <input type="email" name="email" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="name@example.com">
        @error('email')
           	<p style="color:red"> {{ $message }}</p>
        @enderror
        </div>
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1">Username</label>
            <input type="text" name="name" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="ShadowRig">
             @error('name')
            	<p style="color:red"> {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1">Password</label>
            <input type="password" name="password" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="••••••••">
            @error('password')
            	<p style="color:red"> {{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200 focus:outline-none focus:border-blue-500 transition-colors" placeholder="••••••••">
        </div>
        <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg text-sm transition-colors shadow-lg shadow-blue-600/20">
            Sign Up
        </button>
    </form>
</div>
@endsection