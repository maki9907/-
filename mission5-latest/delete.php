<?php
    require_once('data.php');
    $deleteId=$_POST["deleteId"];
    $name=$_POST["name"];
    $password=$_POST["password"];
    $data=new Data();
    $data->judge($deleteId,$name,$password);
    $data->delete($deleteId);
?>