<x-login-layout>
  <div class="edit_container">
    {!! Form::open
    (['url'=>'/ProfileUpdate',
    'method'=>'post',
    'id'=>'edit_form',
    'class'=>'edit_form',
    'enctype'=>'multipart/form-data'])!!}
    <div class="edit_forms">
      <img src="{{ asset('storage/' . Auth::user()->icon_image) }}" alt="ユーザーアイコン" class="user_icon edit_icon">
      <div class="edit_content">
        <div class="edit">
          {{ Form::label('username','ユーザー名',['class'=>'edit_left'])}}
          {{ Form::text('username',Auth::user()->username,
            ['class'=>'edit_right',
            'id'=>'username',
            'minlength'=>2,
            'maxlength'=>12,
            'required']) }}
        </div>
        <div class="edit">
          {{ Form::label('email','メールアドレス',['class'=>'edit_left'])}}
          {{ Form::email('email',Auth::user()->email,
            ['class' => 'edit_right',
            'id'=>'email',
            'minlength'=>5,
            'maxlength'=>40,
            'required' ]) }}
        </div>
        <div class="edit">
          {{ Form::label('password','パスワード',['class'=>'edit_left'])}}
          {{ Form::password('password',
            ['class' => 'edit_right',
            'id'=>'password',
            'minlength'=>8,
            'maxlength'=>20,
            'pattern'=>'^[a-zA-Z0-9]+$',
            'title'=>'英数字のみ使用できます']) }}
        </div>
        <div class="edit">
          {{ Form::label('password_confirmation','パスワード確認',['class'=>'edit_left'])}}
          {{ Form::password('password_confirmation',
            ['class' => 'edit_right',
            'id'=>'password_confirmation',
            'minlength'=>8,
            'maxlength'=>20
            ]) }}
        </div>
        <div class="edit">
          {{ Form::label('userMessage','自己紹介',['class'=>'edit_left'])}}
          {{ Form::text('userMessage',Auth::user()->bio,
            ['class'=>'edit_right',
            'id'=>'userMessage',
            'maxlength'=>150]) }}
        </div>
        <div class="edit">
          {{ Form::label('','アイコン画像',['class'=>'edit_left'])}}
          <label for="icon_image" class="edit_file">ファイルを選択</label>
          {{ Form::file('icon_image',
            ['class'=>'edit_right',
            'id'=>'icon_image']) }}
        </div>
      </div>
    </div>
    <input type="submit" value="更新" class="btn btn-danger edit_btn">
    {!! Form::close() !!}
  </div>
</x-login-layout>
