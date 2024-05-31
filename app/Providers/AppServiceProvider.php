<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
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

       //ローカルで動かす場合はコメントアウト
        // pushするときはデプロイでサーバーに反映されないのでコメントアウト解除してください
    //   URL::forceScheme('https');

    }
}
