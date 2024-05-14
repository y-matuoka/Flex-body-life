@extends('welcome')
@extends('layout')
@section('styles')
<link rel="stylesheet" href="/css/trainingmenu/styles.css">
<style>
    body, .container {
        overflow: hidden;
    }
    .row {
        margin: 0;
        padding: 0;
    }
    .panel-heading h1,
     {
        margin: 0;
    }

</style>
@endsection
@section('content')
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="panel-heading text-center" style="color: #A59B93; display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <img src="{{ asset('images/right.png') }}" alt="" style="max-width: 45px; height: auto;">
                    </div>
                    <h2>
                        トレーニング方法一覧
                    </h2>
                    <div>
                        <img src="{{ asset('images/left.png') }}" alt="" style="max-width: 45px; height: auto;">
                    </div>
                </div>
            <h5 class="text-center training-menu">見たいトレーニングメニューを選択してください</h5>
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
    {{-- 筋トレとストレッチボタン --}}
<div class="row-mt-5">
  <div class="col-md-12 text-center">
      <a href="{{ route('auth.muscle') }}">
        <button type="button" class="btn-xxl no-border ">筋トレ</button></a>
        <a href="{{ route('auth.stretch') }}">
      <button type="button" class="btn-xxl no-border">ストレッチ</button></a>
  </div>
</div>
   {{-- men と woman 画像 --}}
<div class="row-mt-5">
  <div class="col-md-4 text-center left-image">
      <img src="{{ asset('images/men.png') }}" alt="" style="max-width: 200px; height: auto;">
  </div>
  <div class="col-md-4 text-center">
    <br>
    <br>
    <br>
    <br>
{{-- back画像 --}}
<div class="col-md-4 col-md-offset-4 text-center">
  <a href="javascript:history.back()">
{{-- マイページに飛ぶようにする(現在home) --}}
      <img src="{{ asset('images/back.png') }}" alt="" style="max-width: 200px; height: auto;">
  </a>
</div>
  </div>
  <div class="col-md-4 text-center right-image">
      <img src="{{ asset('images/woman.png') }}" alt="" style="max-width: 200px; height: auto;">
  </div>
</div>
</div>
<br>
<br>
{{-- ロゴ --}}
<div class="row mt-2">
  <div class="col-md-offset-3 col-md-6 text-center mt-2">
      <img src="{{ asset('images/flex-logo.png') }}" alt="" style="max-width: 80px; height: auto;">
  </div>
</div>
    </div>
</div>
</div>
@endsection