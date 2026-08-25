<!DOCTYPE html>
<html lang="en" class="h-full bg-stone-50/50">
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
                        brand: {
                            50: '#fff7ed',
                            100: '#ffedd5',
                            200: '#fed7aa',
                            500: '#f97316',
                            600: '#ea580c',
                            700: '#c2410c',
                            800: '#9a3412',
                            900: '#7c2d12',
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
        @keyframes modalPop {
            0% { opacity: 0; transform: scale(0.95) translateY(10px); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }
        .animate-modal-pop {
            animation: modalPop 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</head>
<body class="bg-stone-50/50 text-stone-800 antialiased min-h-screen flex flex-col justify-between selection:bg-orange-600 selection:text-white">

    <!-- Top Accent Bar -->
    <div class="h-1 bg-gradient-to-r from-orange-500 via-amber-500 to-stone-900"></div>

    <!-- Header Navigation -->
    <header class="border-b border-stone-200 bg-white sticky top-0 z-30 shadow-xs">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <a href="{{ route('students.index') }}" class="flex items-center space-x-3 group">
                    <div class="w-9 h-9 rounded-xl bg-orange-600 text-white flex items-center justify-center shadow-sm group-hover:scale-105 group-hover:bg-orange-700 transition-all duration-200">
                        <i class="fa-solid fa-graduation-cap text-sm"></i>
                    </div>
                    <div>
                        <span class="font-bold text-sm tracking-tight text-stone-900 block leading-tight group-hover:text-orange-600 transition-colors">CCS Student Portal</span>
                        <span class="text-[11px] text-stone-500 font-medium leading-none">ITST 302 Registry</span>
                    </div>
                </a>
            </div>
            <nav class="flex items-center space-x-2 text-xs font-medium">
                <a href="{{ route('students.index') }}"
                   class="px-3.5 py-2 rounded-lg transition-all flex items-center space-x-1.5 {{ request()->routeIs('students.index') ? 'bg-orange-50 text-orange-700 font-bold' : 'text-stone-600 hover:text-stone-900 hover:bg-stone-50' }}">
                    <i class="fa-solid fa-users text-[11px]"></i>
                    <span>Directory</span>
                </a>
                <a href="{{ route('students.create') }}"
                   class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 active:scale-95 transition-all duration-150 font-bold shadow-xs hover:shadow flex items-center space-x-1.5">
                    <i class="fa-solid fa-user-plus text-[11px]"></i>
                    <span>Register Student</span>
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 py-8 flex-1 w-full animate-fade-in">
        <!-- Top Success Banner (Secondary feedback) -->
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

            <!-- Submission Success Modal Feedback -->
            <div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-stone-900/50 backdrop-blur-xs transition-opacity">
                <div class="bg-white rounded-2xl border border-stone-200 shadow-2xl max-w-md w-full p-6 text-center animate-modal-pop relative">
                    <!-- Close button -->
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-stone-400 hover:text-stone-700 text-sm p-1 rounded-lg transition-colors">
                        <i class="fa-solid fa-xmark"></i>
                    </button>

                    <!-- Icon -->
                    <div class="w-14 h-14 rounded-2xl bg-orange-50 border border-orange-100 text-orange-600 flex items-center justify-center mx-auto mb-4 text-2xl shadow-2xs">
                        <i class="fa-solid fa-check"></i>
                    </div>

                    <!-- Heading & Content -->
                    <h3 class="text-lg font-bold text-stone-900">Registration Complete</h3>
                    <p class="text-xs text-stone-600 mt-2 leading-relaxed">
                        {{ session('success') }} The student information and profile image have been securely recorded in the database.
                    </p>

                    <!-- Modal Actions -->
                    <div class="mt-6 flex flex-col sm:flex-row gap-2.5">
                        <button onclick="closeModal()" class="flex-1 px-4 py-2.5 bg-stone-900 text-white rounded-xl text-xs font-bold hover:bg-stone-800 transition-colors">
                            View Profile Details
                        </button>
                        <a href="{{ route('students.create') }}" class="flex-1 px-4 py-2.5 bg-orange-600 text-white rounded-xl text-xs font-bold hover:bg-orange-700 transition-colors flex items-center justify-center space-x-1">
                            <span>Register Another</span>
                        </a>
                    </div>
                </div>
            </div>

            <script>
                function closeModal() {
                    const modal = document.getElementById('successModal');
                    if (modal) {
                        modal.classList.add('opacity-0', 'pointer-events-none');
                        setTimeout(() => modal.remove(), 200);
                    }
                }
                // Close modal if user clicks on backdrop outside the card
                document.getElementById('successModal')?.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeModal();
                    }
                });
            </script>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-stone-200 bg-white py-6 mt-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between text-xs text-stone-500 gap-2">
            <div class="flex items-center space-x-2">
                <span class="font-medium text-stone-700">ITST 302 Client-Server Technologies</span>
                <span>&bull;</span>
                <span>Week 4 Laboratory Activity</span>
            </div>
            <div>Mini Project 03: Student Registration System (CCS)</div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
