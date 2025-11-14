@extends('layouts.admin')

@section('title', 'Schools Management - Nepal Result System')
@section('page-title', 'विद्यालय व्यवस्थापन')
@section('page-description', 'दर्ता विद्यालयहरूको सूची र व्यवस्थापन')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">विद्यालयहरूको सूची</h2>
            <p class="text-slate-600">कुल {{ count($schools) }} विद्यालयहरू दर्ता छन्</p>
        </div>
        <div class="flex space-x-3">
            <button class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-2 rounded-lg hover:from-green-600 hover:to-emerald-700 transition-all duration-300 shadow-lg">
                नयाँ विद्यालय थप्नुहोस्
            </button>
            <button class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 shadow-lg">
                Export Excel
            </button>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white p-6 rounded-2xl shadow-xl">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">विद्यालयको नाम खोज्नुहोस्</label>
                <input type="text" placeholder="विद्यालयको नाम..." class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">जिल्ला</label>
                <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">सबै जिल्ला</option>
                    <option value="kathmandu">काठमाडौं</option>
                    <option value="pokhara">पोखरा</option>
                    <option value="chitwan">चितवन</option>
                    <option value="lalitpur">ललितपुर</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">स्थिति</label>
                <select class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">सबै स्थिति</option>
                    <option value="active">सक्रिय</option>
                    <option value="pending">प्रतीक्षारत</option>
                    <option value="inactive">निष्क्रिय</option>
                </select>
            </div>
            <div class="flex items-end">
                <button class="w-full bg-gradient-to-r from-slate-600 to-slate-700 text-white px-4 py-2 rounded-lg hover:from-slate-700 hover:to-slate-800 transition-all duration-300">
                    खोज्नुहोस्
                </button>
            </div>
        </div>
    </div>

    <!-- Schools Table -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-slate-700 to-slate-800 text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">विद्यालयको नाम</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">कोड</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">जिल्ला</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">विद्यार्थीहरू</th>
                        <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">स्थापना</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider">स्थिति</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider">कार्य</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @foreach($schools as $school)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                            {{ $school['id'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                        <span class="text-sm font-medium text-white">{{ substr($school['name'], 0, 1) }}</span>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-slate-900">{{ $school['name'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900 font-mono">
                            {{ $school['code'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                            {{ $school['district'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ number_format($school['students']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                            {{ $school['established'] }} B.S.
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if($school['status'] === 'Active')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">सक्रिय</span>
                            @elseif($school['status'] === 'Pending')
                                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">प्रतीक्षारत</span>
                            @else
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-semibold">निष्क्रिय</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <div class="flex justify-center space-x-2">
                                <button class="text-blue-600 hover:text-blue-900 transition-colors" title="विस्तार हेर्नुहोस्">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                <button class="text-green-600 hover:text-green-900 transition-colors" title="सम्पादन गर्नुहोस्">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-900 transition-colors" title="मेटाउनुहोस्">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="bg-white px-4 py-3 rounded-2xl shadow-xl flex items-center justify-between">
        <div class="flex-1 flex justify-between sm:hidden">
            <button class="relative inline-flex items-center px-4 py-2 border border-slate-300 text-sm font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50">
                अघिल्लो
            </button>
            <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-slate-300 text-sm font-medium rounded-md text-slate-700 bg-white hover:bg-slate-50">
                अर्को
            </button>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-slate-700">
                    देखाइएको <span class="font-medium">1</span> देखि <span class="font-medium">{{ count($schools) }}</span> को <span class="font-medium">{{ count($schools) }}</span> परिणामहरू
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <button class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-slate-300 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50">
                        अघिल्लो
                    </button>
                    <button class="relative inline-flex items-center px-4 py-2 border border-slate-300 bg-blue-50 text-sm font-medium text-blue-600">
                        1
                    </button>
                    <button class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-slate-300 bg-white text-sm font-medium text-slate-500 hover:bg-slate-50">
                        अर्को
                    </button>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection