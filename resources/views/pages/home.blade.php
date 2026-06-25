@extends('layouts.app')
@section('title', 'Your Complete Business Setup — Foundida.')

@section('content')

<!-- 1. HERO SECTION -->
<section class="bg-[#0d1b3e] relative overflow-hidden py-12 md:py-[100px] z-10">
    <!-- Subtle diagonal golden gradient overlay on the right side -->
    <div class="absolute inset-y-0 right-0 w-full lg:w-1/2 bg-gradient-to-tr from-transparent to-[#f5a623]/15 pointer-events-none z-0"></div>

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
            <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#f5a623] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#f5a623]"></span>
                </span>
                <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                    FROM IDEA TO FUNDING <span class="text-[8px]">✦</span>
                </span>
            </div>

            <!-- Main Headline (Hindi) -->
            <h1 class="text-[30px] sm:text-[36px] md:text-[52px] font-bold text-white leading-[1.15] mb-4 font-serif">
                आपका पूरा बिज़नेस सेटअप — <span class="text-[#f5a623]">एक जगह</span>
            </h1>

            <!-- Sub Headline (English) -->
            <p class="text-[14px] md:text-[16px] text-gray-300 mb-6 font-medium leading-relaxed max-w-[500px]">
                Legal setup + Tech setup — zero to launch in one place.
            </p>

            <!-- CTA Buttons - Side by Side on Mobile -->
            <div class="flex flex-row gap-3 items-center">
                <!-- Primary CTA -->
                <a href="#consultation" class="inline-flex items-center justify-center gap-2 bg-[#f5a623] text-[#0d1b3e] text-[13px] md:text-[15px] font-extrabold px-5 md:px-8 py-3 md:py-4 rounded-xl hover:bg-[#e0951b] transition-all text-center shadow-lg whitespace-nowrap flex-grow sm:flex-grow-0">
                    <span class="text-base">📞</span>
                    <span>मुफ्त परामर्श</span>
                </a>
                <!-- Secondary CTA -->
                <a href="/packages" class="inline-flex items-center justify-center gap-2 bg-transparent text-white border border-[#f5a623]/60 hover:border-[#f5a623] text-[12px] md:text-[14px] font-bold px-4 md:px-6 py-2.5 md:py-3.5 rounded-xl hover:bg-white/5 transition-all text-center whitespace-nowrap">
                    <span class="text-base">📦</span>
                    <span>पैकेज देखें</span>
                </a>
            </div>

            <!-- Trust Badges Row (Horizontal scroll on mobile with thin golden dividers) -->
            <div class="mt-8 pt-6 border-t border-white/10 flex flex-row items-center overflow-x-auto hide-scrollbar flex-nowrap gap-4">
                <!-- Badge 1 -->
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-[#f5a623]/10 flex items-center justify-center text-[#f5a623] text-sm font-extrabold">₹</div>
                    <div class="flex flex-col">
                        <span class="text-white font-extrabold text-xs leading-none">₹499+</span>
                        <span class="text-gray-400 text-[8px] uppercase tracking-wider font-semibold mt-0.5">Starting</span>
                    </div>
                </div>
                
                <!-- Divider -->
                <div class="h-6 w-px bg-[#f5a623]/20 flex-shrink-0"></div>

                <!-- Badge 2 -->
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-[#f5a623]/10 flex items-center justify-center text-[#f5a623] text-xs">⚡</div>
                    <div class="flex flex-col">
                        <span class="text-white font-extrabold text-xs leading-none">48Hr</span>
                        <span class="text-gray-400 text-[8px] uppercase tracking-wider font-semibold mt-0.5">Delivery</span>
                    </div>
                </div>

                <!-- Divider -->
                <div class="h-6 w-px bg-[#f5a623]/20 flex-shrink-0"></div>

                <!-- Badge 3 -->
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-[#f5a623]/10 flex items-center justify-center text-[#f5a623] text-xs">🛡️</div>
                    <div class="flex flex-col">
                        <span class="text-white font-extrabold text-xs leading-none">ISO</span>
                        <span class="text-gray-400 text-[8px] uppercase tracking-wider font-semibold mt-0.5">Certified</span>
                    </div>
                </div>

                <!-- Divider -->
                <div class="h-6 w-px bg-[#f5a623]/20 flex-shrink-0"></div>

                <!-- Badge 4 -->
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-8 h-8 rounded-full bg-[#f5a623]/10 flex items-center justify-center text-[#f5a623] text-xs">🤝</div>
                    <div class="flex flex-col">
                        <span class="text-white font-extrabold text-xs leading-none">5K+</span>
                        <span class="text-gray-400 text-[8px] uppercase tracking-wider font-semibold mt-0.5">Startups</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Consultation Form Card (Part 2 — separate white card) -->
        <div id="consultation" class="mt-8 lg:mt-0 bg-white rounded-2xl shadow-xl p-6 md:p-8 border-t-4 border-[#f5a623] relative z-10 w-full max-w-[440px] mx-auto lg:ml-auto">
            <h3 class="text-[20px] md:text-[24px] font-bold text-[#0d1b3e] mb-1 font-serif leading-tight">विशेषज्ञों से बात करें</h3>
            <p class="text-gray-500 text-xs mb-6">We reply within 2 hours.</p>

            <form class="space-y-4">
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Full Name</label>
                    <input type="text" placeholder="e.g. Rahul Sharma" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#f5a623] focus:ring-1 focus:ring-[#f5a623] transition-colors">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Mobile Number</label>
                    <div class="flex">
                        <span class="bg-gray-100 border border-gray-200 border-r-0 rounded-l-xl px-3.5 py-3 text-[13px] text-gray-500 font-bold flex items-center">+91</span>
                        <input type="tel" placeholder="98765 43210" class="w-full bg-gray-50 border border-gray-200 rounded-r-xl px-4 py-3 text-[13px] text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#f5a623] transition-colors">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1.5 uppercase tracking-wider">Service Needed</label>
                    <select class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-[13px] text-gray-900 focus:outline-none focus:border-[#f5a623] transition-colors appearance-none" style="background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%230d1b3e' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19.5 8.25l-7.5 7.5-7.5-7.5'/%3E%3C/svg%3E&quot;); background-repeat: no-repeat; background-position: right 14px center; background-size: 14px;">
                        <option value="">Select a service...</option>
                        <option value="company-reg">Company Registration</option>
                        <option value="gst">GST</option>
                        <option value="trademark">Trademark</option>
                        <option value="website-dev">Website Development</option>
                        <option value="app-dev">App Development</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <button type="button" class="w-full bg-[#f5a623] text-[#0d1b3e] text-[14px] md:text-[15px] font-extrabold py-3.5 rounded-xl hover:bg-[#e0951b] transition-all shadow-md mt-2">
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
<section class="py-12 md:py-[100px] bg-gradient-to-b from-[#F8F9FA] via-[#F4F5F7] to-white relative z-20 overflow-hidden">
    <!-- Subtle tech background elements -->
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: radial-gradient(#D4A843 1.5px, transparent 1.5px); background-size: 32px 32px;"></div>
    
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-10 md:mb-[72px] flex flex-col items-center">
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
                <button onclick="roadmapGoTo({{ $i }})" class="roadmap-dot w-2 h-2 rounded-full transition-all duration-300 {{ $i === 0 ? 'bg-[#1a237e] !w-5' : 'bg-gray-300' }}" aria-label="Go to step {{ $i + 1 }}"></button>
                @endforeach
            </div>
        </div>

        <!-- DESKTOP: Connected Vertical Process Stack -->
        <div class="relative max-w-5xl mx-auto hidden md:block">
            <!-- Vertical connecting line behind the step numbers -->
            <div class="absolute left-[48px] top-8 bottom-8 w-[2px] bg-gradient-to-b from-[#1a237e] via-[#D4A843] to-[#D4A843] opacity-35 z-0"></div>

            <div class="space-y-6 relative z-10">
                @foreach($roadmapSteps as $s)
                <div class="bg-white border border-[#E2E0D8]/65 rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.012)] hover:shadow-[0_20px_50px_rgba(212,168,67,0.1)] hover:border-gold/40 hover:-translate-y-1 transition-all duration-300 flex items-center justify-between gap-6 group">
                    
                    <!-- Left Side: Step Number + Icon + Title -->
                    <div class="flex items-center gap-6">
                        <!-- Large Step Number acting as timeline node -->
                        <div class="w-12 h-12 rounded-full {{ $s['is_gold'] ? 'bg-gold text-navy' : 'bg-[#1a237e] text-white' }} flex items-center justify-center text-[18px] font-black font-sans shadow-md border-4 border-white z-10 shrink-0">
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

<!-- FUNDING PROMO SECTION -->
<section class="py-16 md:py-[80px] bg-[#0d1b3e] relative overflow-hidden border-t border-[#f5a623]/20">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center gap-10 md:gap-12">
        <div class="w-full md:w-1/2 flex flex-col items-center md:items-start text-center md:text-left">
            <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 select-none">
                <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest"><i class="fas fa-rocket mr-1"></i> GROW FASTER</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-bold font-serif text-white leading-tight mb-4">
                Funding & Mentorship <span class="text-[#f5a623]">Subscription</span>
            </h2>
            <p class="text-gray-300 mb-6 max-w-lg text-sm md:text-base">
                Stop worrying about capital. Connect directly with VCs, apply for government grants effortlessly, and get expert help preparing your pitch deck.
            </p>
            <ul class="space-y-3 mb-8 text-left inline-block">
                <li class="flex items-center text-gray-300 text-sm md:text-base"><i class="fas fa-check-circle text-[#f5a623] mr-3"></i> Direct VC & Angel Introductions</li>
                <li class="flex items-center text-gray-300 text-sm md:text-base"><i class="fas fa-check-circle text-[#f5a623] mr-3"></i> Startup India Grants Support</li>
                <li class="flex items-center text-gray-300 text-sm md:text-base"><i class="fas fa-check-circle text-[#f5a623] mr-3"></i> Priority Business Loan Assistance</li>
            </ul>
            <a href="/funding" class="bg-[#f5a623] text-[#0d1b3e] px-8 py-3 md:py-4 rounded-xl font-bold hover:bg-[#c09435] transition-all shadow-[0_0_20px_rgba(245,166,35,0.3)] hover:-translate-y-1 inline-flex items-center gap-2">
                Explore Funding Plans <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
        <div class="w-full md:w-1/2 relative mt-6 md:mt-0">
            <div class="absolute inset-0 bg-[#f5a623]/20 blur-3xl rounded-full"></div>
            <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 md:p-8 rounded-2xl relative shadow-2xl">
                <div class="flex items-center gap-4 mb-6 pb-6 border-b border-white/10">
                    <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center text-green-400 shrink-0">
                        <i class="fas fa-hand-holding-usd text-xl"></i>
                    </div>
                    <div>
                        <div class="text-white font-bold text-lg md:text-xl">₹50L+ Raised</div>
                        <div class="text-gray-400 text-xs md:text-sm">For Early Stage Startups</div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#f5a623]/20 rounded-full flex items-center justify-center text-[#f5a623] shrink-0">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div>
                        <div class="text-white font-bold text-lg md:text-xl">100+ Investors</div>
                        <div class="text-gray-400 text-xs md:text-sm">In our active network</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LIVE SESSION PROMO -->
<section class="py-12 md:py-16 bg-[#f5a623] relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-10 md:gap-8 text-[#0d1b3e]">
        <div class="flex flex-col md:flex-row items-center text-center md:text-left gap-6 md:w-2/3">
            <div class="w-16 h-16 md:w-20 md:h-20 bg-white rounded-full flex items-center justify-center shadow-lg shrink-0 text-[#0d1b3e] text-2xl md:text-3xl">
                <i class="fas fa-headset animate-pulse"></i>
            </div>
            <div>
                <h2 class="text-2xl md:text-3xl font-bold font-serif mb-3 leading-tight">Complete Business Guide in 30 Mins</h2>
                <p class="text-[#0d1b3e]/80 font-medium font-sans text-sm md:text-base">Confused about GST, PVT vs LLP, or Compliances? Talk live 1-on-1 with an expert.</p>
            </div>
        </div>
        <div class="w-full md:w-1/3 flex flex-col items-center md:items-end text-center md:text-right">
            <span class="text-xs md:text-sm font-bold uppercase tracking-widest mb-1 md:mb-2 opacity-80">Only</span>
            <span class="text-4xl md:text-5xl font-extrabold mb-5 md:mb-4">₹99</span>
            <a href="/live-session" class="bg-[#0d1b3e] text-white px-8 py-3 md:py-4 rounded-xl font-bold hover:bg-[#1a2b5e] transition-all shadow-lg hover:-translate-y-1 w-full md:w-auto text-center inline-block">
                Book Live Session
            </a>
        </div>
    </div>
</section>

<!-- 3. LEGAL SERVICES SECTION -->
<section class="py-10 md:py-[100px] bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 md:mb-[64px] flex flex-col items-center">
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">कानूनी सेवाएं</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Legal Services</p>
            <p class="text-[12px] md:text-[16px] text-gray-600 max-w-[500px] mx-auto hidden md:block">Sab kuch legally sorted — transparent pricing, zero hassle.</p>
        </div>

        @php
        $legalCards = [
            ['title'=>'Company Registration','sub'=>'Pvt Ltd / LLP / OPC','desc'=>'Complete incorporation with DIN, DSC, and MOA/AOA drafting.','price'=>'₹1,499','link'=>'/services/business-registration','icon'=>'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
            ['title'=>'GST Registration','sub'=>'Tax Compliance','desc'=>'Get your GSTIN quickly. We handle registration, filing, and compliance.','price'=>'₹999','link'=>'/services/gst','icon'=>'M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
            ['title'=>'Trademark & IP','sub'=>'Brand Protection','desc'=>'Protect your brand name and logo across India. Free TM Search included.','price'=>'₹2,999','link'=>'/services/trademark','icon'=>'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
            ['title'=>'FSSAI Food License','sub'=>'Food & Beverage','desc'=>'Mandatory for all food businesses. Basic, State & Central registrations handled.','price'=>'₹2,499','link'=>'/services/licenses-registrations','icon'=>'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z'],
            ['title'=>'Import Export Code','sub'=>'IEC Registration','desc'=>'IEC code for starting import/export business in India. Quick processing.','price'=>'₹1,999','link'=>'/services/licenses-registrations','icon'=>'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['title'=>'Accounting & Tax','sub'=>'Monthly Compliance','desc'=>'Monthly bookkeeping, ITR filing, TDS, and complete annual compliance.','price'=>'₹999/mo','link'=>'/services/tax-compliance','icon'=>'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
            ['title'=>'LLP Registration','sub'=>'Partnership Entity','desc'=>'Limited Liability Partnership — best for professionals and small teams.','price'=>'₹3,999','link'=>'/services/business-registration','icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
            ['title'=>'Udyam Registration','sub'=>'MSME Certificate','desc'=>'Register your MSME under Udyam portal and avail government subsidies.','price'=>'₹499','link'=>'/services/licenses-registrations','icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
            ['title'=>'ISO Certification','sub'=>'Quality Standard','desc'=>'ISO 9001 & other certifications to build trust and win corporate contracts.','price'=>'₹4,999','link'=>'/services/licenses-registrations','icon'=>'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
            ['title'=>'ITR Filing','sub'=>'Income Tax Return','desc'=>'Individual and business ITR filing. Maximize refunds, avoid penalties.','price'=>'₹499','link'=>'/services/tax-compliance','icon'=>'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 11h.01M12 11h.01M15 11h.01M12 7h.01M9 7H7a2 2 0 00-2 2v9a2 2 0 002 2h10a2 2 0 002-2V9a2 2 0 00-2-2h-2'],
            ['title'=>'Lawyer Consultation','sub'=>'Vakeel Services','desc'=>'Talk to experienced lawyers for phone or video consultation on any issue.','price'=>'₹499','link'=>'/vakeel-search','icon'=>'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'],
            ['title'=>'Legal Documents','sub'=>'DIY Templates','desc'=>'Download ready-to-use Rent Agreements, NDA, MOU, and 50+ legal docs.','price'=>'₹99','link'=>'/diy-documents','icon'=>'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
        ];
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-[12px] md:gap-[24px] mobile-2col">
            @foreach($legalCards as $card)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-[28px] hover:shadow-xl hover:-translate-y-1 hover:border-gold/30 transition-all flex flex-col group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-navy/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
                <div class="card-icon w-[52px] h-[52px] bg-navy/5 rounded-xl flex items-center justify-center text-navy mb-[20px] group-hover:bg-navy group-hover:text-white transition-colors flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"></path></svg>
                </div>
                <h3 class="card-title text-[17px] font-bold text-navy mb-[2px]">{{ $card['title'] }}</h3>
                <p class="card-sub text-[10px] uppercase tracking-widest font-bold text-gray-400 mb-[12px]">{{ $card['sub'] }}</p>
                <p class="card-desc text-[13px] text-gray-500 mb-[20px] flex-grow leading-relaxed hidden md:block">{{ $card['desc'] }}</p>
                <div class="flex items-center justify-between border-t border-gray-100 pt-[20px]">
                    <div class="flex flex-col">
                        <span class="card-price-label text-[10px] text-gray-400 font-bold uppercase">From</span>
                        <span class="card-price text-[18px] font-extrabold text-navy">{{ $card['price'] }}</span>
                    </div>
                    <a href="{{ $card['link'] }}" class="card-arrow w-9 h-9 rounded-full bg-offwhite flex items-center justify-center text-navy group-hover:bg-gold group-hover:text-navy transition-colors shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Centered View All Button -->
        <div class="text-center mt-[48px]">
            <a href="/services" class="inline-flex items-center gap-3 bg-navy text-white font-bold text-[15px] px-[40px] py-[16px] rounded-xl hover:bg-navy/90 hover:-translate-y-1 transition-all shadow-lg">
                <span class="flex flex-col items-start">
                    <span>सभी कानूनी सेवाएं देखें</span>
                    <span class="text-[10px] uppercase tracking-wider text-gray-300">View All Legal Services</span>
                </span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</section>

<!-- 4. TECH SERVICES SECTION -->
<section class="py-10 md:py-[100px] bg-offwhite">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 md:mb-[64px] flex flex-col items-center">
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">टेक सेवाएं</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Tech Services</p>
            <p class="text-[12px] md:text-[16px] text-gray-600 max-w-[500px] mx-auto hidden md:block">Digital India के लिए — Scalable, fast, and beautiful tech solutions.</p>
        </div>

        @php
        $techCards = [
            ['title'=>'Website Development','sub'=>'UI/UX & Frontend','desc'=>'Professional, mobile-friendly websites. 5-page to full custom builds.','price'=>'₹2,999','link'=>'/services/tech-services','icon'=>'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9'],
            ['title'=>'Mobile App','sub'=>'iOS & Android','desc'=>'Native Flutter/React Native apps with beautiful UI and scalable backends.','price'=>'₹9,999','link'=>'/services/tech-services','icon'=>'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'],
            ['title'=>'E-commerce Store','sub'=>'Shopify / Custom','desc'=>'Full online store with payment gateway, inventory & order management.','price'=>'₹4,999','link'=>'/services/tech-services','icon'=>'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
            ['title'=>'Domain + Hosting','sub'=>'Server Setup','desc'=>'Register .com / .in domain and configure lightning-fast secure hosting.','price'=>'₹999','link'=>'/services/tech-services','icon'=>'M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01'],
            ['title'=>'Logo & Branding','sub'=>'Brand Identity','desc'=>'Premium logo, brand guidelines, letterheads, and business card design.','price'=>'₹1,499','link'=>'/services/tech-services','icon'=>'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'],
            ['title'=>'Social Media Setup','sub'=>'Digital Presence','desc'=>'Professional FB, Instagram, LinkedIn, Twitter profiles with branding kit.','price'=>'₹799','link'=>'/services/tech-services','icon'=>'M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z'],
            ['title'=>'Digital Marketing','sub'=>'SEO & Ads','desc'=>'Google Ads, Meta Ads, and SEO strategy to drive qualified traffic to you.','price'=>'₹2,499','link'=>'/services/tech-services','icon'=>'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'],
            ['title'=>'CRM / ERP Setup','sub'=>'Business Software','desc'=>'Streamline operations with custom CRM, inventory & billing software.','price'=>'₹5,999','link'=>'/services/tech-services','icon'=>'M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18'],
        ];
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-[12px] md:gap-[24px] mobile-2col">
            @foreach($techCards as $card)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-[28px] hover:shadow-xl hover:-translate-y-1 hover:border-gold/30 transition-all flex flex-col group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-navy/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
                <div class="card-icon w-[52px] h-[52px] bg-navy/5 rounded-xl flex items-center justify-center text-navy mb-[20px] group-hover:bg-navy group-hover:text-white transition-colors flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"></path></svg>
                </div>
                <h3 class="card-title text-[17px] font-bold text-navy mb-[2px]">{{ $card['title'] }}</h3>
                <p class="card-sub text-[10px] uppercase tracking-widest font-bold text-gray-400 mb-[12px]">{{ $card['sub'] }}</p>
                <p class="card-desc text-[13px] text-gray-500 mb-[20px] flex-grow leading-relaxed hidden md:block">{{ $card['desc'] }}</p>
                <div class="flex items-center justify-between border-t border-gray-100 pt-[20px]">
                    <div class="flex flex-col">
                        <span class="card-price-label text-[10px] text-gray-400 font-bold uppercase">From</span>
                        <span class="card-price text-[18px] font-extrabold text-navy">{{ $card['price'] }}</span>
                    </div>
                    <a href="{{ $card['link'] }}" class="card-arrow w-9 h-9 rounded-full bg-offwhite flex items-center justify-center text-navy group-hover:bg-gold group-hover:text-navy transition-colors shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Centered View All Button -->
        <div class="text-center mt-[48px]">
            <a href="/services" class="inline-flex items-center gap-3 bg-navy text-white font-bold text-[15px] px-[40px] py-[16px] rounded-xl hover:bg-navy/90 hover:-translate-y-1 transition-all shadow-lg">
                <span class="flex flex-col items-start">
                    <span>सभी टेक सेवाएं देखें</span>
                    <span class="text-[10px] uppercase tracking-wider text-gray-300">View All Tech Services</span>
                </span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
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
<section id="packages" class="py-10 md:py-[100px] bg-white border-t border-gray-200 relative overflow-hidden"
         x-data="{ 
             activeTab: 'legal',
             showInquiryModal: {{ (session('package_inquiry_success') || $errors->has('name') || $errors->has('phone') || $errors->has('email') || $errors->has('package_slug')) ? 'true' : 'false' }},
             selectedPkgNameHi: '{{ old('package_slug') ? (\App\Models\Package::where('slug', old('package_slug'))->first()->name_hi ?? '') : '' }}',
             selectedPkgNameEn: '{{ old('package_slug') ? (\App\Models\Package::where('slug', old('package_slug'))->first()->name_en ?? '') : '' }}',
             selectedPkgSlug: '{{ old('package_slug') ?? '' }}',
             selectedPkgPrice: '{{ old('package_slug') ? number_format(\App\Models\Package::where('slug', old('package_slug'))->first()->price ?? 0) : '' }}'
         }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-6 md:mb-[40px] flex flex-col items-center">
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
<section class="py-10 md:py-[100px] bg-offwhite border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-6 md:mb-[64px] flex flex-col items-center">
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">आपकी सेवा में हमारी टीम</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Our Expert Team</p>
            <p class="text-[13px] md:text-[16px] text-gray-600 max-w-[600px] mx-auto hidden md:block">CAs, Lawyers, and Top Developers — all in one place to bring your vision to life.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-[32px]">
            <div class="bg-white rounded-2xl p-4 md:p-[32px] text-center hover:-translate-y-2 transition-transform duration-300 shadow-sm border border-gray-100 group">
                <div class="w-14 h-14 md:w-[96px] md:h-[96px] rounded-full mx-auto mb-3 md:mb-[24px] border-2 md:border-[4px] border-gold overflow-hidden group-hover:shadow-lg transition-shadow">
                    <img src="https://ui-avatars.com/api/?name=Amit+Kumar&background=1a237e&color=fff&size=150" alt="CA Amit Kumar" class="w-full h-full object-cover">
                </div>
                <h3 class="text-[13px] md:text-[18px] font-bold text-navy mb-0.5 md:mb-[2px]">CA Amit Kumar</h3>
                <p class="text-[9px] md:text-[10px] text-gold uppercase tracking-widest font-bold mb-2 md:mb-[12px]">Tax & Reg Head</p>
                <p class="text-[11px] md:text-[13px] text-gray-500 leading-relaxed hidden md:block">10+ Years Exp in Startup Structuring.</p>
            </div>

            <div class="bg-white rounded-2xl p-4 md:p-[32px] text-center hover:-translate-y-2 transition-transform duration-300 shadow-sm border border-gray-100 group">
                <div class="w-14 h-14 md:w-[96px] md:h-[96px] rounded-full mx-auto mb-3 md:mb-[24px] border-2 md:border-[4px] border-gold overflow-hidden group-hover:shadow-lg transition-shadow">
                    <img src="https://ui-avatars.com/api/?name=Priya+Sharma&background=1a237e&color=fff&size=150" alt="Adv Priya Sharma" class="w-full h-full object-cover">
                </div>
                <h3 class="text-[13px] md:text-[18px] font-bold text-navy mb-0.5 md:mb-[2px]">Adv Priya Sharma</h3>
                <p class="text-[9px] md:text-[10px] text-gold uppercase tracking-widest font-bold mb-2 md:mb-[12px]">IP & TM Expert</p>
                <p class="text-[11px] md:text-[13px] text-gray-500 leading-relaxed hidden md:block">Secured 1000+ brands and patents.</p>
            </div>

            <div class="bg-white rounded-2xl p-4 md:p-[32px] text-center hover:-translate-y-2 transition-transform duration-300 shadow-sm border border-gray-100 group">
                <div class="w-14 h-14 md:w-[96px] md:h-[96px] rounded-full mx-auto mb-3 md:mb-[24px] border-2 md:border-[4px] border-gold overflow-hidden group-hover:shadow-lg transition-shadow">
                    <img src="https://ui-avatars.com/api/?name=Rahul+Verma&background=1a237e&color=fff&size=150" alt="Rahul Verma" class="w-full h-full object-cover">
                </div>
                <h3 class="text-[13px] md:text-[18px] font-bold text-navy mb-0.5 md:mb-[2px]">Rahul Verma</h3>
                <p class="text-[9px] md:text-[10px] text-gold uppercase tracking-widest font-bold mb-2 md:mb-[12px]">Lead Web Dev</p>
                <p class="text-[11px] md:text-[13px] text-gray-500 leading-relaxed hidden md:block">Full-stack expert in Laravel & React.</p>
            </div>

            <div class="bg-white rounded-2xl p-4 md:p-[32px] text-center hover:-translate-y-2 transition-transform duration-300 shadow-sm border border-gray-100 group">
                <div class="w-14 h-14 md:w-[96px] md:h-[96px] rounded-full mx-auto mb-3 md:mb-[24px] border-2 md:border-[4px] border-gold overflow-hidden group-hover:shadow-lg transition-shadow">
                    <img src="https://ui-avatars.com/api/?name=Sneha+Patil&background=1a237e&color=fff&size=150" alt="Sneha Patil" class="w-full h-full object-cover">
                </div>
                <h3 class="text-[13px] md:text-[18px] font-bold text-navy mb-0.5 md:mb-[2px]">Sneha Patil</h3>
                <p class="text-[9px] md:text-[10px] text-gold uppercase tracking-widest font-bold mb-2 md:mb-[12px]">App Developer</p>
                <p class="text-[11px] md:text-[13px] text-gray-500 leading-relaxed hidden md:block">Flutter & React Native cross-platform master.</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. TESTIMONIALS -->
<section class="py-10 md:py-[100px] bg-navy relative overflow-hidden">
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-6 md:mb-[64px] flex flex-col items-center">
            <h2 class="text-[22px] md:text-[44px] font-bold text-gold mb-1 md:mb-[8px] font-serif">5,000+ संस्थापकों का भरोसा</h2>
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
<section class="py-10 md:py-[100px] bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-5 md:mb-[64px]">
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
// REUSABLE DRAG SLIDER
// ============================================================
function makeDragSlider(trackId, dotsId, dotClass) {
    const track = document.getElementById(trackId);
    if (!track) return;
    const dots = document.querySelectorAll('.' + dotClass);
    let current = 0;
    let startX = 0, isDragging = false, startTranslate = 0, currentTranslate = 0;

    function getSlideWidth() {
        const slide = track.firstElementChild;
        if (!slide) return 0;
        return slide.offsetWidth + 12; // card + gap-3 (12px)
    }

    function goTo(idx) {
        const total = track.children.length;
        current = Math.max(0, Math.min(idx, total - 1));
        currentTranslate = -current * getSlideWidth();
        track.style.transform = `translateX(${currentTranslate}px)`;
        dots.forEach((d, i) => {
            if (i === current) {
                d.classList.add('active');
                d.classList.remove('bg-gray-300', 'bg-white/30');
                if (trackId === 'roadmap-track') {
                    d.classList.add('bg-navy');
                } else {
                    d.classList.add('bg-gold');
                }
            } else {
                d.classList.remove('active');
                d.classList.remove('bg-navy', 'bg-gold');
                if (trackId === 'roadmap-track') {
                    d.classList.add('bg-gray-300');
                } else {
                    d.classList.add('bg-white/30');
                }
            }
        });
    }

    // Touch events with smart vertical scroll lock prevention
    let startY = 0;
    let isScrolling = false;

    track.addEventListener('touchstart', e => {
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

        // Determine if user is scrolling page or sliding cards
        if (!isScrolling && isDragging) {
            if (Math.abs(diffY) > Math.abs(diffX)) {
                isScrolling = true;
                isDragging = false;
            }
        }

        // If dragging horizontally, prevent page scroll and translate track
        if (isDragging) {
            if (e.cancelable) e.preventDefault();
            track.style.transform = `translateX(${startTranslate + diffX}px)`;
        }
    }, { passive: false });

    track.addEventListener('touchend', e => {
        if (!isDragging) return;
        isDragging = false;
        track.style.transition = 'transform 0.3s ease-out';
        const diff = e.changedTouches[0].clientX - startX;
        if (Math.abs(diff) > 40) {
            goTo(diff < 0 ? current + 1 : current - 1);
        } else {
            goTo(current);
        }
    });

    // Mouse drag (desktop)
    track.addEventListener('mousedown', e => {
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
    });

    track.style.cursor = 'grab';
    return goTo;
}

// Init roadmap slider
const roadmapGoToFn = makeDragSlider('roadmap-track', 'roadmap-dots', 'roadmap-dot', 'bg-navy !w-5', 'bg-gray-300');
function roadmapGoTo(i) { if(roadmapGoToFn) roadmapGoToFn(i); }

// Init testimonials slider
const testiGoToFn = makeDragSlider('testi-track', 'testi-dots', 'testi-dot', 'bg-gold !w-5', 'bg-white/30');
function testiGoTo(i) { if(testiGoToFn) testiGoToFn(i); }
</script>
@endpush
