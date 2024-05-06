<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Flex-body-life</title>
  <style>
    html, body {
                background-color: #F3D6BA;}
  </style>

@yield('styles')

  <link rel="stylesheet" href="/css/styles.css"> 
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
