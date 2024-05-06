@extends('welcome')
@extends('layout')

@section('content')

<style>
    body, .container {
        overflow: hidden;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel-heading text-center" style="color: #A59B93;">
                <h1>ログイン</h1>
            </div>
            <div class="panel-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email" style="font-size: 18px;">メールアドレス
                            <img src="images/mail.png" alt="" style="width: 20px; height: 20px; margin-left: 5px;">
                        </label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" style="font-size: 18px;">パスワード
                            <img src="images/key.png" alt="" style="width: 20px; height: 20px; margin-left: 5px;">
                        </label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password-confirm" style="font-size: 18px;">パスワード (確認)
                            <img src="images/key.png" alt="" style="width: 20px; height: 20px; margin-left: 5px;">
                        </label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" /><br>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn" style="background-color: #A59B93; color: white; font-size: 22px;">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
           <br> <img src="{{ asset('images/flex-logo.png') }}" alt="" style="max-width: 80px; height: auto;">
        </div>
    </div>
</div>
@endsection
