@extends('layouts.app')

@section('title', 'Funding & Mentorship | Foundida')

@section('content')
<div x-data="{ modalOpen: false, selectedPlan: 'monthly' }">
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

<!-- STARTUP LIFECYCLE SECTION -->
<div class="bg-white py-16 relative z-20 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-[#0B1F3A] mb-2 font-serif">Startup Funding Lifecycle</h2>
            <p class="text-sm font-bold text-[#D4A843] uppercase tracking-wider">Stages of Growth</p>
        </div>
        
        <div class="flex flex-wrap justify-center items-center gap-2 md:gap-4 max-w-5xl mx-auto">
            <!-- Timeline Item -->
            <div class="flex items-center">
                <span class="px-4 py-2 text-white text-[12px] md:text-sm font-bold rounded-full shadow-md" style="background-color: #0B1F3A;">Bootstrapping</span>
                <i class="fas fa-chevron-right text-gray-300 mx-2 text-sm hidden sm:block"></i>
            </div>
            <div class="flex items-center">
                <span class="px-4 py-2 text-white text-[12px] md:text-sm font-bold rounded-full shadow-md" style="background-color: rgba(11, 31, 58, 0.9);">Angel</span>
                <i class="fas fa-chevron-right text-gray-300 mx-2 text-sm hidden sm:block"></i>
            </div>
            <div class="flex items-center">
                <span class="px-4 py-2 text-white text-[12px] md:text-sm font-bold rounded-full shadow-md" style="background-color: rgba(11, 31, 58, 0.8);">Seed</span>
                <i class="fas fa-chevron-right text-gray-300 mx-2 text-sm hidden sm:block"></i>
            </div>
            <div class="flex items-center">
                <span class="px-4 py-2 text-white text-[12px] md:text-sm font-bold rounded-full shadow-md" style="background-color: #f5a623;">Series A</span>
                <i class="fas fa-chevron-right text-gray-300 mx-2 text-sm hidden sm:block"></i>
            </div>
            <div class="flex items-center">
                <span class="px-4 py-2 text-white text-[12px] md:text-sm font-bold rounded-full shadow-md" style="background-color: rgba(245, 166, 35, 0.9);">Series B</span>
                <i class="fas fa-chevron-right text-gray-300 mx-2 text-sm hidden sm:block"></i>
            </div>
            <div class="flex items-center">
                <span class="px-4 py-2 text-white text-[12px] md:text-sm font-bold rounded-full shadow-md" style="background-color: rgba(245, 166, 35, 0.8);">Series C</span>
                <i class="fas fa-chevron-right text-gray-300 mx-2 text-sm hidden sm:block"></i>
            </div>
            <div class="flex items-center mt-2 sm:mt-0">
                <span class="px-4 py-2 text-white text-[12px] md:text-sm font-bold rounded-full shadow-md" style="background-color: #16a34a;">IPO / Acquisition</span>
            </div>
        </div>

        <div class="mt-12 bg-[#0B1F3A] text-white rounded-2xl p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-6 relative overflow-hidden shadow-xl">
            <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+CjxwYXRoIGQ9Ik0wIDBoNDB2NDBIMHoiIGZpbGw9Im5vbmUiLz4KPHBhdGggZD0iTTIwIDIwTDEwIDEwbTEwIDEwbTEwLTEwTDIwIDIwbS0xMCAxMGwxMC0xMG0xMCAxMGwtMTAtMTAiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIxIiBvcGFjaXR5PSIuNSIvPgo8L3N2Zz4=')]"></div>
            <div class="relative z-10 md:w-2/3">
                <h3 class="text-xl md:text-2xl font-bold mb-2">Starting a Startup in India in 2026?</h3>
                <p class="text-gray-300 text-sm md:text-base leading-relaxed">हम आपको गाइड करेंगे कि आज के समय में किस फंडिंग स्टेज पर क्या-क्या <strong>requirements</strong> होती हैं, और इन्वेस्टर्स क्या देखते हैं। हमारी एक्सपर्ट टीम आपकी पिच डेक से लेकर कंप्लायंस तक पूरी मदद करेगी।</p>
            </div>
            <div class="relative z-10 w-full md:w-auto flex-shrink-0">
                <a href="#pricing" class="block w-full text-center bg-[#f5a623] text-[#0B1F3A] font-bold px-8 py-4 rounded-xl hover:bg-[#c09435] transition-colors shadow-lg">Get Expert Guide</a>
            </div>
        </div>
    </div>
</div>

<!-- TYPES OF FUNDING GRID -->
<div class="bg-gray-50 py-20 relative z-20 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-[#0B1F3A] mb-2 font-serif">13 Types of Startup Funding</h2>
            <p class="text-sm font-bold text-[#D4A843] uppercase tracking-wider">Explore All Options</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- 1 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-wallet"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">1. Bootstrapping</h3>
                <p class="text-sm text-gray-600">Apne paise se business shuru karna bina kisi external investment ke.</p>
            </div>
            <!-- 2 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-users"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">2. Friends & Family Funding</h3>
                <p class="text-sm text-gray-600">Doston ya family members se initial capital raise karna.</p>
            </div>
            <!-- 3 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-user-tie"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">3. Angel Investment</h3>
                <p class="text-sm text-gray-600">Individual High-Net-Worth investors jo startup me early stage me invest karte hain.</p>
            </div>
            <!-- 4 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-seedling"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">4. Seed Funding</h3>
                <p class="text-sm text-gray-600">Initial stage funding product development aur market validation ke liye.</p>
            </div>
            <!-- 5 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-rocket"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">5. Venture Capital (VC)</h3>
                <p class="text-sm text-gray-600">High-growth startups me large professional investment firms ka paisa.</p>
            </div>
            <!-- 6 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-chart-line"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">6. Series A, B, C Funding</h3>
                <p class="text-sm text-gray-600">Business ko scale karne aur expand karne ke liye multiple funding rounds.</p>
            </div>
            <!-- 7 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-building-columns"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">7. Bank Loan</h3>
                <p class="text-sm text-gray-600">Traditional banks ya NBFCs se loan lekar business chalana.</p>
            </div>
            <!-- 8 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-landmark-flag"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">8. Govt Grants / Schemes</h3>
                <p class="text-sm text-gray-600">Sarkari yojanaon (e.g. Startup India) ke through financial support.</p>
            </div>
            <!-- 9 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-globe"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">9. Crowdfunding</h3>
                <p class="text-sm text-gray-600">Bahut saare logon se online platform ke through chhota-chhota paisa collect karna.</p>
            </div>
            <!-- 10 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-hand-holding-dollar"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">10. Revenue-Based Funding</h3>
                <p class="text-sm text-gray-600">Future revenue ke percentage ke against immediate capital lena.</p>
            </div>
            <!-- 11 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-file-invoice-dollar"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">11. Debt Funding</h3>
                <p class="text-sm text-gray-600">Bonds, debentures ya loan ke form me funding lena jisme equity nahi deni padti.</p>
            </div>
            <!-- 12 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-briefcase"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">12. Private Equity (PE)</h3>
                <p class="text-sm text-gray-600">Mature aur profitable businesses me large institutional investment.</p>
            </div>
            <!-- 13 -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                <div class="text-[#f5a623] text-2xl mb-3"><i class="fas fa-bullhorn"></i></div>
                <h3 class="font-bold text-[#0B1F3A] text-lg mb-2">13. IPO (Initial Public Offering)</h3>
                <p class="text-sm text-gray-600">Company ke shares stock market ke through public ko bechkar fund raise karna.</p>
            </div>
        </div>
    </div>
</div>

<!-- PRICING SECTION -->
<div class="bg-white py-20 relative z-20" id="pricing">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-[#0B1F3A] mb-2 font-serif">फंडिंग सब्सक्रिप्शन प्लान</h2>
            <p class="text-sm font-bold text-[#D4A843] uppercase tracking-wider">Choose Your Plan</p>
            
            @if(session('subscription_success'))
                <div class="mt-8 max-w-lg w-full bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl p-5 text-center animate-fadeIn">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-3 text-xl font-bold">
                        ✓
                    </div>
                    <h4 class="font-bold text-base mb-1 font-serif text-emerald-950">Subscription Request Received!</h4>
                    <p class="text-xs leading-relaxed">{{ session('subscription_success') }}</p>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            @foreach($plans as $plan)
                @if($plan->is_popular)
                    <!-- Popular Plan (Dark Theme) -->
                    <div class="bg-[#0B1F3A] rounded-2xl shadow-xl border-2 border-[#D4A843] p-8 flex flex-col relative transform md:-translate-y-4">
                        @if($plan->badge)
                            <div class="absolute top-0 right-8 transform -translate-y-1/2">
                                <span class="bg-[#D4A843] text-[#0B1F3A] text-[10px] font-extrabold uppercase tracking-widest px-3 py-1 rounded-full">{{ $plan->badge }}</span>
                            </div>
                        @endif
                        <h3 class="text-2xl font-bold text-white mb-1">{{ $plan->name }}</h3>
                        @if($plan->description)
                            <p class="text-[12px] text-[#D4A843] font-bold uppercase tracking-wider mb-6">{{ $plan->description }}</p>
                        @endif
                        <div class="flex items-end mb-6">
                            <span class="text-4xl font-extrabold text-white">₹{{ number_format($plan->price) }}</span>
                            <span class="text-gray-400 mb-1 ml-1">/ {{ $plan->billing_period }}</span>
                        </div>
                        <ul class="space-y-4 mb-8 flex-grow">
                            @foreach($plan->features as $feature)
                                <li class="flex items-start">
                                    <i class="fas fa-check text-[#D4A843] mt-1 mr-3"></i>
                                    <span class="text-sm text-gray-300">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <button @click="selectedPlan = '{{ $plan->slug }}'; modalOpen = true" type="button" class="w-full bg-[#D4A843] text-[#0B1F3A] hover:bg-[#c09435] py-3 rounded-xl font-bold transition-colors">
                            Select {{ $plan->name }}
                        </button>
                    </div>
                @else
                    <!-- Regular Plan (Light Theme) -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:border-[#D4A843] transition-colors relative">
                        @if($plan->badge)
                            <div class="absolute top-0 right-8 transform -translate-y-1/2">
                                <span class="bg-[#D4A843] text-white text-[10px] font-extrabold uppercase tracking-widest px-3 py-1 rounded-full">{{ $plan->badge }}</span>
                            </div>
                        @endif
                        <h3 class="text-2xl font-bold text-[#0B1F3A] mb-1">{{ $plan->name }}</h3>
                        @if($plan->description)
                            <p class="text-[12px] text-gray-500 font-bold uppercase tracking-wider mb-6">{{ $plan->description }}</p>
                        @endif
                        <div class="flex items-end mb-6">
                            <span class="text-4xl font-extrabold text-[#0B1F3A]">₹{{ number_format($plan->price) }}</span>
                            <span class="text-gray-500 mb-1 ml-1">/ {{ $plan->billing_period }}</span>
                        </div>
                        <ul class="space-y-4 mb-8 flex-grow">
                            @foreach($plan->features as $feature)
                                <li class="flex items-start">
                                    <i class="fas fa-check text-[#D4A843] mt-1 mr-3"></i>
                                    <span class="text-sm text-gray-700">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <button @click="selectedPlan = '{{ $plan->slug }}'; modalOpen = true" type="button" class="w-full border-2 border-[#0B1F3A] text-[#0B1F3A] hover:bg-[#0B1F3A] hover:text-white py-3 rounded-xl font-bold transition-colors">
                            Select {{ $plan->name }}
                        </button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

</div>

<!-- Modal Backdrop & Window -->
<div x-show="modalOpen" class="fixed inset-0 z-[200] overflow-y-auto" style="display: none;">
    <!-- Backdrop -->
    <div x-show="modalOpen" x-transition.opacity @click="modalOpen = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- Centering Wrapper -->
    <div class="flex min-h-full items-center justify-center p-4">
        <!-- Modal Content -->
        <div x-show="modalOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="transform scale-95 opacity-0"
             x-transition:enter-end="transform scale-100 opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="transform scale-100 opacity-100"
             x-transition:leave-end="transform scale-95 opacity-0"
             class="bg-white rounded-2xl border-t-4 border-gold shadow-2xl p-6 md:p-8 w-full max-w-md relative z-10 text-navy my-8"
             style="max-width: 480px; width: 100%;">
            
            <button @click="modalOpen = false" 
                    class="absolute top-4 right-4 text-gray-400 hover:text-navy text-3xl font-light focus:outline-none cursor-pointer z-50"
                    style="background: transparent; border: none; line-height: 1; padding: 0;"
                    type="button">&times;</button>
            
            <h3 class="text-2xl font-bold font-serif mb-1 text-navy">Subscribe to <span class="capitalize text-saffron" x-text="selectedPlan"></span> Plan</h3>
            <p class="text-gray-500 text-xs mb-6">Get access to our complete funding and mentorship engine.</p>
            
            <form action="{{ route('funding.subscribe') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="plan" :value="selectedPlan">
                
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Full Name</label>
                    <input type="text" name="name" required placeholder="e.g. Rahul Sharma" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gold transition-colors">
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Mobile Number</label>
                    <div class="flex">
                        <span class="bg-gray-100 border border-gray-200 border-r-0 rounded-l-xl px-3.5 py-3 text-[13px] text-gray-500 font-bold flex items-center">+91</span>
                        <input type="tel" name="phone" required pattern="[0-9]{10}" placeholder="98765 43210" class="w-full bg-gray-50 border border-gray-200 rounded-r-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gold transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Email Address</label>
                    <input type="email" name="email" required placeholder="e.g. rahul@startup.com" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gold transition-colors">
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Startup / Company Name (Optional)</label>
                    <input type="text" name="startup_name" placeholder="e.g. Acme Tech Pvt Ltd" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gold transition-colors">
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-saffron text-white text-[14px] md:text-[15px] font-extrabold py-3.5 rounded-xl hover:bg-saffron-dark transition-all shadow-md">
                        Subscribe Now 🚀
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
