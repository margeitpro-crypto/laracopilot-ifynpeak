@extends('layouts.admin')

@section('page-title', 'Exams Management')
@section('page-description', 'Schedule and manage examinations')

@section('content')
<div class="space-y-6">
    <!-- Exam Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-clipboard-list text-white text-2xl"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-3xl font-bold text-gray-800">{{ count($data['exams']) }}</h3>
                    <p class="text-gray-600 font-medium">Total Exams</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-calendar-check text-white text-2xl"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-3xl font-bold text-gray-800">3</h3>
                    <p class="text-gray-600 font-medium">Scheduled</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-check-circle text-white text-2xl"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-3xl font-bold text-gray-800">2</h3>
                    <p class="text-gray-600 font-medium">Completed</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-3xl font-bold text-gray-800">11,800</h3>
                    <p class="text-gray-600 font-medium">Total Students</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Exams Management -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Examination Schedule</h3>
                    <p class="text-gray-600">Schedule and manage examinations</p>
                </div>
                <div class="flex gap-3">
                    <button class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-plus mr-2"></i>Schedule Exam
                    </button>
                    <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-calendar mr-2"></i>View Calendar
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <!-- Search and Filter -->
            <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search exams..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <option>All Status</option>
                    <option>Scheduled</option>
                    <option>Completed</option>
                    <option>Cancelled</option>
                </select>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <option>All Dates</option>
                    <option>This Week</option>
                    <option>This Month</option>
                    <option>Next Month</option>
                </select>
            </div>

            <!-- Exams Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Exam Details</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Exam Date</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Schools</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Students</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['exams'] as $exam)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300">
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-clipboard-list text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ $exam['name'] }}</h4>
                                        <p class="text-sm text-gray-600">ID: {{ $exam['id'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-calendar text-blue-500"></i>
                                    <span class="text-gray-800">{{ date('M d, Y', strtotime($exam['date'])) }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $exam['schools'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="font-semibold text-gray-800">{{ number_format($exam['students']) }}</span>
                            </td>
                            <td class="py-4 px-4">
                                @if($exam['status'] == 'Scheduled')
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">Scheduled</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">Completed</span>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex space-x-2">
                                    <button class="text-blue-600 hover:text-blue-800 transition-colors p-2 hover:bg-blue-50 rounded-lg">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-800 transition-colors p-2 hover:bg-green-50 rounded-lg">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-purple-600 hover:text-purple-800 transition-colors p-2 hover:bg-purple-50 rounded-lg">
                                        <i class="fas fa-download"></i>
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

    <!-- Exam Calendar View -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800">Exam Calendar</h3>
            <p class="text-gray-600">Visual overview of scheduled examinations</p>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($data['exams'] as $exam)
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-lg transition-shadow">
                    <div class="flex justify-between items-start mb-3">
                        <h4 class="font-semibold text-gray-800">{{ $exam['name'] }}</h4>
                        @if($exam['status'] == 'Scheduled')
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Scheduled</span>
                        @else
                            <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs font-semibold">Completed</span>
                        @endif
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-calendar mr-2 text-blue-500"></i>
                            <span>{{ date('M d, Y', strtotime($exam['date'])) }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-school mr-2 text-green-500"></i>
                            <span>{{ $exam['schools'] }} schools</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-purple-500"></i>
                            <span>{{ number_format($exam['students']) }} students</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection