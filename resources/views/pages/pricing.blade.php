@extends('layouts.app')

@section('title', 'Transparent Pricing | Legal & Setup Packages - Foundida')
@section('meta_description', 'Clear, transparent, and affordable pricing for Company Registration, GST filing, and Trademark services in India. Compare our startup packages and save up to 20%.')
@section('meta_keywords', 'Company Registration Fees, GST Registration Cost, Trademark Cost in India, Startup Pricing Packages')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    @foreach($faqs as $index => $faq)
    {
      "@@type": "Question",
      "name": "{{ strip_tags($faq['q_en']) }}",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "{{ strip_tags($faq['a_en']) }}"
      }
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ]
}
</script>
@endpush

@section('content')
<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                TRANSPARENT PRICING
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[48px] font-bold text-white leading-tight">
            Transparent & <span class="text-[#f5a623]">Simple</span> Pricing
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed mt-4 max-w-[600px] mx-auto">
            We believe quality legal and tech services should be accessible for everyone. Clear pricing with zero hidden costs.
        </p>
    </div>
</x-inner-hero>

<!-- PRICING SECTION -->
<div class="bg-offwhite py-16 -mt-8 relative z-20" x-data="{ billing: 'one-time' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Toggle -->
        <div class="flex justify-center mb-12">
            <div class="bg-white p-1.5 rounded-xl border border-gray-200 shadow-sm inline-flex relative">
                <button @click="billing = 'monthly'" 
                        :class="billing === 'monthly' ? 'bg-navy text-white shadow' : 'text-gray-600 hover:text-navy'"
                        class="flex items-center justify-center px-6 min-h-[48px] font-bold text-sm rounded-lg transition-all duration-300 relative z-10 min-w-[140px]">
                    Monthly
                </button>
                <button @click="billing = 'one-time'" 
                        :class="billing === 'one-time' ? 'bg-navy text-white shadow' : 'text-gray-600 hover:text-navy'"
                        class="flex items-center justify-center px-6 min-h-[48px] font-bold text-sm rounded-lg transition-all duration-300 relative z-10 min-w-[140px]">
                    One-Time
                    <span class="ml-2 bg-green-100 text-green-700 text-[10px] font-extrabold px-2 py-0.5 rounded-full border border-green-200">
                        SAVE 20%
                    </span>
                </button>
            </div>
        </div>

        <!-- DYNAMIC PRICING CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">
            @foreach($packages as $pkg)
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
                                <span class="text-4xl font-bold text-gold">₹{{ number_format($pkg->price) }}</span>
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
                                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">{{ $f }}</span></li>
                            @endforeach
                        </ul>
                        <a href="/packages" class="w-full bg-gold text-navy hover:bg-yellow-500 min-h-[52px] rounded-xl font-bold transition-all duration-300 shadow-md flex items-center justify-center text-sm font-extrabold">
                            Get Started
                        </a>
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
                                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">{{ $f }}</span></li>
                            @endforeach
                        </ul>
                        <a href="/packages" class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex items-center justify-center text-sm font-extrabold">
                            Get Started
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<!-- MARKET COMPARISON TABLE -->
<div class="bg-white py-20 border-t border-gray-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">Market Comparison</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-wider mb-6">See How Much You Save</p>
        </div>

        <div class="overflow-x-auto bg-white rounded-2xl shadow-sm border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-navy text-white text-sm">
                        <th class="p-4 border-b border-navy-600 font-bold">Service</th>
                        <th class="p-4 border-b border-navy-600 font-bold">Market Rate</th>
                        <th class="p-4 border-b border-navy-600 font-bold bg-gold text-navy">Our Price</th>
                        <th class="p-4 border-b border-navy-600 font-bold text-right">You Save</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($comparisons as $comp)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4">
                            <span class="font-bold text-navy text-sm">{{ $comp['service_en'] }}</span>
                        </td>
                        <td class="p-4 text-gray-500 font-medium line-through decoration-red-300">₹{{ number_format($comp['market']) }}</td>
                        <td class="p-4 text-navy font-bold text-lg bg-gold/5">₹{{ number_format($comp['our']) }}</td>
                        <td class="p-4 text-right">
                            <span class="inline-flex items-center justify-center bg-green-50 text-green-700 px-3 py-1.5 rounded-md border border-green-200 text-xs font-bold">
                                ₹{{ number_format($comp['market'] - $comp['our']) }} Saved
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
                <span class="font-bold text-sm tracking-wide">UPI Payments</span>
                <span class="text-[10px] text-gray-400 uppercase">Google Pay, PhonePe, Paytm</span>
            </div>
            <div class="hidden md:block w-px h-8 bg-gray-600"></div>
            
            <div class="flex flex-col items-center text-center text-white hover:-translate-y-1 transition-transform">
                <span class="font-bold text-sm tracking-wide">Net Banking</span>
                <span class="text-[10px] text-gray-400 uppercase">All Major Indian Banks</span>
            </div>
            <div class="hidden md:block w-px h-8 bg-gray-600"></div>
            
            <div class="flex flex-col items-center text-center text-white hover:-translate-y-1 transition-transform">
                <span class="font-bold text-sm tracking-wide">Credit / Debit Cards</span>
                <span class="text-[10px] text-gray-400 uppercase">Visa, Mastercard, RuPay</span>
            </div>
            <div class="hidden md:block w-px h-8 bg-gray-600"></div>
            
            <div class="flex flex-col items-center text-center text-white hover:-translate-y-1 transition-transform">
                <span class="font-bold text-sm tracking-wide">No-Cost EMI Available</span>
                <span class="text-[10px] text-gray-400 uppercase">Easy Installments</span>
            </div>
        </div>
    </div>
</div>

<!-- FAQS SECTION -->
<div class="bg-offwhite py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">Frequently Asked Questions</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-wider mb-6">Got Questions? We Have Answers</p>
        </div>

        <div class="space-y-4">
            @foreach($faqs as $index => $faq)
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden" x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex justify-between items-center p-5 focus:outline-none min-h-[48px] hover:bg-gray-50 transition-colors">
                    <span class="font-bold text-navy text-[15px] leading-tight text-left pr-4" :class="{ 'text-gold': open }">{{ $faq['q_en'] }}</span>
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-offwhite flex items-center justify-center border border-gray-100 transition-transform duration-300" :class="{ 'rotate-180 bg-gold text-white border-gold': open }">
                        <svg class="w-5 h-5 text-gray-500" :class="{ 'text-white': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </button>
                <div x-show="open" x-collapse x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" style="display: none;">
                    <div class="p-5 pt-0 border-t border-gray-50 bg-gray-50/50">
                        <p class="text-gray-600 text-sm leading-relaxed mt-4">{{ $faq['a_en'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
