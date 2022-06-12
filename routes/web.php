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

/**
 * 在庫
 */
// 在庫一覧画面
Route::get('/stock', [StockController::class, "index"]);

// 在庫下限設定画面
Route::get("/stockLowerLimit/{id}", [StockController::class, "edit"]);

// 在庫下限変更機能
Route::post("/stock", [StockController::class, "update"]);


/**
 * 発注
 */
// 発注履歴画面
Route::get('/orderHistory', [OrderHistoryController::class, "index"]);

// 発注履歴削除画面
Route::get('/deleteOrderHistories/{id}', [OrderHistoryController::class, "delete"]);

// 発注履歴削除
Route::post("/orderHistory", [OrderHistoryController::class, "destroy"]);

/** 管理者 */
// 管理者画面
Route::get('/admin', function(){
    return view("admin.admin");
});

// 管理者一覧画面
Route::get("/adminList", [AdminController::class, "index"]);

// 管理者詳細画面
Route::get("/adminDetail/{id}", [AdminController::class, "show"]);

// 管理者作成画面（新規管理者登録）
Route::get("/createAdmin", [AdminController::class, "create"]);

// 管理者作成
Route::post("/dashboard", [AdminController::class, "store"]);

// 管理者編集画面
Route::get("/editAdmin/{id}", [AdminController::class, "edit"]);

// 管理者編集
Route::post("/adminList", [AdminController::class, "update"]);

// 管理者削除画面
Route::get("/deleteAdmin/{id}", [AdminController::class, "delete"]);

// 管理者削除
Route::post("/admin", [AdminController::class, "destroy"]);



