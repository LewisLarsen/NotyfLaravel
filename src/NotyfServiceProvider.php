<?php

namespace LewisLarsen\Notyf;

use Illuminate\Support\ServiceProvider;

class NotyfServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/notyf.php', 'notyf');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ .'/resources/views', 'notyf');

        $this->configurePublishing();
        $this->configureHelper();
    }

    /**
     * Configure publishing for the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        $this->publishes([
            __DIR__ . '/config/notyf.php' => config_path('notyf.php'),
        ], 'notyf-config');

        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/notyf'),
        ], 'notyf-views');

    }

    /**
     * Configure helper for the package.
     *
     * @return void
     */
    protected function configureHelper()
    {
        if (file_exists($helper = __DIR__ . '/Http/Helpers/Notyf.php'))
        {
            require_once $helper;
        }
    }
}
