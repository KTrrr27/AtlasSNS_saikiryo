<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 情報登録前にバリデーション
        $request->validate([
            //文字列であることを保障するなら'string'追加

            //'regex:/^[a-zA-Z0-9-_]+$/'　「半角英数字」と「_」と「-」のみOKにしたいなら
            //regex:/ ：正規表現を使う宣言
            // ^ ：文字列の先頭からルールを適応する
            //[許可するリスト：a-zA-Z0-9-_]これだと「半角英数字」と「_」と「-」がOK
            // + ：1文字以上の繰り返しを許可
            // $/：終了宣言

            'username' => ['required', 'min:2', 'max:12'],
            //required：必須かどうか　最小　最大　unique(ユニーク):存在していないか　email：メール形式であるか
            'email' => ['required', 'min:5', 'max:40', 'unique:users,email', 'email'],
            //alpha_num：英数字であるかどうか
            //confirmed：password_confirmationと一致の確認
            'password' => ['required', 'alpha_num', 'min:8', 'max:20', 'confirmed'],
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // return redirect('added');
        //redirect()->with()でページを渡すときに一緒に値も渡す
        //usernameという名前の箱に「$request->username」の値をsessionと一緒に持っていく
        return redirect('added')->with('username', $request->username);
    }

    public function added(): View
    {
        return view('auth.added');
    }
}
