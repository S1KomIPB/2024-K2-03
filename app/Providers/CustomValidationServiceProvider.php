<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Validator::extend('username', function ($attribute, $value, $parameters, $validator) {
            // Custom validation logic for 'username'
            return preg_match('/^[a-zA-Z0-9_]+$/', $value) === 1;
        });
    }
}
