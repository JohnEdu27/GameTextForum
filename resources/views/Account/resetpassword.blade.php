@extends('layouts.auth')
@section('title', 'Reset Password')
@section('content')
    <h1 class="font-gaming text-2xl font-bold text-white text-center mb-2">Reset password</h1>
    <p class="text-sm text-zinc-400 text-center mb-6">Choose a new password for your account.</p>
    @if ($errors->any())
        <div class="mb-4 text-sm text-red-400">@foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
    @endif
    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label class="block text-xs font-semibold uppercase text-zinc-400 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $email) }}" required class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200">
        </div>
        <div>
            <label class="block text-xs font-semibold uppercase text-zinc-400 mb-1">New password</label>
            <input type="password" name="password" required autocomplete="new-password" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200">
        </div>
        <div>
            <label class="block text-xs font-semibold uppercase text-zinc-400 mb-1">Confirm password</label>
            <input type="password" name="password_confirmation" required autocomplete="new-password" class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200">
        </div>
        <button class="w-full py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg">Update password</button>
    </form>
@endsection
