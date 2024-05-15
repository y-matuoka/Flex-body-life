<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Flex-body-life</title>
  <style>

  </style>

@yield('styles')

  <link rel="stylesheet" href="/css/styles.css"> 
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  {{-- コンフリクトを避けるためのcssの作り方 --}}
  {{-- ↑各ページに固有のスタイリングを適用させるには各ページのcssを記載 --}}
  {{-- 各ページ共通部分のスタイルを描いたCSSファイルを用意する --}}
  {{-- 各ページのスタイルを描いたCSSファイルを用意する --}}
  {{-- cssファイルを分けておいたほうがgitの管理が楽 --}}
  {{-- class名がメンバーで被らないように注意する --}}
</head>

<body>
<header>
 {{-- 一旦空 --}}

</header>

<main>
@yield('content')
{{-- ページそれぞれの中身 --}}
</main>
<footer>
  {{-- 一旦空 --}}
</footer>
</body>
</html>