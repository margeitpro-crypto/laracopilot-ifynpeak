<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Portal - Nepal Result System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Mukti:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Mukti', sans-serif; }
        .sidebar-transition { transition: all 0.3s ease; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1); }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 via-pink-50 to-indigo-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-gradient-to-b from-purple-800 via-pink-800 to-purple-800 text-white w-64 sidebar-transition shadow-2xl">
            <div class="p-6 border-b border-purple-700">
                <div class="flex items-center space-x-3">
                    <div class="bg-gradient-to-r from-purple-500 to-pink-600 p-2 rounded-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold">Student Portal</h2>
                        <p class="text-sm text-purple-200">विद्यार्थी पोर्टल</p>
                    </div>
                </div>
            </div>
            <nav class="mt-6">
                <div class="px-6 py-2">
                    <p class="text-xs font-semibold text-purple-300 uppercase tracking-wide">मुख्य मेनु</p>
                </div>
                <a href="{{ route('student.dashboard') }}" class="flex items-center px-6 py-3 text-purple-200 hover:bg-purple-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-purple-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                    ड्यासबोर्ड
                </a>
                <a href="{{ route('student.results') }}" class="flex items-center px-6 py-3 text-purple-200 hover:bg-purple-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-green-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    मेरो परिणाम
                </a>
                <a href="{{ route('student.subjects') }}" class="flex items-center px-6 py-3 text-purple-200 hover:bg-purple-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-blue-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    मेरा विषयहरू
                </a>
                <a href="{{ route('student.attendance') }}" class="flex items-center px-6 py-3 text-purple-200 hover:bg-purple-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-yellow-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                    उपस्थिति
                </a>
                <div class="px-6 py-2 mt-6">
                    <p class="text-xs font-semibold text-purple-300 uppercase tracking-wide">सेटिङ्गहरू</p>
                </div>
                <a href="{{ route('student.profile') }}" class="flex items-center px-6 py-3 text-purple-200 hover:bg-purple-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-pink-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                    </svg>
                    मेरो प्रोफाइल
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-lg border-b border-purple-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button onclick="toggleSidebar()" class="text-purple-600 hover:text-purple-800 lg:hidden">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-2xl font-bold text-purple-800">@yield('page-title', 'Student Dashboard')</h1>
                            <p class="text-sm text-purple-600">{{ session('student_user')['name'] ?? 'Student Name' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="bg-gradient-to-r from-purple-500 to-pink-600 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-pink-700 transition-all duration-300 shadow-lg">
                            वेबसाइटमा जानुहोस्
                        </a>
                        <div class="relative">
                            <button onclick="toggleUserMenu()" class="flex items-center space-x-2 bg-gradient-to-r from-purple-600 to-pink-700 text-white px-4 py-2 rounded-lg hover:from-purple-700 hover:to-pink-800 transition-all duration-300 shadow-lg">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ session('student_user')['symbol'] ?? 'Student' }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-purple-200 hidden z-50">
                                <div class="py-2">
                                    <div class="px-4 py-2 text-sm text-purple-600 border-b border-purple-200">
                                        {{ session('student_user')['class'] ?? 'Class' }}
                                    </div>
                                    <form action="{{ route('student.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                            लगआउट
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        function toggleUserMenu() {
            const menu = document.getElementById('user-menu');
            menu.classList.toggle('hidden');
        }

        // Close user menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('user-menu');
            const button = event.target.closest('button[onclick="toggleUserMenu()"]');
            if (!button && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        });

        // Add active state to current page
        $(document).ready(function() {
            const currentPath = window.location.pathname;
            $('nav a').each(function() {
                if ($(this).attr('href') === currentPath) {
                    $(this).addClass('bg-purple-700 text-white border-purple-400');
                    $(this).removeClass('text-purple-200');
                }
            });
        });
    </script>
</body>
</html>