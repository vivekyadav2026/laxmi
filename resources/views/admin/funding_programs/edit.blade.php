@extends('layouts.admin')

@section('title', (isset($program) ? 'Edit' : 'Add') . ' Funding Program - Admin Panel')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-white font-serif">{{ isset($program) ? 'Edit Funding Program' : 'Add New Funding Program' }}</h1>
        <a href="{{ route('admin.funding-programs.index') }}" class="text-gray-400 hover:text-white text-xs font-bold">← Back to List</a>
    </div>

    <form action="{{ isset($program) ? route('admin.funding-programs.update', $program->id) : route('admin.funding-programs.store') }}" method="POST" enctype="multipart/form-data" class="bg-white/5 backdrop-blur-xl p-8 rounded-3xl border border-white/10 shadow-lg space-y-6">
        @csrf
        @if(isset($program))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Program Name *</label>
                <input type="text" name="name" value="{{ old('name', $program->name ?? '') }}" required class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Organization Name *</label>
                <input type="text" name="organization_name" value="{{ old('organization_name', $program->organization_name ?? '') }}" required class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Funding Amount *</label>
                <input type="text" name="funding_amount" value="{{ old('funding_amount', $program->funding_amount ?? '') }}" placeholder="e.g. ₹50 Lakhs" required class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Country *</label>
                <input type="text" name="country" value="{{ old('country', $program->country ?? 'India') }}" required class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Industry *</label>
                <input type="text" name="industry" value="{{ old('industry', $program->industry ?? '') }}" placeholder="e.g. FinTech, SaaS, Multi-Sector" required class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Funding Type *</label>
                <select name="funding_type" required class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
                    @foreach(['Grant', 'Equity', 'Accelerator', 'Incubator', 'Government', 'Private', 'Angel', 'VC'] as $t)
                        <option value="{{ $t }}" {{ (old('funding_type', $program->funding_type ?? '') == $t) ? 'selected' : '' }}>{{ $t }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Startup Stage *</label>
                <select name="startup_stage" required class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
                    @foreach(['Idea', 'MVP', 'Early Stage', 'Growth', 'Scaling'] as $s)
                        <option value="{{ $s }}" {{ (old('startup_stage', $program->startup_stage ?? '') == $s) ? 'selected' : '' }}>{{ $s }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Application Deadline</label>
                <input type="date" name="application_deadline" value="{{ old('application_deadline', isset($program->application_deadline) ? $program->application_deadline->format('Y-m-d') : '') }}" class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Organization Logo (JPEG/PNG/SVG)</label>
                <input type="file" name="organization_logo" class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2 text-white focus:outline-none focus:border-gold text-sm">
                @if(isset($program) && $program->organization_logo)
                    <div class="mt-2 flex items-center gap-2">
                        <span class="text-xs text-gray-400">Current Logo:</span>
                        <img src="{{ $program->organization_logo }}" class="h-8 rounded border border-white/10 bg-white/5 p-0.5">
                    </div>
                @endif
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Priority (Order of appearance - higher goes first)</label>
                <input type="number" name="priority" value="{{ old('priority', $program->priority ?? 0) }}" class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Official Apply URL</label>
            <input type="url" name="official_apply_url" value="{{ old('official_apply_url', $program->official_apply_url ?? '') }}" class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Short Description *</label>
            <textarea name="short_description" rows="3" required class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">{{ old('short_description', $program->short_description ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Detailed Description (About the Program)</label>
            <textarea name="description" rows="5" class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">{{ old('description', $program->description ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Eligibility Criteria</label>
            <textarea name="eligibility" rows="3" class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">{{ old('eligibility', $program->eligibility ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Required Documents</label>
            <textarea name="required_documents" rows="3" placeholder="e.g. Pitch Deck, Registration Certificate, Financial Projections" class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">{{ old('required_documents', $program->required_documents ?? '') }}</textarea>
        </div>

        <!-- SEO Settings -->
        <div class="border-t border-white/10 pt-6">
            <h3 class="text-lg font-bold text-white font-serif mb-4">SEO Settings (Optional)</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">SEO Title</label>
                    <input type="text" name="seo_title" value="{{ old('seo_title', $program->seo_title ?? '') }}" class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">SEO Description</label>
                    <textarea name="seo_description" rows="2" class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">{{ old('seo_description', $program->seo_description ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Meta Keywords (Comma separated)</label>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $program->meta_keywords ?? '') }}" placeholder="e.g. startup, funding, grant, tech" class="w-full bg-navy/60 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-gold text-sm">
                </div>
            </div>
        </div>

        <div class="flex items-center gap-6 border-t border-white/10 pt-4">
            <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-gray-300">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $program->is_featured ?? false) ? 'checked' : '' }} class="rounded border-white/20 text-gold focus:ring-0">
                Mark Featured
            </label>

            <div class="flex-1 flex items-center gap-2 justify-end">
                <span class="text-xs text-gray-400">Status:</span>
                <select name="status" class="bg-navy/60 border border-white/10 rounded-xl px-3 py-1.5 text-white text-xs">
                    <option value="active" {{ (old('status', $program->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ (old('status', $program->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
                    <option value="expired" {{ (old('status', $program->status ?? '') == 'expired') ? 'selected' : '' }}>Expired</option>
                </select>
            </div>
        </div>

        <div class="pt-4 border-t border-white/10 text-right">
            <button type="submit" class="bg-gold text-navy px-8 py-3 rounded-xl font-bold text-sm hover:bg-gold-light transition-all">
                Save Opportunity
            </button>
        </div>
    </form>
</div>
@endsection
