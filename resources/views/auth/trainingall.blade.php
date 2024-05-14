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
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel-heading text-center" style="color: #A59B93;">
                <div>
                    <img src="{{ asset('images/right.png') }}" alt="" style="max-width: 45px; height: auto;">
                </div>
                <h4>表示したいトレーニング方法を選択してください</h4>
                <div>
                    <img src="{{ asset('images/left.png') }}" alt="" style="max-width: 45px; height: auto;">
                </div>
            </div>
            <h5 class="text-center training-menu">表示したいトレーニング方法のアイコンをクリックしてください</h5>
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
  
    <div class="row.mt-5">
        <div class="col-md-4 text-center">
            <p style="font-weight: bold; font-size: 28px;color: #A59B93">腹筋</p>
            <a href="{{ route('auth.muscle') }}">
                <br>
                <br>
            <img src="{{ asset('images/腹筋.png') }}" alt="" style="max-width: 200px; height: auto;">
        </a>
        </div>


        <div class="col-md-4 text-center">
            <a href="{{ route('auth.muscle') }}">
            <p style="font-weight: bold; font-size: 28px;color: #A59B93">スクワット</p>
            <img src="{{ asset('images/スクワット.png') }}" alt="" style="max-width: 200px; height: auto;">
        </a>
        </div>

        <div class="col-md-4 text-center">
            <a href="{{ route('auth.stretch') }}">
                <p style="font-weight: bold; font-size: 28px;color: #A59B93">ストレッチ</p>
                <img src="{{ asset('images/ストレッチ.png') }}" alt="" style="max-width: 150px; height: auto;">
            </a>
        </div>
    </div>

<div class="row mt-5">
    <div class="col-md-4 text-center">
        <p style="font-weight: bold; font-size: 28px;color: #A59B93">伸脚</p>
        <a href="{{ route('auth.stretch') }}">
            <br>
            <br>
        <img src="{{ asset('images/伸脚.png') }}" alt="" style="max-width: 200px; height: auto;">
    </a>
    </div>

    <div class="col-md-4 text-center">
        <p style="font-weight: bold; font-size: 28px;color: #A59B93">アキレス腱のばし</p>
        <a href="{{ route('auth.stretch') }}">
        <img src="{{ asset('images/ヨガ.png') }}" alt="" style="max-width: 160px; height: auto;">
    </a>
    </div>

    <div class="col-md-4 text-center">
        <p style="font-weight: bold; font-size: 28px;color: #A59B93">ブリッジ</p>
        <a href="{{ route('auth.stretch') }}">
            <br>
            <br>
        <img src="{{ asset('images/ブリッジ.png') }}" alt="" style="max-width: 200px; height: auto;">
    </a>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-4 text-center">

        <p style="font-weight: bold; font-size: 28px;color: #A59B93">腕力</p>
        <a href="{{ route('auth.muscle') }}">
        <img src="{{ asset('images/マッチョ (2).png') }}" alt="" style="max-width: 170px; height: auto;">
    </a>
    </div>

    <div class="col-md-4 text-center">

        <p style="font-weight: bold; font-size: 28px;color: #A59B93">サーキット</p>
        <a href="{{ route('auth.muscle') }}">
        <img src="{{ asset('images/クラウチングスタート.png') }}" alt="" style="max-width: 200px; height: auto;">
    </a>
    </div>

<div class="col-md-4 text-center">
    <p style="font-weight: bold; font-size: 28px;color: #A59B93">腕伸ばし</p>
    <a href="{{ route('auth.stretch') }}">
    <img src="{{ asset('images/ポーズ.png') }}" alt="" style="max-width: 200px; height: auto;">
</a>
</div>
</div>


<div class="col-md-4 text-center">
    <p style="font-weight: bold; font-size: 28px;color: #A59B93">開脚</p>
    <a href="{{ route('auth.stretch') }}">
        <br>
        <br>
    <img src="{{ asset('images/飛ぶ女.png') }}" alt="" style="max-width: 200px; height: auto;">
</a>
</div>


<div class="col-md-4 text-center">
    <p style="font-weight: bold; font-size: 28px;color: #A59B93">背中伸ばし</p>
    <a href="{{ route('auth.stretch') }}">
        <br>
        <br>
        <br>
    <img src="{{ asset('images/伸びの姿勢.png') }}" alt="" style="max-width: 200px; height: auto;">
</a>
</div>

<div class="col-md-4 text-center">
    <p style="font-weight: bold; font-size: 28px;color: #A59B93">アキレス腱伸ばし</p>
    <a href="{{ route('auth.stretch') }}">
    <img src="{{ asset('images/アキレス腱.png') }}" alt="" style="max-width: 160px; height: auto;">
</a>
</div>



{{-- back画像 --}}
<div class="col-md-4 col-md-offset-4 text-center">
    <a href="javascript:history.back()">
  {{-- マイページに飛ぶようにする(現在home) --}}
        <img src="{{ asset('images/back.png') }}" alt="" style="max-width: 200px; height: auto;">
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