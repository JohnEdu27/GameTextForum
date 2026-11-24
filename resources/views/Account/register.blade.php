@extends('layouts.auth')
@section('title', 'Register')
@section('content')
    <div class="text-center mb-6">
        <div class="w-12 h-12 rounded-xl bg-zinc-900 border border-zinc-800 flex items-center justify-center text-blue-500 mx-auto mb-3 shadow-inner"><i class="fa-solid fa-gamepad text-xl"></i></div>
        <h1 class="font-gaming text-2xl font-bold uppercase tracking-wider text-white">Game<span class="text-blue-500">Text</span> <span class="text-zinc-500 text-sm">Forum</span></h1>
        <p class="text-xs text-zinc-400 mt-1">Join the community</p>
    </div>
    @if ($errors->any())
        <div class="mb-4 text-sm text-red-400">@foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
    @endif
    <form method="POST" action="{{ route('register.submit') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200" placeholder="name@example.com">
        </div>
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1">Username</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200" placeholder="ShadowRig">
        </div>
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1">Password</label>
            <input type="password" name="password" required autocomplete="new-password" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200" placeholder="At least 8 characters">
        </div>
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1">Confirm password</label>
            <input type="password" name="password_confirmation" required autocomplete="new-password" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200">
        </div>
        <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg">Sign Up</button>
    </form>
    <p class="text-center text-sm text-zinc-400 mt-6">Already registered? <a href="{{ route('login') }}" class="text-blue-400 hover:underline">Log in</a></p>
    <p class="text-center text-sm text-slate-400 mt-6">
            <a href="{{ url('/') }}" class="text-indigo-400 hover:underline">Back to homepage</a>
        </p>
@endsection
