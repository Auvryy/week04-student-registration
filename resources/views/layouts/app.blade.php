<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration System') - ITST 302</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col justify-between selection:bg-indigo-600 selection:text-white">

    <!-- Header Navigation -->
    <header class="border-b border-slate-200 bg-white sticky top-0 z-30 shadow-xs">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <a href="{{ route('students.index') }}" class="flex items-center space-x-3 group">
                    <div class="w-9 h-9 rounded-xl bg-indigo-600 text-white flex items-center justify-center shadow-sm group-hover:scale-105 group-hover:bg-indigo-700 transition-all duration-200">
                        <i class="fa-solid fa-graduation-cap text-sm"></i>
                    </div>
                    <div>
                        <span class="font-bold text-sm tracking-tight text-slate-900 block leading-tight group-hover:text-indigo-600 transition-colors">CIT Student Portal</span>
                        <span class="text-[11px] text-slate-500 font-medium leading-none">ITST 302 Registry</span>
                    </div>
                </a>
            </div>
            <nav class="flex items-center space-x-2 text-xs font-medium">
                <a href="{{ route('students.index') }}"
                   class="px-3.5 py-2 rounded-lg transition-all flex items-center space-x-1.5 {{ request()->routeIs('students.index') ? 'bg-slate-100 text-indigo-700 font-bold' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                    <i class="fa-solid fa-users text-[11px]"></i>
                    <span>Directory</span>
                </a>
                <a href="{{ route('students.create') }}"
                   class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 active:scale-95 transition-all duration-150 font-bold shadow-xs hover:shadow flex items-center space-x-1.5">
                    <i class="fa-solid fa-user-plus text-[11px]"></i>
                    <span>Register Student</span>
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 py-8 flex-1 w-full animate-fade-in">
        <!-- Flash Success Notification -->
        @if(session('success'))
            <div id="flash-banner" class="mb-6 p-4 border border-emerald-200 bg-emerald-50 text-emerald-900 rounded-xl text-sm flex items-center justify-between shadow-xs transition-all">
                <div class="flex items-center space-x-3">
                    <div class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center flex-shrink-0">
                        <i class="fa-solid fa-circle-check text-sm"></i>
                    </div>
                    <div>
                        <p class="font-bold text-emerald-950 text-xs sm:text-sm">Success</p>
                        <p class="text-xs text-emerald-800">{{ session('success') }}</p>
                    </div>
                </div>
                <button onclick="document.getElementById('flash-banner').remove()" class="text-emerald-600 hover:text-emerald-900 text-xs px-2 py-1 rounded">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-200 bg-white py-6 mt-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-2">
            <div class="flex items-center space-x-2">
                <span class="font-medium text-slate-700">ITST 302 Client-Server Technologies</span>
                <span>&bull;</span>
                <span>Week 4 Laboratory Activity</span>
            </div>
            <div>Mini Project 03: Student Registration System</div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
