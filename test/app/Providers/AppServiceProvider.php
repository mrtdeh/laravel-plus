<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Blade::directive('option', function ($arguments) {

            list($name, $val) = explode(',',str_replace(['(',')',' ', "'"], '', $arguments));
            return "<script>if(!options) var options = [];options['${name}'] = '${val}'</script>";
        });

        Blade::directive('getAppScript', function () {

            return "<script src='<?php echo asset('/js/'.basename(mix('/js/app.js'))) ?>'></script>";
        });
    

        Blade::directive('getAppCss', function () {

            return "<link rel='stylesheet' href='<?php echo asset('/css/'.basename(mix('/css/app.css'))) ?>'/>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
