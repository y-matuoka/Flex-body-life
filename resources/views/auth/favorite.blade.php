@extends('layout')

@section('styles')
@endsection

@section('content')
<style>
    .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .card-text {
        font-family: "MuseoModerno", sans-serif;
        font-weight: bold;
        justify-content: center;
    }

    .not {
        font-family: "MuseoModerno", sans-serif;
        font-weight: bold;
        font-size: 20px;
        color: tomato;
        margin: 0 auto;
    }

    .row {
        display: center;
        justify-content: center;
        width: 100%;
    }

    .panel-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .col-md-4 {
        width: 100%
    }

    footer {
        margin-top: 2rem;
        display: flex;
    }

    .footer-image {
        max-width: 80px;
        height: auto;
    }

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel-heading text-center" style="color: #A59B93; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <img src="{{ asset('images/right.png') }}" alt="" style="max-width: 80px; height: auto;">
                </div>
                <h3>お気に入りメニュー一覧</h3>
                <div>
                    <img src="{{ asset('images/left.png') }}" alt="" style="max-width: 80px; height: auto;">
                </div>
            </div>
            <div class="panel-body">
                @if($favorites->isEmpty())
                <div class="not">
                    <p>現在お気に入りはありません。</p>
                    <br>
                    <div class="text-center">
                    <img src="{{ asset('images/階段.gif') }}" alt="階段" style="max-width: 120px; height: center;">
                    <br>
                    <br>
                        <a href="{{ route('mypage') }}">
                        <button type="submit" class="btn" style="background-color: #A59B93; color: white; font-size: 25px; font-family: MuseoModerno, sans-serif;">
                        My Page
                        </button></a>
                        <br>
                    </div>
                    <footer style="display: flex; justify-content: center; align-items: center; margin-top: 2rem; margin-left: 10px;">
                    <div class="row mt-2">
                        <div class="col-md-offset-3 col-md-6 text-center mt-2">
                            <img src="{{ asset('images/flex-logo.png') }}" alt="" class="footer-image">
                        </div>
                    </div>
                    </footer>
                </div>
                @else
                    <div class="row">
                        @foreach($favorites as $favorite)
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        @if($favorite->stretch)
                                            <img src="/images/{{$favorite->stretch->training_image}}" alt=" " style="max-width: 350px">
                                            <h5 class="card-title">{{ $favorite->stretch->name }}</h5>
                                            <p class="card-text">{{ $favorite->stretch->description }}</p>
                                        @elseif($favorite->muscle)
                                            <img src="/images/{{$favorite->muscle->training_image}}" alt=" " style="max-width: 350px">
                                            <h5 class="card-title">{{ $favorite->muscle->name }}</h5>
                                            <p class="card-text">{{ $favorite->muscle->description }}</p>
                                        @elseif($favorite->mix)
                                            <img src="/images/{{$favorite->mix->training_image}}" alt=" " style="max-width: 200px">
                                            <h5 class="card-title">{{ $favorite->mix->name }}</h5>
                                            <p class="card-text">{{ $favorite->mix->description }}</p>
                                        @endif

                                        <form action="{{ route('favorites.remove') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="fav_id" value="{{ $favorite->id }}">
                                            <button type="submit" class="btn btn-danger">お気に入りを解除</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="{{ route('mypage') }}">
                        <button type="submit" class="btn" style="background-color: #A59B93; color: white; font-size: 25px; font-family: MuseoModerno, sans-serif;">
                        My Page
                        </button></a>
                    </div>
                    <br>
                    <footer style="display: flex; justify-content: center; align-items: center; margin-top: 2rem; margin-left: -60px;">
                    <div class="row mt-2">
                        <div class="col-md-offset-3 col-md-6 text-center mt-2">
                            <img src="{{ asset('images/flex-logo.png') }}" alt="" class="footer-image">
                        </div>
                    </div>
                    </footer>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

