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
<h1 class="text-center training-menu"><img src="{{ asset('images/腕右.png') }}" alt="" style="max-width: 45px; height: auto;">腹筋<img src="{{ asset('images/腕左.png') }}" alt="" style="max-width: 45px; height: auto;"></h1>
                <h4 class="text-center training-menu"><img src="{{ asset('images/right.png') }}" alt="" style="max-width: 45px; height: auto;">   表示したいトレーニング方法のアイコンをクリックしてください  <img src="{{ asset('images/left.png') }}" alt="" style="max-width: 45px; height: auto;"></h4>
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

{{-- 方法 --}}

<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12 text-center">
            <img src="{{ asset('images/stretch.png') }}" alt="" style="max-width: 900px; height: auto;">
        </div>
    </div>
</div>

<div class="container-fluid">
<div class="row justify-content-center mt-5">
<h4>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</h4>

<br>
<br>

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