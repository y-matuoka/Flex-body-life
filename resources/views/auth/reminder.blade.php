@extends('layout')
@section('styles')
<link rel="stylesheet" href="/css/trainingmenu/styles.css">
<style>
        body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden; /* スクロールを無効にする */
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        overflow: hidden; /* スクロールを無効にする */
    }
    .image-container {
        display: flex;
        align-items: center;
        margin: 0vh;
    }

    .image-center {
        flex: 2;
        text-align: center;
    }
    .row {
        margin: 0;
        padding: 0;
    }
    .panel-heading h1 {
        margin: 0;
    }
    .contents {
        overflow-y: auto; /* 縦スクロールを有効にする */
        overflow-x: hidden; /* 横スクロールを無効にする */
    }
    
    h3 {
        color: #A59B93;
        text-align: center;
        font-family: "MuseoModerno", sans-serif; 
    }

    p {
        text-align: center;
        font-family: "MuseoModerno", sans-serif;
        font-weight: bold;
        color: #A59B93;
    }
</style>
@endsection
@section('content')
<div class="contents">
<div class="name">
<h3>
          {{Auth::user()->name}}さん
        </h3>
       </div>

@foreach ($courses as $course )
       <div class="status">
    <p>
       {{ $course->created_at->format('Y-m-d') }} から {{ $course->Achievement_date}} までで<span style="color: tomato;font-size: 18px;"> {{ $course->status_count }}回</span>
        @if($course->course == 2)
            筋トレ
        @elseif($course->course == 1)
            ミックス
        @else
            ストレッチ
        @endif
        コースを完了しました。
    </p>
</div>
{{-- 1.2コース内容確認➤1:ミックス2:筋トレ　他:ストレッチ --}}

<div class="container">
    <div class="image-container">
        <div class="image-left">
            <img src="{{ asset('images/花左.png') }}" alt="花左" style="max-width: 160px; height: auto;">
        </div>
                @php
                    $oneWeekLater = \Carbon\Carbon::parse($course->created_at)->addWeek();
                @endphp
                {{-- 頑張りましょう --}}
                @if($course->status_count < 3)
                    <div class="image-center">
                        <img src="{{ asset('images/動く腹筋.gif') }}" alt="動く腹筋" style="max-width: 90px; height: auto;transform: scaleX(-1);">
                        <img src="{{ asset('images/reminder3.png') }}" alt="reminder3" style="max-width: 300px; height: 50vh;">
                        <img src="{{ asset('images/動く腕立て.gif') }}" alt="動く腕立て" style="max-width: 90px; height: auto;">
                        <br>
                        <p>1週間後の日時: {{ $oneWeekLater->format('Y-m-d H:i:s') }}</p>
                    </div>
                    {{-- あとちょっと --}}
                @elseif($course->status_count < 7)
                    <div class="image-center">
                        <img src="{{ asset('images/肉3.gif') }}" alt="肉3" style="max-width: 80px; height: auto;">
                        <img src="{{ asset('images/reminder2.png') }}" alt="reminder2" style="max-width: 400px; height: 55vh;">
                        <img src="{{ asset('images/肉4.gif') }}" alt="肉4" style="max-width: 80px; height: auto;">
                        <p>1週間後の日時: {{ $oneWeekLater->format('Y-m-d H:i:s') }}</p>
                    </div>
                @else
                    <!-- パーフェクト -->
                    <div class="image-center">
                        <img src="{{ asset('images/肉1.gif') }}" alt="肉1" style="max-width: 80px; height: auto;">
                        <img src="{{ asset('images/reminder1.png') }}" alt="reminder3" style="max-width: 400px; height: 55vh;">
                        <img src="{{ asset('images/肉2.gif') }}" alt="肉2" style="max-width: 80px; height: auto;">
                        <p>1週間後の日時: {{ $oneWeekLater->format('Y-m-d H:i:s') }}</p>
                    </div>
                @endif
            @endforeach
{{-- 野口さんに完了ボタンをどうに記述するかを確認してカウント数を数えるようにするか考える ➤テーブル確認ok--}}
{{-- １週間のデータの格納の仕方 ➤テーブルok--}}
<div class="image-right">
    <img src="{{ asset('images/花右.png') }}" alt="花右" style="max-width: 160px; height: auto;">
</div>
    </div>
</div>
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
        <img src="{{ asset('images/flex-logo.png') }}" alt="" style="max-width: 70px; height: auto;">
    </div>
</div>
</footer>
</div>
@endsection