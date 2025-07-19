<x-login-layout>

  <div class="post_area">
    <img src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" class="user_icon">
    {{ Form::open(['url' => '/post', 'method'=>'post', 'class' =>'post_form']) }}
    {{ Form::textarea('post',null,[
      'required',
      'class'=>'form-control',
      'maxlength'=>150,
      'placeholder'=>'投稿内容を入力してください'])}}
    <input type="image" src="images/post.png" class="post_icon" alt="送信ボタン">
    {{ Form::close() }}
  </div>


  投稿画面の下に一覧表示<br>
  ・自分の投稿と<br>
  ・フォローしている人の投稿<br>
  ・日付と時刻の若い順に<br>
  @foreach ($posts as $post)
  <ul>
    <li class="post_left">
      <img src="{{ asset('images/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" class="user_icon">
      <div>
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->post }}</p>
      </div>
    </li>
    <li>
      <p>{{ $post->created_at }}</p>
      <!-- postのidと認証済みのidが一致したら -->
      @if ($post->user_id == auth()->id())
      <a class="js_modal_open" post="{{ $post->post }}" post-id="{{ $post->id }}">
        <input type="image" src="images/edit.png" class="post_icon" alt="編集ボタン">
      </a>
      <a href="/post/{{ $post->id }}/delete" class="trash_box" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
        <input type="image" src="images/trash.png" class="post_icon trash" alt="削除ボタン">
        <input type="image" src="images/trash-h.png" class="post_icon trash_hover" alt="削除ボタン">
      </a>
      @endif
    </li>
  </ul>
  @endforeach
  <div class="modal js_modal">
    <div class="modal_bg js_modal_close"></div>
    <div class="modal_content">
      <form class="modal_form" action="/post/update">
        <textarea name="post" id="modal_post" class="modal_post" maxlength="150"></textarea>
        <input type="hidden" class="modal_id" name="post-id" value="">
        <input type="image" src="images/edit.png" class="modal_icon" alt="編集ボタン">
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</x-login-layout>
