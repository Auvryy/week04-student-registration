<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration System') - ITST 302</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Geist+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Geist', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        .font-mono {
            font-family: 'Geist Mono', monospace;
        }
    </style>
</head>
<body class="bg-[#f8f9fa] text-[#1a1a1a] antialiased min-h-screen flex flex-col justify-between selection:bg-[#111] selection:text-white">

    <!-- Header Navigation -->
    <header class="border-b border-[#e5e7eb] bg-white sticky top-0 z-30">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <a href="{{ route('students.index') }}" class="flex items-center space-x-2">
                    <span class="w-3 h-3 bg-[#111] rounded-sm inline-block"></span>
                    <span class="font-semibold text-sm tracking-tight text-[#111]">Student Registry</span>
                    <span class="text-xs text-[#6b7280] font-mono">/ ITST 302</span>
                </a>
            </div>
            <nav class="flex items-center space-x-4 text-xs font-medium">
                <a href="{{ route('students.index') }}" class="px-3 py-1.5 rounded text-[#4b5563] hover:text-[#111] hover:bg-[#f3f4f6] transition-colors">Directory</a>
                <a href="{{ route('students.create') }}" class="px-3.5 py-1.5 bg-[#111] text-white rounded hover:bg-[#27272a] transition-colors font-medium">Register Student</a>
            </nav>
        </div>
    </header>

    <!-- Notification Area -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 py-8 flex-1 w-full">
        @if(session('success'))
            <div class="mb-6 p-4 border border-[#bbf7d0] bg-[#f0fdf4] text-[#166534] rounded text-sm flex items-center justify-between">
                <div>
                    <span class="font-semibold">Notice:</span> {{ session('success') }}
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 border border-[#fecaca] bg-[#fef2f2] text-[#991b1b] rounded text-sm">
                <p class="font-semibold mb-1">There were errors with your submission:</p>
                <ul class="list-disc list-inside text-xs space-y-0.5 text-[#b91c1c]">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-[#e5e7eb] bg-white py-6">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between text-xs text-[#6b7280] gap-2">
            <div>ITST 302 Client-Server Technologies, Week 4 Activity</div>
            <div>Mini Project 03, Student Registration System</div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
