<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$svc = \App\Models\Service::where('slug', 'gst-registration')->first();
if ($svc) {
    echo "Current GST Registration Price: {$svc->price}\n";
    $svc->price = '₹899';
    $svc->save();
    echo "Updated GST Registration Price to ₹899!\n";
} else {
    echo "Service gst-registration not found!\n";
}
