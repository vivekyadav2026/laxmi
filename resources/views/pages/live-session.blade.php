@extends('layouts.app')

@section('title', '₹99 Live Business Setup Session | Foundida')

@section('content')
<!-- HERO SECTION -->
<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none animate-pulse">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                <i class="fas fa-video mr-1"></i> LIVE 1-ON-1 EXPERT SESSION
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[52px] font-bold text-white leading-tight mb-4">
            Complete Business Guide <br/> For Just <span class="text-[#f5a623]">₹99</span>
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed max-w-[600px] mx-auto mb-8">
            Don't know where to start? Pay just ₹99 and get a 30-minute live session with our top business experts. We'll give you a complete roadmap for registration, GST, and compliances.
        </p>
        <button class="bg-[#f5a623] text-[#0d1b3e] px-8 py-4 rounded-xl font-bold text-lg hover:bg-[#c09435] transition-all shadow-lg hover:-translate-y-1 flex items-center gap-2">
            Book Live Session Now - ₹99 <i class="fas fa-arrow-right text-sm"></i>
        </button>
    </div>
</x-inner-hero>

<!-- WHAT HAPPENS IN SESSION -->
<div class="bg-white py-20 relative z-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <!-- Left Side Image/Graphic -->
            <div class="w-full md:w-1/2 relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-[#f5a623]/20 to-transparent rounded-2xl transform translate-x-4 translate-y-4"></div>
                <div class="bg-[#0B1F3A] p-8 rounded-2xl relative z-10 text-white shadow-2xl flex flex-col items-center justify-center text-center h-[350px]">
                    <div class="w-20 h-20 bg-[#f5a623] rounded-full flex items-center justify-center mb-6 shadow-lg shadow-[#f5a623]/30">
                        <i class="fas fa-headset text-3xl text-[#0B1F3A]"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">1-on-1 Guidance</h3>
                    <p class="text-gray-300 text-sm">Speak directly to our experts on a video call. No bots, no generic advice.</p>
                </div>
            </div>

            <!-- Right Side Content -->
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold text-[#0B1F3A] mb-2 font-serif">₹99 में क्या मिलेगा?</h2>
                <p class="text-sm font-bold text-[#D4A843] uppercase tracking-wider mb-8">What You Get in 30 Minutes</p>

                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-full bg-[#D4A843]/10 flex items-center justify-center text-[#D4A843] mr-4 shrink-0">
                            <i class="fas fa-map-signs"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-[#0B1F3A] mb-1">Business Roadmap</h4>
                            <p class="text-sm text-gray-500">आपके बिज़नेस के लिए कौन सी कंपनी (PVT, LLP, Proprietorship) सही है, इसकी पूरी जानकारी।</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-full bg-[#D4A843]/10 flex items-center justify-center text-[#D4A843] mr-4 shrink-0">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-[#0B1F3A] mb-1">Licensing & GST</h4>
                            <p class="text-sm text-gray-500">आपको किन-किन लाइसेंस (GST, FSSAI, Trademark) की जरूरत होगी, उसका पूरा खाका।</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-full bg-[#D4A843]/10 flex items-center justify-center text-[#D4A843] mr-4 shrink-0">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-[#0B1F3A] mb-1">Doubt Clearing</h4>
                            <p class="text-sm text-gray-500">आपके सभी सवालों और शंकाओं का लाइव समाधान।</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-gray-100">
                    <p class="text-xs text-gray-400 italic">"यह ₹99 का निवेश आपको भविष्य में हजारों रुपये और कई कानूनी झंझटों से बचा सकता है।"</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
