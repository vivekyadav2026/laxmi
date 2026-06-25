<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\SubscriptionPlan;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPlan::updateOrCreate(
            ['slug' => 'monthly'],
            [
                'name' => 'Monthly Plan',
                'price' => 999,
                'billing_period' => 'month',
                'description' => 'Flexibility to Grow',
                'badge' => null,
                'features' => [
                    '1 Monthly Mentorship Call',
                    'Basic Pitch Deck Review',
                    'Loan Application Support',
                ],
                'is_popular' => false,
                'is_active' => true,
            ]
        );

        SubscriptionPlan::updateOrCreate(
            ['slug' => 'yearly'],
            [
                'name' => 'Yearly Plan',
                'price' => 9999,
                'billing_period' => 'year',
                'description' => 'Complete Funding Engine',
                'badge' => 'Most Popular',
                'features' => [
                    'Unlimited Mentorship Calls',
                    'Complete Pitch Deck Design',
                    'Grant & Loan Priority Processing',
                    'Guaranteed Direct VC Intros',
                ],
                'is_popular' => true,
                'is_active' => true,
            ]
        );
    }
}
