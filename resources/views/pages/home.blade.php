@extends('layouts.app')
@section('title', 'Company Registration & Legal Services in India | Foundida')
@section('meta_description', 'Foundida offers top-rated Company Registration, GST filing, Trademark registration, and Custom Tech Solutions in India. From idea to launch, get your complete business setup online.')
@section('meta_keywords', 'Company Registration in India, GST Registration, Trademark Filing, Startup Services, Legal Setup, Tech Solutions, Foundida')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "LegalService",
  "name": "Foundida",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('logo.png') }}",
  "description": "India's trusted Legal & Tech platform for Startups. Company registration, GST, Trademarks, and Custom Tech Solutions.",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "123 Tech Park, Sector 62",
    "addressLocality": "Noida",
    "addressRegion": "UP",
    "postalCode": "201309",
    "addressCountry": "IN"
  },
  "contactPoint": {
    "@@type": "ContactPoint",
    "telephone": "{{ \App\Models\Setting::get('contact_phone', '+91 87505 30252') }}",
    "contactType": "customer service"
  },
  "sameAs": [
    "https://www.facebook.com/foundida",
    "https://www.linkedin.com/company/foundida"
  ]
}
</script>
@endpush

@section('content')

<!-- 1. HERO SECTION -->
<section class="bg-[#0B1F3A] relative overflow-hidden pt-20 pb-16 md:py-[56px] z-10">
    <!-- Subtle diagonal golden gradient overlay on the right side -->
    <div class="absolute inset-y-0 right-0 w-full lg:w-1/2 bg-gradient-to-tr from-transparent to-[#D4A843]/15 pointer-events-none z-0"></div>

    <!-- Faint circuit board / legal document pattern as background texture -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0 opacity-40">
        <svg class="absolute right-0 top-0 w-[600px] h-[600px] text-white/5" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="0.35">
            <path d="M10,20 L30,20 L40,30 L70,30 L80,40 L90,40" />
            <path d="M20,50 L40,50 L50,60 L80,60" />
            <path d="M60,10 L70,20 L90,20" />
            <circle cx="30" cy="20" r="1" fill="currentColor" />
            <circle cx="70" cy="30" r="1" fill="currentColor" />
            <circle cx="40" cy="50" r="1" fill="currentColor" />
            <circle cx="80" cy="60" r="1" fill="currentColor" />
            <!-- Legal document silhouette -->
            <rect x="15" y="65" width="20" height="26" rx="1" stroke-dasharray="2 1" />
            <line x1="19" y1="71" x2="31" y2="71" stroke-width="0.5" />
            <line x1="19" y1="76" x2="31" y2="76" stroke-width="0.5" />
            <line x1="19" y1="81" x2="27" y2="81" stroke-width="0.5" />
        </svg>
    </div>

    <!-- Glow Blobs for Visual Depth -->
    <div class="hero-glow-blob"></div>
    <div class="hero-glow-blob-2"></div>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-[48px] items-center relative z-10">
        <!-- Hero Headline Area (Part 1) -->
        <div class="flex flex-col z-20">
            <!-- Top pill badge with golden border, animated golden dot pulse -->
            <div class="inline-flex items-center gap-2 bg-[#D4A843]/10 border border-[#D4A843]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#D4A843] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#D4A843]"></span>
                </span>
                <span class="text-[10px] font-bold text-[#D4A843] uppercase tracking-widest flex items-center gap-1">
                    FROM IDEA TO FUNDING <span class="text-[8px]">✦</span>
                </span>
            </div>

            <!-- Main Headline (Hindi/English optimized) -->
            <h1 class="text-[30px] sm:text-[36px] md:text-[52px] font-bold text-white leading-[1.15] mb-4 font-serif">
                Online <span class="text-[#D4A843]">Company Registration</span> & Business Setup in India
            </h1>

            <!-- Sub Headline (English) -->
            <h2 class="text-[14px] md:text-[16px] text-gray-300 mb-6 font-medium leading-relaxed max-w-[500px]">
                Complete Legal Services, GST, Trademark, and Tech setup — zero to launch in one place. India's fastest growing business setup platform.
            </h2>

            <!-- CTA Buttons - Side by Side on Mobile -->
            <div class="flex flex-row gap-3 items-center">
                <!-- Primary CTA -->
                <a href="#consultation" class="inline-flex items-center justify-center gap-2 bg-[#D4A843] text-[#0B1F3A] text-[13px] md:text-[15px] font-extrabold px-5 md:px-8 py-3 md:py-4 rounded-xl hover:bg-[#E8B96A] transition-all text-center shadow-lg whitespace-nowrap flex-grow sm:flex-grow-0">
                    <span class="text-base">📞</span>
                    <span>मुफ्त परामर्श</span>
                </a>
                <!-- Secondary CTA -->
                <a href="/packages" class="inline-flex items-center justify-center gap-2 bg-transparent text-white border border-[#D4A843]/60 hover:border-[#D4A843] text-[12px] md:text-[14px] font-bold px-4 md:px-6 py-2.5 md:py-3.5 rounded-xl hover:bg-white/5 transition-all text-center whitespace-nowrap">
                    <span class="text-base">📦</span>
                    <span>पैकेज देखें</span>
                </a>
            </div>

            <!-- Trust Badges Row (Horizontal scroll on mobile with thin golden dividers) -->
            <div class="mt-8 pt-6 border-t border-white/10 flex flex-row items-center overflow-x-auto hide-scrollbar flex-nowrap gap-4">
                <!-- Badge 1 -->
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-[#D4A843]/10 flex items-center justify-center text-[#D4A843] text-sm font-extrabold">₹</div>
                    <div class="flex flex-col">
                        <span class="text-white font-extrabold text-xs leading-none">₹499+</span>
                        <span class="text-gray-400 text-[8px] uppercase tracking-wider font-semibold mt-0.5">Starting</span>
                    </div>
                </div>
                
                <!-- Divider -->
                <div class="h-6 w-px bg-[#D4A843]/20 flex-shrink-0"></div>

                <!-- Badge 2 -->
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-[#D4A843]/10 flex items-center justify-center text-[#D4A843] text-xs">⚡</div>
                    <div class="flex flex-col">
                        <span class="text-white font-extrabold text-xs leading-none">48Hr</span>
                        <span class="text-gray-400 text-[8px] uppercase tracking-wider font-semibold mt-0.5">Delivery</span>
                    </div>
                </div>

                <!-- Divider -->
                <div class="h-6 w-px bg-[#D4A843]/20 flex-shrink-0"></div>

                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-[#D4A843]/10 flex items-center justify-center text-[#D4A843] text-xs">🛡️</div>
                    <div class="flex flex-col">
                        <span class="text-white font-extrabold text-xs leading-none">100%</span>
                        <span class="text-gray-400 text-[8px] uppercase tracking-wider font-semibold mt-0.5">Secure</span>
                    </div>
                </div>

                <!-- Divider -->
                <div class="h-6 w-px bg-[#D4A843]/20 flex-shrink-0"></div>

                <!-- Badge 4 -->
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-[#D4A843]/10 flex items-center justify-center text-[#D4A843] text-xs">🤝</div>
                    <div class="flex flex-col">
                        <span class="text-white font-extrabold text-xs leading-none">100+</span>
                        <span class="text-gray-400 text-[8px] uppercase tracking-wider font-semibold mt-0.5">Onboarded</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Consultation Form Card (Part 2 — separate white card) -->
        <div id="consultation" class="mt-8 mb-6 lg:mt-0 bg-white rounded-2xl shadow-xl p-6 pb-10 md:p-8 border-t-4 border-[#D4A843] relative z-10 w-full max-w-[440px] mx-auto lg:ml-auto">
            <h3 class="text-[20px] md:text-[24px] font-bold text-[#0B1F3A] mb-1 font-serif leading-tight">विशेषज्ञों से बात करें</h3>
            <p class="text-gray-500 text-xs mb-6">We reply within 2 hours.</p>

            @if(session('callback_success'))
                <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl font-medium">
                    ✓ {{ session('callback_success') }}
                </div>
            @endif

            <form action="{{ route('callback.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Rahul Sharma" class="w-full bg-gray-50 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#D4A843] focus:ring-1 focus:ring-[#D4A843] transition-colors">
                    @error('name') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Mobile Number</label>
                    <div class="flex">
                        <span class="bg-gray-100 border border-gray-200 border-r-0 rounded-l-xl px-3.5 py-3 text-[13px] text-gray-500 font-bold flex items-center">+91</span>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="9876543210" maxlength="10" class="w-full bg-gray-50 border @error('phone') border-red-500 @else border-gray-200 @enderror rounded-r-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#D4A843] transition-colors">
                    </div>
                    @error('phone') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Service Needed</label>
                    <select name="service" required class="w-full bg-gray-50 border @error('service') border-red-500 @else border-gray-200 @enderror rounded-xl px-4 py-3 text-[13px] text-gray-900 focus:outline-none focus:border-[#D4A843] transition-colors appearance-none" style="background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%230B1F3A' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19.5 8.25l-7.5 7.5-7.5-7.5'/%3E%3C/svg%3E&quot;); background-repeat: no-repeat; background-position: right 14px center; background-size: 14px;">
                        <option value="">Select a service...</option>
                        <option value="company-reg" {{ old('service') == 'company-reg' ? 'selected' : '' }}>Company Registration</option>
                        <option value="gst" {{ old('service') == 'gst' ? 'selected' : '' }}>GST</option>
                        <option value="trademark" {{ old('service') == 'trademark' ? 'selected' : '' }}>Trademark</option>
                        <option value="website-dev" {{ old('service') == 'website-dev' ? 'selected' : '' }}>Website Development</option>
                        <option value="app-dev" {{ old('service') == 'app-dev' ? 'selected' : '' }}>App Development</option>
                        <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('service') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="w-full bg-[#D4A843] text-[#0B1F3A] text-[14px] md:text-[15px] font-extrabold py-3.5 rounded-xl hover:bg-[#E8B96A] transition-all shadow-md mt-2">
                    Request Callback 📞
                </button>
            </form>
            <div class="text-center text-[10px] text-gray-400 mt-4 flex items-center justify-center gap-1.5">
                <span>🔒</span>
                <span>Your data is 100% secure.</span>
            </div>
        </div>
    </div>
</section>

<!-- 2. STARTUP JOURNEY ROADMAP -->
<section class="py-8 md:py-[56px] bg-[#F8F9FA] relative z-20 overflow-hidden">
    <!-- Subtle tech background elements -->
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(#D4A843 1.5px, transparent 1.5px); background-size: 32px 32px;"></div>
    
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-6 md:mb-[36px] flex flex-col items-center">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-gold/10 border border-gold/30 text-gold text-[10px] md:text-[11px] font-bold uppercase tracking-[0.25em] mb-3 md:mb-4 animate-pulse">
                <span>✦</span> Startup Launch Roadmap <span>✦</span>
            </div>
            <h2 class="text-[26px] md:text-[48px] font-extrabold text-navy mb-2 md:mb-[12px] font-serif leading-tight">
                5 Steps में शुरू करें अपना <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D4A843] to-[#A67828]">बिज़नेस</span>
            </h2>
            <p class="text-[13px] md:text-[16px] text-gray-600 max-w-[620px] mx-auto leading-relaxed">
                See how we take your vision from a simple idea to a fully launched, legally compliant, and tech-ready digital business.
            </p>
        </div>

        @php
        $roadmapSteps = [
            [
                'num' => 1,
                'emoji' => '💡',
                'title_en' => 'Business Idea',
                'title_hi' => 'बिजनेस आइडिया',
                'sub' => 'Plan Model',
                'desc_en' => 'You bring the vision and the passion.',
                'desc_hi' => 'आप अपना नया विचार और लगन लाएं।',
                'badge' => 'Your Part',
                'is_gold' => false
            ],
            [
                'num' => 2,
                'emoji' => '🏢',
                'title_en' => 'Company Reg',
                'title_hi' => 'कंपनी रजिस्ट्रेशन',
                'sub' => 'Pvt Ltd / LLP',
                'desc_en' => 'We register your entity in 3-7 days.',
                'desc_hi' => '3 से 7 दिनों में कंपनी रजिस्टर्ड करें।',
                'badge' => 'We Handle ✓',
                'is_gold' => true
            ],
            [
                'num' => 3,
                'emoji' => '✅',
                'title_en' => 'Legal Setup',
                'title_hi' => 'कानूनी सेटअप',
                'sub' => 'GST & TM',
                'desc_en' => 'Complete tax and IP protection.',
                'desc_hi' => 'जीएसटी और ट्रेडमार्क से ब्रांड सुरक्षा।',
                'badge' => 'We Handle ✓',
                'is_gold' => true
            ],
            [
                'num' => 4,
                'emoji' => '💻',
                'title_en' => 'Tech Setup',
                'title_hi' => 'टेक सेटअप',
                'sub' => 'Web & App',
                'desc_en' => 'Domain, hosting, and platform dev.',
                'desc_hi' => 'वेबसाइट, डोमेन, होस्टिंग और ऐप डेवलपमेंट।',
                'badge' => 'We Handle ✓',
                'is_gold' => true
            ],
            [
                'num' => 5,
                'emoji' => '🚀',
                'title_en' => 'Launch',
                'title_hi' => 'लांच और ग्रोथ',
                'sub' => 'Go Live',
                'desc_en' => 'Start scaling and acquiring users.',
                'desc_hi' => 'मार्केट में गो-लाइव हों और बिज़नेस बढ़ाएं।',
                'badge' => 'We Handle ✓',
                'is_gold' => true
            ]
        ];
        @endphp

        <!-- MOBILE: Drag/Touch Slider -->
        <div class="md:hidden">
            <div class="overflow-hidden" id="roadmap-slider-wrap">
                <div class="flex gap-4 transition-transform duration-300 ease-out py-2" id="roadmap-track" style="will-change:transform;">
                    @foreach($roadmapSteps as $idx => $s)
                    <div class="roadmap-slide flex-shrink-0 bg-white border {{ $s['is_gold'] ? 'border-gold/30 shadow-[0_8px_25px_-5px_rgba(212,168,67,0.08)]' : 'border-gray-200/60 shadow-[0_8px_25px_-5px_rgba(0,0,0,0.02)]' }} rounded-3xl p-6 flex flex-col items-center text-center relative select-none" style="width:calc(100vw - 48px); max-width:290px;">
                        
                        <!-- Top Corner Step Number -->
                        <div class="absolute top-0 right-0 {{ $s['is_gold'] ? 'bg-gold text-navy' : 'bg-gray-200 text-gray-600' }} rounded-bl-2xl w-10 h-10 flex items-center justify-center text-[12px] font-black shadow-xs font-sans">
                            0{{ $s['num'] }}
                        </div>

                        <!-- Icon Container -->
                        <div class="relative w-14 h-14 rounded-2xl bg-gradient-to-br {{ $s['is_gold'] ? 'from-gold/15 to-gold/5 border-gold/30' : 'from-gray-100 to-gray-50 border-gray-200' }} flex items-center justify-center text-[26px] mt-2 mb-4 border shadow-sm">
                            <span class="relative z-10">{{ $s['emoji'] }}</span>
                        </div>

                        <!-- Titles -->
                        <h4 class="text-[16px] font-extrabold text-navy font-serif leading-tight mb-0.5">{{ $s['title_hi'] }}</h4>
                        <p class="text-[11px] font-bold text-gray-500 uppercase tracking-wide mb-1">{{ $s['title_en'] }}</p>
                        <p class="text-[9px] text-gold uppercase tracking-widest font-black mb-3">{{ $s['sub'] }}</p>

                        <!-- Descriptions -->
                        <div class="flex flex-col flex-grow justify-center mb-4 text-center">
                            <p class="text-[12px] text-gray-500 leading-relaxed">{{ $s['desc_hi'] }}</p>
                            <p class="text-[10px] text-gray-400 italic mt-0.5">{{ $s['desc_en'] }}</p>
                        </div>

                        <!-- Badge -->
                        @if($s['is_gold'])
                        <div class="inline-flex items-center gap-1 bg-[#2D7A4F]/10 text-[#2D7A4F] text-[9px] font-bold px-3 py-1.5 rounded-full border border-[#2D7A4F]/20 shadow-xs">
                            <span class="text-[11px]">✓</span> We Handle
                        </div>
                        @else
                        <div class="inline-flex items-center gap-1 bg-gray-100 text-gray-500 text-[9px] font-bold px-3 py-1.5 rounded-full border border-gray-200 shadow-xs">
                            🤝 Your Action
                        </div>
                        @endif

                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Dot indicators -->
            <div class="flex justify-center gap-1.5 mt-6" id="roadmap-dots">
                @foreach($roadmapSteps as $i => $s)
                <button onclick="roadmapGoTo({{ $i }})" class="roadmap-dot w-2 h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-[#0B1F3A] !w-5' : 'bg-gray-300' }}" aria-label="Go to step {{ $i + 1 }}"></button>
                @endforeach
            </div>
        </div>

        <!-- DESKTOP: Connected Vertical Process Stack -->
        <div class="relative max-w-5xl mx-auto hidden md:block">
            <!-- Vertical connecting line behind the step numbers -->
            <div class="absolute left-[48px] top-8 bottom-8 w-[2px] bg-gradient-to-b from-[#0B1F3A] via-[#D4A843] to-[#D4A843] opacity-35 z-0"></div>

            <div class="space-y-6 relative z-10">
                @foreach($roadmapSteps as $s)
                <div class="bg-white border border-[#E2E0D8]/65 rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.012)] hover:shadow-[0_20px_50px_rgba(212,168,67,0.1)] hover:border-gold/40 hover:-translate-y-1 transition-all duration-300 flex items-center justify-between gap-6 group">
                    
                    <!-- Left Side: Step Number + Icon + Title -->
                    <div class="flex items-center gap-6">
                        <!-- Large Step Number acting as timeline node -->
                        <div class="w-12 h-12 rounded-full {{ $s['is_gold'] ? 'bg-gold text-navy' : 'bg-[#0B1F3A] text-white' }} flex items-center justify-center text-[18px] font-black font-sans shadow-md border-4 border-white z-10 shrink-0">
                            {{ $s['num'] }}
                        </div>
                        
                        <!-- Icon container -->
                        <div class="relative w-16 h-16 rounded-2xl bg-gradient-to-br {{ $s['is_gold'] ? 'from-gold/15 to-gold/5 border-gold/30' : 'from-gray-100 to-gray-50 border-gray-200' }} flex items-center justify-center text-[28px] border shadow-sm shrink-0 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            <span class="relative z-10">{{ $s['emoji'] }}</span>
                            <div class="absolute inset-0 bg-gold/10 rounded-2xl blur-md opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <!-- Title block -->
                        <div class="w-44 lg:w-52 shrink-0">
                            <h4 class="text-[17px] font-extrabold text-navy font-serif leading-tight mb-0.5 group-hover:text-gold transition-colors duration-300">{{ $s['title_hi'] }}</h4>
                            <p class="text-[13px] font-bold text-gray-500 uppercase tracking-wide">{{ $s['title_en'] }}</p>
                            <p class="text-[9px] text-gold uppercase tracking-widest font-black mt-1">{{ $s['sub'] }}</p>
                        </div>
                    </div>

                    <!-- Middle: Detailed Descriptions -->
                    <div class="flex-1 px-6 border-l border-gray-100/80">
                        <p class="text-[13px] text-gray-500 leading-relaxed">{{ $s['desc_hi'] }}</p>
                        <p class="text-[11px] text-gray-400 italic leading-snug mt-1">{{ $s['desc_en'] }}</p>
                    </div>

                    <!-- Right Side: Action tag -->
                    <div class="shrink-0 w-32 text-right">
                        @if($s['is_gold'])
                        <div class="inline-flex items-center gap-1 bg-[#2D7A4F]/10 text-[#2D7A4F] text-[10px] font-bold px-4 py-1.5 rounded-full border border-[#2D7A4F]/20 shadow-xs">
                            <span class="text-[11px]">✓</span> We Handle
                        </div>
                        @else
                        <div class="inline-flex items-center gap-1 bg-gray-100 text-gray-500 text-[10px] font-bold px-4 py-1.5 rounded-full border border-gray-200 shadow-xs">
                            🤝 Your Action
                        </div>
                        @endif
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- STARTUP FUNDING OPPORTUNITIES HOMEPAGE SECTION -->
<section class="py-12 md:py-16 bg-[#0B1F3A] relative overflow-hidden border-t border-[#D4A843]/20">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center gap-10 md:gap-12">
        <div class="w-full md:w-1/2 flex flex-col items-center md:items-start text-center md:text-left">
            <div class="inline-flex items-center gap-2 bg-[#D4A843]/10 border border-[#D4A843]/30 rounded-full px-3.5 py-1.5 mb-5 select-none">
                <span class="text-[10px] font-bold text-[#D4A843] uppercase tracking-widest"><i class="fas fa-hand-holding-usd mr-1"></i> FUNDING MARKETPLACE</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-extrabold font-serif text-white leading-tight mb-4">
                Startup Funding <span class="text-[#D4A843]">Opportunities</span>
            </h2>
            <p class="text-gray-300 mb-6 max-w-lg text-sm md:text-base leading-relaxed">
                Discover grants, investors, incubators, accelerators, and government funding programs from one platform.
            </p>
            
            <div class="flex flex-wrap gap-3 mb-8 justify-center md:justify-start">
                <a href="{{ route('funding.index') }}" class="bg-[#D4A843] text-[#0B1F3A] px-7 py-3.5 rounded-xl font-extrabold hover:bg-[#E8B96A] transition-all shadow-lg hover:-translate-y-0.5 inline-flex items-center gap-2 text-sm">
                    <i class="fas fa-search"></i> Explore Funding
                </a>
                <a href="{{ route('funding.index') }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 px-7 py-3.5 rounded-xl font-bold transition-all inline-flex items-center gap-2 text-sm">
                    ✨ Apply Through Foundida
                </a>
            </div>

            <!-- Disclaimer notice -->
            <div class="text-[10px] text-gray-400 bg-white/5 border border-white/10 p-3 rounded-xl max-w-lg text-left">
                <span class="text-gold font-bold">Note:</span> Foundida does not provide funding. We assist startup founders with professional application preparation, pitch review, and submission.
            </div>
        </div>

        <div class="w-full md:w-1/2 relative mt-6 md:mt-0">
            <div class="absolute inset-0 bg-[#D4A843]/20 blur-3xl rounded-full pointer-events-none"></div>
            
            <!-- Live Opportunities Badge Carousel Preview -->
            <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-3xl relative shadow-2xl space-y-4">
                <div class="flex items-center justify-between border-b border-white/10 pb-4">
                    <span class="text-xs font-bold text-gold uppercase tracking-widest"><i class="fas fa-bolt mr-1"></i> Active Opportunities</span>
                    <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-[10px] font-bold px-2.5 py-0.5 rounded-full">Updated Today</span>
                </div>

                <!-- Featured item 1 -->
                <div class="bg-black/20 p-4 rounded-2xl border border-white/5 flex items-center justify-between gap-4 hover:border-gold/30 transition-all">
                    <div>
                        <span class="text-[10px] text-gold font-bold uppercase">Government Grant</span>
                        <h4 class="text-sm font-bold text-white font-serif">Startup India Seed Fund Scheme</h4>
                        <span class="text-xs text-gray-400">Up to ₹50 Lakhs Grant & Debt</span>
                    </div>
                    <a href="{{ route('funding.index') }}" class="bg-gold text-navy text-xs font-bold px-3 py-1.5 rounded-lg shrink-0">View</a>
                </div>

                <!-- Featured item 2 -->
                <div class="bg-black/20 p-4 rounded-2xl border border-white/5 flex items-center justify-between gap-4 hover:border-gold/30 transition-all">
                    <div>
                        <span class="text-[10px] text-gold font-bold uppercase">Global Accelerator</span>
                        <h4 class="text-sm font-bold text-white font-serif">Y Combinator S26 Batch</h4>
                        <span class="text-xs text-gray-400">$500,000 (~₹4.1 Cr) Capital</span>
                    </div>
                    <a href="{{ route('funding.index') }}" class="bg-gold text-navy text-xs font-bold px-3 py-1.5 rounded-lg shrink-0">View</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LIVE SESSION PROMO -->
<section class="py-6 md:py-10 bg-[#FAF6ED] border-y border-[#E2E0D8] relative overflow-hidden">
    <div class="absolute inset-0 opacity-20 pointer-events-none" style="background-image: radial-gradient(#D4A843 1.5px, transparent 1.5px); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-10 md:gap-8 text-[#0B1F3A]">
        <div class="flex flex-col md:flex-row items-center text-center md:text-left gap-6 md:w-2/3">
            <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-[#FFF3D6] to-[#FDE9A0] rounded-2xl flex items-center justify-center shadow-md shrink-0 text-[#B8892E] text-2xl md:text-3xl border border-[#D4A843]/20">
                <i class="fas fa-headset animate-pulse"></i>
            </div>
            <div>
                <div class="inline-flex items-center gap-1.5 text-[10px] font-extrabold uppercase tracking-widest text-[#D4A843] bg-[#0B1F3A]/5 px-3 py-1 rounded-full mb-2">
                    ✦ 1-ON-1 EXPERT ADVICE
                </div>
                <h2 class="text-2xl md:text-3xl font-bold font-serif mb-1 leading-tight text-[#0B1F3A]">Complete Business Guide in 30 Mins</h2>
                <p class="text-gray-600 font-medium font-sans text-sm md:text-base">Confused about GST, PVT vs LLP, or Compliances? Talk live 1-on-1 with an expert.</p>
            </div>
        </div>
        <div class="w-full md:w-1/3 flex flex-col items-center md:items-end text-center md:text-right">
            <span class="text-xs md:text-sm font-bold uppercase tracking-widest mb-1 text-[#A67828]">Session Fee</span>
            <span class="text-4xl md:text-5xl font-extrabold mb-4 text-[#0B1F3A]">₹99</span>
            <a href="/live-session" class="bg-[#0B1F3A] text-[#D4A843] px-8 py-3.5 rounded-xl font-bold hover:bg-[#18345E] active:scale-[0.98] transition-all shadow-md w-full md:w-auto text-center inline-block">
                Book Live Session
            </a>
        </div>
    </div>
</section>

<!-- 3. LEGAL SERVICES SECTION -->
<section class="py-8 md:py-[56px] bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-4 md:mb-[32px] flex flex-col items-center">
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">कानूनी सेवाएं</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Legal Services</p>
            <p class="text-[12px] md:text-[16px] text-gray-600 max-w-[500px] mx-auto hidden md:block">Sab kuch legally sorted — transparent pricing, zero hassle.</p>
        </div>

        @php
        $dbLegalServices = \App\Models\Service::with('category')
            ->whereHas('category', function($q) {
                $q->whereIn('slug', ['business-registration', 'gst-services', 'trademark-ip', 'licenses-registrations', 'tax-compliance', 'legal-documents-diy', 'vakil-lawyer-services', 'hr-payroll']);
            })->take(12)->get();

        if ($dbLegalServices->isNotEmpty()) {
            $legalCards = $dbLegalServices->map(function($svc) {
                $iconMap = [
                    'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    'M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z',
                    'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',
                ];
                $catSlug = $svc->category ? $svc->category->slug : 'business-registration';
                return [
                    'title' => $svc->name_en,
                    'sub' => $svc->name_hi ?: ($svc->category ? strtoupper($svc->category->name) : 'LEGAL SERVICE'),
                    'desc' => $svc->time ? "Processing Time: {$svc->time}" : 'Complete legal processing and compliance.',
                    'price' => $svc->price ?: '₹999',
                    'old_price' => $svc->old_price,
                    'badge' => $svc->badge_hi ?: $svc->badge_en,
                    'link' => "/services/{$catSlug}/{$svc->slug}",
                    'icon' => $iconMap[$svc->id % count($iconMap)],
                ];
            })->toArray();
        } else {
            $legalCards = [
                ['title'=>'Company Registration','sub'=>'Pvt Ltd / LLP / OPC','desc'=>'Complete incorporation with DIN, DSC, and MOA/AOA drafting.','price'=>'₹1,499','link'=>'/services/business-registration','icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                ['title'=>'GST Registration','sub'=>'Tax Compliance','desc'=>'Get your GSTIN quickly. We handle registration, filing, and compliance.','price'=>'₹999','link'=>'/services/gst-services','icon'=>'M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                ['title'=>'Trademark & IP','sub'=>'Brand Protection','desc'=>'Protect your brand name and logo across India. Free TM Search included.','price'=>'₹2,999','link'=>'/services/trademark-ip','icon'=>'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
            ];
        }
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-[12px] md:gap-[24px] mobile-2col">
            @foreach($legalCards as $card)
            <div onclick="window.location.href='{{ $card['link'] }}'" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-[24px] md:p-[28px] hover:shadow-xl hover:-translate-y-1 hover:border-gold/40 transition-all flex flex-col group relative overflow-hidden cursor-pointer">
                <div class="card-arc absolute top-0 right-0 w-24 h-24 bg-[#F4F6F9] rounded-bl-full pointer-events-none z-0"></div>
                <div class="card-icon-row flex items-center justify-between mb-[20px] relative z-10">
                    <div class="card-icon w-[52px] h-[52px] bg-gradient-to-br from-[#FFF3D6] to-[#FDE9A0] rounded-2xl flex items-center justify-center shadow-md shadow-gold/20 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-[#B8892E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"></path></svg>
                    </div>
                    @if(!empty($card['badge']))
                        <span class="bg-red-500 text-white text-[9px] font-extrabold px-2.5 py-0.5 rounded-full uppercase tracking-wider">{{ $card['badge'] }}</span>
                    @endif
                </div>
                <h3 class="card-title text-[18px] font-bold text-[#0B1F3A] font-serif mb-[2px] relative z-10">{{ $card['title'] }}</h3>
                <p class="card-sub text-[10px] uppercase tracking-widest font-bold text-gray-400 mb-[12px] relative z-10">{{ $card['sub'] }}</p>
                <p class="card-desc text-[13px] text-gray-500 mb-[20px] flex-grow leading-relaxed hidden md:block relative z-10">{{ $card['desc'] }}</p>
                <div class="flex items-center justify-between border-t border-gray-100/80 pt-[16px] relative z-10">
                    <div class="flex flex-col">
                        <span class="card-price-label text-[10px] text-gray-400 font-bold uppercase">From</span>
                        <div class="flex items-center gap-1 flex-wrap">
                            @if(!empty($card['old_price']))
                                <span class="text-[11px] text-gray-400 line-through font-medium">{{ $card['old_price'] }}</span>
                            @endif
                            <span class="card-price text-[18px] font-extrabold text-[#0B1F3A]">{{ $card['price'] }}</span>
                        </div>
                    </div>
                    <span class="card-arrow w-9 h-9 rounded-full bg-[#D4A843] flex items-center justify-center text-[#0B1F3A] shadow-sm hover:scale-105 hover:bg-[#E8B96A] transition-all">
                        <svg class="w-4 h-4 text-[#0B1F3A]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Centered View All Button -->
        <div class="text-center mt-[48px]">
            <a href="/services" class="inline-flex items-center gap-4 bg-[#0B1F3A] hover:bg-[#122543] text-white px-8 py-3.5 rounded-2xl border border-[#D4A843]/30 hover:border-[#D4A843] shadow-[0_4px_20px_rgba(11,31,58,0.15)] hover:shadow-[0_10px_30px_rgba(212,168,67,0.2)] hover:-translate-y-0.5 transition-all duration-300 group/btn">
                <span class="flex flex-col items-start text-left">
                    <span class="text-white text-[15px] font-bold">सभी कानूनी सेवाएं देखें</span>
                    <span class="text-[10px] uppercase tracking-widest text-[#D4A843] font-bold mt-0.5">View All Legal Services</span>
                </span>
                <span class="w-8 h-8 rounded-xl bg-gradient-to-br from-[#FFF3D6] to-[#FDE9A0] flex items-center justify-center text-[#B8892E] shadow-sm group-hover/btn:translate-x-1 transition-transform duration-300">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </span>
            </a>
        </div>
    </div>
</section>

<!-- 4. TECH SERVICES SECTION -->
<section class="py-8 md:py-[56px] bg-[#F4F6F9] border-t border-gray-200/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-4 md:mb-[32px] flex flex-col items-center">
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">टेक सेवाएं</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Tech Services</p>
            <p class="text-[12px] md:text-[16px] text-gray-600 max-w-[500px] mx-auto hidden md:block">Digital India के लिए — Scalable, fast, and beautiful tech solutions.</p>
        </div>

        @php
        $dbTechServices = \App\Models\Service::with('category')
            ->whereHas('category', function($q) {
                $q->where('slug', 'tech-services');
            })->take(8)->get();

        if ($dbTechServices->isNotEmpty()) {
            $techCards = $dbTechServices->map(function($svc) {
                $iconMap = [
                    'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                    'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
                    'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z',
                    'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01'
                ];
                $catSlug = $svc->category ? $svc->category->slug : 'tech-services';
                return [
                    'title' => $svc->name_en,
                    'sub' => $svc->name_hi ?: 'TECH SERVICE',
                    'desc' => $svc->time ? "Delivery Time: {$svc->time}" : 'Scalable, fast tech solutions.',
                    'price' => $svc->price ?: '₹2,999',
                    'old_price' => $svc->old_price,
                    'badge' => $svc->badge_hi ?: $svc->badge_en,
                    'link' => "/services/{$catSlug}/{$svc->slug}",
                    'icon' => $iconMap[$svc->id % count($iconMap)],
                ];
            })->toArray();
        } else {
            $techCards = [
                ['title'=>'Website Development','sub'=>'UI/UX & Frontend','desc'=>'Professional, mobile-friendly websites. 5-page to full custom builds.','price'=>'₹2,999','link'=>'/services/tech-services/website-development','icon'=>'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9'],
                ['title'=>'Mobile App','sub'=>'iOS & Android','desc'=>'Native Flutter/React Native apps with beautiful UI and scalable backends.','price'=>'₹9,999','link'=>'/services/tech-services/mobile-app-development','icon'=>'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'],
            ];
        }
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-[12px] md:gap-[24px] mobile-2col">
            @foreach($techCards as $card)
            <div onclick="window.location.href='{{ $card['link'] }}'" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-[24px] md:p-[28px] hover:shadow-xl hover:-translate-y-1 hover:border-gold/40 transition-all flex flex-col group relative overflow-hidden cursor-pointer">
                <div class="card-arc absolute top-0 right-0 w-24 h-24 bg-[#F4F6F9] rounded-bl-full pointer-events-none z-0"></div>
                <div class="card-icon-row flex items-center justify-between mb-[20px] relative z-10">
                    <div class="card-icon w-[52px] h-[52px] bg-gradient-to-br from-[#FFF3D6] to-[#FDE9A0] rounded-2xl flex items-center justify-center shadow-md shadow-gold/20 flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-[#B8892E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"></path></svg>
                    </div>
                    @if(!empty($card['badge']))
                        <span class="bg-red-500 text-white text-[9px] font-extrabold px-2.5 py-0.5 rounded-full uppercase tracking-wider">{{ $card['badge'] }}</span>
                    @endif
                </div>
                <h3 class="card-title text-[18px] font-bold text-[#0B1F3A] font-serif mb-[2px] relative z-10">{{ $card['title'] }}</h3>
                <p class="card-sub text-[10px] uppercase tracking-widest font-bold text-gray-400 mb-[12px] relative z-10">{{ $card['sub'] }}</p>
                <p class="card-desc text-[13px] text-gray-500 mb-[20px] flex-grow leading-relaxed hidden md:block relative z-10">{{ $card['desc'] }}</p>
                <div class="flex items-center justify-between border-t border-gray-100/80 pt-[16px] relative z-10">
                    <div class="flex flex-col">
                        <span class="card-price-label text-[10px] text-gray-400 font-bold uppercase">From</span>
                        <div class="flex items-center gap-1 flex-wrap">
                            @if(!empty($card['old_price']))
                                <span class="text-[11px] text-gray-400 line-through font-medium">{{ $card['old_price'] }}</span>
                            @endif
                            <span class="card-price text-[18px] font-extrabold text-[#0B1F3A]">{{ $card['price'] }}</span>
                        </div>
                    </div>
                    <span class="card-arrow w-9 h-9 rounded-full bg-[#D4A843] flex items-center justify-center text-[#0B1F3A] shadow-sm hover:scale-105 hover:bg-[#E8B96A] transition-all">
                        <svg class="w-4 h-4 text-[#0B1F3A]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </span>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Centered View All Button -->
        <div class="text-center mt-[48px]">
            <a href="/services" class="inline-flex items-center gap-4 bg-[#0B1F3A] hover:bg-[#122543] text-white px-8 py-3.5 rounded-2xl border border-[#D4A843]/30 hover:border-[#D4A843] shadow-[0_4px_20px_rgba(11,31,58,0.15)] hover:shadow-[0_10px_30px_rgba(212,168,67,0.2)] hover:-translate-y-0.5 transition-all duration-300 group/btn">
                <span class="flex flex-col items-start text-left">
                    <span class="text-white text-[15px] font-bold">सभी टेक सेवाएं देखें</span>
                    <span class="text-[10px] uppercase tracking-widest text-[#D4A843] font-bold mt-0.5">View All Tech Services</span>
                </span>
                <span class="w-8 h-8 rounded-xl bg-gradient-to-br from-[#FFF3D6] to-[#FDE9A0] flex items-center justify-center text-[#B8892E] shadow-sm group-hover/btn:translate-x-1 transition-transform duration-300">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </span>
            </a>
        </div>
    </div>
</section>

<!-- 5. COMBO PACKAGES SECTION -->
@php
    $packages = \App\Models\Package::where('is_active', true)->orderBy('sort_order')->get();
    $legalPackages = $packages->where('type', 'legal');
    $techPackages = $packages->where('type', 'tech');
    $latestPosts = \App\Models\Post::orderBy('created_at', 'desc')->take(3)->get();
@endphp
<section id="packages" class="py-8 md:py-[56px] bg-white border-t border-gray-200 relative overflow-hidden"
         x-data="{ 
             activeTab: 'legal',
             showInquiryModal: {{ (session('package_inquiry_success') || $errors->has('name') || $errors->has('phone') || $errors->has('email') || $errors->has('package_slug')) ? 'true' : 'false' }},
             selectedPkgNameHi: '{{ old('package_slug') ? (\App\Models\Package::where('slug', old('package_slug'))->first()->name_hi ?? '') : '' }}',
             selectedPkgNameEn: '{{ old('package_slug') ? (\App\Models\Package::where('slug', old('package_slug'))->first()->name_en ?? '') : '' }}',
             selectedPkgSlug: '{{ old('package_slug') ?? '' }}',
             selectedPkgPrice: '{{ old('package_slug') ? number_format(\App\Models\Package::where('slug', old('package_slug'))->first()->price ?? 0) : '' }}'
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-4 md:mb-[24px] flex flex-col items-center">
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">बेस्ट वैल्यू पैकेज</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Best Value Packages</p>
            <p class="text-[13px] md:text-[16px] text-gray-600 max-w-[600px] mx-auto hidden md:block">Get everything you need in one go and save up to 40%.</p>
        </div>

        <!-- Tab Switcher -->
        <div class="flex items-center justify-center gap-3 mb-12">
            <button @click="activeTab = 'legal'" 
                    type="button"
                    :class="activeTab === 'legal' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-navy/5 text-gray-500 hover:bg-navy/10'" 
                    class="px-6 py-2.5 text-sm font-extrabold rounded-xl transition-all whitespace-nowrap flex flex-col items-center">
                <span class="text-base">कानूनी पैकेज</span>
                <span class="text-[9px] uppercase tracking-wider mt-0.5">Legal Packages</span>
            </button>
            <button @click="activeTab = 'tech'" 
                    type="button"
                    :class="activeTab === 'tech' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-navy/5 text-gray-500 hover:bg-navy/10'" 
                    class="px-6 py-2.5 text-sm font-extrabold rounded-xl transition-all whitespace-nowrap flex flex-col items-center">
                <span class="text-base">तकनीकी पैकेज</span>
                <span class="text-[9px] uppercase tracking-wider mt-0.5">Tech Packages</span>
            </button>
        </div>

        <!-- Legal Tab Content -->
        <div x-show="activeTab === 'legal'" x-transition class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-stretch">
            @foreach($legalPackages as $pkg)
                @if($pkg->is_popular)
                    <!-- Popular Card -->
                    <div class="bg-white rounded-2xl shadow-xl border-2 border-gold p-8 flex flex-col relative md:-my-4 hover:-translate-y-1 transition-transform duration-300 z-10">
                        @if($pkg->badge_hi)
                            <div class="absolute -top-4 inset-x-0 flex justify-center">
                                <div class="bg-gold text-navy px-4 py-1.5 rounded-full text-xs font-bold shadow-md flex flex-col items-center leading-tight">
                                    <span>{{ $pkg->badge_hi }}</span>
                                    @if($pkg->badge_en)
                                        <span class="text-[8px] uppercase tracking-widest">{{ $pkg->badge_en }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="flex flex-col mb-6 pb-6 border-b border-gray-100 mt-2">
                            <h3 class="text-2xl font-bold text-navy mb-1">{{ $pkg->name_hi }}</h3>
                            <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">{{ $pkg->name_en }}</span>
                            <div class="mt-6 flex items-end gap-2">
                                <span class="text-4xl font-bold text-navy">₹{{ number_format($pkg->price) }}</span>
                                @if($pkg->old_price && $pkg->old_price > $pkg->price)
                                    <span class="text-sm text-green-600 font-bold mb-1">Save ₹{{ number_format($pkg->old_price - $pkg->price) }}</span>
                                @endif
                            </div>
                            @if($pkg->description_en)
                                <p class="text-xs text-gray-400 mt-2">{{ $pkg->description_en }}</p>
                            @endif
                        </div>
                        <ul class="space-y-3 mb-8 flex-grow">
                            @foreach($pkg->features as $f)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span class="text-navy font-bold text-sm">{{ $f }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <button @click="showInquiryModal = true; selectedPkgNameHi = '{{ $pkg->name_hi }}'; selectedPkgNameEn = '{{ $pkg->name_en }}'; selectedPkgSlug = '{{ $pkg->slug }}'; selectedPkgPrice = '{{ number_format($pkg->price) }}'" 
                                type="button" 
                                class="w-full bg-gold text-navy hover:bg-gold-light min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md flex flex-col items-center justify-center mt-auto">
                            <span class="text-[16px] font-extrabold">शुरू करें</span>
                            <span class="text-[10px] uppercase tracking-widest mt-0.5">Select {{ $pkg->name_en }}</span>
                        </button>
                    </div>
                @else
                    <!-- Regular Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                        <div class="flex flex-col mb-6 pb-6 border-b border-gray-100">
                            <h3 class="text-2xl font-bold text-navy mb-1">{{ $pkg->name_hi }}</h3>
                            <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">{{ $pkg->name_en }}</span>
                            <div class="mt-6 flex items-end gap-2">
                                <span class="text-4xl font-bold text-navy">₹{{ number_format($pkg->price) }}</span>
                                @if($pkg->old_price && $pkg->old_price > $pkg->price)
                                    <span class="text-sm text-green-600 font-bold mb-1">Save ₹{{ number_format($pkg->old_price - $pkg->price) }}</span>
                                @endif
                            </div>
                            @if($pkg->description_en)
                                <p class="text-xs text-gray-400 mt-2">{{ $pkg->description_en }}</p>
                            @endif
                        </div>
                        <ul class="space-y-3 mb-8 flex-grow">
                            @foreach($pkg->features as $f)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span class="text-gray-700 text-sm font-medium">{{ $f }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <button @click="showInquiryModal = true; selectedPkgNameHi = '{{ $pkg->name_hi }}'; selectedPkgNameEn = '{{ $pkg->name_en }}'; selectedPkgSlug = '{{ $pkg->slug }}'; selectedPkgPrice = '{{ number_format($pkg->price) }}'" 
                                type="button" 
                                class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center mt-auto">
                            <span class="text-[15px]">शुरू करें</span>
                            <span class="text-[10px] uppercase tracking-wider mt-0.5">Select {{ $pkg->name_en }}</span>
                        </button>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Tech Tab Content -->
        <div x-show="activeTab === 'tech'" x-transition class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-stretch" style="display: none;">
            @foreach($techPackages as $pkg)
                @if($pkg->is_popular)
                    <!-- Popular Card -->
                    <div class="bg-white rounded-2xl shadow-xl border-2 border-gold p-8 flex flex-col relative md:-my-4 hover:-translate-y-1 transition-transform duration-300 z-10">
                        @if($pkg->badge_hi)
                            <div class="absolute -top-4 inset-x-0 flex justify-center">
                                <div class="bg-gold text-navy px-4 py-1.5 rounded-full text-xs font-bold shadow-md flex flex-col items-center leading-tight">
                                    <span>{{ $pkg->badge_hi }}</span>
                                    @if($pkg->badge_en)
                                        <span class="text-[8px] uppercase tracking-widest">{{ $pkg->badge_en }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="flex flex-col mb-6 pb-6 border-b border-gray-100 mt-2">
                            <h3 class="text-2xl font-bold text-navy mb-1">{{ $pkg->name_hi }}</h3>
                            <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">{{ $pkg->name_en }}</span>
                            <div class="mt-6 flex items-end gap-2">
                                <span class="text-4xl font-bold text-navy">₹{{ number_format($pkg->price) }}</span>
                                @if($pkg->old_price && $pkg->old_price > $pkg->price)
                                    <span class="text-sm text-green-600 font-bold mb-1">Save ₹{{ number_format($pkg->old_price - $pkg->price) }}</span>
                                @endif
                            </div>
                            @if($pkg->description_en)
                                <p class="text-xs text-gray-400 mt-2">{{ $pkg->description_en }}</p>
                            @endif
                        </div>
                        <ul class="space-y-3 mb-8 flex-grow">
                            @foreach($pkg->features as $f)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span class="text-navy font-bold text-sm">{{ $f }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <button @click="showInquiryModal = true; selectedPkgNameHi = '{{ $pkg->name_hi }}'; selectedPkgNameEn = '{{ $pkg->name_en }}'; selectedPkgSlug = '{{ $pkg->slug }}'; selectedPkgPrice = '{{ number_format($pkg->price) }}'" 
                                type="button" 
                                class="w-full bg-gold text-navy hover:bg-gold-light min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md flex flex-col items-center justify-center mt-auto">
                            <span class="text-[16px] font-extrabold">शुरू करें</span>
                            <span class="text-[10px] uppercase tracking-widest mt-0.5">Select {{ $pkg->name_en }}</span>
                        </button>
                    </div>
                @else
                    <!-- Regular Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                        <div class="flex flex-col mb-6 pb-6 border-b border-gray-100">
                            <h3 class="text-2xl font-bold text-navy mb-1">{{ $pkg->name_hi }}</h3>
                            <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">{{ $pkg->name_en }}</span>
                            <div class="mt-6 flex items-end gap-2">
                                <span class="text-4xl font-bold text-navy">₹{{ number_format($pkg->price) }}</span>
                                @if($pkg->old_price && $pkg->old_price > $pkg->price)
                                    <span class="text-sm text-green-600 font-bold mb-1">Save ₹{{ number_format($pkg->old_price - $pkg->price) }}</span>
                                @endif
                            </div>
                            @if($pkg->description_en)
                                <p class="text-xs text-gray-400 mt-2">{{ $pkg->description_en }}</p>
                            @endif
                        </div>
                        <ul class="space-y-3 mb-8 flex-grow">
                            @foreach($pkg->features as $f)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                <span class="text-gray-700 text-sm font-medium">{{ $f }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <button @click="showInquiryModal = true; selectedPkgNameHi = '{{ $pkg->name_hi }}'; selectedPkgNameEn = '{{ $pkg->name_en }}'; selectedPkgSlug = '{{ $pkg->slug }}'; selectedPkgPrice = '{{ number_format($pkg->price) }}'" 
                                type="button" 
                                class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center mt-auto">
                            <span class="text-[15px]">शुरू करें</span>
                            <span class="text-[10px] uppercase tracking-wider mt-0.5">Select {{ $pkg->name_en }}</span>
                        </button>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Popup Inquiry Modal -->
    <div x-show="showInquiryModal" class="fixed inset-0 z-[200] overflow-y-auto" style="display: none;" x-cloak>
        <!-- Backdrop -->
        <div x-show="showInquiryModal" x-transition.opacity @click="showInquiryModal = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

        <!-- Centering Wrapper -->
        <div class="flex min-h-full items-center justify-center p-4">
            <!-- Modal Content -->
            <div x-show="showInquiryModal" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="transform scale-95 opacity-0"
                 x-transition:enter-end="transform scale-100 opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="transform scale-100 opacity-100"
                 x-transition:leave-end="transform scale-95 opacity-0"
                 class="bg-white rounded-2xl border-t-4 border-gold shadow-2xl p-6 md:p-8 w-full max-w-lg relative z-10 text-navy my-8"
                 style="max-width: 512px; width: 100%;">
                
                <!-- Close Button -->
                <button @click="showInquiryModal = false" 
                        type="button" 
                        class="absolute top-4 right-4 text-gray-400 hover:text-navy text-3xl font-light focus:outline-none cursor-pointer z-50"
                        style="background: transparent; border: none; line-height: 1; padding: 0;">
                    &times;
                </button>

                @if(session('package_inquiry_success'))
                    <!-- Success View -->
                    <div class="text-center flex flex-col items-center justify-center pt-4">
                        <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-2xl font-bold mb-4 shadow-sm">
                            ✓
                        </div>
                        <h3 class="text-2xl font-bold text-navy mb-2 font-serif">Inquiry Submitted!</h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-6">{{ session('package_inquiry_success') }}</p>
                        <button @click="showInquiryModal = false" 
                                type="button" 
                                class="bg-navy text-white hover:bg-navy/95 font-bold px-8 py-3 rounded-xl transition-colors">
                            Close
                        </button>
                    </div>
                @else
                    <!-- Form View -->
                    <form action="{{ route('package-inquiries.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="package_slug" :value="selectedPkgSlug">

                        <div class="mb-6">
                            <span class="text-[10px] font-bold text-gold uppercase tracking-widest block mb-1">Package Selected</span>
                            <h3 class="text-2xl font-serif font-black text-navy leading-tight text-left">
                                <span x-text="selectedPkgNameHi"></span>
                                <span class="text-gray-300 mx-1">/</span>
                                <span x-text="selectedPkgNameEn" class="text-gray-500 font-sans font-bold text-lg text-left block md:inline"></span>
                            </h3>
                            <div class="mt-2 flex items-baseline gap-1 text-gold">
                                <span class="text-xl font-bold">₹</span>
                                <span x-text="selectedPkgPrice" class="text-2xl font-black"></span>
                            </div>
                        </div>

                        <div class="space-y-4 text-left">
                            <div>
                                <label class="block text-xs font-bold text-navy mb-1.5 uppercase tracking-wider">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Rahul Sharma" 
                                       class="w-full bg-gray-50 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-xl px-4 py-3 text-[13px] text-navy focus:outline-none focus:border-gold transition-colors">
                                @error('name')
                                    <p class="text-red-500 text-[11px] mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-navy mb-1.5 uppercase tracking-wider">Mobile Number <span class="text-red-500">*</span></label>
                                <div class="flex">
                                    <span class="bg-gray-100 border @error('phone') border-red-500 border-r-0 @else border-gray-200 border-r-0 @enderror rounded-l-xl px-4 py-3 text-[13px] text-gray-500 font-bold flex items-center">+91</span>
                                    <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="9876543210" 
                                           class="w-full bg-gray-50 border @error('phone') border-red-500 @else border-gray-200 @enderror rounded-r-xl px-4 py-3 text-[13px] text-navy focus:outline-none focus:border-gold transition-colors">
                                </div>
                                @error('phone')
                                    <p class="text-red-500 text-[11px] mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-navy mb-1.5 uppercase tracking-wider">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" required placeholder="rahul@example.com" 
                                       class="w-full bg-gray-50 border @error('email') border-red-500 @else border-gray-200 @enderror rounded-xl px-4 py-3 text-[13px] text-navy focus:outline-none focus:border-gold transition-colors">
                                @error('email')
                                    <p class="text-red-500 text-[11px] mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-navy mb-1.5 uppercase tracking-wider">Remarks / Special Requirements (Optional)</label>
                                <textarea name="notes" placeholder="Tell us if you need any customizations or specific additions..." rows="2" 
                                          class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-[13px] text-navy focus:outline-none focus:border-gold transition-colors">{{ old('notes') }}</textarea>
                            </div>
                        </div>

                        <button type="submit" 
                                class="w-full bg-gold hover:bg-gold-light text-navy font-bold py-4 rounded-xl shadow-md transition-all flex flex-col items-center justify-center min-h-[56px] mt-6">
                            <span class="text-[16px] font-extrabold">पूछताछ सबमिट करें</span>
                            <span class="text-[10px] uppercase tracking-widest mt-0.5">Submit Inquiry</span>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- 6. OUR TEAM SECTION -->
<section class="py-8 md:py-[56px] bg-[#F4F6F9] border-t border-gray-200/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-4 md:mb-[32px] flex flex-col items-center">
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">आपकी सेवा में हमारी टीम</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Our Expert Team</p>
            <p class="text-[13px] md:text-[16px] text-gray-600 max-w-[600px] mx-auto hidden md:block">CAs, Lawyers, and Top Developers — all in one place to bring your vision to life.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-[32px]">
            @forelse($teamMembers as $member)
            <div class="bg-white rounded-2xl p-4 md:p-[32px] text-center hover:-translate-y-2 transition-transform duration-300 shadow-sm border border-gray-100 group">
                <div class="w-14 h-14 md:w-[96px] md:h-[96px] rounded-full mx-auto mb-3 md:mb-[24px] border-2 md:border-[4px] border-gold overflow-hidden group-hover:shadow-lg transition-shadow">
                    <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" loading="lazy" class="w-full h-full object-cover object-top">
                </div>
                <h3 class="text-[13px] md:text-[18px] font-bold text-navy mb-0.5 md:mb-[2px]">{{ $member->name }}</h3>
                <p class="text-[9px] md:text-[10px] text-gold uppercase tracking-widest font-bold mb-2 md:mb-[12px]">{{ $member->role }}</p>
                @if($member->bio)
                <p class="text-[11px] md:text-[13px] text-gray-500 leading-relaxed hidden md:block">{{ $member->bio }}</p>
                @endif
                @if($member->linkedin_url)
                <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1 mt-2 text-[10px] text-gold hover:text-navy transition-colors">
                    <i class="fab fa-linkedin"></i> LinkedIn
                </a>
                @endif
            </div>
            @empty
            {{-- Fallback: show placeholder if no members added yet --}}
            <div class="col-span-full text-center py-10 text-gray-400 text-sm">
                <i class="fas fa-users text-3xl mb-2 block opacity-30"></i>
                Team members will appear here once added from the admin panel.
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- 7. TESTIMONIALS -->
<section class="py-8 md:py-[56px] bg-[#0B1F3A] relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-4 md:mb-[32px] flex flex-col items-center">
            <h2 class="text-[22px] md:text-[44px] font-bold text-gold mb-1 md:mb-[8px] font-serif">संस्थापकों का भरोसा</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gray-300 uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Trusted by Founders</p>
        </div>

        <!-- Mobile: Touch Drag Slider -->
        <div class="md:hidden">
            <div class="overflow-hidden" id="testi-slider-wrap">
                <div class="flex gap-3 transition-transform duration-300 ease-out" id="testi-track" style="will-change:transform;">
                    @php $reviews = [
                        ['initial'=>'R','name'=>'Rajat B.','role'=>'E-commerce Founder','text'=>'"Foundida handled my Pvt Ltd registration and built my e-commerce website flawlessly. Zero hassle!"'],
                        ['initial'=>'K','name'=>'Kiran M.','role'=>'Tech Startup CEO','text'=>'"Got my GST and website done in a week. Very responsive team, zero hidden costs."'],
                        ['initial'=>'A','name'=>'Ankit D.','role'=>'Logistics App Owner','text'=>'"They built an amazing mobile app for my delivery service. Highly recommended!"'],
                    ]; @endphp
                    @foreach($reviews as $r)
                    <div class="testi-slide flex-shrink-0 bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/20 flex flex-col select-none" style="width:calc(100vw - 48px);max-width:320px;">
                        <div class="flex text-gold mb-3 text-[18px]">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                        <p class="text-[13px] text-gray-300 italic mb-4 flex-grow leading-relaxed">{{ $r['text'] }}</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gold/20 flex items-center justify-center text-gold font-bold text-[15px]">{{ $r['initial'] }}</div>
                            <div>
                                <span class="font-bold text-white text-[14px] block">{{ $r['name'] }}</span>
                                <span class="text-[9px] text-gray-400 uppercase tracking-widest">{{ $r['role'] }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Dot indicators -->
            <div class="flex justify-center gap-1.5 mt-4" id="testi-dots">
                @foreach($reviews as $i => $r)
                <button onclick="testiGoTo({{ $i }})" class="testi-dot w-2 h-2 rounded-full transition-all {{ $i === 0 ? 'bg-gold w-5' : 'bg-white/30' }}"></button>
                @endforeach
            </div>
        </div>

        <!-- Desktop: 3-col grid -->
        <div class="hidden md:grid md:grid-cols-3 gap-[32px]">
            <div class="bg-white/10 backdrop-blur-md p-[32px] rounded-2xl border border-white/20">
                <div class="flex text-gold mb-[24px] text-[20px]">★★★★★</div>
                <p class="text-[14px] text-gray-300 italic mb-[32px] leading-relaxed">"Foundida handled my Pvt Ltd registration and built my e-commerce website flawlessly. I didn't have to hire two different agencies!"</p>
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-gold/20 flex items-center justify-center text-gold font-bold mr-4">R</div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-[15px]">Rajat B.</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest">E-commerce Founder</span>
                    </div>
                </div>
            </div>
            <div class="bg-white/10 backdrop-blur-md p-[32px] rounded-2xl border border-white/20">
                <div class="flex text-gold mb-[24px] text-[20px]">★★★★★</div>
                <p class="text-[14px] text-gray-300 italic mb-[32px] leading-relaxed">"Their 'Growth' combo is a no-brainer. Got my GST and website done in a week. Very responsive team and zero hidden costs."</p>
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-gold/20 flex items-center justify-center text-gold font-bold mr-4">K</div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-[15px]">Kiran M.</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest">Tech Startup CEO</span>
                    </div>
                </div>
            </div>
            <div class="bg-white/10 backdrop-blur-md p-[32px] rounded-2xl border border-white/20">
                <div class="flex text-gold mb-[24px] text-[20px]">★★★★★</div>
                <p class="text-[14px] text-gray-300 italic mb-[32px] leading-relaxed">"Best experience ever. The tech team is as competent as the legal team. They built an amazing mobile app for my delivery service."</p>
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-gold/20 flex items-center justify-center text-gold font-bold mr-4">A</div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-[15px]">Ankit D.</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest">Logistics App Owner</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. BLOG / TIPS SECTION -->
<section class="py-8 md:py-[56px] bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-4 md:mb-[32px]">
            <div>
                <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">जानें, समझें, आगे बढ़ें</h2>
                <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Legal & Tech Tips</p>
            </div>
            <a href="/blog" class="text-[11px] text-navy font-bold hover:text-gold transition-colors flex items-center gap-1 mt-1 md:mt-0">
                सभी आर्टिकल →
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-[32px]">
            @forelse($latestPosts as $post)
                @php
                    $colorClass = 'bg-navy';
                    if ($post->color === 'yellow' || $post->color === 'gold') {
                        $colorClass = 'bg-gold';
                    } elseif ($post->color === 'purple') {
                        $colorClass = 'bg-purple-600';
                    } elseif ($post->color === 'green') {
                        $colorClass = 'bg-green-600';
                    } elseif ($post->color === 'orange') {
                        $colorClass = 'bg-orange-500';
                    } elseif ($post->color === 'red') {
                        $colorClass = 'bg-red-500';
                    }
                @endphp
                <a href="/blog/{{ $post->slug }}" class="bg-white border border-gray-100 rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all group flex flex-col cursor-pointer {{ $loop->iteration === 3 ? 'hidden md:flex' : '' }}">
                    <div class="h-[4px] md:h-[6px] {{ $colorClass }} w-full"></div>
                    <div class="p-3 md:p-[32px] flex flex-col flex-grow">
                        <div class="{{ $post->badge_class ?? 'bg-navy/5 text-navy' }} text-[8px] md:text-[10px] font-bold mb-2 md:mb-[12px] uppercase tracking-widest inline-block self-start px-2 md:px-3 py-1 rounded-full">
                            {{ $post->category_label ?? strtoupper($post->category) }}
                        </div>
                        <h3 class="text-[12px] md:text-[18px] font-bold text-navy mb-1 md:mb-[12px] group-hover:text-gold transition-colors leading-snug">
                            {{ $post->title_hi ?? $post->title_en }}
                        </h3>
                        <p class="text-[11px] md:text-[13px] text-gray-500 mb-2 md:mb-[24px] flex-grow hidden md:block">
                            {{ $post->excerpt }}
                        </p>
                        <div class="text-[10px] md:text-[12px] text-gold font-bold uppercase tracking-wider flex items-center mt-auto">
                            Read &rarr;
                        </div>
                    </div>
                </a>
            @empty
                <!-- Hardcoded fallbacks if no posts in DB -->
                <a href="/blog/pvt-ltd-vs-llp-vs-opc" class="bg-white border border-gray-100 rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all group flex flex-col cursor-pointer">
                    <div class="h-[4px] md:h-[6px] bg-navy w-full"></div>
                    <div class="p-3 md:p-[32px] flex flex-col flex-grow">
                        <div class="text-navy text-[8px] md:text-[10px] font-bold mb-2 md:mb-[12px] uppercase tracking-widest bg-navy/5 inline-block self-start px-2 md:px-3 py-1 rounded-full">LEGAL</div>
                        <h3 class="text-[12px] md:text-[18px] font-bold text-navy mb-1 md:mb-[12px] group-hover:text-gold transition-colors leading-snug">Pvt Ltd vs LLP: आपके लिए क्या सही?</h3>
                        <p class="text-[11px] md:text-[13px] text-gray-500 mb-2 md:mb-[24px] flex-grow hidden md:block">Registration costs, compliance burden, and fundraising potential explained.</p>
                        <div class="text-[10px] md:text-[12px] text-gold font-bold uppercase tracking-wider flex items-center mt-auto">Read &rarr;</div>
                    </div>
                </a>
                <a href="/blog/website-zaruri-hai-business-ke-liye" class="bg-white border border-gray-100 rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all group flex flex-col cursor-pointer">
                    <div class="h-[4px] md:h-[6px] bg-gold w-full"></div>
                    <div class="p-3 md:p-[32px] flex flex-col flex-grow">
                        <div class="text-gold text-[8px] md:text-[10px] font-bold mb-2 md:mb-[12px] uppercase tracking-widest bg-gold/10 inline-block self-start px-2 md:px-3 py-1 rounded-full">TECH</div>
                        <h3 class="text-[12px] md:text-[18px] font-bold text-navy mb-1 md:mb-[12px] group-hover:text-gold transition-colors leading-snug">बिज़नेस के लिए Website क्यों? (2026)</h3>
                        <p class="text-[11px] md:text-[13px] text-gray-500 mb-2 md:mb-[24px] flex-grow hidden md:block">How a professional website acts as your 24/7 sales representative.</p>
                        <div class="text-[10px] md:text-[12px] text-gold font-bold uppercase tracking-wider flex items-center mt-auto">Read &rarr;</div>
                    </div>
                </a>
                <a href="/blog/gst-registration-guide-2026" class="bg-white border border-gray-100 rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all group flex flex-col cursor-pointer hidden md:flex">
                    <div class="h-[6px] bg-navy w-full"></div>
                    <div class="p-[32px] flex flex-col flex-grow">
                        <div class="text-navy text-[10px] font-bold mb-[12px] uppercase tracking-widest bg-navy/5 inline-block self-start px-3 py-1 rounded-full">COMPLIANCE</div>
                        <h3 class="text-[18px] font-bold text-navy mb-[12px] group-hover:text-gold transition-colors leading-tight">GST Registration: किसे लेना ज़रूरी है?</h3>
                        <p class="text-[13px] text-gray-500 mb-[24px] flex-grow">Turnover limits, mandatory cases, and what documents are needed.</p>
                        <div class="text-[12px] text-gold font-bold uppercase tracking-wider flex items-center mt-auto">Read Article &rarr;</div>
                    </div>
                </a>
            @endforelse
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
// ============================================================
// REUSABLE DRAG & AUTO-SLIDE SLIDER
// ============================================================
function makeDragSlider(trackId, dotsId, dotClass, autoPlayInterval = 0) {
    const track = document.getElementById(trackId);
    if (!track) return;
    const dots = document.querySelectorAll('.' + dotClass);
    let current = 0;
    let startX = 0, isDragging = false, startTranslate = 0, currentTranslate = 0;
    let autoPlayTimer = null;

    function getSlideWidth() {
        const slide = track.firstElementChild;
        if (!slide) return 0;
        return slide.offsetWidth + 12; // card + gap-3 (12px)
    }

    function goTo(idx) {
        const total = track.children.length;
        if (total === 0) return;
        current = (idx + total) % total;
        track.style.transition = 'transform 0.3s ease-out';
        currentTranslate = -current * getSlideWidth();
        track.style.transform = `translateX(${currentTranslate}px)`;
        dots.forEach((d, i) => {
            if (i === current) {
                d.classList.add('active');
                d.classList.remove('bg-gray-300', 'bg-white/30');
                if (trackId === 'roadmap-track') {
                    d.classList.add('bg-[#0B1F3A]', '!w-5');
                } else {
                    d.classList.add('bg-gold', '!w-5');
                }
            } else {
                d.classList.remove('active', '!w-5');
                d.classList.remove('bg-[#0B1F3A]', 'bg-gold');
                if (trackId === 'roadmap-track') {
                    d.classList.add('bg-gray-300');
                } else {
                    d.classList.add('bg-white/30');
                }
            }
        });
    }

    function startAutoPlay() {
        if (!autoPlayInterval || autoPlayTimer) return;
        autoPlayTimer = setInterval(() => {
            goTo(current + 1);
        }, autoPlayInterval);
    }

    function stopAutoPlay() {
        if (autoPlayTimer) {
            clearInterval(autoPlayTimer);
            autoPlayTimer = null;
        }
    }

    // Touch events with smart vertical scroll lock prevention
    let startY = 0;
    let isScrolling = false;

    track.addEventListener('touchstart', e => {
        stopAutoPlay();
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
        startTranslate = currentTranslate;
        track.style.transition = 'none';
        isDragging = true;
        isScrolling = false;
    }, { passive: false });

    track.addEventListener('touchmove', e => {
        if (!isDragging && !isScrolling) return;
        const diffX = e.touches[0].clientX - startX;
        const diffY = e.touches[0].clientY - startY;

        if (!isScrolling && isDragging) {
            if (Math.abs(diffY) > Math.abs(diffX)) {
                isScrolling = true;
                isDragging = false;
            }
        }

        if (isDragging) {
            if (e.cancelable) e.preventDefault();
            track.style.transform = `translateX(${startTranslate + diffX}px)`;
        }
    }, { passive: false });

    track.addEventListener('touchend', e => {
        if (isDragging) {
            isDragging = false;
            track.style.transition = 'transform 0.3s ease-out';
            const diff = e.changedTouches[0].clientX - startX;
            if (Math.abs(diff) > 40) {
                goTo(diff < 0 ? current + 1 : current - 1);
            } else {
                goTo(current);
            }
        }
        startAutoPlay();
    });

    // Mouse drag (desktop)
    track.addEventListener('mousedown', e => {
        stopAutoPlay();
        startX = e.clientX;
        startTranslate = currentTranslate;
        track.style.transition = 'none';
        isDragging = true;
        track.style.cursor = 'grabbing';
    });
    document.addEventListener('mousemove', e => {
        if (!isDragging) return;
        const diff = e.clientX - startX;
        track.style.transform = `translateX(${startTranslate + diff}px)`;
    });
    document.addEventListener('mouseup', e => {
        if (!isDragging) return;
        isDragging = false;
        track.style.transition = 'transform 0.3s ease-out';
        track.style.cursor = 'grab';
        const diff = e.clientX - startX;
        if (Math.abs(diff) > 40) {
            goTo(diff < 0 ? current + 1 : current - 1);
        } else {
            goTo(current);
        }
        startAutoPlay();
    });

    track.style.cursor = 'grab';
    startAutoPlay();
    return goTo;
}

// Init roadmap slider with 3-second auto-slide
const roadmapGoToFn = makeDragSlider('roadmap-track', 'roadmap-dots', 'roadmap-dot', 3000);
function roadmapGoTo(i) { if(roadmapGoToFn) roadmapGoToFn(i); }

// Init testimonials slider with 4-second auto-slide
const testiGoToFn = makeDragSlider('testi-track', 'testi-dots', 'testi-dot', 4000);
function testiGoTo(i) { if(testiGoToFn) testiGoToFn(i); }
</script>
@endpush

