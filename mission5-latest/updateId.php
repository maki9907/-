
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>updateForm</title>
</head>
<body>
    <h2>編集フォーム</h2>
    <form action="updateForm.php" method="POST">
        <p>投稿番号</p>
        <input type="text" name="updateId">
        <p>名前</p>
        <input type="text" name="name">
        <p>パスワード</p>
        <input type="password" name="password">
        <br>
        <input type="submit" value="送信">
    </form>
    
</body>
</html>