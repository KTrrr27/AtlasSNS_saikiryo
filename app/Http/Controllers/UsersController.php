<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use App\Models\User;
use App\Models\Post;


class UsersController extends Controller
{
    public function searchList()
    {
        $users = User::get();
        return view('users.search', ['users' => $users]);
    }
    //
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $users = User::where('username', 'like', '%' . $keyword . '%')->get();
        } else {
            $users = User::all();
        }
        return view(
            'users.search',
            ['users' => $users],
            ['keyword' => $keyword]
        );
    }
    // フォロー機能
    public function follow(User $user, Request $request)
    {
        Follow::firstOrCreate([
            'following_id' => Auth::id(),
            'followed_id' => $user->id,
        ]);
        // プロフィール画面から遷移してきたか判定
        $origin = $request->input('origin');
        if ($origin == 'profile') {
            session(['users-id' => $user->id]);
            return redirect()->route('profile.get');
        } else {
            return back();
        }
    }
    // フォロー解除機能
    public function unfollow(User $user, Request $request)
    {
        Follow::where('following_id', Auth::id())->where('followed_id', $user->id)->delete();
        $origin = $request->input('origin');
        if ($origin == 'profile') {
            session(['users-id' => $user->id]);
            return redirect()->route('profile.get');
        } else {
            return back();
        }
    }
}
