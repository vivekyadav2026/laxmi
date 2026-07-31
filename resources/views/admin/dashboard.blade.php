@extends('layouts.admin')

@section('title', 'Dashboard Overview - Admin Panel')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Dashboard Overview</h1>
            <p class="text-sm text-gray-400">Welcome back, here's what's happening with Foundida today.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="bg-white/5 backdrop-blur-md border border-white/10 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                <i class="fas fa-download mr-2 text-gold"></i> Export Report
            </button>
            <button class="bg-gradient-to-r from-gold to-[#a88d30] text-navy px-5 py-2.5 rounded-xl text-sm font-bold hover:from-[#e2b54d] hover:to-[#c6a83d] transition-all shadow-lg shadow-gold/20 hover:shadow-gold/40 hover:-translate-y-0.5">
                <i class="fas fa-plus mr-2"></i> New Service
            </button>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 relative z-10">
        @foreach($kpis as $index => $kpi)
            @php
                $colors = [
                    'bg-gradient-to-br from-blue-500/20 to-blue-600/5 border-blue-500/20 text-blue-400',
                    'bg-gradient-to-br from-purple-500/20 to-purple-600/5 border-purple-500/20 text-purple-400',
                    'bg-gradient-to-br from-green-500/20 to-green-600/5 border-green-500/20 text-green-400',
                    'bg-gradient-to-br from-gold/20 to-gold/5 border-gold/20 text-gold',
                    'bg-gradient-to-br from-orange-500/20 to-orange-600/5 border-orange-500/20 text-orange-400',
                    'bg-gradient-to-br from-red-500/20 to-red-600/5 border-red-500/20 text-red-400'
                ];
                $colorClass = $colors[$index % count($colors)];
            @endphp
            <div class="bg-white/5 backdrop-blur-xl rounded-3xl p-6 border border-white/10 shadow-lg relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-bl-full -mr-8 -mt-8 transition-transform duration-500 group-hover:scale-110"></div>
                
                <div class="flex justify-between items-start mb-4 relative z-10">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-2xl {{ $colorClass }} shadow-inner">
                        <i class="fas fa-{{ $kpi['icon'] }}"></i>
                    </div>
                    <span class="bg-white/10 text-white border border-white/10 text-[10px] font-bold px-3 py-1 rounded-full backdrop-blur-md">
                        This Month
                    </span>
                </div>
                <div class="relative z-10">
                    <h3 class="text-gray-400 text-sm font-semibold mb-1 uppercase tracking-wider">{{ $kpi['title_en'] }}</h3>
                    <p class="text-3xl font-extrabold text-white font-serif tracking-tight drop-shadow-sm">{{ $kpi['value'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Main Grid Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 relative z-10">
        
        <!-- Left: Recent Activity Table -->
        <div class="lg:col-span-2 bg-white/5 backdrop-blur-xl rounded-3xl shadow-lg border border-white/10 flex flex-col overflow-hidden">
            <div class="px-8 py-6 border-b border-white/10 flex items-center justify-between bg-white/5">
                <h2 class="text-lg font-bold text-white font-serif">Recent Callback & Consultation Requests</h2>
                <a href="{{ route('admin.callbacks.index') }}" class="text-sm font-bold text-gold hover:text-white transition-colors">View All Lead Requests</a>
            </div>
            <div class="p-0 overflow-x-auto">
                @if($recentCallbacks->isEmpty())
                    <div class="p-12 text-center flex flex-col items-center justify-center">
                        <div class="w-14 h-14 bg-navy/40 border border-white/5 rounded-full flex items-center justify-center text-gray-400 text-xl mb-3 shadow-inner">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <h4 class="text-base font-bold text-white font-serif mb-1">No Recent Callback Requests</h4>
                        <p class="text-xs text-gray-400 max-w-sm">When visitors submit the "Ask Experts" form on the homepage, requests will show up here instantly.</p>
                    </div>
                @else
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-black/20 border-b border-white/5 text-xs font-bold text-gray-400 uppercase tracking-wider">
                                <th class="py-4 px-8">Client</th>
                                <th class="py-4 px-8">Mobile Number</th>
                                <th class="py-4 px-8">Service</th>
                                <th class="py-4 px-8">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-sm">
                            @foreach($recentCallbacks as $cb)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="py-5 px-8 font-bold text-white">
                                    {{ $cb->name }}
                                    <div class="text-xs text-gray-400 font-normal">{{ $cb->created_at->format('d M, h:i A') }}</div>
                                </td>
                                <td class="py-5 px-8 font-semibold text-gray-300">
                                    <a href="tel:+91{{ $cb->phone }}" class="hover:text-gold transition-colors">+91 {{ $cb->phone }}</a>
                                </td>
                                <td class="py-5 px-8 font-semibold text-gold">{{ ucfirst(str_replace('-', ' ', $cb->service)) }}</td>
                                <td class="py-5 px-8">
                                    @if($cb->status == 'contacted')
                                        <span class="bg-green-500/20 border border-green-500/30 text-green-400 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Contacted</span>
                                    @else
                                        <span class="bg-yellow-500/20 border border-yellow-500/30 text-yellow-400 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- Right: Quick Actions -->
        <div class="bg-white/5 backdrop-blur-xl rounded-3xl shadow-lg border border-white/10 flex flex-col">
            <div class="px-8 py-6 border-b border-white/10 flex items-center justify-between bg-white/5">
                <h2 class="text-lg font-bold text-white font-serif">Quick Actions</h2>
            </div>
            <div class="p-6 space-y-4">
                <!-- Action 1 -->
                <a href="{{ route('admin.packages.create') }}" class="flex items-center gap-4 p-4 rounded-2xl border border-white/5 bg-white/5 hover:border-gold/30 hover:bg-gold/10 transition-all group shadow-md">
                    <div class="w-12 h-12 rounded-xl bg-navy text-gold flex items-center justify-center group-hover:bg-gold group-hover:text-navy transition-colors shadow-inner border border-white/10">
                        <i class="fas fa-box text-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-200">Add Combo Package</h4>
                        <p class="text-xs text-gray-400">Create new legal or tech package</p>
                    </div>
                    <i class="fas fa-chevron-right ml-auto text-gray-600 group-hover:text-gold transition-colors text-xs"></i>
                </a>

                <!-- Action 2 -->
                <a href="{{ route('admin.callbacks.index') }}" class="flex items-center gap-4 p-4 rounded-2xl border border-white/5 bg-white/5 hover:border-gold/30 hover:bg-gold/10 transition-all group shadow-md">
                    <div class="w-12 h-12 rounded-xl bg-navy text-gold flex items-center justify-center group-hover:bg-gold group-hover:text-navy transition-colors shadow-inner border border-white/10">
                        <i class="fas fa-phone-alt text-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-200">Callback Requests</h4>
                        <p class="text-xs text-gray-400">View customer call requests</p>
                    </div>
                    <i class="fas fa-chevron-right ml-auto text-gray-600 group-hover:text-gold transition-colors text-xs"></i>
                </a>

                <!-- Action 3 -->
                <a href="{{ route('admin.settings') }}" class="flex items-center gap-4 p-4 rounded-2xl border border-white/5 bg-white/5 hover:border-gold/30 hover:bg-gold/10 transition-all group shadow-md">
                    <div class="w-12 h-12 rounded-xl bg-navy text-gold flex items-center justify-center group-hover:bg-gold group-hover:text-navy transition-colors shadow-inner border border-white/10">
                        <i class="fas fa-user-shield text-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-200">Update Security</h4>
                        <p class="text-xs text-gray-400">Manage admin password & profile</p>
                    </div>
                    <i class="fas fa-chevron-right ml-auto text-gray-600 group-hover:text-gold transition-colors text-xs"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
