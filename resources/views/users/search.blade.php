<x-login-layout>
  <div class="search_area area">
    <form action="/search" method="post">
      @csrf
      <input type="text" name="keyword" class="search_form" placeholder="ユーザー名">
      <input type="image" src="images/search.png" class="search_icon" alt="検索ボタン">

    </form>
    <div class="search_text">
      <!-- 検索keyword表示 または⁇ ''空 -->
      <p>検索ワード：{{ $keyword ?? ''}}</p>
    </div>
  </div>

  <div class="search_list">
    <!-- ユーザーの全て -->
    @foreach ($users as $user)
    <!-- 条件に一致する場合はスキップ -->
    @continue($user->id==auth()->id())
    <ul class="search_li search_tr">
      <div class="search_li search_left">
        <li><img src="{{ asset('images/' . $user->icon_image) }}" alt="ユーザーアイコン" class="user_icon"></li>
        <li>{{ $user->username }}</li>
      </div>
      <div class="search_li search_right">
        <li><a href="" class="btn btn-primary">フォローする</a> </li>
        <li><a href="" class="btn btn-danger">フォロー解除</a> </li>
      </div>
    </ul>
    @endforeach
  </div>
</x-login-layout>
