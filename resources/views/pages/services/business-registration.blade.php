@extends('layouts.app')

@section('title', 'Business Registration Services Online in India | Foundida')

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
                            Business Registration
                        </span>
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
                REGISTER YOUR BUSINESS IN INDIA
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[52px] font-bold text-white leading-tight mb-4">
            Register Your <span class="text-[#f5a623]">Company Online</span>
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed max-w-[600px] mx-auto">
            Fast, Affordable, Legal — Register your business structure in India completely online with full expert guidance from dedicated incorporation specialists.
        </p>
    </div>
</x-inner-hero>

<!-- BUSINESS TYPE SELECTOR (2x3 Grid) -->
<div class="bg-offwhite py-20 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">Choose the Right Company Type</h2>
            <p class="text-xs font-bold text-gold uppercase tracking-wider">Select the entity structure that fits your scale and strategy</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($types as $type)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300 hover:shadow-lg group">
                <!-- Icon -->
                <div class="w-16 h-16 bg-navy-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-gold/10 transition-colors">
                    @if($type['icon'] == 'office-building')
                        <svg class="w-8 h-8 text-navy group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    @elseif($type['icon'] == 'user')
                        <svg class="w-8 h-8 text-navy group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    @elseif($type['icon'] == 'users')
                        <svg class="w-8 h-8 text-navy group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    @elseif($type['icon'] == 'user-circle')
                        <svg class="w-8 h-8 text-navy group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    @elseif($type['icon'] == 'heart')
                        <svg class="w-8 h-8 text-navy group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    @else
                        <svg class="w-8 h-8 text-navy group-hover:text-gold transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    @endif
                </div>

                <!-- Name -->
                <div class="flex flex-col mb-4">
                    <h3 class="text-xl font-bold text-navy group-hover:text-gold transition-colors">{{ $type['name_en'] }}</h3>
                </div>
                
                <!-- Best For -->
                <div class="mb-6 flex-grow">
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 h-full flex flex-col justify-center">
                        <span class="text-[10px] uppercase font-bold text-gold tracking-wider mb-1">Best For</span>
                        <span class="text-xs text-gray-700 font-semibold leading-relaxed">{{ $type['best_for_en'] }}</span>
                    </div>
                </div>
                
                <!-- Price & Action -->
                <div class="flex flex-col items-center mb-5">
                    <span class="text-[10px] uppercase font-bold text-gray-400 mb-0.5">Registration Fee</span>
                    <span class="text-3xl font-extrabold text-navy">₹{{ $type['price'] }}</span>
                </div>

                <a href="/services/business-registration/{{ $type['slug'] }}" class="w-full border-2 border-gold text-gold hover:bg-gold hover:text-navy min-h-[48px] rounded-xl font-bold transition-all duration-300 flex items-center justify-center uppercase tracking-wider text-xs">
                    Know More
                </a>
            </div>
            @endforeach
        </div>

    </div>
</div>

<!-- COMPARISON TABLE -->
<div class="bg-white py-20 border-t border-gray-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">Which Entity Type is Right for You?</h2>
            <p class="text-xs font-bold text-gold uppercase tracking-wider mb-6">Side-by-side comparison of company structures</p>
        </div>

        <div class="overflow-x-auto bg-white rounded-2xl shadow-sm border border-gray-200">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-navy text-white text-sm">
                        <th class="p-4 border-b border-navy-600 font-semibold w-1/5">Entity Type</th>
                        <th class="p-4 border-b border-navy-600 font-semibold text-center">Min Members</th>
                        <th class="p-4 border-b border-navy-600 font-semibold text-center">Liability</th>
                        <th class="p-4 border-b border-navy-600 font-semibold text-center">Tax Rate</th>
                        <th class="p-4 border-b border-navy-600 font-semibold w-1/4">Best Suitable For</th>
                        <th class="p-4 border-b border-navy-600 font-semibold text-right">Cost</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($comparisons as $comp)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 border-r border-gray-50 font-bold text-navy text-sm">
                            {{ $comp['type_en'] }}
                        </td>
                        <td class="p-4 text-center font-bold text-gray-700 border-r border-gray-50 text-sm">{{ $comp['members'] }}</td>
                        
                        <td class="p-4 text-center border-r border-gray-50">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold {{ $comp['liability_color'] == 'green' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200' }}">
                                {{ $comp['liability'] }}
                            </span>
                        </td>
                        
                        <td class="p-4 text-center border-r border-gray-50">
                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold {{ $comp['tax_color'] == 'green' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-gray-100 text-gray-700 border border-gray-200' }}">
                                {{ $comp['tax'] }}
                            </span>
                        </td>
                        
                        <td class="p-4 border-r border-gray-50 text-xs text-gray-700 font-semibold">
                            {{ $comp['best_for_en'] }}
                        </td>
                        
                        <td class="p-4 text-right">
                            <span class="font-bold text-lg {{ $comp['cost_color'] == 'red' ? 'text-red-600' : ($comp['cost_color'] == 'green' ? 'text-green-600' : 'text-navy') }}">
                                {{ $comp['cost'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- PROCESS TIMELINE -->
<div class="bg-navy py-20 text-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-white mb-2 font-serif">Incorporation Timeline</h2>
            <p class="text-xs font-bold text-gold uppercase tracking-wider">Step-by-step registration workflow</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 relative">
            @php
                $steps = [
                    ['day_en' => 'Day 1-2', 'title_en' => 'Documents Collection', 'icon' => 'folder-open'],
                    ['day_en' => 'Day 3-4', 'title_en' => 'MCA Name Reservation', 'icon' => 'document-text'],
                    ['day_en' => 'Day 5-7', 'title_en' => 'DIN / DSC Approval', 'icon' => 'key'],
                    ['day_en' => 'Day 8-12', 'title_en' => 'MOA & AOA Drafting', 'icon' => 'book-open'],
                    ['day_en' => 'Day 13-18', 'title_en' => 'Certificate of Incorporation', 'icon' => 'badge-check'],
                    ['day_en' => 'Day 19-21', 'title_en' => 'PAN / TAN & Bank Account', 'icon' => 'credit-card'],
                ];
            @endphp

            @foreach($steps as $index => $step)
            <div class="flex flex-col items-center text-center p-6 bg-navy-800 rounded-2xl border border-navy-600 hover:-translate-y-1 transition-transform hover:border-gold group relative">
                <div class="absolute -top-3 -right-2 bg-gold text-navy font-bold px-2.5 py-0.5 rounded-full shadow border border-gold-light text-[10px] uppercase">
                    {{ $step['day_en'] }}
                </div>
                
                <div class="w-14 h-14 bg-navy rounded-full flex items-center justify-center mb-4 shadow-inner border border-navy-600 group-hover:border-gold transition-colors">
                    @if($step['icon'] == 'folder-open')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path></svg>
                    @elseif($step['icon'] == 'document-text')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    @elseif($step['icon'] == 'key')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                    @elseif($step['icon'] == 'book-open')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    @elseif($step['icon'] == 'badge-check')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    @else
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    @endif
                </div>
                
                <h3 class="font-bold text-sm mb-1 leading-tight text-white">{{ $step['title_en'] }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- DOCUMENTS CHECKLIST -->
<div class="bg-offwhite py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">Required Documents Checklist</h2>
            <p class="text-xs font-bold text-gold uppercase tracking-wider mb-6">Simple documentation needed to begin incorporation</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Directors -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 hover:-translate-y-1 transition-transform duration-300">
                <div class="flex items-center mb-6 border-b border-gray-100 pb-4">
                    <div class="w-12 h-12 bg-navy-50 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <h3 class="text-xl font-bold text-navy">For Directors / Partners</h3>
                        <span class="text-xs font-semibold text-gray-400">Personal Identification Proofs</span>
                    </div>
                </div>
                
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3 shrink-0 mt-0.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
                        <span class="font-semibold text-gray-700 text-sm">Aadhaar Card</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3 shrink-0 mt-0.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
                        <span class="font-semibold text-gray-700 text-sm">PAN Card</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3 shrink-0 mt-0.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
                        <span class="font-semibold text-gray-700 text-sm">Passport Size Photograph</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3 shrink-0 mt-0.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
                        <span class="font-semibold text-gray-700 text-sm">Address Proof (Bank Statement or Utility Bill)</span>
                    </li>
                </ul>
            </div>

            <!-- Office -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 hover:-translate-y-1 transition-transform duration-300">
                <div class="flex items-center mb-6 border-b border-gray-100 pb-4">
                    <div class="w-12 h-12 bg-navy-50 rounded-full flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <h3 class="text-xl font-bold text-navy">For Registered Office Address</h3>
                        <span class="text-xs font-semibold text-gray-400">Premises Proofs</span>
                    </div>
                </div>
                
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3 shrink-0 mt-0.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
                        <span class="font-semibold text-gray-700 text-sm">Electricity Bill (Latest Copy)</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3 shrink-0 mt-0.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
                        <span class="font-semibold text-gray-700 text-sm">NOC from Property Owner</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3 shrink-0 mt-0.5"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
                        <span class="font-semibold text-gray-700 text-sm">Rent Agreement (If premises is rented)</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
