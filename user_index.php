<?php
// 0. SESSION開始！！
session_start();

// 1. ログインチェック処理！
// 以下、セッションID持ってたら、ok
// 持ってなければ、閲覧できない処理にする。

//１．関数群の読み込み
include("funcs.php");

sessionCheck();

$view = "";
if ($_SESSION["kanri_flg"] == 0) {
  exit('管理権限がありません');
} 

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>管理画面</title>
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

<!-- 入力・確認・完了 -->
<!-- Main[Start] -->

  <form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>管理者登録画面</legend>
     <label>名前：<input type="text" name="name" id="name" value=""></label><br>
     <label>ユーザーID：<input type="text" name="lid" id="lid" value=""></label><br>
     <label>パスワード<input type="text" name="lpw" id="lpw" value=""></label><br>
     <label>管理権限
      <input type="radio" name="kanri_flg" value="1"> スーパー管理者にする
      <input type="radio" name="kanri_flg" value="0" checked> 管理者にする
     </label><br>

     <input type="hidden" name="life_flg" id='life_flg' value="1">
     <input type="submit" name="btn_submit" id='btn_submit' value="送信する">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>
</html>
