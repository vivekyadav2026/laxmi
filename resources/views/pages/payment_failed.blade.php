@extends('layouts.app')

@php
    $contactPhone = \App\Models\Setting::get('contact_phone', '+91 87505 30252');
    $cleanPhone = preg_replace('/[^0-9+]/', '', $contactPhone);
    $contactEmail = \App\Models\Setting::get('contact_email', 'hello@foundida.com');
@endphp

@section('title', 'Payment Failed – Foundida')

@section('content')
<div class="min-h-screen bg-offwhite flex items-center justify-center py-16 px-4">
    <div class="max-w-lg w-full">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-10 text-center">

            <!-- Failure Icon -->
            <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-8 shadow-xl shadow-red-100">
                <i class="fas fa-times text-red-500 text-4xl"></i>
            </div>

            <div class="inline-block bg-red-50 border border-red-200 text-red-600 text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full mb-5">
                Payment Failed
            </div>

            <h1 class="text-3xl font-bold text-navy font-serif mb-2">Payment Unsuccessful</h1>
            <p class="text-gray-500 text-sm leading-relaxed mb-8">
                @if(isset($message))
                    {{ $message }}
                @else
                    Your payment could not be completed. This may be due to a network issue or payment cancellation. No amount has been deducted.
                @endif
            </p>

            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-5 text-left mb-8">
                <h3 class="text-xs font-bold text-yellow-800 uppercase tracking-widest mb-3 flex items-center gap-2">
                    <i class="fas fa-lightbulb text-yellow-500"></i> Common Reasons
                </h3>
                <ul class="space-y-2 text-sm text-yellow-800">
                    <li class="flex items-center gap-2"><i class="fas fa-circle text-[6px] text-yellow-500"></i> Insufficient account balance</li>
                    <li class="flex items-center gap-2"><i class="fas fa-circle text-[6px] text-yellow-500"></i> Payment cancelled by user</li>
                    <li class="flex items-center gap-2"><i class="fas fa-circle text-[6px] text-yellow-500"></i> Bank/UPI declined the transaction</li>
                    <li class="flex items-center gap-2"><i class="fas fa-circle text-[6px] text-yellow-500"></i> Network or timeout issue</li>
                </ul>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">
                @if(isset($retry_url))
                    <a href="{{ $retry_url }}" class="flex-1 bg-gold text-navy hover:bg-yellow-500 font-bold py-3 rounded-xl transition-all text-sm text-center">
                        <i class="fas fa-redo mr-2"></i> Try Again
                    </a>
                @endif
                <a href="/" class="flex-1 border-2 border-navy text-navy hover:bg-navy hover:text-white font-bold py-3 rounded-xl transition-all text-sm text-center">
                    <i class="fas fa-home mr-2"></i> Back to Home
                </a>
            </div>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            Need help? Call <a href="tel:{{ $cleanPhone }}" class="text-navy font-bold">{{ $contactPhone }}</a> or email <a href="mailto:{{ $contactEmail }}" class="text-navy font-bold">{{ $contactEmail }}</a>
        </p>
    </div>
</div>
@endsection
