@extends('layouts.app')
@section('title', $service['name_en'] . ' Services Online in India | ' . $category['name'] . ' - Foundida')
@section('meta_description', 'Expert ' . $service['name_en'] . ' services in India. Complete ' . strtolower($category['name']) . ' solutions online. Get transparent pricing starting at ' . $service['price'] . ' with Foundida.')
@section('meta_keywords', $service['name_en'] . ', ' . ($service['name_hi'] ?? $service['name_en']) . ', ' . $category['name'] . ', ' . $service['name_en'] . ' in India, Online ' . $service['name_en'])

@php
    $content = \App\Services\ContentGenerator::generateContent($category['name'], $service['name_en']);
@endphp

@section('content')

<!-- BREADCRUMB -->
<div class="bg-[#0d1b3e] py-3.5 border-b border-white/10 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs font-semibold" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-300 hover:text-[#f5a623] transition uppercase tracking-wider">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3.5 h-3.5 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <a href="/services" class="text-gray-300 hover:text-[#f5a623] transition uppercase tracking-wider">
                            Services
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3.5 h-3.5 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <a href="/services/{{ $category['slug'] }}" class="text-gray-300 hover:text-[#f5a623] transition uppercase tracking-wider">
                            {{ $category['name'] }}
                        </a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<x-inner-hero>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-[48px] items-center">
        <!-- Hero Content -->
        <div class="flex flex-col z-20 text-left">
            <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
                <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                    {{ strtoupper($category['name']) }}
                </span>
            </div>

            <h1 class="text-[36px] md:text-[52px] font-bold text-white leading-[1.15] mb-6 font-serif">
                {{ $service['name_en'] }}
            </h1>
            
            <div class="text-[15px] md:text-[16px] text-gray-300 mb-8 font-medium leading-relaxed max-w-[520px]">
                {!! $content['description'] !!}
            </div>
            
            <div class="flex flex-wrap items-center gap-4 mb-4">
                <div class="bg-white/10 border border-white/20 rounded-xl px-5 py-3">
                    <div class="text-gray-400 text-[10px] uppercase font-bold tracking-wider mb-1">Package Starts at</div>
                    <div class="text-[#f5a623] text-[24px] font-extrabold leading-none">{{ $service['price'] }}</div>
                </div>
                <div class="bg-white/10 border border-white/20 rounded-xl px-5 py-3">
                    <div class="text-gray-400 text-[10px] uppercase font-bold tracking-wider mb-1">Timeframe</div>
                    <div class="text-white text-[24px] font-extrabold leading-none">{{ $service['time'] ?? '5-7 Days' }}</div>
                </div>
            </div>
        </div>
        
        <!-- Hero Callback Form -->
        <div class="mt-8 lg:mt-0 bg-white rounded-2xl shadow-2xl p-6 md:p-8 border-t-4 border-[#f5a623] relative z-10 w-full max-w-[440px] mx-auto lg:ml-auto">
            <h3 class="text-[20px] md:text-[24px] font-bold text-[#0d1b3e] mb-1 font-serif leading-tight">Get Free Consultation</h3>
            <p class="text-gray-500 text-xs mb-6">Talk with our Incorporation Specialists today.</p>

            @if(session('callback_success'))
                <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-5 text-center my-4 animate-fadeIn">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-3 text-xl font-bold">
                        ✓
                    </div>
                    <h4 class="text-emerald-950 font-bold text-base mb-1 font-serif">Request Received!</h4>
                    <p class="text-emerald-800 text-xs leading-relaxed mb-4">{{ session('callback_success') }}</p>
                </div>
            @else
                <form action="{{ route('callback.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="service" value="{{ $service['slug'] }}">
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Rahul Sharma" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#f5a623] focus:ring-1 focus:ring-[#f5a623] transition-colors" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Mobile Number</label>
                        <div class="flex">
                            <span class="bg-gray-100 border border-gray-200 border-r-0 rounded-l-xl px-3.5 py-3 text-[13px] text-gray-500 font-bold flex items-center">+91</span>
                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="98765 43210" class="w-full bg-gray-50 border border-gray-200 rounded-r-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#f5a623] transition-colors" required>
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-[#f5a623] text-[#0d1b3e] text-[14px] md:text-[15px] font-extrabold py-3.5 rounded-xl hover:bg-[#e0951b] transition-all shadow-md mt-2">
                        Get Instant Call Back 📞
                    </button>
                </form>
            @endif
            <div class="text-center text-[10px] text-gray-400 mt-4 flex items-center justify-center gap-1.5">
                <span>🔒</span>
                <span>Your details are 100% confidential.</span>
            </div>
        </div>
    </div>
</x-inner-hero>

<!-- DELIVERABLES BAR -->
@if(!empty($content['deliverables']))
<section class="bg-white border-b border-gray-200 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-xs font-extrabold text-[#f5a623] uppercase tracking-widest text-center mb-6">What You Get in Your Package</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($content['deliverables'] as $item)
            <div class="flex items-center gap-3 p-3 rounded-xl bg-emerald-50/60 border border-emerald-100">
                <span class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold shrink-0">✓</span>
                <span class="text-xs font-bold text-[#0d1b3e] leading-snug">{{ $item }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- MAIN CONTENT SECTION -->
<section class="bg-gray-50 py-16 md:py-[80px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- BENEFITS SECTION -->
        <div class="mb-20">
            <div class="text-center max-w-[700px] mx-auto mb-12">
                <h2 class="text-[#0d1b3e] text-[28px] md:text-[36px] font-extrabold font-serif">Key Benefits of {{ $service['name_en'] }}</h2>
                <p class="text-gray-500 text-sm mt-2">Why Indian founders choose this structure to build and scale their business.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($content['benefits'] as $benefit)
                <div class="p-8 border border-gray-100 rounded-2xl bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all">
                    <div class="text-[32px] mb-4 bg-amber-50 w-14 h-14 flex items-center justify-center rounded-xl border border-amber-100">{{ $benefit['icon'] }}</div>
                    <h3 class="text-[#0d1b3e] font-extrabold text-[18px] mb-2 font-serif">{{ $benefit['title_en'] }}</h3>
                    <p class="text-gray-500 text-[14px] leading-relaxed">{{ $benefit['desc_en'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- DOCUMENTS REQUIRED SECTION -->
        @if(!empty($content['documents']))
        <div class="mb-20">
            <div class="text-center max-w-[700px] mx-auto mb-12">
                <h2 class="text-[#0d1b3e] text-[28px] md:text-[36px] font-extrabold font-serif">Documents Required for Registration</h2>
                <p class="text-gray-500 text-sm mt-2">Prepare these simple documents for a seamless 100% online registration.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Directors Documents -->
                <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm relative overflow-hidden">
                    <div class="w-2 h-full bg-[#f5a623] absolute left-0 top-0"></div>
                    <h3 class="text-xl font-bold text-[#0d1b3e] mb-6 flex items-center gap-3 font-serif">
                        <span class="w-8 h-8 rounded-full bg-amber-100 text-[#f5a623] flex items-center justify-center text-sm font-bold">1</span>
                        {{ $content['documents']['directors']['title'] }}
                    </h3>
                    <ul class="space-y-3.5">
                        @foreach($content['documents']['directors']['items'] as $doc)
                        <li class="flex items-start gap-3 text-xs md:text-sm text-gray-700 font-medium leading-relaxed">
                            <span class="text-[#2D7A4F] font-bold text-base leading-none">✓</span>
                            <span>{{ $doc }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Office Documents -->
                <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm relative overflow-hidden">
                    <div class="w-2 h-full bg-[#0d1b3e] absolute left-0 top-0"></div>
                    <h3 class="text-xl font-bold text-[#0d1b3e] mb-6 flex items-center gap-3 font-serif">
                        <span class="w-8 h-8 rounded-full bg-slate-100 text-[#0d1b3e] flex items-center justify-center text-sm font-bold">2</span>
                        {{ $content['documents']['office']['title'] }}
                    </h3>
                    <ul class="space-y-3.5">
                        @foreach($content['documents']['office']['items'] as $doc)
                        <li class="flex items-start gap-3 text-xs md:text-sm text-gray-700 font-medium leading-relaxed">
                            <span class="text-[#2D7A4F] font-bold text-base leading-none">✓</span>
                            <span>{{ $doc }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <!-- REGISTRATION PROCESS TIMELINE -->
        @if(!empty($content['process']))
        <div class="mb-20">
            <div class="text-center max-w-[700px] mx-auto mb-12">
                <h2 class="text-[#0d1b3e] text-[28px] md:text-[36px] font-extrabold font-serif">Step-by-Step Incorporation Process</h2>
                <p class="text-gray-500 text-sm mt-2">How we complete your Private Limited Registration in 4 simple steps.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($content['process'] as $proc)
                <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm relative flex flex-col justify-between hover:shadow-lg transition-shadow">
                    <div>
                        <div class="text-3xl font-extrabold text-[#f5a623]/40 font-mono mb-2">{{ $proc['step'] }}</div>
                        <h4 class="text-lg font-bold text-[#0d1b3e] mb-2 font-serif">{{ $proc['title'] }}</h4>
                        <p class="text-gray-500 text-xs leading-relaxed">{{ $proc['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- FAQ SECTION -->
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-200 p-8 md:p-12">
            <h2 class="text-[#0d1b3e] text-[28px] md:text-[32px] font-extrabold font-serif mb-2 text-center">Frequently Asked Questions</h2>
            <p class="text-gray-500 text-xs text-center mb-10">Clear answers to all common questions about Private Limited Incorporation.</p>
            
            <div class="space-y-6">
                @foreach($content['faqs'] as $faq)
                <div class="border-b border-gray-100 pb-6 last:border-0 last:pb-0">
                    <h4 class="text-[15px] md:text-[16px] font-bold text-[#0d1b3e] mb-2 flex gap-3">
                        <span class="text-[#f5a623] shrink-0">Q.</span> 
                        <span>{{ $faq['q_en'] }}</span>
                    </h4>
                    <p class="text-gray-600 text-[13px] md:text-[14px] leading-relaxed pl-7">
                        {{ $faq['a_en'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection
