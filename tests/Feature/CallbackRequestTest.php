<?php

namespace Tests\Feature;

use App\Models\CallbackRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CallbackRequestTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test validation fails when fields are empty.
     */
    public function test_form_submission_validation_fails(): void
    {
        $response = $this->post('/callback-requests', [
            'name' => '',
            'phone' => '',
            'service' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'phone', 'service']);
        $this->assertDatabaseCount('callback_requests', 0);
    }

    /**
     * Test validation fails with invalid phone format.
     */
    public function test_form_submission_fails_with_invalid_phone(): void
    {
        $response = $this->post('/callback-requests', [
            'name' => 'Rahul Sharma',
            'phone' => '1234567', // Only 7 digits
            'service' => 'gst',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['phone']);
        $this->assertDatabaseCount('callback_requests', 0);
    }

    /**
     * Test validation succeeds and request is stored.
     */
    public function test_form_submission_succeeds(): void
    {
        $response = $this->post('/callback-requests', [
            'name' => 'Rahul Sharma',
            'phone' => '9876543210',
            'service' => 'gst',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('callback_success');
        
        $this->assertDatabaseHas('callback_requests', [
            'name' => 'Rahul Sharma',
            'phone' => '9876543210',
            'service' => 'gst',
            'status' => 'pending',
        ]);
    }

    /**
     * Test form submission with optional fields city and message succeeds and stores them in notes.
     */
    public function test_form_submission_with_optional_fields_succeeds(): void
    {
        $response = $this->post('/callback-requests', [
            'name' => 'Amit Patel',
            'phone' => '9988776655',
            'service' => 'trademark',
            'city' => 'Mumbai',
            'message' => 'Need urgent trademark filing support.',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('callback_success');

        $this->assertDatabaseHas('callback_requests', [
            'name' => 'Amit Patel',
            'phone' => '9988776655',
            'service' => 'trademark',
            'status' => 'pending',
            'notes' => 'City: Mumbai | Message: Need urgent trademark filing support.',
        ]);
    }

    /**
     * Test guests cannot view admin callback listing.
     */
    public function test_guests_cannot_view_admin_callback_listing(): void
    {
        $response = $this->get('/admin/callbacks');
        $response->assertRedirect('/admin/login');
    }

    /**
     * Test admin can view callback listing.
     */
    public function test_admin_can_view_callback_listing(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $callback = CallbackRequest::create([
            'name' => 'Rahul Sharma',
            'phone' => '9876543210',
            'service' => 'gst',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->get('/admin/callbacks');

        $response->assertStatus(200);
        $response->assertSee('Rahul Sharma');
        $response->assertSee('9876543210');
    }

    /**
     * Test admin can update status and notes of a callback request.
     */
    public function test_admin_can_update_status(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $callback = CallbackRequest::create([
            'name' => 'Rahul Sharma',
            'phone' => '9876543210',
            'service' => 'gst',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->patch("/admin/callbacks/{$callback->id}/status", [
            'status' => 'contacted',
            'notes' => 'Spoke with customer, they need company setup as well.',
        ]);

        $response->assertRedirect();
        
        $this->assertDatabaseHas('callback_requests', [
            'id' => $callback->id,
            'status' => 'contacted',
            'notes' => 'Spoke with customer, they need company setup as well.',
        ]);
    }

    /**
     * Test admin can delete a callback request.
     */
    public function test_admin_can_delete_callback_request(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $callback = CallbackRequest::create([
            'name' => 'Rahul Sharma',
            'phone' => '9876543210',
            'service' => 'gst',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->delete("/admin/callbacks/{$callback->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('callback_requests', [
            'id' => $callback->id,
        ]);
    }
}
