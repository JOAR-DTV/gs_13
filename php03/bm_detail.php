<?php
// 更新ページの作成
$id = $_GET["id"];

include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table where id=:id");
// 危険なコードが入力されたときに無効化して書き換える　↑id=$idってやるとデータが改竄される危険
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
}
// 1行目のデータを取ってくる
$row = $stmt->fetch();

//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">更新</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>本のタイトル：<input type="text" name="bookname" value="<?=$row["bookname"]?>"></label><br>
     <label>本のURL：<input type="text" name="bookurl" value="<?=$row["bookurl"]?>"></label><br>
     <label>本の感想：<textArea name="comment" rows="4" cols="40"><?=$row["comment"]?></textArea></label><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$row["id"]?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
