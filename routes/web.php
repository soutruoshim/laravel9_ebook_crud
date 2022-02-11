<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/create', 'create')->name('categories.create');
    Route::post('/categories', 'store')->name('categories.store');;
    Route::get('/categories/{id}', 'show')->name('categories.show');   
    Route::post('/categories/{id}', 'update')->name('categories.update');  
    Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');  
});
Route::resource('authors','App\Http\Controllers\AuthorController');
Route::resource('books','App\Http\Controllers\BookController');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
