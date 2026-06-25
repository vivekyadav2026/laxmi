@extends('layouts.admin')

@section('title', 'Package Inquiries - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Package Inquiries</h1>
            <p class="text-sm text-gray-400">Review, follow up, and manage inquiries for combo packages.</p>
        </div>
        
        <div class="flex items-center gap-3 overflow-x-auto pb-2 md:pb-0">
            <a href="{{ route('admin.package-inquiries.index') }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all whitespace-nowrap {{ !request('status') ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                All
            </a>
            <a href="{{ route('admin.package-inquiries.index', ['status' => 'pending']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all whitespace-nowrap {{ request('status') === 'pending' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Pending
            </a>
            <a href="{{ route('admin.package-inquiries.index', ['status' => 'contacted']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all whitespace-nowrap {{ request('status') === 'contacted' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Contacted
            </a>
            <a href="{{ route('admin.package-inquiries.index', ['status' => 'completed']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all whitespace-nowrap {{ request('status') === 'completed' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                Completed
            </a>
            <a href="{{ route('admin.package-inquiries.index', ['status' => 'cancelled']) }}" class="px-4 py-2 text-xs font-semibold rounded-xl transition-all whitespace-nowrap {{ request('status') === 'cancelled' ? 'bg-gold text-navy shadow-lg shadow-gold/20' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
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
        @if($inquiries->isEmpty())
            <div class="p-16 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 bg-navy/40 border border-white/5 rounded-full flex items-center justify-center text-gray-400 text-2xl mb-4 shadow-inner">
                    <i class="fas fa-inbox"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-1 font-serif">No Inquiries Found</h3>
                <p class="text-xs text-gray-400 max-w-sm">No package inquiries matched your selected filter.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/5 bg-white/2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                            <th class="px-6 py-5">Customer</th>
                            <th class="px-6 py-5">Contact Details</th>
                            <th class="px-6 py-5">Selected Package</th>
                            <th class="px-6 py-5">Requested On</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-6 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm text-gray-300">
                        @foreach($inquiries as $inquiry)
                            @php
                                $pkg = $inquiry->packageDetails;
                                if ($pkg) {
                                    $packageLabel = $pkg->name_en . ($pkg->name_hi ? ' (' . $pkg->name_hi . ')' : '');
                                    $priceDisplay = '₹' . number_format($pkg->price);
                                } else {
                                    $packageLabel = ucfirst(str_replace('-', ' ', $inquiry->package_slug));
                                    $priceDisplay = 'N/A';
                                }
                            @endphp
                            <tr class="hover:bg-white/[0.02] transition-colors" x-data="{ expanded: false }">
                                <!-- Customer Name -->
                                <td class="px-6 py-4.5">
                                    <div class="font-bold text-white">{{ $inquiry->name }}</div>
                                    @if($inquiry->notes)
                                        <div class="text-[11px] text-gold mt-1 flex items-center gap-1 max-w-[200px] truncate">
                                            <i class="fas fa-sticky-note"></i> {{ $inquiry->notes }}
                                        </div>
                                    @endif
                                </td>
                                
                                <!-- Contact Details -->
                                <td class="px-6 py-4.5">
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-2">
                                            <a href="tel:+91{{ $inquiry->phone }}" class="hover:text-gold transition-colors font-semibold flex items-center gap-1.5">
                                                <i class="fas fa-phone text-xs text-gray-500"></i>
                                                +91 {{ $inquiry->phone }}
                                            </a>
                                            <a href="https://wa.me/91{{ $inquiry->phone }}?text=Hello%20{{ urlencode($inquiry->name) }},%20this%20is%20Foundida%20Support%20regarding%20the%20{{ urlencode($packageLabel) }}%20package..." target="_blank" class="w-6 h-6 rounded-full bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-400 flex items-center justify-center transition-colors" title="Message on WhatsApp">
                                                <i class="fab fa-whatsapp text-xs"></i>
                                            </a>
                                        </div>
                                        <div class="text-xs text-gray-400">
                                            <a href="mailto:{{ $inquiry->email }}" class="hover:text-gold transition-colors flex items-center gap-1.5">
                                                <i class="fas fa-envelope text-[10px] text-gray-500"></i>
                                                {{ $inquiry->email }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- Package Info -->
                                <td class="px-6 py-4.5">
                                    <div>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                            <i class="fas fa-cubes text-[10px]"></i>
                                            {{ $packageLabel }}
                                        </span>
                                    </div>
                                    <div class="text-[11px] text-gray-400 mt-1 pl-1">
                                        Price: <span class="text-gold font-semibold">{{ $priceDisplay }}</span>
                                    </div>
                                </td>
                                
                                <!-- Requested On -->
                                <td class="px-6 py-4.5 text-xs text-gray-400">
                                    <div>{{ $inquiry->created_at->format('d M Y') }}</div>
                                    <div>{{ $inquiry->created_at->format('h:i A') }}</div>
                                </td>
                                
                                <!-- Status Badge -->
                                <td class="px-6 py-4.5">
                                    @if($inquiry->status === 'pending')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20 select-none">
                                            <span class="w-1.5 h-1.5 bg-amber-400 rounded-full animate-pulse"></span>
                                            Pending
                                        </span>
                                    @elseif($inquiry->status === 'contacted')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-500/10 text-blue-400 border border-blue-500/20 select-none">
                                            <span class="w-1.5 h-1.5 bg-blue-400 rounded-full"></span>
                                            Contacted
                                        </span>
                                    @elseif($inquiry->status === 'completed')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 select-none">
                                            <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span>
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
                                <td class="px-6 py-4.5 text-right space-y-2">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Expand/Edit Button -->
                                        <button @click="expanded = !expanded" class="w-8 h-8 rounded-xl bg-white/5 hover:bg-white/10 text-white flex items-center justify-center transition-all" title="Add Notes / Edit Details">
                                            <i class="fas fa-edit text-xs" :class="expanded ? 'text-gold' : ''"></i>
                                        </button>
                                        
                                        <!-- Quick Status Toggle Form (Pending -> Contacted) -->
                                        @if($inquiry->status === 'pending')
                                            <form action="{{ route('admin.package-inquiries.updateStatus', $inquiry->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="contacted">
                                                <button type="submit" class="h-8 px-3 rounded-xl bg-[#0B1F3A] hover:bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-xs font-bold transition-all">
                                                    <i class="fas fa-check mr-1"></i> Contacted
                                                </button>
                                            </form>
                                        @elseif($inquiry->status === 'contacted')
                                            <form action="{{ route('admin.package-inquiries.updateStatus', $inquiry->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="completed">
                                                <button type="submit" class="h-8 px-3 rounded-xl bg-[#0B1F3A] hover:bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-xs font-bold transition-all">
                                                    <i class="fas fa-check-double mr-1"></i> Complete
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.package-inquiries.updateStatus', $inquiry->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="pending">
                                                <button type="submit" class="h-8 px-3 rounded-xl bg-[#0B1F3A] hover:bg-amber-500/20 border border-amber-500/30 text-amber-400 text-xs font-bold transition-all">
                                                    <i class="fas fa-undo mr-1"></i> Re-open
                                                </button>
                                            </form>
                                        @endif

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.package-inquiries.destroy', $inquiry->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this package inquiry?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 flex items-center justify-center transition-all" title="Delete inquiry">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                    
                                    <!-- Nested Alpine slide down panel for editing notes & changing status -->
                                    <template x-if="expanded">
                                        <div class="col-span-full text-left bg-navy/60 border border-white/10 rounded-2xl p-5 mt-4 animate-slideDown shadow-inner relative" style="display: table-row;">
                                            <form action="{{ route('admin.package-inquiries.updateStatus', $inquiry->id) }}" method="POST" class="space-y-4">
                                                @csrf
                                                @method('PATCH')
                                                
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Update Status</label>
                                                        <select name="status" class="w-full bg-[#0B1F3A] border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-gold transition-colors">
                                                            <option value="pending" {{ $inquiry->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                                            <option value="completed" {{ $inquiry->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                                            <option value="cancelled" {{ $inquiry->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Notes / Follow-up Details</label>
                                                        <textarea name="notes" placeholder="Enter follow-up conversation notes, next steps, or specific customer requirements..." rows="2" class="w-full bg-[#0B1F3A] border border-white/10 rounded-xl px-4 py-2 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">{{ $inquiry->notes }}</textarea>
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
            @if($inquiries->hasPages())
                <div class="px-6 py-5 border-t border-white/5 flex items-center justify-between text-xs text-gray-400 bg-white/1">
                    <div>
                        Showing {{ $inquiries->firstItem() }} to {{ $inquiries->lastItem() }} of {{ $inquiries->total() }} results
                    </div>
                    <div class="flex items-center gap-1.5">
                        {{-- Previous Page Link --}}
                        @if ($inquiries->onFirstPage())
                            <span class="px-3.5 py-2 bg-white/5 border border-white/5 rounded-lg opacity-50 cursor-not-allowed select-none">Previous</span>
                        @else
                            <a href="{{ $inquiries->previousPageUrl() }}" class="px-3.5 py-2 bg-white/5 border border-white/10 hover:border-gold/30 hover:text-white rounded-lg transition-colors">Previous</a>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($inquiries->hasMorePages())
                            <a href="{{ $inquiries->nextPageUrl() }}" class="px-3.5 py-2 bg-white/5 border border-white/10 hover:border-gold/30 hover:text-white rounded-lg transition-colors">Next</a>
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
