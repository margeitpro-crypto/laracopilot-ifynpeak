@extends('layouts.app')

@section('title', 'Nepal School Result Management System')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-900 via-indigo-800 to-purple-900 text-white py-20">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <div class="lg:w-1/2 mb-10 lg:mb-0">
                <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Nepal School Result 
                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">Management System</span>
                </h1>
                <p class="text-xl text-blue-200 mb-8 leading-relaxed">
                    नेपालका सबै विद्यालयहरूको परीक्षा परिणाम व्यवस्थापनको लागि एकीकृत डिजिटल प्लेटफर्म। 
                    सरल, सुरक्षित र भरपर्दो परिणाम प्रकाशन प्रणाली।
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('results') }}" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-8 py-4 rounded-lg font-semibold hover:from-emerald-600 hover:to-teal-700 transition-all duration-300 shadow-lg transform hover:scale-105 text-center">
                        परिणाम खोज्नुहोस्
                    </a>
                    <a href="{{ route('schools') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-900 transition-all duration-300 text-center">
                        विद्यालयहरू हेर्नुहोस्
                    </a>
                </div>
            </div>
            <div class="lg:w-1/2 flex justify-center">
                <div class="relative animate-float">
                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-8 rounded-2xl shadow-2xl">
                        <svg class="w-64 h-64 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center card-hover bg-gradient-to-br from-blue-50 to-indigo-100 p-8 rounded-2xl shadow-lg">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-blue-800 mb-2">{{ number_format($data['total_schools']) }}</h3>
                <p class="text-blue-600 font-medium">दर्ता विद्यालयहरू</p>
            </div>
            <div class="text-center card-hover bg-gradient-to-br from-green-50 to-emerald-100 p-8 rounded-2xl shadow-lg">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-green-800 mb-2">{{ number_format($data['total_students']) }}</h3>
                <p class="text-green-600 font-medium">कुल विद्यार्थीहरू</p>
            </div>
            <div class="text-center card-hover bg-gradient-to-br from-purple-50 to-pink-100 p-8 rounded-2xl shadow-lg">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-purple-800 mb-2">{{ number_format($data['total_results']) }}</h3>
                <p class="text-purple-600 font-medium">प्रकाशित परिणामहरू</p>
            </div>
            <div class="text-center card-hover bg-gradient-to-br from-orange-50 to-red-100 p-8 rounded-2xl shadow-lg">
                <div class="bg-gradient-to-r from-orange-500 to-red-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-orange-800 mb-2">{{ $data['success_rate'] }}%</h3>
                <p class="text-orange-600 font-medium">सफलता दर</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-800 mb-4">हाम्रा विशेषताहरू</h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                आधुनिक प्रविधिको प्रयोग गरी बनाइएको यो प्रणालीले विद्यालय, विद्यार्थी र अभिभावकहरूलाई सहज र सुरक्षित सेवा प्रदान गर्छ।
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-xl card-hover border border-slate-100">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">सुरक्षित प्रणाली</h3>
                <p class="text-slate-600 leading-relaxed">
                    उच्च स्तरको सुरक्षा व्यवस्था र एन्क्रिप्सनको साथ विद्यार्थीहरूको व्यक्तिगत जानकारी र परिणामहरू सुरक्षित राखिन्छ।
                </p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-xl card-hover border border-slate-100">
                <div class="bg-gradient-to-r from-green-500 to-emerald-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">द्रुत परिणाम</h3>
                <p class="text-slate-600 leading-relaxed">
                    तत्काल परिणाम खोजी र प्रकाशन। विद्यार्थीहरूले आफ्ना परिणामहरू तुरुन्तै हेर्न र डाउनलोड गर्न सक्छन्।
                </p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-xl card-hover border border-slate-100">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">विस्तृत रिपोर्ट</h3>
                <p class="text-slate-600 leading-relaxed">
                    विद्यालय र जिल्लाका आधारमा विस्तृत प्रदर्शन रिपोर्ट र तथ्याङ्कहरू उपलब्ध छन्।
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Schools Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-800 mb-4">उत्कृष्ट विद्यालयहरू</h2>
            <p class="text-xl text-slate-600">उत्कृष्ट प्रदर्शन गर्ने विद्यालयहरूको सूची</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($data['featured_schools'] as $school)
            <div class="bg-gradient-to-br from-slate-50 to-blue-50 p-6 rounded-2xl shadow-lg card-hover border border-slate-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $school['grade'] }}
                    </div>
                    <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-2">{{ $school['name'] }}</h3>
                <p class="text-slate-600 mb-2">📍 {{ $school['location'] }}</p>
                <p class="text-slate-600">👥 {{ number_format($school['students']) }} विद्यार्थीहरू</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Recent Results Section -->
<section class="py-20 bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-slate-800 mb-4">हालका परिणामहरू</h2>
            <p class="text-xl text-slate-600">नवीनतम प्रकाशित परीक्षा परिणामहरू</p>
        </div>
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-slate-700 to-slate-800 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold">परीक्षा</th>
                            <th class="px-6 py-4 text-left font-semibold">मिति</th>
                            <th class="px-6 py-4 text-center font-semibold">स्थिति</th>
                            <th class="px-6 py-4 text-center font-semibold">सफलता दर</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200">
                        @foreach($data['recent_results'] as $result)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-slate-800">{{ $result['exam'] }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $result['date'] }}</td>
                            <td class="px-6 py-4 text-center">
                                @if($result['published'])
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">प्रकाशित</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-semibold">प्रतीक्षारत</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center font-semibold text-slate-800">{{ $result['pass_rate'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-800 via-indigo-800 to-purple-800 text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-6">आजै सुरु गर्नुहोस्</h2>
        <p class="text-xl text-blue-200 mb-8 max-w-2xl mx-auto">
            Nepal School Result Management System मा आफ्नो विद्यालय दर्ता गर्नुहोस् र डिजिटल शिक्षा प्रणालीको हिस्सा बन्नुहोस्।
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-8 py-4 rounded-lg font-semibold hover:from-emerald-600 hover:to-teal-700 transition-all duration-300 shadow-lg transform hover:scale-105">
                Admin Panel
            </a>
            <a href="{{ route('school.login') }}" class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-8 py-4 rounded-lg font-semibold hover:from-orange-600 hover:to-red-700 transition-all duration-300 shadow-lg transform hover:scale-105">
                School Login
            </a>
            <a href="{{ route('student.login') }}" class="bg-gradient-to-r from-purple-500 to-pink-600 text-white px-8 py-4 rounded-lg font-semibold hover:from-purple-600 hover:to-pink-700 transition-all duration-300 shadow-lg transform hover:scale-105">
                Student Portal
            </a>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    // Add smooth animations on scroll
    $(window).scroll(function() {
        $('.card-hover').each(function() {
            var elementTop = $(this).offset().top;
            var elementBottom = elementTop + $(this).outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();
            
            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $(this).addClass('animate-fadeInUp');
            }
        });
    });
});
</script>
@endsection