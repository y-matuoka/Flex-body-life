<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Flex-body-life</Flex-body-life></title>
  <link rel="stylesheet" href="/css/toppage//styles.css">
</head>
<body>
  <div class="container">
    {{-- ロゴ画像 --}}
    <img src="{{ asset('images/flex-logo.png') }}" alt="flex-logo">
  </div>

        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif

  <div class="btn-container">
    <a href="{{ route('register')}}" class="btn btn-lg">新規登録</a>
    <a href="{{ route('login') }}" class="btn btn-lg">ログイン</a>

</div>
</body>
</html>