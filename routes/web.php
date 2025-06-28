<?php
// ログアウトのために追加↓
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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



require __DIR__ . '/auth.php';
//groupの中はmiddlewareで（auth：認証）されているものだけ
//認証されていない場合はloginと名前の付いている場所へ移動
//function()：無名関数：クロージャ：その場だけで使う関数
Route::middleware('auth')->group(function () {

  // nameで一致させられるようにnameを付けてあげる
  Route::get('top', [PostsController::class, 'index'])->name('top');

  Route::get('profile', [ProfileController::class, 'profile']);

  Route::get('search', [UsersController::class, 'index']);

  Route::get('follow-list', [PostsController::class, 'index']);
  Route::get('follower-list', [PostsController::class, 'index']);

  // ログアウト機能
  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
