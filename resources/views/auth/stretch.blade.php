@extends('welcome')
@extends('layout')
@section('styles')
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
        max-height: 100vh;
    }

    /* レスポンシブ対応 */
    @media (max-width: 768px) {
        .responsive-img {
            max-width: 320px; /* レスポンシブデバイス用の幅 */
            height: auto; /* 高さは自動調整 */
        }
        .training-menu {
            font-size: 16px; /* スマートフォン用の文字サイズ */
        }
    }

    /* デスクトップ用 */
    @media (min-width: 769px) {
        .responsive-img {
            max-width: 630px; /* デスクトップ用の幅 */
            height: auto; /* 高さは自動調整 */
        }
        .text-cente {
            font-size: 10px;
        }
        .training-menu {
            font-size: 24px; /* デスクトップ用の文字サイズ */
        }
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-6 text-center"> <!-- 修正 -->
            <div class="panel-heading text-center" style="color: #A59B93;">
            </div>

            <div class="center">
                <h2 class="text-center training-menu">
                    <img src="{{ asset('images/体操右.png') }}" alt="" style="max-width: 45px; height: auto;"> ストレッチ方法
                    <img src="{{ asset('images/体操左.png') }}" alt="" style="max-width: 45px; height: auto;">
                </h2>
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
</div>
<div class="container-fluid">
    <div class="row justify-content-center mt-5"> <!-- 修正 -->
        <div class="col-md-12 text-center">
            <img src="{{ asset('images/stretch.png') }}" alt="" class="responsive-img">
        </div>
    </div>
</div>

</div>
</div>
<br>
<h4 class="text-center training-menu">
    仰向けに寝て両手を伸ばし、両手は横に置き、頭と肩をマットから浮かせます。
    <br>
    腕の動きを維持し、この動きで5回短く息を吐き、このパターンを続けます。
    <br>
    腕を少し上下に動かしながら、腕の動きに合わせて合わせて5回ほど短い呼吸をします。
    <br>
    腕の動きを維持し、この動きで5回短く息を吐き、このパターンを続けます。
    <br>
</h4>
<div class="text-center">
    <a href="{{ route('mypage') }}">
    <button type="submit" class="btn" style="background-color: #A59B93; color: white; font-size: 25px;font-family: MuseoModerno, sans-serif;">
    My Page
    </button></a>
</div>
<br>
<footer>
<div class="row mt-2">
    <div class="col-md-offset-3 col-md-6 text-center mt-2">
        <img src="{{ asset('images/flex-logo.png') }}" alt="" style="max-width: 80px; height: auto;">
    </div>
</div>
</footer>
@endsection
