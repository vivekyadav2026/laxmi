@extends('layouts.admin')

@section('title', 'Edit Blog Post - Admin Panel')

@section('content')
    <div class="mb-8 relative z-10">
        <a href="{{ route('admin.blogs.index') }}" class="text-xs text-gray-400 hover:text-gold transition-colors font-bold uppercase tracking-wider flex items-center gap-2 mb-3">
            <i class="fas fa-arrow-left"></i> Back to Listing
        </a>
        <h1 class="text-3xl font-extrabold text-white font-serif drop-shadow-md">Edit Blog Post</h1>
        <p class="text-sm text-gray-400">Edit the selected blog post details and content.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-5 bg-red-500/10 border border-red-500/20 text-red-400 rounded-2xl relative z-10">
            <h4 class="font-bold text-sm mb-2 flex items-center gap-2">
                <i class="fas fa-exclamation-circle"></i> Please correct the following errors:
            </h4>
            <ul class="list-disc pl-5 text-xs space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blogs.update', $post->id) }}" method="POST" class="relative z-10" x-data="{ 
        tab: 'basic',
        titleEn: '{{ old('title_en', $post->title_en) }}',
        slug: '{{ old('slug', $post->slug) }}'
    }">
        @csrf
        @method('PUT')

        <!-- TABS NAV -->
        <div class="flex border-b border-white/10 mb-8 overflow-x-auto scrollbar-hide gap-2">
            <button type="button" @click="tab = 'basic'" :class="tab === 'basic' ? 'border-gold text-gold font-bold' : 'border-transparent text-gray-400 hover:text-white'" class="border-b-2 px-4 py-3.5 text-xs uppercase tracking-wider whitespace-nowrap transition-colors font-semibold">
                1. Basic Details
            </button>
            <button type="button" @click="tab = 'author'" :class="tab === 'author' ? 'border-gold text-gold font-bold' : 'border-transparent text-gray-400 hover:text-white'" class="border-b-2 px-4 py-3.5 text-xs uppercase tracking-wider whitespace-nowrap transition-colors font-semibold">
                2. Author Info
            </button>
            <button type="button" @click="tab = 'content'" :class="tab === 'content' ? 'border-gold text-gold font-bold' : 'border-transparent text-gray-400 hover:text-white'" class="border-b-2 px-4 py-3.5 text-xs uppercase tracking-wider whitespace-nowrap transition-colors font-semibold">
                3. Article Content
            </button>
        </div>

        <!-- TAB 1: BASIC DETAILS -->
        <div x-show="tab === 'basic'" class="space-y-6">
            <div class="bg-white/5 border border-white/10 rounded-3xl p-6 md:p-8 space-y-6">
                <h3 class="text-lg font-bold text-white font-serif border-b border-white/5 pb-3">Basic Settings</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title EN -->
                    <div class="flex flex-col">
                        <label for="title_en" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Title (English) <span class="text-red-500">*</span></label>
                        <input type="text" name="title_en" id="title_en" x-model="titleEn" required
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                            placeholder="e.g. How to Register a Trademark in India">
                    </div>

                    <!-- Title HI -->
                    <div class="flex flex-col">
                        <label for="title_hi" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Title (Hindi) <span class="text-red-500">*</span></label>
                        <input type="text" name="title_hi" id="title_hi" value="{{ old('title_hi', $post->title_hi) }}" required
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                            placeholder="e.g. ट्रेडमार्क कैसे रजिस्टर करें? पूरी जानकारी">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Slug -->
                    <div class="flex flex-col">
                        <label for="slug" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Slug (URL Identifier) <span class="text-red-500">*</span></label>
                        <input type="text" name="slug" id="slug" x-model="slug" required
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm font-mono">
                        <span class="text-[10px] text-gray-500 mt-1.5 font-mono">URL path: /blog/{{ $post->slug }}</span>
                    </div>

                    <!-- Category -->
                    <div class="flex flex-col">
                        <label for="category" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Category <span class="text-red-500">*</span></label>
                        <select name="category" id="category" required
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm [&>option]:bg-navy [&>option]:text-white">
                            <option value="">Select a Category</option>
                            <option value="legal" {{ old('category', $post->category) === 'legal' ? 'selected' : '' }}>LEGAL</option>
                            <option value="gst" {{ old('category', $post->category) === 'gst' ? 'selected' : '' }}>GST / TAX</option>
                            <option value="trademark" {{ old('category', $post->category) === 'trademark' ? 'selected' : '' }}>TRADEMARK</option>
                            <option value="tech" {{ old('category', $post->category) === 'tech' ? 'selected' : '' }}>TECH</option>
                            <option value="startup" {{ old('category', $post->category) === 'startup' ? 'selected' : '' }}>STARTUP</option>
                            <option value="compliance" {{ old('category', $post->category) === 'compliance' ? 'selected' : '' }}>COMPLIANCE</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Publication Date -->
                    <div class="flex flex-col">
                        <label for="date" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Publication Date <span class="text-red-500">*</span></label>
                        <input type="text" name="date" id="date" value="{{ old('date', $post->date) }}" required
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                            placeholder="e.g. June 25, 2026">
                    </div>

                    <!-- Read Time -->
                    <div class="flex flex-col">
                        <label for="read_time" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Read Time <span class="text-red-500">*</span></label>
                        <input type="text" name="read_time" id="read_time" value="{{ old('read_time', $post->read_time) }}" required
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                            placeholder="e.g. 6 min read">
                    </div>
                </div>

                <!-- Excerpt -->
                <div class="flex flex-col">
                    <label for="excerpt" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Excerpt (Summary) <span class="text-red-500">*</span></label>
                    <textarea name="excerpt" id="excerpt" rows="3" required
                        class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm resize-none"
                        placeholder="A short summary shown on the blog index cards...">{{ old('excerpt', $post->excerpt) }}</textarea>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="button" @click="tab = 'author'" class="bg-white/10 hover:bg-white/15 text-white px-6 py-3 rounded-xl text-sm font-bold transition-all">
                    Next Section: Author Details &rarr;
                </button>
            </div>
        </div>

        <!-- TAB 2: AUTHOR DETAILS -->
        <div x-show="tab === 'author'" class="space-y-6" style="display: none;">
            <div class="bg-white/5 border border-white/10 rounded-3xl p-6 md:p-8 space-y-6">
                <h3 class="text-lg font-bold text-white font-serif border-b border-white/5 pb-3">Author Details</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Author Name -->
                    <div class="flex flex-col">
                        <label for="author" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Author Name <span class="text-red-500">*</span></label>
                        <input type="text" name="author" id="author" value="{{ old('author', $post->author) }}" required
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm">
                    </div>

                    <!-- Author Designation -->
                    <div class="flex flex-col">
                        <label for="author_role" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Author Designation / Title <span class="text-red-500">*</span></label>
                        <input type="text" name="author_role" id="author_role" value="{{ old('author_role', $post->author_role) }}" required
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm">
                    </div>
                </div>

                <!-- Author Bio -->
                <div class="flex flex-col">
                    <label for="author_bio" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Author Biography <span class="text-red-500">*</span></label>
                    <textarea name="author_bio" id="author_bio" rows="3" required
                        class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm resize-none"
                        placeholder="A short professional profile about the author...">{{ old('author_bio', $post->author_bio) }}</textarea>
                </div>
            </div>

            <div class="flex justify-between">
                <button type="button" @click="tab = 'basic'" class="bg-white/5 hover:bg-white/10 text-gray-300 px-6 py-3 rounded-xl text-sm font-bold transition-all">
                    &larr; Previous
                </button>
                <button type="button" @click="tab = 'content'" class="bg-white/10 hover:bg-white/15 text-white px-6 py-3 rounded-xl text-sm font-bold transition-all">
                    Next Section: Article Content &rarr;
                </button>
            </div>
        </div>

        <!-- TAB 3: ARTICLE CONTENT -->
        <div x-show="tab === 'content'" class="space-y-6" style="display: none;">
            
            <!-- Key Takeaways & Tags -->
            <div class="bg-white/5 border border-white/10 rounded-3xl p-6 md:p-8 space-y-6">
                <h3 class="text-lg font-bold text-white font-serif border-b border-white/5 pb-3">Highlights & Metadata</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Key Takeaways -->
                    <div class="flex flex-col">
                        <label for="takeaways" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Key Takeaways <span class="text-red-500">*</span></label>
                        <textarea name="takeaways" id="takeaways" rows="4" required
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                            placeholder="Enter each point on a new line...">{{ old('takeaways', implode("\n", $post->takeaways ?? [])) }}</textarea>
                        <span class="text-[10px] text-gray-500 mt-1.5">Place each point on its own line. They will render as checkmark lists.</span>
                    </div>

                    <!-- Tags -->
                    <div class="flex flex-col">
                        <label for="tags" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Tags <span class="text-red-500">*</span></label>
                        <textarea name="tags" id="tags" rows="4" required
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                            placeholder="e.g. Company Registration, Pvt Ltd, LLP, Startup">{{ old('tags', implode(', ', $post->tags ?? [])) }}</textarea>
                        <span class="text-[10px] text-gray-500 mt-1.5">Enter a list of tags separated by commas.</span>
                    </div>
                </div>
            </div>

            <!-- Content Sections -->
            @for ($i = 1; $i <= 3; $i++)
                @php
                    $sect = $post->sections[$i - 1] ?? null;
                    $sectHeadingHi = $sect['heading_hi'] ?? '';
                    $sectHeadingEn = $sect['heading_en'] ?? '';
                    $sectParagraphs = implode("\n", $sect['paragraphs'] ?? []);
                    
                    $hasTable = isset($sect['table']);
                    $tableHeaders = implode(', ', $sect['table']['headers'] ?? []);
                    $tableRows = '';
                    if (isset($sect['table']['rows'])) {
                        $rows = [];
                        foreach ($sect['table']['rows'] as $r) {
                            $rows[] = implode(', ', $r);
                        }
                        $tableRows = implode("\n", $rows);
                    }
                @endphp
                <div class="bg-white/5 border border-white/10 rounded-3xl p-6 md:p-8 space-y-6" x-data="{ hasTable: {{ $hasTable ? 'true' : 'false' }} }">
                    <div class="flex items-center justify-between border-b border-white/5 pb-3">
                        <h3 class="text-lg font-bold text-white font-serif">Section {{ $i }} Content</h3>
                        <label class="flex items-center gap-2 cursor-pointer select-none text-xs font-bold text-gray-400 uppercase tracking-wider">
                            <input type="checkbox" x-model="hasTable" class="w-4 h-4 rounded border-white/10 bg-white/5 text-gold focus:ring-0 focus:ring-offset-0">
                            Include Table
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Heading HI -->
                        <div class="flex flex-col">
                            <label for="section_{{ $i }}_heading_hi" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Section {{ $i }} Heading (Hindi) {{ $i === 1 ? '*' : '' }}</label>
                            <input type="text" name="section_{{ $i }}_heading_hi" id="section_{{ $i }}_heading_hi" value="{{ old('section_' . $i . '_heading_hi', $sectHeadingHi) }}" {{ $i === 1 ? 'required' : '' }}
                                class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                                placeholder="e.g. 1. प्राइवेट लिमिटेड कंपनी क्या है?">
                        </div>

                        <!-- Heading EN -->
                        <div class="flex flex-col">
                            <label for="section_{{ $i }}_heading_en" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Section {{ $i }} Heading (English) {{ $i === 1 ? '*' : '' }}</label>
                            <input type="text" name="section_{{ $i }}_heading_en" id="section_{{ $i }}_heading_en" value="{{ old('section_' . $i . '_heading_en', $sectHeadingEn) }}" {{ $i === 1 ? 'required' : '' }}
                                class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                                placeholder="e.g. What is a Private Limited Company?">
                        </div>
                    </div>

                    <!-- Paragraphs -->
                    <div class="flex flex-col">
                        <label for="section_{{ $i }}_paragraphs" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Section {{ $i }} Paragraphs {{ $i === 1 ? '*' : '' }}</label>
                        <textarea name="section_{{ $i }}_paragraphs" id="section_{{ $i }}_paragraphs" rows="5" {{ $i === 1 ? 'required' : '' }}
                            class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                            placeholder="Enter paragraph text. Press Enter for new paragraphs...">{{ old('section_' . $i . '_paragraphs', $sectParagraphs) }}</textarea>
                        <span class="text-[10px] text-gray-500 mt-1.5">Separate distinct paragraphs using line breaks.</span>
                    </div>

                    <!-- Custom Table Inputs -->
                    <div x-show="hasTable" class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-white/5" style="display: none;">
                        <div class="flex flex-col">
                            <label for="section_{{ $i }}_table_headers" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Table Headers</label>
                            <input type="text" name="section_{{ $i }}_table_headers" id="section_{{ $i }}_table_headers" value="{{ old('section_' . $i . '_table_headers', $tableHeaders) }}"
                                class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                                placeholder="e.g. Factor, Pvt Ltd, LLP, OPC">
                            <span class="text-[10px] text-gray-500 mt-1.5">Enter headers separated by commas.</span>
                        </div>

                        <div class="flex flex-col">
                            <label for="section_{{ $i }}_table_rows" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Table Rows</label>
                            <textarea name="section_{{ $i }}_table_rows" id="section_{{ $i }}_table_rows" rows="3"
                                class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                                placeholder="e.g. Min Members, 2, 2, 1&#10;Liability, Limited, Limited, Limited">{{ old('section_' . $i . '_table_rows', $tableRows) }}</textarea>
                            <span class="text-[10px] text-gray-500 mt-1.5">Write each row on a new line with cells separated by commas.</span>
                        </div>
                    </div>
                </div>
            @endfor

            <!-- Conclusion -->
            <div class="bg-white/5 border border-white/10 rounded-3xl p-6 md:p-8 space-y-6">
                <h3 class="text-lg font-bold text-white font-serif border-b border-white/5 pb-3">Conclusion</h3>
                
                <!-- Conclusion Text -->
                <div class="flex flex-col">
                    <label for="conclusion" class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Conclusion Text <span class="text-red-500">*</span></label>
                    <textarea name="conclusion" id="conclusion" rows="4" required
                        class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold text-sm"
                        placeholder="A closing summary or call to action for this article...">{{ old('conclusion', $post->conclusion) }}</textarea>
                </div>
            </div>

            <!-- Submit actions -->
            <div class="flex justify-between items-center pt-4">
                <button type="button" @click="tab = 'author'" class="bg-white/5 hover:bg-white/10 text-gray-300 px-6 py-3 rounded-xl text-sm font-bold transition-all">
                    &larr; Previous Section
                </button>
                
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.blogs.index') }}" class="bg-white/5 hover:bg-white/10 text-white px-6 py-3 rounded-xl text-sm font-bold transition-all">
                        Cancel
                    </a>
                    <button type="submit" class="bg-gradient-to-r from-gold to-[#a88d30] text-navy px-8 py-3 rounded-xl text-sm font-extrabold hover:from-[#e2b54d] hover:to-[#c6a83d] transition-all shadow-lg shadow-gold/20 hover:shadow-gold/40 hover:-translate-y-0.5">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
