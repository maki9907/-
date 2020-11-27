<?php
    require_once("data.php");
    $data=new Data();
    $updateId=$_POST["updateId"];
    $name=$_POST["name"];
    $password=$_POST["password"];
    $data->judge($updateId,$name,$password);
    $results=$data->getById($updateId);
    $name=$results["name"];
    $comment=$results["comment"];
    $password=$results["password"];
?>
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
    <form action="update.php" method="POST">
        <input type="hidden" name="updateId" value="<?php echo $updateId?>">
        <p>名前</p>
        <input type="text" name="name" value="<?php echo $name?>">
        <p>コメント</p>
        <textarea name="comment" id="content" cols="30" rows="10"><?php echo $comment?></textarea>
        <p>パスワード</p>
        <input type="password" name="password" value="<?php echo $password?>">
        <br>
        <input type="submit" value="送信">
    </form>
    
</body>
</html>