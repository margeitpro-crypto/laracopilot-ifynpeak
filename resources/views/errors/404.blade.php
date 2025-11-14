@extends('layouts.app')

@section('title', 'पृष्ठ फेला परेन - Nepal Result System')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 text-center">
        <div>
            <div class="mx-auto h-32 w-32 bg-gradient-to-r from-red-500 to-pink-600 rounded-full flex items-center justify-center mb-8">
                <svg class="h-16 w-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
            </div>
            <h1 class="text-6xl font-bold text-slate-800 mb-4">404</h1>
            <h2 class="text-2xl font-bold text-slate-700 mb-4">पृष्ठ फेला परेन</h2>
            <p class="text-slate-600 mb-8">
                माफ गर्नुहोस्, तपाईंले खोज्नु भएको पृष्ठ अवस्थित छैन वा सारिएको हुन सक्छ।
            </p>
        </div>
        
        <div class="space-y-4">
            <a href="{{ route('home') }}" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-lg text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300">
                गृह पृष्ठमा जानुहोस्
            </a>
            
            <div class="flex space-x-4">
                <a href="{{ route('results') }}" class="flex-1 py-2 px-4 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-colors">
                    परिणाम खोज्नुहोस्
                </a>
                <a href="{{ route('schools') }}" class="flex-1 py-2 px-4 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 transition-colors">
                    विद्यालयहरू
                </a>
            </div>
        </div>
        
        <div class="text-sm text-slate-500">
            <p>यदि तपाईंलाई लाग्छ कि यो त्रुटि छ भने, कृपया हामीलाई सम्पर्क गर्नुहोस्।</p>
        </div>
    </div>
</div>
@endsection