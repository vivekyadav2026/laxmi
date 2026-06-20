@extends('layouts.admin')

@section('title', 'Dashboard Overview - Admin Panel')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-navy font-serif mb-1">Dashboard Overview</h1>
            <p class="text-sm text-gray-500">Welcome back, here's what's happening with Foundida today.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="bg-white border border-gray-200 text-gray-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors shadow-sm">
                <i class="fas fa-download mr-2"></i> Export Report
            </button>
            <button class="bg-navy text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#1a365d] transition-colors shadow-sm">
                <i class="fas fa-plus mr-2"></i> New Service
            </button>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gold/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="flex justify-between items-start mb-4 relative z-10">
                <div class="w-12 h-12 bg-navy/5 rounded-xl flex items-center justify-center text-navy text-xl">
                    <i class="fas fa-users"></i>
                </div>
                <span class="bg-green-100 text-green-600 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
                    <i class="fas fa-arrow-up text-[10px]"></i> 12%
                </span>
            </div>
            <div class="relative z-10">
                <h3 class="text-gray-500 text-sm font-medium mb-1">Total Users</h3>
                <p class="text-3xl font-extrabold text-navy font-serif">1,482</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-green-500/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="flex justify-between items-start mb-4 relative z-10">
                <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-600 text-xl">
                    <i class="fas fa-wallet"></i>
                </div>
                <span class="bg-green-100 text-green-600 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
                    <i class="fas fa-arrow-up text-[10px]"></i> 8.5%
                </span>
            </div>
            <div class="relative z-10">
                <h3 class="text-gray-500 text-sm font-medium mb-1">Total Revenue</h3>
                <p class="text-3xl font-extrabold text-navy font-serif">₹2.4M</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-blue-500/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="flex justify-between items-start mb-4 relative z-10">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 text-xl">
                    <i class="fas fa-briefcase"></i>
                </div>
                <span class="bg-gray-100 text-gray-600 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
                    <i class="fas fa-minus text-[10px]"></i> 0%
                </span>
            </div>
            <div class="relative z-10">
                <h3 class="text-gray-500 text-sm font-medium mb-1">Active Services</h3>
                <p class="text-3xl font-extrabold text-navy font-serif">45</p>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-red-500/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110"></div>
            <div class="flex justify-between items-start mb-4 relative z-10">
                <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center text-red-600 text-xl">
                    <i class="fas fa-rocket"></i>
                </div>
                <span class="bg-red-100 text-red-600 text-xs font-bold px-2.5 py-1 rounded-full flex items-center gap-1">
                    <i class="fas fa-arrow-down text-[10px]"></i> 3%
                </span>
            </div>
            <div class="relative z-10">
                <h3 class="text-gray-500 text-sm font-medium mb-1">Funding Requests</h3>
                <p class="text-3xl font-extrabold text-navy font-serif">12</p>
            </div>
        </div>
    </div>

    <!-- Main Grid Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left: Recent Activity Table (2 columns wide) -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 flex flex-col">
            <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-lg font-bold text-navy font-serif">Recent Service Requests</h2>
                <a href="/admin/services" class="text-sm font-bold text-gold hover:text-navy transition-colors">View All</a>
            </div>
            <div class="p-0 overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Client</th>
                            <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Service</th>
                            <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="py-3 px-6 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-6 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Rohan+Sharma&background=random" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="font-bold text-gray-800">Rohan Sharma</p>
                                    <p class="text-xs text-gray-500">rohan@example.com</p>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-medium text-gray-700">Pvt Ltd Registration</td>
                            <td class="py-4 px-6 text-gray-500">Today, 10:23 AM</td>
                            <td class="py-4 px-6">
                                <span class="bg-yellow-100 text-yellow-700 text-[10px] font-bold px-2 py-1 rounded-md uppercase tracking-wider">Pending</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button class="text-gray-400 hover:text-navy transition-colors"><i class="fas fa-ellipsis-v"></i></button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-6 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Neha+Gupta&background=random" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="font-bold text-gray-800">Neha Gupta</p>
                                    <p class="text-xs text-gray-500">neha.g@example.com</p>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-medium text-gray-700">GST Registration</td>
                            <td class="py-4 px-6 text-gray-500">Yesterday</td>
                            <td class="py-4 px-6">
                                <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded-md uppercase tracking-wider">Completed</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button class="text-gray-400 hover:text-navy transition-colors"><i class="fas fa-ellipsis-v"></i></button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-6 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Amit+Patel&background=random" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="font-bold text-gray-800">Amit Patel</p>
                                    <p class="text-xs text-gray-500">amit.p@startup.in</p>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-medium text-gray-700">Funding Subscription</td>
                            <td class="py-4 px-6 text-gray-500">18 Jun, 2026</td>
                            <td class="py-4 px-6">
                                <span class="bg-blue-100 text-blue-700 text-[10px] font-bold px-2 py-1 rounded-md uppercase tracking-wider">In Progress</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button class="text-gray-400 hover:text-navy transition-colors"><i class="fas fa-ellipsis-v"></i></button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-6 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Priya+Singh&background=random" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="font-bold text-gray-800">Priya Singh</p>
                                    <p class="text-xs text-gray-500">priya@retail.in</p>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-medium text-gray-700">Trademark Filing</td>
                            <td class="py-4 px-6 text-gray-500">15 Jun, 2026</td>
                            <td class="py-4 px-6">
                                <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2 py-1 rounded-md uppercase tracking-wider">Completed</span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button class="text-gray-400 hover:text-navy transition-colors"><i class="fas fa-ellipsis-v"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right: Recent Signups or Upcoming Tasks -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 flex flex-col">
            <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-lg font-bold text-navy font-serif">Quick Actions</h2>
            </div>
            <div class="p-6">
                <!-- Action 1 -->
                <a href="#" class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-gold/50 hover:bg-gold/5 transition-colors mb-4 group">
                    <div class="w-10 h-10 rounded-lg bg-navy/5 text-navy flex items-center justify-center group-hover:bg-gold group-hover:text-white transition-colors">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-800">Draft New Document</h4>
                        <p class="text-xs text-gray-500">Create legal draft for clients</p>
                    </div>
                    <i class="fas fa-chevron-right ml-auto text-gray-300 text-xs"></i>
                </a>

                <!-- Action 2 -->
                <a href="#" class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-gold/50 hover:bg-gold/5 transition-colors mb-4 group">
                    <div class="w-10 h-10 rounded-lg bg-navy/5 text-navy flex items-center justify-center group-hover:bg-gold group-hover:text-white transition-colors">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-800">Send Announcement</h4>
                        <p class="text-xs text-gray-500">Email all active users</p>
                    </div>
                    <i class="fas fa-chevron-right ml-auto text-gray-300 text-xs"></i>
                </a>

                <!-- Action 3 -->
                <a href="#" class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 hover:border-gold/50 hover:bg-gold/5 transition-colors group">
                    <div class="w-10 h-10 rounded-lg bg-navy/5 text-navy flex items-center justify-center group-hover:bg-gold group-hover:text-white transition-colors">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-gray-800">View Analytics</h4>
                        <p class="text-xs text-gray-500">Check detailed traffic stats</p>
                    </div>
                    <i class="fas fa-chevron-right ml-auto text-gray-300 text-xs"></i>
                </a>
            </div>
            
            <!-- Small Chart Area Placeholder -->
            <div class="mt-auto px-6 pb-6">
                <div class="bg-gray-50 rounded-xl p-4 flex flex-col items-center justify-center h-32 border border-gray-100 border-dashed">
                    <i class="fas fa-chart-area text-3xl text-gray-300 mb-2"></i>
                    <p class="text-xs font-semibold text-gray-400">Weekly Traffic Chart Placeholder</p>
                </div>
            </div>
        </div>
    </div>
@endsection
