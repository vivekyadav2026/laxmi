<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blogs.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_hi' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'category' => 'required|string|in:legal,gst,trademark,tech,startup,compliance',
            'excerpt' => 'required|string|max:1000',
            'author' => 'required|string|max:255',
            'author_role' => 'required|string|max:255',
            'author_bio' => 'required|string|max:1000',
            'read_time' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'tags' => 'required|string',
            'takeaways' => 'required|string',
            'conclusion' => 'required|string',
        ]);

        // Generate slug if empty
        $slug = $validated['slug'] ?: Str::slug($validated['title_en']);
        // Ensure slug is unique
        $slugCount = Post::where('slug', 'like', $slug . '%')->count();
        if ($slugCount > 0 && !$validated['slug']) {
            $slug = $slug . '-' . ($slugCount + 1);
        }

        // Set category label, color, and badge_class based on category value
        $categoryConfig = [
            'legal' => ['label' => 'LEGAL', 'color' => 'blue', 'badge' => 'bg-navy/5 text-navy'],
            'gst' => ['label' => 'GST / TAX', 'color' => 'yellow', 'badge' => 'bg-gold/10 text-gold'],
            'trademark' => ['label' => 'TRADEMARK', 'color' => 'purple', 'badge' => 'bg-purple-50 text-purple-600'],
            'tech' => ['label' => 'TECH', 'color' => 'green', 'badge' => 'bg-green-50 text-green-600'],
            'startup' => ['label' => 'STARTUP', 'color' => 'orange', 'badge' => 'bg-orange-50 text-orange-600'],
            'compliance' => ['label' => 'COMPLIANCE', 'color' => 'red', 'badge' => 'bg-red-50 text-red-600'],
        ];
        $config = $categoryConfig[$validated['category']];

        // Parse takeaways and tags
        $takeaways = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['takeaways']))));
        $tags = array_filter(array_map('trim', explode(',', $validated['tags'])));

        // Parse sections
        $sections = $this->parseSections($request);

        // Get Author Initial
        $authorInitial = strtoupper(substr($validated['author'], 0, 1)) ?: 'F';

        Post::create([
            'slug' => $slug,
            'title_en' => $validated['title_en'],
            'title_hi' => $validated['title_hi'],
            'category' => $validated['category'],
            'category_label' => $config['label'],
            'color' => $config['color'],
            'badge_class' => $config['badge'],
            'excerpt' => $validated['excerpt'],
            'author' => $validated['author'],
            'author_initial' => $authorInitial,
            'author_role' => $validated['author_role'],
            'author_bio' => $validated['author_bio'],
            'date' => $validated['date'],
            'read_time' => $validated['read_time'],
            'takeaways' => array_values($takeaways),
            'tags' => array_values($tags),
            'sections' => $sections,
            'conclusion' => $validated['conclusion'],
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.blogs.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_hi' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'category' => 'required|string|in:legal,gst,trademark,tech,startup,compliance',
            'excerpt' => 'required|string|max:1000',
            'author' => 'required|string|max:255',
            'author_role' => 'required|string|max:255',
            'author_bio' => 'required|string|max:1000',
            'read_time' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'tags' => 'required|string',
            'takeaways' => 'required|string',
            'conclusion' => 'required|string',
        ]);

        // Set category label, color, and badge_class based on category value
        $categoryConfig = [
            'legal' => ['label' => 'LEGAL', 'color' => 'blue', 'badge' => 'bg-navy/5 text-navy'],
            'gst' => ['label' => 'GST / TAX', 'color' => 'yellow', 'badge' => 'bg-gold/10 text-gold'],
            'trademark' => ['label' => 'TRADEMARK', 'color' => 'purple', 'badge' => 'bg-purple-50 text-purple-600'],
            'tech' => ['label' => 'TECH', 'color' => 'green', 'badge' => 'bg-green-50 text-green-600'],
            'startup' => ['label' => 'STARTUP', 'color' => 'orange', 'badge' => 'bg-orange-50 text-orange-600'],
            'compliance' => ['label' => 'COMPLIANCE', 'color' => 'red', 'badge' => 'bg-red-50 text-red-600'],
        ];
        $config = $categoryConfig[$validated['category']];

        // Parse takeaways and tags
        $takeaways = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['takeaways']))));
        $tags = array_filter(array_map('trim', explode(',', $validated['tags'])));

        // Parse sections
        $sections = $this->parseSections($request);

        // Get Author Initial
        $authorInitial = strtoupper(substr($validated['author'], 0, 1)) ?: 'F';

        $post->update([
            'slug' => $validated['slug'],
            'title_en' => $validated['title_en'],
            'title_hi' => $validated['title_hi'],
            'category' => $validated['category'],
            'category_label' => $config['label'],
            'color' => $config['color'],
            'badge_class' => $config['badge'],
            'excerpt' => $validated['excerpt'],
            'author' => $validated['author'],
            'author_initial' => $authorInitial,
            'author_role' => $validated['author_role'],
            'author_bio' => $validated['author_bio'],
            'date' => $validated['date'],
            'read_time' => $validated['read_time'],
            'takeaways' => array_values($takeaways),
            'tags' => array_values($tags),
            'sections' => $sections,
            'conclusion' => $validated['conclusion'],
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }

    /**
     * Parse section inputs from request.
     */
    private function parseSections(Request $request): array
    {
        $sections = [];

        for ($i = 1; $i <= 3; $i++) {
            $headingHi = $request->input("section_{$i}_heading_hi");
            $headingEn = $request->input("section_{$i}_heading_en");
            $paragraphsText = $request->input("section_{$i}_paragraphs");

            if ($headingHi || $headingEn || $paragraphsText) {
                $paragraphs = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $paragraphsText))));
                
                $table = null;
                $headersText = $request->input("section_{$i}_table_headers");
                $rowsText = $request->input("section_{$i}_table_rows");

                if ($headersText) {
                    $headers = array_map('trim', explode(',', $headersText));
                    $rows = [];

                    if ($rowsText) {
                        $rowLines = array_filter(array_map('trim', explode("\n", str_replace("\r", "", $rowsText))));
                        foreach ($rowLines as $line) {
                            $rows[] = array_map('trim', explode(',', $line));
                        }
                    }

                    $table = [
                        'headers' => $headers,
                        'rows' => $rows,
                    ];
                }

                $sections[] = [
                    'heading_hi' => $headingHi ?: '',
                    'heading_en' => $headingEn ?: '',
                    'paragraphs' => array_values($paragraphs),
                    'table' => $table,
                ];
            }
        }

        return $sections;
    }
}
