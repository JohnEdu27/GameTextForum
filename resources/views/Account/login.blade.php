<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GameText Forum</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-slate-800 p-8 rounded-xl shadow-2xl border border-slate-700">
        <h2 class="text-3xl font-bold text-center text-indigo-400 mb-6">GameText Forum</h2>
        <p class="text-center text-slate-400 mb-6">Welcome back, gamer! Log in to your account.</p>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 bg-red-500/10 border border-red-500 text-red-400 p-3 rounded-lg text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                    class="w-full px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-slate-100">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1">Password</label>
                <input type="password" name="password" required 
                    class="w-full px-4 py-2 bg-slate-900 border border-slate-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-slate-100">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-slate-400">
                    <input type="checkbox" name="remember" class="rounded bg-slate-900 border-slate-700 text-indigo-600 focus:ring-indigo-500 mr-2">
                    Remember me
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                class="w-full py-3 bg-indigo-600 hover:bg-indigo-500 transition font-semibold rounded-lg shadow-lg text-white">
                Log In
            </button>
        </form>

        <p class="text-center text-sm text-slate-400 mt-6">
            Don't have an account? 
            <a href="{{ url('/register') }}" class="text-indigo-400 hover:underline">Sign up</a>
        </p>
    </div>

</body>
</html>