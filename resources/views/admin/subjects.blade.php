@extends('layouts.admin')

@section('page-title', 'Subjects Management')
@section('page-description', 'Manage academic subjects and curriculum')

@section('content')
<div class="space-y-6">
    <!-- Subjects Management -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Academic Subjects</h3>
                    <p class="text-gray-600">Manage subjects and curriculum standards</p>
                </div>
                <div class="flex gap-3">
                    <button class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-plus mr-2"></i>Add Subject
                    </button>
                    <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-download mr-2"></i>Export
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <!-- Search and Filter -->
            <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search subjects..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
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
                </select>
            </div>

            <!-- Subjects Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Subject Details</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Subject Code</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Grade Level</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Schools</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['subjects'] as $subject)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300">
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-teal-500 to-cyan-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-book text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ $subject['name'] }}</h4>
                                        <p class="text-sm text-gray-600">ID: {{ $subject['id'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-mono font-semibold">{{ $subject['code'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-semibold">Grade {{ $subject['grade'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="font-semibold text-gray-800">{{ number_format($subject['schools']) }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $subject['status'] }}</span>
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
                                        <i class="fas fa-cog"></i>
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

    <!-- Subject Categories -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-calculator text-white text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Mathematics</h3>
                    <p class="text-gray-600">Core Subject</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <div class="flex justify-between">
                    <span>Grade 10:</span>
                    <span class="font-semibold">2,847 schools</span>
                </div>
                <div class="flex justify-between">
                    <span>Grade 11:</span>
                    <span class="font-semibold">2,156 schools</span>
                </div>
                <div class="flex justify-between">
                    <span>Grade 12:</span>
                    <span class="font-semibold">1,987 schools</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-language text-white text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Languages</h3>
                    <p class="text-gray-600">Core Subject</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <div class="flex justify-between">
                    <span>English:</span>
                    <span class="font-semibold">2,847 schools</span>
                </div>
                <div class="flex justify-between">
                    <span>Nepali:</span>
                    <span class="font-semibold">2,847 schools</span>
                </div>
                <div class="flex justify-between">
                    <span>Hindi:</span>
                    <span class="font-semibold">1,234 schools</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift border border-gray-100">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-flask text-white text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Sciences</h3>
                    <p class="text-gray-600">Core Subject</p>
                </div>
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <div class="flex justify-between">
                    <span>Physics:</span>
                    <span class="font-semibold">1,987 schools</span>
                </div>
                <div class="flex justify-between">
                    <span>Chemistry:</span>
                    <span class="font-semibold">1,876 schools</span>
                </div>
                <div class="flex justify-between">
                    <span>Biology:</span>
                    <span class="font-semibold">2,156 schools</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection