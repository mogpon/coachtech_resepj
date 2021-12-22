<?php

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
// 店舗情報追加画面
Route::get('/image', [ShopController::class, 'index'])->name('image_get');
Route::post('/image', [ShopController::class, 'store'])->name('image_post');
// ホーム（店舗一覧）表示
Route::get('/', 'ShopController@search')->name('searcharea');
// 検索バー
Route::get('show', 'ShopController@show')->name('show');
// 詳細画面へ（「詳しく見る」クリック時）
Route::get('/detail/{shopId}',  [ShopController::class, 'detail'])->name('detail');
// お気に入り追加・削除 index.blade.php
Route::post('/favorites/{shop}', 'FavoriteController@store')->name('favorites');
Route::post('/unfavorites/{shop}', 'FavoriteController@destroy')->name('unfavorites');
// 予約完了画面へ（「予約」クリック時）
Route::post('/done',[ShopController::class, 'reserve'])->name('reserve');
// マイページ
Route::get('/mypage', [ShopController::class, 'mypage']);
Route::post('/mypage', [ShopController::class, 'reserve_del'])->name('reserve_del');

// 新規登録完了画面
Route::get('/thanks', function () {
    return view('thanks');
})->name('thanks');
Route::post('/thanks', function () {
    return view('thanks');
})->name('thanks');

// 認証機能
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

