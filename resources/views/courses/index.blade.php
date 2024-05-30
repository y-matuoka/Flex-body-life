@extends('layout')

@section('styles')
    <link rel="stylesheet" href="/css/courses/styles.css">
@endsection

@section('content')
    <div class="container">
        <div class="return">
			<a href="{{ route('goal.index') }}" onclick="history.back(); return false;">
                <img src="{{ asset("images/return.png") }}" class="img-fluid-4" alt="back">
			</a>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="panel-heading text-center">
                    <div class="side-image">
                        <img src="{{ asset('images/right.png') }}" alt="right">
                    </div>
                    <h2 class="h2">
                        コース選択
                    </h2>
                    <div class="side-image">
                        <img src="{{ asset('images/left.png') }}" alt="left">
                    </div>
                </div>
                <h5 class="text-center training-menu">トレーニング表示画面でお気に入り登録も行えます！</h5>

                <div class="panel-body">
                    @if (session('error'))
                        <p class="text-danger mt-3">
                            {{ session('error') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
       
        {{-- 筋トレ,ストレッチ,Mixボタン --}}
        @if(isset($courses->course))
        <div class="m-sm-4 text-center">
            <a class="registered" href="{{ url('/mypage')}} ">すでにコースは登録されています。マイページへ！</a>
            <a class="registered" href="{{ url('/training/index')}} ">すでにコースは登録されています。トレーニングへ！</a>
        </div>
        @else
        <div class="main">
            <form action="{{ route('course.store') }}" method="POST">
            @csrf
                <div class="course-flex">
                    <div class="course"> 
                        <button type="submit" name="button1" value="MIX" class="btn-xxl no-border">MIX</button>
                        <p class="content">柔軟性と筋持久力を高め <br>バランスの取れた身体にしたい方へ！</p>
                    </div>
                    <div class="course">
                        <button type="submit" name="button2" value="muscle" class="btn-xxl no-border">筋トレ</button>
                        <p class="content">筋肉を付けたい、身体を大きくしたい <br>筋肉の持久力を高めたい方へ！</p>
                        <img src="{{ asset("images/training(2).png") }}" class="img-fluid-1" alt="training">
                    </div>
                    <div class="course">
                        <button type="submit" name="button3" value="strech" class="btn-xxl no-border">ストレッチ</button>
                        <p class="content">身体を柔らかく、怪我のしにくい <br>柔軟な身体にした方へ！</p>
                        <img src="{{ asset("images/stretch(2).png") }}" class="img-fluid-2" alt="stretch">
                    </div>
                </div>
            </form>
            <div class="flex-log">
                <img src="{{ asset("images/flex-logo.png") }}" class="img-fluid-3" alt="logo">
            </div>
        </div>
        @endif
    </div>
@endsection
