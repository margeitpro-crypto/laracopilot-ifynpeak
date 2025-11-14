<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'School Panel - Nepal Result System')</title>
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
<body class="bg-gradient-to-br from-orange-50 via-red-50 to-pink-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-gradient-to-b from-orange-800 via-red-800 to-orange-800 text-white w-64 sidebar-transition shadow-2xl">
            <div class="p-6 border-b border-orange-700">
                <div class="flex items-center space-x-3">
                    <div class="bg-gradient-to-r from-orange-500 to-red-600 p-2 rounded-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold">School Panel</h2>
                        <p class="text-sm text-orange-200">विद्यालय प्यानल</p>
                    </div>
                </div>
            </div>
            <nav class="mt-6">
                <div class="px-6 py-2">
                    <p class="text-xs font-semibold text-orange-300 uppercase tracking-wide">मुख्य मेनु</p>
                </div>
                <a href="{{ route('school.dashboard') }}" class="flex items-center px-6 py-3 text-orange-200 hover:bg-orange-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-orange-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                    ड्यासबोर्ड
                </a>
                <a href="{{ route('school.students') }}" class="flex items-center px-6 py-3 text-orange-200 hover:bg-orange-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-purple-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                    </svg>
                    विद्यार्थीहरू
                </a>
                <a href="{{ route('school.results') }}" class="flex items-center px-6 py-3 text-orange-200 hover:bg-orange-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-green-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    परिणामहरू
                </a>
                <a href="{{ route('school.subjects') }}" class="flex items-center px-6 py-3 text-orange-200 hover:bg-orange-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-blue-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    विषयहरू
                </a>
                <a href="{{ route('school.classes') }}" class="flex items-center px-6 py-3 text-orange-200 hover:bg-orange-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-indigo-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 0a1 1 0 100 2h.01a1 1 0 100-2H9zm2 0a1 1 0 100 2h.01a1 1 0 100-2H11z" clip-rule="evenodd"/>
                    </svg>
                    कक्षाहरू
                </a>
                <a href="{{ route('school.teachers') }}" class="flex items-center px-6 py-3 text-orange-200 hover:bg-orange-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-yellow-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                    </svg>
                    शिक्षकहरू
                </a>
                <div class="px-6 py-2 mt-6">
                    <p class="text-xs font-semibold text-orange-300 uppercase tracking-wide">रिपोर्टहरू</p>
                </div>
                <a href="{{ route('school.reports') }}" class="flex items-center px-6 py-3 text-orange-200 hover:bg-orange-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-pink-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                    रिपोर्टहरू
                </a>
                <div class="px-6 py-2 mt-6">
                    <p class="text-xs font-semibold text-orange-300 uppercase tracking-wide">सेटिङ्गहरू</p>
                </div>
                <a href="{{ route('school.profile') }}" class="flex items-center px-6 py-3 text-orange-200 hover:bg-orange-700 hover:text-white transition-all duration-200 border-l-4 border-transparent hover:border-teal-400">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                    </svg>
                    प्रोफाइल
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-lg border-b border-orange-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <button onclick="toggleSidebar()" class="text-orange-600 hover:text-orange-800 lg:hidden">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <div>
                            <h1 class="text-2xl font-bold text-orange-800">@yield('page-title', 'School Dashboard')</h1>
                            <p class="text-sm text-orange-600">{{ session('school_user')['name'] ?? 'School Name' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-orange-600 hover:to-red-700 transition-all duration-300 shadow-lg">
                            वेबसाइटमा जानुहोस्
                        </a>
                        <div class="relative">
                            <button onclick="toggleUserMenu()" class="flex items-center space-x-2 bg-gradient-to-r from-orange-600 to-red-700 text-white px-4 py-2 rounded-lg hover:from-orange-700 hover:to-red-800 transition-all duration-300 shadow-lg">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ session('school_user')['name'] ?? 'School' }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-orange-200 hidden z-50">
                                <div class="py-2">
                                    <div class="px-4 py-2 text-sm text-orange-600 border-b border-orange-200">
                                        {{ session('school_user')['code'] ?? 'School Code' }}
                                    </div>
                                    <form action="{{ route('school.logout') }}" method="POST">
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
                    $(this).addClass('bg-orange-700 text-white border-orange-400');
                    $(this).removeClass('text-orange-200');
                }
            });
        });
    </script>
</body>
</html>