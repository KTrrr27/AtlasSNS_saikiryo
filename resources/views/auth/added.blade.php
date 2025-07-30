<x-logout-layout>
  <div id="clear">
    <!-- セッションに格納されていた値を取り出す -->
    <p>{{ session('username') }}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>

    <p><a href="login" class="btn btn-danger">ログイン画面へ</a></p>
  </div>
</x-logout-layout>
