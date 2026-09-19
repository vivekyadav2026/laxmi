<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lawyer Dashboard - Foundida</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .bg-navy { background-color: #0A1628; }
        .text-navy { color: #0A1628; }
        .border-navy { border-color: #0A1628; }
        .bg-gold { background-color: #C9933A; }
        .text-gold { color: #C9933A; }
        .border-gold { border-color: #C9933A; }
        .hover\:bg-gold-light:hover { background-color: #D4A353; }
    </style>
</head>
<body class="text-gray-800 antialiased" x-data="{ sidebarOpen: false }">

<div class="min-h-screen flex">
    
    <!-- MOBILE OVERLAY -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-20 bg-black/50 lg:hidden" @click="sidebarOpen = false" x-transition.opacity></div>

    <!-- SIDEBAR (Left 240px Navy) -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-[240px] bg-navy text-white transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-auto flex flex-col shadow-2xl">
        <!-- Logo Area -->
        <div class="flex items-center justify-between p-6 border-b border-navy-600/50">
            <a href="/" class="flex items-center group">
                <div class="w-8 h-8 bg-gold rounded flex items-center justify-center mr-2 shadow-sm group-hover:-translate-y-0.5 transition-transform">
                    <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-serif text-lg font-bold text-white leading-tight">Law Platform</span>
                </div>
            </a>
            <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Lawyer Profile -->
        <div class="p-6 border-b border-navy-600/50 flex items-center">
            <div class="w-12 h-12 rounded-full bg-gold/20 border-2 border-gold flex items-center justify-center text-gold font-bold text-lg shrink-0 mr-3 overflow-hidden">
                <img src="https://i.pravatar.cc/150?u=a042581f4e29026704d" alt="Lawyer" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col overflow-hidden">
                <span class="font-bold text-sm truncate leading-tight mb-0.5">Adv R. Sharma</span>
                <div class="flex items-center text-[10px] text-gray-400 mt-0.5">
                    <svg class="w-3 h-3 mr-1 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span>Delhi</span>
                </div>
            </div>
        </div>

        <!-- Nav Items -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="#" class="flex items-center px-4 py-3 bg-gold/10 text-gold rounded-xl border border-gold/20 group transition-colors">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span class="font-bold text-sm">Dashboard</span>
            </a>
            
            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span class="font-bold text-sm">My Clients</span>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="font-bold text-sm">Schedule</span>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="font-bold text-sm">Earnings</span>
            </a>
            
            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span class="font-bold text-sm">Profile</span>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                <span class="font-bold text-sm">Reviews</span>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="font-bold text-sm">Settings</span>
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-navy-600/50">
            <a href="#" class="flex items-center px-4 py-3 text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <span class="font-bold text-sm">Logout</span>
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col min-w-0 bg-gray-50 overflow-y-auto h-screen">
        
        <!-- Mobile Header -->
        <div class="lg:hidden bg-white border-b border-gray-200 p-4 flex items-center justify-between sticky top-0 z-10">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gold rounded flex items-center justify-center mr-2 shadow-sm">
                    <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
            </div>
            <button @click="sidebarOpen = true" class="text-navy hover:text-gold transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

        <div class="p-6 md:p-8 max-w-7xl mx-auto w-full space-y-8">
            
            <!-- Welcome Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex flex-col">
                    <h1 class="text-2xl md:text-3xl font-bold text-navy font-serif mb-1">Welcome back, Adv Sharma!</h1>
                </div>
            </div>

            <!-- TOP STATS -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach($stats as $stat)
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:-translate-y-1 transition-transform group relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-16 h-16 bg-gray-50 rounded-full group-hover:bg-gold/10 transition-colors"></div>
                    <div class="flex justify-between items-start relative z-10">
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-gray-500 mb-2 leading-tight">{{ $stat['title_en'] }}</span>
                            <span class="text-3xl font-extrabold text-navy group-hover:text-gold transition-colors">{{ $stat['value'] }}</span>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-gold/10 text-gold flex items-center justify-center shrink-0">
                            @if($stat['icon'] == 'users')
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            @elseif($stat['icon'] == 'clock')
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            @elseif($stat['icon'] == 'star')
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                            @else
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                
                <!-- LEFT COLUMN -->
                <div class="xl:col-span-2 space-y-8">
                    
                    <!-- TODAY'S SCHEDULE -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                            <h3 class="text-lg font-bold text-navy font-serif">Today's Schedule</h3>
                            <button class="text-gold hover:text-navy font-bold text-sm transition-colors">
                                View All
                            </button>
                        </div>
                        <div class="p-6">
                            <div class="space-y-6 relative before:absolute before:inset-0 before:ml-10 before:-translate-x-px md:before:ml-[70px] md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-gray-200 before:to-transparent">
                                @foreach($schedule as $slot)
                                <div class="relative flex items-start group">
                                    <div class="w-16 md:w-20 pt-1 shrink-0 flex flex-col md:text-right pr-4">
                                        <span class="text-sm font-bold text-navy">{{ explode(' ', $slot['time'])[0] }}</span>
                                        <span class="text-[10px] font-bold text-gray-400">{{ explode(' ', $slot['time'])[1] }}</span>
                                    </div>
                                    <div class="absolute left-10 md:left-[70px] -translate-x-1/2 mt-1.5 w-3 h-3 rounded-full bg-gold border-2 border-white ring-4 ring-gray-50"></div>
                                    
                                    <div class="pl-8 flex-1">
                                        <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm hover:border-gold hover:shadow-md transition-all flex flex-col md:flex-row justify-between md:items-center gap-4">
                                            <div class="flex flex-col">
                                                <span class="font-bold text-navy text-sm mb-2">{{ $slot['client_en'] }}</span>
                                                
                                                <div class="flex flex-wrap gap-2">
                                                    <span class="px-2.5 py-1 bg-gray-50 border border-gray-200 rounded text-xs font-semibold text-gray-700">
                                                        {{ $slot['service_en'] }}
                                                    </span>
                                                    <span class="px-2.5 py-1 bg-blue-50 border border-blue-100 rounded text-xs font-semibold text-blue-700">
                                                        {{ $slot['type_en'] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="shrink-0 flex items-center">
                                                @if($slot['action'] == 'join')
                                                <button class="bg-gold text-navy hover:bg-gold-light px-6 py-2.5 rounded-lg font-bold text-xs transition-all shadow-sm hover:-translate-y-0.5 w-full md:w-auto">
                                                    Join Call
                                                </button>
                                                @else
                                                <button class="bg-green-50 text-green-700 border border-green-200 hover:bg-green-100 px-6 py-2.5 rounded-lg font-bold text-xs transition-all w-full md:w-auto">
                                                    Mark Done
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- EARNINGS CHART -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <div class="flex flex-col mb-6">
                            <h3 class="text-lg font-bold text-navy font-serif">Earnings Overview (Last 6 Months)</h3>
                        </div>
                        <div class="flex justify-between items-center mb-6 px-4 py-3 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-gold rounded-sm mr-2"></div>
                                <span class="text-xs font-bold text-gray-700">Net Payout</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-navy rounded-sm mr-2 opacity-20"></div>
                                <span class="text-xs font-bold text-gray-700">Platform Fee (15%)</span>
                            </div>
                        </div>
                        <div class="h-[250px] w-full">
                            <canvas id="earningsChart"></canvas>
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="space-y-8">
                    
                    <!-- PENDING REQUESTS -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <div class="flex flex-col mb-6">
                            <h3 class="text-lg font-bold text-navy font-serif">Client Requests</h3>
                        </div>
                        
                        <div class="space-y-4">
                            @foreach($requests as $req)
                            <div class="p-4 border border-gray-100 rounded-xl bg-gray-50 hover:bg-white hover:border-gold hover:shadow-md transition-all group">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-navy text-sm">{{ $req['client_en'] }}</span>
                                    </div>
                                    <div class="text-right flex flex-col">
                                        <span class="font-bold text-green-600 text-sm">{{ $req['budget'] }}</span>
                                        <span class="text-[9px] uppercase font-bold text-gray-400">Budget</span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <span class="inline-flex px-2.5 py-1 bg-gray-200 text-gray-700 text-xs font-semibold rounded">
                                        {{ $req['issue_en'] }}
                                    </span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <button class="flex-1 bg-gold text-navy hover:bg-gold-light py-2 rounded-lg font-bold text-xs transition-all shadow-sm">
                                        Accept
                                    </button>
                                    <button class="flex-1 bg-white border border-gray-300 text-red-500 hover:border-red-500 py-2 rounded-lg font-bold text-xs transition-all shadow-sm">
                                        Decline
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- PROFILE COMPLETION -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 sticky top-6">
                        <div class="flex flex-col mb-6">
                            <h3 class="text-lg font-bold text-navy font-serif">Profile Completion</h3>
                        </div>
                        
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-2xl font-bold text-navy">{{ $profile['completion'] }}%</span>
                            <span class="text-xs font-bold text-gold">Great Job!</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2.5 mb-6 overflow-hidden">
                            <div class="bg-gold h-2.5 rounded-full" style="width: {{ $profile['completion'] }}%"></div>
                        </div>

                        <div class="space-y-4">
                            @foreach($profile['steps'] as $step)
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold {{ $step['done'] ? 'text-gray-700' : 'text-gray-400' }}">{{ $step['name_en'] }}</span>
                                @if($step['done'])
                                <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                @else
                                <div class="w-6 h-6 rounded-full border-2 border-gray-200 shrink-0"></div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        
                        @if($profile['completion'] < 100)
                        <button class="w-full mt-6 bg-navy text-white hover:bg-navy-800 py-3 rounded-xl font-bold text-sm transition-all shadow-sm hover:-translate-y-0.5">
                            Complete Profile
                        </button>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('earningsChart').getContext('2d');
    
    // Parse PHP arrays to JS
    const labels = {!! json_encode($chartData['labels']) !!};
    const gross = {!! json_encode($chartData['gross']) !!};
    const net = {!! json_encode($chartData['net']) !!};
    
    // Calculate platform fee array
    const fee = gross.map((val, i) => val - net[i]);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Net Payout',
                    data: net,
                    backgroundColor: '#C9933A', // Gold
                    borderRadius: 4,
                },
                {
                    label: 'Platform Fee (15%)',
                    data: fee,
                    backgroundColor: 'rgba(10, 22, 40, 0.1)', // Navy faded
                    borderRadius: 4,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    stacked: true,
                    grid: { display: false }
                },
                y: {
                    stacked: true,
                    border: { display: false },
                    grid: { color: '#f3f4f6' },
                    ticks: {
                        callback: function(value) {
                            return '₹' + (value/1000) + 'k';
                        }
                    }
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) { label += ': '; }
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 }).format(context.parsed.y);
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
});
</script>

</body>
</html>
