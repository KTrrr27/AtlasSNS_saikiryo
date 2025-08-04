<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\User;
use App\Models\Post;


class ProfileController extends Controller
{
    // 検索画面からのプロフィール画面
    public function profile(Request $request)
    {
        $userID = $request->input('users-id');
        $userData = User::find($userID);
        // postの情報を降順に取得
        $posts = Post::with('user')
            ->where('user_id', $userID)
            ->orderby('created_at', 'desc')
            ->get();
        return view('profiles.profile', [
            'userData' => $userData,
            'posts' => $posts,

        ]);
    }
    // プロフィール画面からのプロフィール画面
    public function getProfile()
    {
        $userID = session('users-id');
        $userData = User::find($userID);
        // postの情報を降順に取得
        $posts = Post::with('user')
            ->where('user_id', $userID)
            ->orderby('created_at', 'desc')
            ->get();
        return view('profiles.profile', [
            'userData' => $userData,
            'posts' => $posts,
        ]);
    }
    public function profiles()
    {
        return view('profiles.profiles');
    }
}
