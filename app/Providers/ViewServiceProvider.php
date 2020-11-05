<?php

namespace App\Providers;
use App\Models\Client;
use App\User;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.projects.fields'], function ($view) {
            $userItems = Client::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        //
    }
}
