@extends('layouts.app')

@section('title', 'DIY Legal Documents - Foundida')

@section('content')
<style>
    .input-custom {
        width: 100% !important;
        border: 1px solid #D1D5DB !important;
        border-radius: 12px !important;
        color: #1A1A2E !important;
        min-height: 48px !important;
        padding-left: 16px !important;
        padding-right: 16px !important;
        font-size: 14px !important;
        background-color: #ffffff !important;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
    }
    .input-custom:focus {
        outline: none !important;
        border-color: #0B1F3A !important;
        box-shadow: 0 0 0 2px rgba(11, 31, 58, 0.15) !important;
    }
    textarea.input-custom {
        min-height: 100px !important;
        padding-top: 12px !important;
        padding-bottom: 12px !important;
    }
    /* Hide scrollbar for Chrome, Safari and Opera */
    .no-scrollbar::-webkit-scrollbar {
        display: none !important;
    }
    /* Hide scrollbar for IE, Edge and Firefox */
    .no-scrollbar {
        -ms-overflow-style: none !important;  /* IE and Edge */
        scrollbar-width: none !important;  /* Firefox */
    }
</style>

<div x-data="{ 
    filter: 'All',
    showWizard: false,
    wizardStep: 1,
    selectedDoc: null,
    showPreview: false,
    
    // Form States
    party1: '',
    party2: '',
    address: '',
    amount: '',
    deposit: '',
    title: '',
    date: '{{ date('Y-m-d') }}',

    openWizard(doc) {
        this.selectedDoc = doc;
        this.party1 = '';
        this.party2 = '';
        this.address = '';
        this.amount = doc.new_price * 10; 
        this.deposit = doc.new_price * 50; 
        this.title = '';
        this.date = '{{ date('Y-m-d') }}';
        this.wizardStep = 1;
        this.showWizard = true;
    },

    openPreview(doc) {
        this.selectedDoc = doc;
        this.showPreview = true;
    },

    getPreviewText() {
        if (!this.selectedDoc) return '';
        const name = this.selectedDoc.name_en;
        const category = this.selectedDoc.category;
        
        if (category === 'Property' || name.includes('Rent') || name.includes('Sale')) {
            return `
                <div class='text-center font-bold uppercase underline text-sm md:text-base mb-6 text-navy tracking-wider'>LEAD DRAFT: LEASE AGREEMENT</div>
                <p class='mb-4'><strong>THIS INDENTURE OF LEASE</strong> is executed at Delhi on this _____ day of _____________, 20__ by and between:</p>
                <p class='mb-4'><strong>1. THE LESSOR:</strong> First Party, hereinafter referred to as the Lessor (which expression shall unless repugnant to the context mean and include heirs, executors and assigns).</p>
                <p class='mb-4'><strong>2. THE LESSEE:</strong> Second Party, hereinafter referred to as the Lessee (which expression shall unless repugnant to the context mean and include heirs, executors and assigns).</p>
                <p class='mb-4 font-bold uppercase text-navy border-b border-gray-100 pb-1'>NOW THIS LEASE DEED WITNESSETH AS UNDER:</p>
                <ol class='list-decimal pl-6 space-y-3 text-gray-700'>
                    <li>That the Lessee shall pay a monthly lease rent of <strong>₹[Rent Amount]</strong> (exclusive of municipal taxes and water charges) on or before the 5th day of every calendar month.</li>
                    <li>That the Lessee has deposited a interest-free security amount of <strong>₹[Deposit Amount]</strong> with the Lessor, refundable upon vacant possession.</li>
                    <li>That the premises shall be used strictly for residential/corporate purposes as declared and shall not be sublet or assigned to any third party.</li>
                    <li>That the lease shall be valid for a term of 11 months from the commencement date, subject to renewal under mutual written consents.</li>
                </ol>
            `;
        }
        
        if (name.includes('NDA') || name.includes('Non-Disclosure') || category === 'Agreements') {
            return `
                <div class='text-center font-bold uppercase underline text-sm md:text-base mb-6 text-navy tracking-wider'>LEAD DRAFT: MUTUAL NON-DISCLOSURE AGREEMENT</div>
                <p class='mb-4'><strong>THIS CONFIDENTIALITY AGREEMENT</strong> is entered into at Delhi on this _____ day of _____________, 20__ by and between:</p>
                <p class='mb-4'><strong>1. DISCLOSING PARTY:</strong> First Party, having its corporate head office as registered, hereinafter referred to as Discloser.</p>
                <p class='mb-4'><strong>2. RECEIVING PARTY:</strong> Second Party, executing terms of business alliance, hereinafter referred to as Recipient.</p>
                <p class='mb-4 font-bold uppercase text-navy border-b border-gray-100 pb-1'>NOW IT IS MUTUALLY AGREED AS FOLLOWS:</p>
                <ol class='list-decimal pl-6 space-y-3 text-gray-700'>
                    <li>The Receiving Party agrees to hold all Proprietary and Confidential Information in strict confidence and shall not disclose it to any third party without consent.</li>
                    <li>Confidential Information includes trade secrets, patent pending models, customer datasets, source codes, and financial projections.</li>
                    <li>This NDA shall remain valid for a period of 2 years from the date of disclosure of proprietary information.</li>
                    <li>Any breach of confidentiality shall entitle the Disclosing Party to seek immediate injunctive relief and punitive damages.</li>
                </ol>
            `;
        }

        if (category === 'Employment' || name.includes('Employment') || name.includes('Freelancer')) {
            return `
                <div class='text-center font-bold uppercase underline text-sm md:text-base mb-6 text-navy tracking-wider'>LEAD DRAFT: CONTRACT OF EMPLOYMENT</div>
                <p class='mb-4'><strong>THIS CONTRACT OF SERVICES</strong> is made at Delhi on this _____ day of _____________, 20__ by and between:</p>
                <p class='mb-4'><strong>1. THE EMPLOYER:</strong> First Party, doing business under the name of corporate registries, hereinafter referred to as Company.</p>
                <p class='mb-4'><strong>2. THE EMPLOYEE:</strong> Second Party, candidate selected for designated services, hereinafter referred to as Employee.</p>
                <p class='mb-4 font-bold uppercase text-navy border-b border-gray-100 pb-1'>TERMS AND CONDITIONS OF SERVICES:</p>
                <ol class='list-decimal pl-6 space-y-3 text-gray-700'>
                    <li>The Employee is appointed as <strong>[Designation]</strong> at a monthly consolidated gross salary of <strong>₹[Amount]</strong>.</li>
                    <li>The Employee shall adhere to the official business working hours and corporate policy framework of the Company.</li>
                    <li>The Employee agrees to a probation period of 3 months, during which termination can be made with 7 days prior notice.</li>
                    <li>The Employee shall not engage in any secondary conflict-of-interest business during this employment period.</li>
                </ol>
            `;
        }

        return `
            <div class='text-center font-bold uppercase underline text-sm md:text-base mb-6 text-navy tracking-wider'>LEAD DRAFT: MASTER CONTRACT & DEED</div>
            <p class='mb-4'><strong>THIS DEED OF COVENANT</strong> is made at Delhi on this _____ day of _____________, 20__ by and between:</p>
            <p class='mb-4'><strong>1. FIRST EXECUTIONER:</strong> First Party, registering identity metrics.</p>
            <p class='mb-4'><strong>2. SECOND EXECUTIONER:</strong> Second Party, agreeing to the covenants hereof.</p>
            <p class='mb-4 font-bold uppercase text-navy border-b border-gray-100 pb-1'>WITNESSETH AS UNDER:</p>
            <ol class='list-decimal pl-6 space-y-3 text-gray-700'>
                <li>That both parties agree to perform the mutual responsibilities, deliverables, and service levels as defined in the annexure.</li>
                <li>That payments shall be processed within 15 days of invoice generation.</li>
                <li>Any disputes arising from this contract shall be referred to arbitration in accordance with the Arbitration Act of India.</li>
            </ol>
        `;
    },

    printDocument() {
        const printContent = document.getElementById('printableDocumentSheet').innerHTML;
        const originalContent = document.body.innerHTML;
        document.body.innerHTML = `
            <div style='padding: 40px; font-family: sans-serif; color: #1a1a2e; max-width: 800px; margin: 0 auto; line-height: 1.6;'>
                ${printContent}
            </div>
        `;
        window.print();
        document.body.innerHTML = originalContent;
        window.location.reload(); 
    }
}">

    <!-- HERO SECTION -->
    <div class="bg-navy text-white py-12 md:py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="container-custom relative z-10 text-center px-4">
            <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1 mb-4 w-fit select-none">
                <span class="text-[9px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                    CREATE YOUR LEGAL DOCUMENTS
                </span>
            </div>
            <h1 class="font-serif text-2xl md:text-5xl font-bold text-white leading-tight">
                DIY Legal <span class="text-[#f5a623]">Documents</span> Generator
            </h1>
            <p class="text-xs md:text-base text-gray-300 font-medium leading-relaxed mt-3 max-w-[600px] mx-auto">
                Ready in 5 minutes | Fully legally valid | Instant PDF print & download
            </p>
        </div>
    </div>

    <!-- HOW IT WORKS (Horizontal Stepper on Mobile & Desktop) -->
    <div class="bg-gold border-b border-[#c59c3f] shadow-sm">
        <div class="max-w-5xl mx-auto px-4 py-4 md:py-6">
            <div class="flex items-center justify-between gap-2 md:gap-6 relative">
                <!-- Connecting Line -->
                <div class="absolute top-1/2 left-[10%] right-[10%] h-0.5 bg-navy/20 -translate-y-1/2"></div>
                
                <!-- Step 1 -->
                <div class="flex flex-col items-center bg-gold relative z-10 px-1 md:px-4 text-center">
                    <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-navy text-white flex items-center justify-center font-bold text-xs md:text-sm mb-1 shadow-md border-2 border-gold">1</div>
                    <span class="font-bold text-[10px] md:text-sm text-navy leading-tight">Select</span>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center bg-gold relative z-10 px-1 md:px-4 text-center">
                    <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-navy text-white flex items-center justify-center font-bold text-xs md:text-sm mb-1 shadow-md border-2 border-gold">2</div>
                    <span class="font-bold text-[10px] md:text-sm text-navy leading-tight">Fill Details</span>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center bg-gold relative z-10 px-1 md:px-4 text-center">
                    <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-navy text-white flex items-center justify-center font-bold text-xs md:text-sm mb-1 shadow-md border-2 border-gold">3</div>
                    <span class="font-bold text-[10px] md:text-sm text-navy leading-tight">Print PDF</span>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN BODY -->
    <div class="bg-gray-50 py-8 md:py-12 min-h-screen">
        <div class="container-custom px-4">
            
            <!-- CATEGORY FILTER TABS (Increased padding and font on Laptop view) -->
            <div class="mb-8 overflow-hidden">
                <div class="flex overflow-x-auto no-scrollbar flex-nowrap md:flex-wrap gap-2 md:gap-3.5 pb-2 md:pb-0 justify-start md:justify-center">
                    @php
                        $categories = [
                            ['id'=>'All', 'en'=>'All Agreements'],
                            ['id'=>'Business', 'en'=>'Business & Startup'],
                            ['id'=>'Property', 'en'=>'Property & Lease'],
                            ['id'=>'Employment', 'en'=>'Employment & HR'],
                            ['id'=>'Personal', 'en'=>'Personal & Family'],
                            ['id'=>'Agreements', 'en'=>'General Contracts']
                        ];
                    @endphp
                    
                    @foreach($categories as $cat)
                    <button @click="filter = '{{ $cat['id'] }}'" 
                            :class="filter === '{{ $cat['id'] }}' ? 'bg-navy text-white border-navy shadow-md' : 'bg-white text-gray-600 border-gray-200 hover:border-gold hover:text-gold'"
                            class="px-4 md:px-6.5 py-2 md:py-3.5 rounded-xl md:rounded-2xl border font-bold text-[11px] md:text-xs uppercase tracking-wider transition-all whitespace-nowrap shrink-0">
                        {{ $cat['en'] }}
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- DOCUMENTS GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                @foreach($documents as $index => $doc)
                <div @click="openWizard({{ json_encode($doc) }})" 
                     class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5 md:p-6 flex flex-col hover:-translate-y-0.5 transition-all duration-300 hover:shadow-md group cursor-pointer"
                     x-show="filter === 'All' || filter === '{{ $doc['category'] }}'"
                     x-transition>
                    
                    <!-- Category Badge -->
                    <div class="mb-3">
                        <span class="inline-flex bg-gold/10 text-gold border border-gold/20 px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider">
                            {{ $doc['category'] }}
                        </span>
                    </div>

                    <!-- Title -->
                    <div class="flex flex-col mb-3">
                        <h3 class="text-sm md:text-base font-bold text-navy leading-snug group-hover:text-gold transition-colors">{{ $doc['name_en'] }}</h3>
                    </div>

                    <!-- Stats -->
                    <div class="bg-gray-50 rounded-xl p-3 border border-gray-100 mb-4 flex-grow flex flex-col justify-center space-y-1.5">
                        <div class="flex items-center text-[11px] md:text-xs text-gray-500 font-medium">
                            <i class="fas fa-file-alt text-green-600 mr-2 shrink-0"></i>
                            <span>{{ $doc['pages'] }} page template</span>
                        </div>
                        <div class="flex items-center text-[11px] md:text-xs text-gray-500 font-medium">
                            <i class="fas fa-check-circle text-green-600 mr-2 shrink-0"></i>
                            <span>Legally valid across India</span>
                        </div>
                    </div>

                    <!-- Price & Actions (Increased button size in Laptop view) -->
                    <div class="mt-auto border-t border-gray-100 pt-4">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex flex-col">
                                <span class="text-[11px] text-gray-400 line-through">₹{{ number_format($doc['old_price']) }}</span>
                                <span class="text-lg md:text-xl font-extrabold text-gold leading-none mt-0.5">₹{{ $doc['new_price'] }}</span>
                            </div>
                            <div class="bg-red-50 text-red-600 px-1.5 py-0.5 rounded text-[8px] font-bold border border-red-100 uppercase">
                                SAVE {{ round((($doc['old_price'] - $doc['new_price']) / $doc['old_price']) * 100) }}%
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <button @click.stop="openWizard({{ json_encode($doc) }})" class="flex-1 bg-navy hover:bg-[#152a4e] text-white min-h-[38px] md:min-h-[52px] rounded-xl md:rounded-2xl text-[11px] md:text-sm md:font-extrabold transition-all flex items-center justify-center">
                                Create
                            </button>
                            <button @click.stop="openPreview({{ json_encode($doc) }})" class="bg-gray-50 border border-gray-200 text-gray-500 hover:border-gold hover:text-gold px-2.5 md:px-6 rounded-xl md:rounded-2xl text-[11px] md:text-sm md:font-semibold min-h-[38px] md:min-h-[52px] transition-all flex items-center justify-center">
                                Preview
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- DOCUMENT PREVIEW MODAL (Stamp Paper Design - Increased Modal size to max-w-4xl & bigger buttons) -->
    <div x-show="showPreview" class="fixed inset-0 flex items-center justify-center p-0 md:p-4 bg-black/60" style="z-index: 99999 !important;" x-cloak>
        <div class="bg-white w-full h-full md:h-auto md:max-h-[90vh] md:max-w-4xl md:rounded-2xl overflow-hidden flex flex-col shadow-2xl border border-gray-200" @click.away="showPreview = false">
            <!-- Modal Header -->
            <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-[#0B1F3A] text-white">
                <div>
                    <h3 class="font-serif font-bold text-sm md:text-base" x-text="selectedDoc ? selectedDoc.name_en + ' - Draft Preview' : 'Draft Preview'"></h3>
                    <span class="text-[9px] text-gold font-bold uppercase tracking-wider">A4 Standard Format Preview</span>
                </div>
                <button @click="showPreview = false" class="text-white/60 hover:text-white">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
            
            <!-- Document View (A4 Paper Sheet inside gray desk) -->
            <div class="bg-gray-100 p-4 md:p-8 overflow-y-auto flex-grow block">
                <div class="relative w-full max-w-[650px] mx-auto bg-white p-6 md:p-12 font-serif text-[11px] md:text-xs text-gray-800 leading-relaxed border border-gray-300 shadow-md shrink-0 select-none" style="min-height: 850px !important; height: auto !important; display: block !important;">
                    
                    <!-- Sibling 1: Translucent Watermark (Behind text) -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none overflow-hidden" style="z-index: 1;">
                        <span class="font-extrabold uppercase rotate-[30deg] tracking-widest text-center" style="font-size: 5rem; color: rgba(0, 0, 0, 0.022); line-height: 1.2; font-family: sans-serif;">DRAFT<br>PREVIEW</span>
                    </div>

                    <!-- Sibling 2: Content Wrapper (Above watermark) -->
                    <div class="relative" style="z-index: 2;">
                        <!-- SIMULATED STAMP PAPER HEADER -->
                        <div class="border-4 border-double border-[#D4A843] p-4 text-center mb-8 relative">
                            <!-- Gold security seal stamp inside stamp duty box -->
                            <div class="w-12 h-12 rounded-full border border-gold flex items-center justify-center text-gold font-bold text-[8px] absolute right-4 top-1/2 -translate-y-1/2 rotate-12 opacity-40">FOUNDIDA</div>
                            
                            <div class="text-[10px] md:text-xs font-bold text-gold uppercase tracking-widest mb-1">GOVERNMENT OF INDIA</div>
                            <div class="text-[14px] md:text-lg font-extrabold text-navy uppercase tracking-wider mb-1">E-STAMP CERTIFICATE</div>
                            <div class="text-[8px] md:text-[9px] text-gray-500 font-bold uppercase">STAMP CERTIFICATE REF: FNDD-STMP-{{ rand(100000, 999999) }}</div>
                            <div class="absolute top-1 left-1 text-[7px] text-red-500 font-extrabold uppercase border border-red-500 px-1 py-0.5 rotate-6">DRAFT ONLY</div>
                        </div>

                        <!-- Dynamic Draft Content -->
                        <div class="space-y-4 text-gray-700 text-xs md:text-sm" x-html="getPreviewText()"></div>

                        <!-- Signature blocks -->
                        <div class="pt-12 flex justify-between text-[9px] md:text-[10px] text-gray-400">
                            <div class="flex flex-col">
                                <span>___________________________</span>
                                <span class="font-bold mt-1 text-gray-500">First Party Sign</span>
                            </div>
                            <div class="flex flex-col text-right">
                                <span>___________________________</span>
                                <span class="font-bold mt-1 text-gray-500">Second Party Sign</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal Footer (Increased Button Size for Laptop View) -->
            <div class="p-4 md:p-6 border-t border-gray-100 bg-gray-50 flex justify-end space-x-3">
                <button @click="showPreview = false" class="px-5 md:px-8 py-2.5 md:py-3.5 rounded-xl md:rounded-2xl text-gray-500 font-semibold hover:bg-gray-100 text-xs md:text-sm transition-colors">
                    Close
                </button>
                <button @click="showPreview = false; openWizard(selectedDoc)" class="bg-[#0B1F3A] hover:bg-[#152a4e] text-white font-bold px-6 md:px-10 py-2.5 md:py-3.5 rounded-xl md:rounded-2xl text-xs md:text-sm transition-all shadow-sm flex items-center">
                    <i class="fas fa-edit mr-2 text-gold"></i> Customize & Fill
                </button>
            </div>
        </div>
    </div>

    <!-- DOCUMENT CREATION WIZARD MODAL -->
    <div x-show="showWizard" class="fixed inset-0 flex items-center justify-center p-0 md:p-4 bg-black/60" style="z-index: 99999 !important;" x-cloak>
        <div class="bg-white w-full h-full md:h-auto md:max-h-[90vh] md:max-w-3xl md:rounded-2xl overflow-hidden flex flex-col shadow-2xl border border-gray-200" @click.away="showWizard = false">
            
            <!-- Wizard Header -->
            <div class="p-5 md:p-6 border-b border-gray-100 flex justify-between items-center bg-[#0B1F3A] text-white">
                <div>
                    <h3 class="font-serif font-bold text-sm md:text-lg" x-text="selectedDoc ? 'Generate: ' + selectedDoc.name_en : 'Document Wizard'"></h3>
                    <div class="flex items-center space-x-2 mt-1">
                        <span class="text-[9px] font-bold px-1.5 py-0.5 rounded uppercase tracking-wider" :class="wizardStep === 3 ? 'bg-green-600' : 'bg-gold text-navy'" x-text="'Step ' + wizardStep + ' of 3'"></span>
                        <span class="text-[11px] text-white/60" x-text="wizardStep === 1 ? 'Enter Parties Info' : (wizardStep === 2 ? 'Covenants & Rates' : 'Preview & Save PDF')"></span>
                    </div>
                </div>
                <button @click="showWizard = false" class="text-white/60 hover:text-white">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Wizard Body -->
            <div class="flex-grow overflow-y-auto p-5 md:p-8">
                
                <!-- STEP 1: Parties Information -->
                <div x-show="wizardStep === 1" class="space-y-4 md:space-y-6">
                    <div class="bg-blue-50 border border-blue-200 text-blue-800 p-3.5 rounded-xl text-xs font-semibold flex items-center">
                        <i class="fas fa-info-circle mr-2 text-sm shrink-0"></i>
                        <span>Please enter the official names of both parties entering the agreement.</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        <div>
                            <label class="block mb-1 text-navy font-semibold text-xs md:text-sm">
                                <span x-text="selectedDoc && (selectedDoc.category === 'Property') ? 'First Party (Landlord) Name' : 'First Party (e.g. Disclosing Party / Employer)'"></span>
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" x-model="party1" required placeholder="Full Legal Name" class="input-custom">
                        </div>

                        <div>
                            <label class="block mb-1 text-navy font-semibold text-xs md:text-sm">
                                <span x-text="selectedDoc && (selectedDoc.category === 'Property') ? 'Second Party (Tenant) Name' : 'Second Party (e.g. Receiving Party / Employee)'"></span>
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" x-model="party2" required placeholder="Full Legal Name" class="input-custom">
                        </div>
                    </div>

                    <!-- Category specific: Property Address -->
                    <div x-show="selectedDoc && selectedDoc.category === 'Property'" class="mt-4">
                        <label class="block mb-1.5 text-navy font-semibold text-xs md:text-sm">Property Address <span class="text-red-500">*</span></label>
                        <textarea x-model="address" rows="3" placeholder="Enter complete address of the leased property" class="input-custom"></textarea>
                    </div>
                </div>

                <!-- STEP 2: Covenants & Rates -->
                <div x-show="wizardStep === 2" class="space-y-4 md:space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        <!-- Valuation amount depending on category -->
                        <div>
                            <label class="block mb-1 text-navy font-semibold text-xs md:text-sm">
                                <span x-text="selectedDoc && (selectedDoc.category === 'Property') ? 'Monthly Rent (INR)' : (selectedDoc && selectedDoc.category === 'Employment' ? 'Monthly Salary (INR)' : 'Contract Value / Capital (INR)')"></span>
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="number" x-model="amount" required class="input-custom">
                        </div>

                        <!-- Security Deposit if Property -->
                        <div x-show="selectedDoc && selectedDoc.category === 'Property'">
                            <label class="block mb-1 text-navy font-semibold text-xs md:text-sm">Security Deposit (INR) <span class="text-red-500">*</span></label>
                            <input type="number" x-model="deposit" required class="input-custom">
                        </div>

                        <!-- Job Title if Employment -->
                        <div x-show="selectedDoc && selectedDoc.category === 'Employment'">
                            <label class="block mb-1 text-navy font-semibold text-xs md:text-sm">Job Designation / Title <span class="text-red-500">*</span></label>
                            <input type="text" x-model="title" required placeholder="e.g. Senior Software Engineer" class="input-custom">
                        </div>

                        <!-- Commencement Date -->
                        <div>
                            <label class="block mb-1 text-navy font-semibold text-xs md:text-sm">Commencement Date <span class="text-red-500">*</span></label>
                            <input type="date" x-model="date" required class="input-custom">
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Print / Generate Document -->
                <div x-show="wizardStep === 3" class="space-y-4 md:space-y-6">
                    <div class="bg-green-50 border border-green-200 text-green-800 p-3.5 rounded-xl text-xs font-semibold flex items-center">
                        <i class="fas fa-check-circle mr-2 text-sm shrink-0"></i>
                        <span>Your agreement draft has been generated successfully. Review the document below and click "Save & Print PDF".</span>
                    </div>

                    <!-- Legally Styled Document Container -->
                    <div class="border border-gray-300 bg-white p-4 md:p-8 shadow-sm rounded-xl max-h-[350px] overflow-y-auto" id="printableDocumentSheet">
                        
                        <!-- Header Block -->
                        <div class="text-center border-b-2 border-double border-navy pb-3 mb-4">
                            <p class="font-serif font-extrabold text-[#0B1F3A] text-sm md:text-lg uppercase tracking-wide">FOUNDIDA DIGITAL STAMP & AGREEMENT INDEX</p>
                            <p class="text-[9px] text-gray-400 font-bold uppercase mt-1">Unique Document Identification Reference: FNDD-{{ rand(100000, 999999) }}</p>
                        </div>

                        <!-- Agreement Body -->
                        <div class="space-y-3 text-xs md:text-sm text-[#1A1A2E] leading-relaxed text-justify font-serif">
                            <p class="text-center font-bold text-sm uppercase underline" x-text="selectedDoc ? selectedDoc.name_en : 'LEGAL AGREEMENT'"></p>
                            
                            <p>
                                THIS CONTRACT is entered into at Delhi on this <strong x-text="date"></strong>, by and between the following executing parties:
                            </p>

                            <p>
                                <strong>1. <span x-text="party1 ? party1.toUpperCase() : '[First Party Name]'"></span></strong>, hereinafter referred to as the <strong>First Party</strong>.
                            </p>
                            
                            <p>
                                <strong>AND</strong>
                            </p>

                            <p>
                                <strong>2. <span x-text="party2 ? party2.toUpperCase() : '[Second Party Name]'"></span></strong>, hereinafter referred to as the <strong>Second Party</strong>.
                            </p>

                            <div x-show="selectedDoc && selectedDoc.category === 'Property'">
                                <p>
                                    WHEREAS the First Party owns the premises located at <strong x-text="address ? address : '[Property Address]'"></strong> and is willing to lease out the property to the Second Party, and the Second Party has agreed to take the property on lease.
                                </p>
                            </div>

                            <p class="font-bold underline uppercase">NOW THIS AGREEMENT WITNESSETH AS UNDER:</p>

                            <ol class="list-decimal pl-5 space-y-2">
                                <li>
                                    <strong>Financial Consideration:</strong> 
                                    <div x-show="selectedDoc && selectedDoc.category === 'Property'" class="inline">
                                        The Second Party has agreed to pay a Monthly Rent of <strong>₹<span x-text="amount"></span></strong> (Rupees) on or before the 5th of each calendar month. In addition, a refundable Security Deposit of <strong>₹<span x-text="deposit"></span></strong> has been deposited with the First Party.
                                    </div>
                                    <div x-show="selectedDoc && selectedDoc.category === 'Employment'" class="inline">
                                        The First Party (Employer) shall pay the Second Party (Employee) a monthly salary of <strong>₹<span x-text="amount"></span></strong> for services as a <strong><span x-text="title"></span></strong>.
                                    </div>
                                    <div x-show="selectedDoc && selectedDoc.category !== 'Property' && selectedDoc.category !== 'Employment'" class="inline">
                                        The parties agree that the contract values, transactions or financial undertakings under this legal instrument are valued at <strong>₹<span x-text="amount"></span></strong>.
                                    </div>
                                </li>
                                
                                <li>
                                    <strong>Validity:</strong> This agreement is valid for a term of 11 months starting from <strong x-text="date"></strong>, unless terminated early by either party under the provisions of a 30-day prior written notice.
                                </li>

                                <li>
                                    <strong>Confidentiality:</strong> The parties agree to maintain strict secrecy regarding private trade data. The Second Party shall comply with all government municipal regulations and tax requirements.
                                </li>

                                <li>
                                    <strong>Dispute Resolution:</strong> Any conflicts arising out of this contract shall be resolved amicably, failing which the courts of Delhi, India shall have exclusive jurisdiction.
                                </li>
                            </ol>

                            <div class="pt-8 flex justify-between text-[10px] md:text-xs">
                                <div class="flex flex-col">
                                    <span>___________________________</span>
                                    <span class="font-bold mt-1" x-text="party1 ? party1 : '[First Party Sign]'"></span>
                                    <span class="text-gray-400">First Party Signature</span>
                                </div>
                                <div class="flex flex-col text-right">
                                    <span>___________________________</span>
                                    <span class="font-bold mt-1" x-text="party2 ? party2 : '[Second Party Sign]'"></span>
                                    <span class="text-gray-400">Second Party Signature</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Wizard Footer Buttons (Increased size on Laptop) -->
            <div class="p-4 md:p-6 border-t border-gray-100 bg-gray-50 flex justify-between items-center">
                <button @click="showWizard = false" class="px-5 md:px-8 py-2.5 md:py-3.5 rounded-xl text-gray-500 font-semibold hover:bg-gray-100 text-xs md:text-sm transition-colors">
                    Cancel
                </button>
                
                <div class="flex space-x-2">
                    <button x-show="wizardStep > 1 && wizardStep <= 3" @click="wizardStep--" class="px-5 md:px-8 py-2.5 md:py-3.5 rounded-xl border border-gray-200 text-gray-600 bg-white font-semibold hover:bg-gray-50 text-xs md:text-sm transition-colors">
                        Back
                    </button>
                    
                    <button x-show="wizardStep < 3" 
                            @click="if(party1 && party2) { wizardStep++ } else { alert('Please enter both party names first.') }"
                            class="bg-[#0B1F3A] hover:bg-[#152a4e] text-white font-bold px-6 md:px-10 py-2.5 md:py-3.5 rounded-xl md:rounded-2xl text-xs md:text-sm transition-all shadow-sm">
                        Continue
                    </button>
                    
                    <button x-show="wizardStep === 3" 
                            @click="printDocument()"
                            class="bg-[#2D7A4F] hover:bg-green-700 text-white font-bold px-6 md:px-10 py-2.5 md:py-3.5 rounded-xl md:rounded-2xl text-xs md:text-sm transition-all shadow-sm flex items-center">
                        <i class="fas fa-print mr-1.5"></i> Save & Print PDF
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- TRUST STRIP -->
    <div class="bg-white border-t border-gray-200 py-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-2 md:flex md:flex-wrap md:justify-center md:items-center gap-6 md:gap-12">
                <div class="flex flex-col items-center text-center text-navy font-bold hover:-translate-y-0.5 transition-transform">
                    <svg class="w-6 h-6 text-gold mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    <span class="text-[11px] md:text-sm">100% Legally Valid</span>
                </div>
                
                <div class="hidden md:block w-px h-10 bg-gray-200"></div>
                
                <div class="flex flex-col items-center text-center text-navy font-bold hover:-translate-y-0.5 transition-transform">
                    <svg class="w-6 h-6 text-gold mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="text-[11px] md:text-sm">Advocate Reviewed</span>
                </div>
                
                <div class="hidden md:block w-px h-10 bg-gray-200"></div>
                
                <div class="flex flex-col items-center text-center text-navy font-bold hover:-translate-y-0.5 transition-transform">
                    <svg class="w-6 h-6 text-gold mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    <span class="text-[11px] md:text-sm">Instant PDF & Word</span>
                </div>
                
                <div class="hidden md:block w-px h-10 bg-gray-200"></div>
                
                <div class="flex flex-col items-center text-center text-navy font-bold hover:-translate-y-0.5 transition-transform">
                    <svg class="w-6 h-6 text-gold mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-[11px] md:text-sm">Starting at ₹99</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
