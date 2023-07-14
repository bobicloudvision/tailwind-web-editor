<?php


Route::namespace('WebesemblyEditor\Controllers')->group(function() {

    Route::get('/editor', 'WebesemblyEditorController@editor');
    Route::get('/editor-ui', 'WebesemblyEditorController@ui');


    Route::get('/webesembly-editor/webesembly-editor.js', 'WebesemblyAssetsController@editor');
    Route::get('/webesembly-editor/webesembly-iframe.css', 'WebesemblyAssetsController@iframeCss');

});
