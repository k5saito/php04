
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="user_index.php">ユーザー一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    
<!-- 入力・確認・完了 -->
<!-- Main[Start] -->

  <form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>本の保存</legend>
     <label>本の名前：<input type="text" name="book" id="book" value=""></label><br>
     <label>URL：<input type="text" name="url" id="url" value=""></label><br>
     <label>感想<textArea name="comment" id="comment" rows="4" cols="40" value=""></textArea></label><br>
     <input type="submit" name="btn_submit" id='btn_submit' value="送信する">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  $('#btn_submit').on('click', function(){
    if($('#book').val() === ''){
      alert('本の名前を入力してください！');
      return false;

    }else if($('#url').val() === ''){
      alert('URLを入力してください！');
      return false;

    }else{

    }
  });


 </script>

</body>
</html>
