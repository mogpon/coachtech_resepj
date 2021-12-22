<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Rese-Error-</title>
  <style>
  .content {
    width: 55%;
    margin: 0 auto;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .card {
    padding: 40px;
    border: 1px solid #e9eaea;
    border-radius: 0 0 5px 5px;
    background: #EEEEEE;
    font-size: 16px;
    color: black;
    box-shadow: 0px 3px 10px rgb(0, 0, 0, 0.2);
    font-family: 'IM Fell DW Pica SC', serif;
  }
  button{
    color: white;
    display: inline-block;
    padding: 5px 15px;
    background: #006699;
    font-size: 14px;
    border-radius: 5px;
    font-weight: bold;
    margin-top: 20px;
    cursor: pointer;
  }
</style>
</head>
	<body>
    <div class="content">
      <div class="card">
        <h1>予期せぬエラーが発生しました</h1>
        <div class="flex items-center justify-center mt-4">
          <a href="http://127.0.0.1:8000">
            <button class="ml-4">
              HOMEへ戻る
            </button>
          </a>
        </div>
      </div>
    </div>
	</body>
</html>