@extends('welcome')
@extends('layout')
@section('styles')
<link rel="stylesheet" href="/css/training_list/styles.css">
<style>
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-6 text-center">
            <div class="panel-heading text-center" style="color: #A59B93;">
            </div>
            <div class="center">
                <h2 class="text-center training-menu">
                    <img src="{{ asset('images/腕右.png') }}" alt="" class="logo-1"> 
                    {{-- ここに各コース名を表示させる --}}トレーニング
                    <img src="{{ asset('images/腕左.png') }}" alt="" class="logo-1">
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
        <div class=" text-center">
          {{-- 各画像を表示 --}}
            <img src="{{ asset('images/腹筋2.png') }}" alt="" class="responsive-img">
        </div>
    </div>
</div>
</div>
</div>
<div class="training-text">
  <span class="content">
    ゴイゴイスー
    </span>
</div>


{{--  説明文を表示--}}


<div class="buttons">
  <button type="submit" name="favorite" class="btn-1">お気に入り</button>
    {{-- < href="{{ route('mypage') }}"> --}}
  <button type="submit" name="complete"  class="btn-1">完了</button>
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