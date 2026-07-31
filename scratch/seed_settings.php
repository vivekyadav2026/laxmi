<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$defaults = [
    // General
    'site_name' => 'Foundida',
    'contact_email' => 'support@foundida.com',
    'contact_phone' => '+91 87505 30252',
    'maintenance_mode' => '0',
    'currency_symbol' => '₹',
    'currency_code' => 'INR',
    'meta_description' => 'India\'s #1 Legal, Tax & Technology Platform for Startups & Businesses.',
    'office_address' => 'Floor 4, Sector 62, Noida, Uttar Pradesh 201301',
    'facebook_url' => 'https://facebook.com/foundida',
    'instagram_url' => 'https://instagram.com/foundida',
    'linkedin_url' => 'https://linkedin.com/company/foundida',
    'twitter_url' => 'https://twitter.com/foundida',

    // Payment Gateways
    'razorpay_enabled' => '1',
    'razorpay_key' => 'rzp_test_99887766554433',
    'razorpay_secret' => 'sec_test_112233445566',
    'cashfree_enabled' => '0',
    'cashfree_app_id' => '',
    'cashfree_secret' => '',
    'phonepe_enabled' => '0',
    'phonepe_merchant_id' => '',
    'phonepe_salt_key' => '',
    'gateway_mode' => 'test',

    // Email Templates / SMTP
    'mail_mailer' => 'smtp',
    'mail_host' => 'smtp.gmail.com',
    'mail_port' => '587',
    'mail_username' => 'support@foundida.com',
    'mail_password' => 'app-password-here',
    'mail_encryption' => 'tls',
    'mail_from_address' => 'noreply@foundida.com',
    'mail_from_name' => 'Foundida Support',
    'welcome_email_subject' => 'Welcome to Foundida!',
    'welcome_email_body' => "Hi {name},\n\nThank you for choosing Foundida. Our legal and tech experts are here to assist you.\n\nBest Regards,\nFoundida Team",
    'lead_notification_email' => 'admin@foundida.com',

    // Security & Preferences
    'enable_2fa' => '0',
    'session_timeout' => '120',
    'max_login_attempts' => '5',
];

foreach ($defaults as $k => $v) {
    \App\Models\Setting::set($k, $v);
}

echo "Settings seeded successfully!\n";
