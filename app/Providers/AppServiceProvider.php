<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            try {
                $contactPhone = \App\Models\Setting::get('contact_phone', '+91 87505 30252');
                $cleanPhone = preg_replace('/[^0-9+]/', '', $contactPhone);
                $whatsappPhone = preg_replace('/[^0-9]/', '', $contactPhone);
                $contactEmail = \App\Models\Setting::get('contact_email', 'hello@foundida.com');

                $view->with([
                    'contactPhone' => $contactPhone,
                    'cleanPhone' => $cleanPhone,
                    'whatsappPhone' => $whatsappPhone,
                    'contactEmail' => $contactEmail,
                ]);
            } catch (\Throwable $e) {
                $view->with([
                    'contactPhone' => '+91 87505 30252',
                    'cleanPhone' => '+918750530252',
                    'whatsappPhone' => '918750530252',
                    'contactEmail' => 'hello@foundida.com',
                ]);
            }
        });
    }
}
