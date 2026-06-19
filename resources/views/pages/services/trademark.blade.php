@extends('layouts.app')

@section('title', 'ट्रेडमार्क पंजीकरण | Trademark Registration - Foundida')

@section('content')
<!-- BREADCRUMB -->
<div class="bg-navy py-4 border-b border-navy-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="flex flex-col text-gray-300 hover:text-gold transition">
                        <span class="font-bold leading-tight">होम</span>
                        <span class="text-[10px] uppercase">Home</span>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <a href="#" class="flex flex-col text-gray-300 hover:text-gold transition ml-1 md:ml-2">
                            <span class="font-bold leading-tight">सेवाएं</span>
                            <span class="text-[10px] uppercase">Services</span>
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <div class="flex flex-col text-gold ml-1 md:ml-2">
                            <span class="font-bold leading-tight">ट्रेडमार्क पंजीकरण</span>
                            <span class="text-[10px] uppercase">Trademark Reg.</span>
                        </div>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- HERO SECTION -->
<div class="bg-navy relative overflow-hidden py-16 md:py-24">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col items-center justify-center text-center">
        <div class="flex flex-col mb-6">
            <h1 class="font-serif text-[36px] md:text-[56px] font-bold text-gold leading-tight">अपना ब्रांड सुरक्षित करें</h1>
            <p class="text-sm font-bold text-gray-300 uppercase tracking-widest mt-2">Protect Your Brand with Trademark Registration</p>
        </div>
        
        <div class="flex flex-wrap justify-center gap-4 mt-2">
            <div class="flex flex-col items-center bg-navy-800 border border-gold/30 px-5 py-2 rounded-full">
                <span class="text-white font-bold">₹2,999 में</span>
                <span class="text-[9px] text-gray-400 uppercase tracking-wider">Starting Price</span>
            </div>
            <div class="flex flex-col items-center bg-navy-800 border border-gold/30 px-5 py-2 rounded-full">
                <span class="text-white font-bold">45 दिन में फाइलिंग</span>
                <span class="text-[9px] text-gray-400 uppercase tracking-wider">Filing in 45 Days</span>
            </div>
            <div class="flex flex-col items-center bg-navy-800 border border-gold/30 px-5 py-2 rounded-full">
                <span class="text-white font-bold">विशेषज्ञ सहायता</span>
                <span class="text-[9px] text-gray-400 uppercase tracking-wider">Expert Help</span>
            </div>
        </div>
    </div>
</div>

<!-- TRADEMARK SEARCH TOOL -->
<div class="bg-gold py-12 relative z-20 shadow-lg border-y border-gold-dark" x-data="{ searchQuery: '', searching: false, searched: false, resultAvailable: false }">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="flex flex-col mb-6 text-navy">
            <h2 class="text-2xl md:text-3xl font-bold font-serif">अपना Brand Name / Logo खोजें</h2>
            <span class="text-xs uppercase font-bold tracking-widest mt-1 opacity-80">Search your Brand Name / Logo</span>
        </div>

        <form @submit.prevent="searching = true; searched = false; setTimeout(() => { searching = false; searched = true; resultAvailable = Math.random() > 0.5; }, 1500)" class="relative max-w-2xl mx-auto">
            <div class="relative flex items-center">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" x-model="searchQuery" required placeholder="Ex: Tata, Reliance, Apna Brand..." class="block w-full pl-12 pr-4 py-4 md:py-5 border-0 rounded-l-xl text-lg text-navy focus:ring-4 focus:ring-navy-200 outline-none shadow-inner min-h-[60px]">
                <button type="submit" class="bg-navy text-white hover:bg-navy-800 px-6 py-4 md:py-5 rounded-r-xl font-bold transition-colors shadow-lg min-h-[60px] flex flex-col justify-center items-center">
                    <span class="text-base whitespace-nowrap" x-show="!searching">खोजें</span>
                    <span class="text-[10px] uppercase tracking-wider" x-show="!searching">Search</span>
                    <span x-show="searching" class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-gold" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                        <span class="text-sm">...</span>
                    </span>
                </button>
            </div>
            <div class="mt-3 text-navy font-bold text-sm flex flex-col">
                <span>मुफ़्त खोज — तुरंत परिणाम</span>
                <span class="text-[10px] opacity-70 uppercase tracking-widest">Free Search — Instant Result</span>
            </div>

            <!-- Dummy Results UI -->
            <div x-show="searched" x-transition class="mt-8 bg-white p-6 rounded-xl shadow-2xl border-2 text-left" :class="resultAvailable ? 'border-green-500' : 'border-red-500'" style="display: none;">
                <div x-show="resultAvailable" class="flex items-start">
                    <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-600 mr-4 shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <div class="flex flex-col mb-2">
                            <h3 class="text-xl font-bold text-green-700">उपलब्ध है!</h3>
                            <span class="text-xs uppercase font-bold text-green-600/70">Available</span>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-navy font-medium text-sm mb-1">बधाई हो! "<span x-text="searchQuery" class="font-bold"></span>" नाम संभवतः पंजीकृत करने के लिए उपलब्ध है।</p>
                            <p class="text-gray-500 text-xs">Congratulations! The name "<span x-text="searchQuery" class="font-bold"></span>" is likely available for registration.</p>
                        </div>
                    </div>
                </div>

                <div x-show="!resultAvailable" class="flex items-start">
                    <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center text-red-600 mr-4 shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <div>
                        <div class="flex flex-col mb-2">
                            <h3 class="text-xl font-bold text-red-700">समान नाम मौजूद है</h3>
                            <span class="text-xs uppercase font-bold text-red-600/70">Similar Exists</span>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-navy font-medium text-sm mb-1">सावधान! "<span x-text="searchQuery" class="font-bold"></span>" से मिलता-जुलता नाम पहले से पंजीकृत हो सकता है। हमारे विशेषज्ञ से सलाह लें।</p>
                            <p class="text-gray-500 text-xs">Caution! A name similar to "<span x-text="searchQuery" class="font-bold"></span>" might already be registered. Consult our experts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- SERVICE PACKAGES -->
<div class="bg-offwhite py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">हमारे पैकेजेस</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-wider">Service Packages</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($packages as $pkg)
            <div class="bg-white rounded-2xl shadow-sm border {{ isset($pkg['highlight']) && $pkg['highlight'] ? 'border-2 border-gold shadow-xl relative md:-my-4 z-10' : 'border-gray-200' }} p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                
                @if(isset($pkg['highlight']) && $pkg['highlight'])
                <div class="absolute -top-4 inset-x-0 flex justify-center">
                    <div class="bg-gold text-navy px-4 py-1.5 rounded-full text-xs font-bold shadow border border-gold-light flex flex-col items-center">
                        <span>सबसे लोकप्रिय</span>
                        <span class="text-[8px] uppercase tracking-widest">Most Popular</span>
                    </div>
                </div>
                @endif

                <div class="flex flex-col mb-6 pb-6 border-b border-gray-100 {{ isset($pkg['highlight']) && $pkg['highlight'] ? 'mt-2' : '' }}">
                    <h3 class="text-2xl font-bold text-navy mb-1">{{ $pkg['name_hi'] }}</h3>
                    <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">{{ $pkg['name_en'] }}</span>
                    
                    <div class="mt-6 flex flex-col">
                        <span class="text-[10px] uppercase font-bold text-gray-400 mb-1">शुल्क / Fee</span>
                        <div class="flex items-baseline {{ isset($pkg['highlight']) && $pkg['highlight'] ? 'text-gold' : 'text-navy' }}">
                            <span class="text-4xl font-extrabold">{{ $pkg['price'] }}</span>
                            @if(isset($pkg['price_text']) || isset($pkg['price_text_en']))
                            <div class="flex flex-col ml-2">
                                @if(isset($pkg['price_text']))
                                <span class="text-sm font-bold">{{ $pkg['price_text'] }}</span>
                                @endif
                                @if(isset($pkg['price_text_en']))
                                <span class="text-[10px] uppercase font-bold tracking-wider">{{ $pkg['price_text_en'] }}</span>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <ul class="space-y-4 mb-8 flex-grow">
                    @foreach($pkg['features_hi'] as $index => $feature_hi)
                    <li class="flex items-start">
                        <svg class="w-5 h-5 {{ isset($pkg['highlight']) && $pkg['highlight'] ? 'text-gold' : 'text-green-500' }} mr-3 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">{{ $feature_hi }}</span>
                            <span class="text-[10px] text-gray-500">{{ $pkg['features_en'][$index] }}</span>
                        </div>
                    </li>
                    @endforeach
                </ul>
                
                @if(isset($pkg['highlight']) && $pkg['highlight'])
                <button class="w-full bg-gold text-navy hover:bg-gold-light min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md flex flex-col items-center justify-center">
                    <span class="text-[16px] font-extrabold">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-widest mt-0.5">Get Started</span>
                </button>
                @else
                <button class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center">
                    <span class="text-[15px]">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-wider mt-0.5">Get Started</span>
                </button>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- WHY TRADEMARK? -->
<div class="bg-navy py-20 text-white border-t border-navy-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-white mb-2 font-serif">ट्रेडमार्क क्यों जरूरी है?</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-wider">Why Trademark is Essential?</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($benefits as $benefit)
            <div class="flex flex-col items-center text-center p-6 bg-navy-800 rounded-2xl border border-navy-600 hover:-translate-y-1 transition-transform hover:border-gold group">
                <div class="w-16 h-16 bg-navy rounded-full flex items-center justify-center mb-6 shadow-inner border border-navy-600 group-hover:border-gold transition-colors">
                    @if($benefit['icon'] == 'shield-check')
                        <svg class="w-8 h-8 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    @elseif($benefit['icon'] == 'scale')
                        <svg class="w-8 h-8 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    @elseif($benefit['icon'] == 'trending-up')
                        <svg class="w-8 h-8 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    @else
                        <svg class="w-8 h-8 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    @endif
                </div>
                <div class="flex flex-col mb-3">
                    <span class="font-bold text-lg mb-0.5">{{ $benefit['title_hi'] }}</span>
                    <span class="text-[10px] text-gray-400 uppercase tracking-widest">{{ $benefit['title_en'] }}</span>
                </div>
                <div class="flex flex-col text-sm text-gray-300 bg-navy/50 p-3 rounded-xl border border-navy-600">
                    <span class="mb-1">{{ $benefit['desc_hi'] }}</span>
                    <span class="text-[10px] opacity-70">{{ $benefit['desc_en'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- TRADEMARK PROCESS TIMELINE -->
<div class="bg-white py-20 border-t border-gray-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">ट्रेडमार्क पंजीकरण प्रक्रिया</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-wider">Trademark Registration Process</p>
        </div>

        <div class="relative">
            <!-- Desktop Line -->
            <div class="hidden md:block absolute top-1/2 left-[5%] right-[5%] h-1 bg-gray-100 -translate-y-1/2"></div>
            
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 gap-y-12 relative z-10">
                @foreach($timeline as $index => $step)
                    @if($index < 5)
                    <div class="flex flex-col items-center text-center group hover:-translate-y-1 transition-transform relative">
                        <div class="w-12 h-12 rounded-full bg-navy text-gold flex items-center justify-center font-bold text-xl mb-4 shadow-lg border-4 border-white">{{ $index + 1 }}</div>
                        <div class="flex flex-col items-center text-navy w-full px-2">
                            <span class="font-bold text-sm leading-tight mb-1">{{ $step['step_hi'] }}</span>
                            <span class="text-[9px] uppercase font-bold text-gray-400 mb-2 leading-tight">{{ $step['step_en'] }}</span>
                            <div class="bg-gold/10 text-gold border border-gold/20 px-2 py-0.5 rounded flex flex-col items-center">
                                <span class="text-[10px] font-bold leading-tight">{{ $step['time_hi'] }}</span>
                                <span class="text-[8px] uppercase tracking-wider">{{ $step['time_en'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>

            <!-- Desktop Line 2 -->
            <div class="hidden md:block absolute top-[150%] left-[10%] right-[10%] h-1 bg-gray-100 -translate-y-1/2 mt-8"></div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 gap-y-12 relative z-10 mt-12 md:mt-24 justify-center">
                @foreach($timeline as $index => $step)
                    @if($index >= 5)
                    <div class="flex flex-col items-center text-center group hover:-translate-y-1 transition-transform relative">
                        <div class="w-12 h-12 rounded-full bg-navy text-gold flex items-center justify-center font-bold text-xl mb-4 shadow-lg border-4 border-white">{{ $index + 1 }}</div>
                        <div class="flex flex-col items-center text-navy w-full px-2">
                            <span class="font-bold text-sm leading-tight mb-1">{{ $step['step_hi'] }}</span>
                            <span class="text-[9px] uppercase font-bold text-gray-400 mb-2 leading-tight">{{ $step['step_en'] }}</span>
                            <div class="bg-gold/10 text-gold border border-gold/20 px-2 py-0.5 rounded flex flex-col items-center">
                                <span class="text-[10px] font-bold leading-tight">{{ $step['time_hi'] }}</span>
                                <span class="text-[8px] uppercase tracking-wider">{{ $step['time_en'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- CLASSES ACCORDION -->
<div class="bg-offwhite py-20 border-t border-gray-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">प्रमुख ट्रेडमार्क श्रेणियां (क्लासेस)</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-wider mb-6">Popular Trademark Classes</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($classes as $class)
            <div class="bg-white border {{ $class['popular'] ? 'border-gold shadow-md' : 'border-gray-200' }} rounded-xl overflow-hidden hover:-translate-y-1 transition-transform duration-300 relative group">
                @if($class['popular'])
                <div class="absolute top-0 right-0 bg-gold text-navy px-3 py-1 rounded-bl-xl shadow-sm flex flex-col items-center">
                    <span class="text-[10px] font-bold leading-tight">लोकप्रिय</span>
                    <span class="text-[8px] uppercase tracking-widest font-bold">Popular</span>
                </div>
                @endif
                
                <div class="p-5 min-h-[48px]">
                    <div class="flex flex-col text-left mb-3">
                        <span class="font-bold text-navy text-[16px] leading-tight mb-0.5">{{ $class['title_hi'] }}</span>
                        <span class="text-[11px] uppercase text-gray-500 font-bold tracking-wider">{{ $class['title_en'] }}</span>
                    </div>
                    <div class="flex flex-col bg-gray-50 p-3 rounded-lg border border-gray-100">
                        <span class="text-sm font-semibold text-gray-700 leading-tight mb-1">{{ $class['desc_hi'] }}</span>
                        <span class="text-[10px] text-gray-500 leading-tight">{{ $class['desc_en'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-8 text-center">
            <button class="inline-flex flex-col items-center justify-center border border-gray-300 text-gray-600 hover:border-gold hover:text-gold bg-white px-8 min-h-[48px] rounded-lg font-bold transition-all duration-300 hover:-translate-y-1 shadow-sm">
                <span class="text-[15px]">सभी 45 श्रेणियां देखें</span>
                <span class="text-[10px] uppercase tracking-wider mt-0.5">View all 45 classes</span>
            </button>
        </div>
    </div>
</div>
@endsection
