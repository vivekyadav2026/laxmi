@extends('layouts.admin')

@section('title', 'Live Session Bookings - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Live Session Bookings</h1>
            <p class="text-sm text-gray-400">Review, follow up, and manage ₹99 live session expert consultation bookings.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.live-sessions.index') }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all {{ !request('status') ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                All
            </a>
            <a href="{{ route('admin.live-sessions.index', ['status' => 'pending']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all {{ request('status') === 'pending' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Pending
            </a>
            <a href="{{ route('admin.live-sessions.index', ['status' => 'contacted']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all {{ request('status') === 'contacted' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Contacted
            </a>
            <a href="{{ route('admin.live-sessions.index', ['status' => 'completed']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all {{ request('status') === 'completed' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Completed
            </a>
            <a href="{{ route('admin.live-sessions.index', ['status' => 'canceled']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all {{ request('status') === 'canceled' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Canceled
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
        @if($bookings->isEmpty())
            <div class="p-16 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 bg-navy/40 border border-white/5 rounded-full flex items-center justify-center text-gray-400 text-2xl mb-4 shadow-inner">
                    <i class="fas fa-video-slash"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-1 font-serif">No Live Session Bookings Found</h3>
                <p class="text-xs text-gray-400 max-w-sm">No session bookings matched your selected filter.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/5 bg-white/2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                            <th class="px-6 py-5">Customer</th>
                            <th class="px-6 py-5">Contact Details</th>
                            <th class="px-6 py-5">Preferred Schedule</th>
                            <th class="px-6 py-5">Booked On</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-6 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm text-gray-300">
                        @foreach($bookings as $bk)
                            <tr class="hover:bg-white/[0.02] transition-colors" x-data="{ expanded: false }">
                                <!-- Customer Name -->
                                <td class="px-6 py-4.5">
                                    <div class="font-bold text-white">{{ $bk->name }}</div>
                                    @if($bk->notes)
                                        <div class="text-[11px] text-gold mt-1 flex items-center gap-1 max-w-[200px] truncate">
                                            <i class="fas fa-sticky-note"></i> {{ $bk->notes }}
                                        </div>
                                    @endif
                                </td>
                                
                                <!-- Contact Details -->
                                <td class="px-6 py-4.5">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center gap-2">
                                            <a href="tel:+91{{ $bk->phone }}" class="hover:text-gold transition-colors font-semibold flex items-center gap-1.5 text-xs">
                                                <i class="fas fa-phone text-xs text-gray-500"></i>
                                                +91 {{ $bk->phone }}
                                            </a>
                                            <a href="https://wa.me/91{{ $bk->phone }}?text=Hello%20{{ urlencode($bk->name) }},%20this%20is%20Foundida%20Support%20regarding%20your%20Live%20Session..." target="_blank" class="w-5 h-5 rounded-full bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-400 flex items-center justify-center transition-colors" title="Message on WhatsApp">
                                                <i class="fab fa-whatsapp text-[10px]"></i>
                                            </a>
                                        </div>
                                        @if($bk->email)
                                            <a href="mailto:{{ $bk->email }}" class="text-[11px] text-gray-400 hover:text-gold transition-colors flex items-center gap-1.5">
                                                <i class="fas fa-envelope text-[10px] text-gray-600"></i>
                                                {{ $bk->email }}
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                
                                <!-- Preferred Schedule -->
                                <td class="px-6 py-4.5">
                                    <div class="flex flex-col">
                                        <span class="text-xs font-semibold text-blue-400">
                                            <i class="fas fa-calendar-day text-[10px] mr-1"></i>
                                            {{ \Carbon\Carbon::parse($bk->preferred_date)->format('d M Y') }}
                                        </span>
                                        <span class="text-[11px] text-gray-400">
                                            <i class="fas fa-clock text-[10px] mr-1"></i>
                                            {{ $bk->preferred_time }}
                                        </span>
                                    </div>
                                </td>
                                
                                <!-- Booked On -->
                                <td class="px-6 py-4.5 text-xs text-gray-400">
                                    <div>{{ $bk->created_at->format('d M Y') }}</div>
                                    <div>{{ $bk->created_at->format('h:i A') }}</div>
                                </td>
                                
                                <!-- Status Badge -->
                                <td class="px-6 py-4.5">
                                    @if($bk->status === 'pending')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 select-none">
                                            <span class="w-1.5 h-1.5 bg-amber-400 rounded-full animate-pulse"></span>
                                            Pending
                                        </span>
                                    @elseif($bk->status === 'contacted')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-500/10 text-blue-400 border border-blue-500/20 select-none">
                                            <span class="w-1.5 h-1.5 bg-blue-400 rounded-full"></span>
                                            Contacted
                                        </span>
                                    @elseif($bk->status === 'completed')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 select-none">
                                            <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span>
                                            Completed
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/5 text-gray-400 border border-white/10 select-none">
                                            <span class="w-1.5 h-1.5 bg-gray-500 rounded-full"></span>
                                            Canceled
                                        </span>
                                    @endif
                                </td>
                                
                                <!-- Action Buttons -->
                                <td class="px-6 py-4.5 text-right space-y-2">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Expand/Edit Button -->
                                        <button @click="expanded = !expanded" class="w-8 h-8 rounded-xl bg-white/5 hover:bg-white/10 text-white flex items-center justify-center transition-all" title="Add Notes / Edit Details">
                                            <i class="fas fa-edit text-xs" :class="expanded ? 'text-gold' : ''"></i>
                                        </button>
                                        
                                        <!-- Quick Status Toggle Form -->
                                        @if($bk->status === 'pending')
                                            <form action="{{ route('admin.live-sessions.updateStatus', $bk->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="completed">
                                                <button type="submit" class="h-8 px-3 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-xs font-bold hover:bg-emerald-500/30 transition-all">
                                                    <i class="fas fa-check mr-1"></i> Completed
                                                </button>
                                            </form>
                                        @endif

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.live-sessions.destroy', $bk->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 flex items-center justify-center transition-all" title="Delete Booking">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                    
                                    <!-- Nested Alpine slide down panel for editing notes & changing status -->
                                    <template x-if="expanded">
                                        <div class="col-span-full text-left bg-navy/60 border border-white/10 rounded-2xl p-5 mt-4 animate-slideDown shadow-inner relative" style="display: table-row;">
                                            <form action="{{ route('admin.live-sessions.updateStatus', $bk->id) }}" method="POST" class="space-y-4">
                                                @csrf
                                                @method('PATCH')
                                                
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Update Status</label>
                                                        <select name="status" class="w-full bg-[#0B1F3A] border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-gold transition-colors">
                                                            <option value="pending" {{ $bk->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="contacted" {{ $bk->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                                            <option value="completed" {{ $bk->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                                            <option value="canceled" {{ $bk->status === 'canceled' ? 'selected' : '' }}>Canceled</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Notes / Consultation Details</label>
                                                        <textarea name="notes" placeholder="Enter session outcomes, payment status, meeting links, or next steps..." rows="2" class="w-full bg-[#0B1F3A] border border-white/10 rounded-xl px-4 py-2 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">{{ $bk->notes }}</textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="flex justify-end gap-3 pt-2">
                                                    <button type="button" @click="expanded = false" class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-xs font-bold text-gray-400 hover:text-white transition-all">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="px-5 py-2 bg-gradient-to-r from-gold to-[#a88d30] hover:from-[#e2b54d] hover:to-[#c6a83d] text-navy rounded-xl text-xs font-black transition-all shadow-lg">
                                                        Save Changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </template>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Custom Styled Pagination -->
            @if($bookings->hasPages())
                <div class="px-6 py-5 border-t border-white/5 flex items-center justify-between text-xs text-gray-400 bg-white/1">
                    <div>
                        Showing {{ $bookings->firstItem() }} to {{ $bookings->lastItem() }} of {{ $bookings->total() }} results
                    </div>
                    <div class="flex items-center gap-1.5">
                        @if ($bookings->onFirstPage())
                            <span class="px-3.5 py-2 bg-white/5 border border-white/5 rounded-lg opacity-50 cursor-not-allowed select-none">Previous</span>
                        @else
                            <a href="{{ $bookings->previousPageUrl() }}" class="px-3.5 py-2 bg-white/5 border border-white/10 hover:border-gold/30 hover:text-white rounded-lg transition-colors">Previous</a>
                        @endif

                        @if ($bookings->hasMorePages())
                            <a href="{{ $bookings->nextPageUrl() }}" class="px-3.5 py-2 bg-white/5 border border-white/10 hover:border-gold/30 hover:text-white rounded-lg transition-colors">Next</a>
                        @else
                            <span class="px-3.5 py-2 bg-white/5 border border-white/5 rounded-lg opacity-50 cursor-not-allowed select-none">Next</span>
                        @endif
                    </div>
                </div>
            @endif
        @endif
    </div>

    <!-- Extra styles for custom transition of expanded panel -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-4px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-8px); max-height: 0; }
            to { opacity: 1; transform: translateY(0); max-height: 500px; }
        }
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }
        .animate-slideDown {
            animation: slideDown 0.3s ease-out forwards;
        }
    </style>
@endsection
