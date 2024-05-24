@extends('layout')
@section('styles')
<link rel="stylesheet" href="/css/courses_setting/styles.css">
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-offset-3 col-md-6">
        
            <div class="text-center mt-4">
              <img src="{{ asset("images/flag.png") }}" class="img-fluid-3" alt="star">
                <h2 class="h2" id="h2">コース変更確認</h2>
              <img src="{{ asset("images/star.png") }}" class="img-fluid-4" alt="megaphone">
            </div>
            <div class="card">
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $messages)
                      <p>{{ $messages }}</p>
                    @endforeach
                  </div>
                @endif
                <div class="m-sm-4">
                  <div class="course_comp">
                    <div class="course">{{ $courseSelect[$courses->course] }}コースへ</div>
                    <div>変更が完了しました！</div>
                  </div>
                </div>
                <div class="text-center mt-3">
                  {{-- マイページへのリンクに変える --}}
                  <a href="{{ route('mypage')}}" class="btn btn-lg btn-light">マイページへ</a>
                </div>
              </div>
            </div>
            <div class="flex-log">
              <img src="{{ asset("images/stretch(2).png") }}" class="img-fluid-1" alt="stretch">
              <img src="{{ asset("images/flex-logo.png") }}" class="img-fluid-2" alt="logo">
              <img src="{{ asset("images/training(2).png") }}" class="img-fluid-1" alt="training">
            </div>
          
      </div>
    </div>
  </div>
@endsection