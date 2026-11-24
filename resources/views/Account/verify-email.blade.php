@extends('layouts.auth')
@section('title', 'Verify Email')
@section('content')
    <div class="text-center mb-6">
        <h1 class="font-gaming text-2xl font-bold text-white">Verify your email</h1>
        <p class="text-sm text-zinc-400 mt-2">We sent a verification link to <strong class="text-zinc-200">{{ auth()->user()->email }}</strong>. Open that email and click the link to activate your account.</p>
    </div>
    @if (session('status') === 'verification-link-sent')
        <div class="mb-4 rounded-lg bg-green-900/30 border border-green-700 p-3 text-sm text-green-300">A new verification link has been sent.</div>
    @elseif (session('status') === 'verification-required')
        <div class="mb-4 rounded-lg bg-amber-900/30 border border-amber-700 p-3 text-sm text-amber-300">Please verify your email before entering the forum.</div>
    @endif
    <form method="POST" action="{{ route('verification.send') }}" class="space-y-3">
        @csrf
        <button class="w-full py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg">Resend verification email</button>
    </form>
    <form method="POST" action="{{ route('logout') }}" class="mt-3 text-center">
        @csrf
        <button class="text-sm text-zinc-400 hover:text-white">Log out</button>
    </form>
@endsection
