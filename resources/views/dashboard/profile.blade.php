<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - Foundida</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        <!-- User Profile (Sidebar) -->
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
            </div>
        </div>

        <!-- Nav Items -->
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('dashboard.user') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-white/5 hover:text-white rounded-xl transition-colors group">
                <svg class="w-5 h-5 mr-3 shrink-0 text-gray-400 group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <div class="flex flex-col">
                    <span class="font-bold text-sm leading-tight">Dashboard</span>
                </div>
            </a>
            
            <a href="{{ route('dashboard.profile') }}" class="flex items-center px-4 py-3 bg-gold/10 text-gold rounded-xl border border-gold/20 group transition-colors">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
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
    <main class="flex-1 flex flex-col min-w-0 bg-[#F9FAFB] overflow-y-auto h-screen">
        
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

        <div class="p-6 md:p-8 max-w-4xl mx-auto w-full space-y-6">
            
            <div class="flex flex-col mb-4">
                <h1 class="text-2xl md:text-3xl font-bold text-navy font-serif mb-1">Account Settings</h1>
                <span class="text-xs text-gray-400">Update your profile parameters and credentials securely</span>
            </div>

            @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3.5 rounded-xl font-semibold flex items-center shadow-sm" role="alert">
                <i class="fas fa-check-circle mr-2 text-lg text-[#2D7A4F]"></i>
                <span class="text-sm">{{ session('success') }}</span>
            </div>
            @endif

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3.5 rounded-xl flex items-start shadow-sm">
                <i class="fas fa-exclamation-triangle mr-3 text-lg mt-0.5"></i>
                <ul class="list-disc pl-2 text-sm font-medium">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <!-- CARD 1: Personal Details -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex items-center space-x-3 bg-gray-50/50">
                        <div class="w-8 h-8 bg-gold/10 text-gold rounded-lg flex items-center justify-center">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div>
                            <h3 class="font-serif font-bold text-navy text-base">Personal Information</h3>
                            <p class="text-xs text-gray-400">Manage your avatar and identity details</p>
                        </div>
                    </div>
                    
                    <div class="p-6 md:p-8 space-y-6">
                        <!-- Profile Photo Picker -->
                        <div class="flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-6 border-b border-gray-100 pb-6">
                            <div class="relative shrink-0 group">
                                @if($user->profile_photo_path)
                                    <img src="{{ str_starts_with($user->profile_photo_path, 'http') ? $user->profile_photo_path : asset('storage/'.$user->profile_photo_path) }}" alt="{{ $user->name }}" class="h-20 w-20 object-cover rounded-full border-2 border-gold shadow-sm group-hover:opacity-85 transition-opacity">
                                @else
                                    <div class="h-20 w-20 rounded-full bg-gold/20 border border-gold text-gold flex items-center justify-center text-2xl font-bold group-hover:bg-gold/35 transition-colors">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-black/40 rounded-full opacity-0 group-hover:opacity-100 flex items-center justify-center text-white text-[10px] font-bold cursor-pointer transition-opacity">
                                    Change
                                </div>
                            </div>
                            
                            <div class="flex flex-col space-y-1">
                                <label class="block text-sm font-semibold text-gray-700">Upload Profile Photo</label>
                                <span class="text-xs text-gray-400 mb-2">JPEG, PNG or GIF, maximum 2MB</span>
                                <input type="file" name="profile_photo" class="block w-full text-xs text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border
                                    file:border-gray-200 file:text-xs file:font-semibold
                                    file:bg-white file:text-navy
                                    hover:file:bg-gray-50 file:cursor-pointer transition-colors
                                "/>
                            </div>
                        </div>

                        <!-- Info Inputs -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block mb-1.5 text-navy font-semibold text-sm">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full border-gray-300 focus:border-navy focus:ring-1 focus:ring-navy rounded-xl shadow-sm text-navy min-h-[48px] px-4 text-sm transition-all">
                            </div>
                            
                            <div>
                                <label class="block mb-1.5 text-navy font-semibold text-sm">Email Address (Read Only)</label>
                                <input type="email" value="{{ $user->email }}" readonly class="w-full border-gray-200 bg-gray-50 rounded-xl shadow-sm text-gray-400 min-h-[48px] px-4 text-sm cursor-not-allowed">
                            </div>

                            <div>
                                <label class="block mb-1.5 text-navy font-semibold text-sm">Phone Number <span class="text-red-500">*</span></label>
                                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" required class="w-full border-gray-300 focus:border-navy focus:ring-1 focus:ring-navy rounded-xl shadow-sm text-navy min-h-[48px] px-4 text-sm transition-all">
                            </div>

                            <div>
                                <label class="block mb-1.5 text-navy font-semibold text-sm">City <span class="text-red-500">*</span></label>
                                <input type="text" name="city" value="{{ old('city', $user->city) }}" required class="w-full border-gray-300 focus:border-navy focus:ring-1 focus:ring-navy rounded-xl shadow-sm text-navy min-h-[48px] px-4 text-sm transition-all">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 2: Security & Password -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex items-center space-x-3 bg-gray-50/50">
                        <div class="w-8 h-8 bg-gold/10 text-gold rounded-lg flex items-center justify-center">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h3 class="font-serif font-bold text-navy text-base">Security & Password</h3>
                            <p class="text-xs text-gray-400">Update your security credentials (leave blank to keep current)</p>
                        </div>
                    </div>
                    
                    <div class="p-6 md:p-8 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" x-data="{ showCurr: false, showNew: false, showConfirm: false }">
                            <div>
                                <label class="block mb-1.5 text-navy font-semibold text-sm">Current Password</label>
                                <div class="relative">
                                    <input :type="showCurr ? 'text' : 'password'" name="current_password" placeholder="••••••••" class="w-full border-gray-300 focus:border-navy focus:ring-1 focus:ring-navy rounded-xl shadow-sm text-navy min-h-[48px] pl-4 pr-10 text-sm transition-all">
                                    <button type="button" @click="showCurr = !showCurr" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-navy focus:outline-none">
                                        <template x-if="showCurr">
                                            <i class="fas fa-eye-slash text-sm"></i>
                                        </template>
                                        <template x-if="!showCurr">
                                            <i class="fas fa-eye text-sm"></i>
                                        </template>
                                    </button>
                                </div>
                            </div>
                            
                            <div>
                                <!-- Spacer for responsive grids -->
                            </div>

                            <div>
                                <label class="block mb-1.5 text-navy font-semibold text-sm">New Password</label>
                                <div class="relative">
                                    <input :type="showNew ? 'text' : 'password'" name="new_password" placeholder="••••••••" class="w-full border-gray-300 focus:border-navy focus:ring-1 focus:ring-navy rounded-xl shadow-sm text-navy min-h-[48px] pl-4 pr-10 text-sm transition-all">
                                    <button type="button" @click="showNew = !showNew" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-navy focus:outline-none">
                                        <template x-if="showNew">
                                            <i class="fas fa-eye-slash text-sm"></i>
                                        </template>
                                        <template x-if="!showNew">
                                            <i class="fas fa-eye text-sm"></i>
                                        </template>
                                    </button>
                                </div>
                            </div>

                            <div>
                                <label class="block mb-1.5 text-navy font-semibold text-sm">Confirm New Password</label>
                                <div class="relative">
                                    <input :type="showConfirm ? 'text' : 'password'" name="new_password_confirmation" placeholder="••••••••" class="w-full border-gray-300 focus:border-navy focus:ring-1 focus:ring-navy rounded-xl shadow-sm text-navy min-h-[48px] pl-4 pr-10 text-sm transition-all">
                                    <button type="button" @click="showConfirm = !showConfirm" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-navy focus:outline-none">
                                        <template x-if="showConfirm">
                                            <i class="fas fa-eye-slash text-sm"></i>
                                        </template>
                                        <template x-if="!showConfirm">
                                            <i class="fas fa-eye text-sm"></i>
                                        </template>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button bar -->
                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-navy hover:bg-[#152a4e] text-white min-h-[48px] px-8 rounded-xl font-bold transition-all shadow-md hover:-translate-y-0.5 flex items-center justify-center text-sm">
                        <i class="fas fa-save mr-2 text-gold"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>
