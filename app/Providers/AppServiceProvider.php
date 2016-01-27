<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Toster\View\ThemeViewFinder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['view']->setFinder($this->app['theme.finder']);

        view()->composer('*', function($view){
            $view->with('currentUser', \Auth::user());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('theme.finder', function($app) {
            $finder = new ThemeViewFinder($app['files'], $app['config']['view.paths']);

            $config = $app['config']['theme'];

            $finder->setBasePath($app['path.public'] . '/' . $config['folder']);
            $finder->setActiveTheme($config['active']);

            return $finder;
        });
    }
}
