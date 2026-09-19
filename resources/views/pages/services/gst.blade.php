@extends('layouts.app')

@section('title', 'GST Services & Filing Online | Foundida')

@section('content')
<!-- BREADCRUMB -->
<div class="bg-navy py-3.5 border-b border-navy-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs font-semibold" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-300 hover:text-gold transition uppercase tracking-wider">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3.5 h-3.5 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <a href="/services" class="text-gray-300 hover:text-gold transition uppercase tracking-wider">
                            Services
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3.5 h-3.5 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="text-gold uppercase tracking-wider">
                            GST Services
                        </span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- HERO SECTION -->
<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                ONE-STOP SOLUTION FOR ALL GST COMPLIANCE & FILING
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[52px] font-bold text-white leading-tight mb-4">
            Complete <span class="text-[#f5a623]">GST Compliance</span> & Advisory
        </h1>
        <div class="mt-4 flex flex-col bg-white/10 border border-white/20 px-6 py-3 rounded-xl shadow-lg items-center">
            <span class="text-[#f5a623] text-xl font-extrabold leading-none">Starting @ ₹499</span>
            <span class="text-gray-300 text-[10px] uppercase tracking-wider font-semibold mt-1">100% Online & Hassle-Free</span>
        </div>
    </div>
</x-inner-hero>

<!-- SERVICE CARDS GRID -->
<div class="bg-offwhite py-20 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300 hover:shadow-lg group">
                <div class="flex flex-col border-b border-gray-100 pb-5 mb-5">
                    <h3 class="text-xl font-bold text-navy group-hover:text-gold transition-colors">{{ $service['name_en'] }}</h3>
                </div>
                
                <div class="mb-6 flex-grow">
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 h-full">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-green-500 mr-3 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="text-gray-700 font-semibold text-sm leading-relaxed">{{ $service['included_en'] }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-end justify-between mb-6">
                    <div class="flex flex-col">
                        <span class="text-[10px] uppercase font-bold text-gray-400 mb-1">Pricing</span>
                        <div class="flex items-baseline text-navy">
                            <span class="text-3xl font-extrabold">₹{{ $service['price'] }}</span>
                            @if($service['period'])
                                <span class="ml-1 text-xs text-gray-500 font-medium">{{ $service['period'] }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <button class="w-full bg-gold text-navy hover:bg-gold-light min-h-[48px] rounded-xl font-bold transition-all duration-300 shadow flex items-center justify-center hover:-translate-y-1 uppercase tracking-wider text-sm">
                    Get Started
                </button>
            </div>
            @endforeach
        </div>

    </div>
</div>

<!-- PROCESS SECTION -->
<div class="bg-white py-20 border-y border-gray-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">Received a GST Notice? Resolve in 3 Easy Steps</h2>
            <p class="text-xs font-bold text-gold uppercase tracking-wider">Fast and accurate GST legal reply filing by experienced CAs</p>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-between gap-8 relative">
            <div class="hidden md:block absolute top-1/2 left-[10%] right-[10%] h-1 bg-gray-100 -translate-y-1/2"></div>
            
            <!-- Step 1 -->
            <div class="flex flex-col items-center bg-white relative z-10 px-4 group hover:-translate-y-1 transition-transform w-full md:w-1/3">
                <div class="w-16 h-16 rounded-full bg-navy text-gold flex items-center justify-center font-bold text-2xl mb-4 shadow-lg border-4 border-white">1</div>
                <div class="flex flex-col items-center text-center text-navy bg-gray-50 px-6 py-4 rounded-xl border border-gray-100 w-full">
                    <span class="font-bold text-base mb-1">Upload Notice</span>
                    <span class="text-xs text-gray-500">Securely submit your notice copy online</span>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col items-center bg-white relative z-10 px-4 group hover:-translate-y-1 transition-transform w-full md:w-1/3">
                <div class="w-16 h-16 rounded-full bg-navy text-gold flex items-center justify-center font-bold text-2xl mb-4 shadow-lg border-4 border-white">2</div>
                <div class="flex flex-col items-center text-center text-navy bg-gray-50 px-6 py-4 rounded-xl border border-gray-100 w-full">
                    <span class="font-bold text-base mb-1">Expert Review (24 hrs)</span>
                    <span class="text-xs text-gray-500">CA & Tax attorneys draft strong defense</span>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col items-center bg-white relative z-10 px-4 group hover:-translate-y-1 transition-transform w-full md:w-1/3">
                <div class="w-16 h-16 rounded-full bg-navy text-gold flex items-center justify-center font-bold text-2xl mb-4 shadow-lg border-4 border-white">3</div>
                <div class="flex flex-col items-center text-center text-navy bg-gray-50 px-6 py-4 rounded-xl border border-gray-100 w-full">
                    <span class="font-bold text-base mb-1">Reply Filed Successfully</span>
                    <span class="text-xs text-gray-500">Official acknowledgment receipt provided</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- WHY CHOOSE US (GST) -->
<div class="bg-navy py-20 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-white mb-2 font-serif">Why Choose Us for GST?</h2>
            <p class="text-xs font-bold text-gold uppercase tracking-wider">Trusted by 10,000+ businesses across India</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="flex flex-col items-center text-center p-6 bg-navy-800 rounded-2xl border border-navy-600 hover:-translate-y-1 transition-transform hover:border-gold group">
                <div class="w-16 h-16 bg-navy rounded-full flex items-center justify-center mb-6 shadow-inner border border-navy-600 group-hover:border-gold transition-colors">
                    <svg class="w-8 h-8 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-bold text-lg mb-1 text-white">Ex-CA & Tax Expert Team</h3>
                <p class="text-xs text-gray-300">Dedicated tax professionals handling your account</p>
            </div>

            <div class="flex flex-col items-center text-center p-6 bg-navy-800 rounded-2xl border border-navy-600 hover:-translate-y-1 transition-transform hover:border-gold group">
                <div class="w-16 h-16 bg-navy rounded-full flex items-center justify-center mb-6 shadow-inner border border-navy-600 group-hover:border-gold transition-colors">
                    <svg class="w-8 h-8 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-bold text-lg mb-1 text-white">Expert Notice Resolution</h3>
                <p class="text-xs text-gray-300">Fast turnaround for show-cause & audit notices</p>
            </div>

            <div class="flex flex-col items-center text-center p-6 bg-navy-800 rounded-2xl border border-navy-600 hover:-translate-y-1 transition-transform hover:border-gold group">
                <div class="w-16 h-16 bg-navy rounded-full flex items-center justify-center mb-6 shadow-inner border border-navy-600 group-hover:border-gold transition-colors">
                    <svg class="w-8 h-8 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h3 class="font-bold text-lg mb-1 text-white">100% Penalty-Free Track Record</h3>
                <p class="text-xs text-gray-300">Timely filings to protect you from late fees</p>
            </div>

            <div class="flex flex-col items-center text-center p-6 bg-navy-800 rounded-2xl border border-navy-600 hover:-translate-y-1 transition-transform hover:border-gold group">
                <div class="w-16 h-16 bg-navy rounded-full flex items-center justify-center mb-6 shadow-inner border border-navy-600 group-hover:border-gold transition-colors">
                    <svg class="w-8 h-8 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                </div>
                <h3 class="font-bold text-lg mb-1 text-white">Clear & Transparent Advice</h3>
                <p class="text-xs text-gray-300">No complex jargon, straightforward guidance</p>
            </div>
        </div>
    </div>
</div>

<!-- FAQS SECTION -->
<div class="bg-offwhite py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">Frequently Asked Questions</h2>
            <p class="text-xs font-bold text-gold uppercase tracking-wider mb-6">Got questions? We have answers</p>
        </div>

        <div class="space-y-4">
            @foreach($faqs as $index => $faq)
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center p-5 focus:outline-none min-h-[48px] hover:bg-gray-50 transition-colors text-left">
                    <span class="font-bold text-navy text-[15px] leading-tight" :class="{ 'text-gold': open }">{{ $faq['q_en'] }}</span>
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-offwhite flex items-center justify-center border border-gray-100 transition-transform duration-300" :class="{ 'rotate-180 bg-gold text-white border-gold': open }">
                        <svg class="w-5 h-5 text-gray-500" :class="{ 'text-white': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </button>
                <div x-show="open" x-collapse x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" style="display: none;">
                    <div class="p-5 pt-0 border-t border-gray-50 bg-gray-50/50">
                        <p class="text-gray-600 text-xs leading-relaxed mt-4">{{ $faq['a_en'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
