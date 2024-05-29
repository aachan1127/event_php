<?php
// var_dump($_GET);
// exit();
//#### ↑ 必ず最初にチェック！！内容を確認したらコメントアウトすること

// キー名に送信元ファイルのname属性を指定する．
$todo = $_GET['todo'];
$deadline = $_GET['deadline'];


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todo表示画面（GET）</title>
</head>

<body>
  <fieldset>
    <legend>todo表示画面（GET）</legend>
    <table>
      <thead>
        <tr>
          <!-- ↓ ####### ここ変える！ (php の中身を表示させる）-->
          <td><?= $todo ?></td>
          <td><?= $deadline ?></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </fieldset>
</body>

</html>