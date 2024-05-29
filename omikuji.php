<?php
$random_number = rand(0,4);

if ($random_number === 0){
    $result = '大吉';
}
elseif($random_number === 1){
    $result = '中吉';
}
elseif($random_number === 2){
    $result = '小吉';
}
elseif($random_number === 3){
    $result = '凶';
}
//elseで最後は、（）の中の条件式を入れるとエラーになる！！！条件式いらない！！！
else{
    $result = '大凶';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.result {
    color : red;
}
    </style>



<body>
    <h1>おみくじの結果は<span class="result"><?= $result ?></span>です！</h1>
</body>
</html>