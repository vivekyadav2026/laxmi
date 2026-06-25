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
<div class="bg-offwhite py-20"
     x-data="{ 
         showInquiryModal: {{ (session('package_inquiry_success') || $errors->has('name') || $errors->has('phone') || $errors->has('email') || $errors->has('package_slug')) ? 'true' : 'false' }},
         selectedPkgNameHi: '{{ old('package_slug') ? (\App\Models\Package::where('slug', old('package_slug'))->first()->name_hi ?? '') : '' }}',
         selectedPkgNameEn: '{{ old('package_slug') ? (\App\Models\Package::where('slug', old('package_slug'))->first()->name_en ?? '') : '' }}',
         selectedPkgSlug: '{{ old('package_slug') ?? '' }}',
         selectedPkgPrice: '{{ old('package_slug') ? number_format(\App\Models\Package::where('slug', old('package_slug'))->first()->price ?? 0) : '' }}'
     }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- LEGAL PACKAGES -->
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl md:text-4xl font-bold text-navy font-serif mb-2">⚖️ Legal Packages</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-widest">Business Registration & Compliance</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center mb-20">
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
                        <button @click="showInquiryModal = true; selectedPkgNameHi = '{{ $pkg->name_hi }}'; selectedPkgNameEn = '{{ $pkg->name_en }}'; selectedPkgSlug = '{{ $pkg->slug }}'; selectedPkgPrice = '{{ number_format($pkg->price) }}'" 
                                type="button" 
                                class="w-full bg-gold text-navy hover:bg-yellow-500 min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md flex flex-col items-center justify-center">
                            <span class="text-[16px] font-extrabold">शुरू करें</span>
                            <span class="text-[10px] uppercase tracking-widest mt-0.5">Get Started</span>
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
                            <li class="flex items-start gap-3"><svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">{{ $f }}</span></li>
                            @endforeach
                        </ul>
                        <button @click="showInquiryModal = true; selectedPkgNameHi = '{{ $pkg->name_hi }}'; selectedPkgNameEn = '{{ $pkg->name_en }}'; selectedPkgSlug = '{{ $pkg->slug }}'; selectedPkgPrice = '{{ number_format($pkg->price) }}'" 
                                type="button" 
                                class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center">
                            <span class="text-[15px]">शुरू करें</span>
                            <span class="text-[10px] uppercase tracking-wider mt-0.5">Get Started</span>
                        </button>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- TECH PACKAGES -->
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl md:text-4xl font-bold text-navy font-serif mb-2">💻 Tech Packages</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-widest">Website, App & Digital Presence</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-center">
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
                        <button @click="showInquiryModal = true; selectedPkgNameHi = '{{ $pkg->name_hi }}'; selectedPkgNameEn = '{{ $pkg->name_en }}'; selectedPkgSlug = '{{ $pkg->slug }}'; selectedPkgPrice = '{{ number_format($pkg->price) }}'" 
                                type="button" 
                                class="w-full bg-gold text-navy hover:bg-yellow-500 min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md flex flex-col items-center justify-center">
                            <span class="text-[16px] font-extrabold">शुरू करें</span>
                            <span class="text-[10px] uppercase tracking-widest mt-0.5">Get Started</span>
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
                            <li class="flex items-start gap-3"><svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">{{ $f }}</span></li>
                            @endforeach
                        </ul>
                        <button @click="showInquiryModal = true; selectedPkgNameHi = '{{ $pkg->name_hi }}'; selectedPkgNameEn = '{{ $pkg->name_en }}'; selectedPkgSlug = '{{ $pkg->slug }}'; selectedPkgPrice = '{{ number_format($pkg->price) }}'" 
                                type="button" 
                                class="w-full border-2 border-navy text-navy hover:bg-navy hover:text-white min-h-[48px] rounded-xl font-bold transition-all duration-300 flex flex-col items-center justify-center">
                            <span class="text-[15px]">शुरू करें</span>
                            <span class="text-[10px] uppercase tracking-wider mt-0.5">Get Started</span>
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
                                <span x-text="selectedPkgNameEn" class="text-gray-500 font-sans font-bold text-lg"></span>
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
                        @foreach($legalPackages as $pkg)
                            <th class="p-4 font-bold text-center {{ $pkg->is_popular ? 'bg-gold text-navy' : '' }}">
                                {{ $pkg->name_en }} {{ $pkg->is_popular ? '⭐' : '' }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                    $compareKeys = [
                        'Company Registration',
                        'GST Registration',
                        'Trademark',
                        'Website',
                        'Mobile App',
                        'E-commerce',
                        'Support',
                    ];
                    @endphp
                    @foreach($compareKeys as $key)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-semibold text-navy">{{ $key }}</td>
                        @foreach($legalPackages as $pkg)
                        <td class="p-4 text-center {{ $pkg->is_popular ? 'font-bold text-navy bg-gold/5' : 'text-gray-500' }}">
                            {{ $pkg->comparison_features[$key] ?? '✗' }}
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                    <!-- Price Row -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-semibold text-navy">Price</td>
                        @foreach($legalPackages as $pkg)
                        <td class="p-4 text-center font-extrabold {{ $pkg->is_popular ? 'text-[#D4A843] bg-gold/5 text-lg' : 'text-navy text-base' }}">
                            ₹{{ number_format($pkg->price) }}
                        </td>
                        @endforeach
                    </tr>
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
