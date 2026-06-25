@extends('layouts.app')

@section('title', 'संपर्क करें | Contact Us - Foundida')

@section('content')
<!-- BREADCRUMB -->
<div class="bg-navy py-4 border-b border-navy-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="flex flex-col text-gray-300 hover:text-gold transition">
                        <span class="font-bold leading-tight">होम</span>
                        <span class="text-[10px] uppercase">Home</span>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <div class="flex flex-col text-gold ml-1 md:ml-2">
                            <span class="font-bold leading-tight">संपर्क करें</span>
                            <span class="text-[10px] uppercase">Contact Us</span>
                        </div>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                CONTACT SUPPORT
            </span>
        </div>
        <h1 class="font-serif text-[32px] md:text-[48px] font-bold text-white leading-tight mb-4">
            हम से <span class="text-[#f5a623]">संपर्क</span> करें
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed max-w-[600px] mx-auto">
            We are here to help you
        </p>
    </div>
</x-inner-hero>

<!-- MAIN CONTENT SECTION -->
<div class="bg-offwhite py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-12">
            
            <!-- LEFT - CONTACT FORM -->
            <div class="w-full lg:w-3/5">
                <div class="bg-white p-6 md:p-10 rounded-3xl shadow-xl shadow-gray-100/50 border border-gray-100">
                    <div class="flex flex-col mb-8">
                        <h2 class="text-2xl md:text-3xl font-bold text-navy mb-1 font-serif">हमें संदेश भेजें</h2>
                        <span class="text-xs font-bold text-gold uppercase tracking-wider">Send us a message</span>
                    </div>

                    @if(session('callback_success'))
                        <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-5 text-center my-4 animate-fadeIn">
                            <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-3 text-xl font-bold">
                                ✓
                            </div>
                            <h4 class="text-emerald-950 font-bold text-base mb-1 font-serif">संदेश प्राप्त हुआ! / Message Received!</h4>
                            <p class="text-emerald-800 text-xs leading-relaxed mb-4">{{ session('callback_success') }}</p>
                        </div>
                    @else
                        <form action="{{ route('callback.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Full Name -->
                                <div class="group">
                                    <label class="flex flex-col mb-2 text-navy">
                                        <span class="font-bold text-sm">पूरा नाम <span class="text-red-500">*</span></span>
                                                                   <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition-colors">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="उदा: अमित पटेल / Ex: Amit Patel" class="w-full pr-4 py-3 bg-gray-50/50 border border-gray-200 @error('name') border-red-500 focus:ring-red-500 focus:border-red-500 @else focus:ring-navy focus:border-navy @enderror rounded-xl shadow-sm text-navy placeholder-gray-400 font-medium transition-all duration-200 focus:bg-white focus:shadow-md outline-none" style="padding-left: 2.75rem;">
                                    </div>
                                    @error('name')
                                        <p class="text-red-500 text-[11px] mt-1 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone Number -->
                                <div class="group">
                                    <label class="flex flex-col mb-2 text-navy">
                                        <span class="font-bold text-sm">फ़ोन नंबर (WhatsApp) <span class="text-red-500">*</span></span>
                                        <span class="text-[10px] uppercase text-gray-400 font-bold tracking-wider">Phone Number (10 digits)</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition-colors">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="उदा: 9876543210 / Ex: 9876543210" class="w-full pr-4 py-3 bg-gray-50/50 border border-gray-200 @error('phone') border-red-500 focus:ring-red-500 focus:border-red-500 @else focus:ring-navy focus:border-navy @enderror rounded-xl shadow-sm text-navy placeholder-gray-400 font-medium transition-all duration-200 focus:bg-white focus:shadow-md outline-none" style="padding-left: 2.75rem;">
                                    </div>
                                    @error('phone')
                                        <p class="text-red-500 text-[11px] mt-1 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- City -->
                                <div class="group">
                                    <label class="flex flex-col mb-2 text-navy">
                                        <span class="font-bold text-sm">शहर <span class="text-red-500">*</span></span>
                                        <span class="text-[10px] uppercase text-gray-400 font-bold tracking-wider">City</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition-colors">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="city" value="{{ old('city') }}" required placeholder="उदा: मुंबई, दिल्ली / Ex: Mumbai, Delhi" class="w-full pr-4 py-3 bg-gray-50/50 border border-gray-200 @error('city') border-red-500 focus:ring-red-500 focus:border-red-500 @else focus:ring-navy focus:border-navy @enderror rounded-xl shadow-sm text-navy placeholder-gray-400 font-medium transition-all duration-200 focus:bg-white focus:shadow-md outline-none" style="padding-left: 2.75rem;">
                                    </div>
                                    @error('city')
                                        <p class="text-red-500 text-[11px] mt-1 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Service Needed -->
                                <div>
                                    <label class="flex flex-col mb-2 text-navy">
                                        <span class="font-bold text-sm">सेवा चुनें <span class="text-red-500">*</span></span>
                                        <span class="text-[10px] uppercase text-gray-400 font-bold tracking-wider">Service Needed</span>
                                    </label>
                                    @php
                                        $dbCategories = \App\Models\ServiceCategory::with('services')->get();
                                    @endphp
                                    <div x-data="{
                                        open: false,
                                        search: '',
                                        selectedVal: '{{ old('service') }}',
                                        selectedLabel: '{{ old('service') ? '' : 'चुनें / Select a service...' }}',
                                        services: [
                                            @foreach($dbCategories as $cat)
                                                @foreach($cat->services as $svc)
                                                    {
                                                        slug: '{{ $svc->slug }}',
                                                        name_en: '{{ str_replace("'", "\\'", $svc->name_en) }}',
                                                        name_hi: '{{ str_replace("'", "\\'", $svc->name_hi) }}',
                                                        category: '{{ str_replace("'", "\\'", $cat->name) }}'
                                                    },
                                                @endforeach
                                            @endforeach
                                        ],
                                        init() {
                                            if (this.selectedVal) {
                                                let match = this.services.find(s => s.slug === this.selectedVal);
                                                if (match) {
                                                    this.selectedLabel = (match.name_hi ? match.name_hi + ' / ' : '') + match.name_en;
                                                } else if (this.selectedVal === 'other') {
                                                    this.selectedLabel = 'अन्य सेवा / Other Service';
                                                }
                                            }
                                        },
                                        get filteredServices() {
                                            if (!this.search) return this.services;
                                            let query = this.search.toLowerCase();
                                            return this.services.filter(s => 
                                                s.name_en.toLowerCase().includes(query) || 
                                                (s.name_hi && s.name_hi.toLowerCase().includes(query)) ||
                                                s.category.toLowerCase().includes(query)
                                            );
                                        },
                                        selectService(slug, label) {
                                            this.selectedVal = slug;
                                            this.selectedLabel = label;
                                            this.open = false;
                                            this.search = '';
                                        }
                                    }" class="relative">
                                        
                                        <!-- Hidden input for form submission -->
                                        <input type="hidden" name="service" :value="selectedVal">

                                        <!-- Trigger Button -->
                                        <button @click="open = !open" type="button" class="w-full border @error('service') border-red-500 @else border-gray-200 @enderror rounded-xl shadow-sm text-left flex justify-between items-center py-3 pr-4 bg-gray-50/50 relative z-20 focus:bg-white focus:shadow-md focus:border-navy transition-all duration-200" style="padding-left: 2.75rem;">
                                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                                </svg>
                                            </div>
                                            <span x-text="selectedLabel" class="text-navy text-sm font-semibold truncate"></span>
                                            <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown List -->
                                        <div x-show="open" 
                                             @click.away="open = false" 
                                             x-transition:enter="transition ease-out duration-100"
                                             x-transition:enter-start="transform opacity-0 scale-95"
                                             x-transition:enter-end="transform opacity-100 scale-100"
                                             x-transition:leave="transition ease-in duration-75"
                                             x-transition:leave-start="transform opacity-100 scale-100"
                                             x-transition:leave-end="transform opacity-0 scale-95"
                                             class="absolute left-0 right-0 mt-1 bg-white border border-gray-200 shadow-2xl rounded-2xl z-50 overflow-hidden flex flex-col max-h-[300px]">
                                            
                                            <!-- Search Input Box -->
                                            <div class="p-2 border-b border-gray-100 bg-gray-50">
                                                <div class="relative">
                                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                                        <i class="fas fa-search text-[10px]"></i>
                                                    </span>
                                                    <input x-model="search" 
                                                           type="text" 
                                                           placeholder="खोजें... / Search service..." 
                                                           class="w-full bg-white border border-gray-200 rounded-lg pl-8 pr-3 py-1.5 text-xs text-gray-900 placeholder-gray-400 focus:outline-none focus:border-[#f5a623] transition-colors">
                                                </div>
                                            </div>

                                            <!-- Options list -->
                                            <div class="overflow-y-auto divide-y divide-gray-100 flex-1 min-h-0">
                                                <template x-if="filteredServices.length === 0">
                                                    <div class="p-4 text-center text-xs text-gray-400">
                                                        कोई सेवा नहीं मिली / No services found
                                                    </div>
                                                </template>
                                                
                                                <div class="py-1">
                                                    <template x-for="svc in filteredServices" :key="svc.slug">
                                                        <button @click="selectService(svc.slug, (svc.name_hi ? svc.name_hi + ' / ' : '') + svc.name_en)"
                                                                type="button"
                                                                class="w-full text-left px-4 py-2.5 hover:bg-gray-50 transition-colors flex items-center justify-between group">
                                                            <div class="flex flex-col truncate pr-2">
                                                                <span x-text="svc.name_hi ? svc.name_hi : svc.name_en" class="text-xs font-bold text-navy group-hover:text-[#f5a623] transition-colors truncate"></span>
                                                                <span x-text="svc.name_en" class="text-[10px] text-gray-400 truncate" x-show="svc.name_hi"></span>
                                                            </div>
                                                            <span x-text="svc.category" class="text-[9px] bg-gray-100 text-gray-500 font-bold uppercase px-2 py-0.5 rounded-full shrink-0"></span>
                                                        </button>
                                                    </template>
                                                    
                                                    <!-- Other option -->
                                                    <button x-show="!search || 'other'.includes(search.toLowerCase()) || 'अन्य'.includes(search)"
                                                            @click="selectService('other', 'अन्य सेवा / Other Service')"
                                                            type="button"
                                                            class="w-full text-left px-4 py-2.5 hover:bg-gray-50 transition-colors flex items-center justify-between group">
                                                        <div class="flex flex-col">
                                                            <span class="text-xs font-bold text-navy group-hover:text-[#f5a623] transition-colors">अन्य सेवा / Other Service</span>
                                                        </div>
                                                        <span class="text-[9px] bg-navy/5 text-navy font-bold uppercase px-2 py-0.5 rounded-full shrink-0">General</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('service')
                                        <p class="text-red-500 text-[11px] mt-1 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="group">
                                <label class="flex flex-col mb-2 text-navy">
                                    <span class="font-bold text-sm">संदेश / समस्या का विवरण <span class="text-red-500">*</span></span>
                                    <span class="text-[10px] uppercase text-gray-400 font-bold tracking-wider">Message / Problem Description</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute top-3.5 left-3.5 pointer-events-none text-gray-400 group-focus-within:text-gold transition-colors">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                    </div>
                                    <textarea name="message" required rows="4" placeholder="हम आपकी कैसे मदद कर सकते हैं? / How can we help you?" class="w-full pr-4 py-3 bg-gray-50/50 border border-gray-200 @error('message') border-red-500 focus:ring-red-500 focus:border-red-500 @else focus:ring-navy focus:border-navy @enderror rounded-xl shadow-sm text-navy placeholder-gray-400 font-medium transition-all duration-200 focus:bg-white focus:shadow-md outline-none" style="padding-left: 2.75rem;">{{ old('message') }}</textarea>
                                </div>
                                @error('message')
                                    <p class="text-red-500 text-[11px] mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
                                <button type="submit" class="w-full sm:w-auto bg-gold text-navy hover:bg-[#e2961d] active:scale-[0.98] min-h-[56px] px-10 rounded-xl font-bold transition-all duration-200 shadow-lg shadow-gold/20 hover:shadow-gold/30 flex flex-col items-center justify-center">
                                    <span class="text-[16px] font-extrabold">भेजें</span>
                                    <span class="text-[10px] uppercase tracking-widest mt-0.5">Submit</span>
                                </button>
                                <div class="flex items-center text-green-700 bg-green-50 px-4 py-2 rounded-lg border border-green-200 w-full sm:w-auto justify-center">
                                    <svg class="w-5 h-5 mr-2 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="flex flex-col">
                                        <span class="text-[11px] font-bold leading-tight">हम 2 घंटे में जवाब देंगे</span>
                                        <span class="text-[9px] uppercase tracking-wider">We reply within 2 hours</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>

            <!-- RIGHT - CONTACT OPTIONS -->
            <div class="w-full lg:w-2/5 space-y-6">
                
                <!-- WhatsApp -->
                <a href="https://wa.me/918750530252" target="_blank" rel="noopener noreferrer" class="block bg-[#25D366] text-white p-6 rounded-2xl shadow hover:shadow-lg hover:-translate-y-1 transition-all duration-300 border border-[#1DA851] group">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <span class="text-2xl font-bold font-serif mb-1 group-hover:scale-105 transition-transform origin-left">अभी WhatsApp करें</span>
                            <span class="text-[11px] uppercase tracking-widest font-semibold opacity-90">WhatsApp Now</span>
                        </div>
                        <svg class="w-12 h-12 opacity-90 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.898-4.45 9.898-9.892 0-2.645-1.03-5.13-2.903-6.998-1.871-1.868-4.356-2.897-6.996-2.897-5.448 0-9.896 4.45-9.896 9.892 0 2.05.542 3.916 1.564 5.568l-1.01 3.692 3.951-1.057zm10.518-7.014c-.156-.25-.562-.4-.1.173-.807-.063-2.146.331-2.45.626-2.637-.282-.507-.375-.72-.937-3.14-1.25-.625-1.062-1.031-2.187-2.312-3.155-2.688-.875-.375-1.25-.375-1.437.031-.187.438-1.375.625-1.562.188-.188.375-.25.563-.25.188 0 .375.031.531.063.156.031.375.125.625.5.25.375.938 1.438 1.031 1.625.094.188.156.406.031.656-.125.25-.188.406-.375.656-.188.25-.375.531-.531.75-.188.219-.406.469-.188.875.219.406.969 1.625 2.063 2.594 1.406 1.25 2.625 1.625 3.031 1.844.406.219.656.188.906-.094.25-.281 1.063-1.25 1.344-1.688.281-.438.563-.375.938-.219.375.156 2.375 1.125 2.781 1.313.406.187.688.281.781.437.094.156.094.875-.375 1.75z"/></svg>
                    </div>
                </a>

                <!-- Phone -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-navy rounded-full flex items-center justify-center text-gold shrink-0 mr-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div class="flex flex-col">
                            <div class="text-sm text-gray-500 font-bold uppercase tracking-wider mb-2">Call Us Directly</div>
                            <a href="tel:+918750530252" class="text-2xl font-extrabold text-navy hover:text-gold transition-colors">+91 87505 30252</a>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-navy rounded-full flex items-center justify-center text-gold shrink-0 mr-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">ईमेल / Email</span>
                            <a href="mailto:hello@foundida.com" class="text-lg font-bold text-navy hover:text-gold transition-colors">hello@foundida.com</a>
                        </div>
                    </div>
                </div>

                <!-- Office Hours -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-navy rounded-full flex items-center justify-center text-gold shrink-0 mr-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="flex flex-col text-sm font-semibold text-navy w-full space-y-2">
                            <div class="flex flex-col mb-2">
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-tight">कार्यालय समय / Office Hours</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-100 pb-1">
                                <div class="flex flex-col">
                                    <span class="leading-tight">सोम - शनि</span>
                                    <span class="text-[9px] uppercase text-gray-500">Mon - Sat</span>
                                </div>
                                <span>9:00 AM - 7:00 PM</span>
                            </div>
                            <div class="flex justify-between text-gray-500 pt-1">
                                <div class="flex flex-col">
                                    <span class="leading-tight">रविवार</span>
                                    <span class="text-[9px] uppercase text-gray-400">Sunday</span>
                                </div>
                                <span>10:00 AM - 4:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="bg-navy p-6 rounded-2xl shadow-sm border border-navy-600 hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gold rounded-full flex items-center justify-center text-navy shrink-0 mr-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div class="flex flex-col text-white">
                            <div class="flex flex-col mb-2">
                                <span class="text-[10px] font-bold text-gold uppercase tracking-widest leading-tight">प्रधान कार्यालय / Head Office</span>
                            </div>
                            <span class="font-semibold text-sm leading-relaxed mb-0.5">बी-42, लीगल टेक टावर, साइबर सिटी, फेज़ 3, गुरुग्राम, हरियाणा - 122002</span>
                            <span class="text-[10px] uppercase tracking-widest text-gray-400">B-42, Legal Tech Tower, Cyber City, Phase 3, Gurugram, Haryana - 122002</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- FAQ SECTION -->
<div class="bg-white py-20 border-t border-gray-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-1 font-serif">सामान्य प्रश्न (FAQ)</h2>
            <span class="text-sm font-bold text-gold uppercase tracking-wider">Frequently Asked Questions</span>
        </div>

        <div class="space-y-4">
            @foreach($faqs as $index => $faq)
            <div x-data="{ open: false }" class="border border-gray-200 rounded-xl bg-white overflow-hidden shadow-sm hover:shadow transition-shadow">
                <button @click="open = !open" class="w-full flex justify-between items-center p-6 text-left focus:outline-none min-h-[48px] group">
                    <div class="flex flex-col pr-8">
                        <span class="font-bold text-navy text-[16px] group-hover:text-gold transition-colors leading-tight mb-1">{{ $faq['q_hi'] }}</span>
                        <span class="text-xs font-semibold text-gray-500 uppercase tracking-widest">{{ $faq['q_en'] }}</span>
                    </div>
                    <svg class="w-5 h-5 text-gold transform transition-transform duration-300 shrink-0" :class="{'rotate-180': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-collapse x-cloak>
                    <div class="p-6 pt-0 bg-gray-50 border-t border-gray-100 flex flex-col">
                        <p class="text-gray-700 text-sm leading-relaxed mb-2">{{ $faq['a_hi'] }}</p>
                        <p class="text-gray-500 text-xs leading-relaxed border-t border-gray-200 pt-2">{{ $faq['a_en'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-12 text-center">
            <div class="flex flex-col items-center p-6 bg-navy-50 rounded-2xl border border-navy-100">
                <div class="flex flex-col mb-4">
                    <span class="font-bold text-navy text-lg leading-tight mb-1">क्या अभी भी कोई प्रश्न है?</span>
                    <span class="text-[10px] uppercase tracking-widest font-bold text-gray-500">Still have a question?</span>
                </div>
                <button class="bg-navy text-white hover:bg-navy-800 min-h-[48px] px-8 rounded-xl font-bold transition-colors shadow-md flex flex-col items-center justify-center">
                    <span class="text-[14px]">वकील से बात करें</span>
                    <span class="text-[9px] uppercase tracking-widest mt-0.5">Talk to a Lawyer</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
