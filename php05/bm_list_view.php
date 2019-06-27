<?php
session_start();
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
$id = $_GET["id"];

include "funcs.php";

//1. Session Check
sessChk();

//２．データ登録SQL作成
$pdo = db_con();
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<img src="upload/'.$result["img"].'" width="150">';
        if($_SESSION["kanri_flg"]=="1"){
          $view .= '<a href="bm_delete.php?id='.$result["id"].'">';
          $view .= '[削除]';
          $view .= '</a>';
        }

        if($_SESSION["kanri_flg"]=="1"){
          $view .= '<a href="bm_detail.php?id='.$result["id"].'">';
          $view .= $result["bookname"] . "," . $result["comment"] ;
          $view .= '</a>';
        }else{
          $view .= $result["bookname"] . "," . $result["comment"] . "<br>";
        }
        $view .= '</p>'
    }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>本の感想</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
<?php
  echo $_SESSION["name"]さん
  include("bm_menu.php");
?>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <h1>ブックマーク一覧</h1>
    <input type="text" id="s">
    <button id="btn">検索</button>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        document.querySelector("#btn").onclick = function() {
            $.ajax({
                type: "post",
                url: "bm_list_view.1.php",
                data: {
                    s: $("#s").val() 
                },
                dataType: "html",
                success: function(data) {
                    $("#view").html(data);
                }    
            });
        }
    </script>
</body>
</html>
