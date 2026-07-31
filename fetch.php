<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::create('/services/business-registration', 'GET')
);

$body = $response->getContent();

echo "Contains '₹6,999'? " . (strpos($body, '₹6,999') !== false ? 'Yes' : 'No') . "\n";
echo "Contains '₹15,000'? " . (strpos($body, '₹15,000') !== false ? 'Yes' : 'No') . "\n";
echo "Contains '₹4,999'? " . (strpos($body, '₹4,999') !== false ? 'Yes' : 'No') . "\n";
echo "Contains '₹1,499'? " . (strpos($body, '₹1,499') !== false ? 'Yes' : 'No') . "\n";
echo "Contains '₹3,999'? " . (strpos($body, '₹3,999') !== false ? 'Yes' : 'No') . "\n";
?>
