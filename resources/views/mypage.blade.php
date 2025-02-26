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

<!-- FullCalendarのスタイルシート -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
</head>
<body>

<div class="wrapper">
  
    <header>
      <nav>
        <ul>
          <li class="museomoderno-title"><a href="{{ url('auth/trainingmenu') }}">メニュー</a></li>
          <li class="museomoderno-title"><a href="{{ url('auth/favorites') }}">お気に入り</a></li>
          <li class="museomoderno-title"><a href="{{ url('auth/inquiry') }}">問い合わせ</a></li>
          <li class="museomoderno-title"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></li>
          @if (Auth::check() && Auth::user()->authority === 99)
          <li class="museomoderno-title"><a href="{{ url('/admin_user') }}">管理者画面</a></li>
          @endif
          <li class="museomoderno-title user-name" style="margin-left:auto;">
            {{ Auth::user()->name }}
          </li>
        </ul>
      </nav>
    </header>

    <main>
      <div class="left">
        <div class="profile">
          <h1 class="museomoderno-title">Mypage</h1>
          <div class="avatar-container">
            <div class="avatar">
              <img id="avatar-img" src="{{ asset(Auth::user()->image ?? 'images/noimageicon.png') }}" alt="">
            </div>
          </div>

          <form id="avatar-delete-form" action="{{ route('delete.avatar') }}" method="POST">
            @csrf
            <input class="button2" type="submit" value="削除">
          </form>
          <form id="avatar-form" action="{{ route('upload.avatar') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <input type="file" id="avatar-input" name="avatar" accept="image/*" style="display:none;">
            <label for="avatar-input" class="change-avatar" aria-label="アバター変更">
              <img src="{{ asset('images/camera.png') }}" alt="アイコン変更">
            </label>
            <input class="button3" type="submit" value="更新">
          </form>
        </div>

        <div class="days">
          <div class="month-name">
            <h2 id="current-month" class="museomoderno-title"></h2>
          </div>
          <div id="calendar">
          </div>
        </div>
      </div>

      <div class="right">
        @if (session('success'))
        <div class="alert alert-success" role="alert" onclick="this.style.display='none'">
          {{ session('success') }}
        </div>
      @endif
        <div class="course-info">
          <p class="museomoderno-title">My Training Course</p>
          <div class="textarea-container">
            <textarea id="course-text" class="museomoderno-title" placeholder="{{ $courseSelect[$course->course] }}"></textarea>
            <a href="{{ route('course.edit', ["id" => Auth::user()->id]) }}" class="museomoderno-title">Change</a>
          </div>
        </div>



        
  {{-- rimainderで追記８日目に表示される/大山★ここを追記する --}}
  @if($latestAchievementDate && now()->diffInDays($latestAchievementDate) == 0)
  <div class="reminder" style="font-size: 25px; color: tomato; font-weight: bold;font-family: MuseoModerno,sans-serif;">
    <img src="{{ asset('images/お知らせ.gif') }}" alt="肉1" style="max-width: 60px; height: auto;">
    <a href="{{ route('reminder', Auth::user()) }}" style="color: tomato;">お知らせ</a>
    <img src="{{ asset('images/お知らせ.gif') }}" alt="肉1" style="max-width: 60px; height: auto; transform: scaleX(-1);">
  </div>
  @endif

        <div class="goal-container">
          <p class="museomoderno-title">目標</p>
           <textarea class="goal-text" readonly>{{ $userGoalSetting->goal_content }}</textarea>
          <a href="{{ route('goal.edit', ["id" => Auth::user()->id]) }}" class="museomoderno-title">Change</a>
        </div>

        <div class="customer-info">
          <a href="{{ url('mypage/update') }}" class="museomoderno-title">お客様情報変更</a>
        </div>
        <div class="unsubscribe">
          <a href="{{ url('user/delete') }}" class="museomoderno-title">退会</a>
        </div>
      </div>
  </main>

  <footer class="footer1">
    <div class="footer2 text-center">
        <img src="{{ asset('images/flex.png') }}" alt="ロゴ">
    </div>
  </footer>
</div>

<!-- FullCalendarのJavaScript -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
  document.getElementById('avatar-input').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('avatar-img').src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });

  document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'en',
    headerToolbar: {
      left: 'prev',
      center: '',
      right: 'next'
    },
  });
  calendar.render();

  // 現在の月を表示
  var currentDate = new Date();
  var options = { month: 'long' };
  var currentMonth = currentDate.toLocaleString('en', options);
  document.getElementById('current-month').innerText = currentMonth;

  // 月に応じた画像を表示
  var month = currentDate.getMonth() + 1; 
  var seasonImage = '';
  switch (month) {
    case 1: case 2: case 12:
      seasonImage = 'images/snowflake.png';
      break;
    case 3: case 4:
      seasonImage = 'images/flower.png';
      break;
    case 5: case 6:
      seasonImage = 'images/rain.png';
      break;
    case 7: case 8:
      seasonImage = 'images/sun.png';
      break;
    case 9: case 10: case 11:
      seasonImage = 'images/leaf.png';
      break;
    default:
      seasonImage = ''; 
  }
  if (seasonImage) {
    var imgElement = document.createElement('img');
    imgElement.src = seasonImage;
    imgElement.alt = 'season image';
    imgElement.style.maxWidth = '30px'; // 画像サイズ調整
    imgElement.style.marginLeft = '10px'; // 月名との間のスペースを調整
    document.getElementById('current-month').appendChild(imgElement);
  }

  // カレンダー切り替え時に現在の月を更新
  calendar.on('datesSet', function() {
    var newCurrentMonth = calendar.getDate().toLocaleString('en', options);
    document.getElementById('current-month').innerText = newCurrentMonth;
    // 画像の更新処理を追加
    var updatedMonth = calendar.getDate().getMonth() + 1;
    switch (updatedMonth) {
      case 1: case 2: case 12:
        seasonImage = 'images/snowflake.png';
        break;
      case 3: case 4:
        seasonImage = 'images/flower.png';
        break;
      case 5: case 6:
        seasonImage = 'images/rain.png';
        break;
      case 7: case 8:
        seasonImage = 'images/sun.png';
        break;
      case 9: case 10: case 11:
        seasonImage = 'images/leaf.png';
        break;
      default:
        seasonImage = ''; 
    }
    var imgElement = document.querySelector('#current-month img');
    if (imgElement) {
      imgElement.src = seasonImage;
    } else {
      imgElement = document.createElement('img');
      imgElement.src = seasonImage;
      imgElement.alt = 'season image';
      imgElement.style.maxWidth = '30px'; // 画像サイズ調整
      imgElement.style.marginLeft = '10px'; // 月名との間のスペースを調整
      document.getElementById('current-month').appendChild(imgElement);
    }
  });
});

</script>



<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

</body>
</html>
