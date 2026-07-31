@extends('layouts.admin')

@section('title', 'Payments – Admin Panel')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
    <div>
        <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Payments</h1>
        <p class="text-sm text-gray-400">All Razorpay transactions — view status, amounts, and customer details.</p>
    </div>
    <div class="flex items-center gap-3">
        <span class="bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-xs font-bold px-3 py-1.5 rounded-full">
            ₹{{ number_format($totalRevenue) }} Total Collected
        </span>
    </div>
</div>

<!-- Stats Row -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8 relative z-10">
    <div class="bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 p-5 text-center">
        <p class="text-3xl font-extrabold text-white">{{ $totalPaid }}</p>
        <p class="text-xs text-emerald-400 font-bold uppercase tracking-wider mt-1">Successful</p>
    </div>
    <div class="bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 p-5 text-center">
        <p class="text-3xl font-extrabold text-white">{{ $totalPending }}</p>
        <p class="text-xs text-yellow-400 font-bold uppercase tracking-wider mt-1">Pending</p>
    </div>
    <div class="bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 p-5 text-center">
        <p class="text-3xl font-extrabold text-white">{{ $totalFailed }}</p>
        <p class="text-xs text-red-400 font-bold uppercase tracking-wider mt-1">Failed</p>
    </div>
    <div class="bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 p-5 text-center">
        <p class="text-2xl font-extrabold text-gold">₹{{ number_format($totalRevenue) }}</p>
        <p class="text-xs text-gold font-bold uppercase tracking-wider mt-1">Revenue</p>
    </div>
</div>

<!-- Payments Table -->
<div class="bg-white/5 backdrop-blur-xl rounded-3xl shadow-lg border border-white/10 relative z-10 overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-white/10">
        <h3 class="text-base font-bold text-white font-serif">Transaction History</h3>
        <span class="text-xs text-gray-400">{{ $payments->total() }} total records</span>
    </div>

    @if($payments->isEmpty())
        <div class="text-center py-20">
            <i class="fas fa-credit-card text-4xl text-gray-600 mb-4"></i>
            <p class="text-gray-400 font-semibold">No payments yet</p>
            <p class="text-xs text-gray-500 mt-1">Transactions will appear here once customers make payments.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-xs font-bold text-gray-400 uppercase tracking-widest border-b border-white/5">
                        <th class="px-6 py-3 text-left">Order #</th>
                        <th class="px-6 py-3 text-left">Customer</th>
                        <th class="px-6 py-3 text-left">Item</th>
                        <th class="px-6 py-3 text-right">Amount</th>
                        <th class="px-6 py-3 text-center">Status</th>
                        <th class="px-6 py-3 text-left">Razorpay ID</th>
                        <th class="px-6 py-3 text-left">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach($payments as $p)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4">
                            <span class="font-mono text-xs text-gold">{{ $p->order_number }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-semibold text-white text-sm">{{ $p->customer_name }}</p>
                            <p class="text-xs text-gray-400">{{ $p->customer_email }}</p>
                            <p class="text-xs text-gray-500">{{ $p->customer_phone }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-white text-sm font-medium">{{ Str::limit($p->item_title, 35) }}</p>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-gray-400 bg-white/5 px-2 py-0.5 rounded-full">{{ $p->item_type }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="font-bold text-white">₹{{ number_format($p->amount) }}</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($p->status === 'paid')
                                <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">Paid</span>
                            @elseif($p->status === 'pending')
                                <span class="bg-yellow-500/20 text-yellow-400 border border-yellow-500/30 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">Pending</span>
                            @else
                                <span class="bg-red-500/20 text-red-400 border border-red-500/30 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">Failed</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-mono text-xs text-gray-400">{{ $p->razorpay_payment_id ?? '—' }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs text-gray-400">{{ $p->created_at->format('d M Y') }}</p>
                            <p class="text-[10px] text-gray-500">{{ $p->created_at->format('h:i A') }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($payments->hasPages())
        <div class="px-6 py-4 border-t border-white/10">
            {{ $payments->links('pagination::tailwind') }}
        </div>
        @endif
    @endif
</div>
@endsection
