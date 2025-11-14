<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Creative Digital Agency - Transforming Ideas Into Digital Experiences')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-purple-50 to-pink-50 min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass-effect">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold gradient-text">
                        <i class="fas fa-palette mr-2"></i>Creative
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-purple-600 px-3 py-2 rounded-lg text-sm font-medium transition duration-300 hover:bg-white/20">Home</a>
                        <a href="#about" class="text-gray-700 hover:text-purple-600 px-3 py-2 rounded-lg text-sm font-medium transition duration-300 hover:bg-white/20">About</a>
                        <a href="#services" class="text-gray-700 hover:text-purple-600 px-3 py-2 rounded-lg text-sm font-medium transition duration-300 hover:bg-white/20">Services</a>
                        <a href="#portfolio" class="text-gray-700 hover:text-purple-600 px-3 py-2 rounded-lg text-sm font-medium transition duration-300 hover:bg-white/20">Portfolio</a>
                        <a href="#contact" class="text-gray-700 hover:text-purple-600 px-3 py-2 rounded-lg text-sm font-medium transition duration-300 hover:bg-white/20">Contact</a>
                        <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-purple-700 hover:to-pink-700 transition duration-300 transform hover:scale-105">Admin Panel</a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-purple-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden hidden glass-effect">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-purple-600 block px-3 py-2 rounded-lg text-base font-medium">Home</a>
                <a href="#about" class="text-gray-700 hover:text-purple-600 block px-3 py-2 rounded-lg text-base font-medium">About</a>
                <a href="#services" class="text-gray-700 hover:text-purple-600 block px-3 py-2 rounded-lg text-base font-medium">Services</a>
                <a href="#portfolio" class="text-gray-700 hover:text-purple-600 block px-3 py-2 rounded-lg text-base font-medium">Portfolio</a>
                <a href="#contact" class="text-gray-700 hover:text-purple-600 block px-3 py-2 rounded-lg text-base font-medium">Contact</a>
                <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white block px-3 py-2 rounded-lg text-base font-medium">Admin Panel</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 via-purple-900 to-pink-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="space-y-4">
                    <h3 class="text-2xl font-bold gradient-text">Creative</h3>
                    <p class="text-gray-300">Transforming ideas into stunning digital experiences that captivate audiences and drive business growth.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white transition duration-300 transform hover:scale-110">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition duration-300 transform hover:scale-110">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition duration-300 transform hover:scale-110">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition duration-300 transform hover:scale-110">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="#about" class="text-gray-300 hover:text-white transition duration-300">About Us</a></li>
                        <li><a href="#services" class="text-gray-300 hover:text-white transition duration-300">Services</a></li>
                        <li><a href="#portfolio" class="text-gray-300 hover:text-white transition duration-300">Portfolio</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition duration-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">Brand Design</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">Web Development</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">Mobile Apps</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">Digital Marketing</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition duration-300">UI/UX Design</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold">Contact Info</h4>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-purple-400"></i>
                            <span class="text-gray-300">123 Creative Street, Design City, DC 12345</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-purple-400"></i>
                            <span class="text-gray-300">+1 (555) 123-4567</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-purple-400"></i>
                            <span class="text-gray-300">hello@creative.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-300">&copy; {{ date('Y') }} Creative Digital Agency. All rights reserved.</p>
                    <p class="text-gray-300 mt-2 md:mt-0">Made with ❤️ by LaraCopilot</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            // Mobile menu toggle
            $('#mobile-menu-button').click(function() {
                $('#mobile-menu').toggleClass('hidden');
            });

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

            // Add scroll effect to navbar
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    $('nav').addClass('bg-white/90');
                } else {
                    $('nav').removeClass('bg-white/90');
                }
            });

            // Add animation on scroll
            function animateOnScroll() {
                $('.animate-on-scroll').each(function() {
                    var elementTop = $(this).offset().top;
                    var elementBottom = elementTop + $(this).outerHeight();
                    var viewportTop = $(window).scrollTop();
                    var viewportBottom = viewportTop + $(window).height();
                    
                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $(this).addClass('animate-fadeInUp');
                    }
                });
            }

            $(window).scroll(animateOnScroll);
            animateOnScroll();
        });
    </script>
</body>
</html>