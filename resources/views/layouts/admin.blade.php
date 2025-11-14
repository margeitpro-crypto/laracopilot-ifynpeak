<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Creative Digital Agency')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .admin-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        .admin-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }
        .sidebar-link {
            transition: all 0.3s ease;
            position: relative;
        }
        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }
        .sidebar-link.active {
            background: rgba(255, 255, 255, 0.2);
            border-right: 3px solid white;
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            padding: 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-100 to-purple-100 min-h-screen">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 gradient-bg shadow-2xl">
            <div class="p-6">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-palette text-white text-2xl"></i>
                    <h1 class="text-white text-xl font-bold">Creative Admin</h1>
                </div>
            </div>
            
            <nav class="mt-6">
                <div class="px-4">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center space-x-3 text-white p-3 rounded-lg mb-2 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-chart-pie w-5"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.projects') }}" class="sidebar-link flex items-center space-x-3 text-white p-3 rounded-lg mb-2 {{ request()->routeIs('admin.projects') ? 'active' : '' }}">
                        <i class="fas fa-project-diagram w-5"></i>
                        <span>Projects</span>
                    </a>
                    <a href="{{ route('admin.clients') }}" class="sidebar-link flex items-center space-x-3 text-white p-3 rounded-lg mb-2 {{ request()->routeIs('admin.clients') ? 'active' : '' }}">
                        <i class="fas fa-users w-5"></i>
                        <span>Clients</span>
                    </a>
                    <a href="{{ route('admin.portfolio') }}" class="sidebar-link flex items-center space-x-3 text-white p-3 rounded-lg mb-2 {{ request()->routeIs('admin.portfolio') ? 'active' : '' }}">
                        <i class="fas fa-images w-5"></i>
                        <span>Portfolio</span>
                    </a>
                    <a href="{{ route('admin.team') }}" class="sidebar-link flex items-center space-x-3 text-white p-3 rounded-lg mb-2 {{ request()->routeIs('admin.team') ? 'active' : '' }}">
                        <i class="fas fa-user-friends w-5"></i>
                        <span>Team</span>
                    </a>
                    <a href="{{ route('admin.reports') }}" class="sidebar-link flex items-center space-x-3 text-white p-3 rounded-lg mb-2 {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar w-5"></i>
                        <span>Reports</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="sidebar-link flex items-center space-x-3 text-white p-3 rounded-lg mb-2 {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <i class="fas fa-cog w-5"></i>
                        <span>Settings</span>
                    </a>
                </div>
                
                <div class="px-4 mt-8">
                    <div class="border-t border-white/20 pt-4">
                        <a href="{{ route('home') }}" class="sidebar-link flex items-center space-x-3 text-white p-3 rounded-lg mb-2">
                            <i class="fas fa-arrow-left w-5"></i>
                            <span>Back to Website</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow-lg border-b border-gray-200">
                <div class="flex justify-between items-center px-6 py-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-gray-600">@yield('page-description', 'Welcome to your admin panel')</p>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                                <div class="w-8 h-8 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                                <span class="font-medium">{{ session('admin_user.name', 'Admin User') }}</span>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </button>
                            
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden" id="user-dropdown">
                                <div class="py-2">
                                    <div class="px-4 py-2 text-sm text-gray-600 border-b">
                                        {{ session('admin_user.email', 'admin@creative.com') }}
                                    </div>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile Settings</a>
                                    <form action="{{ route('admin.logout') }}" method="POST" class="block">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // User dropdown toggle
            $('button').click(function(e) {
                if ($(this).find('.fa-chevron-down').length) {
                    e.stopPropagation();
                    $('#user-dropdown').toggleClass('hidden');
                }
            });

            // Close dropdown when clicking outside
            $(document).click(function() {
                $('#user-dropdown').addClass('hidden');
            });

            // Sidebar link active state
            $('.sidebar-link').click(function() {
                $('.sidebar-link').removeClass('active');
                $(this).addClass('active');
            });

            // Add smooth transitions
            $('.admin-card, .sidebar-link').hover(function() {
                $(this).addClass('transform transition-all duration-300');
            });
        });
    </script>
</body>
</html>