@extends('layouts.admin')

@section('title', 'System Settings - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">System Settings</h1>
            <p class="text-sm text-gray-400">Configure global application preferences and manage security.</p>
        </div>
        <button class="bg-gradient-to-r from-gold to-[#a88d30] text-navy px-5 py-2.5 rounded-xl text-sm font-bold hover:from-[#e2b54d] hover:to-[#c6a83d] transition-all shadow-lg shadow-gold/20 hover:shadow-gold/40 hover:-translate-y-0.5">
            <i class="fas fa-save mr-2"></i> Save Changes
        </button>
    </div>

    <!-- Status Message -->
    @if (session('status') === 'password-updated' || session('status') === 'profile-updated')
        <div class="bg-green-500/20 border border-green-500/30 text-green-400 text-sm p-4 rounded-2xl mb-8 flex items-start gap-3 relative z-10 shadow-lg shadow-green-500/5">
            <i class="fas fa-check-circle mt-0.5 text-lg"></i>
            <div>
                <p class="font-bold">Success</p>
                <p class="text-xs text-green-300/90 mt-0.5">
                    @if(session('status') === 'password-updated')
                        Your password has been securely updated.
                    @else
                        Your profile has been successfully updated.
                    @endif
                </p>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10" x-data="{ tab: 'security' }">
        
        <!-- Settings Sidebar -->
        <div class="col-span-1 bg-white/5 backdrop-blur-xl rounded-3xl shadow-lg border border-white/10 p-5 h-fit">
            <nav class="space-y-2">
                <button @click="tab = 'general'" :class="tab === 'general' ? 'bg-gold/15 text-gold border-l-4 border-gold shadow-[inset_0_0_15px_rgba(212,168,67,0.1)]' : 'text-gray-400 hover:bg-white/5 hover:text-white border-l-4 border-transparent'" class="w-full text-left px-4 py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-3">
                    <i class="fas fa-globe"></i> General
                </button>
                <button @click="tab = 'profile'" :class="tab === 'profile' ? 'bg-gold/15 text-gold border-l-4 border-gold shadow-[inset_0_0_15px_rgba(212,168,67,0.1)]' : 'text-gray-400 hover:bg-white/5 hover:text-white border-l-4 border-transparent'" class="w-full text-left px-4 py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-3">
                    <i class="fas fa-user-circle"></i> My Profile
                </button>
                <button @click="tab = 'security'" :class="tab === 'security' ? 'bg-gold/15 text-gold border-l-4 border-gold shadow-[inset_0_0_15px_rgba(212,168,67,0.1)]' : 'text-gray-400 hover:bg-white/5 hover:text-white border-l-4 border-transparent'" class="w-full text-left px-4 py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-3">
                    <i class="fas fa-shield-alt"></i> Security
                </button>
                <button @click="tab = 'gateways'" :class="tab === 'gateways' ? 'bg-gold/15 text-gold border-l-4 border-gold shadow-[inset_0_0_15px_rgba(212,168,67,0.1)]' : 'text-gray-400 hover:bg-white/5 hover:text-white border-l-4 border-transparent'" class="w-full text-left px-4 py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-3">
                    <i class="fas fa-credit-card"></i> Payment Gateways
                </button>
                <button @click="tab = 'emails'" :class="tab === 'emails' ? 'bg-gold/15 text-gold border-l-4 border-gold shadow-[inset_0_0_15px_rgba(212,168,67,0.1)]' : 'text-gray-400 hover:bg-white/5 hover:text-white border-l-4 border-transparent'" class="w-full text-left px-4 py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-3">
                    <i class="fas fa-envelope"></i> Email Templates
                </button>
            </nav>
        </div>

        <!-- Settings Content -->
        <div class="col-span-1 md:col-span-3 bg-white/5 backdrop-blur-xl rounded-3xl shadow-lg border border-white/10 p-8 min-h-[500px]">
            
            <!-- General Tab -->
            <div x-show="tab === 'general'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4 font-serif">General Preferences</h3>
                
                <div class="space-y-6 max-w-2xl">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Site Name</label>
                        <input type="text" value="Foundida" class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">
                    </div>
                    
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Contact Email</label>
                        <input type="email" value="support@foundida.com" class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Support Phone Number</label>
                        <input type="text" value="+91 87505 30252" class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">
                    </div>

                    <div class="pt-6 flex items-center gap-4 border-t border-white/10 mt-8">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer">
                            <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gold border border-white/10"></div>
                        </label>
                        <span class="text-sm font-semibold text-gray-300">Enable Maintenance Mode</span>
                    </div>
                </div>
                </div>
            </div>

            <!-- Profile Tab -->
            <div x-show="tab === 'profile'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4 font-serif">My Profile</h3>
                
                <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-6 max-w-xl">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Full Name</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                <i class="fas fa-user"></i>
                            </span>
                            <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
                                class="w-full bg-white/5 border {{ $errors->has('name') ? 'border-red-500/50 focus:ring-red-500/50' : 'border-white/10 focus:border-gold/50 focus:ring-gold/50' }} rounded-xl py-3 pl-10 pr-4 text-white placeholder-gray-600 focus:outline-none focus:ring-1 transition-all text-sm shadow-inner"
                                placeholder="Admin Name">
                        </div>
                        @if($errors->has('name'))
                            <p class="mt-2 text-xs text-red-400 font-medium flex items-center gap-1"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Email Address</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                                class="w-full bg-white/5 border {{ $errors->has('email') ? 'border-red-500/50 focus:ring-red-500/50' : 'border-white/10 focus:border-gold/50 focus:ring-gold/50' }} rounded-xl py-3 pl-10 pr-4 text-white placeholder-gray-600 focus:outline-none focus:ring-1 transition-all text-sm shadow-inner"
                                placeholder="admin@foundida.com">
                        </div>
                        @if($errors->has('email'))
                            <p class="mt-2 text-xs text-red-400 font-medium flex items-center gap-1"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-gradient-to-r from-gold to-[#bfa03b] hover:from-[#e2b54d] hover:to-[#a88d30] text-navy font-bold py-3 px-6 rounded-xl transition-all shadow-lg shadow-gold/10 hover:shadow-gold/20 flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                            Save Profile
                        </button>
                    </div>
                </form>
            </div>

            <!-- Security Tab (Password Update) -->
            <div x-show="tab === 'security'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4 font-serif">Security Settings</h3>
                
                <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-6 max-w-xl">
                    @csrf
                    @method('PUT')

                    <div class="bg-navy/40 border border-blue-500/20 rounded-2xl p-6 mb-8 flex gap-4">
                        <i class="fas fa-info-circle text-blue-400 text-xl mt-0.5"></i>
                        <div>
                            <p class="text-sm text-gray-300 leading-relaxed">Ensure your account is using a long, random password to stay secure. Use at least 8 characters.</p>
                        </div>
                    </div>

                    <!-- Current Password -->
                    <div>
                        <label for="current_password" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Current Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                <i class="fas fa-lock-open"></i>
                            </span>
                            <input id="current_password" type="password" name="current_password" required
                                class="w-full bg-white/5 border {{ $errors->updatePassword->has('current_password') ? 'border-red-500/50 focus:ring-red-500/50' : 'border-white/10 focus:border-gold/50 focus:ring-gold/50' }} rounded-xl py-3 pl-10 pr-4 text-white placeholder-gray-600 focus:outline-none focus:ring-1 transition-all text-sm shadow-inner"
                                placeholder="••••••••">
                        </div>
                        @if($errors->updatePassword->has('current_password'))
                            <p class="mt-2 text-xs text-red-400 font-medium flex items-center gap-1"><i class="fas fa-exclamation-triangle"></i> {{ $errors->updatePassword->first('current_password') }}</p>
                        @endif
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">New Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                <i class="fas fa-key"></i>
                            </span>
                            <input id="password" type="password" name="password" required
                                class="w-full bg-white/5 border {{ $errors->updatePassword->has('password') ? 'border-red-500/50 focus:ring-red-500/50' : 'border-white/10 focus:border-gold/50 focus:ring-gold/50' }} rounded-xl py-3 pl-10 pr-4 text-white placeholder-gray-600 focus:outline-none focus:ring-1 transition-all text-sm shadow-inner"
                                placeholder="••••••••">
                        </div>
                        @if($errors->updatePassword->has('password'))
                            <p class="mt-2 text-xs text-red-400 font-medium flex items-center gap-1"><i class="fas fa-exclamation-triangle"></i> {{ $errors->updatePassword->first('password') }}</p>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Confirm New Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                <i class="fas fa-check-double"></i>
                            </span>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="w-full bg-white/5 border border-white/10 rounded-xl py-3 pl-10 pr-4 text-white placeholder-gray-600 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-gradient-to-r from-gold to-[#bfa03b] hover:from-[#e2b54d] hover:to-[#a88d30] text-navy font-bold py-3 px-6 rounded-xl transition-all shadow-lg shadow-gold/10 hover:shadow-gold/20 flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>

            <!-- Other Tabs Placeholders -->
            <div x-show="tab === 'gateways'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4 font-serif">Payment Gateways</h3>
                <div class="bg-navy/40 border border-white/10 rounded-2xl p-8 text-center">
                    <i class="fas fa-plug text-4xl text-gray-500 mb-4"></i>
                    <p class="text-gray-400">Payment gateway configuration is currently disabled in demo mode.</p>
                </div>
            </div>

            <div x-show="tab === 'emails'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4 font-serif">Email Templates</h3>
                <div class="bg-navy/40 border border-white/10 rounded-2xl p-8 text-center">
                    <i class="fas fa-envelope-open-text text-4xl text-gray-500 mb-4"></i>
                    <p class="text-gray-400">Email template editor is coming soon.</p>
                </div>
            </div>

        </div>
    </div>
@endsection
