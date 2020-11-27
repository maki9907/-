<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>deleteForm</title>
</head>
<body>
    <h2>削除フォーム</h2>
    <form action="delete.php" method="POST">
        <p>投稿番号</p>
        <input type="text" name="deleteId">
        <p>名前</p>
        <input type="text" name="name">
        <p>パスワード</p>
        <input type="password" name="password">
        <br>
        <input type="submit" value="送信">
    </form>
    
</body>
</html>