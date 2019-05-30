<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>注文ページ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select03.php">記念品注文一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert03.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ノベルティグッズ注文票</legend>
     <label>商品
        <select name="goods">
            <option value="ぺんてる3色ボールペン">ぺんてる3色ボールペン</option>
            <option value="東京スカイツリー限定ピラメキーノクリアファイル">東京スカイツリー限定ピラメキーノクリアファイル</option>
            <option value="京セラ　セラミックボールペン（木箱入り）">京セラ　セラミックボールペン（木箱入り）</option>
        </select>
     </label><br>
     <label>個数<input type="text" name="unit" size="1"></label><br>
     <label>単価<input type="text" name="price" size="2"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>