<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function follow(User $user)
    {
        Follow::firstOrCreate([
            'following_id' => Auth::id(),
            'followed_id' => $user->id,
        ]);
        return back();
    }
    // フォロー解除機能
    public function unfollow(User $user)
    {
        Follow::where('following_id', Auth::id())->where('followed_id', $user->id)->delete();
        return back();
    }
}
