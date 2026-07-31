@extends('layouts.admin')
@section('title', 'Edit Team Member')
@section('content')

<div class="mb-6 flex items-center gap-3 relative z-10">
    <a href="{{ route('admin.team.index') }}" class="text-gray-400 hover:text-gold text-sm"><i class="fas fa-arrow-left mr-1"></i> Back</a>
    <h1 class="text-2xl font-extrabold text-white font-serif">Edit: {{ $team->name }}</h1>
</div>

<div class="max-w-2xl relative z-10">
    <form action="{{ route('admin.team.update', $team) }}" method="POST" enctype="multipart/form-data" class="bg-white/5 border border-white/10 rounded-2xl p-6 space-y-5">
        @csrf @method('PUT')

        {{-- Photo Upload --}}
        <div>
            <label class="block text-xs text-gray-400 font-bold uppercase tracking-wider mb-2">Photo</label>
            <div x-data="{ preview: '{{ $team->photo_url }}' }" class="flex items-center gap-4">
                <div class="w-20 h-20 rounded-full border-2 border-gold overflow-hidden flex items-center justify-center bg-white/5">
                    <img :src="preview" class="w-full h-full object-cover">
                </div>
                <div>
                    <input type="file" name="photo" id="photo" accept="image/*" class="hidden"
                        @change="preview = URL.createObjectURL($event.target.files[0])">
                    <label for="photo" class="cursor-pointer px-4 py-2 bg-white/5 border border-white/10 text-gray-300 text-xs font-bold rounded-lg hover:border-gold/30 hover:text-gold transition-all">
                        <i class="fas fa-upload mr-1"></i> Change Photo
                    </label>
                    <p class="text-[10px] text-gray-500 mt-1">Leave blank to keep current photo</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Full Name *</label>
                <input type="text" name="name" value="{{ old('name', $team->name) }}" required class="w-full bg-navy/80 border border-white/10 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-gold transition-colors">
                @error('name')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Role / Designation *</label>
                <input type="text" name="role" value="{{ old('role', $team->role) }}" required class="w-full bg-navy/80 border border-white/10 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-gold transition-colors">
                @error('role')<p class="text-red-400 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div>
            <label class="block text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Short Bio (max 300 chars)</label>
            <textarea name="bio" rows="3" maxlength="300" class="w-full bg-navy/80 border border-white/10 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-gold transition-colors resize-none">{{ old('bio', $team->bio) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">LinkedIn URL</label>
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $team->linkedin_url) }}" class="w-full bg-navy/80 border border-white/10 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-gold transition-colors">
            </div>
            <div>
                <label class="block text-xs text-gray-400 font-bold uppercase tracking-wider mb-1">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $team->sort_order) }}" min="0" class="w-full bg-navy/80 border border-white/10 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-gold transition-colors">
            </div>
        </div>

        <div class="flex items-center gap-3">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ $team->is_active ? 'checked' : '' }} class="w-4 h-4 accent-gold">
            <label for="is_active" class="text-sm text-gray-300">Show on homepage (Active)</label>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="px-6 py-2.5 bg-gold text-navy font-bold text-sm rounded-xl hover:bg-gold/90 transition-all shadow-lg shadow-gold/20">
                <i class="fas fa-save mr-2"></i>Update Member
            </button>
            <a href="{{ route('admin.team.index') }}" class="px-6 py-2.5 bg-white/5 border border-white/10 text-gray-300 text-sm rounded-xl hover:border-white/20 transition-all">Cancel</a>
        </div>
    </form>
</div>

@endsection
