@extends('layouts.app')
@section('title', $service['name_en'] . ' | ' . $category['name'])

@php
    $content = \App\Services\ContentGenerator::generateContent($category['name'], $service['name_en']);
@endphp

@section('content')

<!-- BREADCRUMB -->
<div class="bg-[#0d1b3e] py-4 border-b border-white/10 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="flex flex-col text-gray-300 hover:text-[#f5a623] transition">
                        <span class="font-bold leading-tight">होम</span>
                        <span class="text-[10px] uppercase">Home</span>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <a href="/services" class="flex flex-col text-gray-300 hover:text-[#f5a623] ml-1 md:ml-2 transition">
                            <span class="font-bold leading-tight">सभी सेवाएं</span>
                            <span class="text-[10px] uppercase">Services</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <a href="/services/{{ $category['slug'] }}" class="flex flex-col text-gray-300 hover:text-[#f5a623] ml-1 md:ml-2 transition">
                            <span class="font-bold leading-tight">{{ $category['name'] }}</span>
                            <span class="text-[10px] uppercase">Category</span>
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

            <h1 class="text-[36px] md:text-[52px] font-bold text-white leading-[1.15] mb-4 font-serif">
                {{ $service['name_en'] }}
            </h1>
            
            <div class="text-[#f5a623] text-[20px] font-medium mb-6">
                {{ $service['name_hi'] }}
            </div>
            
            <p class="text-[15px] md:text-[16px] text-gray-300 mb-8 font-medium leading-relaxed max-w-[500px]">
                {!! $content['description'] !!}
            </p>
            
            <div class="flex flex-wrap items-center gap-4 mb-8">
                <div class="bg-white/10 border border-white/20 rounded-xl px-5 py-3">
                    <div class="text-gray-400 text-[10px] uppercase font-bold tracking-wider mb-1">Starting at</div>
                    <div class="text-[#f5a623] text-[24px] font-extrabold leading-none">{{ $service['price'] }}</div>
                </div>
                <div class="bg-white/10 border border-white/20 rounded-xl px-5 py-3">
                    <div class="text-gray-400 text-[10px] uppercase font-bold tracking-wider mb-1">Timeframe</div>
                    <div class="text-white text-[24px] font-extrabold leading-none">{{ $service['time'] }}</div>
                </div>
            </div>
        </div>
        
        <!-- Hero Form -->
        <div class="mt-8 lg:mt-0 bg-white rounded-2xl shadow-xl p-6 md:p-8 border-t-4 border-[#f5a623] relative z-10 w-full max-w-[440px] mx-auto lg:ml-auto">
            <h3 class="text-[20px] md:text-[24px] font-bold text-[#0d1b3e] mb-1 font-serif leading-tight">Request a Call Back</h3>
            <p class="text-gray-500 text-xs mb-6">Our experts will explain the process and help you get started.</p>

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
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Rahul Sharma" class="w-full bg-gray-50 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#f5a623] focus:ring-1 focus:ring-[#f5a623] transition-colors">
                        @error('name')
                            <p class="text-red-500 text-[11px] mt-1 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Mobile Number</label>
                        <div class="flex">
                            <span class="bg-gray-100 border @error('phone') border-red-500 border-r-0 @else border-gray-200 @enderror rounded-l-xl px-3.5 py-3 text-[13px] text-gray-500 font-bold flex items-center">+91</span>
                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="98765 43210" class="w-full bg-gray-50 border @error('phone') border-red-500 @else border-gray-200 @enderror rounded-r-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#f5a623] transition-colors">
                        </div>
                        @error('phone')
                            <p class="text-red-500 text-[11px] mt-1 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-[#f5a623] text-[#0d1b3e] text-[14px] md:text-[15px] font-extrabold py-3.5 rounded-xl hover:bg-[#e0951b] transition-all shadow-md mt-2">
                        Request Callback 📞
                    </button>
                </form>
            @endif
            <div class="text-center text-[10px] text-gray-400 mt-4 flex items-center justify-center gap-1.5">
                <span>🔒</span>
                <span>Your data is 100% secure.</span>
            </div>
        </div>
    </div>
</x-inner-hero>

<!-- Content Details -->
<section class="bg-gray-50 py-16 md:py-[100px]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Benefits Section -->
        <div class="mb-16">
            <div class="text-center max-w-[700px] mx-auto mb-12">
                <h2 class="text-[#0d1b3e] text-[32px] font-extrabold font-serif">Why choose us for {{ $service['name_en'] }}?</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($content['benefits'] as $benefit)
                <div class="p-8 border border-gray-100 rounded-2xl bg-white shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all">
                    <div class="text-[32px] mb-4 bg-gray-50 w-16 h-16 flex items-center justify-center rounded-xl">{{ $benefit['icon'] }}</div>
                    <h3 class="text-[#0d1b3e] font-extrabold text-[18px] mb-2">{{ $benefit['title_en'] }}</h3>
                    <p class="text-gray-500 text-[14px] leading-relaxed">{{ $benefit['desc_en'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-12">
            <h2 class="text-[#0d1b3e] text-[28px] font-extrabold font-serif mb-8 text-center">Frequently Asked Questions</h2>
            
            <div class="space-y-6">
                @foreach($content['faqs'] as $faq)
                <div class="border-b border-gray-100 pb-6 last:border-0 last:pb-0">
                    <h4 class="text-[16px] font-bold text-[#0d1b3e] mb-2 flex gap-3">
                        <span class="text-[#f5a623]">Q.</span> 
                        {{ $faq['q_en'] }}
                    </h4>
                    <p class="text-gray-500 text-[14px] leading-relaxed pl-7">
                        {{ $faq['a_en'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@endsection
