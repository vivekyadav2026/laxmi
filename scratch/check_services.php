<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$categories = \App\Models\ServiceCategory::with('services')->get();
foreach ($categories as $cat) {
    echo "Category: {$cat->name} (Slug: {$cat->slug}) - Services: " . $cat->services->count() . "\n";
    foreach ($cat->services->take(3) as $s) {
        echo "  - {$s->name_en} | Price: {$s->price} | Time: {$s->time}\n";
    }
}
