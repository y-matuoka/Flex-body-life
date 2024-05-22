@extends('layout')

@section('styles')
<link rel="stylesheet" href="/css/admin/styles.css">
<style>
 
</style>
@endsection

@section('content')

<div class="content">
  <h1 class="text-center">管理画面</h1>
  <form action="" method="POST" class="form-group form-search">
    @csrf
    <div class="form-group">
      <input type="submit" value="新規登録画面" class="btn btn-primary">
    </div>
  </form>
  <p class="text">更新または削除を行うユーザーを選択してください。</p>
  <div class="usertable">
    <form action="" method="POST">
      @csrf
      <table class="table">
        <tr class="userinfo_head">
          <th></th>
          <th>id</th>
          <th>ユーザー名</th>
          <th>メールアドレス</th>
          <th>ユーザー画像</th>
          <th>権限</th>
          <th>削除フラグ</th>
        </tr>

        <tr class="userinfo_body">
          <td><input type="radio"></td>
          <td></td>
          <td><input type="text"></td>
          <td><input type="email"></td>
          <td><input type="file"></td>
          <td><input type="text"></td>
          <td><input type="text"></td>
        </tr>

      </table>
      <div class="flex">
        <div class="update-btn">
          <button type="submit" class="btn btn-primary">更新</button>
        </div>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </form>

  </div>

</div>

@endsection
