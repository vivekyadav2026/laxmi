@extends('layouts.app')

@section('title', 'Refund & Cancellation Policy - Foundida')

@section('content')
<!-- Header Banner -->
<div class="bg-navy text-white py-12 md:py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="container-custom relative z-10 text-center">
        <span class="text-gold text-xs font-bold uppercase tracking-widest">Legal Document</span>
        <h1 class="text-3xl md:text-5xl font-serif font-bold mt-2 mb-4">Refund Policy</h1>
        <p class="text-white/60 text-sm">Last Updated: July 31, 2026</p>
    </div>
</div>

<!-- Main Content Section -->
<div class="py-12 md:py-20 bg-[#F8F7F3]">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto bg-white p-6 md:p-12 rounded-2xl shadow-sm border border-[#E2E0D8] prose prose-navy">
            
            <p class="lead text-[#5C6370] text-base md:text-lg mb-8">
                Thank you for choosing Foundida for your business setup and tech operations. Because our services involve administrative overheads and government filings, we maintain a clear policy regarding refunds and cancellations.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">1. Cancellation Policy</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                Clients can request a cancellation of their service package order only if the processing of the application has not yet started. To request a cancellation, you must email us immediately at <strong>billing@foundida.com</strong> with your order details.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">2. Eligibility for Refund</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-4">
                Refunds are processed strictly based on the stage of execution of your purchased package:
            </p>
            <ul class="list-disc pl-6 text-[#5C6370] text-sm md:text-base mb-6 space-y-2">
                <li><strong>Full Refund:</strong> If you request cancellation within 24 hours of purchase, and no document review, consultation, or filing preparation has started.</li>
                <li><strong>Partial Refund:</strong> If work has started (e.g. name reservation, drafting of MOA/AOA, class categorization), we will deduct an earned fee (ranging between 20% to 50% depending on work completed) and refund the balance.</li>
                <li><strong>No Refund:</strong> Once the final application has been submitted to the government (MCA, GSTN, Trademark Registry, etc.), or if the service has been fully delivered. Government fees, stamp duties, and digital signature (DSC) generation charges are absolutely non-refundable.</li>
            </ul>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">3. Rejection by Government Authorities</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                Government departments may reject or mark applications for resubmission (queries) due to name conflicts, missing clarifications, or regulatory updates. Foundida will file resubmissions without extra professional fees up to the limits defined in your package. However, if the government rejects the application entirely, no refund will be issued for the government fees and processing costs already spent.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">4. Refund Processing Timeline</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                Once a refund is approved by our billing team, the amount will be processed back to the original payment source (credit card, bank transfer, UPI) within <strong>7 to 10 working days</strong>, subject to standard bank clearance times.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">5. Contact Information</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-4">
                For any billing, payment, or refund queries, contact us at:
            </p>
            <div class="bg-[#F8F7F3] p-6 rounded-xl border border-[#E2E0D8] text-sm md:text-base text-[#1A1A2E] space-y-1">
                <p class="font-bold">Foundida Billing Team</p>
                <p>Email: billing@foundida.com</p>
                <p>Phone: +91 87505 30252</p>
            </div>

        </div>
    </div>
</div>
@endsection
