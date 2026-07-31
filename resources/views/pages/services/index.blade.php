@extends('layouts.app')

@section('title', 'सभी सेवाएं | All Legal, Tax & Tech Services - Foundida')

@section('content')

<!-- BREADCRUMB -->
<div class="bg-[#0B1F3A] py-3.5 border-b border-white/10 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="flex flex-col text-gray-300 hover:text-[#D4A843] transition">
                        <span class="font-bold leading-tight">होम</span>
                        <span class="text-[10px] uppercase">Home</span>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <div class="flex flex-col text-[#D4A843] ml-1 md:ml-2">
                            <span class="font-bold leading-tight">सभी सेवाएं</span>
                            <span class="text-[10px] uppercase">All Services</span>
                        </div>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- INNER HERO WITH LIVE SEARCH -->
<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center max-w-4xl mx-auto">
        <!-- Top pill badge -->
        <div class="inline-flex items-center gap-2 bg-[#D4A843]/10 border border-[#D4A843]/30 rounded-full px-3.5 py-1.5 mb-5 select-none">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#D4A843] opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-[#D4A843]"></span>
            </span>
            <span class="text-[10px] font-bold text-[#D4A843] uppercase tracking-widest flex items-center gap-1">
                80+ LEGAL, TAX & TECH SERVICES ✦
            </span>
        </div>

        <h1 class="font-serif text-[32px] sm:text-[42px] md:text-[54px] font-extrabold text-white leading-[1.15] mb-4">
            आपकी ज़रूरत की <span class="text-[#D4A843]">हर सेवा</span> — एक ही जगह
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed max-w-[640px] mb-8">
            Company Registration, GST, Trademark, Tax Filings & Custom Website/App Development — Transparent Pricing & Expert Execution.
        </p>
    </div>
</x-inner-hero>

<!-- MAIN SERVICES SECTION WITH SEARCH & CARDS -->
<section class="py-8 md:py-[56px] bg-[#F8F9FA] min-h-screen" x-data="{
    searchQuery: '',
    matchesSearch(nameEn, nameHi, catName) {
        if (!this.searchQuery) return true;
        let q = this.searchQuery.toLowerCase();
        return nameEn.toLowerCase().includes(q) || (nameHi && nameHi.toLowerCase().includes(q)) || catName.toLowerCase().includes(q);
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- SEARCH BAR & FILTER BADGE -->
        <div class="mb-10 flex flex-col md:flex-row items-center justify-between gap-4 bg-white p-4 md:p-6 rounded-2xl shadow-sm border border-gray-200/80">
            <!-- Live Search Bar -->
            <div class="relative w-full md:w-1/2">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input x-model="searchQuery"
                       type="text"
                       placeholder="सेवा खोजें (जैसे: GST, Company, Trademark, App...)"
                       class="w-full bg-[#F4F6F9] border border-gray-200 rounded-xl pl-11 pr-4 py-3 text-sm text-[#0B1F3A] placeholder-gray-400 focus:outline-none focus:border-[#D4A843] focus:ring-1 focus:ring-[#D4A843] transition-all">
                <button x-show="searchQuery" @click="searchQuery = ''" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                    ✕
                </button>
            </div>

            <!-- Stats Badge -->
            <div class="flex items-center gap-3 text-xs font-bold text-[#0B1F3A] whitespace-nowrap bg-[#FAF6ED] px-4 py-2.5 rounded-xl border border-[#E2E0D8]">
                <span>⚡ 80+ Approved Services</span>
                <span class="text-gray-300">|</span>
                <span class="text-[#D4A843]">100% Guaranteed</span>
            </div>
        </div>

        <!-- CATEGORIES GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories as $cat)
            @php
                $categoryIcons = [
                    'business-registration' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    'gst-services' => 'M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    'trademark-ip' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                    'licenses-registrations' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',
                    'tax-compliance' => 'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                    'legal-documents-diy' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                    'vakil-lawyer-services' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
                    'tech-services' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                ];
                $iconPath = $categoryIcons[$cat->slug] ?? 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4';
            @endphp
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200/80 p-6 md:p-7 hover:shadow-xl hover:-translate-y-1 hover:border-[#D4A843]/40 transition-all flex flex-col group relative overflow-hidden">
                <!-- Top Corner Arc -->
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#F4F6F9] rounded-bl-full pointer-events-none z-0"></div>

                <!-- Category Header -->
                <div class="flex items-center justify-between mb-5 relative z-10">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#FFF3D6] to-[#FDE9A0] text-[#B8892E] flex items-center justify-center shadow-md shadow-gold/20 shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-[18px] md:text-[20px] font-bold text-[#0B1F3A] font-serif leading-tight">{{ $cat->name }}</h3>
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block mt-0.5">{{ $cat->services->count() }} Services Available</span>
                        </div>
                    </div>
                </div>

                <!-- Services List -->
                <div class="space-y-2.5 mb-6 flex-grow relative z-10">
                    @foreach($cat->services as $service)
                    <div x-show="matchesSearch('{{ str_replace("'", "\\'", $service->name_en) }}', '{{ str_replace("'", "\\'", $service->name_hi ?? '') }}', '{{ str_replace("'", "\\'", $cat->name) }}')">
                        <a href="/services/{{ $cat->slug }}/{{ $service->slug }}"
                           class="p-2.5 rounded-xl hover:bg-[#F4F6F9] transition-all flex items-center justify-between group/item border border-transparent hover:border-gray-200/60">
                            <div class="flex items-center gap-2.5 min-w-0">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#D4A843] shrink-0"></span>
                                <div class="flex flex-col min-w-0">
                                    <span class="font-bold text-[13px] text-[#0B1F3A] group-hover/item:text-[#D4A843] transition-colors truncate">{{ $service->name_en }}</span>
                                    @if($service->name_hi)
                                        <span class="text-[10px] text-gray-400 truncate font-medium">{{ $service->name_hi }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0 ml-2">
                                @if($service->badge_hi)
                                    <span class="text-[9px] font-extrabold text-white bg-red-500 px-1.5 py-0.5 rounded-md uppercase tracking-wider">{{ $service->badge_hi }}</span>
                                @elseif($service->badge_en)
                                    <span class="text-[9px] font-extrabold text-white bg-red-500 px-1.5 py-0.5 rounded-md uppercase tracking-wider">{{ $service->badge_en }}</span>
                                @endif
                                @if($service->old_price)
                                    <span class="text-[10px] text-gray-400 line-through">{{ $service->old_price }}</span>
                                @endif
                                @if($service->price)
                                    <span class="text-[11px] font-extrabold text-[#0B1F3A] bg-[#FAF6ED] border border-[#E2E0D8] px-2 py-0.5 rounded-md">{{ $service->price }}</span>
                                @endif
                                <svg class="w-3.5 h-3.5 text-gray-400 group-hover/item:text-[#0B1F3A] group-hover/item:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <!-- Footer Category CTA -->
                <div class="pt-4 border-t border-gray-100 flex items-center justify-between relative z-10 mt-auto">
                    <a href="/services/{{ $cat->slug }}" class="inline-flex items-center gap-2 text-[12px] font-extrabold text-[#0B1F3A] hover:text-[#D4A843] transition-colors">
                        <span>{{ $cat->name }} की सभी सेवाएं देखें</span>
                        <span>→</span>
                    </a>
                    <a href="/#consultation" class="w-8 h-8 rounded-full bg-[#D4A843] flex items-center justify-center text-[#0B1F3A] hover:scale-110 transition-transform shadow-sm" title="Consult Expert">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- HELP BANNER AT BOTTOM -->
        <div class="mt-14 bg-[#0B1F3A] text-white rounded-3xl p-8 md:p-12 relative overflow-hidden shadow-2xl border border-[#D4A843]/30">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#D4A843 1.5px, transparent 1.5px); background-size: 24px 24px;"></div>
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="max-w-2xl text-center md:text-left">
                    <div class="inline-flex items-center gap-1.5 text-[10px] font-extrabold uppercase tracking-widest text-[#D4A843] bg-white/5 px-3 py-1 rounded-full mb-3">
                        ✦ FREE EXPERT ADVICE
                    </div>
                    <h3 class="text-2xl md:text-4xl font-bold font-serif mb-2 text-white">समझ नहीं आ रहा कौन सी सेवा चाहिए?</h3>
                    <p class="text-gray-300 text-sm md:text-base leading-relaxed">हमारे सीए और लीगल एक्सपर्ट्स से मुफ्त सलाह लें। हम 2 घंटे में आपसे संपर्क करेंगे।</p>
                </div>
                <div class="shrink-0 flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                    <a href="/#consultation" class="bg-[#D4A843] text-[#0B1F3A] font-extrabold text-sm px-7 py-3.5 rounded-xl hover:bg-[#E8B96A] transition-all text-center shadow-lg">
                        📞 मुफ़्त सलाह लें
                    </a>
                    <a href="tel:+918750530252" class="bg-white/10 text-white font-bold text-sm px-6 py-3.5 rounded-xl hover:bg-white/20 transition-all text-center border border-white/20">
                        +91 87505 30252
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
