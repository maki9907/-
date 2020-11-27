<?php
    require_once('data.php');
    $data=new Data();
    $data->tableCreate();
    $results=$data->getAlldata();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <p><a href="/newPostForm.php">新規投稿</a></p>
    <p><a href="/updateId.php">編集</a></p>
    <p><a href="/deleteForm.php">削除</a></p>
    <?php
        foreach($results as $column):
    ?>
    <tr>
        <td><?php echo $column["id"]; ?></td>
        <td><?php echo $column["name"]; ?></td>
        <td><?php echo $column["comment"]; ?></td>
        <td><?php echo $column["password"]; ?></td>
        <td><?php echo $column["date"]; ?></td>
    </tr>
    <br>
    <?php
        endforeach;
    ?>
</body>
</html>