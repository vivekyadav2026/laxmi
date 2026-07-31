@extends('layouts.app')

@section('title', 'Checkout – Foundida')

@section('content')
<div class="min-h-screen bg-offwhite py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-gray-400 mb-8">
            <a href="/" class="hover:text-navy transition-colors">Home</a>
            <span>/</span>
            <span class="text-navy font-semibold">Secure Checkout</span>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-8">

            <!-- Left: Customer Details Form -->
            <div class="md:col-span-3">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h2 class="text-2xl font-bold text-navy font-serif mb-1">Your Details</h2>
                    <p class="text-sm text-gray-500 mb-6">Please fill in your contact information to continue payment.</p>

                    {{-- Gateway not configured warning --}}
                    @if(!$gateway_configured)
                        <div class="bg-amber-50 border border-amber-300 rounded-xl p-4 mb-6 flex items-start gap-3">
                            <i class="fas fa-exclamation-triangle text-amber-500 text-lg mt-0.5"></i>
                            <div>
                                <p class="font-bold text-amber-800 text-sm">Payment Gateway Not Configured</p>
                                <p class="text-xs text-amber-700 mt-1">Razorpay API keys are not set. Please go to <strong>Admin Panel → Settings → Payment Gateways</strong> and enter your real Razorpay Key ID and Secret.</p>
                                <a href="https://dashboard.razorpay.com/app/keys" target="_blank" class="inline-flex items-center gap-1 text-xs font-bold text-amber-800 underline mt-1">
                                    Get API Keys from Razorpay Dashboard <i class="fas fa-external-link-alt text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    @endif

                    {{-- Gateway authentication error --}}
                    @if($errors->has('gateway'))
                        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6 flex items-start gap-3">
                            <i class="fas fa-times-circle text-red-500 text-lg mt-0.5"></i>
                            <div>
                                <p class="font-bold text-red-700 text-sm">Payment Gateway Error</p>
                                <p class="text-xs text-red-600 mt-1">{{ $errors->first('gateway') }}</p>
                                <a href="/admin/settings?tab=gateways" class="inline-flex items-center gap-1 text-xs font-bold text-red-700 underline mt-1">
                                    Fix in Admin Settings <i class="fas fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    @endif

                    @if ($errors->has('customer_name') || $errors->has('customer_email') || $errors->has('customer_phone'))
                        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                            <ul class="text-sm text-red-600 space-y-1">
                                @foreach ($errors->all() as $error)
                                    @if($error !== $errors->first('gateway'))
                                        <li class="flex items-center gap-2"><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="checkoutForm" action="{{ route('payment.create-order') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" name="item_type" value="{{ $item_type }}">
                        <input type="hidden" name="item_id" value="{{ $item_id }}">

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="customer_name" value="{{ old('customer_name') }}" required
                                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-navy focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold transition-colors"
                                placeholder="Rahul Sharma">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="customer_email" value="{{ old('customer_email') }}" required
                                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-navy focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold transition-colors"
                                placeholder="rahul@example.com">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1.5">Mobile Number <span class="text-red-500">*</span></label>
                            <div class="flex">
                                <span class="bg-gray-100 border border-gray-200 border-r-0 rounded-l-xl px-4 py-3 text-sm text-gray-500 font-bold flex items-center">+91</span>
                                <input type="tel" name="customer_phone" value="{{ old('customer_phone') }}" required maxlength="10" pattern="[6-9][0-9]{9}"
                                    class="w-full bg-gray-50 border border-gray-200 rounded-r-xl px-4 py-3 text-sm text-navy focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold transition-colors"
                                    placeholder="9876543210">
                            </div>
                        </div>

                        <!-- Trust Badges -->
                        <div class="flex flex-wrap items-center gap-4 pt-2 border-t border-gray-100 mt-2">
                            <span class="flex items-center gap-1.5 text-xs text-gray-500 font-medium"><i class="fas fa-lock text-green-500"></i> 256-bit SSL Encryption</span>
                            <span class="flex items-center gap-1.5 text-xs text-gray-500 font-medium"><i class="fas fa-shield-alt text-blue-500"></i> PCI-DSS Compliant</span>
                            <span class="flex items-center gap-1.5 text-xs text-gray-500 font-medium"><i class="fas fa-undo text-gold"></i> Money-Back Guarantee</span>
                        </div>

                        <button type="submit" id="payNowBtn"
                            class="w-full bg-gradient-to-r from-[#0B1F3A] to-[#1a3a6b] hover:from-[#1a3a6b] hover:to-[#0B1F3A] text-white font-bold py-4 rounded-xl transition-all shadow-lg flex items-center justify-center gap-3 text-base mt-2">
                            <i class="fas fa-lock text-gold"></i>
                            <span>Pay Securely — ₹{{ number_format($amount) }}</span>
                        </button>
                        <p class="text-center text-xs text-gray-400 mt-1">You'll be redirected to Razorpay's secure payment page</p>
                    </form>
                </div>
            </div>

            <!-- Right: Order Summary -->
            <div class="md:col-span-2">
                <div class="bg-navy text-white rounded-2xl shadow-lg p-6 sticky top-6">
                    <h3 class="text-sm font-bold uppercase tracking-widest text-gold mb-5 border-b border-white/10 pb-3">Order Summary</h3>

                    <div class="space-y-3 mb-5">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-gold/20 rounded-xl flex items-center justify-center text-gold shrink-0">
                                <i class="fas {{ $item_type === 'package' ? 'fa-cubes' : ($item_type === 'subscription' ? 'fa-gem' : 'fa-briefcase') }}"></i>
                            </div>
                            <div>
                                <p class="font-bold text-white text-sm leading-tight">{{ $item_title }}</p>
                                <p class="text-xs text-gray-400 capitalize mt-0.5">{{ str_replace('_', ' ', $item_type) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-white/10 pt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-400">Subtotal</span>
                            <span class="font-semibold">₹{{ number_format($amount) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-400">Taxes & Fees</span>
                            <span class="font-semibold text-green-400">₹0</span>
                        </div>
                        <div class="flex justify-between text-base font-bold border-t border-white/10 pt-3 mt-3">
                            <span>Total Payable</span>
                            <span class="text-gold text-xl">₹{{ number_format($amount) }}</span>
                        </div>
                    </div>

                    <div class="mt-6 bg-white/5 rounded-xl p-4">
                        <p class="text-xs text-gray-400 leading-relaxed">
                            <i class="fas fa-info-circle text-gold mr-1"></i>
                            Payment powered by <strong class="text-white">Razorpay</strong>. Accepts UPI, NetBanking, Credit/Debit Cards, and Wallets.
                        </p>
                    </div>

                    <!-- Payment Method Icons -->
                    <div class="mt-4 flex flex-wrap gap-2">
                        <span class="bg-white/10 text-white text-[10px] font-bold px-2.5 py-1 rounded-lg">UPI</span>
                        <span class="bg-white/10 text-white text-[10px] font-bold px-2.5 py-1 rounded-lg">NetBanking</span>
                        <span class="bg-white/10 text-white text-[10px] font-bold px-2.5 py-1 rounded-lg">Credit Card</span>
                        <span class="bg-white/10 text-white text-[10px] font-bold px-2.5 py-1 rounded-lg">Debit Card</span>
                        <span class="bg-white/10 text-white text-[10px] font-bold px-2.5 py-1 rounded-lg">Wallets</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
