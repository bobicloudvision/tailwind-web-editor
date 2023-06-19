<?php

namespace App\Providers;

use App\Models\Website\Page;
use App\WebsiteHelper;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
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

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
