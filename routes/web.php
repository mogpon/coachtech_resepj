<?php

use App\Models\Shop;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [ShopController::class, 'index2']);

// Route::post('/detail', function () {
//     $items = Shop::all();
//     return view('/detail', ['items' => $items]);
// });
Route::get('/detail',  [ShopController::class, 'index3']);
Route::post('/detail',  [ShopController::class, 'index4']);

Route::get('/mypage', function () {
    return view('mypage');
});
Route::get('/done', function () {
    return view('done');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/thanks', function () {
    return view('thanks');
})->middleware(['auth'])->name('thanks');

Route::post('/thanks', function () {
    return view('thanks');
})->middleware(['auth'])->name('thanks');

require __DIR__.'/auth.php';

Route::resource('/image', ShopController::class);