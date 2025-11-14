<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Login - Nepal Result System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Mukti:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Mukti', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-orange-900 via-red-900 to-pink-900 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center mb-6">
                <svg class="h-10 w-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">School Panel</h2>
            <p class="text-orange-200">विद्यालय व्यवस्थापन प्रणाली</p>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <form action="/school/login" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">विद्यालयको इमेल</label>
                    <input type="email" name="email" id="email" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors" placeholder="admin@school.edu.np">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-2">पासवर्ड</label>
                    <input type="password" name="password" id="password" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors" placeholder="••••••••">
                </div>

                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">{{ $errors->first() }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <button type="submit" class="w-full bg-gradient-to-r from-orange-600 to-red-700 text-white py-3 px-4 rounded-lg font-semibold hover:from-orange-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-all duration-300 shadow-lg">
                    लगइन गर्नुहोस्
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-200">
                <h3 class="text-sm font-medium text-slate-700 mb-3">परीक्षणको लागि प्रयोग गर्नुहोस्:</h3>
                <div class="space-y-2 text-xs">
                    @foreach($credentials as $cred)
                    <div class="bg-slate-50 p-3 rounded-lg">
                        <p class="font-medium text-slate-800">{{ $cred['name'] }}</p>
                        <p class="text-slate-600">Email: {{ $cred['email'] }}</p>
                        <p class="text-slate-600">Password: {{ $cred['password'] }}</p>
                        <p class="text-slate-600">Code: {{ $cred['code'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('home') }}" class="text-orange-200 hover:text-white transition-colors text-sm">
                ← वेबसाइटमा फर्कनुहोस्
            </a>
        </div>
    </div>
</body>
</html>