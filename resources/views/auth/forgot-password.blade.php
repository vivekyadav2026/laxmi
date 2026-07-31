@extends('layouts.app')

@section('title', 'Forgot Password - Foundida')

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
    </div>

    <!-- RIGHT SIDE (White 60%) -->
    <div class="w-full md:w-3/5 bg-white flex flex-col justify-center px-8 py-12 md:px-16 lg:px-24">
        <div class="max-w-md w-full mx-auto">
            
            <div class="flex flex-col mb-8 text-center md:text-left">
                <h1 class="text-3xl md:text-4xl font-bold text-navy font-serif mb-1">Forgot Password</h1>
                <p class="text-sm text-gray-400">Enter your email to receive password reset link</p>
            </div>

            @if (session('status'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-600 rounded-xl text-sm font-semibold">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block mb-1.5 text-navy font-semibold text-sm">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="e.g. user@email.com" class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                </div>

                <!-- Buttons -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-[#0B1F3A] hover:bg-[#152a4e] text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 shadow-md hover:-translate-y-0.5 flex items-center justify-center">
                        <span class="text-base font-extrabold">Send Reset Link</span>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center border-t border-gray-100 pt-6">
                <a href="/login" class="group flex flex-col items-center">
                    <span class="text-navy font-bold group-hover:text-gold transition-colors text-sm">Back to Login</span>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
