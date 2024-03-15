<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
    {
        Validator::extend('username_or_email_checked', function ($attribute, $value, $parameters, $validator) {
            $checkedFields = $validator->getData()['checked_fields'] ?? [];

            return in_array('username', $checkedFields) || in_array('email', $checkedFields);
        });

        Validator::replacer('username_or_email_checked', function ($message, $attribute, $rule, $parameters) {
            return 'Either Username or Email must be checked.';
        });
    }
    }
}
