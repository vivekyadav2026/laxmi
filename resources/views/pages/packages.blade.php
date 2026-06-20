@extends('layouts.app')
@section('title', 'पैकेज | Best Value Packages - Foundida')

@section('content')

<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                BEST VALUE COMBO PACKAGES
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[52px] font-bold text-white leading-tight mb-4">
            सबसे <span class="text-[#f5a623]">बेहतरीन</span> पैकेज
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed max-w-[600px] mx-auto">
            Get Legal + Tech services bundled together and save up to 40%. Everything a new business needs — one place, one price.
        </p>
    </div>
</x-inner-hero>

<!-- TRUST STRIP -->
<div class="bg-gold py-5 border-y border-gold">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16">
            <div class="flex items-center gap-2 text-navy"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="font-bold text-sm">No Hidden Charges</span></div>
            <div class="flex items-center gap-2 text-navy"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="font-bold text-sm">48 Hr Delivery</span></div>
            <div class="flex items-center gap-2 text-navy"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="font-bold text-sm">100% Money Back</span></div>
            <div class="flex items-center gap-2 text-navy"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="font-bold text-sm">Dedicated Manager</span></div>
        </div>
    </div>
</div>

<!-- PACKAGES GRID -->
<div class="bg-offwhite py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- LEGAL PACKAGES -->
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl md:text-4xl font-bold text-navy font-serif mb-2">⚖️ Legal Packages</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-widest">Business Registration & Compliance</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center mb-20">
            <!-- STARTER -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                <div class="flex flex-col mb-6 pb-6 border-b border-gray-100">
                    <h3 class="text-2xl font-bold text-navy mb-1">स्टार्टर</h3>
                    <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">Legal Starter</span>
                    <div class="mt-6 flex items-end gap-2">
                        <span class="text-4xl font-bold text-navy">₹2,499</span>
                        <span class="text-sm text-green-600 font-bold mb-1">Save ₹500</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">For early-stage founders testing an idea.</p>
                </div>
                <ul class="space-y-3 mb-8 flex-grow">
                    @foreach(['Company Registration (Sole Prop)','GST Registration','Business Email (1 User)','Custom Logo Design','1 Legal Document Draft'] as $f)
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">{{ $f }}</span></li>
                    @endforeach
                </ul>
                <a href="/contact" class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center">
                    <span class="text-[15px]">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-wider mt-0.5">Get Started</span>
                </a>
            </div>

            <!-- GROWTH (Highlighted) -->
            <div class="bg-white rounded-2xl shadow-xl border-2 border-gold p-8 flex flex-col relative md:-my-4 hover:-translate-y-1 transition-transform duration-300 z-10">
                <div class="absolute -top-4 inset-x-0 flex justify-center">
                    <div class="bg-gold text-navy px-4 py-1.5 rounded-full text-xs font-bold shadow-md flex flex-col items-center leading-tight">
                        <span>सबसे लोकप्रिय</span>
                        <span class="text-[8px] uppercase tracking-widest">Most Popular</span>
                    </div>
                </div>
                <div class="flex flex-col mb-6 pb-6 border-b border-gray-100 mt-2">
                    <h3 class="text-2xl font-bold text-navy mb-1">ग्रोथ</h3>
                    <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">Legal Growth</span>
                    <div class="mt-6 flex items-end gap-2">
                        <span class="text-4xl font-bold text-gold">₹6,999</span>
                        <span class="text-sm text-green-600 font-bold mb-1">Save ₹2,000</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Everything you need to go live legally.</p>
                </div>
                <ul class="space-y-3 mb-8 flex-grow">
                    @foreach(['Private Limited Registration','GST Registration & 3 Returns','Trademark Filing (1 Class)','Business Website (5 Pages)','Social Media Profiles Setup','Priority Support'] as $f)
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">{{ $f }}</span></li>
                    @endforeach
                </ul>
                <a href="/contact" class="w-full bg-gold text-navy hover:bg-yellow-500 min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md flex flex-col items-center justify-center">
                    <span class="text-[16px] font-extrabold">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-widest mt-0.5">Get Started</span>
                </a>
            </div>

            <!-- COMPLETE -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                <div class="flex flex-col mb-6 pb-6 border-b border-gray-100">
                    <h3 class="text-2xl font-bold text-navy mb-1">कम्पलीट</h3>
                    <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">Legal Complete</span>
                    <div class="mt-6 flex items-end gap-2">
                        <span class="text-4xl font-bold text-navy">₹14,999</span>
                        <span class="text-sm text-green-600 font-bold mb-1">Save ₹5,000</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Full legal protection + tech capability.</p>
                </div>
                <ul class="space-y-3 mb-8 flex-grow">
                    @foreach(['All Growth features','Trademark + Copyright','Mobile App (Android)','E-commerce Store Setup','FSSAI / IEC Registration','1 Year Free Support & Compliance'] as $f)
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">{{ $f }}</span></li>
                    @endforeach
                </ul>
                <a href="/contact" class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center">
                    <span class="text-[15px]">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-wider mt-0.5">Get Started</span>
                </a>
            </div>
        </div>

        <!-- TECH PACKAGES -->
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl md:text-4xl font-bold text-navy font-serif mb-2">💻 Tech Packages</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-widest">Website, App & Digital Presence</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">
            <!-- BASIC WEB -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                <div class="flex flex-col mb-6 pb-6 border-b border-gray-100">
                    <h3 class="text-2xl font-bold text-navy mb-1">वेब बेसिक</h3>
                    <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">Web Basic</span>
                    <div class="mt-6 flex items-end gap-2">
                        <span class="text-4xl font-bold text-navy">₹3,999</span>
                        <span class="text-sm text-green-600 font-bold mb-1">Save ₹1,000</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Perfect for a brand new online presence.</p>
                </div>
                <ul class="space-y-3 mb-8 flex-grow">
                    @foreach(['5-Page Responsive Website','Domain + Hosting (1 Year)','Logo Design','WhatsApp Chat Integration','Google Maps & Analytics Setup'] as $f)
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">{{ $f }}</span></li>
                    @endforeach
                </ul>
                <a href="/contact" class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center">
                    <span class="text-[15px]">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-wider mt-0.5">Get Started</span>
                </a>
            </div>

            <!-- DIGITAL PRO (Highlighted) -->
            <div class="bg-white rounded-2xl shadow-xl border-2 border-gold p-8 flex flex-col relative md:-my-4 hover:-translate-y-1 transition-transform duration-300 z-10">
                <div class="absolute -top-4 inset-x-0 flex justify-center">
                    <div class="bg-gold text-navy px-4 py-1.5 rounded-full text-xs font-bold shadow-md flex flex-col items-center leading-tight">
                        <span>सबसे लोकप्रिय</span>
                        <span class="text-[8px] uppercase tracking-widest">Most Popular</span>
                    </div>
                </div>
                <div class="flex flex-col mb-6 pb-6 border-b border-gray-100 mt-2">
                    <h3 class="text-2xl font-bold text-navy mb-1">डिजिटल प्रो</h3>
                    <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">Digital Pro</span>
                    <div class="mt-6 flex items-end gap-2">
                        <span class="text-4xl font-bold text-gold">₹7,999</span>
                        <span class="text-sm text-green-600 font-bold mb-1">Save ₹3,000</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Scale your digital marketing & presence.</p>
                </div>
                <ul class="space-y-3 mb-8 flex-grow">
                    @foreach(['10-Page Custom Website','E-commerce / Payment Gateway','Social Media Setup (5 Platforms)','SEO Optimization (3 Months)','Google Business Profile','Priority Email Support'] as $f)
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">{{ $f }}</span></li>
                    @endforeach
                </ul>
                <a href="/contact" class="w-full bg-gold text-navy hover:bg-yellow-500 min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md flex flex-col items-center justify-center">
                    <span class="text-[16px] font-extrabold">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-widest mt-0.5">Get Started</span>
                </a>
            </div>

            <!-- FULL DIGITAL -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 flex flex-col hover:-translate-y-1 transition-transform duration-300">
                <div class="flex flex-col mb-6 pb-6 border-b border-gray-100">
                    <h3 class="text-2xl font-bold text-navy mb-1">फुल डिजिटल</h3>
                    <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-400">Full Digital</span>
                    <div class="mt-6 flex items-end gap-2">
                        <span class="text-4xl font-bold text-navy">₹15,999</span>
                        <span class="text-sm text-green-600 font-bold mb-1">Save ₹6,000</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Complete tech transformation for your business.</p>
                </div>
                <ul class="space-y-3 mb-8 flex-grow">
                    @foreach(['All Digital Pro features','Android + iOS Mobile App','CRM / ERP Integration','Dedicated Account Manager','Monthly Performance Reports','1 Year Domain + Hosting Free'] as $f)
                    <li class="flex items-start gap-3"><svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">{{ $f }}</span></li>
                    @endforeach
                </ul>
                <a href="/contact" class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center">
                    <span class="text-[15px]">शुरू करें</span>
                    <span class="text-[10px] uppercase tracking-wider mt-0.5">Get Started</span>
                </a>
            </div>
        </div>

    </div>
</div>

<!-- COMPARE TABLE -->
<div class="bg-white py-20 border-t border-gray-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy font-serif mb-2">पैकेज तुलना</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-widest">Package Comparison</p>
        </div>
        <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-sm">
            <table class="w-full text-sm text-left">
                <thead class="bg-navy text-white">
                    <tr>
                        <th class="p-4 font-bold">Feature</th>
                        <th class="p-4 font-bold text-center">Starter</th>
                        <th class="p-4 font-bold text-center bg-gold text-navy">Growth ⭐</th>
                        <th class="p-4 font-bold text-center">Complete</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                    $rows = [
                        ['Company Registration','✓','✓ (Pvt Ltd)','✓'],
                        ['GST Registration','✓','✓','✓'],
                        ['Trademark','✗','✓','✓ + Copyright'],
                        ['Website','✗','5 Pages','Full Custom'],
                        ['Mobile App','✗','✗','Android'],
                        ['E-commerce','✗','✗','✓'],
                        ['Support','Email','Priority','Dedicated Manager'],
                        ['Price','₹2,499','₹6,999','₹14,999'],
                    ];
                    @endphp
                    @foreach($rows as $row)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-semibold text-navy">{{ $row[0] }}</td>
                        <td class="p-4 text-center text-gray-500">{{ $row[1] }}</td>
                        <td class="p-4 text-center font-bold text-navy bg-gold/5">{{ $row[2] }}</td>
                        <td class="p-4 text-center text-gray-500">{{ $row[3] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- CTA STRIP -->
<div class="bg-navy py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-3xl md:text-4xl font-bold text-gold font-serif mb-4">अभी शुरू करें — पहली Consultation मुफ़्त है</h2>
        <p class="text-gray-300 text-base mb-8">Not sure which package suits you? Talk to our expert in 2 minutes and get a personalized recommendation.</p>
        <a href="/contact" class="inline-block bg-gold text-navy font-extrabold text-lg px-10 py-4 rounded-xl hover:bg-yellow-400 transition-all shadow-xl hover:-translate-y-1">
            मुफ़्त परामर्श लें &rarr;
        </a>
    </div>
</div>

@endsection
