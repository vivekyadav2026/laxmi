@extends('layouts.admin')

@section('title', 'Users Management - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Users Management</h1>
            <p class="text-sm text-gray-400">Manage all registered users on the platform.</p>
        </div>
        <button class="bg-gradient-to-r from-gold to-[#a88d30] text-navy px-5 py-2.5 rounded-xl text-sm font-bold hover:from-[#e2b54d] hover:to-[#c6a83d] transition-all shadow-lg shadow-gold/20 hover:shadow-gold/40 hover:-translate-y-0.5">
            <i class="fas fa-plus mr-2"></i> Add User
        </button>
    </div>

    <div class="bg-white/5 backdrop-blur-xl rounded-3xl shadow-lg border border-white/10 p-12 flex flex-col items-center justify-center h-80 relative z-10">
        <div class="w-20 h-20 bg-navy/40 border border-white/5 rounded-full flex items-center justify-center text-gray-400 text-3xl mb-6 shadow-inner">
            <i class="fas fa-users"></i>
        </div>
        <h3 class="text-xl font-bold text-white mb-2 font-serif">Users Table Placeholder</h3>
        <p class="text-sm text-gray-400 text-center max-w-md leading-relaxed">This is where the datatable containing all user information, roles, and actions will be displayed.</p>
    </div>
@endsection
