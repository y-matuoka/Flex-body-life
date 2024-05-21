@extends('welcome')
@extends('layout')
@section('styles')
<link rel="stylesheet" href="/css/training_list/styles.css">
<style>
</style>
@endsection
@section('content')
<div class="container">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-6 text-center">
            <div class="panel-heading text-center" style="color: #A59B93;">
            </div>
            <div class="center">
                <h2 class="text-center training-menu">
                    <img src="{{ asset('images/腕右.png') }}" alt="" class="logo-1"> 
                    {{ $training->training_name }}
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
<div class="container-fluid-2">
    <div class="row justify-content-center mt-5"> <!-- 修正 -->
        <div class=" text-center training-menu">
          {{-- 各画像を表示 {{$training->training_image}}--}}
            <img src="{{ asset('images/腹筋2.png') }}" alt="" class="responsive-img">
        </div>
    </div>
</div>
</div>
</div>
<div class="training-text">
  <span class="content">
    {{ $training->description }}
    </span>
</div>


{{-- お気に入り機能 --}}

<div class="buttons">
  <button type="submit" name="favorite" class="btn-1" onclick="likeMix({{ Auth::user()->id }})">お気に入り</button>
    {{-- < href="{{ route('mypage') }}"> --}}

    <form action="{{ route('training.complete')}}" method="post">
        <button type="submit" name="complete"  class="btn-1">完了</button>
    </form>
 
</div>
<br>
<footer>
<div class="row mt-2">
    <div class="col-md-offset-3 col-md-6 text-center ">
        <img src="{{ asset('images/flex-logo.png') }}" alt="" style="max-width: 80px; height: auto;">
    </div>
</div>
</footer>
</div>
<script src="{{ asset('js/button.js') }}"></script>
@endsection