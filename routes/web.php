<?php

use Illuminate\Support\Facades\Route;

$routes = [
    '/' => 'index',
];
Route::post('show-options', [App\Http\Controllers\HomeController::class, 'showOptions']);

Route::post('konfigurator', [App\Http\Controllers\HomeController::class, 'konfigurator']);

Route::group(['prefix' => 'en'], function () use ($routes) {
    foreach ($routes as $uri => $view) {
        Route::get($uri, fn() => view($view));
    }
    Route::get('galerija', [App\Http\Controllers\HomeController::class, 'gallery']);
    // Route::get('sprat/{id}', [App\Http\Controllers\HomeController::class, 'floors']);
    Route::get('apartmani/{id}', [App\Http\Controllers\HomeController::class, 'apartmant']);
    Route::post('kontakt', [App\Http\Controllers\HomeController::class, 'contact']);

});

foreach ($routes as $uri => $view) {
    Route::get($uri, fn() => view($view));
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/', 'index');

Route::get('sitemap.xml', 'App\Http\Controllers\SitemapController@index');

Auth::routes(['verify' => false, 'register' => false]);

Route::group(['prefix' => 'cms', 'middleware' => ['auth', 'active']], function() {

    Route::get('/', function () { return view('cms.index'); });
    
    Route::resource('users', 'App\Http\Controllers\UsersController')->except('show');
    Route::post('users/ajax', 'App\Http\Controllers\UsersController@ajax');

    Route::resource('galleries', 'App\Http\Controllers\GalleryController')->except('show');
    Route::controller(App\Http\Controllers\GalleryController::class)->prefix('galleries')->group(function () {
        Route::post('/ajax', 'ajax');    
        Route::post('/{id}/upload', 'upload');
        Route::delete('/{id}/delete', 'delete');
    });

    Route::resource('albums', 'App\Http\Controllers\AlbumController')->except('show');

    Route::resource('texts', 'App\Http\Controllers\TextController')->only('index','update','edit');
    Route::controller(App\Http\Controllers\TextController::class)->prefix('texts')->group(function () {
        Route::post('/ajax',  'ajax');  
        Route::get('/detail/{id}', 'detail'); 
        Route::post('/ajax-detail/{id}', 'ajaxDetail');  
        Route::get('/meta/{id}/edit', 'meta');  
        Route::get('/imagedelete/{id}', 'removeImage');
    });

    Route::resource('products', 'App\Http\Controllers\ProductController')->except('show');
    Route::post('products/ajax', 'App\Http\Controllers\ProductController@ajax');  
    
    Route::resource('product-position', 'App\Http\Controllers\ProductPositionController')->except('show');
    Route::post('product-position/ajax', 'App\Http\Controllers\ProductPositionController@ajax');   

    Route::resource('options', 'App\Http\Controllers\OptionController')->except('show');
    Route::post('options/ajax', 'App\Http\Controllers\OptionController@ajax');

    Route::resource('option-items', 'App\Http\Controllers\OptionItemController')->except('show');
    Route::post('option-items/ajax/{id}', 'App\Http\Controllers\OptionItemController@ajax');
    Route::get('option-items/{id}', 'App\Http\Controllers\OptionItemController@index');
    Route::get('option-items/create/{id}', 'App\Http\Controllers\OptionItemController@create');

    Route::resource('settings', 'App\Http\Controllers\SettingsController')->only('update', 'edit');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');