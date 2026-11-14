<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'GameText Forum')</title>
    
    <!-- Tailwind CSS CDN + Class-based Dark Mode Config -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <!-- Prevent flash of wrong theme on page load -->
    <script>
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            document.documentElement.classList.add('dark');
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Rajdhani:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-gaming { font-family: 'Rajdhani', sans-serif; }
    </style>
</head>
<body class="bg-zinc-100 dark:bg-zinc-950 text-zinc-900 dark:text-zinc-200 antialiased min-h-screen flex flex-col transition-colors duration-200">

    <!-- Top Navigation Bar -->
    <header class="bg-white/95 dark:bg-zinc-900/95 border-b border-zinc-200 dark:border-zinc-800 sticky top-0 z-50 backdrop-blur transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">
            
            <!-- Brand -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2.5 shrink-0">
                <div class="w-9 h-9 rounded-lg bg-zinc-100 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-700 flex items-center justify-center text-blue-600 dark:text-blue-500 shadow-inner">
                    <i class="fa-solid fa-gamepad text-lg"></i>
                </div>
                <span class="font-gaming text-2xl font-bold tracking-wider uppercase text-zinc-900 dark:text-white">
                    Game<span class="text-blue-600 dark:text-blue-500">Text</span> <span class="text-zinc-400 dark:text-zinc-500 text-base">Forum</span>
                </span>
            </a>

            <!-- Right Actions -->
            <div class="flex items-center space-x-3">
                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white text-sm font-semibold rounded-lg flex items-center space-x-2 transition-colors">
                    <i class="fa-solid fa-plus text-xs"></i>
                    <span>New Thread</span>
                </button>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" 
                    class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white text-sm font-semibold rounded-lg transition shadow-md">
                    Log Out
                </button>
                 </form>
                <!-- Theme Toggle Button -->
                <button id="theme-toggle" type="button" title="Toggle Light/Dark Mode"
                        class="w-9 h-9 rounded-lg bg-zinc-100 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-700 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">
                    <!-- Sun Icon (shown in dark mode) -->
                    <i id="theme-toggle-light-icon" class="fa-solid fa-sun hidden dark:inline-block text-amber-400"></i>
                    <!-- Moon Icon (shown in light mode) -->
                    <i id="theme-toggle-dark-icon" class="fa-solid fa-moon inline-block dark:hidden text-zinc-700"></i>
                </button>

                <!-- Notifications -->
                <div class="w-9 h-9 rounded-lg bg-zinc-100 dark:bg-zinc-800 border border-zinc-300 dark:border-zinc-700 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white cursor-pointer transition-colors">
                    <i class="fa-regular fa-bell"></i>
                </div>
            </div>

        </div>
    </header>

    <!-- 3-Column Forum Container -->
    <div class="flex-1 max-w-7xl mx-auto w-full px-4 sm:px-6 py-6 grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Left Sidebar: Categories / Boards (3 cols) -->
        <aside class="hidden lg:block lg:col-span-3 space-y-6">
            <div class="