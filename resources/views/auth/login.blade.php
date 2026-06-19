@extends('layouts.app')

@section('title', 'लॉगिन | Login - Foundida')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row bg-white">
    <!-- LEFT SIDE (Navy 40%) -->
    <div class="w-full md:w-2/5 bg-navy text-white flex flex-col justify-between p-8 md:p-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
        
        <div class="relative z-10">
            <!-- Brand & Tagline -->
            <a href="/" class="inline-block mb-12 group">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gold rounded-lg flex items-center justify-center mr-3 shadow-lg group-hover:-translate-y-1 transition-transform">
                        <svg class="w-6 h-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif text-2xl font-bold text-white tracking-wide leading-tight">लॉ प्लेटफॉर्म</span>
                        <span class="text-[9px] uppercase tracking-widest text-gold font-bold">Legal Platform</span>
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
                        <span class="font-bold text-white text-base leading-tight mb-0.5">बार काउंसिल वेरिफाइड वकील</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Bar Council Verified Lawyers</span>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-navy-800 border border-gold flex items-center justify-center shrink-0 mr-4 text-gold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-base leading-tight mb-0.5">₹499 से शुरू</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Starting at ₹499</span>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-navy-800 border border-gold flex items-center justify-center shrink-0 mr-4 text-gold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-base leading-tight mb-0.5">10 लाख+ का भरोसा</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Trusted by 10 Lakh+</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial -->
        <div class="relative z-10 mt-16 bg-navy-800/80 p-5 rounded-2xl border border-navy-600">
            <svg class="w-8 h-8 text-gold opacity-50 absolute -top-4 -left-2" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
            <div class="flex flex-col italic text-gray-300 relative z-10 space-y-2">
                <span class="text-sm">"बेहतरीन सेवा! मेरी कंपनी का रजिस्ट्रेशन बिना किसी परेशानी के हो गया।"</span>
                <span class="text-[11px] text-gray-400">"Excellent service! My company registration was done without any hassle."</span>
            </div>
            <div class="mt-4 flex items-center">
                <div class="w-8 h-8 rounded-full bg-gray-500 mr-3"></div>
                <div class="flex flex-col">
                    <span class="font-bold text-white text-xs">अमित शर्मा</span>
                    <span class="text-[9px] text-gold uppercase tracking-widest">Amit Sharma</span>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE (White 60%) -->
    <div class="w-full md:w-3/5 bg-white flex flex-col justify-center px-8 py-12 md:px-16 lg:px-24" x-data="{ loginMethod: 'phone' }">
        <div class="max-w-md w-full mx-auto">
            
            <div class="flex flex-col mb-10 text-center md:text-left">
                <h1 class="text-3xl md:text-4xl font-bold text-navy font-serif mb-1">वापस स्वागत है</h1>
                <span class="text-sm font-bold text-gold uppercase tracking-wider">Welcome Back</span>
            </div>

            <form class="space-y-6">
                
                <!-- Phone Login Mode -->
                <div x-show="loginMethod === 'phone'" x-transition>
                    <label class="flex flex-col mb-2 text-navy">
                        <span class="font-bold text-sm">फ़ोन नंबर <span class="text-red-500">*</span></span>
                        <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">Phone Number</span>
                    </label>
                    <div class="relative flex">
                        <div class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-navy bg-gray-100 border border-gray-300 rounded-l-lg">
                            +91
                        </div>
                        <input type="tel" required placeholder="अपना 10 अंकों का नंबर दर्ज करें / Enter 10-digit number" class="block w-full z-20 border-gray-300 rounded-r-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                    </div>
                    <p class="text-xs text-gray-500 mt-2 flex flex-col">
                        <span>लॉगिन करने के लिए आपको एक OTP प्राप्त होगा।</span>
                        <span class="text-[10px] uppercase tracking-wider text-gray-400 mt-0.5">You will receive an OTP to login.</span>
                    </p>
                </div>

                <!-- Email Login Mode -->
                <div x-show="loginMethod === 'email'" x-transition class="space-y-6" style="display: none;">
                    <div>
                        <label class="flex flex-col mb-2 text-navy">
                            <span class="font-bold text-sm">ईमेल <span class="text-red-500">*</span></span>
                            <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">Email</span>
                        </label>
                        <input type="email" placeholder="उदा: user@email.com / Ex: user@email.com" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4">
                    </div>
                    <div>
                        <label class="flex flex-col mb-2 text-navy">
                            <span class="font-bold text-sm">पासवर्ड <span class="text-red-500">*</span></span>
                            <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">Password</span>
                        </label>
                        <input type="password" placeholder="••••••••" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4">
                    </div>
                    <div class="flex justify-end">
                        <a href="#" class="text-sm font-bold text-gold hover:text-gold-dark transition-colors flex flex-col items-end">
                            <span>पासवर्ड भूल गए?</span>
                            <span class="text-[10px] uppercase tracking-widest text-gray-500">Forgot Password?</span>
                        </a>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="space-y-4 pt-4">
                    <button type="button" x-show="loginMethod === 'phone'" class="w-full bg-gold text-navy hover:bg-gold-light min-h-[48px] rounded-xl font-bold transition-all duration-300 shadow-md hover:-translate-y-1 flex flex-col items-center justify-center group">
                        <span class="text-[16px] font-extrabold group-hover:scale-105 transition-transform">OTP प्राप्त करें</span>
                        <span class="text-[10px] uppercase tracking-widest mt-0.5">Get OTP</span>
                    </button>

                    <button type="submit" x-show="loginMethod === 'email'" class="w-full bg-gold text-navy hover:bg-gold-light min-h-[48px] rounded-xl font-bold transition-all duration-300 shadow-md hover:-translate-y-1 flex flex-col items-center justify-center group" style="display:none;">
                        <span class="text-[16px] font-extrabold group-hover:scale-105 transition-transform">लॉगिन करें</span>
                        <span class="text-[10px] uppercase tracking-widest mt-0.5">Login</span>
                    </button>

                    <div class="relative py-2">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-400 font-bold uppercase tracking-widest text-[10px]">या / OR</span>
                        </div>
                    </div>

                    <button type="button" @click="loginMethod = 'email'" x-show="loginMethod === 'phone'" class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center hover:-translate-y-1">
                        <span class="text-[15px]">ईमेल से लॉगिन करें</span>
                        <span class="text-[10px] uppercase tracking-wider mt-0.5">Login with Email</span>
                    </button>

                    <button type="button" @click="loginMethod = 'phone'" x-show="loginMethod === 'email'" class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center hover:-translate-y-1" style="display:none;">
                        <span class="text-[15px]">OTP से लॉगिन करें</span>
                        <span class="text-[10px] uppercase tracking-wider mt-0.5">Login with OTP</span>
                    </button>

                    <button type="button" class="w-full border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 min-h-[48px] rounded-xl font-bold transition-all duration-300 shadow-sm flex items-center justify-center hover:-translate-y-1">
                        <svg class="w-5 h-5 mr-3" viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
                        <div class="flex flex-col items-center">
                            <span class="text-[14px]">Google के साथ लॉगिन करें</span>
                            <span class="text-[9px] uppercase tracking-widest mt-0.5 text-gray-500">Login with Google</span>
                        </div>
                    </button>
                </div>
            </form>

            <div class="mt-10 text-center border-t border-gray-100 pt-8 flex flex-col space-y-4">
                <a href="/register" class="group flex flex-col items-center">
                    <span class="text-navy font-bold group-hover:text-gold transition-colors">नया अकाउंट बनाएं</span>
                    <span class="text-[10px] uppercase font-bold tracking-widest text-gray-500 group-hover:text-gold transition-colors">Create New Account</span>
                </a>
                
                <a href="/login" class="group flex flex-col items-center">
                    <span class="text-sm font-semibold text-gray-500 group-hover:text-navy transition-colors">वकील हैं? यहाँ लॉगिन करें</span>
                    <span class="text-[9px] uppercase font-bold tracking-widest text-gray-400 group-hover:text-navy transition-colors">Are you a lawyer? Login here</span>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
