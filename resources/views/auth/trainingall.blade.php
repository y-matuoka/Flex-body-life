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

</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel-heading text-center" style="color: #A59B93;">
            </div>

            <div class="center">
                <h2 class="text-center training-menu" style="color: #A59B93;"><img src="{{ asset('images/腕右.png') }}" alt="" style="max-width: 45px; height: auto;">筋トレ方法一覧<img src="{{ asset('images/腕左.png') }}" alt="" style="max-width: 45px; height: auto;"></h2>

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
            <p style="font-weight: bold; font-size: 28px;color: #A59B93">腹筋</p>
            <a href="{{ route('auth.muscle') }}">
                <img src="{{ asset('images/腹筋.png') }}" alt="" style="max-width: 160px; height: auto;">
            </a>
        </div>
    
        <div class="col-md-4 text-center">
            <p style="font-weight: bold; font-size: 28px;color: #A59B93">腕力</p>
            <a href="{{ route('auth.muscle') }}">
                <img src="{{ asset('images/マッチョ (2).png') }}" alt="" style="max-width: 130px; height: auto;">
            </a>
        </div>
    
        <div class="col-md-4 text-center">
            <p style="font-weight: bold; font-size: 28px;color: #A59B93">バービー</p>
            <a href="{{ route('auth.muscle') }}">
                <img src="{{ asset('images/クラウチングスタート.png') }}" alt="" style="max-width: 160px; height: auto;">
            </a>
        </div>
    </div>    
<br>
{{-- back画像 --}}
<div class="col-md-4 col-md-offset-4 text-center">
    <a href="javascript:history.back()">
  {{-- マイページに飛ぶようにする(現在home) --}}
        <img src="{{ asset('images/back.png') }}" alt="" style="max-width: 60px; height: auto;">
    </a>
  </div>
    <br>
  </div>
  <br>
{{-- ロゴ --}}
<div class="row mt-2">
    <div class="col-md-offset-3 col-md-6 text-center mt-2">
        <img src="{{ asset('images/flex-logo.png') }}" alt="" style="max-width: 70px; height: auto;">
    </div>
</div>
</div>
</div>
@endsection 