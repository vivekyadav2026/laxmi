<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Legal Packages
        Package::create([
            'name_hi' => 'स्टार्टर',
            'name_en' => 'Starter',
            'slug' => 'legal-starter',
            'type' => 'legal',
            'price' => 2499,
            'old_price' => 2999,
            'description_hi' => 'छोटे व्यवसायों और फ्रीलांसरों के लिए जो अभी शुरुआत कर रहे हैं',
            'description_en' => 'For early-stage founders testing an idea.',
            'features' => [
                'Company Registration (Sole Prop)',
                'GST Registration',
                'Business Email (1 User)',
                'Custom Logo Design',
                '1 Legal Document Draft',
            ],
            'comparison_features' => [
                'Company Registration' => '✓',
                'GST Registration' => '✓',
                'Trademark' => '✗',
                'Website' => '✗',
                'Mobile App' => '✗',
                'E-commerce' => '✗',
                'Support' => 'Email',
            ],
            'is_popular' => false,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Package::create([
            'name_hi' => 'ग्रोथ',
            'name_en' => 'Growth',
            'slug' => 'legal-growth',
            'type' => 'legal',
            'price' => 6999,
            'old_price' => 8999,
            'description_hi' => 'तेजी से बढ़ते स्टार्टअप्स और उद्यमों के लिए आदर्श',
            'description_en' => 'Everything you need to go live legally.',
            'badge_hi' => 'सबसे लोकप्रिय',
            'badge_en' => 'Most Popular',
            'features' => [
                'Private Limited Registration',
                'GST Registration & 3 Returns',
                'Trademark Filing (1 Class)',
                'Business Website (5 Pages)',
                'Social Media Profiles Setup',
                'Priority Support',
            ],
            'comparison_features' => [
                'Company Registration' => '✓ (Pvt Ltd)',
                'GST Registration' => '✓',
                'Trademark' => '✓',
                'Website' => '5 Pages',
                'Mobile App' => '✗',
                'E-commerce' => '✗',
                'Support' => 'Priority',
            ],
            'is_popular' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Package::create([
            'name_hi' => 'कम्पलीट',
            'name_en' => 'Complete',
            'slug' => 'legal-complete',
            'type' => 'legal',
            'price' => 14999,
            'old_price' => 19999,
            'description_hi' => 'पूरी कानूनी सुरक्षा और तकनीकी क्षमता एक साथ',
            'description_en' => 'Full legal protection + tech capability.',
            'features' => [
                'All Growth features',
                'Trademark + Copyright',
                'Mobile App (Android)',
                'E-commerce Store Setup',
                'FSSAI / IEC Registration',
                '1 Year Free Support & Compliance',
            ],
            'comparison_features' => [
                'Company Registration' => '✓',
                'GST Registration' => '✓',
                'Trademark' => '✓ + Copyright',
                'Website' => 'Full Custom',
                'Mobile App' => 'Android',
                'E-commerce' => '✓',
                'Support' => 'Dedicated Manager',
            ],
            'is_popular' => false,
            'is_active' => true,
            'sort_order' => 3,
        ]);

        // 2. Tech Packages
        Package::create([
            'name_hi' => 'वेब बेसिक',
            'name_en' => 'Web Basic',
            'slug' => 'tech-web-basic',
            'type' => 'tech',
            'price' => 3999,
            'old_price' => 4999,
            'description_hi' => 'सरल और सुरुचिपूर्ण ऑनलाइन पहचान',
            'description_en' => 'Perfect for a brand new online presence.',
            'features' => [
                '5-Page Responsive Website',
                'Domain + Hosting (1 Year)',
                'Logo Design',
                'WhatsApp Chat Integration',
                'Google Maps & Analytics Setup',
            ],
            'is_popular' => false,
            'is_active' => true,
            'sort_order' => 4,
        ]);

        Package::create([
            'name_hi' => 'डिजिटल प्रो',
            'name_en' => 'Digital Pro',
            'slug' => 'tech-digital-pro',
            'type' => 'tech',
            'price' => 7999,
            'old_price' => 10999,
            'description_hi' => 'आपकी डिजिटल मार्केटिंग और उपस्थिति का विस्तार करें',
            'description_en' => 'Scale your digital marketing & presence.',
            'badge_hi' => 'सबसे लोकप्रिय',
            'badge_en' => 'Most Popular',
            'features' => [
                '10-Page Custom Website',
                'E-commerce / Payment Gateway',
                'Social Media Setup (5 Platforms)',
                'SEO Optimization (3 Months)',
                'Google Business Profile',
                'Priority Email Support',
            ],
            'is_popular' => true,
            'is_active' => true,
            'sort_order' => 5,
        ]);

        Package::create([
            'name_hi' => 'फुल डिजिटल',
            'name_en' => 'Full Digital',
            'slug' => 'tech-full-digital',
            'type' => 'tech',
            'price' => 15999,
            'old_price' => 21999,
            'description_hi' => 'आपके व्यवसाय के लिए संपूर्ण डिजिटल परिवर्तन',
            'description_en' => 'Complete tech transformation for your business.',
            'features' => [
                'All Digital Pro features',
                'Android + iOS Mobile App',
                'CRM / ERP Integration',
                'Dedicated Account Manager',
                'Monthly Performance Reports',
                '1 Year Domain + Hosting Free',
            ],
            'is_popular' => false,
            'is_active' => true,
            'sort_order' => 6,
        ]);
    }
}
