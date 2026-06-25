@extends('layouts.admin')

@section('title', 'Manage Blogs - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Manage Blogs</h1>
            <p class="text-sm text-gray-400">Create, edit, and manage all English & Hindi articles.</p>
        </div>
        
        <a href="{{ route('admin.blogs.create') }}" class="bg-gradient-to-r from-gold to-[#a88d30] text-navy px-5 py-2.5 rounded-xl text-sm font-bold hover:from-[#e2b54d] hover:to-[#c6a83d] transition-all shadow-lg shadow-gold/20 hover:shadow-gold/40 hover:-translate-y-0.5 inline-flex items-center gap-2">
            <i class="fas fa-plus"></i> Add New Post
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-2xl flex items-center gap-3 animate-fadeIn relative z-10">
            <i class="fas fa-check-circle text-lg"></i>
            <span class="text-sm font-semibold">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white/5 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/10 overflow-hidden relative z-10">
        @if($posts->isEmpty())
            <div class="p-16 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 bg-navy/40 border border-white/5 rounded-full flex items-center justify-center text-gray-400 text-2xl mb-4 shadow-inner">
                    <i class="fas fa-book-open"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-1 font-serif">No Blog Posts Found</h3>
                <p class="text-xs text-gray-400 max-w-sm">There are no blog posts in the database yet. Click "Add New Post" to create one.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/5 bg-white/2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                            <th class="px-6 py-5">Article Info</th>
                            <th class="px-6 py-5">Category</th>
                            <th class="px-6 py-5">Author</th>
                            <th class="px-6 py-5">Date & Read Time</th>
                            <th class="px-6 py-5">Tags</th>
                            <th class="px-6 py-5 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm text-gray-300">
                        @foreach($posts as $post)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <!-- Article Title / Slug -->
                                <td class="px-6 py-4.5">
                                    <div class="font-bold text-white leading-snug">{{ $post->title_en }}</div>
                                    <div class="text-[12px] text-gray-400 font-medium mt-1 leading-snug">{{ $post->title_hi }}</div>
                                    <div class="text-[11px] text-gray-500 font-mono mt-1">/blog/{{ $post->slug }}</div>
                                </td>

                                <!-- Category Badge -->
                                <td class="px-6 py-4.5">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold {{ $post->badge_class }}">
                                        {{ $post->category_label }}
                                    </span>
                                </td>

                                <!-- Author -->
                                <td class="px-6 py-4.5">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-gold/15 text-gold font-bold text-xs flex items-center justify-center border border-gold/10">
                                            {{ $post->author_initial }}
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white text-xs">{{ $post->author }}</div>
                                            <div class="text-[10px] text-gray-500">{{ $post->author_role }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Date & Read Time -->
                                <td class="px-6 py-4.5 text-xs">
                                    <div class="text-white font-medium">{{ $post->date }}</div>
                                    <div class="text-gray-400 mt-1 flex items-center gap-1">
                                        <i class="far fa-clock"></i> {{ $post->read_time }}
                                    </div>
                                </td>

                                <!-- Tags -->
                                <td class="px-6 py-4.5">
                                    <div class="flex flex-wrap gap-1 max-w-[200px]">
                                        @foreach($post->tags ?? [] as $tag)
                                            <span class="bg-white/5 border border-white/10 text-gray-400 text-[10px] px-2 py-0.5 rounded-md">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>

                                <!-- Action Buttons -->
                                <td class="px-6 py-4.5 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- View on site -->
                                        <a href="/blog/{{ $post->slug }}" target="_blank" class="w-8 h-8 rounded-xl bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white flex items-center justify-center transition-all" title="View on Live Website">
                                            <i class="fas fa-external-link-alt text-xs"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a href="{{ route('admin.blogs.edit', $post->id) }}" class="w-8 h-8 rounded-xl bg-gold/10 hover:bg-gold/20 text-gold flex items-center justify-center transition-all" title="Edit Article">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('admin.blogs.destroy', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this blog post? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-8 h-8 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 flex items-center justify-center transition-all" title="Delete Article">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Footer -->
            @if($posts->hasPages())
                <div class="px-6 py-5 border-t border-white/5 bg-white/[0.01]">
                    {{ $posts->links() }}
                </div>
            @endif
        @endif
    </div>
@endsection
