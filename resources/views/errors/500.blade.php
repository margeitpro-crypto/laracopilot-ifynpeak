<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error - Nepal Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .nepal-gradient { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #dc143c 100%); }
        .animate-float { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
        .animate-pulse-slow { animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
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
            <!-- 500 Icon -->
            <div class="mb-8">
                <div class="w-32 h-32 bg-gradient-to-r from-red-500 to-red-700 rounded-full mx-auto mb-6 flex items-center justify-center shadow-2xl animate-pulse-slow">
                    <i class="fas fa-server text-white text-6xl"></i>
                </div>
                <h1 class="text-8xl font-bold text-white mb-4 opacity-80">500</h1>
            </div>

            <!-- Error Message -->
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-white mb-4">Server Error</h2>
                <p class="text-xl text-blue-200 mb-6 leading-relaxed">
                    We're experiencing technical difficulties with our Nepal School Result Management System. 
                    Our technical team has been notified and is working to resolve this issue as quickly as possible.
                </p>
            </div>

            <!-- Status Information -->
            <div class="bg-white bg-opacity-10 rounded-2xl p-6 backdrop-blur-sm border border-white border-opacity-20 mb-8">
                <h3 class="text-white font-bold mb-4 text-xl">What's happening?</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-left">
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-cog text-yellow-400 text-xl mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold">System Maintenance</h4>
                            <p class="text-blue-200 text-sm">Routine maintenance in progress</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-shield-alt text-green-400 text-xl mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold">Data Security</h4>
                            <p class="text-blue-200 text-sm">Your data remains safe and secure</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-clock text-blue-400 text-xl mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold">Expected Resolution</h4>
                            <p class="text-blue-200 text-sm">Within 15-30 minutes</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-headset text-purple-400 text-xl mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold">Support Available</h4>
                            <p class="text-blue-200 text-sm">24/7 technical support</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <button onclick="window.location.reload()" class="bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                    <i class="fas fa-refresh mr-2"></i>Try Again
                </button>
                <a href="{{ route('home') }}" class="bg-white bg-opacity-20 border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-blue-900 transition-all duration-300 transform hover:scale-105 shadow-xl backdrop-blur-sm">
                    <i class="fas fa-home mr-2"></i>Back to Home
                </a>
            </div>

            <!-- Contact Support -->
            <div class="bg-white bg-opacity-10 rounded-2xl p-6 backdrop-blur-sm border border-white border-opacity-20">
                <h3 class="text-white font-bold mb-4 text-xl">Need Immediate Assistance?</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <a href="tel:+977-1-4444444" class="flex flex-col items-center text-white hover:text-blue-200 transition-colors duration-300 p-4 rounded-lg hover:bg-white hover:bg-opacity-10">
                        <i class="fas fa-phone text-2xl mb-2"></i>
                        <span class="font-semibold">Call Support</span>
                        <span class="text-sm text-blue-200">+977-1-4444444</span>
                    </a>
                    <a href="mailto:support@nepalresults.gov.np" class="flex flex-col items-center text-white hover:text-blue-200 transition-colors duration-300 p-4 rounded-lg hover:bg-white hover:bg-opacity-10">
                        <i class="fas fa-envelope text-2xl mb-2"></i>
                        <span class="font-semibold">Email Support</span>
                        <span class="text-sm text-blue-200">support@nepalresults.gov.np</span>
                    </a>
                    <a href="{{ route('contact') }}" class="flex flex-col items-center text-white hover:text-blue-200 transition-colors duration-300 p-4 rounded-lg hover:bg-white hover:bg-opacity-10">
                        <i class="fas fa-comments text-2xl mb-2"></i>
                        <span class="font-semibold">Live Chat</span>
                        <span class="text-sm text-blue-200">24/7 Available</span>
                    </a>
                </div>
            </div>

            <!-- Footer Note -->
            <div class="mt-8 text-center">
                <p class="text-blue-200 text-sm">
                    We apologize for the inconvenience. Our team is working around the clock to restore full service.
                </p>
                <p class="text-blue-300 text-xs mt-2">
                    Error ID: {{ uniqid() }} | Time: {{ date('Y-m-d H:i:s') }}
                </p>
            </div>
        </div>
    </div>

    <script>
        // Auto refresh every 30 seconds
        setTimeout(function() {
            window.location.reload();
        }, 30000);
    </script>
</body>
</html>