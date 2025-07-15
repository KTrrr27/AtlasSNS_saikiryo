<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index()
    {
        return view('posts.index');
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
}
