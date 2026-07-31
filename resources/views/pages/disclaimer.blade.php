@extends('layouts.app')

@section('title', 'Disclaimer - Foundida')

@section('content')
<!-- Header Banner -->
<div class="bg-navy text-white py-12 md:py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="container-custom relative z-10 text-center">
        <span class="text-gold text-xs font-bold uppercase tracking-widest">Legal Document</span>
        <h1 class="text-3xl md:text-5xl font-serif font-bold mt-2 mb-4">Disclaimer</h1>
        <p class="text-white/60 text-sm">Last Updated: July 31, 2026</p>
    </div>
</div>

<!-- Main Content Section -->
<div class="py-12 md:py-20 bg-[#F8F7F3]">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto bg-white p-6 md:p-12 rounded-2xl shadow-sm border border-[#E2E0D8] prose prose-navy">
            
            <p class="lead text-[#5C6370] text-base md:text-lg mb-8">
                Please read this disclaimer carefully before using the Foundida website or purchasing any of our legal and corporate setup services.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">1. No Professional-Client Relationship</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                The information provided on Foundida is for general informational and educational purposes only. It does not constitute formal legal, financial, or tax advice. Using this platform or communicating with us via the web application does not establish a lawyer-client, CA-client, or professional-client relationship.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">2. Technology Platform Representation</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                Foundida is a technology platform that aggregates legal and compliance services. We are not a law firm and do not provide legal representation. Any professional services (such as auditing, certification, legal opinion drafting, or litigation filings) are executed by independent, certified Chartered Accountants, Company Secretaries, and Advocates associated with our platform.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">3. Accuracy of Information</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                While we strive to keep our website content, service pricing, and description of government regulations accurate and updated, corporate laws in India change frequently. We make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, or availability of the information on this website.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">4. Third-Party Websites & Services</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                Through this website, you may find links to third-party web services (such as government portals, digital signature agencies, or payment processing companies). We have no control over the nature, content, availability, or privacy practices of those external sites. The inclusion of any links does not necessarily imply a recommendation or endorsement of their views.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">5. Government Approvals</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                The final approval of any business registration, trademark, GSTIN, or FSSAI license lies solely with the respective government departments of the Government of India. Foundida and its associated professionals play a facilitative role in preparation and filing, and cannot guarantee approval, naming availability, or speed of processing.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">6. Contact Us</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-4">
                If you require formal legal or financial advice, please consult an independent licensed professional. For questions about this disclaimer, please contact:
            </p>
            <div class="bg-[#F8F7F3] p-6 rounded-xl border border-[#E2E0D8] text-sm md:text-base text-[#1A1A2E] space-y-1">
                <p class="font-bold">Foundida Legal Team</p>
                <p>Email: legal@foundida.com</p>
                <p>Phone: +91 87505 30252</p>
            </div>

        </div>
    </div>
</div>
@endsection
