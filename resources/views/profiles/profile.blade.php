<x-login-layout>

  <div class="profile_area area">
    <img src="{{ asset('storage/' .$userData->icon_image) }}" alt="ユーザーアイコン" class="user_icon">
    <div class="name_self">
      <div class="name">
        <p class="name_left">ユーザー名</p>
        <p>{{$userData->username}}</p>
      </div>
      <div class="self">
        <p class="self_left">自己紹介</p>
        <p>{{$userData->bio}}</p>
      </div>
    </div>
    <div class="search_li search_right">
      <!-- もし認証ユーザーのfollowings()の中にidがcontains含まれていなかったら -->
      @if (!Auth::user()->followings->contains($userData->id))
      <!-- routeでかく -->
      <form action="{{route('users/follow',$userData)}}" method="post">
        @csrf
        <input type="hidden" name="origin" value="profile">
        <button type="submit" class="btn btn-primary follow">フォローする</button>
      </form>
      @else
      <form action="{{route('users/unfollow',$userData)}}" method="post">
        @csrf
        <input type="hidden" name="origin" value="profile">
        <button type="submit" class="btn btn-danger Unfollow">フォロー解除</button>
      </form>
      @endif
    </div>
  </div>

  <div>
    @foreach ($posts as $post)
    <ul class="post_ul">
      <li class="post_left">
        <img src="{{ asset('storage/' .$post->user->icon_image) }}" alt="ユーザーアイコン" class="user_icon">
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

  </div>











</x-login-layout>
