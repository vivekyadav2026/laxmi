@extends('layouts.app')
@section('title', $service['name_en'] . ' | ' . $category['name'])

@section('content')
<!-- Hero Section -->
<section class="bg-[#0B1F3A] py-[80px] text-white">
    <div class="container-custom flex flex-col md:flex-row gap-[48px] items-center">
        <div class="flex-1 text-left">
            <div class="text-[#D4A843] text-[12px] font-bold tracking-[0.15em] uppercase mb-[12px]">{{ $category['name'] }}</div>
            <h1 class="text-[36px] md:text-[48px] font-extrabold leading-[1.1]">{{ $service['name_en'] }}</h1>
            <div class="text-[#D4A843] text-[20px] font-medium mt-[8px]">
                {{ $service['name_hi'] }}
            </div>
            
            <p class="text-[#E2E0D8] text-[16px] leading-[1.7] mt-[24px] max-w-[500px]">
                Fast, reliable, and transparent legal service for your business. Let our experts handle the paperwork while you focus on growth.
            </p>
            
            <div class="flex flex-wrap items-center gap-[16px] mt-[32px]">
                <div class="bg-white/10 border border-white/20 rounded-[8px] px-[20px] py-[12px]">
                    <div class="text-white/60 text-[11px] uppercase font-bold tracking-[0.05em]">Starting at</div>
                    <div class="text-[#D4A843] text-[24px] font-bold leading-none mt-[4px]">{{ $service['price'] }}</div>
                </div>
                <div class="bg-white/10 border border-white/20 rounded-[8px] px-[20px] py-[12px]">
                    <div class="text-white/60 text-[11px] uppercase font-bold tracking-[0.05em]">Timeframe</div>
                    <div class="text-white text-[24px] font-bold leading-none mt-[4px]">{{ $service['time'] }}</div>
                </div>
            </div>
            
            <div class="mt-[32px] flex items-center gap-[16px]">
                <a href="#" class="bg-[#D4A843] text-white px-[32px] py-[16px] rounded-[4px] font-bold hover:bg-[#c49a3c] transition-colors inline-block">
                    Get Started Now
                </a>
                <a href="#" class="bg-transparent border border-white/30 text-white px-[32px] py-[16px] rounded-[4px] font-bold hover:bg-white/10 transition-colors inline-block">
                    Talk to Expert
                </a>
            </div>
        </div>
        
        <div class="w-full md:w-[400px]">
            <div class="bg-white rounded-[8px] p-[32px] hero-card-shadow text-[#1A1A2E]">
                <div class="text-[20px] font-bold">Request a Call Back</div>
                <div class="text-[#5C6370] text-[13px] mt-[4px]">Our experts will explain the process and help you get started.</div>
                
                <form class="mt-[24px] space-y-[16px]">
                    <div>
                        <label class="block text-[12px] font-semibold text-[#1A1A2E] mb-[6px]">Full Name</label>
                        <input type="text" class="w-full h-[48px] border border-[#E2E0D8] rounded-[4px] px-[16px] focus:outline-none focus:border-[#D4A843]" placeholder="e.g. Rahul Kumar">
                    </div>
                    <div>
                        <label class="block text-[12px] font-semibold text-[#1A1A2E] mb-[6px]">Phone Number</label>
                        <input type="text" class="w-full h-[48px] border border-[#E2E0D8] rounded-[4px] px-[16px] focus:outline-none focus:border-[#D4A843]" placeholder="+91">
                    </div>
                    <button type="button" class="w-full h-[48px] bg-[#0B1F3A] text-white font-bold rounded-[4px] hover:bg-[#0a182b] transition-colors">
                        Request Call
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Content Details -->
<section class="bg-white py-[80px]">
    <div class="container-custom">
        <div class="text-center max-w-[700px] mx-auto">
            <h2 class="text-[#0B1F3A] text-[32px] font-bold">Why choose us for {{ $service['name_en'] }}?</h2>
            <p class="text-[#5C6370] mt-[16px] leading-[1.8]">
                We simplify the process of {{ $service['name_en'] }} with our expert team of professionals. Experience complete transparency, no hidden fees, and lightning-fast delivery.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-[32px] mt-[48px]">
            <div class="p-[32px] border border-[#E2E0D8] rounded-[8px] bg-[#F8F7F3] hover:-translate-y-1 transition-transform">
                <div class="text-[28px] mb-[16px]">⚡</div>
                <h3 class="text-[#0B1F3A] font-bold text-[18px]">Fast Processing</h3>
                <p class="text-[#5C6370] text-[14px] mt-[8px]">We ensure the application is submitted quickly and followed up regularly.</p>
            </div>
            <div class="p-[32px] border border-[#E2E0D8] rounded-[8px] bg-[#F8F7F3] hover:-translate-y-1 transition-transform">
                <div class="text-[28px] mb-[16px]">🔒</div>
                <h3 class="text-[#0B1F3A] font-bold text-[18px]">100% Secure & Valid</h3>
                <p class="text-[#5C6370] text-[14px] mt-[8px]">All documents and filings comply with the latest government regulations.</p>
            </div>
            <div class="p-[32px] border border-[#E2E0D8] rounded-[8px] bg-[#F8F7F3] hover:-translate-y-1 transition-transform">
                <div class="text-[28px] mb-[16px]">👨‍⚖️</div>
                <h3 class="text-[#0B1F3A] font-bold text-[18px]">Expert Assistance</h3>
                <p class="text-[#5C6370] text-[14px] mt-[8px]">Guided by senior CAs, CSs, and Lawyers every step of the way.</p>
            </div>
        </div>
    </div>
</section>
@endsection
