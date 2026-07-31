<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$admin = \App\Models\User::where('email', 'admin@foundida.com')->first();

if (!$admin) {
    $admin = \App\Models\User::create([
        'name' => 'Admin User',
        'email' => 'admin@foundida.com',
        'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
        'role' => 'admin',
    ]);
    echo "Admin created successfully!\n";
} else {
    $admin->password = \Illuminate\Support\Facades\Hash::make('admin123');
    $admin->role = 'admin';
    $admin->save();
    echo "Admin password updated successfully!\n";
}

echo "Admin Email: admin@foundida.com\n";
echo "Admin Password: admin123\n";
