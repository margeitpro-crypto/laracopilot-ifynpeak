<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nepal School Result Management System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Mukti:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Mukti', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
        .animate-float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen">
    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-800 via-indigo-800 to-purple-800 shadow-2xl sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="bg-white p-3 rounded-full shadow-lg">
                        <svg class="w-8 h-8 text-blue-800" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Nepal Result System</h1>
                        <p class="text-blue-200 text-sm">विद्यालय परीक्षा परिणाम व्यवस्थापन प्रणाली</p>
                    </div>
                </div>
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-white hover:text-blue-200 transition-all duration-300 font-medium">गृह पृष्ठ</a>
                    <a href="{{ route('about') }}" class="text-white hover:text-blue-200 transition-all duration-300 font-medium">हाम्रो बारे</a>
                    <a href="{{ route('schools') }}" class="text-white hover:text-blue-200 transition-all duration-300 font-medium">विद्यालयहरू</a>
                    <a href="{{ route('results') }}" class="text-white hover:text-blue-200 transition-all duration-300 font-medium">परिणामहरू</a>
                    <a href="{{ route('contact') }}" class="text-white hover:text-blue-200 transition-all duration-300 font-medium">सम्पर्क</a>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-4 py-2 rounded-lg hover:from-emerald-600 hover:to-teal-700 transition-all duration-300 font-medium shadow-lg">Admin</a>
                        <a href="{{ route('school.login') }}" class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-orange-600 hover:to-red-700 transition-all duration-300 font-medium shadow-lg">School</a>
                        <a href="{{ route('student.login') }}" class="bg-gradient-to-r from-purple-500 to-pink-600 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-pink-700 transition-all duration-300 font-medium shadow-lg">Student</a>
                    </div>
                </nav>
                <button class="md:hidden text-white" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="md:hidden bg-blue-900 px-6 py-4 hidden">
            <div class="flex flex-col space-y-4">
                <a href="{{ route('home') }}" class="text-white hover:text-blue-200 transition-colors">गृह पृष्ठ</a>
                <a href="{{ route('about') }}" class="text-white hover:text-blue-200 transition-colors">हाम्रो बारे</a>
                <a href="{{ route('schools') }}" class="text-white hover:text-blue-200 transition-colors">विद्यालयहरू</a>
                <a href="{{ route('results') }}" class="text-white hover:text-blue-200 transition-colors">परिणामहरू</a>
                <a href="{{ route('contact') }}" class="text-white hover:text-blue-200 transition-colors">सम्पर्क</a>
                <div class="flex flex-col space-y-2 pt-4 border-t border-blue-700">
                    <a href="{{ route('admin.login') }}" class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-center">Admin Panel</a>
                    <a href="{{ route('school.login') }}" class="bg-orange-600 text-white px-4 py-2 rounded-lg text-center">School Panel</a>
                    <a href="{{ route('student.login') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg text-center">Student Portal</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-slate-800 via-gray-800 to-slate-900 text-white mt-16">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 text-blue-300">सम्पर्क जानकारी</h3>
                    <div class="space-y-2 text-gray-300">
                        <p>शिक्षा मन्त्रालय, नेपाल सरकार</p>
                        <p>सिंहदरबार, काठमाडौं</p>
                        <p>फोन: +977-1-4200000</p>
                        <p>इमेल: info@nepalresult.gov.np</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 text-blue-300">द्रुत लिंकहरू</h3>
                    <div class="space-y-2">
                        <a href="{{ route('home') }}" class="block text-gray-300 hover:text-blue-300 transition-colors">गृह पृष्ठ</a>
                        <a href="{{ route('about') }}" class="block text-gray-300 hover:text-blue-300 transition-colors">हाम्रो बारे</a>
                        <a href="{{ route('schools') }}" class="block text-gray-300 hover:text-blue-300 transition-colors">विद्यालयहरू</a>
                        <a href="{{ route('results') }}" class="block text-gray-300 hover:text-blue-300 transition-colors">परिणामहरू</a>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 text-blue-300">सेवाहरू</h3>
                    <div class="space-y-2">
                        <a href="#" class="block text-gray-300 hover:text-blue-300 transition-colors">परिणाम खोज्नुहोस्</a>
                        <a href="#" class="block text-gray-300 hover:text-blue-300 transition-colors">विद्यालय दर्ता</a>
                        <a href="#" class="block text-gray-300 hover:text-blue-300 transition-colors">विद्यार्थी दर्ता</a>
                        <a href="#" class="block text-gray-300 hover:text-blue-300 transition-colors">सहायता केन्द्र</a>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 text-blue-300">सम्पर्क</h3>
                    <div class="space-y-2">
                        <a href="mailto:info@nepalresult.gov.np" class="block text-gray-300 hover:text-blue-300 transition-colors">इमेल पठाउनुहोस्</a>
                        <a href="tel:+977-1-4200000" class="block text-gray-300 hover:text-blue-300 transition-colors">फोन गर्नुहोस्</a>
                        <a href="#" class="block text-gray-300 hover:text-blue-300 transition-colors">प्राविधिक सहायता</a>
                        <a href="#" class="block text-gray-300 hover:text-blue-300 transition-colors">गुनासो दर्ता</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} Nepal School Result Management System. सर्वाधिकार सुरक्षित।</p>
                <p class="text-gray-400 mt-2 md:mt-0">Made with ❤️ by LaraCopilot</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if( target.length ) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });

        // Add scroll effect to header
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('header').addClass('bg-opacity-95 backdrop-blur-sm');
            } else {
                $('header').removeClass('bg-opacity-95 backdrop-blur-sm');
            }
        });
    </script>
</body>
</html>