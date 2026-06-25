<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\ServiceSeeder::class);
    }

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test that the services page loads successfully.
     */
    public function test_services_page_loads(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertSee('Business Registration');
    }

    /**
     * Test that the blog page loads successfully.
     */
    public function test_blog_page_loads(): void
    {
        // Seed posts if needed, though they might already be seeded or we can seed them
        $this->seed(\Database\Seeders\PostSeeder::class);
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('Legal & Tech Tips');
    }

    /**
     * Test that a specific blog article page loads successfully.
     */
    public function test_blog_single_page_loads(): void
    {
        $this->seed(\Database\Seeders\PostSeeder::class);
        $response = $this->get('/blog/pvt-ltd-vs-llp-vs-opc');
        $response->assertStatus(200);
        $response->assertSee('Private Limited vs LLP vs OPC');
    }

    /**
     * Test that a specific services category page loads successfully.
     */
    public function test_services_category_page_loads(): void
    {
        $response = $this->get('/services/business-registration');
        $response->assertStatus(200);
        $response->assertSee('Private Limited Company');
    }

    /**
     * Test that a generic service detail page loads successfully.
     */
    public function test_services_detail_page_loads(): void
    {
        $response = $this->get('/services/business-registration/private-limited-company');
        $response->assertStatus(200);
        $response->assertSee('Request a Call Back');
    }
}

