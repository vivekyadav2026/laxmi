<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Foundida')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        navy: '#0B1F3A',
                        gold: '#D4A843',
                        light: '#F8FAFC',
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* Custom scrollbar for dark theme */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0B1F3A; 
        }
        ::-webkit-scrollbar-thumb {
            background: #1a365d; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #D4A843; 
        }
    </style>
</head>
<body class="bg-gradient-to-tr from-[#06101d] via-navy to-[#1a365d] text-gray-200 font-sans antialiased flex h-screen overflow-hidden selection:bg-gold/30 selection:text-white" x-data="{ sidebarOpen: false }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-20 bg-black/60 backdrop-blur-sm lg:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-72 bg-navy/40 backdrop-blur-2xl border-r border-white/10 transition-transform duration-300 lg:static lg:translate-x-0 flex flex-col shadow-[4px_0_24px_rgba(0,0,0,0.5)]">
        
        <!-- Logo -->
        <div class="flex items-center justify-center h-24 border-b border-white/10 px-6 relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-gold/5 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 relative z-10">
                <div class="w-10 h-10 bg-gradient-to-br from-gold to-[#a88d30] rounded-xl flex items-center justify-center text-navy font-bold text-xl shadow-lg shadow-gold/20">
                    <i class="fas fa-shield-halved"></i>
                </div>
                <span class="text-2xl font-extrabold font-serif tracking-wide text-white">Admin<span class="text-gold">Panel</span></span>
            </a>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 px-4 py-8 space-y-2 overflow-y-auto">
            <p class="px-3 text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Main Menu</p>
            
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-home text-lg"></i></div>
                Dashboard
            </a>
            
            <a href="/admin/users" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->is('admin/users') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-users text-lg"></i></div>
                Users
            </a>

            <a href="/admin/services" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->is('admin/services') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-briefcase text-lg"></i></div>
                Services
            </a>

            @php
                $pendingSubscriptionsCount = \App\Models\Subscription::where('status', 'pending')->count();
            @endphp
            <a href="/admin/funding" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->is('admin/funding') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-rocket text-lg"></i></div>
                Funding Requests
                @if($pendingSubscriptionsCount > 0)
                    <span class="ml-auto bg-red-500/20 text-red-400 border border-red-500/30 text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $pendingSubscriptionsCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.subscription_plans.index') }}" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->is('admin/subscription-plans*') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-gem text-lg"></i></div>
                Subscription Plans
            </a>

            <a href="{{ route('admin.packages.index') }}" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->is('admin/packages*') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-cubes text-lg"></i></div>
                Combo Packages
            </a>

            @php
                $pendingCallbacksCount = \App\Models\CallbackRequest::where('status', 'pending')->count();
            @endphp
            <a href="/admin/callbacks" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->is('admin/callbacks') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-headset text-lg"></i></div>
                Callback Requests
                @if($pendingCallbacksCount > 0)
                    <span class="ml-auto bg-red-500/20 text-red-400 border border-red-500/30 text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $pendingCallbacksCount }}</span>
                @endif
            </a>

            @php
                $pendingPackageInquiriesCount = \App\Models\PackageInquiry::where('status', 'pending')->count();
            @endphp
            <a href="{{ route('admin.package-inquiries.index') }}" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->is('admin/package-inquiries*') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-file-invoice text-lg"></i></div>
                Package Inquiries
                @if($pendingPackageInquiriesCount > 0)
                    <span class="ml-auto bg-red-500/20 text-red-400 border border-red-500/30 text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $pendingPackageInquiriesCount }}</span>
                @endif
            </a>

            @php
                $pendingLiveSessionsCount = \App\Models\LiveSessionBooking::where('status', 'pending')->count();
            @endphp
            <a href="/admin/live-sessions" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->is('admin/live-sessions*') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-video text-lg"></i></div>
                Live Sessions
                @if($pendingLiveSessionsCount > 0)
                    <span class="ml-auto bg-red-500/20 text-red-400 border border-red-500/30 text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $pendingLiveSessionsCount }}</span>
                @endif
            </a>

            <a href="/admin/blogs" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->is('admin/blogs*') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-book-open text-lg"></i></div>
                Manage Blogs
            </a>

            <p class="px-3 text-xs font-bold text-gray-500 uppercase tracking-widest mt-8 mb-4">System</p>

            <a href="{{ route('admin.settings') }}" class="flex items-center gap-4 px-4 py-3.5 text-sm font-semibold rounded-xl transition-all duration-300 {{ request()->routeIs('admin.settings') ? 'bg-gold/15 text-gold border border-gold/30 shadow-[0_0_15px_rgba(212,168,67,0.15)]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                <div class="w-6 flex justify-center"><i class="fas fa-cog text-lg"></i></div>
                Settings
            </a>
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-6 border-t border-white/10">
            <a href="/" target="_blank" class="flex items-center justify-center gap-2 w-full bg-white/5 hover:bg-white/10 border border-white/10 text-white py-3 rounded-xl text-sm font-bold transition-all hover:border-gold/30 group">
                <i class="fas fa-external-link-alt group-hover:text-gold transition-colors"></i> View Website
            </a>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col overflow-hidden relative">
        
        <!-- Glowing background orbs -->
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-gold/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-[30rem] h-[30rem] bg-blue-500/10 rounded-full blur-[120px] pointer-events-none"></div>

        <!-- Top Navbar -->
        <header class="h-24 bg-white/5 backdrop-blur-xl border-b border-white/10 flex items-center justify-between px-8 z-10 shadow-sm relative">
            <!-- Mobile Menu Button & Search -->
            <div class="flex items-center gap-6">
                <button @click="sidebarOpen = true" class="text-gray-400 hover:text-gold focus:outline-none lg:hidden transition-colors">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                
                <div class="hidden md:flex items-center bg-white/5 rounded-2xl px-5 py-3 w-80 border border-white/10 focus-within:border-gold/50 focus-within:bg-white/10 transition-all shadow-inner">
                    <i class="fas fa-search text-gray-400"></i>
                    <input type="text" placeholder="Search across admin panel..." class="bg-transparent border-none focus:outline-none focus:ring-0 text-sm ml-3 w-full text-white placeholder-gray-500">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-6 md:gap-8">
                <!-- Notifications -->
                <button class="relative text-gray-400 hover:text-gold transition-colors group">
                    <i class="fas fa-bell text-xl group-hover:animate-swing"></i>
                    <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-navy"></span>
                </button>

                <div class="w-px h-8 bg-white/10 hidden md:block"></div>

                <!-- User Profile Dropdown -->
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="flex items-center gap-4 focus:outline-none group">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-bold text-white leading-none mb-1 group-hover:text-gold transition-colors">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-400 leading-none">Administrator</p>
                        </div>
                        <div class="relative">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=D4A843&color=0B1F3A&bold=true" alt="Admin" class="w-11 h-11 rounded-xl border-2 border-white/10 object-cover group-hover:border-gold/50 transition-colors shadow-lg">
                            <div class="absolute -bottom-1 -right-1 w-3.5 h-3.5 bg-green-500 border-2 border-navy rounded-full"></div>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-gray-500 group-hover:text-gold transition-colors"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="absolute right-0 mt-4 w-56 bg-[#0B1F3A]/95 backdrop-blur-xl rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.5)] border border-white/10 py-2 z-50">
                        <div class="px-4 py-3 border-b border-white/5 mb-1">
                            <p class="text-sm text-white font-semibold">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                        </div>
                        <a href="{{ route('admin.settings') }}" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-white/5 hover:text-white transition-colors"><i class="fas fa-cog w-5 text-gray-400"></i> Account Settings</a>
                        <div class="border-t border-white/5 my-1"></div>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors"><i class="fas fa-sign-out-alt w-5"></i> Logout</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8 relative z-0">
            @yield('content')
        </main>
    </div>

</body>
</html>
