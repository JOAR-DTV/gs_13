<?php
$id = $_GET["id"];

include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_user_table where id=:id");
// 危険なコードが入力されたときに無効化して書き換える　↑id=$idってやるとデータが改竄される危険
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
}else{
    redirect("user_list_view.php");
}