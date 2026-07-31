<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$key    = \App\Models\Setting::get('razorpay_key');
$secret = \App\Models\Setting::get('razorpay_secret');
$mode   = \App\Models\Setting::get('gateway_mode');

echo "Key: " . $key . PHP_EOL;
echo "Secret: " . $secret . PHP_EOL;
echo "Mode: " . $mode . PHP_EOL;
echo "Key valid format: " . (preg_match('/^rzp_(test|live)_/', $key) ? 'YES' : 'NO') . PHP_EOL;
