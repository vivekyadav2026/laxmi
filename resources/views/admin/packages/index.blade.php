@extends('layouts.admin')

@section('title', 'Packages - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Best Value Packages</h1>
            <p class="text-sm text-gray-400">Manage the bundles of Legal and Tech services shown on the public packages page.</p>
        </div>
        
        <div>
            <a href="{{ route('admin.packages.create') }}" class="px-5 py-3 bg-gold text-navy font-bold rounded-xl hover:bg-gold/90 transition-all flex items-center gap-2 shadow-lg shadow-gold/20">
                <i class="fas fa-plus"></i> Create New Package
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
        @if($packages->isEmpty())
            <div class="p-16 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 bg-navy/40 border border-white/5 rounded-full flex items-center justify-center text-gray-400 text-2xl mb-4 shadow-inner">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-1 font-serif">No Packages Found</h3>
                <p class="text-xs text-gray-400 max-w-sm">Get started by creating a new Legal or Tech combo package.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/5 bg-white/2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                            <th class="px-6 py-5">Name (EN / HI)</th>
                            <th class="px-6 py-5">Type</th>
                            <th class="px-6 py-5">Price & Savings</th>
                            <th class="px-6 py-5">Features Included</th>
                            <th class="px-6 py-5">Sort Order</th>
                            <th class="px-6 py-5">Popularity</th>
                            <th class="px-6 py-5">Status</th>
                            <th class="px-6 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm text-gray-300">
                        @foreach($packages as $pkg)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <!-- Name & Slug -->
                                <td class="px-6 py-4.5">
                                    <div class="font-bold text-white flex items-center gap-2">
                                        {{ $pkg->name_en }}
                                        <span class="text-gray-400 font-normal">({{ $pkg->name_hi }})</span>
                                        @if($pkg->badge_en)
                                            <span class="bg-gold/20 text-gold text-[9px] font-extrabold uppercase px-2 py-0.5 rounded-full border border-gold/30">
                                                {{ $pkg->badge_en }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-xs text-gray-500 font-mono mt-0.5">{{ $pkg->slug }}</div>
                                </td>

                                <!-- Type -->
                                <td class="px-6 py-4.5">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $pkg->type === 'legal' ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : 'bg-purple-500/10 text-purple-400 border border-purple-500/20' }}">
                                        {{ ucfirst($pkg->type) }}
                                    </span>
                                </td>

                                <!-- Price & Savings -->
                                <td class="px-6 py-4.5">
                                    <div class="font-semibold text-white">₹{{ number_format($pkg->price) }}</div>
                                    @if($pkg->old_price && $pkg->old_price > $pkg->price)
                                        <div class="text-[11px] text-green-400">Save ₹{{ number_format($pkg->old_price - $pkg->price) }}</div>
                                    @endif
                                </td>

                                <!-- Features Count -->
                                <td class="px-6 py-4.5">
                                    <div class="text-gray-300 text-xs font-semibold flex items-center gap-1.5">
                                        <i class="fas fa-list-ul text-gray-500"></i>
                                        {{ count($pkg->features) }} Features
                                    </div>
                                    <div class="text-[10px] text-gray-500 truncate max-w-[200px] mt-0.5">
                                        {{ implode(', ', $pkg->features) }}
                                    </div>
                                </td>

                                <!-- Sort Order -->
                                <td class="px-6 py-4.5 text-white font-semibold">
                                    {{ $pkg->sort_order }}
                                </td>

                                <!-- Popularity Status -->
                                <td class="px-6 py-4.5">
                                    @if($pkg->is_popular)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gold/15 text-gold border border-gold/25">
                                            <i class="fas fa-star text-[10px]"></i> Yes
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-white/5 text-gray-500 border border-white/5">
                                             No
                                        </span>
                                    @endif
                                </td>

                                <!-- Active Status -->
                                <td class="px-6 py-4.5">
                                    @if($pkg->is_active)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                            <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span> Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-500/10 text-red-400 border border-red-500/20">
                                            <span class="w-1.5 h-1.5 bg-red-400 rounded-full"></span> Inactive
                                        </span>
                                    @endif
                                </td>

                                <!-- Action Buttons -->
                                <td class="px-6 py-4.5 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.packages.edit', $pkg->id) }}" class="w-8 h-8 rounded-xl bg-gold/10 hover:bg-gold/20 text-gold flex items-center justify-center transition-all" title="Edit Package">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.packages.destroy', $pkg->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 flex items-center justify-center transition-all" title="Delete Package">
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

            <!-- Pagination -->
            @if($packages->hasPages())
                <div class="px-6 py-5 border-t border-white/5 flex items-center justify-between text-xs text-gray-400 bg-white/1">
                    <div>
                        Showing {{ $packages->firstItem() }} to {{ $packages->lastItem() }} of {{ $packages->total() }} results
                    </div>
                    <div class="flex items-center gap-1.5">
                        @if ($packages->onFirstPage())
                            <span class="px-3.5 py-2 bg-white/5 border border-white/5 rounded-lg opacity-50 cursor-not-allowed select-none">Previous</span>
                        @else
                            <a href="{{ $packages->previousPageUrl() }}" class="px-3.5 py-2 bg-white/5 border border-white/10 hover:border-gold/30 hover:text-white rounded-lg transition-colors">Previous</a>
                        @endif

                        @if ($packages->hasMorePages())
                            <a href="{{ $packages->nextPageUrl() }}" class="px-3.5 py-2 bg-white/5 border border-white/10 hover:border-gold/30 hover:text-white rounded-lg transition-colors">Next</a>
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
