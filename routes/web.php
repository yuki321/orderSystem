<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, "index"]
)->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// 商品一覧画面
Route::get('/item', [ItemController::class, "index"]);

// 在庫一覧画面
Route::get('/stock', [StockController::class, "index"]);

// 発注履歴画面
Route::get('/orderHistory', [OrderHistoryController::class, "index"]);

/** 管理者 */
// 管理者画面
Route::get('/admin', function(){
    return view("admin.admin");
});

// 管理者一覧画面
Route::get("/adminList", [AdminController::class, "index"]);

// 管理者作成画面（新規管理者登録）
Route::get("/createAdmin", [AdminController::class, "create"]);

// 管理者作成
Route::post("/adminList", [AdminController::class, "store"]);

// 管理者編集画面
Route::get("/editAdmin/{id}", [AdminController::class, "edit"]);

// 管理者編集
Route::post("/adminList", [AdminController::class, "update"]);

