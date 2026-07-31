@extends('layouts.app')

@section('title', ($program->seo_title ?: $program->name . ' - Funding Opportunity | Foundida'))
@section('meta_description', ($program->seo_description ?: $program->short_description))
@section('meta_keywords', ($program->meta_keywords ?: $program->name . ', ' . $program->funding_type . ', ' . $program->organization_name))

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FinancialProduct",
  "name": "{{ $program->name }}",
  "provider": {
    "@@type": "Organization",
    "name": "{{ $program->organization_name }}"
  },
  "amount": "{{ $program->funding_amount }}",
  "description": "{{ $program->short_description }}",
  "url": "{{ route('funding.show', $program->slug) }}"
}
</script>
@endpush

@section('content')
@php
    $fundingPackages = \App\Models\Package::where('type', 'funding')->where('is_active', true)->orderBy('sort_order', 'asc')->get();
    $defaultPackage = $fundingPackages->first();
    $defaultPackageName = $defaultPackage ? $defaultPackage->name_en : 'Basic';
    $defaultPackagePrice = $defaultPackage ? $defaultPackage->price : 499;
@endphp

<div x-data="{ 
    assistedApplyModal: {{ $errors->any() ? 'true' : 'false' }}, 
    selfApplyModal: false, 
    activeProgram: {{ json_encode($program) }},
    selectedPackage: '{{ $defaultPackageName }}', 
    packagePrice: {{ $defaultPackagePrice }} 
}">
<section class="bg-navy py-12 text-white relative overflow-hidden border-b border-gold/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb -->
        <nav class="mb-6">
            <div class="hidden lg:flex items-center text-xs text-gray-400 space-x-2">
                <a href="/" class="hover:text-gold">Home</a>
                <span>/</span>
                <a href="{{ route('funding.index') }}" class="hover:text-gold">Funding Opportunities</a>
                <span>/</span>
                <span class="text-gold truncate max-w-[200px]">{{ $program->name }}</span>
            </div>
            <div class="lg:hidden">
                <a href="{{ route('funding.index') }}" class="inline-flex items-center text-xs text-gray-400 hover:text-gold transition-colors">
                    <i class="fas fa-arrow-left mr-1.5 text-gold"></i> Back to Opportunities
                </a>
            </div>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            <div class="lg:col-span-2 flex flex-col sm:flex-row items-start gap-4 sm:gap-6">
                <img src="{{ $program->organization_logo ?: 'https://ui-avatars.com/api/?name='.urlencode($program->organization_name).'&background=0B1F3A&color=D4A843' }}" alt="{{ $program->organization_name }}" class="w-16 h-16 rounded-2xl object-cover border-2 border-gold/30 shadow-lg shrink-0">
                <div class="min-w-0 flex-1">
                    <span class="text-xs font-bold text-gold uppercase tracking-widest block mb-1">{{ $program->organization_name }}</span>
                    <h1 class="text-2xl md:text-4xl font-extrabold font-serif leading-tight break-words">{{ $program->name }}</h1>
                    <div class="flex flex-wrap gap-2 mt-3">
                        <span class="bg-gold/20 text-gold text-xs font-extrabold px-3 py-1 rounded-full border border-gold/30 whitespace-nowrap">💰 {{ $program->funding_amount }}</span>
                        <span class="bg-white/10 text-white text-xs font-semibold px-3 py-1 rounded-full border border-white/10 whitespace-nowrap">🏷️ {{ $program->funding_type }}</span>
                        <span class="bg-white/10 text-white text-xs font-semibold px-3 py-1 rounded-full border border-white/10 whitespace-nowrap">🚀 Stage: {{ $program->startup_stage }}</span>
                        <span class="bg-white/10 text-white text-xs font-semibold px-3 py-1 rounded-full border border-white/10 whitespace-nowrap">📍 {{ $program->country }}</span>
                    </div>
                </div>
            </div>

            <!-- Action Card -->
            <div class="lg:col-span-1 bg-white/5 backdrop-blur-md border border-white/10 p-6 rounded-2xl w-full text-center space-y-3 lg:max-w-sm lg:justify-self-end">
                @if($program->official_apply_url)
                <button @click="selfApplyModal = true" class="block w-full bg-white hover:bg-gray-100 text-navy font-bold py-3 rounded-xl text-xs transition-all shadow-md">
                    Apply Yourself (Free Official Site)
                </button>
                @endif
                <button @click="assistedApplyModal = true" class="block w-full bg-gold hover:bg-gold-light text-navy font-extrabold py-3 rounded-xl text-xs transition-all shadow-md">
                    Apply via Foundida Assisted ✨
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Content Grid -->
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left: Full Details -->
        <div class="lg:col-span-2 space-y-8">
            
            <!-- Description Card -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-200">
                <h3 class="text-xl font-bold text-navy font-serif mb-4">About the Program</h3>
                <p class="text-sm text-gray-700 leading-relaxed mb-6 whitespace-pre-line">{{ $program->description ?: $program->short_description }}</p>

                @if($program->eligibility)
                <h4 class="text-base font-bold text-navy font-serif mb-2">Eligibility Criteria</h4>
                <div class="text-xs text-gray-600 leading-relaxed mb-6 whitespace-pre-line">
                    @foreach(explode("\n", $program->eligibility) as $line)
                        @if(trim($line))
                            <div class="mb-1">{{ $line }}</div>
                        @endif
                    @endforeach
                </div>
                @endif

                @if($program->required_documents)
                <h4 class="text-base font-bold text-navy font-serif mb-2">Required Documents</h4>
                <div class="text-xs text-gray-600 leading-relaxed whitespace-pre-line">
                    @foreach(explode("\n", $program->required_documents) as $line)
                        @if(trim($line))
                            <div class="mb-1">{{ $line }}</div>
                        @endif
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Disclaimer -->
            <div class="bg-navy/5 border border-navy/10 p-6 rounded-2xl text-xs text-gray-600">
                <strong class="text-navy">Disclaimer:</strong> Foundida is an independent startup support platform. We do not provide funding and do not guarantee approval. Funding decisions are made solely by the respective funding organization. Our paid service only covers application preparation, document review, and submission assistance.
            </div>

        </div>

        <!-- Right: Program Meta Info -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-200 space-y-4">
                <h3 class="text-base font-bold text-navy font-serif border-b border-gray-100 pb-3">Opportunity Snapshot</h3>
                
                <div class="space-y-3 text-xs">
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-bold uppercase">Funding Amount</span>
                        <span class="font-bold text-emerald-600">{{ $program->funding_amount }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-bold uppercase">Type</span>
                        <span class="font-semibold text-navy">{{ $program->funding_type }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-bold uppercase">Startup Stage</span>
                        <span class="font-semibold text-navy">{{ $program->startup_stage }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-bold uppercase">Country</span>
                        <span class="font-semibold text-navy">{{ $program->country }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400 font-bold uppercase">Deadline</span>
                        <span class="font-semibold text-navy">{{ $program->application_deadline ? $program->application_deadline->format('d M Y') : 'Open' }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- MODAL 1: Self Apply Confirmation Popup -->
<template x-teleport="body">
    <div x-show="selfApplyModal" x-transition.opacity class="fixed inset-0 top-0 left-0 w-screen h-screen flex items-center justify-center p-4" style="display: none; z-index: 9999999; background-color: rgba(6, 16, 29, 0.9);">
        <div @click.away="selfApplyModal = false" class="bg-white rounded-3xl p-8 max-w-md w-full shadow-2xl relative border border-gray-100 text-center">
            <div class="w-14 h-14 bg-gold/10 text-gold rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                <i class="fas fa-external-link-alt"></i>
            </div>
            <h3 class="text-xl font-bold text-navy font-serif mb-2">Official Redirection</h3>
            <p class="text-xs text-gray-600 mb-6 leading-relaxed">
                You will now be redirected to the official website of the funding organization:
                <strong class="block text-navy mt-1" x-text="activeProgram?.organization_name"></strong>
            </p>

            <div class="bg-gray-50 p-4 rounded-xl text-left text-xs text-gray-500 mb-6 space-y-1">
                <div>• Program: <span class="font-bold text-navy" x-text="activeProgram?.name"></span></div>
                <div>• Official Link: <span class="text-blue-600 truncate block" x-text="activeProgram?.official_apply_url"></span></div>
            </div>

            <div class="flex gap-3">
                <button @click="selfApplyModal = false" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 rounded-xl font-bold text-xs transition-all">
                    Cancel
                </button>
                <a :href="activeProgram?.official_apply_url" target="_blank" @click="selfApplyModal = false" class="flex-1 bg-navy hover:bg-navy/90 text-gold py-3 rounded-xl font-bold text-xs transition-all shadow-md inline-block">
                    Proceed to Official Site ➔
                </a>
            </div>
        </div>
    </div>
</template>

<!-- MODAL 2: Foundida Assisted Application Form -->
<template x-teleport="body">
    <div x-show="assistedApplyModal" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 overflow-y-auto"
         style="display: none; z-index: 9999999; background-color: rgba(6, 16, 29, 0.9);">
        
        <div class="flex min-h-screen items-center justify-center p-4">
            <div @click.away="assistedApplyModal = false" class="bg-white rounded-3xl max-w-2xl w-full shadow-[0_25px_50px_-12px_rgba(0,0,0,0.9)] relative border border-gray-200 flex flex-col max-h-[90vh] text-navy overflow-hidden my-4 md:my-8 text-left">
                
                <!-- Fixed Modal Header -->
                <div class="p-6 pb-4 bg-white border-b border-gray-100 flex justify-between items-center shrink-0">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gold rounded-xl flex items-center justify-center text-navy font-bold text-lg shadow-sm">
                            ✨
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-navy font-serif leading-tight">Apply Through Foundida</h3>
                            <p class="text-xs text-gray-400">Our experts prepare, review, and submit your funding application.</p>
                        </div>
                    </div>
                    <button @click="assistedApplyModal = false" type="button" class="text-gray-400 hover:text-navy text-xl w-9 h-9 flex items-center justify-center bg-gray-100 hover:bg-gray-200 rounded-full transition-colors">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Scrollable Form Body -->
                <div class="p-6 md:p-8 overflow-y-auto flex-1 space-y-4">
                    <form action="{{ route('funding.assisted.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <input type="hidden" name="funding_program_id" :value="activeProgram?.id">

                        @if ($errors->any())
                            <div class="p-4 mb-4 bg-red-50 border border-red-200 text-red-600 rounded-2xl text-xs space-y-1">
                                <strong class="block font-bold mb-1">Please fix the following issues:</strong>
                                @foreach ($errors->all() as $error)
                                    <div>• {{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Package Selection -->
                        <div class="mb-6">
                            <label class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Select Service Package</label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                @foreach($fundingPackages as $pkg)
                                <label class="border rounded-2xl p-4 text-center cursor-pointer transition-all duration-300 relative overflow-hidden" :class="selectedPackage === '{{ $pkg->name_en }}' ? 'border-gold bg-gradient-to-b from-gold/10 to-transparent ring-2 ring-gold shadow-lg shadow-gold/10 scale-105 z-10' : 'border-gray-200 hover:border-gold/40 hover:bg-gray-50'">
                                    <input type="radio" name="package_name" value="{{ $pkg->name_en }}" x-model="selectedPackage" @change="packagePrice = {{ $pkg->price }}" class="sr-only">
                                    <span class="block font-extrabold text-[13px] text-navy mb-1">{{ $pkg->name_en }}</span>
                                    <span class="block text-xs text-emerald-600 font-extrabold mt-0.5">
                                        @if($pkg->price == 4999 || $pkg->slug == 'funding-enterprise')
                                            Custom
                                        @else
                                            ₹{{ $pkg->price }}
                                        @endif
                                    </span>
                                    <span class="block text-[9px] text-gray-400 mt-1">{{ $pkg->description_en }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase">Founder Name *</label>
                                <input type="text" name="founder_name" value="{{ auth()->user()->name ?? '' }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase">Email Address *</label>
                                <input type="email" name="email" value="{{ auth()->user()->email ?? '' }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase">Mobile Number *</label>
                                <input type="tel" name="mobile" value="{{ auth()->user()->phone ?? '' }}" required placeholder="9876543210" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase">Startup Name *</label>
                                <input type="text" name="startup_name" required placeholder="e.g. Acme Tech Pvt Ltd" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase">Industry *</label>
                                <input type="text" name="industry" required placeholder="e.g. FinTech, SaaS" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase">Startup Stage *</label>
                                <select name="startup_stage" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner">
                                    <option value="Idea">Idea Stage</option>
                                    <option value="MVP">MVP / Prototype</option>
                                    <option value="Early Stage">Early Stage Traction</option>
                                    <option value="Growth">Growth & Revenue</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase">Funding Required *</label>
                            <input type="text" name="funding_required" required placeholder="e.g. ₹25 Lakhs / $100,000" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner">
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase">Startup Description *</label>
                            <textarea name="startup_description" rows="2" required placeholder="Briefly describe your product, market, and business model..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase">Website URL</label>
                                <input type="url" name="website" placeholder="https://mycompany.com" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase">LinkedIn Profile</label>
                                <input type="url" name="linkedin" placeholder="https://linkedin.com/in/founder" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner">
                            </div>
                        </div>

                        <!-- Document Uploads -->
                        <div class="border-t border-gray-100 pt-3">
                            <label class="block text-xs font-bold text-navy uppercase tracking-wider mb-2">Upload Startup Documents (Optional)</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs">
                                <div>
                                    <span class="block text-[10px] font-semibold text-gray-400">Pitch Deck (PDF/PPT)</span>
                                    <input type="file" name="pitch_deck" class="mt-1 block w-full text-[10px] text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-navy/10 file:text-navy hover:file:bg-navy/20">
                                </div>
                                <div>
                                    <span class="block text-[10px] font-semibold text-gray-400">Business Plan (DOC/PDF)</span>
                                    <input type="file" name="business_plan" class="mt-1 block w-full text-[10px] text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-navy/10 file:text-navy hover:file:bg-navy/20">
                                </div>
                                <div>
                                    <span class="block text-[10px] font-semibold text-gray-400">Financial Projection</span>
                                    <input type="file" name="financial_projection" class="mt-1 block w-full text-[10px] text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded-lg file:border-0 file:text-[10px] file:font-semibold file:bg-navy/10 file:text-navy hover:file:bg-navy/20">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-gray-500 uppercase">Additional Notes</label>
                            <textarea name="additional_notes" rows="2" placeholder="Any specific requirements or notes for our executive..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3.5 py-2 text-xs text-navy focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold focus:bg-white transition-all shadow-inner"></textarea>
                        </div>

                        <div class="pt-2 flex items-center justify-between border-t border-gray-100">
                            <div>
                                <span class="block text-[10px] text-gray-400 uppercase font-bold">Total Fee</span>
                                <span class="text-xl font-extrabold text-navy" x-text="'₹' + packagePrice"></span>
                            </div>
                            <button type="submit" class="bg-gradient-to-r from-gold to-[#a88d30] hover:from-[#e5b849] hover:to-[#b69a37] text-navy px-8 py-3.5 rounded-xl font-extrabold text-sm transition-all shadow-lg hover:shadow-xl shadow-gold/20 transform hover:-translate-y-0.5">
                                Proceed to Secure Checkout 🔒
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
</div>
</section>
@endsection
