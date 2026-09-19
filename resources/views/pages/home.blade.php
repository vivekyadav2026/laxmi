@php
    $contactPhone = \App\Models\Setting::get('contact_phone', '+91 87505 30252');
    $cleanPhone = preg_replace('/[^0-9+]/', '', $contactPhone);
@endphp
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

<!-- 1. HERO SECTION --><!-- 1. HERO SECTION (COMPACT DESIGN) -->
<style>
    @keyframes float-1 { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }
    @keyframes float-2 { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-4px); } }
    @keyframes fade-in-up { 0% { opacity: 0; transform: translateY(20px); } 100% { opacity: 1; transform: translateY(0); } }
    
    .animate-float-1 { animation: float-1 4s ease-in-out infinite; }
    .animate-float-2 { animation: float-2 5s ease-in-out infinite 1s; }
    .animate-modal { animation: fade-in-up 0.3s ease-out forwards; }
    
    .hero-bg-pattern {
        background-color: #f8faf9;
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%232d7a4f' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    /* HARDCODED GRID TO BYPASS TAILWIND COMPILER */
    .hero-custom-grid {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }
    @media (min-width: 768px) {
        .hero-custom-grid {
            flex-direction: row;
            justify-content: space-between;
        }
        .hero-custom-col-left {
            width: 48%; /* Increased from 42% to close gap */
            padding-right: 20px;
        }
        .hero-custom-col-right {
            width: 52%; /* Decreased from 58% */
        }
    }

    /* CUSTOM SVG ANIMATIONS FROM USER */
    .hero-visual {
        width: 480px; max-width: 100%;
        aspect-ratio: 480/570;
        position: relative;
    }
    .hero-visual svg { width: 100%; height: 100%; display: block; }
    
    @media (prefers-reduced-motion: no-preference) {
        .svg-rocket { animation: svg-float 5s ease-in-out infinite; }
        .svg-flame { transform-origin: 240px 335px; animation: svg-flicker .6s ease-in-out infinite alternate; }
        .svg-pulse { transform-box: fill-box; transform-origin: center; animation: svg-pulse 2.8s ease-out infinite; }
        .svg-pulse:nth-of-type(2n) { animation-delay: .9s; }
        .svg-pulse:nth-of-type(3n) { animation-delay: 1.8s; }
    }
    @keyframes svg-float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
    @keyframes svg-flicker { from { transform: scaleY(.85); } to { transform: scaleY(1.15); } }
    @keyframes svg-pulse { 0% { transform: scale(1); opacity: .55; } 100% { transform: scale(2.6); opacity: 0; } }

    /* PREMIUM GLASSMORPHISM & TECH GLOW (From Reference Image) */
    .glass-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3));
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.9);
        box-shadow: 0 8px 32px 0 rgba(11, 31, 58, 0.1);
        border-radius: 16px;
        transition: all 0.3s ease;
    }
    .glass-card:hover {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.5));
        transform: translateY(-3px);
        box-shadow: 0 12px 40px 0 rgba(11, 31, 58, 0.15);
    }
    .glass-icon {
        background: linear-gradient(135deg, rgba(232, 243, 235, 0.9), rgba(232, 243, 235, 0.5));
        border: 1px solid rgba(255, 255, 255, 0.8);
        box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.6);
    }
    .tech-glow {
        position: absolute;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(45,122,79,0.12) 0%, rgba(11,31,58,0.03) 50%, transparent 100%);
        filter: blur(40px);
        z-index: 0;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
    }

    /* MOBILE RESPONSIVE TWEAKS */
    .hero-heading { font-size: 38px; line-height: 1.1; margin-top: 10px; }
    .hero-subheading { font-size: 15px; }
    .hero-svg-wrapper { height: 280px; }
    @media (min-width: 768px) {
        .hero-heading { font-size: 52px; margin-top: 0; }
        .hero-subheading { font-size: 17px; }
        .hero-svg-wrapper { height: 380px; }
    }
</style>

<section class="hero-bg-pattern relative pt-4 md:pt-6 pb-2 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- HARDCODED FLEXBOX GRID -->
        <div class="hero-custom-grid">
            
            <!-- LEFT COLUMN: Content -->
            <div class="hero-custom-col-left w-full flex flex-col items-start text-left z-20">
                <!-- Pill Badge -->
                <div class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 mb-3 shadow-sm border" style="background-color: #E8F3EB; border-color: #CDE5D4;">
                    <span class="text-sm">🚀</span>
                    <span class="font-extrabold uppercase tracking-wider" style="color: #1a4a2f; font-size: 11px;">
                        NEW STARTUP? YOU'RE IN THE RIGHT PLACE
                    </span>
                </div>
                
                <!-- Headline -->
                <h1 class="hero-heading font-extrabold mb-4 tracking-tight font-serif" style="color: #0B1F3A;">
                    <span class="block mb-1">Turn Your Idea</span>
                    <span class="block" style="color: #2D7A4F;">Into a Real Business</span>
                </h1>
                
                <!-- Subheadline -->
                <p class="hero-subheading mb-6 leading-relaxed font-medium" style="color: #4b5563; max-width: 580px;">
                    Company Registration, GST, Trademark, Compliance, Website, App, Digital Marketing and 80+ business services — all in one place. Simple. Affordable. Startup Friendly.
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 mb-8 mt-2 w-full sm:max-w-none mx-auto sm:mx-0">
                    <button onclick="document.getElementById('consultationModal').style.display='flex'" class="inline-flex items-center justify-center gap-2 font-bold px-6 py-3 rounded-md transition-all hover:-translate-y-0.5 whitespace-nowrap w-full sm:w-auto shadow-sm" style="background-color: #F5A623; color: #0B1F3A; font-size: 14px;">
                        <i class="fas fa-phone-alt"></i>
                        <span>Get Free Consultation</span>
                    </button>
                    <a href="/services" class="inline-flex items-center justify-center gap-2 bg-white border border-gray-300 font-bold px-6 py-3 rounded-md transition-all shadow-sm hover:bg-gray-50 whitespace-nowrap w-full sm:w-auto" style="color: #0B1F3A; font-size: 14px;">
                        <i class="fas fa-box-open"></i>
                        <span>View All Services</span>
                        <i class="fas fa-arrow-right text-xs ml-1 opacity-70"></i>
                    </a>
                </div>
                
                <!-- Mini Badges Row -->
                <div class="grid grid-cols-2 w-full" style="max-width: 500px; gap: 16px 20px;">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full text-white flex items-center justify-center text-xs shadow-sm" style="background-color: #2D7A4F;"><i class="fas fa-bolt"></i></div>
                        <span class="font-bold text-gray-800" style="font-size: 13px;">Startup Friendly</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs shadow-sm" style="background-color: #0B1F3A; color: #F5A623;"><i class="fas fa-rupee-sign"></i></div>
                        <span class="font-bold text-gray-800" style="font-size: 13px;">Affordable Pricing</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full text-white flex items-center justify-center text-xs shadow-sm" style="background-color: #1da154;"><i class="fas fa-users"></i></div>
                        <span class="font-bold text-gray-800" style="font-size: 13px;">Expert Support</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-full text-white flex items-center justify-center text-xs shadow-sm" style="background-color: #0B1F3A;"><i class="fas fa-shield-alt"></i></div>
                        <span class="font-bold text-gray-800" style="font-size: 13px;">End-to-End Guidance</span>
                    </div>
                </div>
            </div>
            
            <!-- RIGHT COLUMN: Image & Badges -->
            <div class="hero-custom-col-right w-full flex flex-col items-center mt-6 md:mt-0 relative pb-4">
                
                <!-- Top Journey Graphic -->
                <div class="flex items-center justify-center gap-4 mb-4 w-full" style="max-width: 380px; opacity: 0.95;">
                    <div class="flex flex-col items-center text-center">
                        <i class="far fa-lightbulb text-3xl" style="color: #F5A623; filter: drop-shadow(0 0 10px rgba(245,166,35,0.8));"></i>
                        <span class="font-bold tracking-widest mt-1 text-gray-800" style="font-size: 11px;">IDEA</span>
                    </div>
                    <div class="flex-grow border-t-2 border-dashed mx-2 -mt-4" style="border-color: rgba(45, 122, 79, 0.4);"></div>
                    <div class="flex flex-col items-center text-center">
                        <i class="far fa-file-alt text-2xl" style="color: #2D7A4F;"></i>
                        <span class="font-bold tracking-widest mt-1.5 text-gray-700" style="font-size: 11px;">SETUP</span>
                    </div>
                    <div class="flex-grow border-t-2 border-dashed mx-2 -mt-4" style="border-color: rgba(45, 122, 79, 0.4);"></div>
                    <div class="flex flex-col items-center text-center">
                        <i class="fas fa-chart-line text-2xl" style="color: #2D7A4F;"></i>
                        <span class="font-bold tracking-widest mt-1.5 text-gray-700" style="font-size: 11px;">GROW</span>
                    </div>
                </div>

                <!-- Main Wrapper for Image + Floating Badges -->
                <div class="relative w-full flex items-center justify-center hero-svg-wrapper mb-10 md:mb-0" style="max-width: 580px;">
                    
                    <!-- Futuristic Background Glow (from reference image style) -->
                    <div class="tech-glow"></div>

                    <!-- Center Animated Graphic (SVG from User) -->
                    <div class="relative flex flex-col items-center justify-center z-10 mt-4" style="width: 100%; max-width: 480px; height: 100%;">
                        
                        <div class="hero-visual w-full drop-shadow-2xl" role="img" aria-label="Rocket launching over a network of cities across India">
                          <svg viewBox="0 0 480 570" xmlns="http://www.w3.org/2000/svg" style="background: transparent;">
                            <defs>
                              <linearGradient id="sky" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0" stop-color="#eaf5ee" stop-opacity="0"/>
                                <stop offset="1" stop-color="#ffffff" stop-opacity="0"/>
                              </linearGradient>
                              <linearGradient id="body" x1="0" y1="0" x2="1" y2="0">
                                <stop offset="0" stop-color="#ffffff"/>
                                <stop offset="1" stop-color="#dfe8f2"/>
                              </linearGradient>
                              <linearGradient id="fire" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0" stop-color="#f5a623"/>
                                <stop offset="1" stop-color="#ffd98a"/>
                              </linearGradient>
                            </defs>

                            <!-- soft backdrop (Made transparent to blend with site bg) -->
                            <rect width="480" height="570" rx="60" fill="url(#sky)"/>

                            <!-- orbit rings -->
                            <g fill="none" stroke="#2f7d4f" stroke-opacity=".28" stroke-dasharray="3 9" stroke-linecap="round">
                              <circle cx="240" cy="290" r="120"/>
                              <circle cx="240" cy="290" r="190"/>
                            </g>

                            <!-- city network (connections) -->
                            <g stroke="#0f2447" stroke-opacity=".22" stroke-width="1.5" fill="none">
                              <path d="M110 200 L170 260 L240 290 L320 250 L380 190"/>
                              <path d="M170 260 L140 350 L210 420"/>
                              <path d="M320 250 L350 340 L290 430"/>
                              <path d="M240 290 L210 420 M240 290 L290 430"/>
                            </g>

                            <!-- city nodes (pulsing) -->
                            <g fill="#2f7d4f">
                              <circle class="svg-pulse" cx="110" cy="200" r="5" opacity=".5"/>
                              <circle class="svg-pulse" cx="380" cy="190" r="5" opacity=".5"/>
                              <circle class="svg-pulse" cx="140" cy="350" r="5" opacity=".5"/>
                              <circle class="svg-pulse" cx="350" cy="340" r="5" opacity=".5"/>
                              <circle class="svg-pulse" cx="210" cy="420" r="5" opacity=".5"/>
                              <circle class="svg-pulse" cx="290" cy="430" r="5" opacity=".5"/>
                              <circle cx="110" cy="200" r="6"/><circle cx="170" cy="260" r="6"/>
                              <circle cx="320" cy="250" r="6"/><circle cx="380" cy="190" r="6"/>
                              <circle cx="140" cy="350" r="6"/><circle cx="350" cy="340" r="6"/>
                              <circle cx="210" cy="420" r="6"/><circle cx="290" cy="430" r="6"/>
                            </g>
                            <circle cx="240" cy="290" r="8" fill="#f5a623"/>

                            <!-- rocket -->
                            <g class="svg-rocket">
                              <!-- flame -->
                              <g class="svg-flame">
                                <path d="M222 335 Q240 430 258 335 Z" fill="url(#fire)"/>
                                <path d="M232 335 Q240 385 248 335 Z" fill="#fff" opacity=".7"/>
                              </g>
                              <!-- fins -->
                              <path d="M212 285 L166 352 L214 334 Z" fill="#f5a623"/>
                              <path d="M268 285 L314 352 L266 334 Z" fill="#f5a623"/>
                              <!-- body -->
                              <path d="M240 96 C292 150 298 250 272 336 L208 336 C182 250 188 150 240 96 Z"
                                    fill="url(#body)" stroke="#0f2447" stroke-width="4" stroke-linejoin="round"/>
                              <!-- nose band -->
                              <path d="M240 96 C258 114 270 134 277 154 L203 154 C210 134 222 114 240 96 Z" fill="#2f7d4f"/>
                              <!-- window -->
                              <circle cx="240" cy="212" r="27" fill="#0f2447"/>
                              <circle cx="240" cy="212" r="19" fill="#cfe9d8"/>
                              <path d="M232 213 l6 6 l12 -13" fill="none" stroke="#2f7d4f" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                              <!-- nozzle -->
                              <rect x="216" y="330" width="48" height="14" rx="5" fill="#0f2447"/>
                            </g>

                            <!-- document card: GST / registration -->
                            <g transform="translate(58 396)">
                              <rect width="132" height="100" rx="14" fill="#fff" stroke="#0f2447" stroke-opacity=".12"/>
                              <rect x="16" y="18" width="46" height="8" rx="4" fill="#0f2447"/>
                              <rect x="16" y="38" width="98" height="6" rx="3" fill="#0f2447" opacity=".15"/>
                              <rect x="16" y="52" width="80" height="6" rx="3" fill="#0f2447" opacity=".15"/>
                              <circle cx="100" cy="76" r="14" fill="#2f7d4f"/>
                              <path d="M93 76 l5 5 l9 -10" fill="none" stroke="#fff" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
                              <text x="16" y="82" font-family="Inter,system-ui,sans-serif" font-size="14" font-weight="700" fill="#0f2447">GST ✔</text>
                            </g>

                            <!-- rupee coin -->
                            <g transform="translate(372 452)">
                              <circle r="40" fill="#f5a623"/>
                              <circle r="32" fill="none" stroke="#fff" stroke-opacity=".6" stroke-width="2.5" stroke-dasharray="4 5"/>
                              <text y="13" text-anchor="middle" font-family="Inter,system-ui,sans-serif" font-size="38" font-weight="800" fill="#0f2447">₹</text>
                            </g>

                            <!-- small trademark badge -->
                            <g transform="translate(96 132)">
                              <circle r="24" fill="#0f2447"/>
                              <text y="6" text-anchor="middle" font-family="Inter,system-ui,sans-serif" font-size="15" font-weight="800" fill="#fff">TM</text>
                            </g>

                          </svg>
                        </div>
                    </div>

                    <!-- Left Floating Badges -->
                    <div class="absolute animate-float-1 hidden sm:flex flex-col gap-4 z-20" style="left: -25px; top: 10%;">
                        <div class="glass-card p-2.5 flex items-center gap-3" style="width: 195px;">
                            <div class="glass-icon w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="color: #2D7A4F;"><i class="fas fa-building text-sm"></i></div>
                            <span class="font-extrabold leading-tight" style="color: #0B1F3A; font-size: 11px;">Company<br>Registration</span>
                        </div>
                        <div class="glass-card p-2.5 flex items-center gap-3" style="width: 195px;">
                            <div class="glass-icon w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="color: #2D7A4F;"><i class="fas fa-file-invoice-dollar text-sm"></i></div>
                            <span class="font-extrabold leading-tight" style="color: #0B1F3A; font-size: 11px;">GST Filing</span>
                        </div>
                        <div class="glass-card p-2.5 flex items-center gap-3" style="width: 195px;">
                            <div class="glass-icon w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="color: #2D7A4F;"><span class="font-black text-[12px]">TM</span></div>
                            <span class="font-extrabold leading-tight" style="color: #0B1F3A; font-size: 11px;">Trademark<br>& IPR</span>
                        </div>
                    </div>

                    <!-- Right Floating Badges -->
                    <div class="absolute animate-float-2 hidden sm:flex flex-col gap-4 z-20" style="right: -25px; bottom: 10%;">
                        <div class="glass-card p-2.5 flex items-center gap-3" style="width: 195px;">
                            <div class="glass-icon w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="color: #2D7A4F;"><i class="fas fa-bullhorn text-sm"></i></div>
                            <span class="font-extrabold leading-tight" style="color: #0B1F3A; font-size: 11px;">Digital<br>Marketing</span>
                        </div>
                        <div class="glass-card p-2.5 flex items-center gap-3" style="width: 195px;">
                            <div class="glass-icon w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="color: #2D7A4F;"><i class="fas fa-clipboard-check text-sm"></i></div>
                            <span class="font-extrabold leading-tight" style="color: #0B1F3A; font-size: 11px;">Compliance<br>Services</span>
                        </div>
                        <div class="glass-card p-2.5 flex items-center gap-3" style="width: 195px;">
                            <div class="glass-icon w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="color: #2D7A4F;"><i class="fas fa-th-large text-sm"></i></div>
                            <span class="font-extrabold leading-tight" style="color: #0B1F3A; font-size: 11px;">80+ More<br>Services</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- BOTTOM STATS BAR (COMPACT) -->
<div class="w-full flex flex-col lg:flex-row border-b relative z-20" style="background-color: #F0F7F2; border-color: #CDE5D4;">
    <!-- Left light area -->
    <div class="w-full lg:w-[60%] grid grid-cols-2 md:grid-cols-4 gap-3 px-4 py-4 md:px-6 border-r border-gray-200">
        <div class="flex items-center gap-2 justify-center md:justify-start">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm shrink-0" style="background-color: #D4E9DA; color: #2D7A4F;"><i class="fas fa-users"></i></div>
            <div>
                <div class="font-bold leading-none" style="color: #0B1F3A; font-size: 15px;">100+</div>
                <div class="text-gray-500 font-bold uppercase tracking-wider mt-0.5" style="font-size: 9px;">Clients</div>
            </div>
        </div>
        <div class="flex items-center gap-2 justify-center md:justify-start">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm shrink-0" style="background-color: #F5A623; color: #0B1F3A;"><i class="fas fa-star"></i></div>
            <div>
                <div class="font-bold leading-none" style="color: #0B1F3A; font-size: 15px;">80+</div>
                <div class="text-gray-500 font-bold uppercase tracking-wider mt-0.5" style="font-size: 9px;">Services</div>
            </div>
        </div>
        <div class="flex items-center gap-2 justify-center md:justify-start">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm shrink-0" style="background-color: #D4E9DA; color: #2D7A4F;"><i class="fas fa-headset"></i></div>
            <div>
                <div class="font-bold leading-none" style="color: #0B1F3A; font-size: 15px;">48Hr</div>
                <div class="text-gray-500 font-bold uppercase tracking-wider mt-0.5" style="font-size: 9px;">Response</div>
            </div>
        </div>
        <div class="flex items-center gap-2 justify-center md:justify-start">
            <div class="w-8 h-8 rounded-full border border-red-200 bg-white text-red-500 flex items-center justify-center text-sm shadow-sm shrink-0"><i class="fas fa-heart"></i></div>
            <div>
                <div class="font-bold leading-none" style="color: #0B1F3A; font-size: 15px;">Dedicated</div>
                <div class="text-gray-500 font-bold uppercase tracking-wider mt-0.5" style="font-size: 9px;">Support</div>
            </div>
        </div>
    </div>
    <!-- Right slanted dark area -->
    <div class="w-full lg:w-[40%] flex items-center justify-center lg:justify-end px-6 py-4 lg:-ml-[5%]" style="background-color: #0B1F3A; clip-path: polygon(8% 0, 100% 0, 100% 100%, 0% 100%);">
        <div class="flex items-center gap-4 lg:pr-8">
            <div class="text-white text-center lg:text-right">
                <div class="font-bold font-serif leading-snug" style="font-size: 15px;">Let's Build the Next</div>
                <div class="font-bold font-serif leading-snug text-gray-300" style="font-size: 15px;">Success Story — Yours!</div>
            </div>
            <button onclick="document.getElementById('consultationModal').style.display='flex'" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-lg hover:scale-110 transition-transform shadow-lg shrink-0" style="color: #0B1F3A;">
                <i class="fas fa-arrow-right -rotate-45"></i>
            </button>
        </div>
    </div>
</div>

<!-- CONSULTATION MODAL (POPUP) -->
<div id="consultationModal" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center backdrop-blur-sm p-4 bg-black/70">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-[500px] overflow-hidden animate-modal relative">
        
        <!-- Close Button -->
        <button onclick="document.getElementById('consultationModal').style.display='none'" class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-red-500 transition-colors z-10">
            <i class="fas fa-times"></i>
        </button>

        <!-- Modal Header -->
        <div class="p-6 md:p-8 border-b border-gray-100" style="background: linear-gradient(to right, #F0F7F2, white);">
            <h3 class="text-2xl font-bold font-serif mb-2" style="color: #0B1F3A;">Speak with Experts</h3>
            <p class="text-gray-500 text-sm">We reply within 2 hours. Your data is 100% secure.</p>
            <div class="w-12 h-1 rounded-full mt-4" style="background-color: #F5A623;"></div>
        </div>
        
        <!-- Modal Body (Form) -->
        <div class="p-6 md:p-8">
            @if(session('callback_success'))
                <div class="mb-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl font-medium">
                    ✓ {{ session('callback_success') }}
                </div>
            @endif
            
            <form action="{{ route('callback.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1 uppercase tracking-wider">Your Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. Rahul Kumar" class="w-full bg-gray-50 border @error('name') border-red-500 @else border-gray-200 @enderror rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none transition-colors" style="outline-color: #2D7A4F;">
                </div>
                
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1 uppercase tracking-wider">Mobile Number</label>
                    <div class="flex">
                        <span class="bg-gray-100 border border-gray-200 border-r-0 rounded-l-xl px-3 py-3 text-sm text-gray-500 font-bold flex items-center">+91</span>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="9876543210" maxlength="10" class="w-full bg-gray-50 border @error('phone') border-red-500 @else border-gray-200 @enderror rounded-r-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none transition-colors" style="outline-color: #2D7A4F;">
                    </div>
                </div>
                
                <div>
                    <label class="block text-[10px] font-bold text-gray-500 mb-1 uppercase tracking-wider">Service Needed</label>
                    <select name="service" required class="w-full bg-gray-50 border @error('service') border-red-500 @else border-gray-200 @enderror rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none transition-colors appearance-none" style="outline-color: #2D7A4F; background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%232D7A4F' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19.5 8.25l-7.5 7.5-7.5-7.5'/%3E%3C/svg%3E&quot;); background-repeat: no-repeat; background-position: right 14px center; background-size: 14px;">
                        <option value="">Select Service...</option>
                        <option value="company-reg">Company Registration</option>
                        <option value="gst">GST</option>
                        <option value="trademark">Trademark</option>
                        <option value="website-dev">Website Development</option>
                        <option value="app-dev">App Development</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <button type="submit" class="w-full text-white text-[15px] font-extrabold py-3.5 rounded-xl transition-all shadow-md mt-2" style="background-color: #2D7A4F;">
                    Request Callback 📞
                </button>
            </form>
        </div>
    </div>
</div>
<!-- SCRIPTS FOR MODAL -->
<script>
    // If the form was submitted and there's an error, we should show the modal again on page load
    @if($errors->any() || session('callback_success'))
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('consultationModal').style.display='flex';
        });
    @endif
    
    // Close modal if clicking outside the white box
    document.getElementById('consultationModal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.style.display='none';
        }
    });
</script>

<!-- 2. STARTUP JOURNEY ROADMAP -->
<section class="py-16 md:py-24 bg-[#FAF9F5] relative z-20 overflow-hidden border-b border-[#E8E6DF]">
    <!-- Architectural subtle grid & ambient luxury glow -->
    <div class="absolute inset-0 pointer-events-none opacity-60" style="background-image: linear-gradient(to right, rgba(11,31,58,0.03) 1px, transparent 1px), linear-gradient(to bottom, rgba(11,31,58,0.03) 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-72 bg-gradient-to-b from-[#D4A843]/10 to-transparent blur-3xl pointer-events-none"></div>
    
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-12 md:mb-16 flex flex-col items-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-[#D4A843]/40 text-[#9C7524] text-[11px] font-extrabold uppercase tracking-[0.25em] mb-4 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-[#D4A843] animate-pulse"></span>
                <span>HOW IT WORKS &bull; 5-STEP PROCESS</span>
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#0B1F3A] font-serif tracking-tight leading-[1.15] mb-4">
                From Business Idea to <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#0B1F3A] via-[#9C7524] to-[#D4A843]">Official Launch</span>
            </h2>
            <p class="text-sm sm:text-base text-slate-600 max-w-2xl mx-auto leading-relaxed">
                Starting a business in India doesn't have to be complicated. We guide you step-by-step through company registration, government approvals, tax setup, and your digital presence — completely online with dedicated expert support.
            </p>
            <div class="mt-4 inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-50/90 border border-emerald-200 text-emerald-800 text-xs font-semibold shadow-xs">
                <i class="fas fa-shield-check text-emerald-600"></i>
                <span>You retain 100% equity & ownership of your company &bull; We handle the legal paperwork and filings.</span>
            </div>
        </div>

        @php
        $roadmapSteps = [
            [
                'step' => '01',
                'phase' => 'PHASE 01 &bull; STRATEGY',
                'title' => 'Vision & Structuring',
                'status' => 'Advisory',
                'icon' => 'fas fa-lightbulb',
                'desc' => 'Select the optimal legal entity (Pvt Ltd, LLP, or OPC), check name availability with MCA, and plan founder equity.',
                'deliverables' => [
                    'Entity Advisory & Structuring',
                    'MCA Name Availability Check',
                    'Founders Equity Split Plan'
                ],
                'is_we_handle' => false,
            ],
            [
                'step' => '02',
                'phase' => 'PHASE 02 &bull; REGISTRATION',
                'title' => 'Govt Incorporation',
                'status' => 'MCA Filing',
                'icon' => 'fas fa-building-columns',
                'desc' => 'Thorough SPICe+ MCA filing, director KYC verification, Digital Signatures (DSC), and official COI Certificate.',
                'deliverables' => [
                    'Govt COI (Certificate of Inc.)',
                    'MOA & AOA Charter Documents',
                    'Official PAN & TAN Allotment'
                ],
                'is_we_handle' => true,
            ],
            [
                'step' => '03',
                'phase' => 'PHASE 03 &bull; COMPLIANCE',
                'title' => 'Tax & Brand Armor',
                'status' => 'Tax & IP',
                'icon' => 'fas fa-shield-halved',
                'desc' => 'Activate your GSTIN registration, protect your brand name and logo with Trademark (TM) filing, and execute agreements.',
                'deliverables' => [
                    'GSTIN Registration Certificate',
                    'Trademark (TM) Application Filing',
                    'Founders & IP Assignment Deal'
                ],
                'is_we_handle' => true,
            ],
            [
                'step' => '04',
                'phase' => 'PHASE 04 &bull; TECH & BANK',
                'title' => 'Tech & Banking Setup',
                'status' => 'Platform',
                'icon' => 'fas fa-laptop-code',
                'desc' => 'Launch your custom business website or app, open a zero-balance corporate bank account, and integrate payment gateway.',
                'deliverables' => [
                    'Custom Business Website / App',
                    'Corporate Current Account Live',
                    'Online Payment Gateway Setup'
                ],
                'is_we_handle' => true,
            ],
            [
                'step' => '05',
                'phase' => 'PHASE 05 &bull; SCALE',
                'title' => 'Launch & Operations',
                'status' => 'Go-To-Market',
                'icon' => 'fas fa-rocket',
                'desc' => 'Officially launch operations, secure Startup India (DPIIT) recognition, and prepare your deck for future investor funding.',
                'deliverables' => [
                    'Public Go-To-Market Launch',
                    'Startup India (DPIIT) Recognition',
                    'Investor Deck Prep (Future Plan)'
                ],
                'is_we_handle' => true,
            ]
        ];
        @endphp

        <!-- DESKTOP PIPELINE: Connected Stage Track (lg:block) -->
        <div class="hidden lg:block mb-8">
            <!-- Connecting Pipeline Rail with Milestone Markers -->
            <div class="relative mb-8 px-4">
                <div class="absolute top-[16px] left-[7%] right-[7%] h-[3px] bg-gradient-to-r from-[#D4A843]/40 via-[#D4A843] to-[#2D7A4F] -z-0 rounded-full"></div>
                
                <div class="grid grid-cols-5 relative z-10 text-center">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-[#0B1F3A] text-[#D4A843] border-2 border-white ring-4 ring-[#D4A843]/20 flex items-center justify-center text-xs font-black shadow-md font-sans">
                            1
                        </div>
                        <span class="text-[11px] font-bold text-slate-700 mt-2 uppercase tracking-wider">Strategy</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-[#0B1F3A] text-[#D4A843] border-2 border-white ring-4 ring-[#D4A843]/20 flex items-center justify-center text-xs font-black shadow-md font-sans">
                            2
                        </div>
                        <span class="text-[11px] font-bold text-slate-700 mt-2 uppercase tracking-wider">Incorporation</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-[#0B1F3A] text-[#D4A843] border-2 border-white ring-4 ring-[#D4A843]/20 flex items-center justify-center text-xs font-black shadow-md font-sans">
                            3
                        </div>
                        <span class="text-[11px] font-bold text-slate-700 mt-2 uppercase tracking-wider">Compliance</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-[#0B1F3A] text-[#D4A843] border-2 border-white ring-4 ring-[#D4A843]/20 flex items-center justify-center text-xs font-black shadow-md font-sans">
                            4
                        </div>
                        <span class="text-[11px] font-bold text-slate-700 mt-2 uppercase tracking-wider">Tech & Bank</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full bg-[#2D7A4F] text-white border-2 border-white ring-4 ring-[#2D7A4F]/20 flex items-center justify-center text-xs font-black shadow-md font-sans">
                            5
                        </div>
                        <span class="text-[11px] font-bold text-slate-700 mt-2 uppercase tracking-wider">Go Live</span>
                    </div>
                </div>
            </div>
            
            <!-- 5 Premium Milestone Cards -->
            <div class="grid grid-cols-5 gap-4 xl:gap-5">
                @foreach($roadmapSteps as $s)
                <div class="bg-white rounded-2xl border border-[#E2DFD7] p-5 xl:p-6 flex flex-col justify-between transition-all duration-300 hover:shadow-[0_20px_40px_-10px_rgba(11,31,58,0.12)] hover:border-[#D4A843] hover:-translate-y-2 group relative">
                    <!-- Top subtle accent bar on hover -->
                    <div class="absolute top-0 left-6 right-6 h-[2px] bg-gradient-to-r from-transparent via-[#D4A843] to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div>
                        <!-- Header Row: Step Pill + Status Badge -->
                        <div class="flex items-center justify-between mb-4">
                            <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-full bg-[#0B1F3A] text-[#D4A843] text-[11px] font-black tracking-wider shadow-sm font-sans">
                                STEP {{ $s['step'] }}
                            </span>
                            <span class="inline-flex items-center gap-1.5 text-[11px] font-bold text-slate-600 bg-[#FAF9F5] px-2.5 py-1 rounded-full border border-[#E8E6DF]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#D4A843]"></span> {{ $s['status'] }}
                            </span>
                        </div>

                        <!-- Luxury Icon -->
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FAF6EE] to-[#F2EDE2] border border-[#E5DEC9] flex items-center justify-center text-[#B8892E] text-xl shadow-sm mb-3 group-hover:bg-[#0B1F3A] group-hover:text-[#D4A843] group-hover:border-[#0B1F3A] transition-all duration-300">
                            <i class="{{ $s['icon'] }}"></i>
                        </div>

                        <!-- Titles -->
                        <div class="text-[9px] font-black uppercase tracking-[0.16em] text-[#B8892E] mb-1">
                            {!! $s['phase'] !!}
                        </div>
                        <h3 class="text-[16px] font-bold text-[#0B1F3A] font-serif leading-snug mb-2 group-hover:text-[#B8892E] transition-colors">
                            {{ $s['title'] }}
                        </h3>
                        <p class="text-[11px] text-slate-500 leading-relaxed min-h-[44px]">
                            {{ $s['desc'] }}
                        </p>

                        <!-- Deliverables Structured Box -->
                        <div class="mt-4 pt-3 border-t border-slate-100 bg-[#FAF9F5]/80 rounded-xl p-3 border border-[#EAE7DF]">
                            <div class="text-[9px] font-extrabold uppercase tracking-widest text-slate-400 mb-2 flex items-center justify-between">
                                <span>DELIVERABLES</span>
                                <i class="fas fa-layer-group text-[9px] text-[#D4A843]"></i>
                            </div>
                            <ul class="space-y-1.5">
                                @foreach($s['deliverables'] as $item)
                                <li class="flex items-center gap-2 text-[11px] font-semibold text-slate-700">
                                    <span class="w-3.5 h-3.5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[8px] shrink-0 font-bold">✓</span>
                                    <span class="truncate">{{ $item }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Execution Row -->
                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px]">
                        <span class="text-slate-400 font-medium">Execution</span>
                        @if($s['is_we_handle'])
                        <span class="inline-flex items-center gap-1.5 font-bold text-emerald-700 bg-emerald-50 border border-emerald-200/70 px-2.5 py-0.5 rounded-full text-[10px]">
                            <i class="fas fa-check-circle text-emerald-600"></i> Done By Foundida
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 font-bold text-slate-800 bg-[#FAF9F5] border border-slate-200 px-2.5 py-0.5 rounded-full text-[10px]">
                            <i class="fas fa-handshake text-[#D4A843]"></i> Joint Advisory
                        </span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- TABLET & MOBILE TIMELINE STEPPER (lg:hidden) -->
        <div class="lg:hidden space-y-4 mb-10">
            @foreach($roadmapSteps as $index => $s)
            <div class="flex gap-3 sm:gap-4 items-stretch">
                <!-- Left timeline track: Step Badge + Continuous Line -->
                <div class="flex flex-col items-center shrink-0 w-8 sm:w-10">
                    <!-- Step badge -->
                    <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl {{ $s['is_we_handle'] ? 'bg-[#0B1F3A] text-[#D4A843] ring-2 ring-[#0B1F3A]/20' : 'bg-[#D4A843] text-[#0B1F3A] ring-2 ring-[#D4A843]/40' }} font-black text-xs flex items-center justify-center shadow-md font-sans shrink-0">
                        {{ $s['step'] }}
                    </div>
                    <!-- Connecting line between steps -->
                    @if(!$loop->last)
                    <div class="w-[2px] flex-grow bg-gradient-to-b from-[#D4A843] via-[#0B1F3A]/30 to-[#E2DFD7] my-1.5 rounded-full"></div>
                    @endif
                </div>

                <!-- Right Card: Zero chance of overlap -->
                <div class="flex-1 bg-white border border-[#E2DFD7] rounded-2xl p-4 sm:p-5 shadow-sm hover:shadow-md transition-shadow">
                    <!-- Top header: Phase tag + Status pill -->
                    <div class="flex items-center justify-between gap-2 mb-2 flex-wrap">
                        <span class="text-[9px] font-black uppercase tracking-wider text-[#B8892E] bg-[#FAF6EE] border border-[#E5DEC9] px-2 py-0.5 rounded">
                            {!! $s['phase'] !!}
                        </span>
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold text-slate-600 bg-[#FAF9F5] px-2 py-0.5 rounded-full shrink-0 border border-[#E8E6DF]">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#D4A843]"></span> {{ $s['status'] }}
                        </span>
                    </div>

                    <!-- Title with Icon -->
                    <div class="flex items-center gap-2.5 mb-2">
                        <div class="w-8 h-8 rounded-lg bg-[#FAF6EE] border border-[#E5DEC9] flex items-center justify-center text-[#B8892E] text-sm shrink-0">
                            <i class="{{ $s['icon'] }}"></i>
                        </div>
                        <h3 class="text-[15px] sm:text-[16px] font-bold text-[#0B1F3A] font-serif leading-snug">
                            {{ $s['title'] }}
                        </h3>
                    </div>

                    <!-- Description -->
                    <p class="text-[12px] text-slate-600 leading-relaxed mb-3">
                        {{ $s['desc'] }}
                    </p>

                    <!-- Deliverables Box -->
                    <div class="bg-[#FAF9F5] rounded-xl p-3 border border-[#EAE7DF] mb-3">
                        <div class="text-[9px] font-extrabold uppercase tracking-widest text-slate-400 mb-2 flex items-center justify-between">
                            <span>DELIVERABLES</span>
                            <i class="fas fa-check-double text-[9px] text-[#D4A843]"></i>
                        </div>
                        <ul class="space-y-1.5">
                            @foreach($s['deliverables'] as $item)
                            <li class="flex items-start gap-2 text-[11px] font-semibold text-slate-700 leading-tight">
                                <span class="w-3.5 h-3.5 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-[8px] shrink-0 font-bold mt-0.5">✓</span>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Bottom Execution Row -->
                    <div class="pt-2.5 border-t border-slate-100 flex items-center justify-between text-[11px]">
                        <span class="text-slate-400 font-medium">Execution</span>
                        @if($s['is_we_handle'])
                        <span class="inline-flex items-center gap-1 text-[#2D7A4F] font-bold bg-[#2D7A4F]/10 px-2.5 py-0.5 rounded-full border border-[#2D7A4F]/20 text-[10px]">
                            <i class="fas fa-check-circle text-[9px]"></i> Done By Foundida
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1 text-[#0B1F3A] font-bold bg-[#FAF9F5] px-2.5 py-0.5 rounded-full border border-slate-200 text-[10px]">
                            <i class="fas fa-handshake text-[9px] text-[#D4A843]"></i> Joint Advisory
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- ACTION CALLOUT DOCK -->
        <div class="bg-[#0B1F3A] rounded-2xl md:rounded-3xl p-5 sm:p-7 md:p-10 text-white shadow-2xl border border-[#D4A843]/40 relative overflow-hidden">
            <!-- Ambient gold background glow -->
            <div class="absolute -right-16 -top-16 w-64 h-64 bg-[#D4A843]/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -left-16 -bottom-16 w-64 h-64 bg-[#2D7A4F]/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-6">
                <!-- Left: Branding & Message -->
                <div class="flex items-center gap-4 sm:gap-5 text-center sm:text-left flex-col sm:flex-row w-full lg:w-auto">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-[#D4A843] to-[#A67828] text-[#0B1F3A] flex items-center justify-center text-2xl sm:text-3xl shadow-xl shrink-0">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div>
                        <div class="inline-flex items-center justify-center sm:justify-start gap-2 text-[10px] sm:text-xs font-bold text-[#D4A843] uppercase tracking-widest mb-1">
                            <span class="w-2 h-2 rounded-full bg-[#D4A843] animate-ping"></span>
                            <span>SEAMLESS LEGAL INCORPORATION</span>
                        </div>
                        <h3 class="text-xl sm:text-2xl md:text-3xl font-bold font-serif text-white leading-tight">
                            Ready to launch your company?
                        </h3>
                        <p class="text-xs md:text-sm text-slate-300 mt-1 max-w-xl leading-relaxed">
                            Start Step 01 today. We handle your complete entity incorporation with MCA, deliver digital signatures, and manage GST registration with dedicated legal expert guidance.
                        </p>
                    </div>
                </div>

                <!-- Right: Actions -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full lg:w-auto shrink-0 justify-center">
                    <a href="/packages" class="bg-gradient-to-r from-[#D4A843] via-[#E2BC5D] to-[#D4A843] hover:brightness-105 text-[#0B1F3A] font-extrabold text-sm px-7 py-3.5 sm:py-4 rounded-xl shadow-xl hover:shadow-[#D4A843]/25 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2.5 w-full sm:w-auto font-sans">
                        <span>Start Registration</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                    <a href="tel:{{ $cleanPhone }}" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 font-bold text-sm px-5 py-3.5 sm:py-4 rounded-xl transition-all flex items-center justify-center gap-2 w-full sm:w-auto">
                        <i class="fas fa-phone-alt text-[#D4A843]"></i>
                        <span>Free Advisory</span>
                    </a>
                </div>
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
                <span class="text-[10px] font-bold text-[#D4A843] uppercase tracking-widest"><i class="fas fa-compass mr-1"></i> FUTURE ECOSYSTEM &bull; ROADMAP</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-extrabold font-serif text-white leading-tight mb-4">
                Startup Funding <span class="text-[#D4A843]">Ecosystem</span>
            </h2>
            <p class="text-gray-300 mb-6 max-w-lg text-sm md:text-base leading-relaxed">
                In our upcoming roadmap, we plan to connect verified startups with angel investors, grants, incubators, and government funding schemes.
            </p>
            
            <div class="flex flex-wrap gap-3 mb-8 justify-center md:justify-start">
                <a href="{{ route('funding.index') }}" class="bg-[#D4A843] text-[#0B1F3A] px-7 py-3.5 rounded-xl font-extrabold hover:bg-[#E8B96A] transition-all shadow-lg hover:-translate-y-0.5 inline-flex items-center gap-2 text-sm">
                    <i class="fas fa-search"></i> View Funding Programs
                </a>
                <a href="/contact" class="bg-white/10 hover:bg-white/20 text-white border border-white/20 px-7 py-3.5 rounded-xl font-bold transition-all inline-flex items-center gap-2 text-sm">
                    ✨ Join Waiting List
                </a>
            </div>

            <!-- Disclaimer notice -->
            <div class="text-[10px] text-gray-400 bg-white/5 border border-white/10 p-3.5 rounded-xl max-w-lg text-left">
                <span class="text-gold font-bold">Important Notice:</span> Foundida does not provide direct loans or funds today. This is an upcoming ecosystem initiative. Currently, we assist founders with entity registration, legal compliance, trademark protection, and pitch deck readiness.
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
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">Legal Services</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Legal Services</p>
            <p class="text-[12px] md:text-[16px] text-gray-600 max-w-[500px] mx-auto hidden md:block">Everything legally sorted — transparent pricing, zero hassle.</p>
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
                    'sub' => $svc->category ? strtoupper($svc->category->name) : 'LEGAL SERVICE',
                    'desc' => $svc->time ? "Processing Time: {$svc->time}" : 'Complete legal processing and compliance.',
                    'price' => $svc->price ?: '₹999',
                    'old_price' => $svc->old_price,
                    'badge' => $svc->badge_en ?: $svc->badge_hi,
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
                    <span class="text-white text-[15px] font-bold">View All Legal Services</span>
                    <span class="text-[10px] uppercase tracking-widest text-[#D4A843] font-bold mt-0.5">Explore All Legal Offerings</span>
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
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">Tech Services</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Tech Services</p>
            <p class="text-[12px] md:text-[16px] text-gray-600 max-w-[500px] mx-auto hidden md:block">Scalable, fast, and modern tech solutions for startups.</p>
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
                    'sub' => 'TECH SERVICE',
                    'desc' => $svc->time ? "Delivery Time: {$svc->time}" : 'Scalable, fast tech solutions.',
                    'price' => $svc->price ?: '₹2,999',
                    'old_price' => $svc->old_price,
                    'badge' => $svc->badge_en ?: $svc->badge_hi,
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
                    <span class="text-white text-[15px] font-bold">View All Tech Services</span>
                    <span class="text-[10px] uppercase tracking-widest text-[#D4A843] font-bold mt-0.5">Explore All Tech Solutions</span>
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
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">Best Value Packages</h2>
            <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Best Value Packages</p>
            <p class="text-[13px] md:text-[16px] text-gray-600 max-w-[600px] mx-auto hidden md:block">Get everything you need in one go and save up to 40%.</p>
        </div>

        <!-- Tab Switcher -->
        <div class="flex items-center justify-center gap-3 mb-12">
            <button @click="activeTab = 'legal'" 
                    type="button"
                    :class="activeTab === 'legal' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-navy/5 text-gray-500 hover:bg-navy/10'" 
                    class="px-6 py-2.5 text-sm font-extrabold rounded-xl transition-all whitespace-nowrap flex flex-col items-center">
                <span class="text-base font-bold">Legal Packages</span>
            </button>
            <button @click="activeTab = 'tech'" 
                    type="button"
                    :class="activeTab === 'tech' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-navy/5 text-gray-500 hover:bg-navy/10'" 
                    class="px-6 py-2.5 text-sm font-extrabold rounded-xl transition-all whitespace-nowrap flex flex-col items-center">
                <span class="text-base font-bold">Tech Packages</span>
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
                            <span class="text-[16px] font-extrabold">Get Started</span>
                            <span class="text-[10px] uppercase tracking-widest mt-0.5">Select {{ $pkg->name_en }}</span>
                        </button>
                    </div>
                @else
                    <!-- Regular Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                        <div class="flex flex-col mb-6 pb-6 border-b border-gray-100">
                            <h3 class="text-2xl font-bold text-navy mb-1">{{ $pkg->name_en }}</h3>
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
                            <span class="text-[15px]">Get Started</span>
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
                        @if($pkg->badge_en ?: $pkg->badge_hi)
                            <div class="absolute -top-4 inset-x-0 flex justify-center">
                                <div class="bg-gold text-navy px-4 py-1.5 rounded-full text-xs font-bold shadow-md flex flex-col items-center leading-tight">
                                    <span>{{ $pkg->badge_en ?: $pkg->badge_hi }}</span>
                                </div>
                            </div>
                        @endif
                        <div class="flex flex-col mb-6 pb-6 border-b border-gray-100 mt-2">
                            <h3 class="text-2xl font-bold text-navy mb-1">{{ $pkg->name_en }}</h3>
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
                            <span class="text-[16px] font-extrabold">Get Started</span>
                            <span class="text-[10px] uppercase tracking-widest mt-0.5">Select {{ $pkg->name_en }}</span>
                        </button>
                    </div>
                @else
                    <!-- Regular Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                        <div class="flex flex-col mb-6 pb-6 border-b border-gray-100">
                            <h3 class="text-2xl font-bold text-navy mb-1">{{ $pkg->name_en }}</h3>
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
                            <span class="text-[15px]">Get Started</span>
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
                                <span x-text="selectedPkgNameEn"></span>
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
                            <span class="text-[16px] font-extrabold">Submit Inquiry</span>
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
            <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">Our Expert Team</h2>
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
            <h2 class="text-[22px] md:text-[44px] font-bold text-gold mb-1 md:mb-[8px] font-serif">Trusted by Founders</h2>
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
                <h2 class="text-[22px] md:text-[44px] font-bold text-navy mb-1 md:mb-[8px] font-serif">Articles & Insights</h2>
                <p class="text-[10px] md:text-[12px] font-bold text-gold uppercase tracking-[0.2em] mb-1 md:mb-[16px]">Legal & Tech Tips</p>
            </div>
            <a href="/blog" class="text-[11px] text-navy font-bold hover:text-gold transition-colors flex items-center gap-1 mt-1 md:mt-0">
                All Articles →
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
                            {{ $post->title_en ?? $post->title_hi }}
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
                        <h3 class="text-[12px] md:text-[18px] font-bold text-navy mb-1 md:mb-[12px] group-hover:text-gold transition-colors leading-snug">Pvt Ltd vs LLP: Which One is Right For You?</h3>
                        <p class="text-[11px] md:text-[13px] text-gray-500 mb-2 md:mb-[24px] flex-grow hidden md:block">Registration costs, compliance burden, and fundraising potential explained.</p>
                        <div class="text-[10px] md:text-[12px] text-gold font-bold uppercase tracking-wider flex items-center mt-auto">Read &rarr;</div>
                    </div>
                </a>
                <a href="/blog/website-zaruri-hai-business-ke-liye" class="bg-white border border-gray-100 rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all group flex flex-col cursor-pointer">
                    <div class="h-[4px] md:h-[6px] bg-gold w-full"></div>
                    <div class="p-3 md:p-[32px] flex flex-col flex-grow">
                        <div class="text-gold text-[8px] md:text-[10px] font-bold mb-2 md:mb-[12px] uppercase tracking-widest bg-gold/10 inline-block self-start px-2 md:px-3 py-1 rounded-full">TECH</div>
                        <h3 class="text-[12px] md:text-[18px] font-bold text-navy mb-1 md:mb-[12px] group-hover:text-gold transition-colors leading-snug">Why Every Business Needs a Website (2026)</h3>
                        <p class="text-[11px] md:text-[13px] text-gray-500 mb-2 md:mb-[24px] flex-grow hidden md:block">How a professional website acts as your 24/7 sales representative.</p>
                        <div class="text-[10px] md:text-[12px] text-gold font-bold uppercase tracking-wider flex items-center mt-auto">Read &rarr;</div>
                    </div>
                </a>
                <a href="/blog/gst-registration-guide-2026" class="bg-white border border-gray-100 rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all group flex flex-col cursor-pointer hidden md:flex">
                    <div class="h-[6px] bg-navy w-full"></div>
                    <div class="p-[32px] flex flex-col flex-grow">
                        <div class="text-navy text-[10px] font-bold mb-[12px] uppercase tracking-widest bg-navy/5 inline-block self-start px-3 py-1 rounded-full">COMPLIANCE</div>
                        <h3 class="text-[18px] font-bold text-navy mb-[12px] group-hover:text-gold transition-colors leading-tight">GST Registration: Who Needs It?</h3>
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

