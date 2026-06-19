<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Foundida.')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- PWA / App Feel Meta -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="theme-color" content="#0B1F3A">

    <style>
        :root {
            --navy: #0B1F3A;
            --gold: #D4A843;
            --cream: #F8F7F3;
            --white: #FFFFFF;
            --text: #1A1A2E;
            --muted: #5C6370;
            --border: #E2E0D8;
            --success: #2D7A4F;
        }
        body { 
            font-family: 'Inter', sans-serif; 
            color: var(--text); 
            background-color: var(--white); 
        }
        .container-custom { 
            max-width: 1160px; 
            margin: 0 auto; 
            padding: 0 16px; 
        }
        @media (min-width: 768px) {
            .container-custom {
                padding: 0 32px;
            }
        }
        .section-padding { 
            padding: 72px 0; 
        }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .card-shadow {
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        }
        .hero-card-shadow {
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        }
        /* ===== MOBILE APP FEEL ===== */
        * { -webkit-tap-highlight-color: transparent; }
        html { -webkit-overflow-scrolling: touch; }
        body { overscroll-behavior: none; }
        /* 2-column mobile card grid */
        @media (max-width: 767px) {
            .mobile-2col { grid-template-columns: repeat(2, 1fr) !important; gap: 12px !important; }
            .mobile-2col > * { padding: 14px !important; }
            .mobile-2col .card-icon { width: 36px !important; height: 36px !important; margin-bottom: 10px !important; }
            .mobile-2col .card-icon svg { width: 18px !important; height: 18px !important; }
            .mobile-2col .card-title { font-size: 13px !important; margin-bottom: 2px !important; }
            .mobile-2col .card-sub { font-size: 9px !important; margin-bottom: 8px !important; }
            .mobile-2col .card-desc { font-size: 11px !important; margin-bottom: 12px !important; }
            .mobile-2col .card-price { font-size: 15px !important; }
            .mobile-2col .card-price-label { font-size: 9px !important; }
            .mobile-2col .card-arrow { width: 28px !important; height: 28px !important; }
            .mobile-2col .card-arrow svg { width: 13px !important; height: 13px !important; }
        }
        /* Mobile bottom nav safe area */
        @media (max-width: 1023px) {
            .mobile-main-pad { padding-bottom: 72px; }
        }
        /* Bottom nav active state */
        .bottom-nav-link.active { color: #D4A843; }
        .bottom-nav-link.active .bottom-nav-icon { background: rgba(212,168,67,0.15); }
        /* Package cards mobile */
        @media (max-width: 767px) {
            .pkg-card { padding: 20px !important; }
            .pkg-card h3 { font-size: 18px !important; }
        }
        /* Blog cards mobile */
        @media (max-width: 767px) {
            .blog-card-inner { padding: 18px !important; }
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col" x-data="{ 
    mobileMenuOpen: false, 
    mobileLegalOpen: false,
    mobileTechOpen: false,
    annoucementOpen: true, 
    currentLang: 'en',
    initLanguage() {
        // Direct immediate check of googtrans cookie for instant load feedback
        const getCookie = (name) => {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        };
        const googtrans = getCookie('googtrans');
        if (googtrans) {
            this.currentLang = googtrans.endsWith('hi') ? 'hi' : 'en';
        }

        // Check current language after a delay for Google Translate script injection
        setTimeout(() => {
            const select = document.querySelector('.goog-te-combo');
            if (select) {
                this.currentLang = select.value === '' ? 'en' : (select.value || this.currentLang);
            }
        }, 1200);
        
        // Listen for user changes on the google translate combo box
        document.addEventListener('change', (e) => {
            if (e.target && e.target.classList.contains('goog-te-combo')) {
                this.currentLang = e.target.value === '' ? 'en' : (e.target.value || 'en');
            }
        });
    },
    changeLang(lang) {
        this.currentLang = lang;
        const select = document.querySelector('.goog-te-combo');
        
        // Update translate cookie directly for persistent sync
        const cookieValue = lang === 'en' ? '/en/en' : `/en/${lang}`;
        document.cookie = `googtrans=${cookieValue}; path=/;`;
        
        if (select) {
            select.value = lang === 'en' ? '' : lang;
            select.dispatchEvent(new Event('change'));
        }
    }
}" x-init="initLanguage()">

    <!-- TOP ANNOUNCEMENT BAR -->
    <div x-show="annoucementOpen" class="min-h-[40px] py-[8px] bg-[#D4A843] flex items-center justify-between px-[16px] md:px-[32px] w-full relative z-[110]">
        <div class="flex-1 text-center text-[#0B1F3A] text-[13px] font-semibold">
            🎉 Limited Offer: Get 15% OFF on all services | Use Code: LEGAL15
        </div>
        <button @click="annoucementOpen = false" class="text-[#0B1F3A]/60 hover:text-[#0B1F3A] text-[13px] absolute right-[32px]">
            &times; Close
        </button>
    </div>

    <!-- NAVBAR -->
    <header class="sticky top-0 z-[100] bg-white border-b border-[#E2E0D8] h-[76px] notranslate">
        <div class="w-full max-w-[1500px] mx-auto px-[16px] md:px-[32px] h-full flex justify-between items-center gap-[16px]">
            
            <!-- Left: Logo -->
            <div class="flex flex-col justify-center flex-shrink-0">
                <a href="/" class="flex items-center">
                    <img src="/logo.png" alt="Foundida" class="h-[44px] md:h-[56px] object-contain" onerror="this.onerror=null; this.outerHTML='<span class=\'text-[26px] md:text-[30px] font-bold text-[#0B1F3A] tracking-tight leading-none whitespace-nowrap\'>Foundida<span class=\'text-[#D4A843]\'>.</span></span>'">
                </a>
            </div>

            <!-- Center: Nav Links -->
            <nav class="hidden lg:flex lg:space-x-4 xl:space-x-6">
                <a href="/" class="text-[13px] text-[#1A1A2E] font-medium hover:text-[#f57c00] transition-colors flex items-center h-[68px]">Home</a>
                
                <!-- Legal Services Dropdown -->
                <div class="relative group cursor-pointer flex items-center h-[68px]">
                    <span class="text-[13px] text-[#1A1A2E] font-medium group-hover:text-[#f57c00] transition-colors flex items-center whitespace-nowrap">
                        Legal Services <span class="ml-1 text-[10px]">▼</span>
                    </span>
                    <div class="absolute top-[68px] left-[-200px] xl:left-0 w-[580px] bg-white border border-[#E2E0D8] shadow-xl rounded-b-[8px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-[200] py-[16px] px-[20px] grid grid-cols-2 gap-x-6 gap-y-4">
                        @if(config('services_data.categories'))
                            @foreach(array_slice(config('services_data.categories'), 0, 7) as $cat)
                                <div>
                                    <div class="text-[#D4A843] text-[11px] font-bold uppercase tracking-[0.1em] mb-[4px] border-b border-[#E2E0D8] pb-[2px]">{{ $cat['name'] }}</div>
                                    <div class="flex flex-col space-y-[3px]">
                                        @foreach(array_slice($cat['services'], 0, 4) as $svc)
                                            <a href="{{ route('service.generic', ['category_slug' => $cat['slug'], 'service_slug' => $svc['slug']]) }}" class="text-[13px] text-[#1A1A2E] hover:text-[#f57c00] transition-colors">{{ $svc['name_en'] }}</a>
                                        @endforeach
                                        <a href="/services/{{ $cat['slug'] }}" class="text-[11px] text-[#5C6370] hover:text-[#1a237e] mt-1 font-semibold">View all &rarr;</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Tech Services Dropdown -->
                <div class="relative group cursor-pointer flex items-center h-[68px]">
                    <span class="text-[13px] text-[#1A1A2E] font-medium group-hover:text-[#f57c00] transition-colors flex items-center whitespace-nowrap">
                        Tech Services <span class="ml-1 text-[10px]">▼</span>
                    </span>
                    <div class="absolute top-[68px] left-0 min-w-[250px] bg-white border border-[#E2E0D8] shadow-xl rounded-b-[8px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-[200] py-[6px]">
                        @php $techCat = config('services_data.categories.8'); @endphp
                        @if($techCat)
                            @foreach($techCat['services'] as $svc)
                            <a href="{{ route('service.generic', ['category_slug' => $techCat['slug'], 'service_slug' => $svc['slug']]) }}" class="block px-[14px] py-[6px] hover:bg-[#F8F7F3] border-b border-[#E2E0D8] last:border-0 group/link">
                                <div class="text-[13px] text-[#1A1A2E] group-hover/link:text-[#f57c00] font-medium transition-colors">{{ $svc['name_en'] }}</div>
                                <div class="flex items-center justify-between mt-[4px]">
                                    <span class="text-[10px] text-[#5C6370]">{{ $svc['name_hi'] }}</span>
                                    <span class="text-[10px] text-[#2D7A4F] font-bold">{{ $svc['price'] }}</span>
                                </div>
                            </a>
                            @endforeach
                        @endif
                    </div>
                </div>

                <a href="/packages" class="text-[13px] text-[#1A1A2E] font-medium hover:text-[#f57c00] transition-colors flex items-center h-[68px]">Packages</a>
                <a href="/blog" class="text-[13px] text-[#1A1A2E] font-medium hover:text-[#f57c00] transition-colors flex items-center h-[68px]">Blog</a>
                <a href="/contact" class="text-[13px] text-[#1A1A2E] font-medium hover:text-[#f57c00] transition-colors flex items-center h-[68px]">Contact</a>
            </nav>

            <!-- Right: Actions (Visible on Mobile & Desktop) -->
            <div class="flex items-center space-x-[12px] xl:space-x-[16px] flex-shrink-0">
                <!-- Premium Language Switcher Pill -->
                <div class="flex items-center bg-gray-100 rounded-full p-0.5 border border-gray-200 shadow-sm shrink-0">
                    <button @click="changeLang('en')" 
                            :class="currentLang === 'en' ? 'bg-[#1a237e] text-white shadow-xs' : 'text-gray-500 hover:text-[#1a237e]'" 
                            class="px-2.5 py-1 rounded-full text-[10px] md:text-[11px] font-bold transition-all duration-200 focus:outline-none uppercase">
                        EN
                    </button>
                    <button @click="changeLang('hi')" 
                            :class="currentLang === 'hi' ? 'bg-[#1a237e] text-white shadow-xs' : 'text-gray-500 hover:text-[#1a237e]'" 
                            class="px-2.5 py-1 rounded-full text-[10px] md:text-[11px] font-bold transition-all duration-200 focus:outline-none font-sans">
                        हिं
                    </button>
                </div>

                <!-- Hidden Google Translate Element to maintain script integration -->
                <div id="google_translate_element" class="opacity-0 pointer-events-none absolute w-0 h-0 overflow-hidden"></div>

                <!-- Desktop-only actions -->
                <div class="hidden lg:flex items-center space-x-[12px] xl:space-x-[16px]">
                    <a href="tel:+918069029400" class="hidden xl:flex text-[#1a237e] text-[14px] font-bold items-center whitespace-nowrap hover:text-[#f57c00] transition-colors">
                        <svg class="w-4 h-4 mr-1 text-[#f57c00]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        080-6902-9400
                    </a>
                    
                    <div class="hidden xl:block h-[20px] w-[1px] bg-[#E2E0D8]"></div>

                    <a href="#consultation" class="bg-[#f57c00] text-white text-[13px] font-semibold px-[20px] py-[10px] rounded-[4px] hover:bg-[#ef6c00] transition-colors whitespace-nowrap flex items-center shadow-sm">
                        Free Consultation
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center lg:hidden">
                    <button @click="mobileMenuOpen = true; const select = document.querySelector('.goog-te-combo'); if (select) { currentLang = select.value || 'en'; }" type="button" class="text-[#1A1A2E] hover:text-[#0B1F3A] p-1">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Drawer (Alpine.js) -->
        <div x-show="mobileMenuOpen" class="relative z-[150] lg:hidden" style="display: none;">
            <div x-show="mobileMenuOpen" class="fixed inset-0 bg-black/50" @click="mobileMenuOpen = false"></div>
            <div x-show="mobileMenuOpen" class="fixed inset-y-0 left-0 w-[80%] max-w-sm bg-white p-6 shadow-xl overflow-y-auto">
                <div class="flex justify-between items-center mb-6">
                    <a href="/" class="flex items-center">
                        <img src="/logo.png" alt="Foundida" class="h-[40px] object-contain" onerror="this.onerror=null; this.outerHTML='<span class=\'text-[26px]\' font-bold text-[#0B1F3A] tracking-tight leading-none whitespace-nowrap\'>Foundida<span class=\'text-[#D4A843]\'>.</span></span>'">
                    </a>
                    <button @click="mobileMenuOpen = false" class="text-[#1A1A2E]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <nav class="flex flex-col space-y-4">
                    <a href="/" class="text-[14px] text-[#1A1A2E] font-medium hover:text-[#f57c00]">Home</a>
                    
                    <!-- Collapsible Legal Services -->
                    <div x-data="{ openSub: null }">
                        <button @click="mobileLegalOpen = !mobileLegalOpen" class="w-full flex items-center justify-between text-[14px] text-[#1A1A2E] font-medium hover:text-[#f57c00] focus:outline-none">
                            <span>Legal Services</span>
                            <svg class="w-3 h-3 transition-transform duration-200" :class="mobileLegalOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="mobileLegalOpen" class="mobile-submenu pl-3 mt-1.5 space-y-1 border-l border-[#E2E0D8]" style="display: none;">
                            @if(config('services_data.categories'))
                                @foreach(array_slice(config('services_data.categories'), 0, 8) as $cat)
                                    <div class="py-0.5">
                                        <!-- Category Sub-header (Click to Expand services) -->
                                        <button @click="openSub = (openSub === '{{ $cat['slug'] }}' ? null : '{{ $cat['slug'] }}')" class="w-full flex items-center justify-between text-[12px] font-semibold uppercase tracking-wider text-gray-700 hover:text-gold py-0.5 focus:outline-none">
                                            <span>{{ $cat['name'] }}</span>
                                            <svg class="w-2.5 h-2.5 transition-transform duration-200" :class="openSub === '{{ $cat['slug'] }}' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                        </button>
                                        
                                        <!-- Services list inside category -->
                                        <div x-show="openSub === '{{ $cat['slug'] }}'" class="flex flex-col space-y-1.5 pl-3 mt-1 pb-1.5 border-l border-gray-100/80">
                                            @foreach(array_slice($cat['services'], 0, 4) as $svc)
                                                <a href="{{ route('service.generic', ['category_slug' => $cat['slug'], 'service_slug' => $svc['slug']]) }}" @click="mobileMenuOpen = false" class="text-[13px] text-[#5C6370] hover:text-[#f57c00]">{{ $svc['name_en'] }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Collapsible Tech Services -->
                    <div>
                        <button @click="mobileTechOpen = !mobileTechOpen" class="w-full flex items-center justify-between text-[14px] text-[#1A1A2E] font-medium hover:text-[#f57c00] focus:outline-none">
                            <span>Tech Services</span>
                            <svg class="w-3 h-3 transition-transform duration-200" :class="mobileTechOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="mobileTechOpen" class="mobile-submenu pl-3 mt-1.5 space-y-1.5 border-l border-[#E2E0D8]" style="display: none;">
                            @php $techCat = config('services_data.categories.8'); @endphp
                            @if($techCat)
                                @foreach($techCat['services'] as $svc)
                                    <a href="{{ route('service.generic', ['category_slug' => $techCat['slug'], 'service_slug' => $svc['slug']]) }}" @click="mobileMenuOpen = false" class="block py-0.5 text-[13px] text-[#5C6370] hover:text-[#f57c00]">
                                        <div class="font-medium text-[#1A1A2E]">{{ $svc['name_en'] }}</div>
                                        <div class="text-[11px] text-[#5C6370]">{{ $svc['name_hi'] }} • <span class="text-[#2D7A4F] font-bold">{{ $svc['price'] }}</span></div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <a href="/packages" class="text-[14px] text-[#1A1A2E] font-medium hover:text-[#f57c00]">Packages</a>
                    <a href="/blog" class="text-[14px] text-[#1A1A2E] font-medium hover:text-[#f57c00]">Blog</a>
                    <a href="/contact" class="text-[14px] text-[#1A1A2E] font-medium hover:text-[#f57c00]">Contact</a>
                    <hr class="border-[#E2E0D8] my-2">
                    <a href="tel:+918069029400" class="text-[#1a237e] text-[14px] font-semibold mb-2 flex items-center hover:text-[#f57c00] transition-colors">
                        <svg class="w-4 h-4 mr-1 text-[#f57c00]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        080-6902-9400
                    </a>
                    <div class="flex items-center space-x-2 mt-2 mb-4">
                        <button @click="changeLang('en')" :class="currentLang === 'en' ? 'bg-[#f57c00]/10 text-[#f57c00] font-bold' : 'border border-[#E2E0D8] text-[#5C6370] font-medium'" class="px-[12px] py-[6px] rounded text-[12px] transition-colors duration-200">English</button>
                        <button @click="changeLang('hi')" :class="currentLang === 'hi' ? 'bg-[#f57c00]/10 text-[#f57c00] font-bold' : 'border border-[#E2E0D8] text-[#5C6370] font-medium'" class="px-[12px] py-[6px] rounded text-[12px] transition-colors duration-200">हिंदी</button>
                    </div>
                    <a href="#consultation" class="bg-[#f57c00] text-white text-[14px] font-semibold px-[20px] py-[12px] rounded-[4px] text-center">Free Consultation</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-grow mobile-main-pad">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#1a237e] pt-[64px] pb-[32px] mt-auto text-white">
        <div class="w-full max-w-[1500px] mx-auto px-[16px] md:px-[32px]">
            <!-- Top: 4-column grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <!-- Col 1 (Brand) -->
                <div class="md:col-span-1">
                    <div class="flex items-center">
                        <img src="/logo.png" alt="Foundida" class="h-[56px] object-contain filter brightness-0 invert" onerror="this.onerror=null; this.outerHTML='<div class=\'text-[32px] font-bold text-white tracking-tight leading-none\'>Foundida.</div>'">
                    </div>
                    <div class="text-[#E2E0D8] text-[13px] mt-[12px] leading-relaxed">India's trusted Legal & Tech platform for Startups. From idea to launch, we've got you covered.</div>
                    
                    <!-- Social Icons -->
                    <div class="flex space-x-3 mt-[24px]">
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/foundida" target="_blank" rel="noopener noreferrer" class="social-link w-[36px] h-[36px] rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-[#f57c00] transition-all" aria-label="Facebook">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
                        </a>
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/foundida" target="_blank" rel="noopener noreferrer" class="social-link w-[36px] h-[36px] rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-[#f57c00] transition-all" aria-label="Instagram">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/company/foundida" target="_blank" rel="noopener noreferrer" class="social-link w-[36px] h-[36px] rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-[#f57c00] transition-all" aria-label="LinkedIn">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.779-1.75-1.75s.784-1.75 1.75-1.75 1.75.779 1.75 1.75-.784 1.75-1.75 1.75zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <!-- X / Twitter -->
                        <a href="https://x.com/foundida" target="_blank" rel="noopener noreferrer" class="social-link w-[36px] h-[36px] rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-[#f57c00] transition-all" aria-label="Twitter">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@foundida" target="_blank" rel="noopener noreferrer" class="social-link w-[36px] h-[36px] rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-[#f57c00] transition-all" aria-label="YouTube">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.163a3.003 3.003 0 00-2.11-2.11C19.528 3.545 12 3.545 12 3.545s-7.528 0-9.388.508a3.003 3.003 0 00-2.11 2.11C0 8.022 0 12 0 12s0 3.978.502 5.837a3.003 3.003 0 002.11 2.11c1.86.508 9.388.508 9.388.508s7.528 0 9.388-.508a3.003 3.003 0 002.11-2.11C24 15.978 24 12 24 12s0-3.978-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        <!-- WhatsApp -->
                        <a href="https://wa.me/918069029400" target="_blank" rel="noopener noreferrer" class="social-link w-[36px] h-[36px] rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-[#f57c00] transition-all" aria-label="WhatsApp">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.455L0 24zm6.59-4.846c1.666.988 3.31 1.489 5.355 1.49 5.511 0 9.993-4.474 9.997-9.986.002-2.67-1.035-5.18-2.919-7.066C17.135 1.706 14.634.666 12.01.666 6.5.666 2.017 5.148 2.013 10.66c-.001 2.045.507 3.7 1.499 5.373L2.52 20.8l4.127-1.646zm11.233-7.514c-.33-.165-1.951-.963-2.251-1.073-.3-.11-.519-.165-.738.165-.219.33-.848 1.073-1.039 1.293-.19.22-.382.247-.711.082-.33-.165-1.393-.513-2.653-1.638-.98-.874-1.641-1.953-1.833-2.282-.19-.33-.02-.508.145-.671.149-.148.33-.385.495-.578.165-.192.219-.33.329-.55.11-.22.055-.412-.028-.577-.082-.165-.738-1.786-1.011-2.446-.266-.64-.537-.552-.738-.562-.19-.01-.41-.01-.628-.01-.219 0-.575.082-.876.412-.3.33-1.148 1.127-1.148 2.747 0 1.62 1.177 3.184 1.341 3.404.165.22 2.316 3.537 5.61 4.96.783.338 1.395.54 1.872.69.787.25 1.5.215 2.065.13.63-.095 1.951-.798 2.224-1.54.273-.742.273-1.375.191-1.513-.082-.137-.3-.22-.63-.385z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Col 2 (Legal Services) -->
                <div>
                    <div class="text-[#f57c00] text-[12px] font-bold uppercase tracking-[0.15em] mb-[16px]">LEGAL SERVICES</div>
                    <div class="flex flex-col space-y-[12px]">
                        <a href="/services/business-registration" class="text-[#E2E0D8] text-[13px] hover:text-[#f57c00] transition-colors">Company Registration</a>
                        <a href="/services/trademark" class="text-[#E2E0D8] text-[13px] hover:text-[#f57c00] transition-colors">Trademark & IP</a>
                        <a href="/services/gst" class="text-[#E2E0D8] text-[13px] hover:text-[#f57c00] transition-colors">GST & Taxes</a>
                        <a href="/services/licenses-registrations" class="text-[#E2E0D8] text-[13px] hover:text-[#f57c00] transition-colors">Licenses (FSSAI, ISO)</a>
                        <a href="/services/tax-compliance" class="text-[#E2E0D8] text-[13px] hover:text-[#f57c00] transition-colors">Annual Compliance</a>
                    </div>
                </div>

                <!-- Col 3 (Tech Services) -->
                <div>
                    <div class="text-[#f57c00] text-[12px] font-bold uppercase tracking-[0.15em] mb-[16px]">TECH SERVICES</div>
                    <div class="flex flex-col space-y-[12px]">
                        <a href="/services/tech-services/website-development" class="text-[#E2E0D8] text-[13px] hover:text-[#f57c00] transition-colors">Website Development</a>
                        <a href="/services/tech-services/mobile-app-development" class="text-[#E2E0D8] text-[13px] hover:text-[#f57c00] transition-colors">Mobile App Development</a>
                        <a href="/services/tech-services/domain-hosting-setup" class="text-[#E2E0D8] text-[13px] hover:text-[#f57c00] transition-colors">Domain & Hosting</a>
                        <a href="/services/tech-services/logo-brand-identity" class="text-[#E2E0D8] text-[13px] hover:text-[#f57c00] transition-colors">Logo & Branding</a>
                        <a href="/services/tech-services/e-commerce-store" class="text-[#E2E0D8] text-[13px] hover:text-[#f57c00] transition-colors">E-commerce Store</a>
                    </div>
                </div>

                <!-- Col 4 (Contact & Badges) -->
                <div>
                    <div class="text-[#f57c00] text-[12px] font-bold uppercase tracking-[0.15em] mb-[16px]">CONTACT US</div>
                    <a href="tel:+918069029400" class="block text-white text-[18px] font-bold hover:text-[#f5a623] transition-colors">080-6902-9400</a>
                    <a href="mailto:hello@foundida.com" class="block text-[#E2E0D8] text-[13px] mt-[4px] hover:text-[#f5a623] transition-colors">hello@foundida.com</a>
                    
                    <div class="mt-[32px] space-y-[12px]">
                        <div class="flex items-center text-white/80 bg-white/10 px-3 py-2 rounded">
                            <svg class="w-5 h-5 mr-3 text-[#f57c00]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            <div class="text-[12px] font-medium leading-tight">ISO 9001:2015<br><span class="text-[10px] text-white/60">Certified Company</span></div>
                        </div>
                        <div class="flex items-center text-white/80 bg-white/10 px-3 py-2 rounded">
                            <svg class="w-5 h-5 mr-3 text-[#f57c00]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                            <div class="text-[12px] font-medium leading-tight">Bar Council of India<br><span class="text-[10px] text-white/60">Verified Lawyers</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Bar -->
            <div class="border-t border-white/10 pt-[24px] mt-[48px] flex flex-col md:flex-row justify-between items-center text-[12px] text-[#E2E0D8]/60">
                <div>&copy; {{ date('Y') }} Foundida. All rights reserved.</div>
                <div class="mt-4 md:mt-0 space-x-[16px]">
                    <a href="/about" class="text-[#E2E0D8] hover:text-white transition-colors">About Us</a>
                    <a href="#" class="text-[#E2E0D8] hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="text-[#E2E0D8] hover:text-white transition-colors">Terms</a>
                    <a href="#" class="text-[#E2E0D8] hover:text-white transition-colors">Refund Policy</a>
                    <a href="#" class="text-[#E2E0D8] hover:text-white transition-colors">Disclaimer</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WHATSAPP FLOATING BUTTON -->
    <a href="https://wa.me/918069029400" target="_blank" rel="noopener noreferrer" class="fixed bottom-[84px] lg:bottom-[24px] right-[16px] lg:right-[24px] z-[90] bg-[#25D366] text-white w-[48px] h-[48px] rounded-full flex items-center justify-center shadow-xl hover:bg-[#20bd5a] transition-all hover:scale-110 focus:outline-none" aria-label="Chat on WhatsApp">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
    </a>

    <!-- Google Translate Script -->
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
          pageLanguage: 'en', 
          includedLanguages: 'hi,en', 
          layout: google.translate.TranslateElement.InlineLayout.SIMPLE
      }, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <!-- ===== MOBILE BOTTOM NAVIGATION BAR ===== -->
    <nav class="fixed bottom-0 left-0 right-0 z-[200] lg:hidden bg-white border-t border-gray-200 shadow-2xl notranslate" style="padding-bottom: env(safe-area-inset-bottom)">
        <div class="grid grid-cols-5 h-[64px]">

            <!-- Home -->
            <a href="/" id="bnav-home" class="bottom-nav-link flex flex-col items-center justify-center gap-[3px] text-gray-400 hover:text-[#D4A843] transition-colors">
                <div class="bottom-nav-icon w-[34px] h-[34px] rounded-xl flex items-center justify-center transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <span class="text-[9px] font-bold leading-none">होम</span>
            </a>

            <!-- Legal -->
            <a href="/services/gst" id="bnav-legal" class="bottom-nav-link flex flex-col items-center justify-center gap-[3px] text-gray-400 hover:text-[#D4A843] transition-colors">
                <div class="bottom-nav-icon w-[34px] h-[34px] rounded-xl flex items-center justify-center transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                    </svg>
                </div>
                <span class="text-[9px] font-bold leading-none">लीगल</span>
            </a>

            <!-- Center CTA -->
            <a href="/contact" id="bnav-consult" class="bottom-nav-link flex flex-col items-center justify-center gap-[2px] -mt-[10px]">
                <div class="w-[50px] h-[50px] bg-[#D4A843] rounded-2xl flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-[#0B1F3A]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <span class="text-[9px] font-extrabold leading-none text-[#D4A843]">कॉल</span>
            </a>

            <!-- Packages -->
            <a href="/packages" id="bnav-pkg" class="bottom-nav-link flex flex-col items-center justify-center gap-[3px] text-gray-400 hover:text-[#D4A843] transition-colors">
                <div class="bottom-nav-icon w-[34px] h-[34px] rounded-xl flex items-center justify-center transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <span class="text-[9px] font-bold leading-none">पैकेज</span>
            </a>

            <!-- Blog -->
            <a href="/blog" id="bnav-blog" class="bottom-nav-link flex flex-col items-center justify-center gap-[3px] text-gray-400 hover:text-[#D4A843] transition-colors">
                <div class="bottom-nav-icon w-[34px] h-[34px] rounded-xl flex items-center justify-center transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <span class="text-[9px] font-bold leading-none">ब्लॉग</span>
            </a>

        </div>
    </nav>

    <script>
    // Highlight active bottom nav link
    (function() {
        const path = window.location.pathname;
        const map = {
            'bnav-home': ['/'],
            'bnav-legal': ['/services', '/vakeel', '/diy'],
            'bnav-consult': ['/contact'],
            'bnav-pkg': ['/packages', '/pricing'],
            'bnav-blog': ['/blog'],
        };
        Object.entries(map).forEach(([id, paths]) => {
            const el = document.getElementById(id);
            if (!el) return;
            const match = paths.some(p => p === '/' ? path === '/' : path.startsWith(p));
            if (match) {
                el.classList.add('active');
                el.style.color = '#D4A843';
            }
        });
    })();
    </script>

    @stack('scripts')
</body>
</html>
