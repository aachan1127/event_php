<?php
// データまとめ用の空文字変数
// $str = '';
// ↓ ##### 配列に入れたい時はこれ
$array = [];

// ファイルを開く（読み取り専用）
$file = fopen('data/todo.txt', 'r');
// ファイルをロック
flock($file, LOCK_EX);

// fgets()で1行ずつ取得→$lineに格納
if ($file) {
  while ($line = fgets($file)) {
    // 取得したデータを`$str`に追加する
    // $str .="<tr><td>{$line}</td></tr>";

//配列に追加
//  ↓ #### 配列に入れたものはこれ
$array[] = "<tr><td>{$line}</td></tr>";

// $array[] = [
//   "todo" => str_replace("\n", "", implode(" ", array_slice(explode(" ", $line), 1))),
//   "deadline" => explode(" ", $line)[0],
//     ];


  }
}

// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// 配列の要素を空文字で連結して文字列にする
// ↓ #### 配列のときはこれ必要！！！！！
$arrayString = implode("",$array);

// var_dump($str);
// exit();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>textファイル書き込み型todoリスト（一覧画面）</legend>
    <a href="todo_txt_input.php">入力画面</a>
    <!-- ここ追加した↓ -->
    <button id="fast">日付が近い順</button>
    <table>
      <thead>
        <tr>
          <th>todo</th>
          <p><?=$arrayString?></p>
          <p id="list"></p>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
          <script>

    </script>

        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </fieldset>

<script>

</script>

</body>

</html>