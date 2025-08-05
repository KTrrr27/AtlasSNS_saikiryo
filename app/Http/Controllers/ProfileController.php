<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\Hash;


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

    // ユーザー情報の更新
    public function ProfileUpdate(Request $request)
    {
        // 情報登録前にバリデーション
        $request->validate([
            'username' => ['required', 'min:2', 'max:12'],

            'email' => ['required', 'min:5', 'max:40', 'unique:users,email', 'email'],

            'password' => ['required', 'alpha_num', 'min:8', 'max:20', 'confirmed'],
        ]);

        // $user =Auth::user();
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $userMessage = $request->input('userMessage');

        if ($request->hasFile('icon_image')) {
            $image_name = $request->file('icon_image')->getClientOriginalName();
            $icon_path = $request->file('icon_image')->storeAs('', $image_name, 'public');
        } else {
            $icon_path = Auth::user()->icon_image;
        }

        User::where('id', Auth::id())->update([
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
            'bio' => $userMessage,
            'icon_image' => $icon_path,
        ]);

        return redirect()->route('top');
    }
}
