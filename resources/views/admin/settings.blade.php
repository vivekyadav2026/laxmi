@extends('layouts.admin')

@section('title', 'System Settings - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">System Settings</h1>
            <p class="text-sm text-gray-400">Configure global application preferences, security, payment gateways & emails.</p>
        </div>
    </div>

    <!-- Status Messages -->
    @if (session('status'))
        <div class="bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-sm p-4 rounded-2xl mb-8 flex items-start gap-3 relative z-10 shadow-lg shadow-emerald-500/5 animate-fadeIn">
            <i class="fas fa-check-circle mt-0.5 text-lg"></i>
            <div>
                <p class="font-bold">Settings Updated Successfully!</p>
                <p class="text-xs text-emerald-300/90 mt-0.5">
                    @switch(session('status'))
                        @case('general-updated')
                            General preferences have been updated.
                            @break
                        @case('profile-updated')
                            Your administrator profile was updated.
                            @break
                        @case('password-updated')
                            Security settings & password updated securely.
                            @break
                        @case('gateways-updated')
                            Payment gateways configuration saved.
                            @break
                        @case('emails-updated')
                            SMTP mail server & email template settings saved.
                            @break
                        @default
                            Your changes have been saved.
                    @endswitch
                </p>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative z-10" x-data="{ tab: '{{ request('tab', 'general') }}' }">
        
        <!-- Settings Navigation Sidebar -->
        <div class="col-span-1 bg-white/5 backdrop-blur-xl rounded-3xl shadow-lg border border-white/10 p-5 h-fit">
            <nav class="space-y-2">
                <button @click="tab = 'general'" :class="tab === 'general' ? 'bg-gold/15 text-gold border-l-4 border-gold shadow-[inset_0_0_15px_rgba(212,168,67,0.1)]' : 'text-gray-400 hover:bg-white/5 hover:text-white border-l-4 border-transparent'" class="w-full text-left px-4 py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-3">
                    <i class="fas fa-globe w-5"></i> General
                </button>
                <button @click="tab = 'profile'" :class="tab === 'profile' ? 'bg-gold/15 text-gold border-l-4 border-gold shadow-[inset_0_0_15px_rgba(212,168,67,0.1)]' : 'text-gray-400 hover:bg-white/5 hover:text-white border-l-4 border-transparent'" class="w-full text-left px-4 py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-3">
                    <i class="fas fa-user-circle w-5"></i> My Profile
                </button>
                <button @click="tab = 'security'" :class="tab === 'security' ? 'bg-gold/15 text-gold border-l-4 border-gold shadow-[inset_0_0_15px_rgba(212,168,67,0.1)]' : 'text-gray-400 hover:bg-white/5 hover:text-white border-l-4 border-transparent'" class="w-full text-left px-4 py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-3">
                    <i class="fas fa-shield-alt w-5"></i> Security
                </button>
                <button @click="tab = 'gateways'" :class="tab === 'gateways' ? 'bg-gold/15 text-gold border-l-4 border-gold shadow-[inset_0_0_15px_rgba(212,168,67,0.1)]' : 'text-gray-400 hover:bg-white/5 hover:text-white border-l-4 border-transparent'" class="w-full text-left px-4 py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-3">
                    <i class="fas fa-credit-card w-5"></i> Payment Gateways
                </button>
                <button @click="tab = 'emails'" :class="tab === 'emails' ? 'bg-gold/15 text-gold border-l-4 border-gold shadow-[inset_0_0_15px_rgba(212,168,67,0.1)]' : 'text-gray-400 hover:bg-white/5 hover:text-white border-l-4 border-transparent'" class="w-full text-left px-4 py-3.5 rounded-xl font-semibold text-sm transition-all duration-300 flex items-center gap-3">
                    <i class="fas fa-envelope w-5"></i> Email & SMTP
                </button>
            </nav>
        </div>

        <!-- Settings Content Cards -->
        <div class="col-span-1 md:col-span-3 bg-white/5 backdrop-blur-xl rounded-3xl shadow-lg border border-white/10 p-8 min-h-[550px]">
            
            <!-- 1. GENERAL TAB -->
            <div x-show="tab === 'general'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4 font-serif">General Preferences</h3>
                
                <form method="POST" action="{{ route('admin.settings.general') }}" class="space-y-6 max-w-2xl">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Site Name</label>
                            <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'Foundida') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Contact Email</label>
                            <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? 'support@foundida.com') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Support Phone</label>
                            <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '+91 87505 30252') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Currency Symbol</label>
                            <input type="text" name="currency_symbol" value="{{ old('currency_symbol', $settings['currency_symbol'] ?? '₹') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Office Address</label>
                        <input type="text" name="office_address" value="{{ old('office_address', $settings['office_address'] ?? '') }}" class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner" placeholder="Floor 4, Sector 62, Noida">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Default Meta Description</label>
                        <textarea name="meta_description" rows="2" class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-500 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                    </div>

                    <!-- Social Links Header -->
                    <h4 class="text-sm font-bold text-gold uppercase tracking-widest pt-2">Social Media Links</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Facebook URL</label>
                            <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" placeholder="https://facebook.com/foundida" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Instagram URL</label>
                            <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" placeholder="https://instagram.com/foundida" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">LinkedIn URL</label>
                            <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}" placeholder="https://linkedin.com/company/foundida" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Twitter / X URL</label>
                            <input type="url" name="twitter_url" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}" placeholder="https://twitter.com/foundida" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs">
                        </div>
                    </div>

                    <div class="pt-6 flex items-center gap-4 border-t border-white/10 mt-6">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="maintenance_mode" value="1" {{ ($settings['maintenance_mode'] ?? '0') === '1' ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gold border border-white/10"></div>
                        </label>
                        <span class="text-sm font-semibold text-gray-300">Enable Maintenance Mode</span>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-gradient-to-r from-gold to-[#bfa03b] hover:from-[#e2b54d] hover:to-[#a88d30] text-navy font-bold py-3 px-6 rounded-xl transition-all shadow-lg shadow-gold/10 flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                            Save General Settings
                        </button>
                    </div>
                </form>
            </div>

            <!-- 2. MY PROFILE TAB -->
            <div x-show="tab === 'profile'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4 font-serif">My Profile</h3>
                
                <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-6 max-w-xl">
                    @csrf
                    @method('PUT')

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
                        <button type="submit" class="bg-gradient-to-r from-gold to-[#bfa03b] hover:from-[#e2b54d] hover:to-[#a88d30] text-navy font-bold py-3 px-6 rounded-xl transition-all shadow-lg shadow-gold/10 flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>

            <!-- 3. SECURITY TAB -->
            <div x-show="tab === 'security'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4 font-serif">Security Settings</h3>
                
                <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-6 max-w-xl">
                    @csrf
                    @method('PUT')

                    <div class="bg-navy/40 border border-blue-500/20 rounded-2xl p-5 flex gap-4">
                        <i class="fas fa-shield-halved text-blue-400 text-xl mt-0.5"></i>
                        <div>
                            <p class="text-xs text-gray-300 leading-relaxed">Keep your administrator account protected using a strong password and multi-factor security rules.</p>
                        </div>
                    </div>

                    <div>
                        <label for="current_password" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Current Password</label>
                        <input id="current_password" type="password" name="current_password" required
                            class="w-full bg-white/5 border {{ $errors->updatePassword->has('current_password') ? 'border-red-500/50 focus:ring-red-500/50' : 'border-white/10 focus:border-gold/50 focus:ring-gold/50' }} rounded-xl py-3 px-4 text-white placeholder-gray-600 focus:outline-none focus:ring-1 transition-all text-sm shadow-inner"
                            placeholder="••••••••">
                        @if($errors->updatePassword->has('current_password'))
                            <p class="mt-2 text-xs text-red-400 font-medium flex items-center gap-1"><i class="fas fa-exclamation-triangle"></i> {{ $errors->updatePassword->first('current_password') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">New Password</label>
                        <input id="password" type="password" name="password" required
                            class="w-full bg-white/5 border {{ $errors->updatePassword->has('password') ? 'border-red-500/50 focus:ring-red-500/50' : 'border-white/10 focus:border-gold/50 focus:ring-gold/50' }} rounded-xl py-3 px-4 text-white placeholder-gray-600 focus:outline-none focus:ring-1 transition-all text-sm shadow-inner"
                            placeholder="••••••••">
                        @if($errors->updatePassword->has('password'))
                            <p class="mt-2 text-xs text-red-400 font-medium flex items-center gap-1"><i class="fas fa-exclamation-triangle"></i> {{ $errors->updatePassword->first('password') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Confirm New Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-600 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner"
                            placeholder="••••••••">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4 border-t border-white/10">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Session Timeout (Minutes)</label>
                            <input type="number" name="session_timeout" value="{{ old('session_timeout', $settings['session_timeout'] ?? 120) }}" class="w-full bg-white/5 border border-white/10 rounded-xl py-3 px-4 text-white text-sm">
                        </div>

                        <div class="flex items-center gap-3 pt-6">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="enable_2fa" value="1" {{ ($settings['enable_2fa'] ?? '0') === '1' ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gold border border-white/10"></div>
                            </label>
                            <span class="text-xs font-bold text-gray-300 uppercase tracking-wider">Enable 2FA Auth</span>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-gradient-to-r from-gold to-[#bfa03b] hover:from-[#e2b54d] hover:to-[#a88d30] text-navy font-bold py-3 px-6 rounded-xl transition-all shadow-lg shadow-gold/10 flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                            Save Security Settings
                        </button>
                    </div>
                </form>
            </div>

            <!-- 4. PAYMENT GATEWAYS TAB -->
            <div x-show="tab === 'gateways'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4 font-serif">Payment Gateways Configuration</h3>
                
                <form method="POST" action="{{ route('admin.settings.gateways') }}" class="space-y-6 max-w-2xl">
                    @csrf
                    @method('PUT')

                    <!-- Gateway Mode Switcher -->
                    <div class="bg-navy/40 p-4 rounded-2xl border border-white/10 flex items-center justify-between">
                        <div>
                            <span class="text-sm font-bold text-white block">Environment Mode</span>
                            <span class="text-xs text-gray-400">Switch between Sandbox Test mode and Live Production mode.</span>
                        </div>
                        <select name="gateway_mode" class="bg-white/10 text-white text-xs font-bold px-4 py-2 rounded-xl border border-white/10 focus:outline-none focus:border-gold">
                            <option value="test" {{ ($settings['gateway_mode'] ?? 'test') === 'test' ? 'selected' : '' }} class="bg-navy">Test / Sandbox</option>
                            <option value="live" {{ ($settings['gateway_mode'] ?? 'test') === 'live' ? 'selected' : '' }} class="bg-navy">Live Production</option>
                        </select>
                    </div>

                    <!-- Razorpay Setup Guide Banner -->
                    @php
                        $rzpKey = $settings['razorpay_key'] ?? '';
                        $rzpKeyValid = preg_match('/^rzp_(test|live)_[A-Za-z0-9]{10,}$/', $rzpKey);
                    @endphp
                    @if(!$rzpKeyValid)
                    <div class="bg-amber-500/10 border border-amber-500/30 rounded-2xl p-5 flex gap-4">
                        <i class="fas fa-exclamation-triangle text-amber-400 text-xl mt-0.5 shrink-0"></i>
                        <div>
                            <p class="text-sm font-bold text-amber-300 mb-1">⚠️ Razorpay Keys Not Configured</p>
                            <p class="text-xs text-amber-200/80 leading-relaxed mb-3">Payments will fail until you add real API keys. Follow these steps:</p>
                            <ol class="text-xs text-amber-200/80 space-y-1.5 mb-3">
                                <li class="flex items-start gap-2"><span class="bg-amber-500 text-navy rounded-full w-4 h-4 flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">1</span> Login to <strong>dashboard.razorpay.com</strong></li>
                                <li class="flex items-start gap-2"><span class="bg-amber-500 text-navy rounded-full w-4 h-4 flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">2</span> Go to <strong>Settings → API Keys → Generate Key</strong></li>
                                <li class="flex items-start gap-2"><span class="bg-amber-500 text-navy rounded-full w-4 h-4 flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">3</span> Copy <strong>Key ID</strong> (starts with <code class="bg-black/20 px-1 rounded">rzp_test_</code>) and <strong>Key Secret</strong></li>
                                <li class="flex items-start gap-2"><span class="bg-amber-500 text-navy rounded-full w-4 h-4 flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">4</span> Paste them in the fields below and click <strong>Save Gateway Settings</strong></li>
                            </ol>
                            <a href="https://dashboard.razorpay.com/app/keys" target="_blank"
                               class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-400 text-navy text-xs font-bold px-4 py-2 rounded-xl transition-colors">
                                <i class="fas fa-external-link-alt"></i> Open Razorpay Dashboard → API Keys
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="bg-emerald-500/10 border border-emerald-500/30 rounded-2xl p-4 flex items-center gap-3">
                        <i class="fas fa-check-circle text-emerald-400 text-lg"></i>
                        <div>
                            <p class="text-sm font-bold text-emerald-300">Razorpay Keys Configured</p>
                            <p class="text-xs text-emerald-200/70">Key ID: <code class="bg-black/20 px-1 rounded">{{ Str::mask($rzpKey, '*', 15) }}</code></p>
                        </div>
                    </div>
                    @endif

                    <!-- Razorpay Section -->
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 space-y-4">
                        <div class="flex items-center justify-between border-b border-white/10 pb-3">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-credit-card text-blue-400 text-lg"></i>
                                <span class="font-bold text-white text-base">Razorpay Gateway</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="razorpay_enabled" value="1" {{ ($settings['razorpay_enabled'] ?? '1') === '1' ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gold border border-white/10"></div>
                            </label>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Razorpay Key ID</label>
                                <input type="text" name="razorpay_key" value="{{ old('razorpay_key', $settings['razorpay_key'] ?? '') }}" placeholder="rzp_test_..." class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Razorpay Secret</label>
                                <input type="password" name="razorpay_secret" value="{{ old('razorpay_secret', $settings['razorpay_secret'] ?? '') }}" placeholder="••••••••••••" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                            </div>
                        </div>
                    </div>

                    <!-- Cashfree Section -->
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 space-y-4">
                        <div class="flex items-center justify-between border-b border-white/10 pb-3">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-bolt text-gold text-lg"></i>
                                <span class="font-bold text-white text-base">Cashfree Payments</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="cashfree_enabled" value="1" {{ ($settings['cashfree_enabled'] ?? '0') === '1' ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gold border border-white/10"></div>
                            </label>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Cashfree App ID</label>
                                <input type="text" name="cashfree_app_id" value="{{ old('cashfree_app_id', $settings['cashfree_app_id'] ?? '') }}" placeholder="CF..." class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Cashfree Secret Key</label>
                                <input type="password" name="cashfree_secret" value="{{ old('cashfree_secret', $settings['cashfree_secret'] ?? '') }}" placeholder="••••••••••••" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                            </div>
                        </div>
                    </div>

                    <!-- PhonePe Section -->
                    <div class="bg-white/5 border border-white/10 rounded-2xl p-6 space-y-4">
                        <div class="flex items-center justify-between border-b border-white/10 pb-3">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-mobile-screen-button text-purple-400 text-lg"></i>
                                <span class="font-bold text-white text-base">PhonePe Gateway</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="phonepe_enabled" value="1" {{ ($settings['phonepe_enabled'] ?? '0') === '1' ? 'checked' : '' }} class="sr-only peer">
                                <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gold border border-white/10"></div>
                            </label>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">PhonePe Merchant ID</label>
                                <input type="text" name="phonepe_merchant_id" value="{{ old('phonepe_merchant_id', $settings['phonepe_merchant_id'] ?? '') }}" placeholder="M22..." class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">PhonePe Salt Key</label>
                                <input type="password" name="phonepe_salt_key" value="{{ old('phonepe_salt_key', $settings['phonepe_salt_key'] ?? '') }}" placeholder="••••••••••••" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                            </div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-gradient-to-r from-gold to-[#bfa03b] hover:from-[#e2b54d] hover:to-[#a88d30] text-navy font-bold py-3 px-6 rounded-xl transition-all shadow-lg shadow-gold/10 flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                            Save Gateway Settings
                        </button>
                    </div>
                </form>
            </div>

            <!-- 5. EMAIL & SMTP TAB -->
            <div x-show="tab === 'emails'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4 font-serif">Email & SMTP Configuration</h3>
                
                <form method="POST" action="{{ route('admin.settings.emails') }}" class="space-y-6 max-w-2xl">
                    @csrf
                    @method('PUT')

                    <h4 class="text-xs font-bold text-gold uppercase tracking-widest">SMTP Server Settings</h4>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Mailer Driver</label>
                            <input type="text" name="mail_mailer" value="{{ old('mail_mailer', $settings['mail_mailer'] ?? 'smtp') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">SMTP Host</label>
                            <input type="text" name="mail_host" value="{{ old('mail_host', $settings['mail_host'] ?? 'smtp.gmail.com') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">SMTP Port</label>
                            <input type="number" name="mail_port" value="{{ old('mail_port', $settings['mail_port'] ?? 587) }}" required class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">SMTP Username</label>
                            <input type="text" name="mail_username" value="{{ old('mail_username', $settings['mail_username'] ?? '') }}" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">SMTP Password</label>
                            <input type="password" name="mail_password" value="{{ old('mail_password', $settings['mail_password'] ?? '') }}" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Encryption</label>
                            <select name="mail_encryption" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">
                                <option value="tls" {{ ($settings['mail_encryption'] ?? 'tls') === 'tls' ? 'selected' : '' }} class="bg-navy">TLS</option>
                                <option value="ssl" {{ ($settings['mail_encryption'] ?? 'tls') === 'ssl' ? 'selected' : '' }} class="bg-navy">SSL</option>
                            </select>
                        </div>
                    </div>

                    <h4 class="text-xs font-bold text-gold uppercase tracking-widest pt-2">Sender Information & Alerts</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">From Mail Address</label>
                            <input type="email" name="mail_from_address" value="{{ old('mail_from_address', $settings['mail_from_address'] ?? 'noreply@foundida.com') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">From Sender Name</label>
                            <input type="text" name="mail_from_name" value="{{ old('mail_from_name', $settings['mail_from_name'] ?? 'Foundida Support') }}" required class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Admin Lead Notification Email</label>
                        <input type="email" name="lead_notification_email" value="{{ old('lead_notification_email', $settings['lead_notification_email'] ?? 'admin@foundida.com') }}" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs" placeholder="Receive new lead alerts here">
                    </div>

                    <h4 class="text-xs font-bold text-gold uppercase tracking-widest pt-2">Welcome Email Template</h4>

                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Welcome Email Subject</label>
                        <input type="text" name="welcome_email_subject" value="{{ old('welcome_email_subject', $settings['welcome_email_subject'] ?? 'Welcome to Foundida!') }}" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1">Welcome Email Body</label>
                        <textarea name="welcome_email_body" rows="3" class="w-full bg-white/5 border border-white/10 rounded-xl py-2.5 px-3 text-white text-xs font-mono">{{ old('welcome_email_body', $settings['welcome_email_body'] ?? '') }}</textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="bg-gradient-to-r from-gold to-[#bfa03b] hover:from-[#e2b54d] hover:to-[#a88d30] text-navy font-bold py-3 px-6 rounded-xl transition-all shadow-lg shadow-gold/10 flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                            Save Email & SMTP Settings
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
