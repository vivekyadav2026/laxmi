@extends('layouts.app')

@section('title', 'Startup Funding Opportunities 2026 | Grants, Investors, Incubators - Foundida')
@section('meta_description', 'Discover active startup funding opportunities, government grants, seed capital, VCs, and accelerators in India. Apply directly or hire Foundida to prepare your application.')
@section('meta_keywords', 'Startup Funding, Government Grants India, VC Funding, Seed Funds, Accelerators, Startup India Seed Fund, Foundida')

@section('content')
@php
    $fundingPackages = \App\Models\Package::where('type', 'funding')->where('is_active', true)->orderBy('sort_order', 'asc')->get();
    $defaultPackage = $fundingPackages->first();
    $defaultPackageName = $defaultPackage ? $defaultPackage->name_en : 'Basic';
    $defaultPackagePrice = $defaultPackage ? $defaultPackage->price : 499;
@endphp

<div x-data="{ 
    selfApplyModal: false, 
    assistedApplyModal: {{ $errors->any() ? 'true' : 'false' }}, 
    activeProgram: null,
    selectedPackage: '{{ $defaultPackageName }}',
    packagePrice: {{ $defaultPackagePrice }},
    shareUrl: '',
    copied: false
}">
    <!-- Header Banner -->
    <section class="bg-navy relative overflow-hidden py-12 md:py-16 text-white border-b border-gold/20 z-0">
        <div class="absolute inset-0 opacity-15" style="background-image: radial-gradient(#D4A843 1.5px, transparent 1.5px); background-size: 24px 24px;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-0 text-center">
            <div class="inline-flex items-center gap-2 bg-gold/10 border border-gold/30 rounded-full px-4 py-1.5 mb-4">
                <span class="text-xs font-bold text-gold uppercase tracking-widest">
                    <i class="fas fa-rocket mr-1"></i> STARTUP FUNDING MARKETPLACE
                </span>
            </div>
            <h1 class="text-3xl md:text-5xl font-extrabold font-serif mb-4 leading-tight">
                Startup Funding <span class="text-gold">Opportunities</span>
            </h1>
            <p class="text-gray-300 max-w-2xl mx-auto text-sm md:text-base mb-6 leading-relaxed">
                Discover grants, investors, incubators, accelerators, and government funding programs from one platform.
            </p>

            <!-- Disclaimer Banner -->
            <div class="bg-white/5 border border-white/10 p-3.5 rounded-2xl max-w-3xl mx-auto text-xs text-gray-300 text-left flex items-start gap-3">
                <i class="fas fa-info-circle text-gold text-base shrink-0 mt-0.5"></i>
                <div>
                    <strong class="text-white">Important Disclaimer:</strong> Foundida is an independent startup support platform. We do not provide funding and do not guarantee approval. Funding decisions are made solely by the respective funding organization. Our paid service only covers application preparation, document review, and submission assistance.
                </div>
            </div>
        </div>
    </section>

    <!-- Marketplace Main Section -->
    <section class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Professional Search & Filter Bar -->
            <form method="GET" action="{{ route('funding.index') }}" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 mb-8 space-y-4">
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search Input -->
                    <div class="md:col-span-2 relative">
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Search Opportunity</label>
                        <div class="relative flex items-center">
                            <i class="fas fa-search absolute left-4 text-gray-400 text-sm z-10"></i>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, organization or keyword..." class="w-full bg-gray-50 border border-gray-200 rounded-xl pr-4 py-2.5 text-sm text-navy placeholder-gray-400 focus:outline-none focus:border-gold relative" style="padding-left: 2.5rem;">
                        </div>
                    </div>

                    <!-- Country -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Country</label>
                        <select name="country" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 text-sm text-navy focus:outline-none focus:border-gold">
                            <option value="">All Countries</option>
                            @foreach($countries as $c)
                                <option value="{{ $c }}" {{ request('country') == $c ? 'selected' : '' }}>{{ $c }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Stage -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Startup Stage</label>
                        <select name="startup_stage" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 text-sm text-navy focus:outline-none focus:border-gold">
                            <option value="">All Stages</option>
                            @foreach($stages as $s)
                                <option value="{{ $s }}" {{ request('startup_stage') == $s ? 'selected' : '' }}>{{ $s }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 pt-2 border-t border-gray-100">
                    <!-- Industry -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Industry</label>
                        <select name="industry" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 text-sm text-navy focus:outline-none focus:border-gold">
                            <option value="">All Industries</option>
                            @foreach($industries as $ind)
                                <option value="{{ $ind }}" {{ request('industry') == $ind ? 'selected' : '' }}>{{ $ind }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Funding Type -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Funding Type</label>
                        <select name="funding_type" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 text-sm text-navy focus:outline-none focus:border-gold">
                            <option value="">All Types</option>
                            @foreach($types as $t)
                                <option value="{{ $t }}" {{ request('funding_type') == $t ? 'selected' : '' }}>{{ $t }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sort -->
                    <div>
                        <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Sort By</label>
                        <select name="sort" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-3 py-2.5 text-sm text-navy focus:outline-none focus:border-gold">
                            <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Featured & Priority</option>
                            <option value="amount_desc" {{ request('sort') == 'amount_desc' ? 'selected' : '' }}>Highest Amount</option>
                            <option value="deadline_asc" {{ request('sort') == 'deadline_asc' ? 'selected' : '' }}>Deadline Approaching</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-end gap-2">
                        <button type="submit" class="flex-1 bg-navy text-white hover:bg-navy/90 py-2.5 rounded-xl font-bold text-xs transition-all shadow-sm">
                            <i class="fas fa-filter mr-1 text-gold"></i> Filter Results
                        </button>
                        <a href="{{ route('funding.index') }}" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-xl font-semibold text-xs transition-all">
                            Reset
                        </a>
                    </div>
                </div>
            </form>

            <!-- Opportunities Grid -->
            @if($programs->isEmpty())
                <div class="bg-white rounded-2xl p-12 text-center border border-gray-200 shadow-sm">
                    <div class="w-16 h-16 bg-navy/5 text-navy rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <h3 class="text-lg font-bold text-navy mb-1 font-serif">No Funding Opportunities Found</h3>
                    <p class="text-xs text-gray-400 max-w-md mx-auto mb-6">We couldn't find any opportunities matching your current filters. Try resetting your search.</p>
                    <a href="{{ route('funding.index') }}" class="bg-gold text-navy px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-gold-light transition-all">Clear Filters</a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    @foreach($programs as $program)
                    @php
                        $isSaved = in_array($program->id, $savedIds);
                    @endphp
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.1)] hover:-translate-y-1 hover:border-gold/30 transition-all duration-500 flex flex-col justify-between relative overflow-hidden group">
                        
                        @if($program->is_featured)
                            <div class="absolute top-0 right-0 bg-gradient-to-l from-gold to-[#a88d30] text-navy text-[10px] font-extrabold px-3 py-1 rounded-bl-xl shadow-sm z-10">
                                ★ FEATURED
                            </div>
                        @endif

                        <div class="p-6">
                            <!-- Top Info -->
                            <div class="flex items-start gap-4 mb-4">
                                <img src="{{ $program->organization_logo ?: 'https://ui-avatars.com/api/?name='.urlencode($program->organization_name).'&background=0B1F3A&color=D4A843' }}" alt="{{ $program->organization_name }}" class="w-14 h-14 rounded-2xl object-cover border border-gray-100 shadow-sm shrink-0 group-hover:scale-105 transition-transform duration-500">
                                <div>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block mb-0.5">{{ $program->organization_name }}</span>
                                    <a href="{{ route('funding.show', $program->slug) }}" class="font-bold text-navy text-base font-serif hover:text-gold transition-colors leading-tight line-clamp-2">
                                        {{ $program->name }}
                                    </a>
                                </div>
                            </div>

                            <!-- Key Metrics Badges -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-[11px] font-extrabold px-2.5 py-1 rounded-lg">
                                    💰 {{ $program->funding_amount }}
                                </span>
                                <span class="bg-navy/5 text-navy border border-navy/10 text-[11px] font-semibold px-2.5 py-1 rounded-lg">
                                    🏷️ {{ $program->funding_type }}
                                </span>
                                <span class="bg-gray-100 text-gray-700 text-[11px] font-medium px-2.5 py-1 rounded-lg">
                                    🚀 Stage: {{ $program->startup_stage }}
                                </span>
                                <span class="bg-gray-100 text-gray-700 text-[11px] font-medium px-2.5 py-1 rounded-lg">
                                    📍 {{ $program->country }}
                                </span>
                            </div>

                            <!-- Short Description -->
                            <p class="text-xs text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                                {{ $program->short_description }}
                            </p>

                            <!-- Deadline & Details Summary -->
                            <div class="border-t border-gray-100 pt-3 space-y-1.5 text-[11px] text-gray-500">
                                <div class="flex items-center justify-between">
                                    <span><i class="far fa-clock text-gold mr-1"></i> Deadline:</span>
                                    <span class="font-semibold text-navy">
                                        {{ $program->application_deadline ? $program->application_deadline->format('d M Y') : 'Open Year Round' }}
                                    </span>
                                </div>
                                @if($program->eligibility)
                                <div class="flex items-center justify-between">
                                    <span><i class="fas fa-check-circle text-emerald-500 mr-1"></i> Eligibility:</span>
                                    <span class="font-semibold text-navy truncate max-w-[150px]">{{ strtok($program->eligibility, "\n") }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Actions Footer -->
                        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex flex-col gap-2.5">
                            <div class="grid grid-cols-2 gap-2">
                                <!-- Apply Yourself -->
                                <button @click="activeProgram = {{ json_encode($program) }}; selfApplyModal = true" class="w-full bg-white hover:bg-gray-100 text-navy border border-gray-300 font-bold py-2 rounded-xl text-xs transition-all text-center">
                                    Apply Yourself <span class="text-[10px] text-gray-400 font-normal">(Free)</span>
                                </button>

                                <!-- Apply Through Foundida -->
                                <button @click="activeProgram = {{ json_encode($program) }}; assistedApplyModal = true" class="w-full bg-gradient-to-r from-gold to-[#a88d30] hover:from-[#e5b849] hover:to-[#b69a37] text-navy font-extrabold py-2.5 rounded-xl text-xs transition-all text-center shadow-lg hover:shadow-xl shadow-gold/20 transform hover:-translate-y-0.5">
                                    Apply via Foundida ✨
                                </button>
                            </div>

                            <div class="flex items-center justify-between text-[11px] pt-1">
                                <!-- Save Opportunity -->
                                <button onclick="toggleSaveOpportunity({{ $program->id }}, this)" class="text-gray-500 hover:text-gold transition-colors font-medium flex items-center gap-1">
                                    <i class="{{ $isSaved ? 'fas text-gold' : 'far' }} fa-bookmark"></i>
                                    <span>{{ $isSaved ? 'Saved' : 'Save Opportunity' }}</span>
                                </button>

                                <div class="flex items-center gap-3">
                                    <!-- Share -->
                                    <button @click="shareUrl = '{{ route('funding.show', $program->slug) }}'; navigator.clipboard.writeText(shareUrl); copied = true; setTimeout(() => copied = false, 2000)" class="text-gray-500 hover:text-navy transition-colors font-medium">
                                        <i class="fas fa-share-alt"></i> <span x-text="copied ? 'Copied!' : 'Share'"></span>
                                    </button>

                                    <!-- Report -->
                                    <button onclick="reportExpired({{ $program->id }})" class="text-gray-400 hover:text-red-500 transition-colors">
                                        <i class="fas fa-flag" title="Report Expired"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $programs->links() }}
                </div>
            @endif

        </div>

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
    </section>
</div>
@endsection

@push('scripts')
<script>
function toggleSaveOpportunity(id, btn) {
    fetch('/funding-opportunities/' + id + '/save', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        }
    })
    .then(r => r.json())
    .then(data => {
        if (data.status === 'error') {
            alert(data.message);
        } else {
            alert(data.message);
            location.reload();
        }
    })
    .catch(() => alert('Action recorded successfully!'));
}

function reportExpired(id) {
    if (confirm('Report this funding opportunity as expired?')) {
        fetch('/funding-opportunities/' + id + '/report', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(r => r.json())
        .then(data => alert(data.message));
    }
}
</script>
@endpush
