<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameText Forum - Welcome</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col">

    <!-- Header Navigation -->
    <header class="w-full px-8 py-6 bg-slate-800/50 backdrop-blur border-b border-slate-700/60 flex justify-between items-center shadow-lg">
        <!-- Logo Side -->
        <div class="flex items-center space-x-2">
            <span class="text-2xl font-black text-indigo-400 tracking-wider">GameText</span>
            <span class="text-xs uppercase bg-indigo-600/20 text-indigo-400 px-2 py-0.5 rounded font-semibold border border-indigo-500/30">Forum</span>
        </div>

        <!-- Choices Side (Login / Sign Up) -->
        <div class="flex items-center space-x-4">
            <a href="{{ route('loginPage') }}" class="px-4 py-2 text-sm font-semibold text-slate-300 hover:text-indigo-400 transition">
                Log In
            </a>
        </div>
    </header>

    <!-- Main Hero Section -->
    <main class="flex-grow flex items-center justify-center px-4">
        <div class="max-w-3xl text-center space-y-6">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white tracking-tight">
                Level up your talk with <span class="text-indigo-400">GameText Forum</span>
            </h1>
            <p class="text-lg text-slate-400 max-w-xl mx-auto">
                Join the ultimate community for gaming discussions, guides, strategies, and reviews. Dive in and share your passion with players worldwide.
            </p>
            <div class="pt-4 flex justify-center space-x-4">
                <a href="{{ route('registerPage') }}" class="px-8 py-3.5 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl shadow-xl transition transform hover:-translate-y-0.5">
                    Sign up
                </a>
            </div>
        </div>
    </main>



</body>
</html>