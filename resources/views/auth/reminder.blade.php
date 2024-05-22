@extends('layout')
@section('styles')
<link rel="stylesheet" href="/css/trainingmenu/styles.css">
<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
    }
    .image-container {
        display: flex;
        align-items: center;
        margin: 3vh;
       
    }
    .image-left, .image-right {
        flex: 1;
        text-align: center;
    }
    .image-center {
        flex: 2;
        text-align: center;
    }
    body, .container {
        overflow: hidden;
    }
    .row {
        margin: 0;
        padding: 0;
    }
    .panel-heading h1 {
        margin: 0;
    }

    .contents{
        height: 100vh;
        margin-top: 17vh;

    }
    h3 {
        text-align: center;
        color: #A59B93;
        font-family: "MuseoModerno", sans-serif; /* フォントファミリーを設定 */
    }

    .logo{
        margin-top: 10vh;

    }
    p {
        text-align: center;
    }
</style>
@endsection
@section('content')
<div class="contents">
<div class="name">
<h3>
          {{auth::user()->name}}さん
        </h3>
       </div>

@foreach ($courses as $course )
    

       <div class="status">
    <p>
       {{ $course->created_at->format('Y-m-d') }} から {{ $course->Achievement_date}} までで {{ $course->status_count }}回
        @if($course->course == 2)
            ストレッチ
        @elseif($course->course == 1)
            筋トレ
        @else
            ミックス
        @endif
        コースの完了ボタンを完了しました。
    </p>
</div>
{{-- 1.2コース内容確認 --}}

<div class="container">
    
    <div class="image-container">
        <div class="image-left">
            <img src="{{ asset('images/花左.png') }}" alt="花左" style="max-width: 200px; height: auto;">
        </div>


          
                @php
                    $oneWeekLater = \Carbon\Carbon::parse($course->created_at)->addWeek();
                @endphp
                @if($course->status_count < 3)
                    <div class="image-center">
                        <img src="{{ asset('images/reminder3.png') }}" alt="reminder3" style="max-width: 450px; height: 60vh;">
                        <p>1週間後の日時: {{ $oneWeekLater->format('Y-m-d H:i:s') }}</p>
                    </div>
                @elseif($course->status_count < 6)
                    <div class="image-center">
                        <img src="{{ asset('images/reminder1.png') }}" alt="reminder1" style="max-width: 450px; height: 60vh;">
                        <p>1週間後の日時: {{ $oneWeekLater->format('Y-m-d H:i:s') }}</p>
                    </div>
                @else
                    <!-- パーフェクト -->
                    <div class="image-center">
                        <img src="{{ asset('images/reminder1.png') }}" alt="reminder1" style="max-width: 450px; height: 60vh;">
                        <p>1週間後の日時: {{ $oneWeekLater->format('Y-m-d H:i:s') }}</p>
                    </div>
                @endif
            @endforeach
       

{{-- 野口さんに完了ボタンをどうに記述するかを確認してカウント数を数えるようにするか考える --}}
{{-- １週間のデータの格納の仕方 --}}



        <div class="image-right">
            <img src="{{ asset('images/花右.png') }}" alt="花右" style="max-width: 200px; height: auto;">
        </div>
    </div>
</div>

        {{-- ロゴ画像 --}}
        <div class="row mt-2">
            <div class="col-md-offset-3 col-md-6 text-center mt-2 logo">
                <img src="{{ asset('images/flex-logo.png') }}" alt="flex-logo" style="max-width: 70px; height: auto;">

            </div>
        </div>

</div>
@endsection