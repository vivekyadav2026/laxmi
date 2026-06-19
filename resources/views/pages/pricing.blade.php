@extends('layouts.app')

@section('title', 'कीमत | Pricing - Foundida')

@section('content')
<!-- HERO SECTION -->
<div class="bg-navy relative overflow-hidden py-16 md:py-24">
    <!-- Subtle Pattern -->
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col items-center justify-center text-center">
        <div class="flex flex-col mb-4">
            <h1 class="font-serif text-[36px] md:text-[48px] font-bold text-gold leading-tight">पारदर्शी कीमत, कोई छुपा शुल्क नहीं</h1>
            <p class="text-sm font-bold text-gray-300 uppercase tracking-widest mt-2">Transparent Pricing — No Hidden Charges</p>
        </div>
        <p class="text-gray-400 text-sm md:text-base max-w-2xl mt-4">
            हम छोटे व्यवसायों के लिए उच्च गुणवत्ता वाली कानूनी सेवाएं वहनीय कीमतों पर प्रदान करते हैं। केवल उसी के लिए भुगतान करें जिसकी आपको आवश्यकता है।
        </p>
    </div>
</div>

<!-- PRICING SECTION -->
<div class="bg-offwhite py-16 -mt-8 relative z-20" x-data="{ billing: 'one-time' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Toggle -->
        <div class="flex justify-center mb-12">
            <div class="bg-white p-1.5 rounded-xl border border-gray-200 shadow-sm inline-flex relative">
                <button @click="billing = 'monthly'" 
                        :class="billing === 'monthly' ? 'bg-navy text-white shadow' : 'text-gray-600 hover:text-navy'"
                        class="flex flex-col items-center justify-center px-6 min-h-[48px] rounded-lg transition-all duration-300 relative z-10 min-w-[140px]">
                    <span class="text-sm font-bold">मासिक</span>
                    <span class="text-[10px] uppercase tracking-wider" :class="billing === 'monthly' ? 'text-gray-300' : 'text-gray-400'">Monthly</span>
                </button>
                <button @click="billing = 'one-time'" 
                        :class="billing === 'one-time' ? 'bg-navy text-white shadow' : 'text-gray-600 hover:text-navy'"
                        class="flex flex-col items-center justify-center px-6 min-h-[48px] rounded-lg transition-all duration-300 relative z-10 min-w-[140px]">
                    <span class="text-sm font-bold">एकमुश्त</span>
                    <span class="text-[10px] uppercase tracking-wider" :class="billing === 'one-time' ? 'text-gray-300' : 'text-gray-400'">One-time</span>
                    
                    <!-- Discount Badge -->
                    <span class="absolute -top-3 -right-2 bg-green-100 text-green-700 text-[10px] font-bold px-2 py-0.5 rounded-full border border-green-200">
                        SAVE 20%
                    </span>
                </button>
            </div>
        </div>

        <!-- 3-TIER PRICING CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">
            
            <!-- BASIC CARD -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                <div class="flex flex-col mb-6 pb-6 border-b border-gray-100">
                    <h3 class="text-2xl font-bold text-navy mb-1">बेसिक</h3>
                    <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">Basic</span>
                    
                    <div class="mt-6 flex items-end">
                        <span class="text-4xl font-bold text-navy">₹<span x-text="billing === 'monthly' ? '599' : '499'"></span></span>
                        <div class="flex flex-col ml-2 mb-1">
                            <span class="text-xs text-gray-500 font-bold" x-show="billing === 'monthly'">/ महीना</span>
                            <span class="text-[9px] uppercase text-gray-400" x-show="billing === 'monthly'">/ month</span>
                        </div>
                    </div>
                </div>
                
                <ul class="space-y-4 mb-8 flex-grow">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">जीएसटी नोटिस उत्तर</span>
                            <span class="text-[10px] text-gray-500">GST Notice Reply</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">1 कानूनी दस्तावेज़ ड्राफ्ट</span>
                            <span class="text-[10px] text-gray-500">1 Legal Document Draft</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">ईमेल सहायता</span>
                            <span class="text-[10px] text-gray-500">Email Support</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">48 घंटे में डिलीवरी</span>
                            <span class="text-[10px] text-gray-500">48hr Delivery</span>
                        </div>
                    </li>
                </ul>
                
                <button class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center">
                    <span class="text-[15px]">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-wider mt-0.5">Get Started</span>
                </button>
            </div>

            <!-- STANDARD CARD (HIGHLIGHTED) -->
            <div class="bg-white rounded-2xl shadow-xl border-2 border-gold p-8 flex flex-col relative md:-my-4 hover:-translate-y-1 transition-transform duration-300 z-10">
                <!-- Highlight Badge -->
                <div class="absolute -top-4 inset-x-0 flex justify-center">
                    <div class="bg-gold text-navy px-4 py-1.5 rounded-full text-xs font-bold shadow-md border border-gold-light flex flex-col items-center leading-tight">
                        <span>सबसे लोकप्रिय</span>
                        <span class="text-[8px] uppercase tracking-widest">Most Popular</span>
                    </div>
                </div>

                <div class="flex flex-col mb-6 pb-6 border-b border-gray-100 mt-2">
                    <h3 class="text-2xl font-bold text-navy mb-1">स्टैंडर्ड</h3>
                    <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">Standard</span>
                    
                    <div class="mt-6 flex items-end">
                        <span class="text-4xl font-bold text-gold">₹<span x-text="billing === 'monthly' ? '1,799' : '1,499'"></span></span>
                        <div class="flex flex-col ml-2 mb-1">
                            <span class="text-xs text-gray-500 font-bold" x-show="billing === 'monthly'">/ महीना</span>
                            <span class="text-[9px] uppercase text-gray-400" x-show="billing === 'monthly'">/ month</span>
                        </div>
                    </div>
                </div>
                
                <ul class="space-y-4 mb-8 flex-grow">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-gold mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-navy font-bold text-sm">बेसिक की सभी सुविधाएं</span>
                            <span class="text-[10px] text-gray-500 uppercase">Everything in Basic</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-gold mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">वकील फ़ोन परामर्श (30 मिनट)</span>
                            <span class="text-[10px] text-gray-500">Lawyer Phone Consultation (30 min)</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-gold mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">3 दस्तावेज़ संशोधन</span>
                            <span class="text-[10px] text-gray-500">3 Document Revisions</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-gold mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">प्राथमिकता सहायता</span>
                            <span class="text-[10px] text-gray-500">Priority Support</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-gold mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">24 घंटे में डिलीवरी</span>
                            <span class="text-[10px] text-gray-500">24hr Delivery</span>
                        </div>
                    </li>
                </ul>
                
                <button class="w-full bg-gold text-navy hover:bg-gold-light min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md flex flex-col items-center justify-center">
                    <span class="text-[16px] font-extrabold">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-widest mt-0.5">Get Started</span>
                </button>
            </div>

            <!-- PREMIUM CARD -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                <div class="flex flex-col mb-6 pb-6 border-b border-gray-100">
                    <h3 class="text-2xl font-bold text-navy mb-1">प्रीमियम</h3>
                    <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">Premium</span>
                    
                    <div class="mt-6 flex items-end">
                        <span class="text-4xl font-bold text-navy">₹<span x-text="billing === 'monthly' ? '4,499' : '3,999'"></span></span>
                        <div class="flex flex-col ml-2 mb-1">
                            <span class="text-xs text-gray-500 font-bold" x-show="billing === 'monthly'">/ महीना</span>
                            <span class="text-[9px] uppercase text-gray-400" x-show="billing === 'monthly'">/ month</span>
                        </div>
                    </div>
                </div>
                
                <ul class="space-y-4 mb-8 flex-grow">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-navy font-bold text-sm">स्टैंडर्ड की सभी सुविधाएं</span>
                            <span class="text-[10px] text-gray-500 uppercase">Everything in Standard</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">समर्पित वकील नियुक्ति</span>
                            <span class="text-[10px] text-gray-500">Dedicated Lawyer Assignment</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">कोर्ट फाइलिंग सहायता</span>
                            <span class="text-[10px] text-gray-500">Court Filing Support</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">असीमित संशोधन</span>
                            <span class="text-[10px] text-gray-500">Unlimited Revisions</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-green-500 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <div class="flex flex-col">
                            <span class="text-gray-700 font-semibold text-sm">व्हाट्सएप प्राथमिकता सहायता</span>
                            <span class="text-[10px] text-gray-500">WhatsApp Priority Support</span>
                        </div>
                    </li>
                </ul>
                
                <button class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center">
                    <span class="text-[15px]">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-wider mt-0.5">Get Started</span>
                </button>
            </div>

        </div>
    </div>
</div>

<!-- MARKET COMPARISON TABLE -->
<div class="bg-white py-20 border-t border-gray-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">कीमत की तुलना</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-wider mb-6">Market Comparison</p>
        </div>

        <div class="overflow-x-auto bg-white rounded-2xl shadow-sm border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-navy text-white text-sm">
                        <th class="p-4 border-b border-navy-600 font-semibold">
                            <div class="flex flex-col">
                                <span class="text-base font-bold">सेवा</span>
                                <span class="text-[10px] uppercase font-normal text-gray-300">Service</span>
                            </div>
                        </th>
                        <th class="p-4 border-b border-navy-600 font-semibold">
                            <div class="flex flex-col">
                                <span class="text-base font-bold">बाज़ार दर</span>
                                <span class="text-[10px] uppercase font-normal text-gray-300">Market Rate</span>
                            </div>
                        </th>
                        <th class="p-4 border-b border-navy-600 font-semibold bg-gold text-navy">
                            <div class="flex flex-col">
                                <span class="text-base font-bold">हमारी कीमत</span>
                                <span class="text-[10px] uppercase font-bold text-navy/70">Our Price</span>
                            </div>
                        </th>
                        <th class="p-4 border-b border-navy-600 font-semibold text-right">
                            <div class="flex flex-col items-end">
                                <span class="text-base font-bold">आपकी बचत</span>
                                <span class="text-[10px] uppercase font-normal text-gray-300">You Save</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($comparisons as $comp)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4">
                            <div class="flex flex-col">
                                <span class="font-bold text-navy">{{ $comp['service_hi'] }}</span>
                                <span class="text-xs text-gray-500">{{ $comp['service_en'] }}</span>
                            </div>
                        </td>
                        <td class="p-4 text-gray-500 font-medium line-through decoration-red-300">₹{{ number_format($comp['market']) }}</td>
                        <td class="p-4 text-navy font-bold text-lg bg-gold/5">₹{{ number_format($comp['our']) }}</td>
                        <td class="p-4 text-right">
                            <span class="inline-flex flex-col items-center justify-center bg-green-50 text-green-700 px-3 py-1 rounded-md border border-green-200">
                                <span class="font-bold">₹{{ number_format($comp['market'] - $comp['our']) }}</span>
                                <span class="text-[9px] uppercase font-bold text-green-600">Saved</span>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- PAYMENT OPTIONS STRIP -->
<div class="bg-navy py-8 border-y border-navy-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center items-center gap-6 md:gap-12">
            <div class="flex flex-col items-center text-center text-white hover:-translate-y-1 transition-transform">
                <span class="font-bold text-sm tracking-wide">UPI</span>
                <span class="text-[10px] text-gray-400 uppercase">Google Pay, PhonePe</span>
            </div>
            <div class="hidden md:block w-px h-8 bg-gray-600"></div>
            
            <div class="flex flex-col items-center text-center text-white hover:-translate-y-1 transition-transform">
                <span class="font-bold text-sm tracking-wide">नेट बैंकिंग</span>
                <span class="text-[10px] text-gray-400 uppercase">Net Banking</span>
            </div>
            <div class="hidden md:block w-px h-8 bg-gray-600"></div>
            
            <div class="flex flex-col items-center text-center text-white hover:-translate-y-1 transition-transform">
                <span class="font-bold text-sm tracking-wide">क्रेडिट / डेबिट कार्ड</span>
                <span class="text-[10px] text-gray-400 uppercase">Credit / Debit Card</span>
            </div>
            <div class="hidden md:block w-px h-8 bg-gray-600"></div>
            
            <div class="flex flex-col items-center text-center text-white hover:-translate-y-1 transition-transform">
                <span class="font-bold text-sm tracking-wide">ईएमआई उपलब्ध</span>
                <span class="text-[10px] text-gray-400 uppercase">EMI Available</span>
            </div>
            <div class="hidden md:block w-px h-8 bg-gray-600"></div>
            
            <div class="flex flex-col items-center text-center text-white hover:-translate-y-1 transition-transform">
                <span class="font-bold text-sm tracking-wide">कैश ऑन डिलीवरी</span>
                <span class="text-[10px] text-gray-400 uppercase">COD (Select Cities)</span>
            </div>
        </div>
    </div>
</div>

<!-- FAQS SECTION -->
<div class="bg-offwhite py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">सामान्य प्रश्न</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-wider mb-6">Frequently Asked Questions</p>
        </div>

        <div class="space-y-4">
            @foreach($faqs as $index => $faq)
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center p-5 focus:outline-none min-h-[48px] hover:bg-gray-50 transition-colors">
                    <div class="flex flex-col text-left pr-4">
                        <span class="font-bold text-navy text-[15px] leading-tight mb-0.5" :class="{ 'text-gold': open }">{{ $faq['q_hi'] }}</span>
                        <span class="text-xs text-gray-500 font-medium">{{ $faq['q_en'] }}</span>
                    </div>
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-offwhite flex items-center justify-center border border-gray-100 transition-transform duration-300" :class="{ 'rotate-180 bg-gold text-white border-gold': open }">
                        <svg class="w-5 h-5 text-gray-500" :class="{ 'text-white': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </button>
                <div x-show="open" x-collapse x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" style="display: none;">
                    <div class="p-5 pt-0 border-t border-gray-50 bg-gray-50/50">
                        <div class="flex flex-col mt-4">
                            <p class="text-navy text-sm font-medium mb-2 leading-relaxed">{{ $faq['a_hi'] }}</p>
                            <p class="text-gray-500 text-xs leading-relaxed">{{ $faq['a_en'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
