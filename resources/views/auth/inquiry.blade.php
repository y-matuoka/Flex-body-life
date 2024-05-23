@extends('layout')

@section('styles')
<link rel="stylesheet" href="/css/inquiry/styles.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">お問い合わせ</div>

                <div class="card-body">
                    <form method="post" action="{{ route('inquiry.confirm') }}">
                        @csrf
                        {{-- セッションに保存した入力内容をフォームに再表示 --}}
                        <?php
                            $oldEmail = old('email') ?? session('email');
                            $oldContact = old('contact') ?? session('contact');
                        ?>
                        <div class="form-group1">
                            <label for="email" class="">メールアドレス</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="col-md-9">
                                <input id="email" type="text" class="form-control1 @error('email') is-invalid @enderror" name="email" value="{{ $oldEmail }}" autofocus autocomplete="on">
                            </div>
                        </div>

                        <div class="form-group2">
                            <label for="contact" class="">お問い合わせ内容</label>
                            @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="col-md-9">
                                <textarea id="contact" class="form-control2 @error('contact') is-invalid @enderror" name="contact" cols="30" rows="10" autocomplete="on">{{ $oldContact }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn">
                                    お問い合わせ内容の確認へ
                                </button>
                            </div>
                        </div>
                    </form>
                    <footer class="footer1">
                        <div class="footer2">
                            <img src="{{ asset('images/flex-logo.png') }}" alt="ロゴ">
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
