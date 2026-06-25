<?php

namespace Tests\Feature;

use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriptionPlanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that guest users cannot access subscription plans admin pages.
     */
    public function test_guest_cannot_access_plans_crud(): void
    {
        $this->get(route('admin.subscription_plans.index'))->assertRedirect('/admin/login');
        $this->get(route('admin.subscription_plans.create'))->assertRedirect('/admin/login');
        $this->post(route('admin.subscription_plans.store'), [])->assertRedirect('/admin/login');
    }

    /**
     * Test that an admin can view the listing of plans.
     */
    public function test_admin_can_view_plans_index(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $plan = SubscriptionPlan::create([
            'name' => 'Custom Plan',
            'slug' => 'custom-plan',
            'price' => 5000,
            'billing_period' => 'month',
            'features' => ['Benefit 1', 'Benefit 2'],
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.subscription_plans.index'));
        $response->assertStatus(200);
        $response->assertSee('Custom Plan');
        $response->assertSee('custom-plan');
        $response->assertSee('₹5,000');
    }

    /**
     * Test that an admin can create a new subscription plan.
     */
    public function test_admin_can_create_plan(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('admin.subscription_plans.store'), [
            'name' => 'Super Plan',
            'slug' => 'super-plan',
            'price' => '12000',
            'billing_period' => 'year',
            'description' => 'Fast Growth Plan',
            'badge' => 'Exclusive',
            'features' => "Feature Line 1\nFeature Line 2\nFeature Line 3",
            'is_popular' => '1',
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.subscription_plans.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('subscription_plans', [
            'name' => 'Super Plan',
            'slug' => 'super-plan',
            'price' => 12000,
            'billing_period' => 'year',
            'description' => 'Fast Growth Plan',
            'badge' => 'Exclusive',
            'is_popular' => true,
            'is_active' => true,
        ]);

        // Features should be cast back to an array
        $plan = SubscriptionPlan::where('slug', 'super-plan')->first();
        $this->assertEquals(['Feature Line 1', 'Feature Line 2', 'Feature Line 3'], $plan->features);
    }

    /**
     * Test that an admin can edit a subscription plan.
     */
    public function test_admin_can_update_plan(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $plan = SubscriptionPlan::create([
            'name' => 'Old Plan',
            'slug' => 'old-plan',
            'price' => 200,
            'billing_period' => 'month',
            'features' => ['Feature 1'],
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->put(route('admin.subscription_plans.update', $plan->id), [
            'name' => 'New Plan Name',
            'slug' => 'new-slug',
            'price' => '350',
            'billing_period' => 'year',
            'description' => 'Updated Tagline',
            'features' => "Line 1\nLine 2",
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.subscription_plans.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('subscription_plans', [
            'id' => $plan->id,
            'name' => 'New Plan Name',
            'slug' => 'new-slug',
            'price' => 350,
            'billing_period' => 'year',
            'is_popular' => false,
            'is_active' => true,
        ]);
    }

    /**
     * Test that an admin can delete a plan.
     */
    public function test_admin_can_delete_plan(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $plan = SubscriptionPlan::create([
            'name' => 'Temporary Plan',
            'slug' => 'temp-plan',
            'price' => 500,
            'billing_period' => 'month',
            'features' => ['Feature 1'],
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.subscription_plans.destroy', $plan->id));
        $response->assertRedirect(route('admin.subscription_plans.index'));

        $this->assertDatabaseMissing('subscription_plans', [
            'id' => $plan->id,
        ]);
    }

    /**
     * Test plan loading on public page.
     */
    public function test_public_funding_page_loads_active_plans(): void
    {
        // Create an active plan
        SubscriptionPlan::create([
            'name' => 'Active Dynamic Plan',
            'slug' => 'active-dyn',
            'price' => 450,
            'billing_period' => 'month',
            'features' => ['Feature A'],
            'is_active' => true,
        ]);

        // Create an inactive plan
        SubscriptionPlan::create([
            'name' => 'Inactive Dynamic Plan',
            'slug' => 'inactive-dyn',
            'price' => 900,
            'billing_period' => 'month',
            'features' => ['Feature B'],
            'is_active' => false,
        ]);

        $response = $this->get('/funding');
        $response->assertStatus(200);
        $response->assertSee('Active Dynamic Plan');
        $response->assertDontSee('Inactive Dynamic Plan');
    }
}
