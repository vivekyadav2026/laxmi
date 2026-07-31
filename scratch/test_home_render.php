<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$dbLegalServices = \App\Models\Service::with('category')
    ->whereHas('category', function($q) {
        $q->whereIn('slug', ['business-registration', 'gst-services', 'trademark-ip', 'licenses-registrations', 'tax-compliance', 'legal-documents-diy', 'vakil-lawyer-services', 'hr-payroll']);
    })->take(12)->get();

foreach ($dbLegalServices as $s) {
    echo "Title: {$s->name_en} | Price: {$s->price} | Time: {$s->time}\n";
}
