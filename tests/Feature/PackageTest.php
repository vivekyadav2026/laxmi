<?php

namespace Tests\Feature;

use App\Models\Package;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PackageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that guest users cannot access package management.
     */
    public function test_guest_cannot_access_packages_crud(): void
    {
        $this->get(route('admin.packages.index'))->assertRedirect('/admin/login');
        $this->get(route('admin.packages.create'))->assertRedirect('/admin/login');
        $this->post(route('admin.packages.store'), [])->assertRedirect('/admin/login');
    }

    /**
     * Test that an admin can view the list of packages.
     */
    public function test_admin_can_view_packages_index(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Package::create([
            'name_hi' => 'स्टार्टर',
            'name_en' => 'Starter Pack',
            'slug' => 'legal-starter-pack',
            'type' => 'legal',
            'price' => 1999,
            'features' => ['Benefit 1', 'Benefit 2'],
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.packages.index'));
        $response->assertStatus(200);
        $response->assertSee('Starter Pack');
        $response->assertSee('स्टार्टर');
        $response->assertSee('legal-starter-pack');
    }

    /**
     * Test that an admin can create a new package.
     */
    public function test_admin_can_create_package(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('admin.packages.store'), [
            'name_en' => 'Gold Bundle',
            'name_hi' => 'गोल्ड बंडल',
            'slug' => 'legal-gold-bundle',
            'type' => 'legal',
            'price' => '8999',
            'old_price' => '10999',
            'description_en' => 'Best value bundle',
            'description_hi' => 'सबसे बढ़िया पैक',
            'badge_en' => 'Hot Selling',
            'badge_hi' => 'हॉट सेलिंग',
            'features' => "CA Review\nGST Return\nTrademark",
            'comp_company_reg' => '✓',
            'comp_gst_reg' => '✓',
            'comp_trademark' => '✓',
            'comp_website' => '5 Pages',
            'comp_mobile_app' => '✗',
            'comp_ecommerce' => '✗',
            'comp_support' => 'Priority',
            'sort_order' => '5',
            'is_popular' => '1',
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.packages.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('packages', [
            'name_en' => 'Gold Bundle',
            'slug' => 'legal-gold-bundle',
            'type' => 'legal',
            'price' => 8999,
            'old_price' => 10999,
            'is_popular' => true,
            'is_active' => true,
            'sort_order' => 5,
        ]);

        $package = Package::where('slug', 'legal-gold-bundle')->first();
        $this->assertEquals(['CA Review', 'GST Return', 'Trademark'], $package->features);
        $this->assertEquals([
            'Company Registration' => '✓',
            'GST Registration' => '✓',
            'Trademark' => '✓',
            'Website' => '5 Pages',
            'Mobile App' => '✗',
            'E-commerce' => '✗',
            'Support' => 'Priority',
        ], $package->comparison_features);
    }

    /**
     * Test that an admin can update an existing package.
     */
    public function test_admin_can_update_package(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $package = Package::create([
            'name_en' => 'Old Tech Pack',
            'name_hi' => 'पुराना पैक',
            'slug' => 'tech-old-pack',
            'type' => 'tech',
            'price' => 3000,
            'features' => ['Benefit 1'],
            'is_active' => true,
        ]);

        $response = $this->actingAs($admin)->put(route('admin.packages.update', $package->id), [
            'name_en' => 'Updated Tech Pack',
            'name_hi' => 'नया पैक',
            'slug' => 'tech-new-pack',
            'type' => 'tech',
            'price' => '4500',
            'features' => "Benefit 1\nBenefit 2\nBenefit 3",
            'sort_order' => '1',
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.packages.index'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('packages', [
            'id' => $package->id,
            'name_en' => 'Updated Tech Pack',
            'slug' => 'tech-new-pack',
            'price' => 4500,
            'is_popular' => false,
            'is_active' => true,
        ]);
    }

    /**
     * Test that an admin can delete a package.
     */
    public function test_admin_can_delete_package(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $package = Package::create([
            'name_en' => 'Temporary Pack',
            'name_hi' => 'अस्थाई पैक',
            'slug' => 'temp-pack',
            'type' => 'tech',
            'price' => 100,
            'features' => ['Benefit 1'],
        ]);

        $response = $this->actingAs($admin)->delete(route('admin.packages.destroy', $package->id));
        $response->assertRedirect(route('admin.packages.index'));

        $this->assertDatabaseMissing('packages', [
            'id' => $package->id,
        ]);
    }

    /**
     * Test package rendering on public page.
     */
    public function test_public_packages_page_loads_only_active_packages(): void
    {
        // Active Legal Package
        Package::create([
            'name_en' => 'Active Legal Bundle',
            'name_hi' => 'सक्रिय लीगल बंडल',
            'slug' => 'legal-active',
            'type' => 'legal',
            'price' => 5000,
            'features' => ['Feature A'],
            'is_active' => true,
        ]);

        // Inactive Legal Package
        Package::create([
            'name_en' => 'Inactive Legal Bundle',
            'name_hi' => 'निष्क्रिय लीगल बंडल',
            'slug' => 'legal-inactive',
            'type' => 'legal',
            'price' => 10000,
            'features' => ['Feature B'],
            'is_active' => false,
        ]);

        // Active Tech Package
        Package::create([
            'name_en' => 'Active Tech Bundle',
            'name_hi' => 'सक्रिय टेक बंडल',
            'slug' => 'tech-active',
            'type' => 'tech',
            'price' => 6000,
            'features' => ['Feature C'],
            'is_active' => true,
        ]);

        $response = $this->get('/packages');
        $response->assertStatus(200);
        $response->assertSee('Active Legal Bundle');
        $response->assertSee('Active Tech Bundle');
        $response->assertDontSee('Inactive Legal Bundle');
    }

    /**
     * Test package rendering on homepage.
     */
    public function test_homepage_loads_active_packages(): void
    {
        // Active Legal Package
        Package::create([
            'name_en' => 'Active Legal Bundle',
            'name_hi' => 'सक्रिय लीगल बंडल',
            'slug' => 'legal-active',
            'type' => 'legal',
            'price' => 5000,
            'features' => ['Feature A'],
            'is_active' => true,
        ]);

        // Active Tech Package
        Package::create([
            'name_en' => 'Active Tech Bundle',
            'name_hi' => 'सक्रिय टेक बंडल',
            'slug' => 'tech-active',
            'type' => 'tech',
            'price' => 6000,
            'features' => ['Feature C'],
            'is_active' => true,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Active Legal Bundle');
        $response->assertSee('Active Tech Bundle');
    }
}
