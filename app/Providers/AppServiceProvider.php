<?php

namespace App\Providers;

use App\Models\Website\Page;
use App\TailwindXModule;
use App\TailwindXModuleBladeDirectives;
use App\TailwindXModuleManager;
use App\TailwindXModuleTagCompiler;
use App\View\TailwindXComponents\Alert;
use App\View\TailwindXComponents\Logo;
use App\View\TailwindXComponents\Menu;
use App\View\TailwindXComponents\Text;
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

        TailwindXModule::component('alert', Alert::class);
        TailwindXModule::component('menu', Menu::class);
        TailwindXModule::component('text', Text::class);
        TailwindXModule::component('logo', Logo::class);

        Blade::directive('tailwind_x_module', [TailwindXModuleBladeDirectives::class, 'module']);

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
