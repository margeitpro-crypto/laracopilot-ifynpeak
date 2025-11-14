@extends('layouts.student')

@section('title', 'Student Dashboard - Nepal Result System')
@section('page-title', 'विद्यार्थी ड्यासबोर्ड')

@section('content')
<div class="space-y-6">
    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-purple-600 to-pink-600 text-white p-6 rounded-2xl shadow-xl">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold mb-2">स्वागतम्, {{ session('student_user')['name'] }}!</h2>
                <p class="text-purple-100">Symbol: {{ session('student_user')['symbol'] }} | Class: {{ session('student_user')['class'] }}</p>
                <p class="text-purple-100">{{ session('student_user')['school'] }}</p>
            </div>
            <div class="bg-purple-500 p-4 rounded-full">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-xl card-hover border-l-4 border-purple-500">
            <div class="flex items-center">
                <div class="bg-purple-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">हालका परिणाम</p>
                    <p class="text-2xl font-bold text-slate-800">{{ count($data['recent_results']) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-xl card-hover border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">उपस्थिति</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $data['attendance']['percentage'] }}%</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-xl card-hover border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">उपस्थित दिन</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $data['attendance']['present_days'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-xl card-hover border-l-4 border-orange-500">
            <div class="flex items-center">
                <div class="bg-orange-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-slate-600">आगामी परीक्षा</p>
                    <p class="text-2xl font-bold text-slate-800">{{ count($data['upcoming_exams']) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Results and Upcoming Exams -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Results -->
        <div class="bg-white p-6 rounded-2xl shadow-xl card-hover">
            <h3 class="text-xl font-bold text-slate-800 mb-4">हालका परिणामहरू</h3>
            <div class="space-y-4">
                @foreach($data['recent_results'] as $result)
                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-slate-50 to-blue-50 rounded-lg border border-slate-200">
                    <div>
                        <p class="text-sm font-medium text-slate-800">{{ $result['exam'] }}</p>
                        <p class="text-sm text-slate-600">{{ $result['subject'] }}</p>
                        <p class="text-xs text-slate-500">{{ $result['date'] }}</p>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-slate-800">{{ $result['marks'] }}</div>
                        <div class="text-sm font-semibold">
                            @if($result['grade'] === 'A+')
                                <span class="text-green-600">{{ $result['grade'] }}</span>
                            @elseif($result['grade'] === 'A')
                                <span class="text-blue-600">{{ $result['grade'] }}</span>
                            @else
                                <span class="text-orange-600">{{ $result['grade'] }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4">
                <a href="{{ route('student.results') }}" class="w-full bg-gradient-to-r from-purple-500 to-pink-600 text-white py-2 px-4 rounded-lg font-medium hover:from-purple-600 hover:to-pink-700 transition-all duration-300 text-center block">
                    सबै परिणाम हेर्नुहोस्
                </a>
            </div>
        </div>

        <!-- Upcoming Exams -->
        <div class="bg-white p-6 rounded-2xl shadow-xl card-hover">
            <h3 class="text-xl font-bold text-slate-800 mb-4">आगामी परीक्षाहरू</h3>
            <div class="space-y-4">
                @foreach($data['upcoming_exams'] as $exam)
                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg border border-orange-200">
                    <div>
                        <p class="text-sm font-medium text-slate-800">{{ $exam['exam'] }}</p>
                        <p class="text-sm text-slate-600">{{ $exam['subject'] }}</p>
                        <p class="text-xs text-slate-500">{{ $exam['time'] }}</p>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-semibold text-orange-600">{{ $exam['date'] }}</div>
                        <div class="text-xs text-slate-500">मिति</div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4">
                <button class="w-full bg-gradient-to-r from-orange-500 to-red-600 text-white py-2 px-4 rounded-lg font-medium hover:from-orange-600 hover:to-red-700 transition-all duration-300">
                    परीक्षा तालिका हेर्नुहोस्
                </button>
            </div>
        </div>
    </div>

    <!-- Attendance Chart -->
    <div class="bg-white p-6 rounded-2xl shadow-xl card-hover">
        <h3 class="text-xl font-bold text-slate-800 mb-4">उपस्थिति सारांश</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <div style="width: 100%; height: 250px;">
                    <canvas id="attendanceChart" width="300" height="250"></canvas>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex justify-between items-center p-3 bg-green-50 rounded-lg">
                    <span class="text-sm font-medium text-slate-700">कुल दिन</span>
                    <span class="text-lg font-bold text-green-600">{{ $data['attendance']['total_days'] }}</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg">
                    <span class="text-sm font-medium text-slate-700">उपस्थित</span>
                    <span class="text-lg font-bold text-blue-600">{{ $data['attendance']['present_days'] }}</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-red-50 rounded-lg">
                    <span class="text-sm font-medium text-slate-700">अनुपस्थित</span>
                    <span class="text-lg font-bold text-red-600">{{ $data['attendance']['absent_days'] }}</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-purple-50 rounded-lg">
                    <span class="text-sm font-medium text-slate-700">प्रतिशत</span>
                    <span class="text-lg font-bold text-purple-600">{{ $data['attendance']['percentage'] }}%</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Attendance Chart
const ctx = document.getElementById('attendanceChart').getContext('2d');
const attendanceChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['उपस्थित', 'अनुपस्थित'],
        datasets: [{
            data: [{{ $data['attendance']['present_days'] }}, {{ $data['attendance']['absent_days'] }}],
            backgroundColor: [
                'rgba(16, 185, 129, 0.8)',
                'rgba(239, 68, 68, 0.8)'
            ],
            borderColor: [
                'rgb(16, 185, 129)',
                'rgb(239, 68, 68)'
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