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
    
    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-20 transition-opacity bg-black bg-opacity-50 lg:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 bg-navy text-white transition-transform duration-300 lg:static lg:translate-x-0 flex flex-col shadow-2xl">
        
        <!-- Logo -->
        <div class="flex items-center justify-center h-20 border-b border-white/10 px-6">
            <a href="/admin/dashboard" class="flex items-center gap-2">
                <div class="w-8 h-8 bg-gold rounded-lg flex items-center justify-center text-navy font-bold text-xl">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <span class="text-xl font-bold font-serif tracking-wide text-white">Admin<span class="text-gold">Panel</span></span>
            </a>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <p class="px-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Main Menu</p>
            
            <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('admin/dashboard') ? 'bg-gold/20 text-gold border border-gold/30' : 'text-gray-300 hover:bg-white/5 hover:text-white transition-colors' }}">
                <i class="fas fa-home w-5 text-center"></i>
                Dashboard
            </a>
            
            <a href="/admin/users" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('admin/users') ? 'bg-gold/20 text-gold border border-gold/30' : 'text-gray-300 hover:bg-white/5 hover:text-white transition-colors' }}">
                <i class="fas fa-users w-5 text-center"></i>
                Users
            </a>

            <a href="/admin/services" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('admin/services') ? 'bg-gold/20 text-gold border border-gold/30' : 'text-gray-300 hover:bg-white/5 hover:text-white transition-colors' }}">
                <i class="fas fa-briefcase w-5 text-center"></i>
                Services
            </a>

            <a href="/admin/funding" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('admin/funding') ? 'bg-gold/20 text-gold border border-gold/30' : 'text-gray-300 hover:bg-white/5 hover:text-white transition-colors' }}">
                <i class="fas fa-rocket w-5 text-center"></i>
                Funding Requests
                <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">3</span>
            </a>

            <p class="px-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2">System</p>

            <a href="/admin/settings" class="flex items-center gap-3 px-4 py-3 text-sm font-medium rounded-xl {{ request()->is('admin/settings') ? 'bg-gold/20 text-gold border border-gold/30' : 'text-gray-300 hover:bg-white/5 hover:text-white transition-colors' }}">
                <i class="fas fa-cog w-5 text-center"></i>
                Settings
            </a>
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-white/10">
            <a href="/" target="_blank" class="flex items-center justify-center gap-2 w-full bg-white/10 hover:bg-white/20 text-white py-2 rounded-lg text-sm font-bold transition-colors">
                <i class="fas fa-external-link-alt"></i> View Website
            </a>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col overflow-hidden">
        
        <!-- Top Navbar -->
        <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-10 shadow-sm">
            <!-- Mobile Menu Button & Search -->
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="text-gray-500 hover:text-navy focus:outline-none lg:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <div class="hidden md:flex items-center bg-gray-100 rounded-full px-4 py-2 w-64 border border-transparent focus-within:border-gold/50 focus-within:bg-white transition-colors">
                    <i class="fas fa-search text-gray-400"></i>
                    <input type="text" placeholder="Search..." class="bg-transparent border-none focus:outline-none focus:ring-0 text-sm ml-2 w-full text-gray-700">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-4 md:gap-6">
                <!-- Notifications -->
                <button class="relative text-gray-400 hover:text-navy transition-colors">
                    <i class="fas fa-bell text-xl"></i>
                    <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                </button>

                <div class="w-px h-6 bg-gray-200"></div>

                <!-- User Profile Dropdown -->
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="flex items-center gap-3 focus:outline-none">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-bold text-navy leading-none mb-1">Admin User</p>
                            <p class="text-xs text-gray-500 leading-none">Super Admin</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=0B1F3A&color=D4A843&bold=true" alt="Admin" class="w-10 h-10 rounded-full border-2 border-gray-200 object-cover">
                        <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                        <a href="/admin/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-navy"><i class="fas fa-user-circle mr-2 text-gray-400"></i> My Profile</a>
                        <a href="/admin/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-navy"><i class="fas fa-cog mr-2 text-gray-400"></i> Account Settings</a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6 md:p-8">
            @yield('content')
        </main>
    </div>

</body>
</html>
