@extends('layouts.admin')

@section('title', 'Admin Dashboard - Nepal Result System')
@section('page-title', 'व्यवस्थापन ड्यासबोर्ड')
@section('page-description', 'Nepal School Result Management System - मुख्य नियन्त्रण केन्द्र')

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-2xl shadow-xl card-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">कुल विद्यालयहरू</p>
                    <p class="text-3xl font-bold">{{ number_format($data['total_schools']) }}</p>
                </div>
                <div class="bg-blue-400 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-2xl shadow-xl card-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium">कुल विद्यार्थीहरू</p>
                    <p class="text-3xl font-bold">{{ number_format($data['total_students']) }}</p>
                </div>
                <div class="bg-green-400 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-2xl shadow-xl card-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">प्रकाशित परिणामहरू</p>
                    <p class="text-3xl font-bold">{{ number_format($data['total_results']) }}</p>
                </div>
                <div class="bg-purple-400 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-white p-6 rounded-2xl shadow-xl card-hover">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-100 text-sm font-medium">प्रतीक्षारत अनुमोदन</p>
                    <p class="text-3xl font-bold">{{ $data['pending_approvals'] }}</p>
                </div>
                <div class="bg-orange-400 p-3 rounded-full">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- District Statistics Chart -->
        <div class="bg-white p-6 rounded-2xl shadow-xl card-hover">
            <h3 class="text-xl font-bold text-slate-800 mb-4">जिल्लाअनुसार तथ्याङ्क</h3>
            <div style="width: 100%; height: 300px;">
                <canvas id="districtChart" width="400" height="300"></canvas>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white p-6 rounded-2xl shadow-xl card-hover">
            <h3 class="text-xl font-bold text-slate-800 mb-4">हालका गतिविधिहरू</h3>
            <div class="space-y-4">
                @foreach($data['recent_activities'] as $activity)
                <div class="flex items-start space-x-3 p-3 bg-slate-50 rounded-lg">
                    <div class="flex-shrink-0">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-800">{{ $activity['action'] }}</p>
                        <p class="text-sm text-slate-600">{{ $activity['school'] }}</p>
                        <p class="text-xs text-slate-500">{{ $activity['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- District Performance Table -->
    <div class="bg-white rounded-2xl shadow-xl card-hover">
        <div class="p-6 border-b border-slate-200">
            <h3 class="text-xl font-bold text-slate-800">जिल्लाअनुसार प्रदर्शन</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">जिल्ला</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">विद्यालयहरू</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">विद्यार्थीहरू</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">कार्य</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @foreach($data['district_stats'] as $district)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-slate-900">{{ $district['district'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900">{{ number_format($district['schools']) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-slate-900">{{ number_format($district['students']) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 transition-colors">विस्तार हेर्नुहोस्</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// District Statistics Chart
const ctx = document.getElementById('districtChart').getContext('2d');
const districtChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [@foreach($data['district_stats'] as $district)'{{ $district['district'] }}',@endforeach],
        datasets: [{
            label: 'विद्यालयहरू',
            data: [@foreach($data['district_stats'] as $district){{ $district['schools'] }},@endforeach],
            backgroundColor: 'rgba(59, 130, 246, 0.5)',
            borderColor: 'rgb(59, 130, 246)',
            borderWidth: 1
        }, {
            label: 'विद्यार्थीहरू (सयौं)',
            data: [@foreach($data['district_stats'] as $district){{ round($district['students']/100) }},@endforeach],
            backgroundColor: 'rgba(16, 185, 129, 0.5)',
            borderColor: 'rgb(16, 185, 129)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: false,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection