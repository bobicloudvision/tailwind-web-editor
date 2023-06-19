<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', '\App\Http\Controllers\WebsiteController@homepage')->name('website.homepage');
Route::get('{slug}', '\App\Http\Controllers\WebsiteController@page')->name('website.page');


Route::get('/editor', function () {
    return Inertia::render('Editor/Page', [

    ]);
});

Route::get('/live-edit-page/{id}', function ($id) {
    return view('live-edit-page');
})->name('live-edit-page');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
