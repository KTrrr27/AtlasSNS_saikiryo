<x-logout-layout>
    <!-- 適切なURLを入力してください -->
    <!-- ユーザー登録機能が書いてる[RegisteredUserController]の[store]に送るために形式はPOSTで -->
    {!! Form::open(['url' => '/register','method'=>'POST', 'id'=>'form']) !!}

    <h2>新規ユーザー登録</h2>

    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,
        ['class' => 'input',
        'id'=>'username',
        'minlength'=>2,
        'maxlength'=>12,
        'required']) }}

    {{ Form::label('メールアドレス') }}
    {{ Form::email('email',null,
        ['class' => 'input',
        'id'=>'email',
        'minlength'=>5,
        'maxlength'=>40,
        'required' ]) }}

    {{ Form::label('パスワード') }}
    <!-- パスワードを伏字にするtext→password -->
    {{ Form::password('password',
        ['class' => 'input',
        'id'=>'password',
        'minlength'=>8,
        'maxlength'=>20,
        'required']) }}

    {{ Form::label('パスワード確認') }}
    <!-- パスワードを伏字にするtext→password -->
    {{ Form::password('password_confirmation',
        ['class' => 'input',
        'id'=>'password_confirmation',
        'minlength'=>8,
        'maxlength'=>20,
        'required']) }}

    {{ Form::submit('新規登録',
        ['class' =>'btn btn-danger',
        'id'=>'form_submit']) }}

    <p><a href="login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}


</x-logout-layout>
