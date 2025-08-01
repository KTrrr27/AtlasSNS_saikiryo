<?php
// ログアウトのために追加↓
use App\Http\Controllers\Auth\AuthenticatedSessionController;
//フォローフォロワー画面遷移
use App\Http\Controllers\FollowsController;

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

  //postを保存する
  Route::post('post', [PostsController::class, 'store'])->name('post');

  // update
  Route::get('/post/update', [PostsController::class, 'update']);

  //postの削除
  Route::get('/post/{id}/delete', [PostsController::class, 'delete']);


  Route::get('profile', [ProfileController::class, 'profile']);

  // Route::get('search', [UsersController::class, 'index']);
  Route::get('search', [UsersController::class, 'searchList']);

  Route::post('search', [UsersController::class, 'search']);

  // フォロー機能
  //routeで記述した際はname必須
  Route::post('users/{user}/follow', [UsersController::class, 'follow'])->name('users/follow');
  // フォロー解除機能
  Route::post('users/{user}/unfollow', [UsersController::class, 'unfollow'])->name('users/unfollow');

  // ログアウト機能
  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

  // フォローフォロワー画面
  Route::get('follow-list', [FollowsController::class, 'followList']);
  Route::get('follower-list', [FollowsController::class, 'followerList']);
  // profile画面
  Route::post('profile', [ProfileController::class, 'profile'])->name('profile');
  Route::get('profile', [ProfileController::class, 'getProfile'])->name('profile.get');
});
