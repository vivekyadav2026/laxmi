@extends('layouts.app')

@section('title', 'Register - Foundida')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row bg-white">
    <!-- LEFT SIDE (Navy 40%) -->
    <div class="w-full md:w-2/5 bg-navy text-white flex flex-col justify-between p-8 md:p-12 relative overflow-hidden hidden md:flex">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
        
        <div class="relative z-10">
            <!-- Brand & Tagline -->
            <a href="/" class="inline-block mb-12 group">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gold rounded-lg flex items-center justify-center mr-3 shadow-lg group-hover:-translate-y-1 transition-transform">
                        <svg class="w-6 h-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif text-2xl font-bold text-white tracking-wide leading-tight">Legal Platform</span>
                    </div>
                </div>
            </a>

            <!-- Trust Points -->
            <div class="space-y-8 mt-10">
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-navy-800 border border-gold flex items-center justify-center shrink-0 mr-4 text-gold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-base leading-tight mb-0.5">Bar Council Verified Lawyers</span>
                        <span class="text-xs text-gray-400">Get legal advice from certified lawyers</span>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-navy-800 border border-gold flex items-center justify-center shrink-0 mr-4 text-gold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-base leading-tight mb-0.5">Starting at ₹499</span>
                        <span class="text-xs text-gray-400">Affordable corporate & legal solutions</span>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-navy-800 border border-gold flex items-center justify-center shrink-0 mr-4 text-gold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-base leading-tight mb-0.5">Trusted by 10 Lakh+</span>
                        <span class="text-xs text-gray-400">India\'s top startups and individuals</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial -->
        <div class="relative z-10 mt-16 bg-navy-800/80 p-5 rounded-2xl border border-navy-600">
            <svg class="w-8 h-8 text-gold opacity-50 absolute -top-4 -left-2" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
            <div class="flex flex-col italic text-gray-300 relative z-10 space-y-2">
                <span class="text-sm">"Excellent service! My company registration was done without any hassle."</span>
            </div>
            <div class="mt-4 flex items-center">
                <div class="w-8 h-8 rounded-full bg-gray-500 mr-3"></div>
                <div class="flex flex-col">
                    <span class="font-bold text-white text-xs">Amit Sharma</span>
                    <span class="text-[9px] text-gold uppercase tracking-widest">Client</span>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE (White 60%) -->
    <div class="w-full md:w-3/5 bg-white flex flex-col justify-center px-8 py-12 md:px-16 lg:px-24">
        <div class="max-w-xl w-full mx-auto">
            
            <div class="flex flex-col mb-8 text-center md:text-left">
                <h1 class="text-3xl md:text-4xl font-bold text-navy font-serif mb-1">Get Started</h1>
                <p class="text-sm text-gray-400">Create your client account</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5" id="registerForm">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Name -->
                    <div>
                        <label class="block mb-1.5 text-navy font-semibold text-sm">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Amit Patel" class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                    </div>
                    <!-- Phone -->
                    <div>
                        <label class="block mb-1.5 text-navy font-semibold text-sm">Phone Number <span class="text-red-500">*</span></label>
                        <div class="relative flex">
                            <div class="flex-shrink-0 z-10 inline-flex items-center py-2 px-3 text-sm font-semibold text-center text-navy bg-gray-100 border border-gray-300 rounded-l-xl">
                                +91
                            </div>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="10-digit number" class="block w-full z-20 border-gray-300 rounded-r-xl shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Email -->
                    <div>
                        <label class="block mb-1.5 text-navy font-semibold text-sm">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="e.g. user@email.com" class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                    </div>
                    <!-- City -->
                    <div>
                        <label class="block mb-1.5 text-navy font-semibold text-sm">City <span class="text-red-500">*</span></label>
                        <input type="text" name="city" value="{{ old('city') }}" required placeholder="e.g. Delhi" class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                    </div>
                </div>

                <!-- Password & Confirm Password Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5" x-data="{ showPass: false, showConfirmPass: false }">
                    <!-- Password -->
                    <div>
                        <label class="block mb-1.5 text-navy font-semibold text-sm">Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input :type="showPass ? 'text' : 'password'" name="password" required placeholder="••••••••" class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] pl-4 pr-10 text-sm">
                            <button type="button" @click="showPass = !showPass" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-navy focus:outline-none">
                                <template x-if="showPass">
                                    <i class="fas fa-eye-slash text-sm"></i>
                                </template>
                                <template x-if="!showPass">
                                    <i class="fas fa-eye text-sm"></i>
                                </template>
                            </button>
                        </div>
                    </div>
                    <!-- Confirm Password -->
                    <div>
                        <label class="block mb-1.5 text-navy font-semibold text-sm">Confirm Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input :type="showConfirmPass ? 'text' : 'password'" name="password_confirmation" required placeholder="••••••••" class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] pl-4 pr-10 text-sm">
                            <button type="button" @click="showConfirmPass = !showConfirmPass" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-navy focus:outline-none">
                                <template x-if="showConfirmPass">
                                    <i class="fas fa-eye-slash text-sm"></i>
                                </template>
                                <template x-if="!showConfirmPass">
                                    <i class="fas fa-eye text-sm"></i>
                                </template>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Terms -->
                <div class="flex items-start mt-6">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" required class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-navy-300 text-navy">
                    </div>
                    <label for="terms" class="ml-2 text-sm font-semibold text-gray-600 flex flex-col">
                        <span>I agree to the <a href="#" class="text-gold hover:underline">Terms & Conditions</a>.</span>
                    </label>
                </div>

                <!-- Buttons -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-[#0B1F3A] hover:bg-[#152a4e] text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 shadow-md hover:-translate-y-0.5 flex items-center justify-center">
                        <span class="text-base font-extrabold">Create Account</span>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center border-t border-gray-100 pt-6">
                <a href="{{ route('auth.google') }}" class="group flex items-center justify-center mb-6 border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 min-h-[48px] rounded-xl font-bold transition-all duration-300 shadow-sm hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-3" viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
                    <span class="text-[14px]">Sign Up with Google</span>
                </a>

                <a href="/login" class="group flex flex-col items-center">
                    <span class="text-navy font-bold group-hover:text-gold transition-colors text-sm">Already have an account? Login</span>
                </a>
            </div>

        </div>
    </div>
</div>


@endsection
