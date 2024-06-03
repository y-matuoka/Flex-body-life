@extends('welcome')
@extends('layout')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('styles')
    <link rel="stylesheet" href="/css/training_list/styles.css">
@endsection
@section('content')
    <div class="container">
        <div class="center">
            <h2 class="text-center training-menu">
                <img src="{{ asset('images/腕右.png') }}" alt="" class="logo-1">
                <span>{{ $training->training_name }}</span>
                <img src="{{ asset('images/腕左.png') }}" alt="" class="logo-1">
            </h2>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                @endforeach
            </div>
        @endif
    </div>
        
    <div class="row justify-content-center mt-5">
        <div class="text-center training-menu">
            {{-- 各画像を表示 {{  <img src="{{ asset($training->training_image) }}" }} --}}
            <img src="{{ asset('images/腹筋2.png') }}" alt="" class="responsive-img">
        </div>
    </div>

    <div class="training-text">
        <span class="content">
            {{ $training->description }}
        </span>
    </div>

    {{-- お気に入り機能 --}}
    <div class="buttons">
        <button type="submit" name="favorite" class="btn-1" data-type="{{ $userCourse->course }}" data-id="{{ $training->id }}" >お気に入り</button>
        <form action="{{ route('training.complete') }}" method="post" id="completeForm">
            @csrf
            <button id="btn1" type="submit" name="complete-btn" class="btn-2" onmousedown="party.confetti(this)">完了</button>
        </form>
    </div>
        <div class="col-md-offset-3 col-md-6 text-center">
            <img src="{{ asset('images/flex-logo.png') }}" alt="" style="max-width: 80px; height: auto;">
        </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/button.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="{{ asset('js/party.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/party-js@latest/bundle/party.min.js"></script>
@endsection
