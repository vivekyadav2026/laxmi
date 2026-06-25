<?php

namespace Tests\Feature;

use App\Models\LiveSessionBooking;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LiveSessionBookingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test validation fails when fields are empty.
     */
    public function test_booking_validation_fails_when_empty(): void
    {
        $response = $this->post('/live-session/book', [
            'name' => '',
            'phone' => '',
            'preferred_date' => '',
            'preferred_time' => '',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'phone', 'preferred_date', 'preferred_time']);
        $this->assertDatabaseCount('live_session_bookings', 0);
    }

    /**
     * Test validation fails with invalid phone format.
     */
    public function test_booking_fails_with_invalid_phone(): void
    {
        $response = $this->post('/live-session/book', [
            'name' => 'Kiran M',
            'phone' => '12345678', // Not 10 digits
            'preferred_date' => date('Y-m-d'),
            'preferred_time' => '10:00 AM - 12:00 PM',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['phone']);
        $this->assertDatabaseCount('live_session_bookings', 0);
    }

    /**
     * Test booking succeeds and stores in DB.
     */
    public function test_booking_succeeds(): void
    {
        $response = $this->post('/live-session/book', [
            'name' => 'Kiran M',
            'phone' => '9876543210',
            'email' => 'kiran@ceo.com',
            'preferred_date' => date('Y-m-d'),
            'preferred_time' => '10:00 AM - 12:00 PM',
            'notes' => 'Looking for Pvt Ltd registration guidance.',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('booking_success');

        $this->assertDatabaseHas('live_session_bookings', [
            'name' => 'Kiran M',
            'phone' => '9876543210',
            'email' => 'kiran@ceo.com',
            'preferred_date' => date('Y-m-d'),
            'preferred_time' => '10:00 AM - 12:00 PM',
            'status' => 'pending',
            'notes' => 'Looking for Pvt Ltd registration guidance.',
        ]);
    }

    /**
     * Test guest cannot access admin live sessions.
     */
    public function test_guests_cannot_view_admin_live_sessions(): void
    {
        $response = $this->get('/admin/live-sessions');
        $response->assertRedirect('/admin/login');
    }

    /**
     * Test admin can view live sessions listing.
     */
    public function test_admin_can_view_live_sessions_listing(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        LiveSessionBooking::create([
            'name' => 'Kiran M',
            'phone' => '9876543210',
            'preferred_date' => date('Y-m-d'),
            'preferred_time' => '10:00 AM - 12:00 PM',
        ]);

        $response = $this->actingAs($admin)->get('/admin/live-sessions');

        $response->assertStatus(200);
        $response->assertSee('Kiran M');
        $response->assertSee('9876543210');
    }

    /**
     * Test admin can update status.
     */
    public function test_admin_can_update_booking_status(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $booking = LiveSessionBooking::create([
            'name' => 'Kiran M',
            'phone' => '9876543210',
            'preferred_date' => date('Y-m-d'),
            'preferred_time' => '10:00 AM - 12:00 PM',
        ]);

        $response = $this->actingAs($admin)->patch("/admin/live-sessions/{$booking->id}/status", [
            'status' => 'completed',
            'notes' => 'Session conducted successfully.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('live_session_bookings', [
            'id' => $booking->id,
            'status' => 'completed',
            'notes' => 'Session conducted successfully.',
        ]);
    }

    /**
     * Test admin can delete booking.
     */
    public function test_admin_can_delete_booking(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $booking = LiveSessionBooking::create([
            'name' => 'Kiran M',
            'phone' => '9876543210',
            'preferred_date' => date('Y-m-d'),
            'preferred_time' => '10:00 AM - 12:00 PM',
        ]);

        $response = $this->actingAs($admin)->delete("/admin/live-sessions/{$booking->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('live_session_bookings', [
            'id' => $booking->id,
        ]);
    }
}
