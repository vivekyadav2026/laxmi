<?php

namespace Tests\Feature;

use App\Models\Package;
use App\Models\PackageInquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PackageInquiryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create an active package for relationship testing
        Package::create([
            'name_hi' => 'स्टार्टर पैक',
            'name_en' => 'Starter Pack',
            'slug' => 'legal-starter-pack',
            'type' => 'legal',
            'price' => 1999,
            'features' => ['Benefit A', 'Benefit B'],
            'is_active' => true,
        ]);
    }

    /**
     * Test public form submission validation fails when fields are empty.
     */
    public function test_form_submission_validation_fails(): void
    {
        $response = $this->post('/package-inquiries', [
            'name' => '',
            'phone' => '',
            'email' => '',
            'package_slug' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'phone', 'email', 'package_slug']);
        $this->assertDatabaseCount('package_inquiries', 0);
    }

    /**
     * Test public form submission validation fails with invalid mobile format.
     */
    public function test_form_submission_fails_with_invalid_phone(): void
    {
        $response = $this->post('/package-inquiries', [
            'name' => 'John Doe',
            'phone' => '123456789', // 9 digits
            'email' => 'john@example.com',
            'package_slug' => 'legal-starter-pack',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['phone']);
        $this->assertDatabaseCount('package_inquiries', 0);
    }

    /**
     * Test public form submission validation fails with non-existing package slug.
     */
    public function test_form_submission_fails_with_invalid_package_slug(): void
    {
        $response = $this->post('/package-inquiries', [
            'name' => 'John Doe',
            'phone' => '9876543210',
            'email' => 'john@example.com',
            'package_slug' => 'non-existent-slug',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['package_slug']);
        $this->assertDatabaseCount('package_inquiries', 0);
    }

    /**
     * Test public form submission validation succeeds and records inquiry in database.
     */
    public function test_form_submission_succeeds(): void
    {
        $response = $this->post('/package-inquiries', [
            'name' => 'John Doe',
            'phone' => '9876543210',
            'email' => 'john@example.com',
            'package_slug' => 'legal-starter-pack',
            'notes' => 'Looking to register within 2 days.',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('package_inquiry_success');

        $this->assertDatabaseHas('package_inquiries', [
            'name' => 'John Doe',
            'phone' => '9876543210',
            'email' => 'john@example.com',
            'package_slug' => 'legal-starter-pack',
            'status' => 'pending',
            'notes' => 'Looking to register within 2 days.',
        ]);
    }

    /**
     * Test guest users cannot view admin package inquiry listing.
     */
    public function test_guests_cannot_view_admin_package_inquiry_listing(): void
    {
        $response = $this->get('/admin/package-inquiries');
        $response->assertRedirect('/admin/login');
    }

    /**
     * Test admin user can view package inquiry list and filter by status.
     */
    public function test_admin_can_view_package_inquiry_listing(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        // Create a few inquiries
        PackageInquiry::create([
            'name' => 'Pending Client',
            'phone' => '9876543210',
            'email' => 'pending@example.com',
            'package_slug' => 'legal-starter-pack',
            'status' => 'pending',
        ]);

        PackageInquiry::create([
            'name' => 'Contacted Client',
            'phone' => '9876543211',
            'email' => 'contacted@example.com',
            'package_slug' => 'legal-starter-pack',
            'status' => 'contacted',
        ]);

        $response = $this->actingAs($admin)->get('/admin/package-inquiries');
        $response->assertStatus(200);
        $response->assertSee('Pending Client');
        $response->assertSee('Contacted Client');

        // Test filtering
        $responseFiltered = $this->actingAs($admin)->get('/admin/package-inquiries?status=pending');
        $responseFiltered->assertStatus(200);
        $responseFiltered->assertSee('Pending Client');
        $responseFiltered->assertDontSee('Contacted Client');
    }

    /**
     * Test admin can update the status and notes of a package inquiry.
     */
    public function test_admin_can_update_status(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $inquiry = PackageInquiry::create([
            'name' => 'John Doe',
            'phone' => '9876543210',
            'email' => 'john@example.com',
            'package_slug' => 'legal-starter-pack',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->patch("/admin/package-inquiries/{$inquiry->id}/status", [
            'status' => 'completed',
            'notes' => 'Payment received and processed successfully.',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('package_inquiries', [
            'id' => $inquiry->id,
            'status' => 'completed',
            'notes' => 'Payment received and processed successfully.',
        ]);
    }

    /**
     * Test admin can delete a package inquiry.
     */
    public function test_admin_can_delete_package_inquiry(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $inquiry = PackageInquiry::create([
            'name' => 'Delete Me',
            'phone' => '9876543210',
            'email' => 'deleteme@example.com',
            'package_slug' => 'legal-starter-pack',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->delete("/admin/package-inquiries/{$inquiry->id}");
        $response->assertRedirect();

        $this->assertDatabaseMissing('package_inquiries', [
            'id' => $inquiry->id,
        ]);
    }
}
