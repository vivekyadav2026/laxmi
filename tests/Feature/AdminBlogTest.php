<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminBlogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test guests cannot access any admin blog routes.
     */
    public function test_guests_cannot_access_admin_blog_routes(): void
    {
        $this->get('/admin/blogs')->assertRedirect('/admin/login');
        $this->get('/admin/blogs/create')->assertRedirect('/admin/login');
        $this->post('/admin/blogs', [])->assertRedirect('/admin/login');
        $this->get('/admin/blogs/1/edit')->assertRedirect('/admin/login');
        $this->put('/admin/blogs/1', [])->assertRedirect('/admin/login');
        $this->delete('/admin/blogs/1')->assertRedirect('/admin/login');
    }

    /**
     * Test admin can view the blogs listing.
     */
    public function test_admin_can_view_blogs_listing(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $post = Post::create([
            'slug' => 'test-article-slug',
            'title_hi' => 'परीक्षण लेख शीर्षक',
            'title_en' => 'Test Article Title',
            'category' => 'legal',
            'category_label' => 'LEGAL',
            'color' => 'blue',
            'badge_class' => 'bg-navy/5 text-navy',
            'excerpt' => 'This is a test excerpt.',
            'author' => 'CA Test Author',
            'author_initial' => 'T',
            'author_role' => 'Test Advisor',
            'author_bio' => 'Test bio text.',
            'date' => 'June 24, 2026',
            'read_time' => '5 min read',
            'takeaways' => ['Takeaway 1', 'Takeaway 2'],
            'sections' => [
                [
                    'heading_hi' => 'शीर्षक १',
                    'heading_en' => 'Heading 1',
                    'paragraphs' => ['Para 1 line 1', 'Para 1 line 2'],
                    'table' => null,
                ]
            ],
            'tags' => ['Test', 'Tag'],
            'conclusion' => 'Test conclusion.',
        ]);

        $response = $this->actingAs($admin)->get('/admin/blogs');

        $response->assertStatus(200);
        $response->assertSee('Test Article Title');
        $response->assertSee('Test Advisor');
    }

    /**
     * Test admin can view the create blog form.
     */
    public function test_admin_can_view_create_form(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $response = $this->actingAs($admin)->get('/admin/blogs/create');
        $response->assertStatus(200);
    }

    /**
     * Test admin can store a new blog post.
     */
    public function test_admin_can_store_blog_post(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post('/admin/blogs', [
            'title_en' => 'New English Title',
            'title_hi' => 'नया हिंदी शीर्षक',
            'slug' => 'new-english-title',
            'category' => 'gst',
            'excerpt' => 'This is a test excerpt description.',
            'author' => 'CA Amit Kumar',
            'author_role' => 'Tax Advisor',
            'author_bio' => 'Experienced CA.',
            'read_time' => '6 min read',
            'date' => 'June 25, 2026',
            'tags' => 'GST, Tax, India',
            'takeaways' => "Takeaway One\nTakeaway Two",
            'conclusion' => 'Final concluding thoughts.',
            'section_1_heading_en' => 'Section 1 Heading EN',
            'section_1_heading_hi' => 'Section 1 Heading HI',
            'section_1_paragraphs' => "Paragraph line 1\nParagraph line 2",
            'section_1_table_headers' => 'Header A, Header B',
            'section_1_table_rows' => "Val A1, Val B1\nVal A2, Val B2",
        ]);

        $response->assertRedirect('/admin/blogs');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('posts', [
            'slug' => 'new-english-title',
            'title_en' => 'New English Title',
            'title_hi' => 'नया हिंदी शीर्षक',
            'category' => 'gst',
            'category_label' => 'GST / TAX',
            'color' => 'yellow',
            'author' => 'CA Amit Kumar',
        ]);

        $post = Post::where('slug', 'new-english-title')->first();
        $this->assertNotNull($post);
        $this->assertEquals(['GST', 'Tax', 'India'], $post->tags);
        $this->assertEquals(['Takeaway One', 'Takeaway Two'], $post->takeaways);
        
        $this->assertCount(1, $post->sections);
        $section = $post->sections[0];
        $this->assertEquals('Section 1 Heading EN', $section['heading_en']);
        $this->assertEquals('Section 1 Heading HI', $section['heading_hi']);
        $this->assertEquals(['Paragraph line 1', 'Paragraph line 2'], $section['paragraphs']);
        $this->assertEquals(['Header A', 'Header B'], $section['table']['headers']);
        $this->assertEquals([['Val A1', 'Val B1'], ['Val A2', 'Val B2']], $section['table']['rows']);
    }

    /**
     * Test slug generation logic when slug field is omitted or empty.
     */
    public function test_slug_is_auto_generated_when_empty(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post('/admin/blogs', [
            'title_en' => 'My Auto Generated Slug!',
            'title_hi' => 'स्वचालित स्लग',
            'slug' => '',
            'category' => 'legal',
            'excerpt' => 'Excerpt...',
            'author' => 'CA Amit Kumar',
            'author_role' => 'Advisor',
            'author_bio' => 'Bio...',
            'read_time' => '5 min read',
            'date' => 'June 25, 2026',
            'tags' => 'Legal',
            'takeaways' => "Takeaway",
            'conclusion' => 'Conclusion',
        ]);

        $response->assertRedirect('/admin/blogs');
        $this->assertDatabaseHas('posts', [
            'slug' => 'my-auto-generated-slug',
            'title_en' => 'My Auto Generated Slug!',
        ]);

        // Verify duplicate title gets suffix
        $response2 = $this->actingAs($admin)->post('/admin/blogs', [
            'title_en' => 'My Auto Generated Slug!',
            'title_hi' => 'स्वचालित स्लग २',
            'slug' => '',
            'category' => 'legal',
            'excerpt' => 'Excerpt...',
            'author' => 'CA Amit Kumar',
            'author_role' => 'Advisor',
            'author_bio' => 'Bio...',
            'read_time' => '5 min read',
            'date' => 'June 25, 2026',
            'tags' => 'Legal',
            'takeaways' => "Takeaway",
            'conclusion' => 'Conclusion',
        ]);

        $this->assertDatabaseHas('posts', [
            'slug' => 'my-auto-generated-slug-2',
        ]);
    }

    /**
     * Test admin can load the edit form.
     */
    public function test_admin_can_view_edit_form(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        
        $post = Post::create([
            'slug' => 'edit-test-slug',
            'title_hi' => 'हिंदी शीर्षक',
            'title_en' => 'English Title',
            'category' => 'legal',
            'category_label' => 'LEGAL',
            'color' => 'blue',
            'badge_class' => 'bg-navy/5 text-navy',
            'excerpt' => 'Excerpt...',
            'author' => 'Author Name',
            'author_initial' => 'A',
            'author_role' => 'Role',
            'author_bio' => 'Bio...',
            'date' => 'June 24, 2026',
            'read_time' => '5 min read',
            'takeaways' => ['Takeaway'],
            'sections' => [],
            'tags' => ['Tag'],
            'conclusion' => 'Conclusion',
        ]);

        $response = $this->actingAs($admin)->get("/admin/blogs/{$post->id}/edit");
        $response->assertStatus(200);
        $response->assertSee('English Title');
    }

    /**
     * Test admin can update a post.
     */
    public function test_admin_can_update_post(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $post = Post::create([
            'slug' => 'original-slug',
            'title_hi' => 'मूल शीर्षक',
            'title_en' => 'Original Title',
            'category' => 'legal',
            'category_label' => 'LEGAL',
            'color' => 'blue',
            'badge_class' => 'bg-navy/5 text-navy',
            'excerpt' => 'Excerpt...',
            'author' => 'Author Name',
            'author_initial' => 'A',
            'author_role' => 'Role',
            'author_bio' => 'Bio...',
            'date' => 'June 24, 2026',
            'read_time' => '5 min read',
            'takeaways' => ['Takeaway'],
            'sections' => [],
            'tags' => ['Tag'],
            'conclusion' => 'Conclusion',
        ]);

        $response = $this->actingAs($admin)->put("/admin/blogs/{$post->id}", [
            'title_en' => 'Updated Title EN',
            'title_hi' => 'अद्यतन शीर्षक HI',
            'slug' => 'updated-slug',
            'category' => 'compliance',
            'excerpt' => 'Updated excerpt...',
            'author' => 'New Author',
            'author_role' => 'New Role',
            'author_bio' => 'New Bio',
            'read_time' => '10 min read',
            'date' => 'June 26, 2026',
            'tags' => 'UpdatedTag1, UpdatedTag2',
            'takeaways' => "New Takeaway 1\nNew Takeaway 2",
            'conclusion' => 'New Conclusion',
            'section_1_heading_en' => 'Updated Section 1',
            'section_1_paragraphs' => 'New Paragraph text line 1',
        ]);

        $response->assertRedirect('/admin/blogs');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'slug' => 'updated-slug',
            'title_en' => 'Updated Title EN',
            'title_hi' => 'अद्यतन शीर्षक HI',
            'category' => 'compliance',
            'category_label' => 'COMPLIANCE',
            'color' => 'red',
            'author' => 'New Author',
        ]);

        $updatedPost = Post::find($post->id);
        $this->assertEquals(['UpdatedTag1', 'UpdatedTag2'], $updatedPost->tags);
        $this->assertEquals(['New Takeaway 1', 'New Takeaway 2'], $updatedPost->takeaways);
    }

    /**
     * Test admin can delete a post.
     */
    public function test_admin_can_delete_post(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $post = Post::create([
            'slug' => 'delete-me-slug',
            'title_hi' => 'हटाएं',
            'title_en' => 'Delete Me',
            'category' => 'legal',
            'category_label' => 'LEGAL',
            'color' => 'blue',
            'badge_class' => 'bg-navy/5 text-navy',
            'excerpt' => 'Excerpt...',
            'author' => 'Author Name',
            'author_initial' => 'A',
            'author_role' => 'Role',
            'author_bio' => 'Bio...',
            'date' => 'June 24, 2026',
            'read_time' => '5 min read',
            'takeaways' => ['Takeaway'],
            'sections' => [],
            'tags' => ['Tag'],
            'conclusion' => 'Conclusion',
        ]);

        $response = $this->actingAs($admin)->delete("/admin/blogs/{$post->id}");
        $response->assertRedirect('/admin/blogs');
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
}
