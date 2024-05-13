<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ</title>
  <link rel="stylesheet" href="css/mypage/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
</head>

<body>
  {{-- {{ dd($courseAll) }} --}}
  @foreach ($courseAll as $course)
    @if ($course->status_count === 7)
      <p>素晴らしい継続力です！おめでとうございます</p>

    @elseif ($course->status_count <= 6 && $course->status_count >= 4)
      <p>この調子で頑張りましょう！</p>

    @else
      <p>もっと頑張りましょう</p>
    @endif
  @endforeach

</body>

</html>