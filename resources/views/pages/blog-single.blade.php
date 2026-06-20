@extends('layouts.app')
@section('title', $post['title_hi'] . ' | Foundida Blog')

@section('content')

<!-- BREADCRUMB -->
<div class="bg-navy py-4 border-b border-white/10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 flex-wrap gap-y-1">
                <li><a href="/" class="text-gray-300 hover:text-gold transition flex flex-col"><span class="font-bold leading-tight text-xs">होम</span><span class="text-[9px] uppercase">Home</span></a></li>
                <li><svg class="w-3 h-3 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></li>
                <li><a href="/blog" class="text-gray-300 hover:text-gold transition flex flex-col"><span class="font-bold leading-tight text-xs">Blog</span></a></li>
                <li><svg class="w-3 h-3 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></li>
                <li><span class="text-gold text-xs font-bold truncate max-w-[200px]">{{ $post['title_en'] }}</span></li>
            </ol>
        </nav>
    </div>
</div>

<x-inner-hero>
    <div class="max-w-4xl mx-auto text-left">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                {{ $post['category_label'] }}
            </span>
        </div>
        <h1 class="font-serif text-[28px] md:text-[42px] font-bold text-white leading-tight mb-3">{{ $post['title_hi'] }}</h1>
        <p class="text-[12px] font-bold text-gray-400 uppercase tracking-[0.2em] mb-6">{{ $post['title_en'] }}</p>
        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-400">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-[#f5a623]/20 flex items-center justify-center text-[#f5a623] font-bold text-xs">{{ $post['author_initial'] }}</div>
                <span class="text-white font-semibold">{{ $post['author'] }}</span>
            </div>
            <span>•</span>
            <span>{{ $post['date'] }}</span>
            <span>•</span>
            <span>{{ $post['read_time'] }}</span>
        </div>
    </div>
</x-inner-hero>

<!-- ARTICLE BODY -->
<div class="bg-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Main Content -->
            <div class="lg:col-span-2 prose prose-lg max-w-none">
                <!-- Key Takeaway Box -->
                <div class="bg-navy/5 border-l-4 border-gold rounded-r-2xl p-6 mb-8">
                    <h3 class="text-navy font-bold text-base mb-2 flex items-center gap-2">
                        <span>💡</span> मुख्य बातें — Key Takeaways
                    </h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        @foreach($post['takeaways'] as $point)
                        <li class="flex items-start gap-2"><span class="text-gold font-bold mt-0.5">✓</span> {{ $point }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Article Content -->
                @foreach($post['sections'] as $section)
                <div class="mb-10">
                    <h2 class="text-2xl font-bold text-navy mb-1 font-serif">{{ $section['heading_hi'] }}</h2>
                    <p class="text-[11px] font-bold text-gold uppercase tracking-widest mb-4">{{ $section['heading_en'] }}</p>
                    @if(isset($section['table']))
                    <div class="overflow-x-auto rounded-xl border border-gray-200 mb-4">
                        <table class="w-full text-sm text-left">
                            <thead class="bg-navy text-white">
                                <tr>
                                    @foreach($section['table']['headers'] as $h)
                                    <th class="p-3 font-bold">{{ $h }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($section['table']['rows'] as $row)
                                <tr class="hover:bg-gray-50">
                                    @foreach($row as $cell)
                                    <td class="p-3 text-gray-600">{{ $cell }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    <div class="text-gray-700 leading-relaxed text-[15px] space-y-4">
                        @foreach($section['paragraphs'] as $para)
                        <p>{{ $para }}</p>
                        @endforeach
                    </div>
                </div>
                @endforeach

                <!-- Conclusion -->
                <div class="bg-navy rounded-2xl p-8 text-white">
                    <h3 class="font-serif text-xl font-bold text-gold mb-3">निष्कर्ष — Conclusion</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">{{ $post['conclusion'] }}</p>
                    <div class="mt-6">
                        <a href="/contact" class="inline-block bg-gold text-navy font-extrabold px-6 py-3 rounded-xl hover:bg-yellow-400 transition-all text-sm">
                            मुफ़्त परामर्श लें &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="lg:col-span-1 space-y-6">

                <!-- Author Card -->
                <div class="bg-offwhite border border-gray-100 rounded-2xl p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-full bg-navy flex items-center justify-center text-gold font-bold text-lg">{{ $post['author_initial'] }}</div>
                        <div>
                            <p class="font-bold text-navy text-sm">{{ $post['author'] }}</p>
                            <p class="text-[10px] text-gold uppercase tracking-widest font-bold">{{ $post['author_role'] }}</p>
                        </div>
                    </div>
                    <p class="text-[12px] text-gray-500 leading-relaxed">{{ $post['author_bio'] }}</p>
                </div>

                <!-- CTA Box -->
                <div class="bg-navy rounded-2xl p-6 text-center">
                    <div class="text-3xl mb-3">⚖️</div>
                    <h4 class="text-gold font-bold font-serif text-lg mb-2">Confused about registration?</h4>
                    <p class="text-gray-400 text-xs mb-5">Our experts will help you choose the right structure in a free 15-min call.</p>
                    <a href="/contact" class="block bg-gold text-navy font-extrabold py-3 rounded-xl hover:bg-yellow-400 transition-all text-sm">
                        Free Call Book करें
                    </a>
                </div>

                <!-- Related Posts -->
                <div class="bg-white border border-gray-100 rounded-2xl p-6">
                    <h4 class="font-bold text-navy mb-4 text-sm uppercase tracking-wider">Related Articles</h4>
                    <div class="space-y-4">
                        @foreach($related as $rel)
                        <a href="/blog/{{ $rel['slug'] }}" class="flex gap-3 group">
                            <div class="w-2 h-2 rounded-full bg-gold mt-2 flex-shrink-0 group-hover:scale-125 transition-transform"></div>
                            <div>
                                <p class="text-[13px] font-semibold text-navy group-hover:text-gold transition-colors leading-snug">{{ $rel['title_hi'] }}</p>
                                <p class="text-[10px] text-gray-400 mt-0.5">{{ $rel['read_time'] }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Tags -->
                <div class="bg-white border border-gray-100 rounded-2xl p-6">
                    <h4 class="font-bold text-navy mb-4 text-sm uppercase tracking-wider">Tags</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($post['tags'] as $tag)
                        <span class="bg-navy/5 text-navy text-[11px] font-bold px-3 py-1 rounded-full hover:bg-gold hover:text-navy transition-colors cursor-pointer">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>

            </aside>
        </div>
    </div>
</div>

@endsection
