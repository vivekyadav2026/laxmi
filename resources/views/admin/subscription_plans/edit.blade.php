@extends('layouts.admin')

@section('title', 'Edit Subscription Plan - Admin Panel')

@section('content')
    <div class="mb-8 relative z-10">
        <a href="{{ route('admin.subscription_plans.index') }}" class="text-xs text-gold hover:text-white transition-colors inline-flex items-center gap-1 mb-3">
            <i class="fas fa-arrow-left"></i> Back to Subscription Plans
        </a>
        <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Edit Plan: {{ $plan->name }}</h1>
        <p class="text-sm text-gray-400 font-medium">Update pricing details, feature items, or visibility preferences.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-2xl relative z-10 animate-fadeIn">
            <h4 class="font-bold text-sm mb-1.5 flex items-center gap-2">
                <i class="fas fa-exclamation-circle"></i> Please fix the following errors:
            </h4>
            <ul class="list-disc pl-5 text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 p-6 md:p-8 max-w-3xl relative z-10 shadow-2xl">
        <form action="{{ route('admin.subscription_plans.update', $plan->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Plan Name</label>
                    <input type="text" name="name" id="name" required value="{{ old('name', $plan->name) }}" placeholder="e.g. Monthly Plan" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Plan Slug (Unique URL Segment)</label>
                    <input type="text" name="slug" id="slug" required value="{{ old('slug', $plan->slug) }}" placeholder="e.g. monthly" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Price -->
                <div>
                    <label for="price" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Price (INR)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm">₹</span>
                        <input type="number" name="price" id="price" required min="0" value="{{ old('price', $plan->price) }}" placeholder="e.g. 999" class="w-full bg-white/5 border border-white/10 rounded-xl pl-8 pr-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                    </div>
                </div>

                <!-- Billing Period -->
                <div>
                    <label for="billing_period" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Billing Period</label>
                    <select name="billing_period" id="billing_period" required class="w-full bg-navy/90 border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-gold transition-colors">
                        <option value="month" {{ old('billing_period', $plan->billing_period) == 'month' ? 'selected' : '' }}>Per Month</option>
                        <option value="year" {{ old('billing_period', $plan->billing_period) == 'year' ? 'selected' : '' }}>Per Year</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Plan Subtitle / Tagline (Optional)</label>
                    <input type="text" name="description" id="description" value="{{ old('description', $plan->description) }}" placeholder="e.g. Flexibility to Grow" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                </div>

                <!-- Badge -->
                <div>
                    <label for="badge" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Marketing Badge (Optional)</label>
                    <input type="text" name="badge" id="badge" value="{{ old('badge', $plan->badge) }}" placeholder="e.g. Most Popular, Best Value" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                </div>
            </div>

            <!-- Features -->
            <div>
                <label for="features" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Plan Features (Write one feature per line)</label>
                <textarea name="features" id="features" required rows="6" placeholder="e.g.&#10;1 Monthly Mentorship Call&#10;Basic Pitch Deck Review&#10;Loan Application Support" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors leading-relaxed">{{ old('features', is_array($plan->features) ? implode("\n", $plan->features) : '') }}</textarea>
                <p class="text-[10px] text-gray-500 mt-1.5"><i class="fas fa-info-circle"></i> Put each benefit/feature on a fresh line. Avoid blank lines.</p>
            </div>

            <div class="flex items-center gap-8 pt-2">
                <!-- Popular Checkbox -->
                <label class="flex items-center gap-3 cursor-pointer select-none">
                    <input type="checkbox" name="is_popular" value="1" {{ old('is_popular', $plan->is_popular) ? 'checked' : '' }} class="w-4.5 h-4.5 rounded border-white/10 bg-white/5 text-gold focus:ring-0 focus:ring-offset-0">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Highlight as Popular (Dark Theme)</span>
                </label>

                <!-- Active Checkbox -->
                <label class="flex items-center gap-3 cursor-pointer select-none">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $plan->is_active) ? 'checked' : '' }} class="w-4.5 h-4.5 rounded border-white/10 bg-white/5 text-gold focus:ring-0 focus:ring-offset-0">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Plan is Active & Visible</span>
                </label>
            </div>

            <!-- Submit Buttons -->
            <div class="pt-6 border-t border-white/5 flex items-center justify-end gap-4">
                <a href="{{ route('admin.subscription_plans.index') }}" class="px-5 py-3 bg-white/5 border border-white/10 hover:bg-white/10 text-gray-400 hover:text-white text-xs font-bold rounded-xl transition-all">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-gold text-navy font-bold text-xs rounded-xl hover:bg-gold/90 transition-all shadow-lg shadow-gold/20">
                    Update Subscription Plan
                </button>
            </div>
        </form>
    </div>
@endsection
