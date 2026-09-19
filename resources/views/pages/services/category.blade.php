@extends('layouts.app')

@section('title', $category->name . ' Services - Foundida')

@push('schema')
@if(isset($category->page_content['faqs']))
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    @foreach($category->page_content['faqs'] as $faq)
    {
      "@@type": "Question",
      "name": "{{ strip_tags($faq['q_en']) }}",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "{{ strip_tags($faq['a_en']) }}"
      }
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ]
}
</script>
@endif
@endpush

@section('content')

@php
    $svgIcons = [
        'office-building' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>',
        'user' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>',
        'users' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>',
        'user-circle' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
        'heart' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>',
        'user-group' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>',
        'shield-check' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>',
        'scale' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>',
        'trending-up' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>',
        'shopping-cart' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>',
    ];
@endphp

<!-- BREADCRUMB -->
<div class="bg-[#0B1F3A] py-3.5 border-b border-white/10 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs font-semibold" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-300 hover:text-[#D4A843] transition uppercase tracking-wider">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3.5 h-3.5 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <a href="/services" class="text-gray-300 hover:text-[#D4A843] transition uppercase tracking-wider">
                            Services
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3.5 h-3.5 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="text-[#D4A843] uppercase tracking-wider">
                            {{ $category->name }}
                        </span>
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
        
        <!-- SERVICE CARDS GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($category->services as $service)
            <div onclick="window.location.href='/services/{{ $category->slug }}/{{ $service->slug }}'" class="bg-white rounded-3xl shadow-sm border border-gray-200/80 p-6 md:p-8 hover:shadow-xl hover:border-[#D4A843]/50 hover:-translate-y-1 transition-all group flex flex-col h-full relative overflow-hidden cursor-pointer">
                <!-- Top Corner Step Number -->
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#F4F6F9] rounded-bl-full pointer-events-none z-0"></div>

                <!-- Icon -->
                <div class="relative w-14 h-14 rounded-2xl bg-gradient-to-br from-[#FFF3D6] to-[#FDE9A0] text-[#B8892E] flex items-center justify-center mb-6 shadow-md shadow-gold/20 shrink-0 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $svgIcons[$service->icon] ?? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"></path>' !!}
                    </svg>
                </div>

                <!-- Title -->
                <h3 class="text-[20px] font-extrabold text-[#0B1F3A] font-serif leading-tight mb-2">{{ $service->name_en ?: $service->name_hi }}</h3>

                <!-- Best For Box -->
                @if($service->best_for_en || $service->best_for_hi)
                <div class="border-l-4 border-[#D4A843] bg-gray-50 p-3 rounded-r-xl mb-6 text-left">
                    <p class="text-[12px] text-gray-700 font-semibold leading-normal">{{ $service->best_for_en ?: $service->best_for_hi }}</p>
                </div>
                @endif

                <!-- Pricing Section -->
                <div class="mt-auto pt-6 border-t border-gray-100 flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="text-[9px] uppercase tracking-wider text-gray-400 font-bold">Registration Fee</span>
                        <div class="flex items-center gap-1.5 mt-0.5">
                            @if($service->old_price)
                                <span class="text-[12px] text-gray-400 line-through font-medium">{{ $service->old_price }}</span>
                            @endif
                            <span class="text-[20px] font-extrabold text-[#0B1F3A]">{{ $service->price ?: '₹999' }}</span>
                        </div>
                    </div>

                    <span class="border border-[#D4A843] text-[#0B1F3A] group-hover:bg-[#D4A843] group-hover:text-white px-5 py-2.5 rounded-xl text-xs font-bold transition-all duration-300">
                        Know More
                    </span>
                </div>
            </div>
            @endforeach
        </div>

        <!-- DYNAMIC PAGE CONTENT SECTIONS -->
        @if($category->page_content)
            
            <!-- COMPARISONS TABLE -->
            @if(isset($category->page_content['comparisons']))
            <div class="mt-20">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold font-serif text-[#0B1F3A] mb-2">Which Entity Type Is Right For You?</h2>
                    <p class="text-xs uppercase font-bold text-gray-400 tracking-widest">Compare structures to choose the perfect legal entity for your startup</p>
                </div>
                
                <div class="overflow-x-auto bg-white rounded-3xl border border-gray-200 shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-[#0B1F3A] text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Entity Type</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Min Members</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Liability</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Taxation</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Best For</th>
                                <th class="px-6 py-4 class-price text-right text-xs font-bold uppercase tracking-wider">Estimated Cost</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @foreach($category->page_content['comparisons'] as $row)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-[#0B1F3A]">{{ $row['type_en'] ?: $row['type_hi'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-600 font-medium">{{ $row['members'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $row['liability_color'] === 'green' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200' }}">
                                        {{ $row['liability'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-600 font-medium">{{ $row['tax'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-bold text-[#0B1F3A]">{{ $row['best_for_en'] ?: $row['best_for_hi'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right font-extrabold {{ $row['cost_color'] === 'red' ? 'text-red-600' : ($row['cost_color'] === 'green' ? 'text-green-600' : 'text-[#0B1F3A]') }}">{{ $row['cost'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            <!-- TRADEMARK PACKAGES -->
            @if(isset($category->page_content['packages']))
            <div class="mt-20">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold font-serif text-[#0B1F3A] mb-2">Our Service Packages</h2>
                    <p class="text-xs uppercase font-bold text-gray-400 tracking-widest">Clear and transparent pricing plans</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($category->page_content['packages'] as $pkg)
                    <div class="bg-white rounded-3xl p-8 border {{ isset($pkg['highlight']) && $pkg['highlight'] ? 'border-[#D4A843] ring-4 ring-[#D4A843]/10 relative scale-105' : 'border-gray-200' }} shadow-sm flex flex-col h-full">
                        @if(isset($pkg['highlight']) && $pkg['highlight'])
                            <span class="absolute top-0 right-1/2 translate-x-1/2 -translate-y-1/2 bg-[#D4A843] text-[#0B1F3A] font-extrabold text-[10px] uppercase tracking-widest px-4 py-1 rounded-full shadow-sm">Popular Choice</span>
                        @endif

                        <h3 class="text-[20px] font-bold text-[#0B1F3A] font-serif mb-1">{{ $pkg['name_en'] ?: $pkg['name_hi'] }}</h3>

                        <div class="flex items-baseline mb-6 mt-4">
                            <span class="text-3xl font-extrabold text-[#0B1F3A]">{{ $pkg['price'] }}</span>
                            @if(isset($pkg['price_text_en']))
                                <span class="text-xs text-gray-400 ml-1.5 uppercase font-bold">{{ $pkg['price_text_en'] }}</span>
                            @endif
                        </div>

                        <ul class="space-y-4 mb-8 flex-grow">
                            @foreach(($pkg['features_en'] ?? $pkg['features_hi']) as $idx => $feat)
                            <li class="flex items-start text-xs text-gray-700 font-semibold leading-normal">
                                <span class="text-green-500 mr-2 text-sm font-bold">✓</span>
                                <span>{{ $feat }}</span>
                            </li>
                            @endforeach
                        </ul>

                        <a href="/#consultation" class="w-full text-center py-3.5 rounded-xl text-xs font-bold transition-all uppercase tracking-wider {{ isset($pkg['highlight']) && $pkg['highlight'] ? 'bg-[#0B1F3A] text-white hover:bg-navy-800' : 'bg-gray-100 text-[#0B1F3A] hover:bg-gray-200' }}">
                            Get Started
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- TRADEMARK CLASSES -->
            @if(isset($category->page_content['classes']))
            <div class="mt-20">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold font-serif text-[#0B1F3A] mb-2">Trademark Class Categories</h2>
                    <p class="text-xs uppercase font-bold text-gray-400 tracking-widest">Select the Right Class for Your Industry</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($category->page_content['classes'] as $cls)
                    <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="bg-[#FAF6ED] text-[#0B1F3A] border border-[#E2E0D8] text-xs font-black px-3 py-1 rounded-lg">Class {{ $cls['id'] }}</span>
                                @if(isset($cls['popular']) && $cls['popular'])
                                    <span class="text-[9px] font-extrabold text-[#D4A843] bg-[#D4A843]/10 px-2 py-0.5 rounded-md uppercase tracking-wider">Popular</span>
                                @endif
                            </div>
                            <h3 class="font-bold font-serif text-[#0B1F3A] text-base mb-2">{{ $cls['title_en'] ?: $cls['title_hi'] }}</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">{{ $cls['desc_en'] ?: $cls['desc_hi'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- TRADEMARK TIMELINE -->
            @if(isset($category->page_content['timeline']))
            <div class="mt-20">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold font-serif text-[#0B1F3A] mb-2">Trademark Registration Timeline</h2>
                    <p class="text-xs uppercase font-bold text-gray-400 tracking-widest">Step-by-Step Registration Workflow</p>
                </div>

                <div class="relative border-l-2 border-gray-200 max-w-3xl mx-auto pl-8 space-y-8 py-4">
                    @foreach($category->page_content['timeline'] as $idx => $step)
                    <div class="relative">
                        <div class="absolute -left-[41px] top-0.5 w-6 h-6 rounded-full bg-gradient-to-br from-[#D4A843] to-[#B8892E] border-4 border-white flex items-center justify-center text-[10px] text-white font-bold shadow-sm">
                            {{ $idx + 1 }}
                        </div>
                        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-xs flex items-center justify-between gap-6">
                            <div>
                                <h3 class="font-bold text-[#0B1F3A] text-[15px] mb-0.5">{{ $step['step_en'] ?: $step['step_hi'] }}</h3>
                            </div>
                            <div class="shrink-0 text-right">
                                <span class="bg-[#FAF6ED] text-[#A67828] border border-[#E2E0D8] text-[10px] font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">{{ $step['time_en'] ?: $step['time_hi'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- TRADEMARK BENEFITS -->
            @if(isset($category->page_content['benefits']))
            <div class="mt-20">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold font-serif text-[#0B1F3A] mb-2">Key Registration Benefits</h2>
                    <p class="text-xs uppercase font-bold text-gray-400 tracking-widest">Why Registering Your Trademark Matters</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($category->page_content['benefits'] as $ben)
                    <div class="bg-white rounded-3xl p-6 border border-gray-200 shadow-xs flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div>
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#FFF3D6] to-[#FDE9A0] text-[#B8892E] flex items-center justify-center shadow-md shadow-gold/20 mb-5">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {!! $svgIcons[$ben['icon']] ?? '' !!}
                                </svg>
                            </div>
                            <h3 class="font-bold text-[#0B1F3A] font-serif text-base mb-2">{{ $ben['title_en'] ?: $ben['title_hi'] }}</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">{{ $ben['desc_en'] ?: $ben['desc_hi'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- FAQs -->
            @if(isset($category->page_content['faqs']))
            <div class="mt-20 max-w-4xl mx-auto">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold font-serif text-[#0B1F3A] mb-2">Frequently Asked Questions</h2>
                    <p class="text-xs uppercase font-bold text-gray-400 tracking-widest">Get answers to common queries</p>
                </div>
                
                <div class="space-y-4" x-data="{ activeFaq: null }">
                    @foreach($category->page_content['faqs'] as $idx => $faq)
                    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-xs">
                        <button @click="activeFaq = (activeFaq === {{ $idx }} ? null : {{ $idx }})" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50/50 transition-colors">
                            <div>
                                <span class="font-bold text-sm text-[#0B1F3A] leading-tight block">{{ $faq['q_en'] ?: $faq['q_hi'] }}</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="activeFaq === {{ $idx }} ? 'rotate-180 text-[#D4A843]' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path></svg>
                        </button>
                        <div x-show="activeFaq === {{ $idx }}" x-collapse class="border-t border-gray-100 bg-gray-50/30">
                            <div class="px-6 py-5 text-xs text-gray-600 font-medium leading-relaxed">
                                <p>{{ $faq['a_en'] ?: $faq['a_hi'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        @endif

    </div>
</section>

@endsection
