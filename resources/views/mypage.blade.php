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
        <img id="avatar-img" src="images/noimageicon.png" alt="No Icon">
      </div>
      <input type="file" id="avatar-input" accept="image/*" style="display:none;">
      <button class="change-avatar" onclick="document.getElementById('avatar-input').click();" capture>
        <img src="{{ asset('images/camera.png') }}" alt="アイコン変更">
      </button>
    </div>
  </div>



  <div class="days">
    <div class="month-name">
      <h2 id="current-month" class="museomoderno-title"></h2>
    </div>
    <img src="{{ asset('images/calendar.png') }}" alt="カレンダー">
    {{-- <div class="buttons">
      <img src="{{ asset('images/back.png') }}" alt="戻る">
      <img src="{{ asset('images/advance.png') }}" alt="進む">
    </div> --}}
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
    <button onclick="window.location.href='#';" class="museomoderno-title">Change</button>
  </div>

  <div class="customer-info">
    <a href="#" class="museomoderno-title">お客様情報変更はこちら</a>
  </div>
  <div class="unsubscribe">
    <a href="#" class="museomoderno-title">退会する</a>
  </div>
</div>
</main>

<footer>
  <img src="{{ asset('images/flex-logo.png') }}" alt="flex-logo">
</footer>

<script>
  //ユーザーのフォルダにアクセス、選択した画像ファイルを読み込み、その内容をURLデータとして取得し画像を表示する
  document.getElementById('avatar-input').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('avatar-img').src = e.target.result;
    };
    reader.readAsDataURL(file);
  });
  </script>
  <script>
    // 現在の月を取得して表示する
    var currentDate = new Date();
    var options = { month: 'long', locale: 'en-US' }; // en-USは英語表記で月名を表示するように指定
    var currentMonth = currentDate.toLocaleString('en-US', options);
    document.getElementById('current-month').innerText = currentMonth;
  </script>    

</body>
</html>
