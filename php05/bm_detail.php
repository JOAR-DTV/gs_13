<?php
session_start();
// 更新ページの作成
//1. データ取得
$id = $_GET["id"];

//２．データ登録SQL作成
include "funcs.php";

//認証チェック
sessChk();

// DB接続
$pdo = db_con();

//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table where id=:id");
// 危険なコードが入力されたときに無効化して書き換える　↑id=$idってやるとデータが改竄される危険
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    // 1行目のデータを取ってくる
    $row = $stmt->fetch();
}
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）

if($_SESSION["kanri_flg"]=="1"){
  $readonly = "";
}else{
  $readonly = " readonly";
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <?php echo $_SESSION["name"]; ?>さん
  <?php include("bm_menu.php"); ?>
  <!-- <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">更新</a></div>
    </div>
  </nav> -->
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマークアプリ</legend>
     <label>本のタイトル：<input type="text" name="bookname" value="<?=$row["bookname"]?>"<?=$readonly?>></label><br>
     <label>本のURL：<input type="text" name="bookurl" value="<?=$row["bookurl"]?>"<?=$readonly?>></label><br>
     <label>本の感想：<textArea name="comment" rows="4" cols="100"<?=$readonly?>><?=$row["comment"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <?php if($_SESSION["kanri_flg"]=="1"){ ?>
     <input type="submit" value="送信">
     <?php } ?>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
