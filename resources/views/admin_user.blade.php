@extends('layout')

@section('styles')
<link rel="stylesheet" href="/css/admin/styles.css">
<style>
 
</style>
@endsection

@section('content')
@if (Auth::check() && Auth::user()->authority === 99)
<div class="wrap">
  <h1 class="page__ttl">管理画面</h1>

  @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif

  <form action="{{ route('admin.edit') }}" method="post">
    @csrf
    <div class="create">
      <a class="new-create btn-primary" href="{{ route('register') }}">新規登録画面へ</a>
    </div>
    <p>更新または削除を行うユーザーを選択してください。</p>
    <table class="table">
      <tbody>
        <tr>
          <th></th>
          <th>id</th>
          <th>ユーザー名</th>
          <th>メールアドレス</th>
          <th>ユーザー画像</th>
          <th>権限</th>
          <th>削除フラグ</th>
        </tr>
        @foreach ($users as $user)
        <tr>
          <td>
            <input type="radio" name="id" value="{{ $user->id }}">
          </td>
          <td>{{ $user->id }}</td>
          <td>
            <input type="text" name="name" value="{{ $user->name }}">
          </td>
          <td>
            <input type="text" name="email" value="{{ $user->email }}">
          </td>
          <td>
            <input type="text" name="image" value="{{ $user->image }}">
          </td>
          <td>
            <input type="text" name="authority" value="{{ $user->authority }}">
          </td>
          <td>
            <input type="text" name="delflag" value="{{ $user->deleted_at }}">
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="btn-flex">
      <div class="submit">
        <button type="submit" name="update" class="submit-btn btn-primary">更新</button>
        <button type="submit" name="delete" class="submit-btn btn-primary">削除</button>
      </div>
    </div>
  </form>
</div>
@else
<div class="alert alert-danger text-center">
  <a href="{{ route('home') }}" class="admin">権限がありません</a>
</div>
@endif
@endsection
