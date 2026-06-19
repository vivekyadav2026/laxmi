<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>एडमिन पैनल | Admin Panel - Foundida</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Sans+Devanagari:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Inter', 'Noto Sans Devanagari', sans-serif; background-color: #f8f9fa; }
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

    <!-- SIDEBAR (Left 250px Navy) -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-[250px] bg-navy text-white transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-auto flex flex-col shadow-2xl">
        <!-- Logo Area -->
        <div class="flex items-center justify-between p-6 border-b border-navy-600/50 bg-navy-800">
            <a href="/" class="flex items-center group">
                <div class="w-8 h-8 bg-gold rounded flex items-center justify-center mr-3 shadow-sm group-hover:-translate-y-0.5 transition-transform">
                    <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-serif text-lg font-bold text-white leading-tight">लॉ प्लेटफॉर्म</span>
                    <span class="text-[9px] uppercase tracking-widest text-gold font-bold">Admin Panel</span>
                </div>
            </a>
            <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Nav Items -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="#" class="flex items-center px-4 py-3 bg-gold/10 text-gold rounded-xl border border-gold/20 group transition-colors">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">डैशबोर्ड</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold opacity-80">Dashboard</span>
                </div>
            </a>
            
            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">उपयोगकर्ता</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">Users</span>
                </div>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">वकील</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">Lawyers</span>
                </div>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">ऑर्डर</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">Orders</span>
                </div>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">दस्तावेज़</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">Documents</span>
                </div>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">भुगतान</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">Payments</span>
                </div>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">रिपोर्ट्स</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">Reports</span>
                </div>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">सेटिंग्स</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">Settings</span>
                </div>
            </a>
        </nav>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col min-w-0 bg-gray-50 overflow-y-auto h-screen">
        
        <!-- Mobile Header -->
        <div class="lg:hidden bg-white border-b border-gray-200 p-4 flex items-center justify-between sticky top-0 z-10 shadow-sm">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gold rounded flex items-center justify-center mr-2 shadow-sm">
                    <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
            </div>
            <button @click="sidebarOpen = true" class="text-navy hover:text-gold transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

        <div class="p-6 md:p-8 max-w-[1400px] mx-auto w-full space-y-8">
            
            <!-- Welcome Header -->
            <div class="flex flex-col">
                <h1 class="text-2xl md:text-3xl font-bold text-navy font-serif mb-1">एडमिन अवलोकन</h1>
                <span class="text-[11px] uppercase font-bold tracking-widest text-gray-500">Admin Overview</span>
            </div>

            <!-- TOP KPIs -->
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-4">
                @foreach($kpis as $kpi)
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:-translate-y-1 transition-transform group relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-16 h-16 bg-gray-50 rounded-full group-hover:bg-gold/10 transition-colors"></div>
                    <div class="flex flex-col relative z-10">
                        <div class="w-8 h-8 rounded-lg bg-navy/5 text-navy flex items-center justify-center mb-3 group-hover:bg-gold/10 group-hover:text-gold transition-colors">
                            @if($kpi['icon'] == 'users')
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            @elseif($kpi['icon'] == 'academic-cap')
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                            @elseif($kpi['icon'] == 'shopping-cart')
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            @elseif($kpi['icon'] == 'currency-rupee')
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            @elseif($kpi['icon'] == 'shield-check')
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            @else
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                            @endif
                        </div>
                        <span class="text-[11px] font-bold text-gray-500 mb-0.5 leading-tight">{{ $kpi['title_hi'] }}</span>
                        <span class="text-[8px] uppercase tracking-widest text-gray-400 font-bold mb-2">{{ $kpi['title_en'] }}</span>
                        <span class="text-2xl font-extrabold text-navy group-hover:text-gold transition-colors">{{ $kpi['value'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- CHARTS ROW -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Line Chart -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <div class="flex flex-col mb-6">
                        <h3 class="text-lg font-bold text-navy font-serif mb-0.5">राजस्व (पिछले 12 महीने)</h3>
                        <span class="text-[10px] uppercase font-bold tracking-widest text-gold">Revenue (Last 12 Months)</span>
                    </div>
                    <div class="h-[300px] w-full">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
                
                <!-- Pie Chart -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <div class="flex flex-col mb-6">
                        <h3 class="text-lg font-bold text-navy font-serif mb-0.5">सेवा के अनुसार ऑर्डर</h3>
                        <span class="text-[10px] uppercase font-bold tracking-widest text-gold">Orders by Service Type</span>
                    </div>
                    <div class="h-[300px] w-full relative">
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                <!-- RECENT ORDERS TABLE (Col Span 2) -->
                <div class="xl:col-span-2 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row justify-between md:items-center gap-4">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-navy font-serif mb-0.5">हाल के ऑर्डर</h3>
                                <span class="text-[10px] uppercase font-bold tracking-widest text-gold">Recent Orders</span>
                            </div>
                            
                            <div class="flex flex-wrap gap-3">
                                <select class="min-h-[48px] border border-gray-200 rounded-lg text-sm text-navy px-4 font-bold bg-gray-50 focus:border-gold focus:ring-gold outline-none">
                                    <option value="all">सभी / All</option>
                                    <option value="pending">लंबित / Pending</option>
                                    <option value="processing">प्रगति पर / Processing</option>
                                    <option value="completed">पूर्ण / Completed</option>
                                    <option value="cancelled">रद्द / Cancelled</option>
                                </select>
                                <button class="bg-navy text-white hover:bg-navy-800 min-h-[48px] px-5 rounded-lg font-bold transition-all flex flex-col items-center justify-center hover:-translate-y-1 shadow-sm">
                                    <span class="text-[13px] leading-tight">CSV निर्यात करें</span>
                                    <span class="text-[9px] uppercase tracking-widest mt-0.5">Export CSV</span>
                                </button>
                            </div>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse whitespace-nowrap">
                                <thead>
                                    <tr class="bg-gray-50 border-b border-gray-100">
                                        <th class="p-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Order ID</th>
                                        <th class="p-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">User</th>
                                        <th class="p-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Service</th>
                                        <th class="p-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Amount</th>
                                        <th class="p-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Status</th>
                                        <th class="p-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest">Date</th>
                                        <th class="p-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentOrders as $order)
                                    <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                                        <td class="p-4 font-bold text-navy text-sm">{{ $order['id'] }}</td>
                                        <td class="p-4 text-sm font-semibold text-gray-700">{{ $order['user'] }}</td>
                                        <td class="p-4 text-sm font-semibold text-gray-700">{{ $order['service'] }}</td>
                                        <td class="p-4 text-sm font-bold text-green-600">{{ $order['amount'] }}</td>
                                        <td class="p-4">
                                            @if($order['status'] == 'Pending')
                                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold">Pending</span>
                                            @elseif($order['status'] == 'Processing')
                                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">Processing</span>
                                            @elseif($order['status'] == 'Completed')
                                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">Completed</span>
                                            @endif
                                        </td>
                                        <td class="p-4 text-xs text-gray-500 font-medium">{{ $order['date'] }}</td>
                                        <td class="p-4 text-center">
                                            <button class="min-h-[48px] px-4 bg-white border border-gray-300 text-navy hover:border-gold hover:text-gold rounded-lg shadow-sm font-bold transition-colors flex flex-col items-center justify-center mx-auto">
                                                <span class="text-[12px] leading-tight">विवरण</span>
                                                <span class="text-[8px] uppercase tracking-widest mt-0.5">View</span>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- LAWYER VERIFICATION QUEUE -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <div class="flex flex-col mb-6">
                            <h3 class="text-lg font-bold text-navy font-serif mb-0.5">वकील सत्यापन कतार</h3>
                            <span class="text-[10px] uppercase font-bold tracking-widest text-gold">Lawyer Verification Queue</span>
                        </div>
                        
                        <div class="space-y-4">
                            @foreach($verifications as $v)
                            <div class="p-4 border border-gray-100 rounded-xl bg-gray-50 flex flex-col md:flex-row justify-between md:items-center gap-4 hover:border-gold transition-colors">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-navy/5 text-navy rounded-full flex items-center justify-center font-bold">
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-navy text-sm">{{ $v['name'] }}</span>
                                        <span class="text-xs text-gray-500 font-semibold mb-1">{{ $v['city'] }} • {{ $v['reg'] }}</span>
                                        <a href="#" class="text-[11px] text-blue-600 font-bold hover:underline flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                            {{ $v['docs'] }} Documents Attached
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 shrink-0">
                                    <button class="min-h-[48px] px-5 bg-gold text-navy hover:bg-gold-light rounded-lg font-bold transition-all shadow-sm flex flex-col items-center justify-center hover:-translate-y-1">
                                        <span class="text-[13px] leading-tight">सत्यापित करें</span>
                                        <span class="text-[9px] uppercase tracking-widest mt-0.5">Verify</span>
                                    </button>
                                    <button class="min-h-[48px] px-5 bg-white border border-gray-300 text-red-500 hover:border-red-500 rounded-lg font-bold transition-all shadow-sm flex flex-col items-center justify-center hover:-translate-y-1">
                                        <span class="text-[13px] leading-tight">अस्वीकार</span>
                                        <span class="text-[9px] uppercase tracking-widest mt-0.5">Reject</span>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="space-y-6">
                    <!-- CITY COVERAGE MAP -->
                    <div class="bg-navy rounded-2xl shadow-sm border border-navy-600 p-6 text-white overflow-hidden relative">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
                        <div class="relative z-10 flex flex-col mb-8">
                            <h3 class="text-lg font-bold font-serif mb-0.5">शहर कवरेज</h3>
                            <span class="text-[10px] uppercase font-bold tracking-widest text-gold">City Coverage (India)</span>
                        </div>
                        
                        <div class="relative z-10 w-full h-[300px] flex items-center justify-center bg-navy-800 rounded-xl border border-navy-600 overflow-hidden group">
                            <!-- SVG Placeholder for India Map -->
                            <svg class="w-full h-full text-navy-600 p-4" viewBox="0 0 100 100" fill="currentColor">
                                <path d="M40 10 L50 5 L60 10 L65 25 L75 30 L80 45 L70 60 L60 70 L50 90 L40 70 L30 60 L20 45 L25 30 L35 25 Z" opacity="0.3"></path>
                            </svg>
                            
                            <!-- Dots (Tier 1 & Tier 2/3 Gold) -->
                            <!-- Delhi -->
                            <div class="absolute top-[25%] left-[45%] w-3 h-3 bg-white rounded-full shadow-[0_0_10px_rgba(255,255,255,0.8)] animate-pulse"></div>
                            <!-- Mumbai -->
                            <div class="absolute top-[55%] left-[30%] w-3 h-3 bg-white rounded-full shadow-[0_0_10px_rgba(255,255,255,0.8)] animate-pulse" style="animation-delay: 1s;"></div>
                            <!-- Bangalore -->
                            <div class="absolute top-[75%] left-[40%] w-3 h-3 bg-white rounded-full shadow-[0_0_10px_rgba(255,255,255,0.8)] animate-pulse" style="animation-delay: 2s;"></div>
                            
                            <!-- Tier 2/3 (Gold) -->
                            <div class="absolute top-[40%] left-[35%] w-2 h-2 bg-gold rounded-full shadow-[0_0_8px_#C9933A]"></div>
                            <div class="absolute top-[35%] left-[55%] w-2 h-2 bg-gold rounded-full shadow-[0_0_8px_#C9933A]"></div>
                            <div class="absolute top-[45%] left-[65%] w-2 h-2 bg-gold rounded-full shadow-[0_0_8px_#C9933A]"></div>
                            <div class="absolute top-[60%] left-[45%] w-2 h-2 bg-gold rounded-full shadow-[0_0_8px_#C9933A]"></div>
                        </div>

                        <div class="relative z-10 mt-6 flex justify-between items-center text-xs font-bold">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-white rounded-full mr-2"></div>
                                <span class="text-gray-300">Tier 1</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-gold rounded-full mr-2"></div>
                                <span class="text-gold">Tier 2/3</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Line Chart
    const lineCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($lineChart['labels']) !!},
            datasets: [{
                label: 'राजस्व / Revenue (₹ Lakhs)',
                data: {!! json_encode($lineChart['data']) !!},
                borderColor: '#C9933A',
                backgroundColor: 'rgba(201, 147, 58, 0.1)',
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#0A1628',
                pointBorderColor: '#C9933A',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: { grid: { display: false } },
                y: { 
                    grid: { borderDash: [4, 4] },
                    ticks: { callback: function(val) { return '₹' + val + 'L'; } }
                }
            }
        }
    });

    // Pie Chart
    const pieCtx = document.getElementById('ordersChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($pieChart['labels']) !!},
            datasets: [{
                data: {!! json_encode($pieChart['data']) !!},
                backgroundColor: [
                    '#0A1628', // Navy
                    '#C9933A', // Gold
                    '#2c3e50', // Lighter Navy
                    '#D4A353', // Lighter Gold
                    '#e5e7eb'  // Gray
                ],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: { family: 'Inter', weight: 'bold', size: 11 }
                    }
                }
            }
        }
    });
});
</script>

</body>
</html>
