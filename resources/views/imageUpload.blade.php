<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form method="post" action="{{ route('upload_image') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <label for="title">題名</label>
    <input id="title" type="text" name="title">
    <label for="author">作者</label>
    <input id="author" type="text" name="author">
    <input type="submit" value="登録">
  </form>
</body>

</html>