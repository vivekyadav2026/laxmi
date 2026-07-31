<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$cb = \App\Models\CallbackRequest::create([
    'name' => 'Test Client',
    'phone' => '9876543210',
    'service' => 'company-reg',
    'status' => 'pending',
    'notes' => 'Test submission from website hero form',
]);

echo "Callback request created! ID: {$cb->id}\n";
echo "Total callback requests in DB: " . \App\Models\CallbackRequest::count() . "\n";
