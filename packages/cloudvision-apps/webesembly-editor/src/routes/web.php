<?php


Route::get('/editor', function () {
    return \Inertia\Inertia::render('Editor/Page', [
        'url' => asset('/')
    ]);
});

Route::get('/editor-ui', function () {
    return \Inertia\Inertia::render('Editor/UiPreview', [
        'url' => asset('/')
    ]);
});
