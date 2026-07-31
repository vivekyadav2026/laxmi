@extends('layouts.admin')
@section('title', 'Team Members - Admin Panel')
@section('content')

<div class="mb-6 flex items-center justify-between relative z-10">
    <div>
        <h1 class="text-3xl font-extrabold text-white font-serif drop-shadow-md">Our Expert Team</h1>
        <p class="text-sm text-gray-400 mt-1">Manage the team members shown on the homepage.</p>
    </div>
    <a href="{{ route('admin.team.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-gold text-navy font-bold text-xs rounded-xl hover:bg-gold/90 transition-all shadow-lg shadow-gold/20">
        <i class="fas fa-plus"></i> Add Member
    </a>
</div>

@if(session('success'))
    <div class="mb-4 p-3 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl text-sm relative z-10">
        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 relative z-10">
    @forelse($members as $member)
    <div class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:border-gold/30 transition-all group">
        <div class="relative">
            <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" class="w-full h-44 object-cover object-top">
            @if(!$member->is_active)
                <span class="absolute top-2 right-2 bg-red-500/80 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Inactive</span>
            @endif
        </div>
        <div class="p-4">
            <h3 class="text-white font-bold text-sm">{{ $member->name }}</h3>
            <p class="text-gold text-[10px] font-bold uppercase tracking-widest mt-0.5">{{ $member->role }}</p>
            @if($member->bio)
                <p class="text-gray-400 text-[11px] mt-1.5 leading-relaxed line-clamp-2">{{ $member->bio }}</p>
            @endif
            <div class="flex items-center gap-2 mt-3">
                <a href="{{ route('admin.team.edit', $member) }}" class="flex-1 text-center px-3 py-1.5 bg-white/5 hover:bg-gold/10 hover:text-gold border border-white/10 hover:border-gold/30 text-gray-300 text-[11px] font-bold rounded-lg transition-all">
                    <i class="fas fa-pen mr-1"></i> Edit
                </a>
                <form action="{{ route('admin.team.destroy', $member) }}" method="POST" onsubmit="return confirm('Delete {{ $member->name }}?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-3 py-1.5 bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 text-[11px] font-bold rounded-lg transition-all">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-16 text-gray-500">
        <i class="fas fa-users text-4xl mb-3 block opacity-30"></i>
        No team members yet. <a href="{{ route('admin.team.create') }}" class="text-gold underline">Add the first one</a>.
    </div>
    @endforelse
</div>

@endsection
