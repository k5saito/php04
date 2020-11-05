<?php

require_once("funcs.php");

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];


//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
// :nameなどは、バインド変数　SQLインジェクションなどのセキュリティ対策のために行う
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id,name,lid,lpw,kanri_flg,life_flg)VALUES(NULL, :name , :lid , :lpw , :kanri_flg, :life_flg)");

$stmt->bindValue(':name', $name,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

// 実行結果のステータスを$statusに保存。できた場合はtureが格納
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
// header('Location: index.php');

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ確認
  </title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php">ユーザー一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

  <div class="jumbotron">
    <fieldset>
    <legend>管理者登録画面</legend>
     <label>名前：<?php echo $name ?></label><br>
     <label>ユーザーID：<?php echo $lid ?></label><br>
     <label>パスワード<?php echo $lpw ?></label><br>
     <label>管理権限<?php echo $kanri_flg ?>
     <label>所属<?php echo $life_flg ?>
     <a href="user_index.php" >入力に戻る</a>
    </fieldset>
  </div>







<!-- Main[End] -->


</body>
</html>

