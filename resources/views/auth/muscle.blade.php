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
    }

    /* デスクトップ用 */
    @media (min-width: 769px) {
        .responsive-img {
            max-width: 630px; /* デスクトップ用の幅 */
            height: auto; /* 高さは自動調整 */
        }
        .text-cente {
            font-size: 10px}
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
                    <img src="{{ asset('images/腕右.png') }}" alt="" style="max-width: 45px; height: auto;"> 腹筋方法
                    <img src="{{ asset('images/腕左.png') }}" alt="" style="max-width: 45px; height: auto;">
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
            <img src="{{ asset('images/腹筋2.png') }}" alt="" class="responsive-img">
        </div>
    </div>
</div>

</div>
</div>
<br>
<h4 class="text-center training-menu">
    仰向けに寝て、足に床をつける。指先を頭の後ろに置いて、頭の付け根を支えます。
    <br>
    息を吸いながら、おへそを背中に引き寄せ、あごを少し下に向け、ゆっくりと胸を張り、
    <br>
    背中の上部をマットから浮かせます。トップで筋肉を引き寄せ、息を吸い込みます。
    <br>
    次に息を吐きながら、ゆっくりとマットに戻します。
    <br>
    筋肉を開放するときに息を吸い、それを30回繰り返します。
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