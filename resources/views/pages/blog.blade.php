@extends('layouts.app')
@section('title', 'Legal & Tech Tips Blog | Foundida')

@section('content')

<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                LEGAL & TECH TIPS FOR INDIAN STARTUPS
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[52px] font-bold text-white leading-tight mb-4">
            <span class="text-[#f5a623]">ज्ञान</span>, विचार, और सफलता
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed max-w-[600px] mx-auto">
            Simple articles in Hindi & English on company law, GST, trademarks, and digital business — written by experts, not bots.
        </p>
    </div>
</x-inner-hero>

<!-- FILTER TABS -->
<div class="bg-white border-b border-gray-200 sticky top-0 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex space-x-1 overflow-x-auto py-3 scrollbar-hide" id="blog-filters">
            @php
            $tabs = [
                ['id'=>'all','hi'=>'सभी','en'=>'All'],
                ['id'=>'legal','hi'=>'कानूनी','en'=>'Legal'],
                ['id'=>'gst','hi'=>'GST / Tax','en'=>'GST / Tax'],
                ['id'=>'trademark','hi'=>'ट्रेडमार्क','en'=>'Trademark'],
                ['id'=>'tech','hi'=>'टेक','en'=>'Tech'],
                ['id'=>'startup','hi'=>'स्टार्टअप','en'=>'Startup'],
                ['id'=>'compliance','hi'=>'Compliance','en'=>'Compliance'],
            ];
            @endphp
            @foreach($tabs as $i => $tab)
            <button onclick="filterBlog('{{ $tab['id'] }}')"
                id="tab-{{ $tab['id'] }}"
                class="flex-shrink-0 flex flex-col items-center px-5 py-2 rounded-xl text-[11px] font-bold transition-all {{ $i === 0 ? 'bg-navy text-white' : 'text-gray-500 hover:text-navy hover:bg-gray-100' }}">
                <span class="font-bold">{{ $tab['hi'] }}</span>
                <span class="text-[9px] uppercase tracking-wider {{ $i === 0 ? 'text-gray-300' : 'text-gray-400' }}">{{ $tab['en'] }}</span>
            </button>
            @endforeach
        </div>
    </div>
</div>

@php
    $featuredPost = $posts->first();
@endphp

@if($featuredPost)
<div class="bg-offwhite py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-shadow">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="h-64 lg:h-auto bg-gradient-to-br from-navy to-blue-900 flex items-center justify-center relative overflow-hidden p-12">
                    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 20px 20px;"></div>
                    <div class="text-center relative z-10">
                        <div class="text-[72px] mb-4">
                            @if(($featuredPost->category ?? $featuredPost['category']) === 'legal') ⚖️
                            @elseif(($featuredPost->category ?? $featuredPost['category']) === 'gst') 💵
                            @elseif(($featuredPost->category ?? $featuredPost['category']) === 'trademark') 🏷️
                            @elseif(($featuredPost->category ?? $featuredPost['category']) === 'tech') 💻
                            @elseif(($featuredPost->category ?? $featuredPost['category']) === 'startup') 🚀
                            @elseif(($featuredPost->category ?? $featuredPost['category']) === 'compliance') 📋
                            @else 📝
                            @endif
                        </div>
                        <div class="bg-gold text-navy text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full inline-block">FEATURED</div>
                    </div>
                </div>
                <div class="p-10 flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="{{ $featuredPost->badge_class ?? $featuredPost['badge_class'] ?? 'bg-navy/5 text-navy' }} text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">
                            {{ $featuredPost->category_label ?? $featuredPost['category_label'] ?? strtoupper($featuredPost->category ?? $featuredPost['category']) }}
                        </span>
                        <span class="text-[11px] text-gray-400">{{ $featuredPost->date ?? $featuredPost['date'] }} · {{ $featuredPost->read_time ?? $featuredPost['read_time'] }}</span>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-bold text-navy font-serif mb-4 group-hover:text-gold transition-colors leading-snug">
                        {{ $featuredPost->title_hi ?? $featuredPost['title_hi'] ?? $featuredPost->title_en ?? $featuredPost['title_en'] }}
                    </h2>
                    <p class="text-[13px] text-gray-500 mb-6 leading-relaxed">
                        {{ $featuredPost->excerpt ?? $featuredPost['excerpt'] }}
                    </p>
                    <a href="/blog/{{ $featuredPost->slug ?? $featuredPost['slug'] }}" class="inline-flex items-center font-bold text-gold hover:text-navy transition-colors text-sm">
                        पूरा पढ़ें — Read Full Article <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- BLOG GRID -->
<div class="bg-offwhite pb-20" id="blog-grid">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">

            @foreach($posts->skip($featuredPost ? 1 : 0) as $post)
            @php
                $colorClass = 'bg-navy';
                $postColor = $post->color ?? $post['color'] ?? '';
                if ($postColor === 'yellow' || $postColor === 'gold') {
                    $colorClass = 'bg-gold';
                } elseif ($postColor === 'purple') {
                    $colorClass = 'bg-purple-600';
                } elseif ($postColor === 'green') {
                    $colorClass = 'bg-green-600';
                } elseif ($postColor === 'orange') {
                    $colorClass = 'bg-orange-500';
                } elseif ($postColor === 'red') {
                    $colorClass = 'bg-red-500';
                } elseif ($postColor === 'blue') {
                    $colorClass = 'bg-navy';
                }
            @endphp
            <article data-category="{{ $post->category ?? $post['category'] }}" class="blog-card bg-white border border-gray-100 rounded-2xl overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all group flex flex-col">
                <div class="h-[4px] md:h-[6px] {{ $colorClass }} w-full"></div>
                <div class="blog-card-inner p-4 md:p-8 flex flex-col flex-grow">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-[9px] md:text-[10px] font-bold uppercase tracking-widest px-2 md:px-3 py-1 rounded-full {{ $post->badge_class ?? $post['badge_class'] ?? 'bg-navy/5 text-navy' }}">{{ $post->category_label ?? $post['category_label'] ?? strtoupper($post->category ?? $post['category']) }}</span>
                        <span class="text-[10px] text-gray-400 hidden sm:block">{{ $post->read_time ?? $post['read_time'] }}</span>
                    </div>
                    <h3 class="text-[13px] md:text-[18px] font-bold text-navy mb-1 md:mb-3 group-hover:text-gold transition-colors leading-snug">{{ $post->title_hi ?? $post['title_hi'] ?? $post->title_en ?? $post['title_en'] }}</h3>
                    <p class="text-[10px] md:text-[12px] uppercase font-bold text-gray-400 tracking-wider mb-2 md:mb-3 hidden md:block">{{ $post->title_en ?? $post['title_en'] }}</p>
                    <p class="text-[11px] md:text-[13px] text-gray-500 mb-3 md:mb-6 flex-grow leading-relaxed hidden md:block">{{ $post->excerpt ?? $post['excerpt'] }}</p>
                    <div class="flex items-center justify-between border-t border-gray-100 pt-3 mt-auto">
                        <div class="flex items-center gap-1 md:gap-2">
                            <div class="w-5 h-5 md:w-7 md:h-7 rounded-full bg-navy/10 flex items-center justify-center text-navy font-bold text-[10px]">{{ $post->author_initial ?? $post['author_initial'] }}</div>
                            <span class="text-[10px] md:text-[11px] font-bold text-navy hidden sm:block">{{ $post->author ?? $post['author'] }}</span>
                        </div>
                        <a href="/blog/{{ $post->slug ?? $post['slug'] }}" class="text-[10px] text-gold font-bold uppercase tracking-wider flex items-center gap-1">
                            Read <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach

        </div>

        <!-- LOAD MORE -->
        <div class="text-center mt-16">
            <button class="border-2 border-navy text-navy font-bold px-10 py-3 rounded-xl hover:bg-navy hover:text-white transition-all">
                और लेख देखें — Load More
            </button>
        </div>
    </div>
</div>

<!-- NEWSLETTER CTA -->
<div class="bg-navy py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="text-2xl md:text-3xl font-bold text-gold font-serif mb-3">साप्ताहिक Legal & Tech Tips</h2>
        <p class="text-gray-400 text-sm mb-8">Every week, one practical tip in Hindi about GST, company law, or digital business — directly in your inbox.</p>
        <div class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
            <input type="email" placeholder="your@email.com" class="flex-1 bg-white/10 border border-white/20 rounded-xl px-5 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-gold text-sm">
            <button class="bg-gold text-navy font-extrabold px-6 py-3 rounded-xl hover:bg-yellow-400 transition-all text-sm whitespace-nowrap">
                Subscribe करें
            </button>
        </div>
        <p class="text-gray-500 text-[11px] mt-4">No spam. Unsubscribe anytime. 📧</p>
    </div>
</div>

<script>
function filterBlog(category) {
    // Update active tab
    document.querySelectorAll('[id^="tab-"]').forEach(tab => {
        tab.classList.remove('bg-navy', 'text-white');
        tab.classList.add('text-gray-500', 'hover:text-navy', 'hover:bg-gray-100');
        tab.querySelector('span:last-child').classList.remove('text-gray-300');
        tab.querySelector('span:last-child').classList.add('text-gray-400');
    });
    const activeTab = document.getElementById('tab-' + category);
    if (activeTab) {
        activeTab.classList.add('bg-navy', 'text-white');
        activeTab.classList.remove('text-gray-500', 'hover:text-navy', 'hover:bg-gray-100');
        activeTab.querySelector('span:last-child').classList.add('text-gray-300');
        activeTab.querySelector('span:last-child').classList.remove('text-gray-400');
    }
    // Filter cards
    document.querySelectorAll('.blog-card').forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

@endsection
