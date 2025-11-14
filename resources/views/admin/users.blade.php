@extends('layouts.admin')

@section('page-title', 'User Management')
@section('page-description', 'Manage system users and permissions')

@section('content')
<div class="space-y-6">
    <!-- Users Management -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">System Users</h3>
                    <p class="text-gray-600">Manage admin users and their permissions</p>
                </div>
                <div class="flex gap-3">
                    <button class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-plus mr-2"></i>Add User
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
                    <input type="text" placeholder="Search users..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <option>All Roles</option>
                    <option>Super Admin</option>
                    <option>Manager</option>
                    <option>Supervisor</option>
                    <option>Operator</option>
                </select>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>

            <!-- Users Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">User Details</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Email</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Role</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['users'] as $user)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300">
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800">{{ $user['name'] }}</h4>
                                        <p class="text-sm text-gray-600">ID: {{ $user['id'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-gray-800">{{ $user['email'] }}</span>
                            </td>
                            <td class="py-4 px-4">
                                @if($user['role'] == 'Super Admin')
                                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $user['role'] }}</span>
                                @elseif($user['role'] == 'Manager')
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $user['role'] }}</span>
                                @elseif($user['role'] == 'Supervisor')
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $user['role'] }}</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $user['role'] }}</span>
                                @endif
                            </td>
                            <td class="py-4 px-4">
                                @if($user['status'] == 'Active')
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
                                        <i class="fas fa-key"></i>
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

    <!-- Role Permissions -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800">Role Permissions</h3>
            <p class="text-gray-600">Manage permissions for different user roles</p>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-crown text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Super Admin</h4>
                            <p class="text-sm text-gray-600">Full Access</p>
                        </div>
                    </div>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center text-green-600"><i class="fas fa-check mr-2"></i>All Permissions</li>
                        <li class="flex items-center text-green-600"><i class="fas fa-check mr-2"></i>User Management</li>
                        <li class="flex items-center text-green-600"><i class="fas fa-check mr-2"></i>System Settings</li>
                    </ul>
                </div>

                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-tie text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Manager</h4>
                            <p class="text-sm text-gray-600">Management Access</p>
                        </div>
                    </div>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center text-green-600"><i class="fas fa-check mr-2"></i>School Management</li>
                        <li class="flex items-center text-green-600"><i class="fas fa-check mr-2"></i>Result Publishing</li>
                        <li class="flex items-center text-red-600"><i class="fas fa-times mr-2"></i>User Management</li>
                    </ul>
                </div>

                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-check text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Supervisor</h4>
                            <p class="text-sm text-gray-600">Supervisory Access</p>
                        </div>
                    </div>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center text-green-600"><i class="fas fa-check mr-2"></i>View Reports</li>
                        <li class="flex items-center text-green-600"><i class="fas fa-check mr-2"></i>Monitor Exams</li>
                        <li class="flex items-center text-red-600"><i class="fas fa-times mr-2"></i>Delete Records</li>
                    </ul>
                </div>

                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-gray-500 to-gray-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Operator</h4>
                            <p class="text-sm text-gray-600">Basic Access</p>
                        </div>
                    </div>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center text-green-600"><i class="fas fa-check mr-2"></i>Data Entry</li>
                        <li class="flex items-center text-green-600"><i class="fas fa-check mr-2"></i>View Records</li>
                        <li class="flex items-center text-red-600"><i class="fas fa-times mr-2"></i>System Settings</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection