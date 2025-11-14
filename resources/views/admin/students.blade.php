@extends('layouts.admin')

@section('page-title', 'Students Management')
@section('page-description', 'Manage student records and information')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-user-graduate text-white text-2xl"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-3xl font-bold text-gray-800">{{ number_format($data['statistics']['total_students']) }}</h3>
                    <p class="text-gray-600 font-medium">Total Students</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-check-circle text-white text-2xl"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-3xl font-bold text-gray-800">{{ number_format($data['statistics']['active_students']) }}</h3>
                    <p class="text-gray-600 font-medium">Active Students</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-3xl font-bold text-gray-800">{{ number_format($data['statistics']['graduated_students']) }}</h3>
                    <p class="text-gray-600 font-medium">Graduated</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center justify-between">
                <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-3xl font-bold text-gray-800">{{ number_format($data['statistics']['new_enrollments']) }}</h3>
                    <p class="text-gray-600 font-medium">New Enrollments</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Students Management -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Student Records</h3>
                    <p class="text-gray-600">Manage student information and records</p>
                </div>
                <div class="flex gap-3">
                    <button class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-plus mr-2"></i>Add Student
                    </button>
                    <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-download mr-2"></i>Export
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <!-- Search and Filter -->
            <div class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search students..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <option>All Schools</option>
                    <option>Kathmandu Model School</option>
                    <option>Pokhara Valley School</option>
                    <option>Lalitpur Public School</option>
                </select>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <option>All Grades</option>
                    <option>Grade 10</option>
                    <option>Grade 11</option>
                    <option>Grade 12</option>
                </select>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                    <option>Graduated</option>
                </select>
            </div>

            <!-- Students Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Student Details</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">School</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Grade</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Roll Number</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['students'] as $student)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300">
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ $student['name'] }}</h4>
                                        <p class="text-sm text-gray-600">ID: {{ $student['id'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-gray-800">{{ $student['school'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">Grade {{ $student['grade'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="font-mono text-gray-800">{{ $student['roll_no'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                @if($student['status'] == 'Active')
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">Active</span>
                                @else
                                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">Inactive</span>
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
                                        <i class="fas fa-certificate"></i>
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

            <!-- Pagination -->
            <div class="mt-6 flex justify-between items-center">
                <div class="text-sm text-gray-600">
                    Showing 1 to 5 of {{ count($data['students']) }} students
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-3 py-2 bg-blue-500 text-white rounded-lg">1</button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">2</button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">3</button>
                    <button class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection