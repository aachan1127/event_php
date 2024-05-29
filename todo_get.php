<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todo登録画面（GET）</title>
</head>

<!--  ###########  秘密にしたい情報を送るときはPOSTを使う！！！GETにすると情報が見えてしまう！！！-->
<body>
  <!-- formにはaction, method, nameを設定！ -->
  <!-- ###########  actionの後ろは、GETを投げるファイル名を書く！！-->
  <form action="todo_get_confirm.php" method="GET">
    <fieldset>
      <legend>todo登録画面（GET）</legend>
      <div>
        todo: <input type="text" name="todo">
      </div>
      <div>
        deadline: <input type="date" name="deadline">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>
</body>

</html>