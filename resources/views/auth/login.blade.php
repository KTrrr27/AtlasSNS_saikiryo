<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  <!-- POSTで/loginにデータを送る -->
  {!! Form::open(['url' => '/login', 'method'=>'POST']) !!}

  <p>AtlasSNSへようこそ</p>

  {{ Form::label('email') }}
  {{ Form::text('email',null,['class' => 'input']) }}
  {{ Form::label('password') }}
  {{ Form::password('password',['class' => 'input']) }}

  {{ Form::submit('ログイン',['class' =>'btn btn-danger']) }}

  <p><a href="register">新規ユーザーの方はこちら</a></p>

  {!! Form::close() !!}

</x-logout-layout>
