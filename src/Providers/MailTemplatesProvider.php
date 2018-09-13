<?php

namespace Grundmanis\Laracms\Modules\MailTemplate\Providers;

use Grundmanis\Laracms\Modules\Pages\Exception\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Grundmanis\Laracms\Facades\MenuFacade;

class MailTemplatesProvider extends ServiceProvider
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
        $this->addMenuRoutes();
    }

    private function addMenuRoutes()
    {
        $menu = [
            'Mail Template' => 'laracms.mail-template',
        ];

        MenuFacade::addMenu($menu);
    }

}
