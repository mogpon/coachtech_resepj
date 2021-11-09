<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC rel=" stylesheet">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
  <script src="{{ asset('/js/main.js') }}"></script>
  <style>
    body {
      margin: 0px;
    }

    header {
      height: 100px;
      line-height: 100px;
      font-weight: bold;
      font-family: 'IM Fell DW Pica SC', serif;
    }

    .head_title {
      color: #006699;
      font-size: 30px;
      margin: 0;
    }

    .flex {
      display: flex;
      justify-content: space-between;
      width: 85%;
      margin: 0 auto;
    }

    .menu_flex {
      display: flex;
    }

    .open .menu-btn {
      display: none;
    }

    .open2 .close-btn {
      display: block;
    }


    .menu-btn {
      font-size: 1.5em;
      color: #006699;
      margin-right: 8px;
    }

    .close-btn {
      display: none;
      font-size: 1.5em;
      color: #006699;
      margin-right: 8px;
    }


    .menu-one {
      position: absolute;
      height: 50vh;
      width: 85%;
      top: 30%;
      left: -100%;
      background: white;
      transition: .7s;
      text-align: center;
    }

    .menu-two {
      position: absolute;
      height: 50vh;
      width: 85%;
      top: 30%;
      left: -100%;
      background: white;
      transition: .7s;
      text-align: center;
    }


    .menu-list li {
      list-style-type: none;
      margin-top: 100px;
    }

    .menu-one a {
      text-decoration: none;
      color: rgb(0, 98, 179);
      font-weight: normal;
      font-size: 36px;
    }

    .menu-one a:hover {
      cursor: pointer;
      opacity: 0.8;
    }
    .menu-list2 li {
      list-style-type: none;
      margin-top: 100px;
    }

    .menu-two a {
      text-decoration: none;
      color: rgb(0, 98, 179);
      font-weight: normal;
      font-size: 36px;
    }

    .menu-two a:hover {
      cursor: pointer;
      opacity: 0.8;
    }

    .in {
      transform: translateX(127%);
    }

    .out {
      display: none;
    }

    .serch {
      margin: 0;
    }
  </style>
</head>

<body>
  <header>
    <div class="flex">
      <div class="menu_flex" id="menu_flex">
        @auth
        <button class="menu1" id="menu1" onclick="buttonClick()">
          <i class="fas fa-stream menu-btn"></i>
        </button>
        <button class="menu2" id="menu2" onclick="buttonClick()">
          <i class="fas fa-window-close close-btn"></i>
        </button>
        @endauth
        @guest
        <button class="menu1" id="menu1" onclick="buttonClick2()">
          <i class="fas fa-stream menu-btn"></i>
        </button>
        <button class="menu2" id="menu2" onclick="buttonClick2()">
          <i class="fas fa-window-close close-btn"></i>
        </button>
        @endguest
        <h1 class="head_title">
          <a href="http://127.0.0.1:8000/">
            Rese
          </a>
        </h1>
      </div>
      @yield('content')
    </div>
</body>

</html>