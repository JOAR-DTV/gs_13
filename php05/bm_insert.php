<?php
session_start();

//1. POSTデータ取得
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];

if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
    
    $file_name = $_FILES["upfile"]["name"]; //ファイル名取得
    $tmp_path  = $_FILES["upfile"]["tmp_name"]; //一時保存場所

    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_name = date("YmdHis").md5(session_id()) . "." . $extension;

    // FileUpload [--Start--]
    $img="";
    $file_dir_path = "upload/".$file_name;
    if ( is_uploaded_file( $tmp_path ) ) {
        if ( move_uploaded_file( $tmp_path, $file_dir_path ) ) {
            chmod( $file_dir_path, 0644 );
            // $img = '<img src="'.$file_dir_path.'">';
        } else {
            // echo "Error:アップロードできませんでした。";
        }
    }   
 }else{
    //  $img = "画像が送信されていません";
}

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_table(bookname,bookurl,comment,indate)VALUES(:bookname,:bookurl,:comment,sysdate()),:img";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':img', $file_name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: bm_index.php");
    exit;
}
