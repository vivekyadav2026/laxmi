@extends('layouts.app')

@section('title', 'Terms & Conditions - Foundida')

@section('content')
<!-- Header Banner -->
<div class="bg-navy text-white py-12 md:py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="container-custom relative z-10 text-center">
        <span class="text-gold text-xs font-bold uppercase tracking-widest">Legal Document</span>
        <h1 class="text-3xl md:text-5xl font-serif font-bold mt-2 mb-4">Terms & Conditions</h1>
        <p class="text-white/60 text-sm">Last Updated: July 31, 2026</p>
    </div>
</div>

<!-- Main Content Section -->
<div class="py-12 md:py-20 bg-[#F8F7F3]">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto bg-white p-6 md:p-12 rounded-2xl shadow-sm border border-[#E2E0D8] prose prose-navy">
            
            <p class="lead text-[#5C6370] text-base md:text-lg mb-8">
                Welcome to Foundida. By using our website and purchasing our services, you agree to comply with and be bound by the following terms and conditions. Please read them carefully before proceeding with any order.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">1. Scope of Services</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-4">
                Foundida acts as a technology platform designed to facilitate business registrations, tax compliances, trademark filings, and custom technological solutions. 
            </p>
            <ul class="list-disc pl-6 text-[#5C6370] text-sm md:text-base mb-6 space-y-2">
                <li>We coordinate with independent, licensed corporate professionals (Chartered Accountants, Company Secretaries, and Legal Advisors) to process your applications.</li>
                <li>All submissions are subject to processing times from respective government departments (such as MCA, GSTN, and Controller General of Patents, Designs and Trade Marks). Foundida is not responsible for administrative delays on the government's end.</li>
            </ul>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">2. User Accounts & Responsibilities</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-4">
                When you create an account on Foundida, you agree to:
            </p>
            <ul class="list-disc pl-6 text-[#5C6370] text-sm md:text-base mb-6 space-y-2">
                <li>Provide accurate, complete, and updated information during registration and document submission.</li>
                <li>Maintain the confidentiality of your login credentials. You are entirely responsible for all actions taken under your account.</li>
                <li>Ensure that all documents uploaded (such as Aadhaar, PAN, Utility Bills, Rent Agreements) are genuine. Submitting forged or invalid documents may lead to application rejection by the government and account termination on our platform.</li>
            </ul>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">3. Fees & Government Charges</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                All prices mentioned on our website are upfront fees for corporate and tech packages. While we attempt to cover general government fees inside standard packages, any unexpected government fee hikes, stamp duty variations depending on the state, or additional authorization costs must be borne by the client.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">4. Intellectual Property</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                The content, design, logos, illustrations, layout, and database structural elements of Foundida are protected under intellectual property laws. You may not copy, reproduce, scrape, or distribute any part of this website without our explicit written permission.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">5. Limitation of Liability</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                In no event shall Foundida, its directors, employees, or associated professionals be held liable for any direct, indirect, incidental, or consequential damages resulting from the use or inability to use our services, or any delay/refusal of registration applications by government authorities.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">6. Indemnification</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                You agree to indemnify and hold harmless Foundida, its directors, and partner professionals from any claims, losses, liability, or demands (including legal fees) made by any third party due to or arising out of your breach of these Terms, submission of inaccurate data, or violation of any statutory regulations in India.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">7. Governing Law & Jurisdiction</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                These terms shall be governed by and construed in accordance with the laws of India. Any disputes arising under these terms and conditions shall be subject to the exclusive jurisdiction of the courts located in Delhi, India.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">8. Termination of Use</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                We reserve the right to suspend or terminate your access to the platform and services, without notice, if we identify any fraudulent activities, document forgery, abusive behavior, or breach of these Terms and Conditions.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">9. Contact Information</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-4">
                For any clarifications regarding our Terms and Conditions, please contact us at:
            </p>
            <div class="bg-[#F8F7F3] p-6 rounded-xl border border-[#E2E0D8] text-sm md:text-base text-[#1A1A2E] space-y-1">
                <p class="font-bold">Foundida Compliance Desk</p>
                <p>Email: legal@foundida.com</p>
                <p>Phone: +91 87505 30252</p>
            </div>

        </div>
    </div>
</div>
@endsection
