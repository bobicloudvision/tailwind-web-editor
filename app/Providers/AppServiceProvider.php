<?php

namespace App\Providers;

use App\Models\Website\Page;
use App\WebsiteHelper;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;
use WebesemblyEditor\WebesemblyModule;
use WebesemblyEditor\WebesemblyModuleBladeDirectives;
use WebesemblyEditor\WebesemblyModuleManager;
use WebesemblyEditor\WebesemblyModuleTagCompiler;
use WebesemblyEditor\View\WebesemblyComponents\Alert;
use WebesemblyEditor\View\WebesemblyComponents\Logo;
use WebesemblyEditor\View\WebesemblyComponents\Menu;
use WebesemblyEditor\View\WebesemblyComponents\SocialLinks;
use WebesemblyEditor\View\WebesemblyComponents\Text;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
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
}
