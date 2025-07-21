<x-logout-layout>
    <!-- 適切なURLを入力してください -->
    <!-- ユーザー登録機能が書いてる[RegisteredUserController]の[store]に送るために形式はPOSTで -->
    {!! Form::open(['url' => '/register','method'=>'POST']) !!}

    <h2>新規ユーザー登録</h2>

    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input']) }}

    {{ Form::label('メールアドレス') }}
    {{ Form::email('email',null,['class' => 'input']) }}

    {{ Form::label('パスワード') }}
    <!-- パスワードを伏字にするtext→password -->
    {{ Form::password('password',null,['class' => 'input']) }}

    {{ Form::label('パスワード確認') }}
    <!-- パスワードを伏字にするtext→password -->
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}

    {{ Form::submit('新規登録',['class' =>'btn btn-danger']) }}

    <p><a href="login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}


</x-logout-layout>
