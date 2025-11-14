<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login - Nepal Result System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Mukti:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Mukti', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-900 via-pink-900 to-indigo-900 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <div class="mx-auto h-20 w-20 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mb-6">
                <svg class="h-10 w-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">Student Portal</h2>
            <p class="text-purple-200">विद्यार्थी पोर्टल</p>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <form action="/student/login" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="symbol" class="block text-sm font-medium text-slate-700 mb-2">Symbol Number</label>
                    <input type="text" name="symbol" id="symbol" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors" placeholder="2081001">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-2">पासवर्ड</label>
                    <input type="password" name="password" id="password" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors" placeholder="••••••••">
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

                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-700 text-white py-3 px-4 rounded-lg font-semibold hover:from-purple-700 hover:to-pink-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-300 shadow-lg">
                    लगइन गर्नुहोस्
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-200">
                <h3 class="text-sm font-medium text-slate-700 mb-3">परीक्षणको लागि प्रयोग गर्नुहोस्:</h3>
                <div class="space-y-2 text-xs">
                    @foreach($credentials as $cred)
                    <div class="bg-slate-50 p-3 rounded-lg">
                        <p class="font-medium text-slate-800">{{ $cred['name'] }}</p>
                        <p class="text-slate-600">Symbol: {{ $cred['symbol'] }}</p>
                        <p class="text-slate-600">Password: {{ $cred['password'] }}</p>
                        <p class="text-slate-600">Class: {{ $cred['class'] }}</p>
                        <p class="text-slate-600">School: {{ $cred['school'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('home') }}" class="text-purple-200 hover:text-white transition-colors text-sm">
                ← वेबसाइटमा फर्कनुहोस्
            </a>
        </div>
    </div>
</body>
</html>