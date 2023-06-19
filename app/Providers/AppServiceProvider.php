<?php

namespace App\Providers;

use App\Models\Website\Page;
use App\TailwindXModuleBladeDirectives;
use App\TailwindXModuleManager;
use App\TailwindXModuleTagCompiler;
use App\WebsiteHelper;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        include_once dirname(__DIR__,) . '/website_helpers.php';
        $this->registerTailwindXSingleton();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTagCompiler();

        Blade::directive('live_edit', [TailwindXModuleBladeDirectives::class, 'liveEdit']);

        Model::unguard();

        FilamentNavigation::addItemType('Page link', [
            Select::make('page_id')
                ->label('Select page')
                ->searchable()
                ->options(function () {
                    return Page::pluck('title', 'id');
                })
        ]);

       // Blade::componentNamespace('App\\Views\\Components', 'website');

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }

    protected function registerTailwindXSingleton()
    {
        $this->app->singleton(TailwindXModuleManager::class);
        $this->app->alias(TailwindXModuleManager::class, 'tailwind-x-module');
    }

    protected function registerTagCompiler()
    {
        if (method_exists($this->app['blade.compiler'], 'precompiler')) {
            $this->app['blade.compiler']->precompiler(function ($string) {
                return app(TailwindXModuleTagCompiler::class)->compile($string);
            });
        }
    }
}
