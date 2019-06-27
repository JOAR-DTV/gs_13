<?php
session_start();
//※htdocsと同じ階層に「includes」を作成してfuncs.phpを入れましょう！
//include "../../includes/funcs.php";
include "funcs.php";

//1. Session Check
// sessChk();
// 検索ワード
$s = $_POST["s"];

//２．データ登録SQL作成
$pdo = db_con();
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE name LIKE :s");
$stmt->bindvalue(":s", '%'.$s.'%');
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
    echo $view;
}
?>