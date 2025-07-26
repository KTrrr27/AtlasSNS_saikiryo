<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;


class FollowsController extends Controller
{
    //
    public function followList()
    {
        $users = User::get();

        //認証情報のフォローIDを準備
        $user = auth()->user();
        //認証済みのIDがフォローしているID取得
        $followingIDs = $user->followings;
        // postの情報を降順に取得
        $posts = Post::with('user')
            ->whereIn('user_id', $followingIDs->pluck('id'))
            ->orderby('created_at', 'desc')
            ->get();
        return view('follows.followList', ['followingIDs' => $followingIDs, 'posts' => $posts]);
    }
    public function followerList()
    {
        $users = User::get();

        //認証情報のフォローIDを準備
        $user = auth()->user();
        //認証済みのIDがフォローしているID取得
        $followerIDs = $user->followers;
        // postの情報を降順に取得
        $posts = Post::with('user')
            ->whereIn('user_id', $followerIDs->pluck('id'))
            ->orderby('created_at', 'desc')
            ->get();
        return view('follows.followerList', ['followerIDs' => $followerIDs, 'posts' => $posts]);
    }
    public function profile() {}
}
