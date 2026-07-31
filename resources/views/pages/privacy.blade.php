@extends('layouts.app')

@section('title', 'Privacy Policy - Foundida')

@section('content')
<!-- Header Banner -->
<div class="bg-navy text-white py-12 md:py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="container-custom relative z-10 text-center">
        <span class="text-gold text-xs font-bold uppercase tracking-widest">Legal Document</span>
        <h1 class="text-3xl md:text-5xl font-serif font-bold mt-2 mb-4">Privacy Policy</h1>
        <p class="text-white/60 text-sm">Last Updated: July 31, 2026</p>
    </div>
</div>

<!-- Main Content Section -->
<div class="py-12 md:py-20 bg-[#F8F7F3]">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto bg-white p-6 md:p-12 rounded-2xl shadow-sm border border-[#E2E0D8] prose prose-navy">
            
            <p class="lead text-[#5C6370] text-base md:text-lg mb-8">
                Welcome to Foundida. We respect your privacy and are committed to protecting the personal data you share with us. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our business registration and legal compliance services.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">1. Information We Collect</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-4">
                We collect information that you directly provide to us when registering an account, purchasing services, or communicating with us. This includes:
            </p>
            <ul class="list-disc pl-6 text-[#5C6370] text-sm md:text-base mb-6 space-y-2">
                <li><strong>Personal Identity Data:</strong> Full name, date of birth, gender, and digital signatures.</li>
                <li><strong>Contact Information:</strong> Email address, phone number, physical address, city, and state.</li>
                <li><strong>Business & Corporate Data:</strong> Proposed business names, director details, Aadhaar, PAN card, tax registrations, utility bills, and other documents required for government filings.</li>
                <li><strong>Payment & Transaction Information:</strong> Billing address, transaction history, and payment status (payments are securely processed via third-party gateways like Razorpay; we do not store your credit card or net banking credentials).</li>
            </ul>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">2. How We Use Your Information</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-4">
                We use the collected information for various business purposes, including:
            </p>
            <ul class="list-disc pl-6 text-[#5C6370] text-sm md:text-base mb-6 space-y-2">
                <li>Providing, processing, and executing business setup and registration filings.</li>
                <li>Managing your user profile, billing details, and active legal orders.</li>
                <li>Sending transactional alerts, OTPs, and updates via Email, SMS, WhatsApp, and Phone.</li>
                <li>Improving our web application, customer service, and overall user experience.</li>
                <li>Ensuring compliance with legal and statutory regulations in India.</li>
            </ul>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">3. Sharing & Disclosure of Information</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-4">
                We do not sell, trade, or rent your personal information to third parties. We may share information under the following limited circumstances:
            </p>
            <ul class="list-disc pl-6 text-[#5C6370] text-sm md:text-base mb-6 space-y-2">
                <li><strong>Service Providers:</strong> With independent partner professionals (CAs, CSs, Advocates) assigned to execute your service requests.</li>
                <li><strong>Government Authorities:</strong> With the Ministry of Corporate Affairs (MCA), Income Tax Department, GSTN, and other statutory bodies to process your registrations.</li>
                <li><strong>Legal Requirements:</strong> If required by law, court order, or to protect the rights, property, or safety of Foundida and its users.</li>
            </ul>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">4. Data Security</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                We implement industry-standard administrative, technical, and physical security measures to safeguard your business documents and personal data from unauthorized access, alteration, or disclosure. All sensitive communication and file uploads are encrypted using Secure Socket Layer (SSL) technology.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">5. Cookies and Tracking</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                We use cookies and similar tracking technologies to enhance user session persistence, analyze traffic patterns, and customize promotional offers. You can configure your browser setting to refuse cookies, though some features of the web platform may not function optimally as a result.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">6. Changes to this Policy</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-6">
                Foundida reserves the right to modify or update this Privacy Policy at any time. Any changes will be published on this page with a revised "Last Updated" date. Continued use of our platform after updates indicates consent to the updated terms.
            </p>

            <h2 class="text-xl md:text-2xl font-bold font-serif text-navy mt-8 mb-4">7. Contact Us</h2>
            <p class="text-[#5C6370] text-sm md:text-base leading-relaxed mb-4">
                If you have questions, feedback, or concerns regarding this Privacy Policy, please reach out to us at:
            </p>
            <div class="bg-[#F8F7F3] p-6 rounded-xl border border-[#E2E0D8] text-sm md:text-base text-[#1A1A2E] space-y-1">
                <p class="font-bold">Foundida Customer Support</p>
                <p>Email: hello@foundida.com</p>
                <p>Phone: +91 87505 30252</p>
                <p>Address: 123 Tech Park, Sector 62, Noida, Uttar Pradesh 201309, India</p>
            </div>

        </div>
    </div>
</div>
@endsection
