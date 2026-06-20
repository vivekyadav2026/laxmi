@extends('layouts.admin')

@section('title', 'Users Management - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-navy font-serif mb-1">Users Management</h1>
            <p class="text-sm text-gray-500">Manage all registered users on the platform.</p>
        </div>
        <button class="bg-navy text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#1a365d] transition-colors shadow-sm">
            <i class="fas fa-plus mr-2"></i> Add User
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 flex flex-col items-center justify-center h-64">
        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 text-2xl mb-4">
            <i class="fas fa-users"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-700 mb-1">Users Table Placeholder</h3>
        <p class="text-sm text-gray-500 text-center max-w-md">This is where the datatable containing all user information, roles, and actions will be displayed.</p>
    </div>
@endsection
