<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> イベント開催リスト（入力画面）</title>
</head>

<body>
  <!-- phpで日付を表示させる「date関数」 -->
<?php
$ymd_his = date("Y年m月d日　 H ：i：s");
echo $ymd_his;
?>



  <!-- ↓ ##### ここに`action`, `method`, `name`の3つを指定する． -->
  <form action="todo_txt_create.php" method="POST">
    <fieldset>
      <legend> イベント開催リスト（入力画面）</legend>
      <a href="work.php">一覧画面</a>
      <div>
        <!-- ↓ ##### nameを追加する！！！ -->
        イベント内容: <input type="text" name="todo">
      </div>
      <div>
        <!-- ↓ ##### nameを追加する！！！ -->
        開催日時: <input type="date" name="deadline">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>