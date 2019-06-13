<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_add.php">ユーザー登録</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録</legend>
     <label>氏名：<input type="text" name="name"></label><br>
     <label>ID：<input type="text" name="lid"></label><br>
     <label>PW：<input type="password" name="lpw"></label><br>
     <input type="hidden" name="kanri_flg" value="1">
     <input type="hidden" name="life_flg" value="1">
     <input type="submit" value="送信">

    </fieldset>
  </div>
</form>

<script>
  $("#submit").on("click",function(){
    redirect("index.php");
  })
</script>

<!-- Main[End] -->


</body>
</html>
