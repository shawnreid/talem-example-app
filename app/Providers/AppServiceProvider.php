<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Inertia::share('flash', function () { 
            return [
                'message' => session()->get('message'),
            ]; 
        });
    }
}
