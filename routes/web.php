<?php

use Illuminate\Support\Facades\Route;

$routes = [
    '/' => 'index',
    'sadrzaj' => 'sadrzaj',
    'apartmani' => 'apartmani', 
    'o-nama' => 'o-nama', 
    'tehnicki-prikaz' => 'tehnicki-prikaz',
    'lokacija' => 'lokacija',
    'sprat/1' => 'prizemlje',
    'sprat/2' => 'sprat-1',
    'sprat/3' => 'sprat-2',
    'sprat/4' => 'sprat-3',
    'sprat/5' => 'sprat-4',
    'sprat/6' => 'sprat-5',
    'sprat/7' => 'sprat-6',
    'sprat/8' => 'sprat-7',
    'sprat/9' => 'sprat-8',
    'najam-apartmana' => 'najam-apartmana',
    'kupovina' => 'kupovina'
];
Route::get('galerija', [App\Http\Controllers\HomeController::class, 'gallery']);
// Route::get('sprat/{id}', [App\Http\Controllers\HomeController::class, 'floors']);
Route::get('apartmani/{id}', [App\Http\Controllers\HomeController::class, 'apartmant']);
Route::post('kontakt', [App\Http\Controllers\HomeController::class, 'contact']);

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

    // Route::resource('menu', 'App\Http\Controllers\MenuController')->except('show');
    // Route::post('menu/ajax', 'App\Http\Controllers\MenuController@ajax');    

    Route::resource('apartments', 'App\Http\Controllers\ApartmentController')->except('show');
    Route::post('apartments/ajax', 'App\Http\Controllers\ApartmentController@ajax'); 
    
    Route::resource('sliders', 'App\Http\Controllers\SliderController')->except('show');
    Route::post('sliders/ajax', 'App\Http\Controllers\SliderController@ajax');    

    Route::resource('floors', 'App\Http\Controllers\FloorController')->except('show');
    Route::post('floors/ajax', 'App\Http\Controllers\FloorController@ajax');  

    Route::resource('messages', 'App\Http\Controllers\MessageController')->except('show');
    Route::post('messages/ajax', 'App\Http\Controllers\MessageController@ajax');  

    Route::resource('settings', 'App\Http\Controllers\SettingsController')->only('update', 'edit');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');