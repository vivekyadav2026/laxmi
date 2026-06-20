@extends('layouts.admin')

@section('title', 'Funding Requests - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-navy font-serif mb-1">Funding Requests</h1>
            <p class="text-sm text-gray-500">Review startup applications for VC connections and mentorship.</p>
        </div>
        <div class="flex items-center gap-2">
            <span class="bg-red-100 text-red-600 text-xs font-bold px-3 py-1.5 rounded-lg">3 Pending Approval</span>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 flex flex-col items-center justify-center h-64">
        <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 text-2xl mb-4">
            <i class="fas fa-rocket"></i>
        </div>
        <h3 class="text-lg font-bold text-gray-700 mb-1">Funding Applications Placeholder</h3>
        <p class="text-sm text-gray-500 text-center max-w-md">This is where the list of founders seeking funding, pitch decks, and VC introduction statuses will be managed.</p>
    </div>
@endsection
