@extends('layouts.admin')

@section('page-title', 'System Settings')
@section('page-description', 'Configure system settings and preferences')

@section('content')
<div class="space-y-6">
    <!-- System Configuration -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800">System Configuration</h3>
            <p class="text-gray-600">Manage core system settings</p>
        </div>
        <div class="p-6">
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">System Name</label>
                        <input type="text" value="{{ $data['system_settings']['system_name'] }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Academic Year</label>
                        <input type="text" value="{{ $data['system_settings']['academic_year'] }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Result Publication</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                            <option {{ $data['system_settings']['result_publication'] == 'Enabled' ? 'selected' : '' }}>Enabled</option>
                            <option {{ $data['system_settings']['result_publication'] == 'Disabled' ? 'selected' : '' }}>Disabled</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Auto Backup</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                            <option {{ $data['system_settings']['auto_backup'] == 'Daily' ? 'selected' : '' }}>Daily</option>
                            <option>Weekly</option>
                            <option>Monthly</option>
                            <option>Disabled</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-3 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-save mr-2"></i>Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Security Settings -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800">Security Settings</h3>
            <p class="text-gray-600">Configure security and authentication settings</p>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-teal-50 rounded-lg border border-green-200">
                        <div>
                            <h4 class="font-semibold text-gray-800">Two-Factor Authentication</h4>
                            <p class="text-sm text-gray-600">Enhanced security for admin accounts</p>
                        </div>
                        <div class="relative">
                            <input type="checkbox" class="sr-only" id="2fa">
                            <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                            <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-200">
                        <div>
                            <h4 class="font-semibold text-gray-800">Session Timeout</h4>
                            <p class="text-sm text-gray-600">Auto logout after inactivity</p>
                        </div>
                        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                            <option>30 minutes</option>
                            <option selected>1 hour</option>
                            <option>2 hours</option>
                            <option>4 hours</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-gradient-to-r from-orange-50 to-red-50 rounded-lg border border-orange-200">
                        <div>
                            <h4 class="font-semibold text-gray-800">Login Attempts</h4>
                            <p class="text-sm text-gray-600">Maximum failed login attempts</p>
                        </div>
                        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm">
                            <option>3 attempts</option>
                            <option selected>5 attempts</option>
                            <option>10 attempts</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg border border-purple-200">
                        <h4 class="font-semibold text-gray-800 mb-3">Password Policy</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center text-green-600">
                                <i class="fas fa-check mr-2"></i>
                                <span>Minimum 8 characters</span>
                            </div>
                            <div class="flex items-center text-green-600">
                                <i class="fas fa-check mr-2"></i>
                                <span>Include uppercase letters</span>
                            </div>
                            <div class="flex items-center text-green-600">
                                <i class="fas fa-check mr-2"></i>
                                <span>Include numbers</span>
                            </div>
                            <div class="flex items-center text-green-600">
                                <i class="fas fa-check mr-2"></i>
                                <span>Include special characters</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-gradient-to-r from-gray-50 to-blue-50 rounded-lg border border-gray-200">
                        <h4 class="font-semibold text-gray-800 mb-3">Maintenance Mode</h4>
                        <p class="text-sm text-gray-600 mb-3">Currently: <span class="font-semibold text-green-600">{{ $data['system_settings']['maintenance_mode'] }}</span></p>
                        <button class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-2 rounded-lg text-sm hover:from-orange-600 hover:to-red-700 transition-all duration-300">
                            <i class="fas fa-tools mr-2"></i>Enable Maintenance
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Tools -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-2xl font-bold text-gray-800">System Tools</h3>
            <p class="text-gray-600">System maintenance and diagnostic tools</p>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <button class="flex flex-col items-center p-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-database text-white text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">Backup Database</h4>
                    <p class="text-sm text-gray-600 text-center">Create system backup</p>
                </button>

                <button class="flex flex-col items-center p-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-broom text-white text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">Clear Cache</h4>
                    <p class="text-sm text-gray-600 text-center">Clear system cache</p>
                </button>

                <button class="flex flex-col items-center p-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">System Health</h4>
                    <p class="text-sm text-gray-600 text-center">Check system status</p>
                </button>

                <button class="flex flex-col items-center p-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-orange-500 hover:bg-orange-50 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg mb-4 group-hover:scale-110 transition-transform">
                        <i class="fas fa-sync text-white text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-2">Sync Data</h4>
                    <p class="text-sm text-gray-600 text-center">Synchronize data</p>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection