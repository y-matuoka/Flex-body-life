@extends('layout')

@section('styles')
<link rel="stylesheet" href="/css/confirm/styles.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h1 class="header1">CONFIRM</h1>
                
                <div class="card">
                    <h2 class="card-header">お問い合わせ内容確認</h2>
                <div class="card-body">
                    <form method="post" action="{{ route('inquiry.send') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $inquiry['email'] }}">
                        <input type="hidden" name="contact" value="{{ $inquiry['contact'] }}">

                        <div class="content-wrapper">
                            <div class="mail">
                                <label for="email" class="label1">メールアドレス:</label>
                                <div class="col-md-9">
                                    {{ $inquiry['email'] }}
                                </div>
                            </div>

                            <div class="firm">
                                <label for="inquiry" class="label2">お問い合わせ内容:</label>
                                <div class="col-md-8">
                                    {{ $inquiry['contact'] }}
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="offset-md-1 col-md-3">
                                <a href="{{ route('inquiry') }}" class="btn btn-info">戻る</a> 
                            </div>

                            <div class="col-md-2 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    送信
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

