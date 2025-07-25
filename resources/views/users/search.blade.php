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
        <!-- もし認証ユーザーのfollowings()の中にidがcontains含まれていなかったら -->
        @if (!Auth::user()->followings->contains($user->id))
        <li>
          <!-- routeでかく -->
          <form action="{{route('users/follow',$user)}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary follow">フォローする</button>
          </form>
        </li>
        @else
        <li>
          <form action="{{route('users/unfollow',$user)}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger Unfollow">フォロー解除</button>
          </form>
        </li>
        @endif
      </div>
    </ul>
    @endforeach
  </div>
</x-login-layout>
