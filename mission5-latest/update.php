<?php
    require_once('data.php');
    $data=new Data();
    $content=$_POST;
    $data->updateVaridation($content);
?>