@extends('layouts.app')

@section('title', $lawyer->name . ' | Lawyer Profile - Foundida')

@section('content')
<div class="bg-offwhite py-8 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <div class="text-sm text-gray-500 mb-6 font-medium flex items-center">
            <a href="/" class="hover:text-gold transition flex flex-col">
                <span class="text-xs font-bold text-navy">होम</span>
                <span class="text-[10px]">Home</span>
            </a>
            <span class="mx-2">/</span>
            <a href="/vakeel-search" class="hover:text-gold transition flex flex-col">
                <span class="text-xs font-bold text-navy">वकील खोजें</span>
                <span class="text-[10px]">Find Lawyer</span>
            </a>
            <span class="mx-2">/</span>
            <div class="flex flex-col text-navy font-bold">
                <span class="text-xs">{{ $lawyer->name }}</span>
                <span class="text-[10px] text-gray-500">Profile</span>
            </div>
        </div>

        <!-- TOP SECTION: COVER & PROFILE SUMMARY -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-8 hover:-translate-y-1 transition-transform duration-300">
            <!-- Cover Banner -->
            <div class="h-32 md:h-48 bg-gradient-to-r from-navy-800 to-navy relative" style="background-image: radial-gradient(rgba(201,147,58,0.15) 1px, transparent 1px); background-size: 20px 20px;">
            </div>
            
            <div class="px-6 sm:px-8 pb-8 relative">
                <!-- Profile Photo -->
                <div class="absolute -top-16 md:-top-20">
                    <img src="{{ $lawyer->image }}" alt="{{ $lawyer->name }}" class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-gold shadow-lg object-cover bg-white">
                </div>
                
                <div class="pt-20 md:pt-24 flex flex-col lg:flex-row justify-between lg:items-end gap-6">
                    <div class="flex-1">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4 mb-2">
                            <h1 class="font-serif text-3xl md:text-[32px] font-bold text-navy">{{ $lawyer->name }}</h1>
                            @if($lawyer->verified)
                                <div class="bg-green-50 text-green-700 px-3 py-1.5 rounded-md flex flex-col items-center border border-green-200 shadow-sm w-max">
                                    <div class="flex items-center text-xs font-bold">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        बार काउंसिल सत्यापित
                                    </div>
                                    <span class="text-[9px] uppercase font-bold text-green-600">Bar Council Verified</span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="text-lg font-bold text-gray-600 mb-4">{{ $lawyer->designation }}, <span class="text-gray-500 font-medium">{{ $lawyer->court }}</span></div>
                        
                        <div class="flex flex-wrap items-center gap-3 mb-6">
                            <!-- City -->
                            <span class="inline-flex items-center px-3 py-1.5 rounded bg-navy text-white shadow-sm flex-col justify-center">
                                <div class="flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1.5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span class="font-bold text-xs">{{ $lawyer->city }}</span>
                                </div>
                                <span class="text-[9px] uppercase tracking-wider text-gray-300">City</span>
                            </span>
                            
                            <!-- Experience -->
                            <span class="inline-flex items-center px-3 py-1.5 rounded bg-gray-50 border border-gray-100 flex-col justify-center text-navy shadow-sm">
                                <div class="flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1.5 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    <span class="font-bold text-xs">{{ $lawyer->experience }} साल</span>
                                </div>
                                <span class="text-[9px] uppercase tracking-wider text-gray-500">Experience</span>
                            </span>
                            
                            <!-- Languages -->
                            <span class="inline-flex items-center px-3 py-1.5 rounded bg-gray-50 border border-gray-100 flex-col justify-center text-navy shadow-sm">
                                <div class="flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1.5 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path></svg>
                                    <span class="font-bold text-xs">{{ implode(' • ', $lawyer->languages) }}</span>
                                </div>
                                <span class="text-[9px] uppercase tracking-wider text-gray-500">Languages</span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col lg:items-end w-full lg:w-auto">
                        <div class="flex flex-wrap lg:justify-end gap-4 border-t lg:border-t-0 border-gray-100 pt-4 lg:pt-0">
                            <div class="flex flex-col bg-gray-50 px-4 py-2 rounded-lg border border-gray-100 items-center min-w-[80px]">
                                <div class="flex items-center text-gold mb-0.5">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <span class="font-bold ml-1 text-navy text-lg">{{ $lawyer->rating }}</span>
                                </div>
                                <span class="text-[9px] uppercase font-bold text-gray-500">{{ $lawyer->reviews }} Reviews</span>
                            </div>
                            
                            <div class="flex flex-col bg-gray-50 px-4 py-2 rounded-lg border border-gray-100 items-center min-w-[80px]">
                                <span class="font-bold text-navy text-lg mb-0.5">{{ $lawyer->cases }}+</span>
                                <span class="text-[9px] uppercase font-bold text-gray-500">Cases</span>
                            </div>

                            <div class="flex flex-col bg-gray-50 px-4 py-2 rounded-lg border border-gray-100 items-center min-w-[80px]">
                                <span class="font-bold text-navy text-lg mb-0.5">{{ $lawyer->response_rate }}%</span>
                                <span class="text-[9px] uppercase font-bold text-gray-500">Response</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- MAIN CONTENT (LEFT 65%) -->
            <div class="flex-1 w-full lg:w-[65%]" x-data="{ tab: 'about' }">
                
                <!-- Alpine.js Tabs Navigation -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 p-2 overflow-x-auto">
                    <nav class="flex min-w-max space-x-2" aria-label="Tabs">
                        <button @click="tab = 'about'" :class="tab === 'about' ? 'bg-navy text-white shadow-md' : 'text-gray-600 hover:bg-gray-50'" class="flex flex-col items-center justify-center px-6 min-h-[48px] rounded-lg transition-all flex-1 min-w-[120px]">
                            <span class="text-sm font-bold">विवरण</span>
                            <span class="text-[10px] uppercase tracking-wider" :class="tab === 'about' ? 'text-gray-300' : 'text-gray-400'">About</span>
                        </button>
                        <button @click="tab = 'expertise'" :class="tab === 'expertise' ? 'bg-navy text-white shadow-md' : 'text-gray-600 hover:bg-gray-50'" class="flex flex-col items-center justify-center px-6 min-h-[48px] rounded-lg transition-all flex-1 min-w-[120px]">
                            <span class="text-sm font-bold">विशेषज्ञता</span>
                            <span class="text-[10px] uppercase tracking-wider" :class="tab === 'expertise' ? 'text-gray-300' : 'text-gray-400'">Expertise</span>
                        </button>
                        <button @click="tab = 'reviews'" :class="tab === 'reviews' ? 'bg-navy text-white shadow-md' : 'text-gray-600 hover:bg-gray-50'" class="flex flex-col items-center justify-center px-6 min-h-[48px] rounded-lg transition-all flex-1 min-w-[120px]">
                            <span class="text-sm font-bold">समीक्षाएं</span>
                            <span class="text-[10px] uppercase tracking-wider" :class="tab === 'reviews' ? 'text-gray-300' : 'text-gray-400'">Reviews</span>
                        </button>
                        <button @click="tab = 'cases'" :class="tab === 'cases' ? 'bg-navy text-white shadow-md' : 'text-gray-600 hover:bg-gray-50'" class="flex flex-col items-center justify-center px-6 min-h-[48px] rounded-lg transition-all flex-1 min-w-[120px]">
                            <span class="text-sm font-bold">सफल मामले</span>
                            <span class="text-[10px] uppercase tracking-wider" :class="tab === 'cases' ? 'text-gray-300' : 'text-gray-400'">Cases Won</span>
                        </button>
                    </nav>
                </div>

                <!-- TABS CONTENT -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sm:p-8 hover:-translate-y-1 transition-transform duration-300">
                    
                    <!-- ABOUT TAB -->
                    <div x-show="tab === 'about'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="mb-8">
                            <div class="flex flex-col mb-4">
                                <h2 class="text-2xl font-bold text-navy leading-tight">संक्षिप्त परिचय</h2>
                                <span class="text-[11px] uppercase tracking-wider font-semibold text-gray-400 mt-0.5">Biography</span>
                            </div>
                            <p class="text-navy font-medium text-[15px] leading-relaxed mb-4">{{ $lawyer->about_hi }}</p>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $lawyer->about_en }}</p>
                        </div>

                        <div class="border-t border-gray-100 pt-8 mb-8">
                            <div class="flex flex-col mb-6">
                                <h2 class="text-xl font-bold text-navy leading-tight">शिक्षा</h2>
                                <span class="text-[10px] uppercase tracking-wider font-semibold text-gray-400 mt-0.5">Education</span>
                            </div>
                            <div class="space-y-6 relative before:absolute before:inset-0 before:ml-2 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-gray-200 before:to-transparent">
                                @foreach($lawyer->education as $edu)
                                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                        <div class="flex items-center justify-center w-5 h-5 rounded-full border-4 border-white bg-gold text-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10"></div>
                                        <div class="w-[calc(100%-2rem)] md:w-[calc(50%-1.5rem)] bg-gray-50 p-4 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition">
                                            <div class="flex flex-col mb-1">
                                                <div class="text-gold font-bold text-xs mb-1">{{ $edu['year'] }}</div>
                                                <h3 class="font-bold text-navy text-base">{{ $edu['degree'] }}</h3>
                                            </div>
                                            <p class="text-sm text-gray-500 font-medium">{{ $edu['inst'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- EXPERTISE TAB -->
                    <div x-show="tab === 'expertise'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="flex flex-col mb-6">
                            <h2 class="text-2xl font-bold text-navy leading-tight">विशेषज्ञता क्षेत्र</h2>
                            <span class="text-[11px] uppercase tracking-wider font-semibold text-gray-400 mt-0.5">Practice Areas</span>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($lawyer->expertise as $exp)
                                <div class="bg-gray-50 p-5 rounded-xl border border-gray-200 hover:border-gold transition-colors flex items-center justify-between">
                                    <div class="flex flex-col">
                                        <h3 class="font-bold text-navy text-lg">{{ $exp['name_hi'] }}</h3>
                                        <span class="text-xs font-semibold text-gray-500 uppercase">{{ $exp['name_en'] }}</span>
                                    </div>
                                    <div class="flex flex-col items-center bg-white w-14 h-14 rounded-full border border-gray-200 justify-center shadow-sm">
                                        <span class="font-bold text-gold text-sm leading-tight">{{ $exp['rate'] }}%</span>
                                        <span class="text-[8px] uppercase text-gray-400 font-bold leading-tight">Success</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- REVIEWS TAB -->
                    <div x-show="tab === 'reviews'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="flex flex-col mb-8">
                            <h2 class="text-2xl font-bold text-navy leading-tight">समीक्षाएं</h2>
                            <span class="text-[11px] uppercase tracking-wider font-semibold text-gray-400 mt-0.5">Client Reviews</span>
                        </div>

                        <!-- Summary Chart -->
                        <div class="flex flex-col sm:flex-row items-center gap-8 bg-gray-50 p-6 rounded-xl border border-gray-100 mb-8">
                            <div class="flex flex-col items-center">
                                <div class="text-5xl font-bold text-navy mb-2">{{ $lawyer->rating }}</div>
                                <div class="flex text-gold mb-2">
                                    ★★★★☆
                                </div>
                                <div class="flex flex-col items-center">
                                    <span class="font-bold text-gray-600 text-sm">{{ $lawyer->reviews }} कुल समीक्षाएं</span>
                                    <span class="text-[10px] uppercase text-gray-400">Total Reviews</span>
                                </div>
                            </div>
                            <div class="flex-1 w-full space-y-2">
                                <div class="flex items-center text-sm"><span class="w-8 text-gray-600 font-bold">5★</span><div class="flex-1 mx-3 bg-gray-200 rounded-full h-2"><div class="bg-gold h-2 rounded-full" style="width: 60%"></div></div><span class="w-8 text-right text-gray-500 text-xs">60%</span></div>
                                <div class="flex items-center text-sm"><span class="w-8 text-gray-600 font-bold">4★</span><div class="flex-1 mx-3 bg-gray-200 rounded-full h-2"><div class="bg-gold h-2 rounded-full" style="width: 25%"></div></div><span class="w-8 text-right text-gray-500 text-xs">25%</span></div>
                                <div class="flex items-center text-sm"><span class="w-8 text-gray-600 font-bold">3★</span><div class="flex-1 mx-3 bg-gray-200 rounded-full h-2"><div class="bg-gold h-2 rounded-full" style="width: 10%"></div></div><span class="w-8 text-right text-gray-500 text-xs">10%</span></div>
                                <div class="flex items-center text-sm"><span class="w-8 text-gray-600 font-bold">2★</span><div class="flex-1 mx-3 bg-gray-200 rounded-full h-2"><div class="bg-gold h-2 rounded-full" style="width: 5%"></div></div><span class="w-8 text-right text-gray-500 text-xs">5%</span></div>
                                <div class="flex items-center text-sm"><span class="w-8 text-gray-600 font-bold">1★</span><div class="flex-1 mx-3 bg-gray-200 rounded-full h-2"><div class="bg-gold h-2 rounded-full" style="width: 0%"></div></div><span class="w-8 text-right text-gray-500 text-xs">0%</span></div>
                            </div>
                        </div>

                        <!-- Review Cards -->
                        <div class="space-y-4">
                            @foreach($lawyer->recent_reviews as $review)
                                <div class="border-b border-gray-100 pb-6 last:border-0 last:pb-0">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-navy text-white flex items-center justify-center font-bold text-lg">
                                                {{ substr($review['name'], 0, 1) }}
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="font-bold text-navy text-sm">{{ $review['name'] }}</span>
                                                <span class="text-xs text-gray-500">{{ $review['city'] }}</span>
                                            </div>
                                        </div>
                                        <span class="text-xs text-gray-400 font-medium">{{ $review['date'] }}</span>
                                    </div>
                                    <div class="text-gold text-sm mb-3">
                                        {{ str_repeat('★', $review['stars']) }}{{ str_repeat('☆', 5 - $review['stars']) }}
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="text-navy font-medium text-sm mb-1">{{ $review['text_hi'] }}</p>
                                        <p class="text-gray-500 text-xs">{{ $review['text_en'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- CASES WON TAB -->
                    <div x-show="tab === 'cases'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">
                        <div class="flex flex-col mb-6">
                            <h2 class="text-2xl font-bold text-navy leading-tight">सफल मामले</h2>
                            <span class="text-[11px] uppercase tracking-wider font-semibold text-gray-400 mt-0.5">Recent Cases Won</span>
                        </div>

                        <div class="grid grid-cols-1 gap-4">
                            @foreach($lawyer->cases_won as $case)
                                <div class="bg-white border border-gray-200 p-4 rounded-xl shadow-sm flex items-start gap-4">
                                    <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center flex-shrink-0 mt-1">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div class="flex flex-col">
                                        <h3 class="font-bold text-navy text-base leading-tight mb-1">{{ $case['title_hi'] }}</h3>
                                        <span class="text-xs uppercase font-semibold text-gray-500">{{ $case['title_en'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT SIDEBAR: CONSULTATION BOOKING CARD (35%) -->
            <aside class="w-full lg:w-[35%] flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-200 p-6 sticky top-28 hover:-translate-y-1 transition-transform duration-300">
                    
                    <div class="flex flex-col mb-6 pb-4 border-b border-gray-100">
                        <h2 class="text-2xl font-bold text-navy leading-tight">परामर्श बुक करें</h2>
                        <span class="text-xs uppercase tracking-wider font-semibold text-gray-400 mt-0.5">Book Consultation</span>
                    </div>

                    <form action="#">
                        <!-- Consultation Type -->
                        <div class="mb-6">
                            <div class="flex flex-col mb-3">
                                <label class="text-sm font-bold text-navy leading-tight">परामर्श का प्रकार</label>
                                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Consultation Type</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                <label class="cursor-pointer">
                                    <input type="radio" name="cons_type" class="peer sr-only" checked>
                                    <div class="flex flex-col items-center justify-center p-2 rounded-lg border-2 border-gray-200 bg-white peer-checked:border-gold peer-checked:bg-gold/5 transition min-h-[64px]">
                                        <span class="text-lg mb-1">📹</span>
                                        <span class="text-[10px] font-bold text-navy">वीडियो</span>
                                        <span class="text-[8px] uppercase text-gray-500">Video</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="cons_type" class="peer sr-only">
                                    <div class="flex flex-col items-center justify-center p-2 rounded-lg border-2 border-gray-200 bg-white peer-checked:border-gold peer-checked:bg-gold/5 transition min-h-[64px]">
                                        <span class="text-lg mb-1">📞</span>
                                        <span class="text-[10px] font-bold text-navy">फ़ोन</span>
                                        <span class="text-[8px] uppercase text-gray-500">Phone</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="cons_type" class="peer sr-only">
                                    <div class="flex flex-col items-center justify-center p-2 rounded-lg border-2 border-gray-200 bg-white peer-checked:border-gold peer-checked:bg-gold/5 transition min-h-[64px]">
                                        <span class="text-lg mb-1">🏢</span>
                                        <span class="text-[10px] font-bold text-navy">व्यक्तिगत</span>
                                        <span class="text-[8px] uppercase text-gray-500">In-Person</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Date Picker Pills -->
                        <div class="mb-6">
                            <div class="flex flex-col mb-3">
                                <label class="text-sm font-bold text-navy leading-tight">तारीख चुनें</label>
                                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Select Date</span>
                            </div>
                            <div class="flex gap-2 overflow-x-auto pb-2 custom-scrollbar">
                                @php
                                    $dates = [
                                        ['day'=>'आज', 'en'=>'Today', 'date'=>'19'],
                                        ['day'=>'कल', 'en'=>'Tomorrow', 'date'=>'20'],
                                        ['day'=>'बुध', 'en'=>'Wed', 'date'=>'21'],
                                        ['day'=>'गुरु', 'en'=>'Thu', 'date'=>'22'],
                                        ['day'=>'शुक्र', 'en'=>'Fri', 'date'=>'23'],
                                    ];
                                @endphp
                                @foreach($dates as $index => $d)
                                <label class="cursor-pointer flex-shrink-0">
                                    <input type="radio" name="date" class="peer sr-only" {{ $index === 0 ? 'checked' : '' }}>
                                    <div class="flex flex-col items-center justify-center w-14 py-2 rounded-lg border-2 border-gray-200 bg-white peer-checked:border-navy peer-checked:bg-navy peer-checked:text-white transition">
                                        <span class="text-[10px] font-bold mb-0.5 peer-checked:text-white text-navy">{{ $d['day'] }}</span>
                                        <span class="text-lg font-bold leading-none mb-1">{{ $d['date'] }}</span>
                                        <span class="text-[8px] uppercase peer-checked:text-gray-300 text-gray-500">{{ $d['en'] }}</span>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Time Slots Grid -->
                        <div class="mb-8">
                            <div class="flex flex-col mb-3">
                                <label class="text-sm font-bold text-navy leading-tight">समय चुनें</label>
                                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Select Time</span>
                            </div>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach(['10:00 AM', '11:30 AM', '01:00 PM', '03:30 PM', '04:00 PM', '05:30 PM'] as $index => $time)
                                <label class="cursor-pointer">
                                    <input type="radio" name="time" class="peer sr-only" {{ $index === 1 ? 'checked' : '' }}>
                                    <div class="flex items-center justify-center py-2 px-1 rounded-md border border-gray-200 bg-gray-50 peer-checked:border-gold peer-checked:bg-gold peer-checked:text-navy text-gray-600 font-semibold text-xs min-h-[48px] transition">
                                        {{ $time }}
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Fee Summary -->
                        <div class="bg-offwhite rounded-xl p-4 border border-gray-200 mb-6">
                            <div class="flex justify-between items-center mb-2 text-sm">
                                <div class="flex flex-col">
                                    <span class="font-bold text-navy leading-tight">परामर्श शुल्क</span>
                                    <span class="text-[9px] uppercase text-gray-500">Base Fee</span>
                                </div>
                                <span class="font-bold text-navy">₹{{ $lawyer->fee }}</span>
                            </div>
                            <div class="flex justify-between items-center mb-3 text-sm pb-3 border-b border-gray-200">
                                <div class="flex flex-col">
                                    <span class="font-bold text-navy leading-tight">जीएसटी (18%)</span>
                                    <span class="text-[9px] uppercase text-gray-500">GST</span>
                                </div>
                                <span class="font-bold text-navy">₹{{ round($lawyer->fee * 0.18) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-lg font-bold text-navy leading-tight">कुल भुगतान</span>
                                    <span class="text-[10px] uppercase font-bold text-gray-500">Total Payable</span>
                                </div>
                                <span class="text-2xl font-bold text-gold">₹{{ $lawyer->fee + round($lawyer->fee * 0.18) }}</span>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col gap-3">
                            <button type="button" class="w-full bg-gold text-navy hover:bg-gold-light min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md hover:shadow-lg flex flex-col items-center justify-center hover:-translate-y-0.5">
                                <span class="text-base font-bold leading-tight">अभी बुक करें</span>
                                <span class="text-[10px] uppercase tracking-wider mt-0.5">Book Now</span>
                            </button>
                            
                            <a href="https://wa.me/918069029400" target="_blank" class="w-full bg-[#25D366] text-white hover:bg-[#20b858] min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md hover:shadow-lg flex flex-col items-center justify-center hover:-translate-y-0.5">
                                <div class="flex items-center text-sm font-bold leading-tight">
                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                                    व्हाट्सएप पर पूछें
                                </div>
                                <span class="text-[10px] uppercase tracking-wider mt-0.5">Ask on WhatsApp</span>
                            </a>
                        </div>
                        
                        <p class="text-[10px] text-gray-400 text-center mt-4">Safe & Secure Payment via Razorpay</p>
                    </form>
                </div>
            </aside>
            
        </div>
    </div>
</div>
@endsection
