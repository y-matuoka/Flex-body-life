@extends('layout')

@section('styles')
<link rel="stylesheet" href="/css/user_delete/styles.css">
@endsection

@section('content')

<div class="container">
  <h1 class="museomoderno-title">退会手続き</h1>
  <a href="/mypage">
    <img class="img1" src="{{ asset('images/back.png') }}" alt="buck">
</a>
  <form method="POST" action="{{ route('user.delete') }}">
    @csrf
      <div class="form-group">
          <label for="name" class="museomoderno-title">名前</label>
          <input type="name" class="form-control" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="email" class="museomoderno-title">メールアドレス</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="form-group">
      <label for="password" class="museomoderno-title">パスワード</label>
      <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn1 museomoderno-title">退会へ</button>
  </form>
</div>
@endsection