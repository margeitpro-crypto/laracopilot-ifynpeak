<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - Nepal Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .nepal-gradient { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #dc143c 100%); }
        .animate-float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
    </style>
</head>
<body class="nepal-gradient min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-20 w-32 h-32 bg-white opacity-10 rounded-full animate-float"></div>
        <div class="absolute top-40 right-32 w-24 h-24 bg-white opacity-10 rounded-full animate-float" style="animation-delay: -2s;"></div>
        <div class="absolute bottom-32 left-40 w-20 h-20 bg-white opacity-10 rounded-full animate-float" style="animation-delay: -4s;"></div>
        <div class="absolute bottom-20 right-20 w-28 h-28 bg-white opacity-10 rounded-full animate-float" style="animation-delay: -1s;"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-2xl mx-auto text-center">
            <!-- 404 Icon -->
            <div class="mb-8">
                <div class="w-32 h-32 bg-gradient-to-r from-orange-500 to-red-600 rounded-full mx-auto mb-6 flex items-center justify-center shadow-2xl animate-pulse">
                    <i class="fas fa-exclamation-triangle text-white text-6xl"></i>
                </div>
                <h1 class="text-8xl font-bold text-white mb-4 opacity-80">404</h1>
            </div>

            <!-- Error Message -->
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-white mb-4">Page Not Found</h2>
                <p class="text-xl text-blue-200 mb-6 leading-relaxed">
                    The page you're looking for doesn't exist in our Nepal School Result Management System. 
                    It might have been moved, deleted, or you entered the wrong URL.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="{{ route('home') }}" class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-orange-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                    <i class="fas fa-home mr-2"></i>Back to Home
                </a>
                <a href="{{ route('results') }}" class="bg-white bg-opacity-20 border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-blue-900 transition-all duration-300 transform hover:scale-105 shadow-xl backdrop-blur-sm">
                    <i class="fas fa-search mr-2"></i>Search Results
                </a>
            </div>

            <!-- Quick Links -->
            <div class="bg-white bg-opacity-10 rounded-2xl p-6 backdrop-blur-sm border border-white border-opacity-20">
                <h3 class="text-white font-bold mb-4 text-xl">Quick Links</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <a href="{{ route('schools') }}" class="flex items-center text-white hover:text-blue-200 transition-colors duration-300 p-3 rounded-lg hover:bg-white hover:bg-opacity-10">
                        <i class="fas fa-school mr-3 text-xl"></i>
                        <span>Browse Schools</span>
                    </a>
                    <a href="{{ route('about') }}" class="flex items-center text-white hover:text-blue-200 transition-colors duration-300 p-3 rounded-lg hover:bg-white hover:bg-opacity-10">
                        <i class="fas fa-info-circle mr-3 text-xl"></i>
                        <span>About System</span>
                    </a>
                    <a href="{{ route('contact') }}" class="flex items-center text-white hover:text-blue-200 transition-colors duration-300 p-3 rounded-lg hover:bg-white hover:bg-opacity-10">
                        <i class="fas fa-envelope mr-3 text-xl"></i>
                        <span>Contact Support</span>
                    </a>
                    <a href="{{ route('admin.login') }}" class="flex items-center text-white hover:text-blue-200 transition-colors duration-300 p-3 rounded-lg hover:bg-white hover:bg-opacity-10">
                        <i class="fas fa-user-shield mr-3 text-xl"></i>
                        <span>Admin Login</span>
                    </a>
                </div>
            </div>

            <!-- Footer Note -->
            <div class="mt-8 text-center">
                <p class="text-blue-200 text-sm">
                    Need help? Contact our support team at 
                    <a href="mailto:info@nepalresults.gov.np" class="text-yellow-300 hover:text-yellow-200 transition-colors">info@nepalresults.gov.np</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>