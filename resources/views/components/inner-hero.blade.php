<section class="bg-[#0d1b3e] relative overflow-hidden py-12 md:py-[80px] z-10">
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
            <rect x="15" y="65" width="20" height="26" rx="1" stroke-dasharray="2 1" />
            <line x1="19" y1="71" x2="31" y2="71" stroke-width="0.5" />
            <line x1="19" y1="76" x2="31" y2="76" stroke-width="0.5" />
            <line x1="19" y1="81" x2="27" y2="81" stroke-width="0.5" />
        </svg>
    </div>

    <!-- Glow Blobs for Visual Depth -->
    <div class="hero-glow-blob"></div>
    <div class="hero-glow-blob-2"></div>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{ $slot }}
    </div>
</section>
