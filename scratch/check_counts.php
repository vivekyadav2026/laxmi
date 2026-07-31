<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$models = [
    'User' => \App\Models\User::class,
    'ServiceCategory' => \App\Models\ServiceCategory::class,
    'Service' => \App\Models\Service::class,
    'Package' => \App\Models\Package::class,
    'Post' => \App\Models\Post::class,
    'CallbackRequest' => \App\Models\CallbackRequest::class,
    'PackageInquiry' => \App\Models\PackageInquiry::class,
    'LiveSessionBooking' => \App\Models\LiveSessionBooking::class,
    'Subscription' => \App\Models\Subscription::class,
];

foreach ($models as $name => $class) {
    if (class_exists($class)) {
        echo "$name Count: " . $class::count() . "\n";
    }
}
