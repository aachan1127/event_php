<?php
// var_dump($_POST);
// exit();
//情報が取れてるか確認

// データの受け取り
$todo = $_POST["todo"];
$deadline = $_POST["deadline"];

// var_dump($deadline);
// exit();

// データ1件を1行にまとめる（最後に改行を入れる）
$write_data = "{$deadline} {$todo}\n";
// var_dump($write_data);
// exit();


// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data/todo.txt', 'a');
// ファイルをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file, $write_data);

// ファイルのロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// データ入力画面に移動する
header("Location:todo_txt_input.php");