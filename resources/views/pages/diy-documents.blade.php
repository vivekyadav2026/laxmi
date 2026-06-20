@extends('layouts.app')

@section('title', 'दस्तावेज़ बनाएं | DIY Documents - Foundida')

@section('content')
<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                CREATE YOUR LEGAL DOCUMENTS
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[48px] font-bold text-white leading-tight">
            खुद बनाएं अपने <span class="text-[#f5a623]">दस्तावेज़</span>
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed mt-4 max-w-[600px] mx-auto">
            5 मिनट में तैयार | वकील से सस्ता | तुरंत डाउनलोड
        </p>
    </div>
</x-inner-hero>

<!-- HOW IT WORKS (3 Steps) -->
<div class="bg-gold border-b border-gold-dark shadow-sm">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 relative">
            <!-- Connecting Line on Desktop -->
            <div class="hidden md:block absolute top-1/2 left-[15%] right-[15%] h-0.5 bg-navy/20 -translate-y-1/2"></div>
            
            <!-- Step 1 -->
            <div class="flex flex-col items-center bg-gold relative z-10 px-4 group hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-bold text-lg mb-3 shadow-md border-4 border-gold">1</div>
                <div class="flex flex-col items-center text-center text-navy">
                    <span class="font-bold text-sm">दस्तावेज़ चुनें</span>
                    <span class="text-[10px] uppercase font-bold text-navy/70">Select Document</span>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col items-center bg-gold relative z-10 px-4 group hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-bold text-lg mb-3 shadow-md border-4 border-gold">2</div>
                <div class="flex flex-col items-center text-center text-navy">
                    <span class="font-bold text-sm">फॉर्म भरें (5 min)</span>
                    <span class="text-[10px] uppercase font-bold text-navy/70">Fill Form</span>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col items-center bg-gold relative z-10 px-4 group hover:-translate-y-1 transition-transform">
                <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center font-bold text-lg mb-3 shadow-md border-4 border-gold">3</div>
                <div class="flex flex-col items-center text-center text-navy">
                    <span class="font-bold text-sm">डाउनलोड करें (PDF)</span>
                    <span class="text-[10px] uppercase font-bold text-navy/70">Download PDF</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-offwhite py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- CATEGORY FILTER TABS -->
        <div class="mb-10" x-data="{ filter: 'All' }">
            <div class="flex flex-wrap gap-3 justify-center">
                @php
                    $categories = [
                        ['id'=>'All', 'hi'=>'सभी', 'en'=>'All'],
                        ['id'=>'Business', 'hi'=>'व्यवसाय', 'en'=>'Business'],
                        ['id'=>'Property', 'hi'=>'संपत्ति', 'en'=>'Property'],
                        ['id'=>'Employment', 'hi'=>'रोजगार', 'en'=>'Employment'],
                        ['id'=>'Personal', 'hi'=>'व्यक्तिगत', 'en'=>'Personal'],
                        ['id'=>'GST & Tax', 'hi'=>'जीएसटी और टैक्स', 'en'=>'GST & Tax'],
                        ['id'=>'Agreements', 'hi'=>'समझौते', 'en'=>'Agreements']
                    ];
                @endphp
                
                @foreach($categories as $cat)
                <button @click="filter = '{{ $cat['id'] }}'" 
                        :class="filter === '{{ $cat['id'] }}' ? 'bg-navy text-white border-navy shadow-md' : 'bg-white text-gray-600 border-gray-200 hover:border-gold hover:text-gold'"
                        class="flex flex-col items-center justify-center px-5 min-h-[48px] rounded-lg border transition-all duration-300 hover:-translate-y-1">
                    <span class="text-sm font-bold">{{ $cat['hi'] }}</span>
                    <span class="text-[9px] uppercase tracking-wider" :class="filter === '{{ $cat['id'] }}' ? 'text-gray-300' : 'text-gray-400'">{{ $cat['en'] }}</span>
                </button>
                @endforeach
            </div>

            <!-- DOCUMENTS GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
                @foreach($documents as $doc)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col hover:-translate-y-1 transition-all duration-300 hover:shadow-lg group"
                     x-show="filter === 'All' || filter === '{{ $doc['category'] }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100">
                    
                    <!-- Category Badge -->
                    <div class="mb-4">
                        <span class="inline-flex bg-gold/10 text-gold border border-gold/20 px-3 py-1 rounded-md text-xs font-bold uppercase tracking-wider">
                            {{ $doc['category'] }}
                        </span>
                    </div>

                    <!-- Title -->
                    <div class="flex flex-col mb-4">
                        <h3 class="text-lg font-bold text-navy leading-tight group-hover:text-gold transition-colors">{{ $doc['name_hi'] }}</h3>
                        <span class="text-[13px] text-gray-500 font-medium mt-0.5">{{ $doc['name_en'] }}</span>
                    </div>

                    <!-- What's inside & Validity -->
                    <div class="bg-gray-50 rounded-lg p-3 border border-gray-100 mb-6 flex-grow">
                        <ul class="space-y-2">
                            <li class="flex items-start text-sm">
                                <svg class="w-4 h-4 text-green-500 mr-2 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <div class="flex flex-col">
                                    <span class="text-gray-700 font-semibold">{{ $doc['pages'] }} पेज | 5 मिनट में तैयार</span>
                                    <span class="text-[10px] text-gray-500">{{ $doc['pages'] }} pages | Ready in 5 mins</span>
                                </div>
                            </li>
                            <li class="flex items-start text-sm">
                                <svg class="w-4 h-4 text-green-500 mr-2 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                <div class="flex flex-col">
                                    <span class="text-gray-700 font-semibold">संपूर्ण भारत में कानूनी रूप से मान्य</span>
                                    <span class="text-[10px] text-gray-500">Legally valid across India</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Price & Actions -->
                    <div class="mt-auto border-t border-gray-100 pt-5">
                        <div class="flex justify-between items-center mb-5">
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-400 line-through decoration-red-500/50">₹{{ number_format($doc['old_price']) }}</span>
                                <span class="text-2xl font-bold text-gold leading-none mt-1">₹{{ $doc['new_price'] }}</span>
                            </div>
                            <div class="bg-red-50 text-red-600 px-2 py-1 rounded text-[10px] font-bold border border-red-100">
                                SAVE {{ round((($doc['old_price'] - $doc['new_price']) / $doc['old_price']) * 100) }}%
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <button class="w-full bg-navy text-white hover:bg-navy-800 min-h-[48px] rounded-lg font-bold transition-all duration-300 shadow-md flex flex-col items-center justify-center hover:-translate-y-1">
                                <span class="text-[15px]">बनाएं</span>
                                <span class="text-[10px] uppercase tracking-wider text-gray-300 mt-0.5">Create</span>
                            </button>
                            <a href="#" class="w-full text-center text-gray-500 hover:text-gold text-sm font-bold flex flex-col items-center justify-center min-h-[48px] hover:-translate-y-1 transition-all">
                                <span>नमूना देखें</span>
                                <span class="text-[10px] uppercase">Preview</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- TRUST STRIP -->
<div class="bg-white border-t border-gray-200 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center items-center gap-6 md:gap-12">
            <div class="flex flex-col items-center text-center text-navy font-bold hover:-translate-y-1 transition-transform">
                <svg class="w-8 h-8 text-gold mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                <span class="text-sm">100% कानूनी रूप से मान्य</span>
                <span class="text-[10px] text-gray-500 uppercase">100% Legally Valid</span>
            </div>
            
            <div class="hidden md:block w-px h-12 bg-gray-200"></div>
            
            <div class="flex flex-col items-center text-center text-navy font-bold hover:-translate-y-1 transition-transform">
                <svg class="w-8 h-8 text-gold mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <span class="text-sm">वकील द्वारा जाँचा गया</span>
                <span class="text-[10px] text-gray-500 uppercase">Advocate Reviewed</span>
            </div>
            
            <div class="hidden md:block w-px h-12 bg-gray-200"></div>
            
            <div class="flex flex-col items-center text-center text-navy font-bold hover:-translate-y-1 transition-transform">
                <svg class="w-8 h-8 text-gold mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                <span class="text-sm">तुरंत PDF + Word डाउनलोड</span>
                <span class="text-[10px] text-gray-500 uppercase">Instant PDF + Word</span>
            </div>
            
            <div class="hidden md:block w-px h-12 bg-gray-200"></div>
            
            <div class="flex flex-col items-center text-center text-navy font-bold hover:-translate-y-1 transition-transform">
                <svg class="w-8 h-8 text-gold mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                <span class="text-sm">हिंदी + English संस्करण</span>
                <span class="text-[10px] text-gray-500 uppercase">Hindi + English Version</span>
            </div>
            
            <div class="hidden md:block w-px h-12 bg-gray-200"></div>
            
            <div class="flex flex-col items-center text-center text-navy font-bold hover:-translate-y-1 transition-transform">
                <svg class="w-8 h-8 text-gold mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-sm">₹99 से शुरू</span>
                <span class="text-[10px] text-gray-500 uppercase">Starting at ₹99</span>
            </div>
        </div>
    </div>
</div>
@endsection
