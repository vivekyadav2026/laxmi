@extends('layouts.app')

@section('title', 'Payment Successful – Foundida')

@section('content')
<div class="min-h-screen bg-offwhite flex items-center justify-center py-16 px-4">
    <div class="max-w-lg w-full">

        <!-- Success Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-10 text-center">

            <!-- Animated Checkmark -->
            <div class="relative w-24 h-24 mx-auto mb-8">
                <div class="absolute inset-0 bg-emerald-100 rounded-full animate-ping opacity-40"></div>
                <div class="relative w-24 h-24 bg-emerald-500 rounded-full flex items-center justify-center shadow-xl shadow-emerald-500/30">
                    <i class="fas fa-check text-white text-4xl"></i>
                </div>
            </div>

            <div class="inline-block bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full mb-5">
                Payment Confirmed
            </div>

            <h1 class="text-3xl font-bold text-navy font-serif mb-2">Thank You, {{ $payment->customer_name }}!</h1>
            <p class="text-gray-500 text-sm leading-relaxed mb-8">
                Your payment of <strong class="text-navy">₹{{ number_format($payment->amount) }}</strong> has been received successfully. Our team will contact you within <strong class="text-gold">2-4 business hours</strong>.
            </p>

            <!-- Order Details -->
            <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6 text-left space-y-3 mb-8">
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500 font-medium">Order Number</span>
                    <span class="font-bold text-navy font-mono">{{ $payment->order_number }}</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500 font-medium">Item</span>
                    <span class="font-bold text-navy">{{ $payment->item_title }}</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500 font-medium">Amount Paid</span>
                    <span class="font-bold text-emerald-600">₹{{ number_format($payment->amount) }}</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500 font-medium">Payment ID</span>
                    <span class="font-mono text-xs text-gray-500">{{ $payment->razorpay_payment_id }}</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500 font-medium">Date & Time</span>
                    <span class="text-gray-600">{{ $payment->created_at->format('d M Y, h:i A') }}</span>
                </div>
            </div>

            <!-- What happens next -->
            <div class="bg-navy/5 border border-navy/10 rounded-2xl p-5 text-left mb-8">
                <h3 class="text-xs font-bold text-navy uppercase tracking-widest mb-3 flex items-center gap-2">
                    <i class="fas fa-clipboard-list text-gold"></i> What Happens Next?
                </h3>
                <ol class="space-y-2">
                    <li class="flex items-start gap-2.5 text-sm text-gray-600">
                        <span class="w-5 h-5 bg-gold text-navy rounded-full flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">1</span>
                        Confirmation email sent to <strong>{{ $payment->customer_email }}</strong>
                    </li>
                    <li class="flex items-start gap-2.5 text-sm text-gray-600">
                        <span class="w-5 h-5 bg-gold text-navy rounded-full flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">2</span>
                        Our team reviews your order within 2-4 hours
                    </li>
                    <li class="flex items-start gap-2.5 text-sm text-gray-600">
                        <span class="w-5 h-5 bg-gold text-navy rounded-full flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">3</span>
                        Dedicated manager assigned to your case
                    </li>
                </ol>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                <a href="/" class="flex-1 border-2 border-navy text-navy hover:bg-navy hover:text-white font-bold py-3 rounded-xl transition-all text-sm text-center">
                    <i class="fas fa-home mr-2"></i> Back to Home
                </a>
                <a href="/services" class="flex-1 bg-gold text-navy hover:bg-yellow-500 font-bold py-3 rounded-xl transition-all text-sm text-center">
                    <i class="fas fa-briefcase mr-2"></i> Explore Services
                </a>
            </div>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">Need help? Call us at <a href="tel:+918750530252" class="text-navy font-bold">+91 87505 30252</a></p>
    </div>
</div>
@endsection
