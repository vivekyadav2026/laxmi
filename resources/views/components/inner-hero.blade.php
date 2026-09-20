<section class="relative overflow-hidden py-12 md:py-[70px] z-10" style="background-color: #f3f8f4; background-image: url(&quot;data:image/svg+xml,%3Csvg width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='12' cy='12' r='1.2' fill='%232D7A4F' fill-opacity='0.16'/%3E%3C/svg%3E&quot;);">
    <!-- Glow Blobs for Visual Depth -->
    <div class="absolute w-[500px] h-[500px] rounded-full blur-[90px] pointer-events-none z-0" style="background: radial-gradient(circle, rgba(45,122,79,0.09) 0%, transparent 70%); top: -100px; right: 5%;"></div>
    <div class="absolute w-[400px] h-[400px] rounded-full blur-[80px] pointer-events-none z-0" style="background: radial-gradient(circle, rgba(245,166,35,0.07) 0%, transparent 70%); bottom: -50px; left: 5%;"></div>

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{ $slot }}
    </div>
</section>
