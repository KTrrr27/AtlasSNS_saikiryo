<x-login-layout>
  <div class="edit_container">
    <form class="edit_form" action="">
      <div class="edit_forms">
        <img src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" class="user_icon edit_icon">
        <div class="edit_content">
          <div class="edit">
            <label class="edit_left" for="">ユーザー名</label>
            <input class="edit_right" type="text" value="{{Auth::user()->username}}">
          </div>
          <div class="edit">
            <label class="edit_left" for="">メールアドレス</label>
            <input class="edit_right" type="email" value="{{Auth::user()->email}}">
          </div>
          <div class="edit">
            <label class="edit_left" for="">パスワード</label>
            <input class="edit_right" type="password">
          </div>
          <div class="edit">
            <label class="edit_left" for="">パスワード確認</label>
            <input class="edit_right" type="password">
          </div>
          <div class="edit">
            <label class="edit_left" for="">自己紹介</label>
            <input class="edit_right" type="text" value="{{Auth::user()->bio}}">
          </div>
          <div class="edit">
            <label class="edit_left" for="">アイコン画像</label>
            <label for="file" class="edit_file">ファイルを選択
              <input id="file" class="edit_right " type="file">
            </label>
          </div>
        </div>
      </div>
      <input type="submit" value="更新" class="btn btn-danger edit_btn">
    </form>
  </div>
</x-login-layout>
