<?php
include "../base.php";

$id=$_GET['id'];
$post=$News->find($id);

// echo "<pre>";
// print_r($id); //1,2,3,4
// echo "</pre>";
// echo "<hr>";

// echo "<pre>";
// print_r($post); //2維陣列 key=>0,1.. ;value=>欄位id,title,news,type,sh,pop..
// echo "</pre>";


echo nl2br($post['news']);







?>