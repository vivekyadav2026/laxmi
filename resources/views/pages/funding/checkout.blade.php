@extends('layouts.app')

@section('title', 'Complete Assisted Application Payment - Foundida')

@section('content')
<section class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-200">
            <div class="text-center mb-8 border-b border-gray-100 pb-6">
                <div class="w-14 h-14 bg-gold/10 text-gold rounded-full flex items-center justify-center mx-auto mb-3 text-2xl">
                    💳
                </div>
                <h1 class="text-2xl font-extrabold text-navy font-serif">Complete Secure Payment</h1>
                <p class="text-xs text-gray-500 mt-1">Application Order #{{ $application->application_number }}</p>
            </div>

            <!-- Summary Box -->
            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 mb-8 space-y-3">
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500 font-bold uppercase text-xs">Opportunity</span>
                    <span class="font-bold text-navy">{{ $application->program->name }}</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500 font-bold uppercase text-xs">Startup</span>
                    <span class="font-semibold text-navy">{{ $application->startup_name }}</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500 font-bold uppercase text-xs">Package Selected</span>
                    <span class="font-bold text-gold">{{ $application->package_name }} Package</span>
                </div>
                <div class="border-t border-gray-200 pt-3 flex justify-between items-center text-base">
                    <span class="font-extrabold text-navy">Total Payable</span>
                    <span class="text-2xl font-extrabold text-emerald-600">₹{{ number_format($application->package_price, 2) }}</span>
                </div>
            </div>

            <!-- Razorpay Payment Trigger Form -->
            <form action="{{ route('funding.process-payment', $application->id) }}" method="POST" id="payment-form">
                @csrf
                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" value="pay_mock_{{ uniqid() }}">
                <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" value="order_mock_{{ uniqid() }}">

                <button type="submit" class="w-full bg-navy hover:bg-navy/90 text-gold py-4 rounded-2xl font-extrabold text-sm transition-all shadow-lg hover:-translate-y-0.5">
                    Pay ₹{{ number_format($application->package_price, 2) }} & Submit Application 🔒
                </button>
            </form>

            <p class="text-center text-[10px] text-gray-400 mt-4">
                🔒 256-Bit SSL Encrypted. Supports Razorpay, UPI, Credit/Debit Cards, NetBanking.
            </p>
        </div>

    </div>
</section>
@endsection
