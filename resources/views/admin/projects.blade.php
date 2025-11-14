@extends('layouts.admin')

@section('title', 'Projects - Admin Panel')
@section('page-title', 'Projects')
@section('page-description', 'Manage your creative projects and track progress')

@section('content')
<div class="flex justify-between items-center mb-8">
    <div class="flex space-x-4">
        <button class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-4 py-2 rounded-lg font-medium hover:from-purple-700 hover:to-pink-700 transition duration-300">
            <i class="fas fa-plus mr-2"></i>New Project
        </button>
        <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition duration-300">
            <i class="fas fa-filter mr-2"></i>Filter
        </button>
        <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition duration-300">
            <i class="fas fa-download mr-2"></i>Export
        </button>
    </div>
    <div class="flex space-x-2">
        <button class="p-2 text-gray-400 hover:text-gray-600 transition duration-200">
            <i class="fas fa-th-large"></i>
        </button>
        <button class="p-2 text-purple-600">
            <i class="fas fa-list"></i>
        </button>
    </div>
</div>

<div class="admin-card overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">All Projects</h3>
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <input type="text" placeholder="Search projects..." 
                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option>All Status</option>
                    <option>In Progress</option>
                    <option>Review</option>
                    <option>Planning</option>
                    <option>Completed</option>
                </select>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <input type="checkbox" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Progress</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deadline</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Budget</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($data['projects'] as $project)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <input type="checkbox" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-project-diagram text-white"></i>
                            </div>
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $project['name'] }}</div>
                                <div class="text-sm text-gray-500">#PRJ-{{ str_pad($project['id'], 3, '0', STR_PAD_LEFT) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $project['client'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 text-xs rounded-full font-medium
                            {{ $project['status'] === 'Completed' ? 'bg-green-100 text-green-800' : 
                               ($project['status'] === 'In Progress' ? 'bg-blue-100 text-blue-800' : 
                               ($project['status'] === 'Review' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800')) }}">
                            {{ $project['status'] }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="w-16 bg-gray-200 rounded-full h-2 mr-3">
                                <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full transition-all duration-300" 
                                     style="width: {{ $project['progress'] }}%"></div>
                            </div>
                            <span class="text-sm font-medium text-gray-900">{{ $project['progress'] }}%</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ date('M j, Y', strtotime($project['deadline'])) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $project['budget'] }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center space-x-2">
                            <button class="text-purple-600 hover:text-purple-900 transition duration-200">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-blue-600 hover:text-blue-900 transition duration-200">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-900 transition duration-200">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Showing 1 to {{ count($data['projects']) }} of {{ count($data['projects']) }} results
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 transition duration-200">
                    Previous
                </button>
                <button class="px-3 py-2 text-sm bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition duration-200">
                    1
                </button>
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 transition duration-200">
                    2
                </button>
                <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-50 transition duration-200">
                    Next
                </button>
            </div>
        </div>
    </div>
</div>
@endsection