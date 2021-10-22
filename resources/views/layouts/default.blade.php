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

    .search_box {
      display: inline-block;
      position: relative;
    }

    .search_box::before {
      content: "";
      width: 16px;
      height: 16px;
      background: url(/img/icon.png) no-repeat center center / auto 100%;
      display: inline-block;
      position: absolute;
      top: 13px;
      left: 8px;
    }

    .search_box input {
      padding-left: 3px 0 3px 2em;
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
      display: none;
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
      opacity: 0.8;
    }

    .in {
      transform: translateX(127%);
    }

    .out {
      display: none;
    }
  </style>
</head>

<body>
  <header>
    <div class="flex">
      <div class="menu_flex" id="menu_flex"  onclick="buttonClick()">
        <button class="menu1" id="menu1">
          <i class="fas fa-stream menu-btn"></i>
        </button>
        <button class="menu2" id="menu2">
          <i class="fas fa-window-close close-btn"></i>
        </button>
        <h1 class="head_title">Rese</h1>
      </div>
      <nav class="menu-one" id="menu-one">
        <ul class="menu_list">
          <li><a href="">Home</a></li>
          <li><a href="">Logout</a></li>
          <li><a href="">Mypage</a></li>
        </ul>
      </nav>
      <nav class="menu-two" id="menu-two">
        <ul class="menu_list2">
          <li><a href="">Home</a></li>
          <li><a href="">Registration</a></li>
          <li><a href="">Login</a></li>
        </ul>
      </nav>
      <div class="search">
        <select name="area">
          <option hidden>All area</option>
          <option value="tokyo">東京</option>
          <option value="osaka">大阪</option>
          <option value="fukuoka">福岡</option>
        </select>
        <select name="genre">
          <option hidden>All genre</option>
          <option value="tokyo">寿司</option>
          <option value="osaka">焼肉</option>
          <option value="fukuoka">居酒屋</option>
          <option value="fukuoka">イタリアン</option>
          <option value="fukuoka">ラーメン</option>
        </select>
        <div class="search_box">
          <input type="text" placeholder="   Search...">
        </div>
      </div>
    </div>
  </header>
  <div class="content" id="content">
    @yield('content')
  </div>
</body>

</html>