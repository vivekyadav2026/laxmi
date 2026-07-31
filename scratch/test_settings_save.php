<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Total settings in DB: " . \App\Models\Setting::count() . "\n";
echo "Site Name: " . \App\Models\Setting::get('site_name') . "\n";
echo "Contact Phone: " . \App\Models\Setting::get('contact_phone') . "\n";
echo "Razorpay Key: " . \App\Models\Setting::get('razorpay_key') . "\n";
echo "SMTP Host: " . \App\Models\Setting::get('mail_host') . "\n";
