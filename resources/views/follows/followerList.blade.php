<x-login-layout>
  <div class="follow-list area">
    <h1 class="list-title">フォローリスト</h1>
    <ul>
      @foreach($followerIDs as $user)
      @continue($user->id==auth()->id())
      <a href="">
        <li><img src="{{ asset('images/' . $user->icon_image) }}" alt="ユーザーアイコン" class="list_icon"></li>
      </a>
      @endforeach
    </ul>
  </div>
  @foreach ($posts as $post)
  <ul class="post_ul">
    <li class="post_left">
      <a href="">
        <img src="{{ asset('images/' .$post->user->icon_image) }}" alt="ユーザーアイコン" class="user_icon">
      </a>
      <div>
        <p>{{ $post->user->username }}</p>
        <!-- 改行 !! nl2br !! -->
        <p>{!! nl2br( $post->post ) !!}</p>
      </div>
    </li>
    <li class="post_right">
      <p>{{ $post->created_at }}</p>
    </li>
  </ul>
  @endforeach
</x-login-layout>
