@extends('layouts.app')

@php
    $siteName = \App\Models\Setting::get('site_name', 'Foundida');
@endphp

@section('title', 'About Us — ' . $siteName . ' | India\'s Premier Business Legal Platform')
@section('meta_description', 'Learn about ' . $siteName . ', India\'s leading business legal tech platform. Discover our story, mission, and leadership team.')
@section('meta_keywords', 'About ' . $siteName . ', Legal Tech India, Business Compliance Platform, Founders')

@section('content')
<!-- BREADCRUMB -->
<div class="bg-navy py-4 border-b border-navy-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-300 hover:text-gold transition font-bold text-sm">
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="text-gold ml-1 md:ml-2 font-bold text-sm">About Us</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                ABOUT FOUNDIDA
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[56px] font-bold text-white leading-tight">
            India's Most Trusted <span class="text-[#f5a623]">Legal Platform</span>
        </h1>
        <h2 class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed mt-4 max-w-[600px] mx-auto">
            Empowering Startups and Businesses across India with seamless legal & compliance solutions.
        </h2>
    </div>
</x-inner-hero>

<!-- STATS ROW -->
<div class="bg-gold py-12 relative z-20 shadow-lg border-y border-gold-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($stats as $stat)
            <div class="flex flex-col items-center text-center p-4 bg-white rounded-2xl shadow hover:-translate-y-1 transition-transform group">
                <span class="text-3xl md:text-4xl font-extrabold text-navy mb-2">{{ $stat['number'] }}</span>
                <span class="font-bold text-xs uppercase tracking-wider text-gray-600">{{ $stat['title_en'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- MISSION SECTION -->
<div class="bg-offwhite py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-16 items-center">
            
            <!-- Left: Our Story -->
            <div class="w-full lg:w-3/5">
                <div class="flex flex-col mb-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-navy font-serif mb-1">Our Story</h2>
                    <span class="text-xs font-bold text-gold uppercase tracking-wider">Building the Future of Legal Tech</span>
                </div>
                
                <div class="space-y-6 text-gray-700">
                    <div class="flex flex-col">
                        <p class="font-medium text-lg text-navy mb-2">"We started this platform with a simple vision: to make legal and compliance services easy, transparent, and affordable for everyone in India."</p>
                    </div>
                    
                    <div class="flex flex-col">
                        <p class="text-base text-gray-600 leading-relaxed">Business owners and entrepreneurs often face complex legal procedures, hidden fees, and unnecessary delays. Our mission is to bridge this gap by bringing experienced legal professionals, chartered accountants, and company secretaries directly to your fingertips.</p>
                    </div>
                </div>
            </div>

            <!-- Right: Founder -->
            <div class="w-full lg:w-2/5">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:-translate-y-1 transition-transform duration-300">
                    <div class="w-full h-80 bg-gray-200 flex flex-col items-center justify-center text-gray-400 relative">
                        <svg class="w-20 h-20 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Founder Photo</span>
                    </div>
                    <div class="p-6 text-center border-t-4 border-gold bg-navy text-white">
                        <span class="text-xl font-bold font-serif block">{{ $team[0]['name_en'] }}</span>
                        <span class="text-xs uppercase tracking-wider text-gold mt-1 block">{{ $team[0]['role_en'] }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- KEY MILESTONES -->
<div class="bg-navy py-20 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-white mb-2 font-serif">Our Journey</h2>
            <p class="text-xs font-bold text-gold uppercase tracking-wider">Key Milestones</p>
        </div>

        <div class="relative">
            <!-- Horizontal Line -->
            <div class="absolute top-1/2 left-0 right-0 h-1 bg-navy-600 -translate-y-1/2 hidden md:block"></div>
            
            <div class="flex flex-col md:flex-row justify-between items-center gap-8 md:gap-4 relative z-10 overflow-x-auto pb-8 md:pb-0 scrollbar-hide">
                @foreach($milestones as $milestone)
                <div class="flex flex-col items-center text-center group hover:-translate-y-1 transition-transform min-w-[150px]">
                    <div class="bg-gold text-navy font-black text-xl px-4 py-2 rounded-xl mb-4 shadow-lg border-2 border-white group-hover:scale-110 transition-transform">
                        {{ $milestone['year'] }}
                    </div>
                    <div class="flex flex-col bg-navy-800 p-4 rounded-xl border border-navy-600 w-full">
                        <span class="font-bold text-xs uppercase tracking-wider text-white">{{ $milestone['title_en'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- TEAM SECTION -->
<div class="bg-white py-20 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">Leadership Team</h2>
            <p class="text-xs font-bold text-gold uppercase tracking-wider">Meet the Minds Behind Foundida</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($team as $member)
            <div class="bg-offwhite rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:-translate-y-1 transition-transform duration-300 group">
                <div class="w-full h-64 bg-gray-200 flex flex-col items-center justify-center text-gray-400 group-hover:bg-gray-300 transition-colors">
                    <svg class="w-16 h-16 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Photo</span>
                </div>
                <div class="p-6 text-center relative">
                    <a href="{{ $member['linkedin'] ?? 'https://www.linkedin.com/company/foundida' }}" target="_blank" rel="noopener noreferrer" class="absolute -top-5 right-6 w-10 h-10 bg-[#0077b5] text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <span class="text-xl font-bold text-navy block mb-1">{{ $member['name_en'] }}</span>
                    <span class="text-xs font-semibold text-gold uppercase tracking-wider block">{{ $member['role_en'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- CERTIFICATIONS -->
<div class="bg-navy py-16 border-t border-navy-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($certs as $cert)
            <div class="flex flex-col items-center text-center group">
                <div class="w-12 h-12 rounded-full bg-navy-800 border border-navy-600 flex items-center justify-center mb-3 group-hover:border-gold group-hover:bg-navy transition-all duration-300">
                    @if($cert['icon'] == 'badge-check')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    @elseif($cert['icon'] == 'scale')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    @elseif($cert['icon'] == 'office-building')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    @else
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    @endif
                </div>
                <span class="text-white font-bold text-xs uppercase tracking-wider">{{ $cert['name_en'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
