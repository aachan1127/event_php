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
// $array[] = "<tr><td>{$line}</td></tr>";

$array[] = [
    "todo" => str_replace("\n", "", implode(" ", array_slice(explode(" ", $line), 1))),
    "deadline" => explode(" ", $line)[0],
    ];


    }
}

// ロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// 配列の要素を空文字で連結して文字列にする
// ↓ #### 配列のときはこれ必要！！！！！
// $arrayString = implode("",$array);

// var_dump($str);
// exit();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> イベント開催リスト（一覧画面）</title>
</head>

<body>

  <!-- phpで日付を表示させる「date関数」 -->
<!-- 時間は海外（ベルギー？）の時間が表示されているが、サクラサーバーなどに上げると日本時間に修正される -->
  <?php
$ymd_his = date("Y年m月d日　 H ：i：s");
echo $ymd_his;
?>

<fieldset>
    <legend> イベント開催リスト（一覧画面）</legend>
    <a href="work_input.php">入力画面</a>
    <!-- ここ追加した↓ -->
    <button id="fast">日付が近い順を表示</button>
    <input id="search"></input>
    <button id="search_btn">検索</button>
  <table>
    <thead>
        <tr>
        <th>イベント</th>
        <tbody id="pp_table"></tbody>
        <p id="list"></p>
        </tr>
    </thead>
  </table>
</fieldset>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
      // JSではPHPの配列を扱えないため，サーバ上でJSON形式に変換する
        const hogeArray = <?=json_encode($array)?>;
        console.log(hogeArray[0].deadline);


const tt = hogeArray.sort(function compareFunc(a,b){
  console.log(a.deadline);
  console.log(b);
  return new Date(a.deadline) - new Date(b.deadline);
})

console.log(tt);

console.log(tt[0].deadline);

// からの配列を準備
const pp = [];

//並べ替えといえばこれをかく
for(let i=0;i<tt.length;i++){
  pp.push(`<tr><td>${tt[i].todo}</td><<td>${tt[i].deadline}</td></tr>`);
console.log(pp);

  $("#pp_table").append(pp[i]);
}





// 検索ボタンをクリック
$("#search_btn").on("click",function(){

  // 既存の行をクリア
$("#pp_table").empty();

//検索ボックスの中の値を取り出す
const search = $("#search").val();
console.log(search);

//todoとppが一緒のときをフィルターで取り出す
const even = tt.filter((element) => element.todo  === search);
console.log(even); 


// 空の配列を準備
const search_event = [];

//並べ替えといえばこれをかく
for(let i=0;i<even.length;i++){
  search_event.push(`<tr><td>${even[i].todo}</td><<td>${even[i].deadline}</td></tr>`);
console.log(search_event);



  $("#pp_table").append(search_event[i]);
}



})





      // あとはわかるな．．？？

        $('#fast').on("click", function () {

          // 既存の行をクリア
$("#pp_table").empty();

  
  // 今日の日付をとる
// const datetime = new Date();//今日の日付を取得

// datetime.setHours(0, 0, 0, 0);  //時間を00:00:00にする
// console.log(datetime);

// var year = datetime.getFullYear();
// console.log(year)  /* 今が2019年なら【2019】が出力される*/

// var month = datetime.getMonth()+1;
// console.log(month) /* 今が2月なら【1】が出力される（※【2】ではない）ので後ろで+1する。 */

// var date = datetime.getDate();
// console.log(date) /* 今日が20日なら【20】が出力される */

// // 年、月、日付をまとめて表示させる
// const all_datetime = year +''+ month +''+ date
// console.log(all_datetime);

  // hogeArrayの過去の日付のぶんを入れる変数を準備する


  // hogeArrayをfor文で繰り返し処理をする 条件分を作る、現在日時よりも後だったら現在

var today = new Date();
var year = today.getFullYear();
var month = ("0" + String(today.getMonth() + 1)).slice(-2);
var day = ("0" + String(today.getDate())).slice(-2);
const all_datetime = year + "-" + month + "-" + day
console.log(all_datetime);

//deadlineをフィルターで取り出す(今日以降のイベントを取り出す)
const even_d = tt.filter((element) => element.deadline >= all_datetime);
console.log(even_d);

// からの配列を準備
// const event = [];


// // //並べ替えといえばこれをかく
// for(){
//   event.push(`<tr><td>${even_d[i].todo}</td><<td>${even_d[i].deadline}</td></tr>`);
// console.log(event);

//   $("#pp_table").append(event[i]);
// }


});

</script>
</body>
</html>