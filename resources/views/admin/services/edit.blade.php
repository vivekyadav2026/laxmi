@extends('layouts.admin')

@section('title', 'Edit Service - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Edit Service</h1>
            <p class="text-sm text-gray-400">Update the details for {{ $service->name_en }}.</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="bg-white/5 backdrop-blur-md border border-white/10 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Services
        </a>
    </div>

    <div class="bg-white/5 backdrop-blur-xl rounded-3xl shadow-lg border border-white/10 p-8 relative z-10 max-w-3xl">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="service_category_id" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Category</label>
                <select name="service_category_id" id="service_category_id" class="w-full bg-navy/40 border border-white/10 rounded-xl py-3 px-4 text-white focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('service_category_id', $service->service_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('service_category_id') <p class="mt-2 text-xs text-red-400 font-medium"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name_en" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Service Name (English)</label>
                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en', $service->name_en) }}" class="w-full bg-navy/40 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-600 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner" required>
                    @error('name_en') <p class="mt-2 text-xs text-red-400 font-medium"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="name_hi" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Service Name (Hindi) - Optional</label>
                    <input type="text" name="name_hi" id="name_hi" value="{{ old('name_hi', $service->name_hi) }}" class="w-full bg-navy/40 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-600 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">
                    @error('name_hi') <p class="mt-2 text-xs text-red-400 font-medium"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="price" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Price - Optional</label>
                    <input type="text" name="price" id="price" value="{{ old('price', $service->price) }}" class="w-full bg-navy/40 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-600 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">
                    @error('price') <p class="mt-2 text-xs text-red-400 font-medium"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="time" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Delivery Time - Optional</label>
                    <input type="text" name="time" id="time" value="{{ old('time', $service->time) }}" class="w-full bg-navy/40 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-600 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner">
                    @error('time') <p class="mt-2 text-xs text-red-400 font-medium"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</p> @enderror
                </div>
            </div>
            
            <div>
                <label for="slug" class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">URL Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $service->slug) }}" class="w-full bg-navy/40 border border-white/10 rounded-xl py-3 px-4 text-white placeholder-gray-600 focus:outline-none focus:border-gold/50 focus:ring-1 focus:ring-gold/50 transition-all text-sm shadow-inner" required>
                @error('slug') <p class="mt-2 text-xs text-red-400 font-medium"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</p> @enderror
            </div>

            <div class="pt-6 border-t border-white/10 flex justify-end">
                <button type="submit" class="bg-gradient-to-r from-gold to-[#bfa03b] hover:from-[#e2b54d] hover:to-[#a88d30] text-navy font-bold py-3 px-8 rounded-xl transition-all shadow-lg shadow-gold/10 hover:shadow-gold/20 flex items-center justify-center gap-2 text-sm uppercase tracking-wider">
                    <i class="fas fa-save mr-1"></i> Update Service
                </button>
            </div>
        </form>
    </div>
@endsection
