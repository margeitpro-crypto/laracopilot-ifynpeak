@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')
@section('page-title', 'Dashboard')
@section('page-description', 'Overview of your creative agency performance')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    @foreach($data['stats'] as $stat)
    <div class="admin-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">{{ $stat['title'] }}</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stat['value'] }}</p>
                <p class="text-sm text-green-600 mt-1">
                    <i class="fas fa-arrow-up"></i> {{ $stat['change'] }}
                </p>
            </div>
            <div class="w-12 h-12 bg-gradient-to-r from-{{ $stat['color'] }}-500 to-{{ $stat['color'] }}-600 rounded-lg flex items-center justify-center">
                <i class="{{ $stat['icon'] }} text-white text-xl"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Revenue Chart -->
    <div class="admin-card p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Monthly Revenue</h3>
            <div class="flex space-x-2">
                <button class="text-sm text-gray-500 hover:text-gray-700">6M</button>
                <button class="text-sm text-purple-600 font-medium">1Y</button>
            </div>
        </div>
        <div style="width: 100%; height: 300px;">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <!-- Project Status -->
    <div class="admin-card p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Project Status Distribution</h3>
        <div style="width: 100%; height: 300px; display: flex; justify-content: center; align-items: center;">
            <canvas id="projectChart" style="max-width: 250px; max-height: 250px;"></canvas>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Recent Projects -->
    <div class="admin-card p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Recent Projects</h3>
            <a href="{{ route('admin.projects') }}" class="text-sm text-purple-600 hover:text-purple-700 font-medium">View All</a>
        </div>
        <div class="space-y-4">
            @foreach($data['recent_projects'] as $project)
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-200">
                <div class="flex-1">
                    <h4 class="font-medium text-gray-900">{{ $project['name'] }}</h4>
                    <p class="text-sm text-gray-600">{{ $project['client'] }}</p>
                    <div class="mt-2">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Progress</span>
                            <span class="font-medium">{{ $project['progress'] }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                            <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full transition-all duration-300" style="width: {{ $project['progress'] }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="ml-4">
                    <span class="px-3 py-1 text-xs rounded-full 
                        {{ $project['status'] === 'Completed' ? 'bg-green-100 text-green-800' : 
                           ($project['status'] === 'In Progress' ? 'bg-blue-100 text-blue-800' : 
                           ($project['status'] === 'Review' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800')) }}">
                        {{ $project['status'] }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Team Activity -->
    <div class="admin-card p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
            <a href="{{ route('admin.team') }}" class="text-sm text-purple-600 hover:text-purple-700 font-medium">View Team</a>
        </div>
        <div class="space-y-4">
            @foreach($data['team_activity'] as $activity)
            <div class="flex items-start space-x-3 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-200">
                <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-user text-white text-sm"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">{{ $activity['name'] }}</p>
                    <p class="text-sm text-gray-600">{{ $activity['action'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $activity['time'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Revenue ($)',
                data: [45000, 52000, 48000, 61000, 55000, 67000, 59000, 73000, 68000, 75000, 82000, 89500],
                borderColor: 'rgb(147, 51, 234)',
                backgroundColor: 'rgba(147, 51, 234, 0.1)',
                tension: 0.4,
                fill: true
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
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Project Status Chart
    const projectCtx = document.getElementById('projectChart').getContext('2d');
    new Chart(projectCtx, {
        type: 'doughnut',
        data: {
            labels: ['In Progress', 'Review', 'Planning', 'Completed'],
            datasets: [{
                data: [24, 8, 6, 45],
                backgroundColor: [
                    'rgb(147, 51, 234)',
                    'rgb(236, 72, 153)',
                    'rgb(245, 158, 11)',
                    'rgb(34, 197, 94)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            }
        }
    });
});
</script>
@endsection