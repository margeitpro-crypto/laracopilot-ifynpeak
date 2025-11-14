@extends('layouts.app')

@section('title', 'सर्भर त्रुटि - Nepal Result System')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 text-center">
        <div>
            <div class="mx-auto h-32 w-32 bg-gradient-to-r from-red-600 to-orange-600 rounded-full flex items-center justify-center mb-8">
                <svg class="h-16 w-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h1 class="text-6xl font-bold text-slate-800 mb-4">500</h1>
            <h2 class="text-2xl font-bold text-slate-700 mb-4">सर्भर त्रुटि</h2>
            <p class="text-slate-600 mb-8">
                माफ गर्नुहोस्, सर्भरमा केही समस्या भएको छ। कृपया केही समय पछि पुनः प्रयास गर्नुहोस्।
            </p>
        </div>
        
        <div class="space-y-4">
            <button onclick="location.reload()" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-lg text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
                पुनः लोड गर्नुहोस्
            </button>
            
            <a href="{{ route('home') }}" class="w-full flex justify-center py-3 px-4 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-colors">
                गृह पृष्ठमा जानुहोस्
            </a>
        </div>
        
        <div class="text-sm text-slate-500">
            <p>यदि समस्या निरन्तर रहन्छ भने, कृपया प्राविधिक सहायता टोलीलाई सम्पर्क गर्नुहोस्।</p>
            <p class="mt-2">इमेल: support@nepalresult.gov.np</p>
        </div>
    </div>
</div>
@endsection