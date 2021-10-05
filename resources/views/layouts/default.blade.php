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
  <style>
    header {
      height: 100px;
      line-height: 100px;
      font-size: 30px;
      font-weight: bold;
      font-family: 'IM Fell DW Pica SC', serif;
    }

    .size3 {
      color: #006699;
      vertical-align: middle;
      margin: 34px 18px 32.5px 100px;
      text-shadow: 2px 2px 4px #000;
    }

    h1 {
      color: #006699;
    }
  </style>
</head>

<body>

  <header>
    <div class="flex">
      <i class="fas fa-list-alt size3 fa-lg"></i>
      <h1>Rese</h1>
    </div>
  </header>
  <div class="content">
    @yield('content')
  </div>
</body>

</html>