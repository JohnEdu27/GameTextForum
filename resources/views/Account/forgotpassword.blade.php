@extends('layouts.auth')
@section('title', 'Forgot Password')
@section('content')
    <h1 class="font-gaming text-2xl font-bold text-white text-center mb-2">Forgot password?</h1>
    <p class="text-sm text-zinc-400 text-center mb-6">Enter your account email and we'll send you a reset link.</p>
    @if (session('status'))
        <div class="mb-4 rounded-lg bg-green-900/30 border border-green-700 p-3 text-sm text-green-300">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-4 text-sm text-red-400">@foreach ($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-xs font-semibold uppercase tracking-wider text-zinc-400 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-3.5 py-2 text-sm text-zinc-200" placeholder="name@example.com">
        </div>
        <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-lg">Send reset link</button>
    </form>
    <p class="text-center text-sm text-zinc-400 mt-6"><a href="{{ route('login') }}" class="text-blue-400 hover:underline">Back to login</a></p>
@endsection
