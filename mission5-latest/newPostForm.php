<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>postForm</title>
</head>
<body>
    <h2>投稿フォーム</h2>
    <form action="post.php" method="POST">
        <p>名前</p>
        <input type="text" name="name">
        <p>コメント</p>
        <textarea name="comment" id="content" cols="30" rows="10"></textarea>
        <br>
        <p>パスワード</p>
        <input type="password" name="password">
        <br>
        <input type="submit" value="送信">
    </form>
    
</body>
</html>