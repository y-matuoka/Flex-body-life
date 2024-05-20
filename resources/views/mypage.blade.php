<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>マイページ</title>
<link rel="stylesheet" href="css/mypage/styles.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<div class="wrapper">
<header>
  <nav>
    <ul>
      <li class="museomoderno-title"><a href="#">メニュー</a></li>
      <li class="museomoderno-title"><a href="#">お気に入り</a></li>
      <li class="museomoderno-title"><a href="#">問い合わせ</a></li>
      <li class="museomoderno-title"><a href="#">ログアウト</a></li>
    </ul>
  </nav>
</header>

<main>
  <div class="left">
    <div class="profile">
      <h1 class="museomoderno-title">Mypage</h1>
      <div class="avatar-container">
        <div class="avatar">
          {{-- <img id="avatar-img" src="{{ asset($avatarPath) }}" alt="No Icon"> --}}
          <img id="avatar-img" src="{{ asset(Auth::user()->image) }}" alt="">
        </div>
      </div>

      {{-- <button class="button2" onclick="document.getElementById('avatar-delete-form').submit();">削除</button> --}}
      <form id="avatar-delete-form" action="{{ route('delete.avatar') }}" method="POST">
        @csrf
        {{-- @method('DELETE') --}}
        <input type="submit" value="削除">
      </form>
      <form id="avatar-form" action="{{ route('upload.avatar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" id="avatar-input" name="avatar" accept="image/*" style="display:none;">
        <label for="avatar-input" class="change-avatar" aria-label="アバター変更">
          <img src="{{ asset('images/camera.png') }}" alt="アイコン変更">
        </label>
        <input type="submit" value="変更">
      </form>
    </div>

    <div class="days">
      <div class="month-name">
        <h2 id="current-month" class="museomoderno-title"></h2>
      </div>
      <img src="{{ asset('images/calendar.png') }}" alt="カレンダー">
    </div>
  </div>
  
  <div class="right">
    <div class="course-info">
      <p class="museomoderno-title">My Training Course</p>
      <div class="textarea-container">
        <textarea id="course-text" class="museomoderno-title" placeholder=""></textarea>
        <button onclick="window.location.href='#';" class="museomoderno-title">Change</button>
      </div>
    </div>

    <div class="goal-container">
      <h2 class="museomoderno-title">目標</h2>
      <textarea class="goal-text"></textarea>
      <button onclick="window.location.href='{{ url('goal_setting/index') }}';" class="museomoderno-title">Change</button>
    </div>

    <div class="customer-info">
      <a href="{{ url('mypage/update') }}" class="museomoderno-title">お客様情報変更はこちら</a>
    </div>
    <div class="unsubscribe">
      <a href="#" class="museomoderno-title">退会する</a>
    </div>
  </div>
</main>

<footer class="footer1">
  <div class="footer2 text-center">
      <img src="{{ asset('images/flex-logo.png') }}" alt="ロゴ">
  </div>
</footer>
</div>

<script>
  document.getElementById('avatar-input').addEventListener('change', function() {
    document.getElementById('avatar-form').submit();
  });

  // 現在の月を取得して表示する
  var currentDate = new Date();
  var options = { month: 'long', locale: 'en-US' };
  var currentMonth = currentDate.toLocaleString('en', options);
  document.getElementById('current-month').innerText = currentMonth;
</script>    

</body>
</html>
