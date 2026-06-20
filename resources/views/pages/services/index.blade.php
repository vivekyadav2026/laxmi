@extends('layouts.app')

@section('title', 'All Services - Foundida')

@section('content')

<!-- BREADCRUMB -->
<div class="bg-[#0d1b3e] py-4 border-b border-white/10 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="flex flex-col text-gray-300 hover:text-[#f5a623] transition">
                        <span class="font-bold leading-tight">à¤¹à¥‹à¤®</span>
                        <span class="text-[10px] uppercase">Home</span>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <div class="flex flex-col text-[#f5a623] ml-1 md:ml-2">
                            <span class="font-bold leading-tight">à¤¸à¤­à¥€ à¤¸à¥‡à¤µà¤¾à¤ à¤‚</span>
                            <span class="text-[10px] uppercase">All Services</span>
                        </div>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <!-- Top pill badge -->
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#f5a623] opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-[#f5a623]"></span>
            </span>
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                OUR EXPERTISE
            </span>
        </div>

        <h1 class="font-serif text-[36px] md:text-[56px] font-bold text-white leading-[1.15] mb-4">
            <span class="text-[#f5a623]">à¤•à¤¾à¤¨à¥‚à¤¨à¥€</span> à¤”à¤° <span class="text-[#f5a623]">à¤Ÿà¥‡à¤•</span> à¤¸à¤®à¤¾à¤§à¤¾à¤¨
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed max-w-[600px]">
            Comprehensive legal, tax, and technology services designed to help you start, manage, and grow your business with 100% compliance.
        </p>
    </div>
</x-inner-hero>

<section class="py-16 md:py-[100px] bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories as $cat)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-xl hover:-translate-y-1 transition-all">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-[20px] font-bold text-[#0d1b3e]">{{ $cat['name'] }}</h3>
                    <span class="bg-gray-100 text-gray-500 text-[10px] font-bold px-2 py-1 rounded-full uppercase">{{ $cat['count'] }}</span>
                </div>
                
                <ul class="space-y-3 mb-6">
                    @foreach(array_slice($cat['services'], 0, 5) as $service)
                    <li>
                        <a href="/services/{{ $cat['slug'] }}/{{ $service['slug'] }}" class="text-[14px] text-gray-600 hover:text-[#f5a623] transition-colors flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#f5a623]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ $service['name_en'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>

                <a href="/services/{{ $cat['slug'] }}" class="inline-flex items-center justify-center w-full gap-2 bg-[#f5a623]/10 text-[#f5a623] text-[13px] font-extrabold px-4 py-3 rounded-xl hover:bg-[#f5a623] hover:text-[#0d1b3e] transition-all">
                    View All {{ $cat['name'] }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
