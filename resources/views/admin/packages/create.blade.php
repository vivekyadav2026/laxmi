@extends('layouts.admin')

@section('title', 'Create Package - Admin Panel')

@section('content')
    <div class="mb-8 relative z-10">
        <a href="{{ route('admin.packages.index') }}" class="text-xs text-gold hover:text-white transition-colors inline-flex items-center gap-1 mb-3">
            <i class="fas fa-arrow-left"></i> Back to Packages
        </a>
        <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Create New Package</h1>
        <p class="text-sm text-gray-400">Configure a new Legal or Tech combo package with details and comparison features.</p>
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

    <div x-data="{ type: '{{ old('type', 'legal') }}' }" class="bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 p-6 md:p-8 max-w-3xl relative z-10 shadow-2xl">
        <form action="{{ route('admin.packages.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- English Name -->
                <div>
                    <label for="name_en" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Package Name (English)</label>
                    <input type="text" name="name_en" id="name_en" required value="{{ old('name_en') }}" placeholder="e.g. Starter" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                </div>

                <!-- Hindi Name -->
                <div>
                    <label for="name_hi" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Package Name (Hindi)</label>
                    <input type="text" name="name_hi" id="name_hi" required value="{{ old('name_hi') }}" placeholder="e.g. स्टार्टर" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Package Slug (Unique URL)</label>
                    <input type="text" name="slug" id="slug" required value="{{ old('slug') }}" placeholder="e.g. legal-starter" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors font-mono">
                </div>

                <!-- Type -->
                <div>
                    <label for="type" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Package Type</label>
                    <select name="type" id="type" required x-model="type" class="w-full bg-navy/90 border border-white/10 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-gold transition-colors">
                        <option value="legal">Legal (Registration & Compliance)</option>
                        <option value="tech">Tech (Website, App & Media)</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Price -->
                <div>
                    <label for="price" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Selling Price (INR)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm">₹</span>
                        <input type="number" name="price" id="price" required min="0" value="{{ old('price') }}" placeholder="e.g. 2499" class="w-full bg-white/5 border border-white/10 rounded-xl pl-8 pr-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                    </div>
                </div>

                <!-- Old Price -->
                <div>
                    <label for="old_price" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Original Price (INR - Optional, for Save calculation)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm">₹</span>
                        <input type="number" name="old_price" id="old_price" min="0" value="{{ old('old_price') }}" placeholder="e.g. 2999" class="w-full bg-white/5 border border-white/10 rounded-xl pl-8 pr-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Description English -->
                <div>
                    <label for="description_en" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">English Description</label>
                    <input type="text" name="description_en" id="description_en" value="{{ old('description_en') }}" placeholder="e.g. For early-stage founders" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                </div>

                <!-- Description Hindi -->
                <div>
                    <label for="description_hi" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Hindi Description</label>
                    <input type="text" name="description_hi" id="description_hi" value="{{ old('description_hi') }}" placeholder="e.g. शुरुआती संस्थापकों के लिए" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Badge English -->
                <div>
                    <label for="badge_en" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Badge (English - Optional)</label>
                    <input type="text" name="badge_en" id="badge_en" value="{{ old('badge_en') }}" placeholder="e.g. Most Popular" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                </div>

                <!-- Badge Hindi -->
                <div>
                    <label for="badge_hi" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Badge (Hindi - Optional)</label>
                    <input type="text" name="badge_hi" id="badge_hi" value="{{ old('badge_hi') }}" placeholder="e.g. सबसे लोकप्रिय" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Sort Order (Sequence)</label>
                    <input type="number" name="sort_order" id="sort_order" required min="0" value="{{ old('sort_order', 0) }}" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                </div>
            </div>

            <!-- Features -->
            <div>
                <label for="features" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Package Features (Write one feature per line)</label>
                <textarea name="features" id="features" required rows="6" placeholder="e.g.&#10;Company Registration (Sole Prop)&#10;GST Registration&#10;Business Email (1 User)&#10;Custom Logo Design" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors leading-relaxed">{{ old('features') }}</textarea>
                <p class="text-[10px] text-gray-500 mt-1.5"><i class="fas fa-info-circle"></i> Put each benefit/feature on a fresh line. Avoid blank lines.</p>
            </div>

            <!-- Comparison Features (Only for Legal) -->
            <div x-show="type === 'legal'" x-transition class="border-t border-white/10 pt-6 space-y-6">
                <h3 class="text-md font-bold text-gold uppercase tracking-wider mb-4"><i class="fas fa-balance-scale mr-2"></i> Comparison Matrix Features</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="comp_company_reg" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Company Registration Status</label>
                        <input type="text" name="comp_company_reg" id="comp_company_reg" value="{{ old('comp_company_reg', '✓') }}" placeholder="e.g. ✓, ✓ (Pvt Ltd), ✗" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                    </div>

                    <div>
                        <label for="comp_gst_reg" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">GST Registration Status</label>
                        <input type="text" name="comp_gst_reg" id="comp_gst_reg" value="{{ old('comp_gst_reg', '✓') }}" placeholder="e.g. ✓, ✗" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="comp_trademark" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Trademark Status</label>
                        <input type="text" name="comp_trademark" id="comp_trademark" value="{{ old('comp_trademark', '✗') }}" placeholder="e.g. ✓, ✓ + Copyright, ✗" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                    </div>

                    <div>
                        <label for="comp_website" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Website Support</label>
                        <input type="text" name="comp_website" id="comp_website" value="{{ old('comp_website', '✗') }}" placeholder="e.g. 5 Pages, Full Custom, ✗" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="comp_mobile_app" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Mobile App Status</label>
                        <input type="text" name="comp_mobile_app" id="comp_mobile_app" value="{{ old('comp_mobile_app', '✗') }}" placeholder="e.g. Android, ✗" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                    </div>

                    <div>
                        <label for="comp_ecommerce" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">E-commerce Integration</label>
                        <input type="text" name="comp_ecommerce" id="comp_ecommerce" value="{{ old('comp_ecommerce', '✗') }}" placeholder="e.g. ✓, ✗" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                    </div>

                    <div>
                        <label for="comp_support" class="block text-xs font-bold text-gray-400 mb-2 uppercase tracking-wider">Customer Support</label>
                        <input type="text" name="comp_support" id="comp_support" value="{{ old('comp_support', 'Email') }}" placeholder="e.g. Email, Priority, Dedicated Manager" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-gold transition-colors">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-8 pt-2">
                <!-- Popular Checkbox -->
                <label class="flex items-center gap-3 cursor-pointer select-none">
                    <input type="checkbox" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }} class="w-4.5 h-4.5 rounded border-white/10 bg-white/5 text-gold focus:ring-0 focus:ring-offset-0">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Highlight as Popular</span>
                </label>

                <!-- Active Checkbox -->
                <label class="flex items-center gap-3 cursor-pointer select-none">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-4.5 h-4.5 rounded border-white/10 bg-white/5 text-gold focus:ring-0 focus:ring-offset-0">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Package is Active & Visible</span>
                </label>
            </div>

            <!-- Submit Buttons -->
            <div class="pt-6 border-t border-white/5 flex items-center justify-end gap-4">
                <a href="{{ route('admin.packages.index') }}" class="px-5 py-3 bg-white/5 border border-white/10 hover:bg-white/10 text-gray-400 hover:text-white text-xs font-bold rounded-xl transition-all">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-gold text-navy font-bold text-xs rounded-xl hover:bg-gold/90 transition-all shadow-lg shadow-gold/20">
                    Save Package
                </button>
            </div>
        </form>
    </div>

    <script>
        // Automatic Slug Generation
        document.addEventListener('DOMContentLoaded', function () {
            const nameInput = document.getElementById('name_en');
            const slugInput = document.getElementById('slug');
            const typeSelect = document.getElementById('type');

            function updateSlug() {
                const prefix = typeSelect.value + '-';
                let slugValue = nameInput.value
                    .toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '') // remove special characters
                    .replace(/\s+/g, '-')        // replace spaces with dashes
                    .replace(/-+/g, '-');        // replace multiple dashes with single
                
                if (slugValue && !slugValue.startsWith(prefix)) {
                    slugValue = prefix + slugValue;
                }
                slugInput.value = slugValue;
            }

            nameInput.addEventListener('input', updateSlug);
            typeSelect.addEventListener('change', updateSlug);
        });
    </script>
@endsection
