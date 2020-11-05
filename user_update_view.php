<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。

$id = $_GET['id'];

// var_dump($id);

//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table where id=" . $id);
$status = $stmt->execute();


//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザー一覧</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">


    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="user_index.php">ユーザー登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->

    <!-- Main[End] -->

<!-- ２．HTML
// 以下にindex.phpのHTMLをまるっと貼り付ける！
// 理由：入力項目は「登録/更新」はほぼ同じになるからです。
// ※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
// ※form要素 action="update.php"に変更
// ※input要素 value="ここに変数埋め込み" -->

<!-- Main[Start] -->
<form method="POST" action="user_update.php">
  <div class="jumbotron">
   <fieldset>
   <legend>管理者登録画面</legend>
     <label>名前：<input type="text" name="name" id="name" value="<?= $result['name']?>"></label><br>
     <label>ユーザーID：<input type="text" name="lid" id="lid" value="<?= $result['lid']?>"></label><br>
     <label>パスワード<input type="text" name="lpw" id="lpw" value="<?= $result['lpw']?>"></label><br>
     <label>管理権限
      <input type="radio" name="kanri_flg" value="1" <?php if( $result['kanri_flg']==="1"){ echo 'checked'; } ?>> スーパー管理者にする
      <input type="radio" name="kanri_flg" value="0" <?php if( $result['kanri_flg']==="0"){ echo 'checked'; } ?>> 管理者にする
     </label><br>
     <label>所属
      <input type="radio" name="life_flg" value="1" <?php if( $result['life_flg']==="1"){ echo 'checked'; } ?>> 在籍
      <input type="radio" name="life_flg" value="0" <?php if( $result['life_flg']==="0"){ echo 'checked'; } ?>> 退職
     </label><br>
     <input name="id" type="hidden" value=<?= $result['id']?>> 
     <input type="submit" name="btn_submit" id='btn_submit' value="送信する">
    </fieldset>


  </div>
</form>
<!-- Main[End] -->

</body>

</html>


