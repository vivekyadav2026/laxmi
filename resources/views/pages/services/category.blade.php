@extends('layouts.app')

@section('title', $category->name . ' Services - Foundida')

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
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <a href="/services" class="flex flex-col text-gray-300 hover:text-[#D4A843] ml-1 md:ml-2 transition">
                            <span class="font-bold leading-tight">सभी सेवाएं</span>
                            <span class="text-[10px] uppercase">Services</span>
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <div class="flex flex-col text-[#D4A843] ml-1 md:ml-2">
                            <span class="font-bold leading-tight">{{ $category->name }}</span>
                            <span class="text-[10px] uppercase">Category</span>
                        </div>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center max-w-4xl mx-auto">
        <!-- Top pill badge -->
        <div class="inline-flex items-center gap-2 bg-[#D4A843]/10 border border-[#D4A843]/30 rounded-full px-3.5 py-1.5 mb-5 select-none">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#D4A843] opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-[#D4A843]"></span>
            </span>
            <span class="text-[10px] font-bold text-[#D4A843] uppercase tracking-widest flex items-center gap-1">
                {{ $category->services->count() }} SERVICES AVAILABLE
            </span>
        </div>

        <h1 class="font-serif text-[36px] md:text-[54px] font-extrabold text-white leading-[1.15] mb-4">
            <span class="text-[#D4A843]">{{ $category->name }}</span> Solutions
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed max-w-[600px]">
            Explore our comprehensive range of {{ strtolower($category->name) }} services tailored for your business needs. Fast, secure, and 100% compliant.
        </p>
    </div>
</x-inner-hero>

<section class="py-8 md:py-[56px] bg-[#F8F9FA]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($category->services as $service)
            <a href="/services/{{ $category->slug }}/{{ $service->slug }}" class="bg-white rounded-2xl shadow-sm border border-gray-200/80 p-6 md:p-7 hover:shadow-xl hover:border-[#D4A843]/50 hover:-translate-y-1 transition-all group flex flex-col h-full relative overflow-hidden">
                <!-- Top Corner Arc -->
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#F4F6F9] rounded-bl-full pointer-events-none z-0"></div>

                <div class="flex items-start justify-between mb-5 relative z-10">
                    <div class="w-12 h-12 rounded-2xl bg-[#0B1F3A] text-white flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    @if($service->time)
                        <span class="bg-[#FAF6ED] border border-[#E2E0D8] text-[#0B1F3A] text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">{{ $service->time }}</span>
                    @endif
                </div>
                
                <h3 class="text-[18px] font-bold text-[#0B1F3A] font-serif mb-1 group-hover:text-[#D4A843] transition-colors relative z-10">{{ $service->name_en }}</h3>
                @if($service->name_hi)
                    <h4 class="text-[13px] font-medium text-gray-400 mb-6 relative z-10">{{ $service->name_hi }}</h4>
                @else
                    <h4 class="text-[13px] font-medium text-gray-400 mb-6 relative z-10">{{ strtoupper($category->name) }}</h4>
                @endif
                
                <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100/80 relative z-10">
                    <div class="flex flex-col">
                        <span class="text-[10px] uppercase text-gray-400 font-bold tracking-wider">Starting at</span>
                        <span class="text-[18px] font-extrabold text-[#0B1F3A]">{{ $service->price ?: '₹999' }}</span>
                    </div>
                    <div class="w-9 h-9 rounded-full bg-[#D4A843] flex items-center justify-center text-[#0B1F3A] group-hover:scale-110 transition-transform shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
