<?php
session_start();

require_once("funcs.php");
sessionCheck();

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$book = $_POST['book'];
$url = $_POST['url'];
$comment = $_POST['comment'];

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
// :nameなどは、バインド変数　SQLインジェクションなどのセキュリティ対策のために行う
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(no,book,url,comment,date)VALUES(NULL, :book , :url , :comment , sysdate())");

$stmt->bindValue(':book', $book,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
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
    <div class="navbar-header"><a class="navbar-brand" href="select.php">本の登録</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

  <form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>本の保存</legend>
     <label>本の名前：<?php echo $book ?></label><br>
     <label>URL：<?php echo $url ?></label><br>
     <label>感想<?php echo $comment ?></label><br>
     <a href="index.php" >入力に戻る</a>
    </fieldset>
  </div>
</form>







<!-- Main[End] -->


</body>
</html>

