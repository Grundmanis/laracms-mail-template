<?php

namespace Grundmanis\Laracms\Modules\MailTemplate\Providers;

use Illuminate\Support\ServiceProvider;

class MailTemplateProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'laracms.mail-template');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
