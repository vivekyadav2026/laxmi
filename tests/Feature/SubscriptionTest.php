<?php

namespace Tests\Feature;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\SubscriptionPlanSeeder::class);
    }

    /**
     * Test validation fails when fields are empty.
     */
    public function test_subscription_validation_fails(): void
    {
        $response = $this->post('/funding/subscribe', [
            'name' => '',
            'phone' => '',
            'email' => '',
            'plan' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'phone', 'email', 'plan']);
        $this->assertDatabaseCount('subscriptions', 0);
    }

    /**
     * Test validation fails with invalid phone format.
     */
    public function test_subscription_fails_with_invalid_phone(): void
    {
        $response = $this->post('/funding/subscribe', [
            'name' => 'Rajat B.',
            'phone' => '12345',
            'email' => 'rajat@startup.com',
            'plan' => 'monthly',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['phone']);
        $this->assertDatabaseCount('subscriptions', 0);
    }

    /**
     * Test subscription succeeds.
     */
    public function test_subscription_succeeds(): void
    {
        $response = $this->post('/funding/subscribe', [
            'name' => 'Rajat B.',
            'phone' => '9876543210',
            'email' => 'rajat@startup.com',
            'startup_name' => 'Acme App',
            'plan' => 'yearly',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('subscription_success');
        
        $this->assertDatabaseHas('subscriptions', [
            'name' => 'Rajat B.',
            'phone' => '9876543210',
            'email' => 'rajat@startup.com',
            'startup_name' => 'Acme App',
            'plan' => 'yearly',
            'status' => 'pending',
        ]);
    }

    /**
     * Test guests cannot view admin subscription listing.
     */
    public function test_guests_cannot_view_admin_subscription_listing(): void
    {
        $response = $this->get('/admin/funding');
        $response->assertRedirect('/admin/login');
    }

    /**
     * Test admin can view subscription listing.
     */
    public function test_admin_can_view_subscription_listing(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Subscription::create([
            'name' => 'Founder 1',
            'phone' => '9876543210',
            'email' => 'founder@startup.com',
            'plan' => 'monthly',
        ]);

        $response = $this->actingAs($admin)->get('/admin/funding');
        $response->assertStatus(200);
        $response->assertSee('Founder 1');
    }

    /**
     * Test admin can update subscription status.
     */
    public function test_admin_can_update_subscription_status(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $sub = Subscription::create([
            'name' => 'Founder 1',
            'phone' => '9876543210',
            'email' => 'founder@startup.com',
            'plan' => 'monthly',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($admin)->patch("/admin/funding/{$sub->id}/status", [
            'status' => 'active',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('subscriptions', [
            'id' => $sub->id,
            'status' => 'active',
        ]);
    }

    /**
     * Test admin can delete subscription.
     */
    public function test_admin_can_delete_subscription(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $sub = Subscription::create([
            'name' => 'Founder 1',
            'phone' => '9876543210',
            'email' => 'founder@startup.com',
            'plan' => 'monthly',
        ]);

        $response = $this->actingAs($admin)->delete("/admin/funding/{$sub->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('subscriptions', [
            'id' => $sub->id,
        ]);
    }
}
