@extends('layouts.app')

@section('title', 'Processing Payment – Foundida')

@section('content')
<div class="min-h-screen bg-offwhite flex items-center justify-center py-16 px-4">
    <div class="max-w-md w-full text-center">
        <div class="bg-white rounded-2xl shadow-xl p-10">
            <div class="w-16 h-16 bg-gold/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-lock text-gold text-2xl"></i>
            </div>
            <h2 class="text-xl font-bold text-navy font-serif mb-2">Redirecting to Payment Gateway…</h2>
            <p class="text-sm text-gray-500 mb-6">Please do not close this tab. You'll be redirected to Razorpay secure payment page in a moment.</p>
            <div class="flex justify-center">
                <div class="animate-spin rounded-full h-8 w-8 border-4 border-gold border-t-transparent"></div>
            </div>
        </div>
    </div>
</div>

<!-- Razorpay Checkout Script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var options = {
        key: "{{ $rzp_key }}",
        amount: {{ $amount_paise }},
        currency: "INR",
        name: "Foundida",
        description: "{{ $payment->item_title }}",
        order_id: "{{ $rzp_order_id }}",
        prefill: {
            name: "{{ $payment->customer_name }}",
            email: "{{ $payment->customer_email }}",
            contact: "{{ $payment->customer_phone }}"
        },
        notes: {
            order_number: "{{ $payment->order_number }}",
            item_type: "{{ $payment->item_type }}"
        },
        theme: {
            color: "#D4A843"
        },
        modal: {
            ondismiss: function () {
                window.location.href = "{{ route('payment.failed') }}";
            }
        },
        handler: function (response) {
            // POST verification to our backend
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('payment.verify') }}";

            var fields = {
                '_token': "{{ csrf_token() }}",
                'razorpay_payment_id': response.razorpay_payment_id,
                'razorpay_order_id': response.razorpay_order_id,
                'razorpay_signature': response.razorpay_signature
            };

            Object.keys(fields).forEach(function (key) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = fields[key];
                form.appendChild(input);
            });

            document.body.appendChild(form);
            form.submit();
        }
    };

    var rzp = new Razorpay(options);
    rzp.open();

    rzp.on('payment.failed', function (response) {
        window.location.href = "{{ route('payment.failed') }}";
    });
});
</script>
@endsection
