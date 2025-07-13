<x-login-layout>

  <div class="post_area">
    <img src="images/icon1.png" alt="" class="post_icon">
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
</x-login-layout>
