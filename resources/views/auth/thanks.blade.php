@extends('layout')

@section('styles')
<link rel="stylesheet" href="/css/thanks/styles.css">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
           <h1>送信完了しました。</h1>
           <h2>お問い合わせ頂きまして,誠にありがとうございます</h2>
           <h2>ご提供いただいた情報は大変貴重です。これからもお客様の声に真摯に耳を傾け、サービスの向上に努めてまいります。</h2>
           <h3>何かご不明点やご要望がございましたら、お気軽にお問い合わせください。いつでもお手伝いさせていただきます。</h3>
        </div>
    </div>
    <div class="button-container">
        <input type="button" class="button2" value="戻る" onclick="window.location.href='{{ route('mypage') }}'">
    </div>
</div>

<footer class="footer1">
    <div class="footer2 text-center">
        <img src="{{ asset('images/flex-logo.png') }}" alt="ロゴ">
    </div>
</footer>
@endsection
