<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="./images/favicon.ico">
  <title>Push.js</title>
  <!-- CSS -->
  {{-- <link rel="stylesheet" href="./custom.css"> --}}
</head>

<style>
  html, body{
  width: 100%; height: 100%;
  margin: 0px; padding: 0px;
  }

  #my_container{
  width: 100%; height: 100%;
  display: flex; flex-flow: wrap;
  justify-content: space-around;
  align-items: center;
  }

  #my_container div{
  margin: 0px; padding: 10px 30px;
  border-radius: 20px;
  background-color: gray; color: white;
  font-size: 2rem; text-align: center;
  }
</style>

<body>
  <div id="my_container">
    <div>
      <div>= Push.js =</div>
      <div id="my_status">***</div>
      <div>
        <button id="my_btn">Push</button>
      </div>
    </div>
  </div>
  <!-- JavaScript -->
  <script src="//code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>