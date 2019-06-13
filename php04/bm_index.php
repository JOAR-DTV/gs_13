<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="bm_list_view.php">ブックマーク一覧</a>
      <a class="navbar-brand" href="bm_login.php">ログイン</a>
      <a class="navbar-brand" href="user_add.php">ユーザー登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマークアプリ</legend>
     <label>本のタイトル：<input type="text" name="bookname"></label><br>
     <label>本のURL：<input type="text" name="bookurl"></label><br>
     <label>感想：<textArea name="comment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
