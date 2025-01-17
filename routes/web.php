<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('brands', BrandController::class, [
    'only' => ['index'],
]);

Route::resource('stores', StoreController::class, [
    'only' => ['index', 'show'],
]);

require __DIR__.'/auth.php';
