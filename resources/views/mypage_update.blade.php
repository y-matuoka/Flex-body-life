@extends('layout')

@section('styles')
<link rel="stylesheet" href="/css/mypage_update/styles.css">
@endsection

@section('content')

    <div class="form-wrapper">
        <div class="article">
            <div class="update-form">
                <div class="body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- ヘッダー部分 -->
                    <div class="header">
                        <h1 class="museomoderno-title">登録情報変更</h1>
                    </div>

                    <a href="/mypage">
                        <img class="img1" src="{{ asset('images/back.png') }}" alt="buck">
                    </a>

                    <!-- ユーザー情報の変更フォーム -->
                    <div class="form-container">
                        <form method="POST" action="{{ route('update.profile') }}">
                            @csrf

                            <!-- 名前の変更 -->
                            <div class="form-group ">
                                <label for="name" class="museomoderno-title">
                                    名前<img src="{{ asset('images/user_name.png') }}" alt="user_icon" class="icon">
                                </label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}" required autofocus autocomplete="off">
                            </div>

                            <!-- メールアドレスの変更 -->
                            <div class="form-group ">
                                <label for="email" class="museomoderno-title">
                                    メールアドレス<img src="{{ asset('images/mail.png') }}" alt="user_icon" class="icon">
                                </label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', Auth::user()->email) }}" required autocomplete="off">
                            </div>

                            <!-- パスワードの変更 -->
                            <div class="form-group">
                                <label for="password" class="museomoderno-title">
                                    パスワード<img src="{{ asset('images/key.png') }}" alt="user_icon" class="icon">  必要ない場合未入力でも可
                                </label>
                                <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                            </div>

                            <!-- 送信ボタン -->
                            <div class="form-group mt-3 text-center">
                                <button type="submit" class="custom-size" class="museomoderno-title">
                                    変更
                                </button>
                            </div>
                        </form>
                        <footer class="footer1">
                            <img src="{{ asset('images/flex.png') }}" alt="ロゴ">
                    </footer>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // 名前フィールドの値をクリア
                            document.getElementById("name").value = "";
                            // メールアドレスフィールドの値をクリア
                            document.getElementById("email").value = "";
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
