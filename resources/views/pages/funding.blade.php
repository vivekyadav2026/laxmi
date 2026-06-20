@extends('layouts.app')

@section('title', 'Funding & Mentorship | Foundida')

@section('content')
<!-- HERO SECTION -->
<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                <i class="fas fa-rocket mr-1"></i> FUNDING & MENTORSHIP
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[56px] font-bold text-white leading-tight mb-4">
            Unlock <span class="text-[#f5a623]">Growth & Funding</span><br />for Your Startup
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed max-w-[650px] mx-auto">
            Connect directly with Venture Capitalists, get help with Government Grants, secure Business Loans, and receive expert Mentorship to scale your business.
        </p>
    </div>
</x-inner-hero>

<!-- FEATURES GRID -->
<div class="bg-gray-50 py-20 relative z-20 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-[#0B1F3A] mb-2 font-serif">क्या-क्या मिलेगा?</h2>
            <p class="text-sm font-bold text-[#D4A843] uppercase tracking-wider">What's Included in the Subscription</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300 hover:shadow-lg">
                <div class="w-14 h-14 bg-[#0B1F3A]/5 rounded-xl flex items-center justify-center mb-6 text-[#0B1F3A]">
                    <i class="fas fa-handshake text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#0B1F3A] mb-2">VC Connections</h3>
                <p class="text-gray-500 text-sm mb-2">हम आपको एंजेल इन्वेस्टर्स और वेंचर कैपिटलिस्ट्स से सीधे कनेक्ट करेंगे।</p>
                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mt-auto">Direct Introductions</span>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300 hover:shadow-lg">
                <div class="w-14 h-14 bg-[#0B1F3A]/5 rounded-xl flex items-center justify-center mb-6 text-[#0B1F3A]">
                    <i class="fas fa-file-invoice-dollar text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#0B1F3A] mb-2">Govt. Grants</h3>
                <p class="text-gray-500 text-sm mb-2">स्टार्टअप इंडिया, मुद्रा लोन और अन्य सरकारी योजनाओं का लाभ उठाने में मदद।</p>
                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mt-auto">Subsidy & Grants</span>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300 hover:shadow-lg">
                <div class="w-14 h-14 bg-[#0B1F3A]/5 rounded-xl flex items-center justify-center mb-6 text-[#0B1F3A]">
                    <i class="fas fa-bank text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#0B1F3A] mb-2">Business Loans</h3>
                <p class="text-gray-500 text-sm mb-2">आसान शर्तों पर बिना किसी झंझट के बैंक से बिज़नेस लोन प्राप्त करें।</p>
                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mt-auto">Credit Assistance</span>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300 hover:shadow-lg">
                <div class="w-14 h-14 bg-[#0B1F3A]/5 rounded-xl flex items-center justify-center mb-6 text-[#0B1F3A]">
                    <i class="fas fa-chalkboard-teacher text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-[#0B1F3A] mb-2">Mentorship</h3>
                <p class="text-gray-500 text-sm mb-2">पिच डेक तैयार करने और बिज़नेस मॉडल बनाने में विशेषज्ञों की सलाह।</p>
                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mt-auto">Pitch Deck Prep</span>
            </div>
        </div>
    </div>
</div>

<!-- PRICING SECTION -->
<div class="bg-white py-20 relative z-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-[#0B1F3A] mb-2 font-serif">फंडिंग सब्सक्रिप्शन प्लान</h2>
            <p class="text-sm font-bold text-[#D4A843] uppercase tracking-wider">Choose Your Plan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            <!-- Monthly -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:border-[#D4A843] transition-colors relative">
                <h3 class="text-2xl font-bold text-[#0B1F3A] mb-1">Monthly Plan</h3>
                <p class="text-[12px] text-gray-500 font-bold uppercase tracking-wider mb-6">Flexibility to Grow</p>
                <div class="flex items-end mb-6">
                    <span class="text-4xl font-extrabold text-[#0B1F3A]">₹999</span>
                    <span class="text-gray-500 mb-1 ml-1">/ month</span>
                </div>
                <ul class="space-y-4 mb-8 flex-grow">
                    <li class="flex items-start"><i class="fas fa-check text-[#D4A843] mt-1 mr-3"></i><span class="text-sm text-gray-700">1 Monthly Mentorship Call</span></li>
                    <li class="flex items-start"><i class="fas fa-check text-[#D4A843] mt-1 mr-3"></i><span class="text-sm text-gray-700">Basic Pitch Deck Review</span></li>
                    <li class="flex items-start"><i class="fas fa-check text-[#D4A843] mt-1 mr-3"></i><span class="text-sm text-gray-700">Loan Application Support</span></li>
                    <li class="flex items-start"><i class="fas fa-times text-gray-300 mt-1 mr-3"></i><span class="text-sm text-gray-400">Direct VC Intros (Yearly Only)</span></li>
                </ul>
                <button class="w-full border-2 border-[#0B1F3A] text-[#0B1F3A] hover:bg-[#0B1F3A] hover:text-white py-3 rounded-xl font-bold transition-colors">Select Monthly</button>
            </div>

            <!-- Yearly -->
            <div class="bg-[#0B1F3A] rounded-2xl shadow-xl border-2 border-[#D4A843] p-8 flex flex-col relative transform md:-translate-y-4">
                <div class="absolute top-0 right-8 transform -translate-y-1/2">
                    <span class="bg-[#D4A843] text-[#0B1F3A] text-[10px] font-extrabold uppercase tracking-widest px-3 py-1 rounded-full">Most Popular</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">Yearly Plan</h3>
                <p class="text-[12px] text-[#D4A843] font-bold uppercase tracking-wider mb-6">Complete Funding Engine</p>
                <div class="flex items-end mb-6">
                    <span class="text-4xl font-extrabold text-white">₹9,999</span>
                    <span class="text-gray-400 mb-1 ml-1">/ year</span>
                </div>
                <ul class="space-y-4 mb-8 flex-grow">
                    <li class="flex items-start"><i class="fas fa-check text-[#D4A843] mt-1 mr-3"></i><span class="text-sm text-gray-300">Unlimited Mentorship Calls</span></li>
                    <li class="flex items-start"><i class="fas fa-check text-[#D4A843] mt-1 mr-3"></i><span class="text-sm text-gray-300">Complete Pitch Deck Design</span></li>
                    <li class="flex items-start"><i class="fas fa-check text-[#D4A843] mt-1 mr-3"></i><span class="text-sm text-gray-300">Grant & Loan Priority Processing</span></li>
                    <li class="flex items-start"><i class="fas fa-check text-[#D4A843] mt-1 mr-3"></i><span class="text-sm text-white font-bold">Guaranteed Direct VC Intros</span></li>
                </ul>
                <button class="w-full bg-[#D4A843] text-[#0B1F3A] hover:bg-[#c09435] py-3 rounded-xl font-bold transition-colors">Select Yearly (Save 16%)</button>
            </div>
        </div>
    </div>
</div>
@endsection
