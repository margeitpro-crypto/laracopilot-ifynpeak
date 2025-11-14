@extends('layouts.admin')

@section('page-title', 'Reports & Analytics')
@section('page-description', 'Generate and view system reports')

@section('content')
<div class="space-y-6">
    <!-- Report Generation -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800">Generate Reports</h3>
            <p class="text-gray-600">Create custom reports for analysis</p>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <button class="flex flex-col items-center p-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-school text-white text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">School Report</h4>
                    <p class="text-sm text-gray-600 text-center">Comprehensive school performance analysis</p>
                </button>

                <button class="flex flex-col items-center p-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-graduate text-white text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">Student Analytics</h4>
                    <p class="text-sm text-gray-600 text-center">Student performance and enrollment data</p>
                </button>

                <button class="flex flex-col items-center p-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-clipboard-list text-white text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">Exam Statistics</h4>
                    <p class="text-sm text-gray-600 text-center">Examination performance metrics</p>
                </button>

                <button class="flex flex-col items-center p-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-orange-500 hover:bg-orange-50 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-certificate text-white text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">Result Summary</h4>
                    <p class="text-sm text-gray-600 text-center">Overall result publication summary</p>
                </button>
            </div>
        </div>
    </div>

    <!-- Recent Reports -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Recent Reports</h3>
                    <p class="text-gray-600">Previously generated reports and analytics</p>
                </div>
                <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-refresh mr-2"></i>Refresh
                </button>
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Report Type</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Generated Date</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Records</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Format</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['reports'] as $report)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300">
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-chart-bar text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ $report['type'] }}</h4>
                                        <p class="text-sm text-gray-600">System Generated</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-gray-800">{{ date('M d, Y', strtotime($report['generated'])) }}</span>
                            </td>
                            <td class="py-4 px-4">
                                @if(isset($report['schools']))
                                    <span class="font-semibold text-gray-800">{{ number_format($report['schools']) }} schools</span>
                                @elseif(isset($report['students']))
                                    <span class="font-semibold text-gray-800">{{ number_format($report['students']) }} students</span>
                                @elseif(isset($report['exams']))
                                    <span class="font-semibold text-gray-800">{{ $report['exams'] }} exams</span>
                                @else
                                    <span class="font-semibold text-gray-800">{{ number_format($report['results']) }} results</span>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $report['format'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800 transition-colors p-2 hover:bg-blue-50 rounded-lg">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-800 transition-colors p-2 hover:bg-green-50 rounded-lg">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button class="text-purple-600 hover:text-purple-800 transition-colors p-2 hover:bg-purple-50 rounded-lg">
                                        <i class="fas fa-share"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800 transition-colors p-2 hover:bg-red-50 rounded-lg">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Analytics Dashboard -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Performance Chart -->
        <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 mb-4">System Performance</h3>
            <div style="width: 100%; height: 300px;">
                <canvas id="performanceChart" width="400" height="300"></canvas>
            </div>
        </div>

        <!-- Usage Statistics -->
        <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Usage Statistics</h3>
            <div style="width: 100%; height: 300px;">
                <canvas id="usageChart" width="400" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Performance Chart
    const performanceCtx = document.getElementById('performanceChart').getContext('2d');
    new Chart(performanceCtx, {
        type: 'bar',
        data: {
            labels: ['Schools', 'Students', 'Results', 'Exams'],
            datasets: [{
                label: 'System Usage',
                data: [2847, 485620, 1250000, 45],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(168, 85, 247, 0.8)',
                    'rgba(251, 191, 36, 0.8)'
                ],
                borderColor: [
                    'rgb(59, 130, 246)',
                    'rgb(34, 197, 94)',
                    'rgb(168, 85, 247)',
                    'rgb(251, 191, 36)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Usage Chart
    const usageCtx = document.getElementById('usageChart').getContext('2d');
    new Chart(usageCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Monthly Usage',
                data: [65000, 75000, 85000, 95000, 105000, 115000],
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endsection