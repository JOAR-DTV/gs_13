<?php
//共通に使う関数を記述
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

function db_con(){
    try {
        $pdo = new PDO('mysql:dbname=gs_db4;charset=utf8;host=localhost','root','');
        return $pdo;
    } catch (PDOException $e) {
        exit('DB-Connection-Error:'.$e->getMessage());
      }      
}

function redirect($page){
    header("Location: ".$page);
    exit;
}

function sqlError($stmt){ 
    $error = $stmt->errorInfo();
    exit("ErrorSQL:".$error[2]);
}

function chkSsid(){
    if(
        //chk_ssidの存在を確認issetして、session_idに相違なければ
        !isset($_SESSION["chk_ssid"]) ||
        $_SESSION["chk_ssid"] != session_id()
    ){
        exit("Login:Error!");
    }else{
        session_regenerate_id(true);
        $_SESSION["chk_ssid"]=session_id();
    }
}