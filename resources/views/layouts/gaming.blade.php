<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameText Forum - Home</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col">

    <!-- Top Navigation Bar -->
    <header class="w-full px-8 py-4 bg-slate-800/70 backdrop-blur border-b border-slate-700/60 flex justify-between items-center shadow-md">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <a href="{{ url('/homepage') }}" class="flex items-center space-x-2">
                <span class="text-2xl font-black text-indigo-400 tracking-wider">GameText</span>
                <span class="text-xs uppercase bg-indigo-600/20 text-indigo-400 px-2 py-0.5 rounded font-semibold border border-indigo-500/30">Forum</span>
            </a>
        </div>

        <!-- User Info & Logout -->
        <div class="flex items-center space-x-4">
            <span class="text-sm text-slate-300">Welcome, <strong class="text-white">{{ Auth::user()->name }}</strong></span>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 text-xs font-semibold bg-slate-700 hover:bg-red-600/80 text-slate-200 hover:text-white rounded-lg transition">
                    Log Out
                </button>
            </form>
        </div>
    </header>

    <!-- Main Center Content Container -->
    <main class="flex-grow max-w-4xl w-full mx-auto px-4 py-8">
        
        <!-- Top Bar of Main Center Area: Date Sorter (Left) & New Post Button (Right) -->
        <div class="flex justify-between items-center mb-6 pb-4 border-b border-slate-800">
            
            <!-- Date Sorter Dropdown (Top-Left of Main Center) -->
            <form action="{{ route('saveSort') }}" method="POST" class="flex items-center space-x-3">
                @csrf
                <label for="date-sort" class="text-sm font-medium text-slate-400">Sort by:</label>
                <select id="date-sort" name="sort" onchange="this.form.submit();" 
                    class="bg-slate-800 border border-slate-700 text-slate-200 text-sm rounded-lg px-3.5 py-2 focus:outline-none focus:border-indigo-500 cursor-pointer">
                    <option value="newest" {{ Auth::user()->sort_preferences === 'newest' ? 'selected' : '' }}>Newest First</option>
                    <option value="oldest" {{ Auth::user()->sort_preferences === 'oldest' ? 'selected' : '' }}>Oldest First</option>
                </select>
            </form>

            <!-- Optional Action Button on the Right -->
            <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-semibold rounded-lg shadow transition">
                + New Post
            </button>
        </div>

        <!-- Forum Posts Feed Area -->
        <div id="posts-container" class="space-y-4">
            <!-- Example Post Card 1 -->
            <div class="post-card p-5 bg-slate-800/60 border border-slate-700/60 rounded-xl hover:border-slate-600 transition" data-date="2026-11-15">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-bold text-white">Best loadout tips for competitive matches?</h2>
                    <span class="text-xs text-slate-400">Nov 15, 2026</span>
                </div>
                <p class="text-sm text-slate-300 mb-3">
                    Looking for advice on optimizing economy rounds and utility usage in ranked games.
                </p>
                <div class="text-xs text-indigo-400 font-medium">Posted by {{ Auth::user()->name }}</div>
            </div>

            <!-- Example Post Card 2 -->
            <div class="post-card p-5 bg-slate-800/60 border border-slate-700/60 rounded-xl hover:border-slate-600 transition" data-date="2026-11-10">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-lg font-bold text-white">Welcome to GameText Forum!</h2>
                    <span class="text-xs text-slate-400">Nov 10, 2026</span>
                </div>
                <p class="text-sm text-slate-300 mb-3">
                    Introduce yourself and share what games you're currently grinding.
                </p>
                <div class="text-xs text-indigo-400 font-medium">Posted by Admin</div>
            </div>
        </div>

    </main>

    <!-- Simple JavaScript to make the Date Sorter work right away on the frontend -->
    <script>
        function sortPosts(order) {
            const container = document.getElementById('posts-container');
            const posts = Array.from(container.getElementsByClassName('post-card'));

            posts.sort((a, b) => {
                const dateA = new Date(a.getAttribute('data-date'));
                const dateB = new Date(b.getAttribute('data-date'));
                return order === 'oldest' ? dateA - dateB : dateB - dateA;
            });

            posts.forEach(post => container.appendChild(post));
        }
    </script>

</body>
</html>