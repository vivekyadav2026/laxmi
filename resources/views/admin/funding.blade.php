@extends('layouts.admin')

@section('title', 'Funding Requests - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Funding Requests</h1>
            <p class="text-sm text-gray-400">Review and process startup funding and investor matching requests.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.funding.index') }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all {{ !request('status') ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                All
            </a>
            <a href="{{ route('admin.funding.index', ['status' => 'pending']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all {{ request('status') === 'pending' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Pending
            </a>
            <a href="{{ route('admin.funding.index', ['status' => 'active']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all {{ request('status') === 'active' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Active
            </a>
            <a href="{{ route('admin.funding.index', ['status' => 'completed']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all {{ request('status') === 'completed' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Completed
            </a>
            <a href="{{ route('admin.funding.index', ['status' => 'cancelled']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all {{ request('status') === 'cancelled' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Cancelled
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-2xl flex items-center gap-3 animate-fadeIn relative z-10">
            <i class="fas fa-check-circle text-lg"></i>
            <span class="text-sm font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white/5 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/10 overflow-hidden relative z-10">
        @if($subscriptions->isEmpty())
            <div class="p-16 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 bg-navy/40 border border-white/5 rounded-full flex items-center justify-center text-gray-400 text-2xl mb-4 shadow-inner">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-1 font-serif">No Funding Requests Found</h3>
                <p class="text-xs text-gray-400 max-w-sm">No subscription requests matched your selected filter.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/5 bg-white/2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                            <th class="px-6 py-5">Startup & founder</th>
                            <th class="px-6 py-5">Contact Details</th>
                            <th class="px-6 py-5">Plan</th>
                            <th class="px-6 py-5">Requested On</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-6 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm text-gray-300">
                        @foreach($subscriptions as $sub)
                            <tr class="hover:bg-white/[0.02] transition-colors" x-data="{ expanded: false }">
                                <!-- Startup & Founder -->
                                <td class="px-6 py-4.5">
                                    <div class="font-bold text-white">{{ $sub->name }}</div>
                                    @if($sub->startup_name)
                                        <div class="text-xs text-gold font-semibold flex items-center gap-1 mt-0.5">
                                            <i class="fas fa-building text-[10px]"></i> {{ $sub->startup_name }}
                                        </div>
                                    @endif
                                </td>
                                
                                <!-- Contact Details -->
                                <td class="px-6 py-4.5">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center gap-2">
                                            <a href="tel:+91{{ $sub->phone }}" class="hover:text-gold transition-colors font-semibold flex items-center gap-1.5">
                                                <i class="fas fa-phone text-xs text-gray-500"></i>
                                                +91 {{ $sub->phone }}
                                            </a>
                                            <a href="https://wa.me/91{{ $sub->phone }}?text=Hello%20{{ urlencode($sub->name) }},%20this%20is%20Foundida%20Support..." target="_blank" class="w-6 h-6 rounded-full bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-400 flex items-center justify-center transition-colors" title="Message on WhatsApp">
                                                <i class="fab fa-whatsapp text-xs"></i>
                                            </a>
                                        </div>
                                        <a href="mailto:{{ $sub->email }}" class="text-xs text-gray-400 hover:text-gold flex items-center gap-1.5 mt-0.5">
                                            <i class="fas fa-envelope text-[10px]"></i>
                                            {{ $sub->email }}
                                        </a>
                                    </div>
                                </td>
                                
                                <!-- Plan -->
                                <td class="px-6 py-4.5">
                                    @if($sub->planDetails)
                                        @if($sub->planDetails->is_popular)
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-gold/20 text-gold border border-gold/30">
                                                <i class="fas fa-gem text-[10px]"></i>
                                                {{ $sub->planDetails->name }} (₹{{ number_format($sub->planDetails->price) }})
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                                <i class="fas fa-calendar-alt text-[10px]"></i>
                                                {{ $sub->planDetails->name }} (₹{{ number_format($sub->planDetails->price) }})
                                            </span>
                                        @endif
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-white/10 text-gray-300 border border-white/20">
                                            <i class="fas fa-question text-[10px]"></i>
                                            {{ ucfirst($sub->plan) }}
                                        </span>
                                    @endif
                                </td>
                                
                                <!-- Requested On -->
                                <td class="px-6 py-4.5 text-xs text-gray-400">
                                    <div>{{ $sub->created_at->format('d M Y') }}</div>
                                    <div>{{ $sub->created_at->format('h:i A') }}</div>
                                </td>
                                
                                <!-- Status Badge -->
                                <td class="px-6 py-4.5">
                                    @if($sub->status === 'pending')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 select-none">
                                            <span class="w-1.5 h-1.5 bg-amber-400 rounded-full animate-pulse"></span>
                                            Pending
                                        </span>
                                    @elseif($sub->status === 'active')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 select-none">
                                            <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span>
                                            Active
                                        </span>
                                    @elseif($sub->status === 'completed')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-500/10 text-blue-400 border border-blue-500/20 select-none">
                                            <span class="w-1.5 h-1.5 bg-blue-400 rounded-full"></span>
                                            Completed
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/5 text-gray-400 border border-white/10 select-none">
                                            <span class="w-1.5 h-1.5 bg-gray-500 rounded-full"></span>
                                            Cancelled
                                        </span>
                                    @endif
                                </td>
                                
                                <!-- Action Buttons -->
                                <td class="px-6 py-4.5 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Quick Activate/Complete Form -->
                                        @if($sub->status === 'pending')
                                            <form action="{{ route('admin.funding.updateStatus', $sub->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="active">
                                                <button type="submit" class="h-8 px-3 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-xs font-bold hover:bg-emerald-500/30 transition-all">
                                                    <i class="fas fa-check mr-1"></i> Activate
                                                </button>
                                            </form>
                                        @elseif($sub->status === 'active')
                                            <form action="{{ route('admin.funding.updateStatus', $sub->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="completed">
                                                <button type="submit" class="h-8 px-3 rounded-xl bg-blue-500/20 border border-blue-500/30 text-blue-400 text-xs font-bold hover:bg-blue-500/30 transition-all">
                                                    <i class="fas fa-flag-checkered mr-1"></i> Complete
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.funding.updateStatus', $sub->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="pending">
                                                <button type="submit" class="h-8 px-3 rounded-xl bg-amber-500/20 border border-amber-500/30 text-amber-400 text-xs font-bold hover:bg-amber-500/30 transition-all">
                                                    <i class="fas fa-undo mr-1"></i> Re-open
                                                </button>
                                            </form>
                                        @endif

                                        <!-- Cancel Button (only if not cancelled) -->
                                        @if($sub->status !== 'cancelled')
                                            <form action="{{ route('admin.funding.updateStatus', $sub->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to cancel this subscription?');">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="cancelled">
                                                <button type="submit" class="w-8 h-8 rounded-xl bg-amber-500/10 hover:bg-amber-500/20 text-amber-400 flex items-center justify-center transition-all" title="Cancel Subscription">
                                                    <i class="fas fa-ban text-xs"></i>
                                                </button>
                                            </form>
                                        @endif

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.funding.destroy', $sub->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this subscription request?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 flex items-center justify-center transition-all" title="Delete request">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Custom Styled Pagination -->
            @if($subscriptions->hasPages())
                <div class="px-6 py-5 border-t border-white/5 flex items-center justify-between text-xs text-gray-400 bg-white/1">
                    <div>
                        Showing {{ $subscriptions->firstItem() }} to {{ $subscriptions->lastItem() }} of {{ $subscriptions->total() }} results
                    </div>
                    <div class="flex items-center gap-1.5">
                        {{-- Previous Page Link --}}
                        @if ($subscriptions->onFirstPage())
                            <span class="px-3.5 py-2 bg-white/5 border border-white/5 rounded-lg opacity-50 cursor-not-allowed select-none">Previous</span>
                        @else
                            <a href="{{ $subscriptions->previousPageUrl() }}" class="px-3.5 py-2 bg-white/5 border border-white/10 hover:border-gold/30 hover:text-white rounded-lg transition-colors">Previous</a>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($subscriptions->hasMorePages())
                            <a href="{{ $subscriptions->nextPageUrl() }}" class="px-3.5 py-2 bg-white/5 border border-white/10 hover:border-gold/30 hover:text-white rounded-lg transition-colors">Next</a>
                        @else
                            <span class="px-3.5 py-2 bg-white/5 border border-white/5 rounded-lg opacity-50 cursor-not-allowed select-none">Next</span>
                        @endif
                    </div>
                </div>
            @endif
        @endif
    </div>

    <!-- Extra styles for custom transition -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-4px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
@endsection
