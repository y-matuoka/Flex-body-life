@extends('welcome')
@extends('layout')
   <meta name="csrf-token" content="{{ csrf_token() }}">
@section('styles')
<link rel="stylesheet" href="/css/training_list/styles.css">
<style>
</style>
@endsection
@section('content')
<div class="container">
<div class="container-fluid">
            <div class="center">
                <h2 class="text-center training-menu">
                    <img src="{{ asset('images/腕右.png') }}" alt="" class="logo-1"> 
                    {{ $training->training_name }}
                    <img src="{{ asset('images/腕左.png') }}" alt="" class="logo-1">
                </h2>
            </div>

                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach

                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                </form>
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
  <button type="submit" name="favorite" class="btn-1" data-type="{{ $userCourse->course }}" data-id="{{$training->id }}">お気に入り</button>
    {{-- < href="{{ route('mypage') }}"> --}}

    <form action="{{ route('training.complete')}}" method="post">
        @csrf
        <button type="submit" name="complete-btn"  class="btn-2">完了</button>
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
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
@endsection