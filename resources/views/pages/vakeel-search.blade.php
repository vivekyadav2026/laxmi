@extends('layouts.app')

@section('title', 'वकील खोजें | Find Lawyer - Foundida')

@section('content')

<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                FIND A LAWYER
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[48px] font-bold text-white leading-tight">
            <span class="text-[#f5a623]">वकील</span> खोजें
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed mt-4 max-w-[600px] mx-auto">
            Find the right legal expert for your needs.
        </p>
    </div>
</x-inner-hero>

<div class="bg-offwhite py-8 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumbs -->
        <div class="text-sm text-gray-500 mb-6 font-medium flex items-center">
            <a href="/" class="hover:text-gold transition flex flex-col">
                <span class="text-xs font-bold text-navy">होम</span>
                <span class="text-[10px]">Home</span>
            </a>
            <span class="mx-2">/</span>
            <div class="flex flex-col text-navy font-bold">
                <span class="text-xs">वकील खोजें</span>
                <span class="text-[10px] text-gray-500">Find Lawyer</span>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- LEFT SIDEBAR (FILTERS) -->
            <aside class="w-full lg:w-[280px] flex-shrink-0">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 sticky top-28 hover:-translate-y-1 transition-transform duration-300">
                    
                    <!-- Title & Reset -->
                    <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                        <div class="flex flex-col">
                            <h2 class="text-xl font-bold text-navy leading-tight">फ़िल्टर करें</h2>
                            <span class="text-xs uppercase tracking-wider font-semibold text-gray-400 mt-0.5">Filter</span>
                        </div>
                        <a href="#" class="text-sm text-gold hover:text-navy transition font-medium flex flex-col items-end">
                            <span class="text-xs font-bold">रीसेट करें</span>
                            <span class="text-[10px] uppercase">Reset</span>
                        </a>
                    </div>

                    <form action="#" method="GET">
                        <!-- 1. City Search -->
                        <div class="mb-6">
                            <div class="flex flex-col mb-2">
                                <label class="text-sm font-bold text-navy leading-tight">शहर खोजें</label>
                                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">City</span>
                            </div>
                            <div class="relative mb-3">
                                <input type="text" placeholder="Search city..." class="w-full bg-gray-50 border border-gray-200 rounded-lg pl-10 pr-4 py-2.5 text-sm min-h-[48px] focus:ring-gold focus:border-gold transition">
                                <svg class="w-4 h-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <!-- Popular City Pills -->
                            <div class="flex flex-wrap gap-2">
                                @php
                                    $cities = [
                                        ['hi'=>'दिल्ली', 'en'=>'Delhi'], ['hi'=>'मुंबई', 'en'=>'Mumbai'], 
                                        ['hi'=>'जयपुर', 'en'=>'Jaipur'], ['hi'=>'लखनऊ', 'en'=>'Lucknow'], 
                                        ['hi'=>'पटना', 'en'=>'Patna'], ['hi'=>'सूरत', 'en'=>'Surat'], 
                                        ['hi'=>'भोपाल', 'en'=>'Bhopal'], ['hi'=>'इंदौर', 'en'=>'Indore'], 
                                        ['hi'=>'वाराणसी', 'en'=>'Varanasi']
                                    ];
                                @endphp
                                @foreach($cities as $city)
                                    <button type="button" class="flex flex-col items-center justify-center min-h-[48px] px-3 rounded-md border border-gray-200 bg-white text-gray-600 hover:border-gold hover:text-gold hover:-translate-y-0.5 transition-all shadow-sm">
                                        <span class="text-xs font-bold">{{ $city['hi'] }}</span>
                                        <span class="text-[10px]">{{ $city['en'] }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- 2. Legal Category -->
                        <div class="mb-6">
                            <div class="flex flex-col mb-3">
                                <label class="text-sm font-bold text-navy leading-tight">श्रेणी</label>
                                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Category</span>
                            </div>
                            <div class="space-y-2 max-h-48 overflow-y-auto pr-2">
                                @php
                                    $categories = [
                                        ['hi'=>'जीएसटी और टैक्स', 'en'=>'GST & Tax'],
                                        ['hi'=>'संपत्ति', 'en'=>'Property'],
                                        ['hi'=>'आपराधिक', 'en'=>'Criminal'],
                                        ['hi'=>'श्रम', 'en'=>'Labour'],
                                        ['hi'=>'पारिवारिक', 'en'=>'Family'],
                                        ['hi'=>'उपभोक्ता', 'en'=>'Consumer'],
                                        ['hi'=>'ट्रेडमार्क', 'en'=>'Trademark'],
                                        ['hi'=>'कंपनी कानून', 'en'=>'Company Law'],
                                        ['hi'=>'सिविल', 'en'=>'Civil'],
                                        ['hi'=>'साइबर अपराध', 'en'=>'Cyber Crime']
                                    ];
                                @endphp
                                @foreach($categories as $index => $cat)
                                    <label class="flex items-start group cursor-pointer p-1 rounded hover:bg-gray-50 transition">
                                        <input type="checkbox" class="w-4 h-4 mt-1 text-gold bg-gray-50 border-gray-300 rounded focus:ring-gold focus:ring-2 cursor-pointer transition">
                                        <div class="ml-2 flex flex-col group-hover:text-navy transition">
                                            <span class="text-sm font-bold text-gray-700 leading-tight">{{ $cat['hi'] }}</span>
                                            <span class="text-[10px] text-gray-500 uppercase">{{ $cat['en'] }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- 3. Budget Slider -->
                        <div class="mb-6" x-data="{ budget: 5000 }">
                            <div class="flex justify-between items-center mb-3">
                                <div class="flex flex-col">
                                    <label class="text-sm font-bold text-navy leading-tight">बजट</label>
                                    <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Budget</span>
                                </div>
                                <span class="text-xs font-bold text-gold bg-gold/10 px-2 py-1 rounded" x-text="'₹299 - ₹' + budget"></span>
                            </div>
                            <input type="range" min="299" max="5000" step="100" x-model="budget" class="w-full h-1.5 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-gold">
                        </div>

                        <!-- 4. Consultation Type -->
                        <div class="mb-6">
                            <div class="flex flex-col mb-3">
                                <label class="text-sm font-bold text-navy leading-tight">परामर्श का प्रकार</label>
                                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Type</span>
                            </div>
                            <div class="space-y-2">
                                @php
                                    $types = [
                                        ['hi'=>'वीडियो कॉल', 'en'=>'Video Call'],
                                        ['hi'=>'फ़ोन कॉल', 'en'=>'Phone Call'],
                                        ['hi'=>'व्यक्तिगत', 'en'=>'In-Person']
                                    ];
                                @endphp
                                @foreach($types as $type)
                                    <label class="flex items-start group cursor-pointer p-1 rounded hover:bg-gray-50 transition">
                                        <input type="checkbox" class="w-4 h-4 mt-1 text-gold bg-gray-50 border-gray-300 rounded focus:ring-gold focus:ring-2 cursor-pointer">
                                        <div class="ml-2 flex flex-col group-hover:text-navy transition">
                                            <span class="text-sm font-bold text-gray-700 leading-tight">{{ $type['hi'] }}</span>
                                            <span class="text-[10px] text-gray-500 uppercase">{{ $type['en'] }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- 5. Language -->
                        <div class="mb-6">
                            <div class="flex flex-col mb-3">
                                <label class="text-sm font-bold text-navy leading-tight">भाषा</label>
                                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Language</span>
                            </div>
                            <div class="space-y-2">
                                @php
                                    $langs = [
                                        ['hi'=>'हिंदी', 'en'=>'Hindi'],
                                        ['hi'=>'अंग्रेज़ी', 'en'=>'English'],
                                        ['hi'=>'गुजराती', 'en'=>'Gujarati'],
                                        ['hi'=>'मराठी', 'en'=>'Marathi'],
                                        ['hi'=>'पंजाबी', 'en'=>'Punjabi'],
                                        ['hi'=>'बंगाली', 'en'=>'Bengali']
                                    ];
                                @endphp
                                @foreach($langs as $lang)
                                    <label class="flex items-start group cursor-pointer p-1 rounded hover:bg-gray-50 transition">
                                        <input type="checkbox" class="w-4 h-4 mt-1 text-gold bg-gray-50 border-gray-300 rounded focus:ring-gold focus:ring-2 cursor-pointer">
                                        <div class="ml-2 flex flex-col group-hover:text-navy transition">
                                            <span class="text-sm font-bold text-gray-700 leading-tight">{{ $lang['hi'] }}</span>
                                            <span class="text-[10px] text-gray-500 uppercase">{{ $lang['en'] }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- 6. Experience -->
                        <div class="mb-6">
                            <div class="flex flex-col mb-3">
                                <label class="text-sm font-bold text-navy leading-tight">अनुभव</label>
                                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Experience</span>
                            </div>
                            <div class="space-y-2">
                                @php
                                    $exps = [
                                        ['hi'=>'0-5 वर्ष', 'en'=>'0-5 yr'],
                                        ['hi'=>'5-10 वर्ष', 'en'=>'5-10 yr'],
                                        ['hi'=>'10+ वर्ष', 'en'=>'10+ yr']
                                    ];
                                @endphp
                                @foreach($exps as $exp)
                                    <label class="flex items-start group cursor-pointer p-1 rounded hover:bg-gray-50 transition">
                                        <input type="checkbox" class="w-4 h-4 mt-1 text-gold bg-gray-50 border-gray-300 rounded focus:ring-gold focus:ring-2 cursor-pointer">
                                        <div class="ml-2 flex flex-col group-hover:text-navy transition">
                                            <span class="text-sm font-bold text-gray-700 leading-tight">{{ $exp['hi'] }}</span>
                                            <span class="text-[10px] text-gray-500 uppercase">{{ $exp['en'] }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- 7. Rating -->
                        <div class="mb-8">
                            <div class="flex flex-col mb-3">
                                <label class="text-sm font-bold text-navy leading-tight">रेटिंग</label>
                                <span class="text-[10px] uppercase tracking-wider text-gray-400 font-semibold">Rating</span>
                            </div>
                            <div class="space-y-2">
                                @php
                                    $ratings = [
                                        ['hi'=>'4★ और अधिक', 'en'=>'4★ & above'],
                                        ['hi'=>'4.5★ और अधिक', 'en'=>'4.5★ & above'],
                                        ['hi'=>'केवल 5★', 'en'=>'5★ only']
                                    ];
                                @endphp
                                @foreach($ratings as $rating)
                                    <label class="flex items-start group cursor-pointer p-1 rounded hover:bg-gray-50 transition">
                                        <input type="radio" name="rating" class="w-4 h-4 mt-1 text-gold bg-gray-50 border-gray-300 focus:ring-gold focus:ring-2 cursor-pointer">
                                        <div class="ml-2 flex flex-col group-hover:text-navy transition">
                                            <span class="text-sm font-bold text-gray-700 leading-tight">{{ $rating['hi'] }}</span>
                                            <span class="text-[10px] text-gray-500 uppercase">{{ $rating['en'] }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Apply Button -->
                        <button type="button" class="w-full bg-gold text-navy hover:bg-gold-light min-h-[48px] rounded-lg font-bold transition-all duration-300 shadow-md hover:shadow-lg flex flex-col items-center justify-center leading-tight hover:-translate-y-0.5">
                            <span class="text-[15px]">फ़िल्टर लागू करें</span>
                            <span class="text-[10px] uppercase tracking-wider mt-0.5">Filter Apply</span>
                        </button>
                    </form>
                </div>
            </aside>

            <!-- RIGHT RESULTS AREA -->
            <div class="flex-1">
                
                <!-- Top Bar -->
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 mb-6 flex flex-col sm:flex-row justify-between items-center gap-4 hover:-translate-y-1 transition-transform">
                    <div class="flex flex-col">
                        <h1 class="text-xl font-bold text-navy leading-tight">234 वकील मिले</h1>
                        <span class="text-[11px] uppercase tracking-wider font-semibold text-gray-500 mt-0.5">234 Lawyers Found</span>
                    </div>

                    <div class="flex items-center w-full sm:w-auto">
                        <div class="flex flex-col mr-3 hidden sm:flex text-right">
                            <span class="text-sm font-bold text-navy">क्रमबद्ध करें</span>
                            <span class="text-[10px] uppercase text-gray-500">Sort By</span>
                        </div>
                        <select class="bg-gray-50 border border-gray-200 text-sm font-bold text-navy rounded-lg focus:ring-gold focus:border-gold block w-full sm:w-60 min-h-[48px] p-2.5 cursor-pointer outline-none">
                            <option>रेटिंग (अधिक से कम) / Rating (High to Low)</option>
                            <option>अनुभव (अधिक से कम) / Experience (High to Low)</option>
                            <option>कीमत (कम से अधिक) / Price (Low to High)</option>
                            <option>कीमत (अधिक से कम) / Price (High to Low)</option>
                        </select>
                    </div>
                </div>

                <!-- Results List -->
                @if($lawyers->isEmpty())
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 flex flex-col items-center justify-center text-center hover:-translate-y-1 transition-transform">
                        <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-6 border border-gray-100 shadow-inner">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 10l2 2m0 0l2-2m-2 2v4"></path></svg>
                        </div>
                        <div class="flex flex-col items-center mb-6">
                            <h3 class="text-xl font-bold text-navy">कोई वकील नहीं मिला</h3>
                            <span class="text-xs uppercase text-gray-500 mt-1">No Lawyers Found</span>
                            <p class="text-gray-500 text-sm mt-3 max-w-sm">आपके फ़िल्टर से मेल खाने वाला कोई वकील नहीं मिला। कृपया अपने खोज मापदंड को समायोजित करने का प्रयास करें।</p>
                        </div>
                        <button class="bg-navy text-white px-8 min-h-[48px] rounded-lg font-bold hover:bg-navy-800 transition flex flex-col items-center justify-center hover:-translate-y-0.5 shadow-md">
                            <span class="text-sm">फ़िल्टर साफ़ करें</span>
                            <span class="text-[10px] uppercase">Clear Filters</span>
                        </button>
                    </div>
                @else
                    <div class="space-y-6">
                        @foreach($lawyers as $lawyer)
                            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 lg:p-6 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 group relative">
                                
                                <div class="flex flex-col sm:flex-row gap-6">
                                    <!-- Left: Photo & Badge -->
                                    <div class="flex-shrink-0 flex flex-col items-center sm:w-28">
                                        <div class="relative mb-3 group-hover:scale-105 transition-transform">
                                            <img src="{{ $lawyer->image }}" alt="{{ $lawyer->name }}" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full object-cover border-4 border-white shadow-md">
                                        </div>
                                        
                                        @if($lawyer->verified)
                                            <div class="bg-green-50 text-green-700 px-2 py-1.5 rounded-md flex flex-col items-center border border-green-200 w-full justify-center shadow-sm">
                                                <div class="flex items-center text-[11px] font-bold">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                    सत्यापित
                                                </div>
                                                <span class="text-[9px] uppercase font-bold text-green-600">Verified</span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Middle: Details -->
                                    <div class="flex-1">
                                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-4 h-full">
                                            <div class="flex-1">
                                                <h2 class="font-serif text-2xl font-bold text-navy mb-1 group-hover:text-gold transition-colors">{{ $lawyer->name }}</h2>
                                                <p class="text-sm font-semibold text-gray-500 mb-4">{{ $lawyer->designation }}</p>
                                                
                                                <div class="flex flex-wrap items-center gap-3 text-xs mb-4">
                                                    <!-- City Pill -->
                                                    <span class="inline-flex items-center px-3 py-1.5 rounded bg-navy text-white shadow-sm flex-col justify-center">
                                                        <span class="font-bold">{{ $lawyer->city }}</span>
                                                        <span class="text-[9px] uppercase tracking-wider text-gray-300">City</span>
                                                    </span>
                                                    <!-- Experience text -->
                                                    <span class="inline-flex items-center px-3 py-1.5 rounded bg-gray-50 border border-gray-100 flex-col justify-center text-navy shadow-sm">
                                                        <span class="font-bold">{{ $lawyer->experience }} साल</span>
                                                        <span class="text-[9px] uppercase tracking-wider text-gray-500">Experience</span>
                                                    </span>
                                                </div>

                                                <!-- Specializations -->
                                                <div class="mb-4">
                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach($lawyer->specializations as $spec)
                                                            <span class="px-3 py-1.5 rounded-md border border-gold text-gold bg-gold/5 shadow-sm flex flex-col items-center">
                                                                <span class="text-xs font-bold leading-tight">{{ $spec }}</span>
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>

                                                <!-- Ratings, Reviews & Languages -->
                                                <div class="flex flex-wrap items-center text-sm gap-y-2 mt-auto">
                                                    <div class="flex flex-col mr-4 bg-gray-50 px-2 py-1 rounded border border-gray-100 items-center">
                                                        <div class="flex items-center text-gold">
                                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                                            <span class="font-bold ml-1 text-navy">{{ $lawyer->rating }}</span>
                                                        </div>
                                                        <span class="text-[9px] uppercase font-bold text-gray-500">{{ $lawyer->reviews }} Reviews</span>
                                                    </div>
                                                    
                                                    <div class="flex flex-col mr-4 bg-gray-50 px-2 py-1 rounded border border-gray-100 items-center">
                                                        <span class="font-bold text-navy">{{ $lawyer->cases }}+</span>
                                                        <span class="text-[9px] uppercase font-bold text-gray-500">Cases</span>
                                                    </div>

                                                    <div class="flex flex-col bg-gray-50 px-2 py-1 rounded border border-gray-100 items-center">
                                                        <span class="font-bold text-navy text-xs">{{ implode(' • ', $lawyer->languages) }}</span>
                                                        <span class="text-[9px] uppercase font-bold text-gray-500">Languages</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Right Column (Inside Card): Fee & CTAs -->
                                            <div class="flex flex-col sm:flex-row lg:flex-col items-center sm:items-end justify-between lg:justify-start w-full lg:w-[200px] flex-shrink-0 gap-4 mt-4 lg:mt-0 lg:pl-6 lg:border-l lg:border-gray-100 h-full">
                                                <div class="text-center sm:text-right w-full flex flex-col items-center lg:items-end bg-gray-50 p-3 rounded-lg border border-gray-100">
                                                    <div class="flex flex-col items-center lg:items-end w-full">
                                                        <span class="text-[12px] font-bold text-navy">परामर्श शुल्क</span>
                                                        <p class="text-[9px] uppercase font-bold text-gray-400 mb-1">Consultation Fee</p>
                                                    </div>
                                                    <div class="text-2xl font-bold text-navy">₹{{ $lawyer->fee }}</div>
                                                    <div class="flex flex-col items-center lg:items-end mt-0.5">
                                                        <div class="text-xs text-gray-500 font-bold">/ 30 मिनट</div>
                                                        <div class="text-[9px] uppercase text-gray-400">per 30 mins</div>
                                                    </div>
                                                </div>

                                                <div class="flex flex-col w-full gap-2 mt-auto">
                                                    <button class="w-full min-h-[48px] bg-navy text-white rounded-lg flex flex-col items-center justify-center transition hover:bg-navy-800 hover:-translate-y-0.5 shadow-md">
                                                        <div class="flex items-center text-sm font-bold">
                                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                                            अभी कॉल करें
                                                        </div>
                                                        <span class="text-[10px] uppercase font-bold tracking-wider text-gray-300">Call Now</span>
                                                    </button>
                                                    
                                                    <a href="https://wa.me/918069029400" target="_blank" class="w-full min-h-[48px] bg-[#25D366] text-white rounded-lg flex flex-col items-center justify-center transition hover:bg-[#20b858] hover:-translate-y-0.5 shadow-md">
                                                        <div class="flex items-center text-sm font-bold">
                                                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                                                            व्हाट्सएप
                                                        </div>
                                                        <span class="text-[10px] uppercase font-bold tracking-wider">WhatsApp</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8 flex justify-center">
                        <nav class="inline-flex rounded-md shadow-sm hover:-translate-y-1 transition-transform" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 min-h-[48px]">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            </a>
                            <a href="#" class="relative inline-flex items-center justify-center px-4 py-2 border-y border-r border-gray-300 bg-gold text-white text-sm font-bold min-h-[48px] min-w-[48px] hover:bg-gold-light transition">1</a>
                            <a href="#" class="relative inline-flex items-center justify-center px-4 py-2 border-y border-r border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 min-h-[48px] min-w-[48px]">2</a>
                            <a href="#" class="relative inline-flex items-center justify-center px-4 py-2 border-y border-r border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 min-h-[48px] min-w-[48px] hidden sm:inline-flex">3</a>
                            <span class="relative inline-flex items-center justify-center px-4 py-2 border-y border-r border-gray-300 bg-gray-50 text-sm font-medium text-gray-700 min-h-[48px] min-w-[48px]">...</span>
                            <a href="#" class="relative inline-flex items-center justify-center px-4 py-2 border-y border-r border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 min-h-[48px] min-w-[48px]">12</a>
                            <a href="#" class="relative inline-flex items-center px-3 py-2 rounded-r-md border-y border-r border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 min-h-[48px]">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </nav>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
