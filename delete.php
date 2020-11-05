<?php

require_once("funcs.php");

//1. POSTデータ取得
$no    = $_GET["id"];


//2. DB接続します
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE no = :no');
$stmt->bindValue(':no', $no, PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect('select.php');
}
?>