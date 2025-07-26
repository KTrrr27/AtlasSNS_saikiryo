<x-login-layout>
  <div class="follow-list area">
    <h1 class="list-title">フォローリスト</h1>
    <div class="follow-icon">
      @foreach($followingIDs as $user)
      @continue($user->id==auth()->id())
      <!-- routeでかく -->
      <form action="{{route('profile')}}" method="post">
        @csrf
        <input type="hidden" class="users_id" name="users-id" value="{{$user->id}}">
        <input type="image" src="{{ asset('images/' . $user->icon_image) }}" alt="ユーザーアイコン" class="list_icon">
      </form>
      @endforeach
    </div>
  </div>
  @foreach ($posts as $post)
  <ul class="post_ul">
    <li class="post_left">
      <!-- routeでかく -->
      <form action="{{route('profile')}}" method="post">
        @csrf
        <input type="hidden" class="users_id" name="users-id" value="{{$user->id}}">
        <input type="image" src="{{ asset('images/' . $post->user->icon_image) }}" alt="ユーザーアイコン" class="list_icon">
      </form>
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
