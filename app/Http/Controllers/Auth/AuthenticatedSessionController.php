<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended('top');
    }

    // ログアウト機能
    public function destroy(Request $request)
    {
        // 認証情報削除
        Auth::logout();
        // sessionを無効化する
        $request->session()->invalidate();
        // token合い言葉を再生成する過去の情報を消す
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
