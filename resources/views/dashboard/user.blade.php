<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>डैशबोर्ड | Dashboard - Foundida</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Sans+Devanagari:wght@400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AlpineJS for mobile menu -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

    <!-- SIDEBAR (Left 240px Navy) -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-[240px] bg-navy text-white transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-auto flex flex-col shadow-2xl">
        <!-- Logo Area -->
        <div class="flex items-center justify-between p-6 border-b border-navy-600/50">
            <a href="/" class="flex items-center group">
                <div class="w-8 h-8 bg-gold rounded flex items-center justify-center mr-2 shadow-sm group-hover:-translate-y-0.5 transition-transform">
                    <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-serif text-lg font-bold text-white leading-tight">लॉ प्लेटफॉर्म</span>
                </div>
            </a>
            <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- User Profile -->
        <div class="p-6 border-b border-navy-600/50 flex items-center">
            <div class="w-12 h-12 rounded-full bg-gold/20 border-2 border-gold flex items-center justify-center text-gold font-bold text-lg shrink-0 mr-3">
                AP
            </div>
            <div class="flex flex-col overflow-hidden">
                <span class="font-bold text-sm truncate leading-tight mb-0.5">अमित पटेल</span>
                <span class="text-[9px] uppercase tracking-widest text-gray-400 font-bold truncate mb-1">Amit Patel</span>
                <div class="flex items-center text-[10px] text-gray-400">
                    <svg class="w-3 h-3 mr-1 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <div class="flex flex-col leading-tight">
                        <span>मुंबई</span>
                        <span class="text-[8px] uppercase">Mumbai</span>
                    </div>
                </div>
            </div>
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
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">मेरे मामले</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">My Cases</span>
                </div>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">मेरे दस्तावेज़</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">My Documents</span>
                </div>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">परामर्श</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">Consultations</span>
                </div>
            </a>

            <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-navy-600/50 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">भुगतान</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold text-gray-500 group-hover:text-gray-400">Payments</span>
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

        <!-- Logout -->
        <div class="p-4 border-t border-navy-600/50">
            <a href="#" class="flex items-center px-4 py-3 text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight mb-0.5">लॉग आउट</span>
                    <span class="text-[9px] uppercase tracking-widest font-bold opacity-80">Logout</span>
                </div>
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
            
            <!-- Welcome Header & Quick Actions -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex flex-col">
                    <h1 class="text-2xl md:text-3xl font-bold text-navy font-serif mb-1">नमस्ते, अमित!</h1>
                    <span class="text-[11px] uppercase font-bold tracking-widest text-gray-500">Welcome back, Amit!</span>
                </div>
                
                <div class="flex flex-wrap gap-3">
                    <button class="bg-gold text-navy hover:bg-gold-light px-5 min-h-[48px] rounded-xl font-bold transition-all shadow-sm hover:-translate-y-1 flex flex-col items-center justify-center">
                        <span class="text-[14px]">दस्तावेज़ बनाएं</span>
                        <span class="text-[9px] uppercase tracking-widest mt-0.5">Create Document</span>
                    </button>
                    <button class="bg-navy text-white hover:bg-navy-800 px-5 min-h-[48px] rounded-xl font-bold transition-all shadow-sm hover:-translate-y-1 flex flex-col items-center justify-center">
                        <span class="text-[14px]">नया वकील खोजें</span>
                        <span class="text-[9px] uppercase tracking-widest mt-0.5">Find New Lawyer</span>
                    </button>
                    <button class="bg-white text-navy border border-gray-300 hover:border-gold hover:text-gold px-5 min-h-[48px] rounded-xl font-bold transition-all shadow-sm hover:-translate-y-1 flex flex-col items-center justify-center">
                        <span class="text-[14px]">मदद</span>
                        <span class="text-[9px] uppercase tracking-widest mt-0.5">Help</span>
                    </button>
                </div>
            </div>

            <!-- TOP STATS -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach($stats as $stat)
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:-translate-y-1 transition-transform group relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-16 h-16 bg-gray-50 rounded-full group-hover:bg-gold/10 transition-colors"></div>
                    <div class="flex justify-between items-start relative z-10">
                        <div class="flex flex-col">
                            <span class="text-[11px] font-bold text-gray-500 mb-1 leading-tight">{{ $stat['title_hi'] }}</span>
                            <span class="text-[9px] uppercase tracking-widest text-gray-400 font-bold mb-3">{{ $stat['title_en'] }}</span>
                            <span class="text-3xl font-extrabold text-navy group-hover:text-gold transition-colors">{{ $stat['value'] }}</span>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-gold/10 text-gold flex items-center justify-center shrink-0">
                            @if($stat['icon'] == 'briefcase')
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            @elseif($stat['icon'] == 'document-text')
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            @elseif($stat['icon'] == 'phone')
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            @else
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                
                <!-- LEFT COLUMN (Consultations & Documents) -->
                <div class="xl:col-span-2 space-y-8">
                    
                    <!-- ACTIVE CONSULTATIONS TABLE -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-navy font-serif mb-0.5">सक्रिय परामर्श</h3>
                                <span class="text-[10px] uppercase font-bold tracking-widest text-gold">Active Consultations</span>
                            </div>
                            <button class="text-gold hover:text-navy font-bold transition-colors flex flex-col items-end">
                                <span class="text-sm">सभी देखें</span>
                                <span class="text-[9px] uppercase tracking-widest">View All</span>
                            </button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-gray-50 border-b border-gray-100">
                                        <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-widest">Lawyer</th>
                                        <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-widest">Service</th>
                                        <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-widest">Date/Time</th>
                                        <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-widest">Status</th>
                                        <th class="p-4 text-xs font-bold text-gray-500 uppercase tracking-widest text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($consultations as $consult)
                                    <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                                        <td class="p-4">
                                            <div class="flex flex-col">
                                                <span class="font-bold text-sm text-navy mb-0.5">{{ $consult['lawyer_hi'] }}</span>
                                                <span class="text-[10px] text-gray-500 uppercase">{{ $consult['lawyer_en'] }}</span>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex flex-col">
                                                <span class="font-bold text-sm text-gray-700 mb-0.5">{{ $consult['service_hi'] }}</span>
                                                <span class="text-[10px] text-gray-500 uppercase">{{ $consult['service_en'] }}</span>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex flex-col text-sm text-gray-600 font-medium">
                                                <span>{{ $consult['date'] }}</span>
                                                <span class="text-xs text-gray-400">{{ $consult['time'] }}</span>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            @if($consult['status'] == 'upcoming')
                                                <div class="inline-flex flex-col items-center px-3 py-1 bg-blue-50 text-blue-600 border border-blue-200 rounded-lg">
                                                    <span class="text-[11px] font-bold">{{ $consult['status_hi'] }}</span>
                                                    <span class="text-[8px] uppercase tracking-wider">{{ $consult['status_en'] }}</span>
                                                </div>
                                            @elseif($consult['status'] == 'completed')
                                                <div class="inline-flex flex-col items-center px-3 py-1 bg-green-50 text-green-600 border border-green-200 rounded-lg">
                                                    <span class="text-[11px] font-bold">{{ $consult['status_hi'] }}</span>
                                                    <span class="text-[8px] uppercase tracking-wider">{{ $consult['status_en'] }}</span>
                                                </div>
                                            @else
                                                <div class="inline-flex flex-col items-center px-3 py-1 bg-red-50 text-red-600 border border-red-200 rounded-lg">
                                                    <span class="text-[11px] font-bold">{{ $consult['status_hi'] }}</span>
                                                    <span class="text-[8px] uppercase tracking-wider">{{ $consult['status_en'] }}</span>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="p-4 text-center">
                                            <button class="min-h-[48px] px-4 rounded-lg bg-white border border-gray-300 text-navy hover:border-gold hover:text-gold transition-colors font-bold shadow-sm flex flex-col items-center justify-center mx-auto">
                                                <span class="text-[13px] leading-tight">विवरण</span>
                                                <span class="text-[9px] uppercase tracking-widest mt-0.5">Details</span>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- MY DOCUMENTS GRID -->
                    <div>
                        <div class="flex flex-col mb-4">
                            <h3 class="text-lg font-bold text-navy font-serif mb-0.5">मेरे दस्तावेज़</h3>
                            <span class="text-[10px] uppercase font-bold tracking-widest text-gold">My Documents</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($documents as $doc)
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover:-translate-y-1 transition-transform group">
                                <div class="w-10 h-10 rounded-full bg-gold/10 text-gold flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </div>
                                <div class="flex flex-col mb-4">
                                    <span class="font-bold text-sm text-navy mb-0.5 leading-tight">{{ $doc['name_hi'] }}</span>
                                    <span class="text-[10px] text-gray-500 uppercase tracking-wider font-semibold">{{ $doc['name_en'] }}</span>
                                </div>
                                <div class="text-[10px] text-gray-400 mb-4 border-b border-gray-100 pb-3">
                                    Created: {{ $doc['date'] }}
                                </div>
                                <div class="flex gap-2">
                                    <button class="flex-1 flex flex-col items-center justify-center min-h-[48px] bg-red-50 text-red-600 border border-red-100 rounded-lg hover:bg-red-100 transition-colors">
                                        <span class="text-[12px] font-bold leading-tight">डाउनलोड</span>
                                        <span class="text-[9px] uppercase font-bold tracking-widest mt-0.5">PDF</span>
                                    </button>
                                    <button class="flex-1 flex flex-col items-center justify-center min-h-[48px] bg-blue-50 text-blue-600 border border-blue-100 rounded-lg hover:bg-blue-100 transition-colors">
                                        <span class="text-[12px] font-bold leading-tight">डाउनलोड</span>
                                        <span class="text-[9px] uppercase font-bold tracking-widest mt-0.5">Word</span>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <!-- RIGHT COLUMN (Activity Feed) -->
                <div>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 sticky top-6">
                        <div class="flex flex-col mb-6">
                            <h3 class="text-lg font-bold text-navy font-serif mb-0.5">हाल की गतिविधि</h3>
                            <span class="text-[10px] uppercase font-bold tracking-widest text-gold">Recent Activity</span>
                        </div>
                        
                        <div class="space-y-6 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                            @foreach($activities as $act)
                            <div class="relative flex items-start group">
                                <div class="absolute left-5 -translate-x-1/2 w-3 h-3 rounded-full bg-{{ $act['color'] }} border-2 border-white ring-4 ring-gray-50"></div>
                                <div class="pl-10 flex flex-col w-full">
                                    <div class="flex flex-col bg-gray-50 p-3 rounded-lg border border-gray-100 group-hover:border-{{ $act['color'] }} transition-colors">
                                        <span class="font-bold text-sm text-navy mb-0.5 leading-tight">{{ $act['title_hi'] }}</span>
                                        <span class="text-[10px] text-gray-500 uppercase tracking-wider mb-2 font-semibold">{{ $act['title_en'] }}</span>
                                        <span class="text-xs text-gray-400 font-medium">{{ $act['date'] }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <button class="w-full mt-6 min-h-[48px] border border-gray-200 rounded-xl text-navy font-bold transition-colors flex flex-col items-center justify-center hover:bg-gray-50 hover:border-gold">
                            <span class="text-[14px]">सभी देखें</span>
                            <span class="text-[9px] uppercase tracking-widest mt-0.5">View All</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

</body>
</html>
