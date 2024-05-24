@extends('layout')
@section('styles')
<link rel="stylesheet" href="/css/register/styles.css">
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-md-offset-3 col-md-6">
          <div class="d-table-cell align-middle">
            <div class="text-center mt-4">
              <h3 class="h3 ">Flex body lifeへ ようこそ!</h3>
            </div>
            <div class="card">
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $messages)
                      <p>{{ $messages }}</p>
                    @endforeach
                  </div>
                @endif
                <div class="m-sm-4">
                  <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="name">ニックネーム</label>
                        <span class="log">
                          <img src="{{ asset("images/user_name.png") }}" class="img-fluid" >
                        </span>
                      <input class="form-control form-control-lg" id="name" type="text" name="name" placeholder="例) 渋川 太郎">
                    </div>
                    <div class="form-group">
                      <label for="email">メールアドレス</label>
                        <span class="log">
                          <img src="{{ asset("images/mail.png") }}" class="img-fluid" >
                        </span>
                      <input class="form-control form-control-lg" id="email" type="email" name="email" placeholder="例) shibukawa@email.com">
                    </div>
                    <div class="form-group">
                      <label for="password">パスワード</label>
                        <span class="log">
                          <img src="{{ asset("images/key.png") }}" class="img-fluid" >
                        </span>
                      <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="例) 8文字以上必要です。">
                    </div>
                    <div class="form-group">
                      <label for="password-confirm">パスワード(確認)</label>
                        <span class="log">
                          <img src="{{ asset("images/key.png") }}" class="img-fluid" >
                        </span>
                      <input class="form-control form-control-lg" id="password-confirm" type="password" name="password_confirmation" placeholder="確認のためにもう一度入力してください。">
                    </div>
                    <div class="text-center mt-3">
                      <button type="submit" class="btn btn-lg btn-light">新規登録</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="flex-log">
              <img src="{{ asset("images/flex-logo.png") }}" class="img-fluid" alt="...">
            </div>
          </div>
        </div>
      </div>
    </div>
 @endsection