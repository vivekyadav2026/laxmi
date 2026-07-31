<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$request = Illuminate\Http\Request::create('/services/business-registration', 'GET');
try {
    $route = Route::getRoutes()->match($request);
    echo "Matching Route Uri: " . $route->uri() . "\n";
    echo "Matching Route Action: " . json_encode($route->getAction()) . "\n";
} catch (\Exception $e) {
    echo "Error matching route: " . $e->getMessage() . "\n";
}
