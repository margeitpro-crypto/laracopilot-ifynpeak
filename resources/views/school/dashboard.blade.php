@extends('layouts.school')

@section('title', 'School Dashboard - Nepal Result System')
@section('page-title', 'विद्यालय ड्यासबोर्ड')

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white p-6 rounded-2xl shadow-xl card-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium">कुल विद्यार्थीहरू</p>
                    <p class="text-3xl font-bold">{{ number_format($data['total_students']) }}</p>
                </div>
                <div class="bg-orange-400 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-2xl shadow-xl card-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">कुल शिक्षकहरू</p>
                    <p class="text-3xl font-bold">{{ $data['total_teachers'] }}</p>
                </div>
                <div class="bg-blue-400 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-2xl shadow-xl card-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">कुल कक्षाहरू</p>
                    <p class="text-3xl font-bold">{{ $data['total_classes'] }}</p>
                </div>
                <div class="bg-green-400 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 0a1 1 0 100 2h.01a1 1 0 100-2H9zm2 0a1 1 0 100 2h.01a1 1 0 100-2H11z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-2xl shadow-xl card-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">प्रतीक्षारत परिणाम</p>
                    <p class="text-3xl font-bold">{{ $data['pending_results'] }}</p>
                </div>
                <div class="bg-purple-400 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Class Performance Chart -->
        <div class="bg-white p-6 rounded-2xl shadow-xl card-hover">
            <h3 class="text-xl font-bold text-slate-800 mb-4">कक्षाअनुसार प्रदर्शन</h3>
            <div style="width: 100%; height: 300px;">
                <canvas id="classChart" width="400" height="300"></canvas>
            </div>
        </div>

        <!-- Recent Results -->
        <div class="bg-white p-6 rounded-2xl shadow-xl card-hover">
            <h3 class="text-xl font-bold text-slate-800 mb-4">हालका परिणामहरू</h3>
            <div class="space-y-4">
                @foreach($data['recent_results'] as $result)
                <div class="flex items-center justify-between p-3 bg-slate-50 rounded-lg">
                    <div>
                        <p class="text-sm font-medium text-slate-800">{{ $result['exam'] }}</p>
                        <p class="text-sm text-slate-600">{{ $result['class'] }} - {{ $result['students'] }} विद्यार्थी</p>
                    </div>
                    <div class="text-right">
                        @if($result['published'])
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">प्रकाशित</span>
                        @else
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">प्रतीक्षारत</span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Class Performance Table -->
    <div class="bg-white rounded-2xl shadow-xl card-hover">
        <div class="p-6 border-b border-slate-200">
            <h3 class="text-xl font-bold text-slate-800">कक्षाअनुसार विस्तृत प्रदर्शन</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">कक्षा</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">विद्यार्थीहरू</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">सफलता दर</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">औसत अङ्क</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">कार्य</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @foreach($data['class_performance'] as $class)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-slate-900">{{ $class['class'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $class['students'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-sm font-medium text-slate-900">{{ $class['pass_rate'] }}</div>
                                <div class="ml-2 w-16 bg-slate-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ $class['pass_rate'] }}"></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                            {{ $class['average'] }}%
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-orange-600 hover:text-orange-900 transition-colors">विस्तार हेर्नुहोस्</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Class Performance Chart
const ctx = document.getElementById('classChart').getContext('2d');
const classChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [@foreach($data['class_performance'] as $class)'{{ $class['class'] }}',@endforeach],
        datasets: [{
            data: [@foreach($data['class_performance'] as $class){{ $class['students'] }},@endforeach],
            backgroundColor: [
                'rgba(249, 115, 22, 0.8)',
                'rgba(59, 130, 246, 0.8)',
                'rgba(16, 185, 129, 0.8)',
                'rgba(139, 92, 246, 0.8)'
            ],
            borderColor: [
                'rgb(249, 115, 22)',
                'rgb(59, 130, 246)',
                'rgb(16, 185, 129)',
                'rgb(139, 92, 246)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>
@endsection