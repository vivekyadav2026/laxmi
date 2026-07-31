<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard - Foundida</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AlpineJS for mobile menu -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .bg-navy { background-color: #0B1F3A; }
        .text-navy { color: #0B1F3A; }
        .border-navy { border-color: #0B1F3A; }
        .bg-gold { background-color: #D4A843; }
        .text-gold { color: #D4A843; }
        .border-gold { border-color: #D4A843; }
        .hover\:bg-gold-light:hover { background-color: #e5b955; }
    </style>
</head>
<body class="text-gray-800 antialiased" x-data="{ sidebarOpen: false }">

<div class="min-h-screen flex">
    
    <!-- MOBILE OVERLAY -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-20 bg-black/50 lg:hidden" @click="sidebarOpen = false" x-transition.opacity></div>

    <!-- SIDEBAR (Left 240px Navy) -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-[240px] bg-navy text-white transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-auto flex flex-col shadow-2xl">
        <!-- Logo Area -->
        <div class="flex items-center justify-between p-6 border-b border-white/10">
            <a href="/" class="flex items-center group">
                <div class="w-8 h-8 bg-gold rounded flex items-center justify-center mr-2 shadow-sm group-hover:-translate-y-0.5 transition-transform">
                    <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
                <span class="font-serif text-lg font-bold text-white leading-tight">Foundida</span>
            </a>
            <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- User Profile -->
        <div class="p-6 border-b border-white/10 flex items-center">
            @if($user->profile_photo_path)
                <img src="{{ str_starts_with($user->profile_photo_path, 'http') ? $user->profile_photo_path : asset('storage/'.$user->profile_photo_path) }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full border-2 border-gold object-cover mr-3 shrink-0">
            @else
                <div class="w-12 h-12 rounded-full bg-gold/20 border-2 border-gold flex items-center justify-center text-gold font-bold text-lg shrink-0 mr-3">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>
            @endif
            <div class="flex flex-col overflow-hidden">
                <span class="font-bold text-sm truncate leading-tight mb-0.5">{{ $user->name }}</span>
                <span class="text-[9px] uppercase tracking-widest text-gray-400 font-bold truncate mb-1">{{ $user->email }}</span>
                @if($user->city)
                <div class="flex items-center text-[10px] text-gray-400">
                    <svg class="w-3 h-3 mr-1 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="truncate">{{ $user->city }}</span>
                </div>
                @endif
            </div>
        </div>

        <!-- Nav Items -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('dashboard.user') }}" class="flex items-center px-4 py-3 bg-gold/10 text-gold rounded-xl border border-gold/20 group transition-colors">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight">Dashboard</span>
                </div>
            </a>
            
            <a href="{{ route('dashboard.profile') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-white/5 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight">My Profile</span>
                </div>
            </a>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-white/10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-xl transition-colors group">
                    <svg class="w-5 h-5 mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <div class="flex flex-col text-left">
                        <span class="font-bold text-sm leading-tight">Logout</span>
                    </div>
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col min-w-0 bg-gray-50 overflow-y-auto h-screen">
        
        <!-- Mobile Header -->
        <div class="lg:hidden bg-white border-b border-gray-200 p-4 flex items-center justify-between sticky top-0 z-10">
            <a href="/" class="flex items-center">
                <div class="w-8 h-8 bg-gold rounded flex items-center justify-center mr-2 shadow-sm">
                    <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
                <span class="font-serif text-lg font-bold text-navy leading-tight">Foundida</span>
            </a>
            <button @click="sidebarOpen = true" class="text-navy hover:text-gold transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

        <div class="p-6 md:p-8 max-w-7xl mx-auto w-full space-y-8">
            
            <!-- Welcome Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex flex-col">
                    <h1 class="text-2xl md:text-3xl font-bold text-navy font-serif mb-1">Hello, {{ strtok($user->name, ' ') }}!</h1>
                    <span class="text-xs text-gray-400">Welcome to your workspace dashboard.</span>
                </div>
                
                <div class="flex flex-wrap gap-3">
                    <a href="/packages" class="bg-gold text-navy hover:bg-[#e5b955] px-5 min-h-[44px] rounded-xl font-bold transition-all shadow-sm hover:-translate-y-0.5 flex items-center justify-center text-sm">
                        <i class="fas fa-cubes mr-2"></i> Explore Packages
                    </a>
                    <a href="/live-session" class="bg-navy text-white hover:bg-[#152a4e] px-5 min-h-[44px] rounded-xl font-bold transition-all shadow-sm hover:-translate-y-0.5 flex items-center justify-center text-sm">
                        <i class="fas fa-calendar-alt mr-2 text-gold"></i> Book Consultation
                    </a>
                </div>
            </div>

            <!-- TOP STATS -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach($stats as $stat)
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover:-translate-y-0.5 transition-transform group relative overflow-hidden">
                    <div class="absolute -right-4 -top-4 w-16 h-16 bg-gray-50 rounded-full group-hover:bg-gold/10 transition-colors"></div>
                    <div class="flex justify-between items-start relative z-10">
                        <div class="flex flex-col">
                            <span class="text-xs font-semibold text-gray-400 mb-2 leading-tight uppercase tracking-wider">{{ $stat['title_en'] }}</span>
                            <span class="text-3xl font-extrabold text-navy group-hover:text-gold transition-colors">{{ $stat['value'] }}</span>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-gold/10 text-gold flex items-center justify-center shrink-0">
                            @if($stat['icon'] == 'briefcase')
                                <i class="fas fa-briefcase text-base"></i>
                            @elseif($stat['icon'] == 'document-text')
                                <i class="fas fa-file-alt text-base"></i>
                            @elseif($stat['icon'] == 'phone')
                                <i class="fas fa-phone-alt text-base"></i>
                            @else
                                <i class="fas fa-wallet text-base"></i>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                
                <!-- LEFT COLUMN (Purchases & Consultations) -->
                <div class="xl:col-span-2 space-y-8">
                    
                    <!-- ACTIVE ORDERS TABLE -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-navy font-serif">Active Service Orders</h3>
                                <span class="text-xs text-gray-400">Services and packages being processed</span>
                            </div>
                        </div>
                        
                        @if($orders->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="bg-gray-50 border-b border-gray-200">
                                            <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Order No.</th>
                                            <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Service Name</th>
                                            <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Price Paid</th>
                                            <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Purchase Date</th>
                                            <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                                            <td class="p-4 font-semibold text-sm text-navy">
                                                #{{ $order->order_number }}
                                            </td>
                                            <td class="p-4">
                                                <span class="font-bold text-sm text-gray-800">{{ $order->item_title }}</span>
                                            </td>
                                            <td class="p-4">
                                                <span class="text-sm font-semibold text-[#2D7A4F]">₹{{ number_format($order->amount, 2) }}</span>
                                            </td>
                                            <td class="p-4 text-sm text-gray-500">
                                                {{ $order->created_at->format('d M Y') }}
                                            </td>
                                            <td class="p-4">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-200">
                                                    Processing
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <!-- Empty State -->
                            <div class="p-12 text-center flex flex-col items-center">
                                <div class="w-16 h-16 bg-navy/5 text-navy rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-shopping-bag text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-[#1A1A2E] text-base mb-1">No active services yet</h4>
                                <p class="text-sm text-gray-400 max-w-sm mb-6">Explore our expert legal setup and corporate package registries to launch your company.</p>
                                <a href="/packages" class="bg-[#0B1F3A] hover:bg-[#152a4e] text-white font-bold px-6 py-2.5 rounded-xl text-xs transition-all shadow-sm">
                                    View Packages
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- BOOKINGS & CONSULTATIONS -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-bold text-navy font-serif">Scheduled Live Sessions</h3>
                                <span class="text-xs text-gray-400">Scheduled guide calls and expert consultancy</span>
                            </div>
                        </div>

                        @if(count($consultations) > 0)
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="bg-gray-50 border-b border-gray-200">
                                            <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Date</th>
                                            <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Time Slot</th>
                                            <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Guide Info</th>
                                            <th class="p-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($consultations as $consult)
                                        <tr class="border-b border-gray-100 hover:bg-gray-50/50 transition-colors">
                                            <td class="p-4 font-semibold text-sm text-navy">
                                                {{ date('d M Y', strtotime($consult->preferred_date)) }}
                                            </td>
                                            <td class="p-4 text-sm font-medium text-gray-800">
                                                {{ $consult->preferred_time }}
                                            </td>
                                            <td class="p-4">
                                                <div class="flex flex-col">
                                                    <span class="text-sm font-semibold text-gray-800">Assigned Consultant</span>
                                                    <span class="text-[10px] text-gold uppercase tracking-wider font-bold">Foundida Experts</span>
                                                </div>
                                            </td>
                                            <td class="p-4">
                                                @if($consult->status == 'pending')
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-yellow-50 text-yellow-700 border border-yellow-200">
                                                        Awaiting Call
                                                    </span>
                                                @elseif($consult->status == 'completed')
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-200">
                                                        Completed
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-50 text-gray-600 border border-gray-200">
                                                        {{ ucfirst($consult->status) }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="p-12 text-center flex flex-col items-center">
                                <div class="w-16 h-16 bg-navy/5 text-navy rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-video text-2xl"></i>
                                </div>
                                <h4 class="font-bold text-[#1A1A2E] text-base mb-1">No scheduled consultations</h4>
                                <p class="text-sm text-gray-400 max-w-sm mb-6">Need help? Book a live consultation session with our verified experts for legal & tech guidance.</p>
                                <a href="/live-session" class="bg-[#0B1F3A] hover:bg-[#152a4e] text-white font-bold px-6 py-2.5 rounded-xl text-xs transition-all shadow-sm">
                                    Book Session
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- MY DOCUMENTS GRID -->
                    <div>
                        <div class="flex flex-col mb-4">
                            <h3 class="text-lg font-bold text-navy font-serif">Documents & Templates</h3>
                            <span class="text-xs text-gray-400">Download registration records or legal agreement templates</span>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($documents as $doc)
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover:-translate-y-0.5 transition-transform group flex flex-col justify-between">
                                <div>
                                    <div class="w-10 h-10 rounded-xl bg-gold/10 text-gold flex items-center justify-center mb-4 group-hover:scale-105 transition-transform">
                                        <i class="fas fa-file-contract text-base"></i>
                                    </div>
                                    <h4 class="font-bold text-sm text-navy mb-1 leading-tight">{{ $doc['name_en'] }}</h4>
                                    <span class="text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded bg-gray-100 text-gray-500 inline-block mb-3">{{ $doc['type'] }}</span>
                                </div>
                                
                                <div>
                                    <div class="text-[10px] text-gray-400 mb-3 border-t border-gray-50 pt-2">
                                        Status: {{ $doc['date'] }}
                                    </div>
                                    
                                    @if($doc['type'] == 'Receipt')
                                        <button onclick="window.print()" class="w-full flex items-center justify-center min-h-[38px] bg-navy text-white text-xs font-bold rounded-lg hover:bg-navy-800 transition-colors">
                                            <i class="fas fa-print mr-1.5"></i> Print Receipt
                                        </button>
                                    @else
                                        <div class="flex gap-2">
                                            <a href="/diy-documents" class="flex-1 flex items-center justify-center min-h-[38px] bg-gold text-navy text-[11px] font-bold rounded-lg hover:bg-gold-light transition-colors">
                                                Download
                                            </a>
                                        </div>
                                    @endif
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
                            <h3 class="text-lg font-bold text-navy font-serif">Recent Logs</h3>
                            <span class="text-xs text-gray-400">Your recent activity timeline</span>
                        </div>
                        
                        <div class="space-y-6 relative before:absolute before:inset-y-0 before:left-3.5 before:w-0.5 before:bg-gray-100">
                            @foreach($activities as $act)
                            <div class="relative flex items-start group">
                                @php
                                    $colorClass = 'bg-gray-400';
                                    if ($act['color'] === 'gold') $colorClass = 'bg-[#D4A843]';
                                    elseif ($act['color'] === 'green') $colorClass = 'bg-[#2D7A4F]';
                                    elseif ($act['color'] === 'blue') $colorClass = 'bg-[#0B1F3A]';
                                @endphp
                                <div class="absolute left-3.5 -translate-x-1/2 w-2.5 h-2.5 rounded-full {{ $colorClass }} border-2 border-white ring-4 ring-gray-50"></div>
                                <div class="pl-8 flex flex-col w-full">
                                    <div class="flex flex-col bg-gray-50/50 p-3 rounded-xl border border-gray-100 group-hover:border-navy/10 transition-colors">
                                        <span class="text-sm font-semibold text-gray-800 mb-1 leading-tight">{{ $act['title_en'] }}</span>
                                        <span class="text-[10px] text-gray-400 font-medium">{{ $act['date'] }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

</body>
</html>
