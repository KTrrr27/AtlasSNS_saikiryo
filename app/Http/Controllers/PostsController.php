<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index()
    {
        //認証情報のフォローIDを準備
        $user = auth()->user();
        //認証済みのIDがフォローしているID取得
        $followingIDs = $user->followings()->pluck('users.id')->toArray();
        //自分のID追加
        $userIDs = array_merge($followingIDs, [auth()->id()]);
        // postの情報を降順に取得
        $posts = Post::with('user')
            ->whereIn('user_id', $userIDs)
            ->orderby('created_at', 'desc')
            ->get();
        return view('posts.index', ['posts' => $posts]);
    }

    // バリデーションチェックして認証済みのuser_idに紐づけて保存する
    //画面をtopに戻す
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'post' => 'required|max:150',
        ]);
        Post::create([
            'post' => $validated['post'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('top');
    }

    //削除
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->route('top');
    }

    // 更新
    public function update(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'post' => 'required|max:150',
        ]);
        // inputで送られてきたnameを探す
        $id = $request->input('post-id');
        $up_post = $request->input('post');

        Post::where('id', $id)->update([
            'post' => $up_post
        ]);
        return redirect()->route('top');
    }
}
