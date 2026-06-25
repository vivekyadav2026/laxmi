@extends('layouts.admin')

@section('title', 'Services Management - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Services Management</h1>
            <p class="text-sm text-gray-400">Manage pricing, categories, and delivery timelines.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="bg-gradient-to-r from-gold to-[#a88d30] text-navy px-5 py-2.5 rounded-xl text-sm font-bold hover:from-[#e2b54d] hover:to-[#c6a83d] transition-all shadow-lg shadow-gold/20 hover:shadow-gold/40 hover:-translate-y-0.5 inline-flex items-center">
            <i class="fas fa-plus mr-2"></i> Add Service
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-500/20 border border-green-500/30 text-green-400 text-sm p-4 rounded-2xl mb-8 flex items-start gap-3 relative z-10 shadow-lg shadow-green-500/5">
            <i class="fas fa-check-circle mt-0.5 text-lg"></i>
            <div>
                <p class="font-bold">Success</p>
                <p class="text-xs text-green-300/90 mt-0.5">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="bg-white/5 backdrop-blur-xl rounded-3xl shadow-lg border border-white/10 flex flex-col overflow-hidden relative z-10">
        @foreach($categories as $category)
            @if($category->services->count() > 0)
                <div class="px-8 py-4 border-b border-white/10 bg-black/20 flex items-center justify-between">
                    <h2 class="text-lg font-bold text-white font-serif">{{ $category->name }}</h2>
                    <span class="bg-white/10 text-gray-300 text-xs px-3 py-1 rounded-full font-semibold">{{ $category->services->count() }} services</span>
                </div>
                <div class="p-0 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/5 border-b border-white/5 text-gray-400 text-xs uppercase tracking-wider font-bold">
                                <th class="py-3 px-8">Service Name</th>
                                <th class="py-3 px-8">Price</th>
                                <th class="py-3 px-8">Time</th>
                                <th class="py-3 px-8 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-sm">
                            @foreach($category->services as $service)
                            <tr class="hover:bg-white/5 transition-colors group">
                                <td class="py-4 px-8">
                                    <p class="font-bold text-gray-200">{{ $service->name_en }}</p>
                                    @if($service->name_hi)
                                        <p class="text-xs text-gray-500">{{ $service->name_hi }}</p>
                                    @endif
                                </td>
                                <td class="py-4 px-8 font-semibold text-gold">{{ $service->price ?? 'N/A' }}</td>
                                <td class="py-4 px-8 text-gray-400">{{ $service->time ?? 'N/A' }}</td>
                                <td class="py-4 px-8 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.services.edit', $service) }}" class="w-8 h-8 rounded-lg bg-blue-500/10 text-blue-400 flex items-center justify-center hover:bg-blue-500/20 transition-colors" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-lg bg-red-500/10 text-red-400 flex items-center justify-center hover:bg-red-500/20 transition-colors" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @endforeach
    </div>
@endsection
