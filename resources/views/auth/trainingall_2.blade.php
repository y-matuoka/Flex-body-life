@extends('welcome')
@extends('layout')
@section('styles')
<link rel="stylesheet" href="/css/trainingall.styles.css">
<style>
    body, .container {
        overflow: hidden;
    }
    .panel-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .panel-heading h2 {
        margin: 0;
        font-size: 24px;
    }
    .container-fluid {
        max-height: 100vh; /* 画面の80%までスクロール可能にする */
        overflow-y: scroll; /* 縦方向のスクロールバーを表示する */
    }
    .exercise-title {
        font-weight: bold;
        font-size: 28px;
        color: #A59B93;
    }
    .exercise-img {
        max-width: 160px;
        height: auto;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel-heading text-center" style="color: #A59B93;">
            </div>
            <div class="center">
                <h2 class="text-center training-menu" style="color: #A59B93;"><img src="{{ asset('images/体操右.png') }}" alt="" style="max-width: 45px; height: auto;">ストレッチ方法一覧<img src="{{ asset('images/体操左.png') }}" alt="" style="max-width: 45px; height: auto;">
                </h2>
                <h5 class="text-center training-menu"><img src="{{ asset('images/right.png') }}" alt="" style="max-width: 30px; height: auto;">  表示したいトレーニング方法のアイコンをクリックしてください<img src="{{ asset('images/left.png') }}" alt="" style="max-width: 30px; height: auto;"></h5>
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
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-4 text-center">
            <p class="exercise-title">伸脚</p>
            <br>
            <br>
            <a href="{{ route('auth.stretch') }}">
                <img src="{{ asset('images/伸脚.png') }}" alt="" class="exercise-img">
            </a>
        </div>
        <div class="col-md-4 text-center">
            <p class="exercise-title">スクワット</p>
            <a href="{{ route('auth.stretch') }}">
                <img src="{{ asset('images/スクワット.png') }}" alt="" class="exercise-img" style="max-width: 120px;">
            </a>
        </div>
        <div class="col-md-4 text-center">
            <p class="exercise-title">ストレッチ</p>
            <a href="{{ route('auth.stretch') }}">
                <img src="{{ asset('images/ストレッチ.png') }}" alt="" class="exercise-img" style="max-width: 130px;">
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 text-center">
            <p class="exercise-title">腕伸ばし</p>
            <br>
            <a href="{{ route('auth.stretch') }}">
                <img src="{{ asset('images/ポーズ.png') }}" alt="" class="exercise-img" style="max-width: 130px";>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <p class="exercise-title">アキレス腱のばし1</p>
            <br>
            <a href="{{ route('auth.stretch') }}">
                <img src="{{ asset('images/ヨガ.png') }}" alt="" class="exercise-img" style="max-width: 180px";>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <p class="exercise-title">ブリッジ</p>
            <br>
            <br>
            <a href="{{ route('auth.stretch') }}">
                <img src="{{ asset('images/ブリッジ.png') }}" alt="" class="exercise-img" style="max-width: 180px";>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 text-center">
            <p class="exercise-title">開脚</p>
            <br>
            <br>
            <a href="{{ route('auth.stretch') }}">
                <img src="{{ asset('images/飛ぶ女.png') }}" alt="" class="exercise-img" style="max-width: 180px";>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <p class="exercise-title">背中伸ばし</p>
            <br>
            <br>
            <a href="{{ route('auth.stretch') }}">
                <img src="{{ asset('images/伸びの姿勢.png') }}" alt="" class="exercise-img" style="max-width: 180px";>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <p class="exercise-title">アキレス腱伸ばし2</p>
            <a href="{{ route('auth.stretch') }}">
                <img src="{{ asset('images/アキレス腱.png') }}" alt="" class="exercise-img" style="max-width: 140px";>
            </a>
        </div>
    </div>

{{-- back画像 --}}
<div class="col-md-4 col-md-offset-4 text-center">
    <a href="javascript:history.back()">
  {{-- マイページに飛ぶようにする(現在home) --}}
        <img src="{{ asset('images/back.png') }}" alt="" style="max-width: 60px; height: auto;">
    </a>
    <br>
    <br>
  </div>
{{-- ロゴ --}}
<div class="row mt-2">
    <div class="col-md-offset-3 col-md-6 text-center mt-2">
        <img src="{{ asset('images/flex-logo.png') }}" alt="" style="max-width: 70px; height: auto;">
    </div>
</div>
</div>
</div>
@endsection