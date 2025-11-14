<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Creative Digital Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
    </div>

    <div class="w-full max-w-md relative">
        <!-- Login Form -->
        <div class="glass-effect rounded-2xl p-8 shadow-2xl">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-palette text-purple-600 text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Admin Login</h1>
                <p class="text-white/80">Access your admin dashboard</p>
            </div>

            @if(session('error'))
                <div class="bg-red-500/20 border border-red-500/50 text-red-100 px-4 py-3 rounded-lg mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <form action="/admin/login" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-white/80 text-sm font-medium mb-2">Email Address</label>
                    <input type="email" name="email" required 
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition duration-200">
                </div>

                <div>
                    <label class="block text-white/80 text-sm font-medium mb-2">Password</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition duration-200">
                </div>

                <button type="submit" 
                        class="w-full bg-white text-purple-600 py-3 rounded-lg font-semibold hover:bg-white/90 transform hover:scale-105 transition duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Sign In
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-white/80 hover:text-white text-sm transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Website
                </a>
            </div>
        </div>

        <!-- Demo Credentials -->
        <div class="glass-effect rounded-2xl p-6 mt-6 shadow-2xl">
            <h3 class="text-white font-semibold mb-4 text-center">
                <i class="fas fa-key mr-2"></i>Demo Credentials
            </h3>
            <div class="space-y-3 text-sm">
                @foreach($credentials as $cred)
                <div class="bg-white/10 rounded-lg p-3 border border-white/20">
                    <div class="text-white/90 font-medium">{{ $cred['role'] }}</div>
                    <div class="text-white/70">Email: {{ $cred['email'] }}</div>
                    <div class="text-white/70">Password: {{ $cred['password'] }}</div>
                </div>
                @endforeach
            </div>
            <p class="text-white/60 text-xs text-center mt-4">Click on any credential above to copy</p>
        </div>
    </div>

    <script>
        // Auto-fill credentials on click
        document.querySelectorAll('.bg-white\\/10').forEach(card => {
            card.addEventListener('click', function() {
                const email = this.querySelector('div:nth-child(2)').textContent.replace('Email: ', '');
                const password = this.querySelector('div:nth-child(3)').textContent.replace('Password: ', '');
                
                document.querySelector('input[name="email"]').value = email;
                document.querySelector('input[name="password"]').value = password;
                
                // Visual feedback
                this.style.background = 'rgba(255, 255, 255, 0.2)';
                setTimeout(() => {
                    this.style.background = 'rgba(255, 255, 255, 0.1)';
                }, 200);
            });
        });
    </script>
</body>
</html>