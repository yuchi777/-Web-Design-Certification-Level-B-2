<?php
include '../base.php';


$vote = $_POST['opt'];

//撈取投票資料
$opt = $Que->find($vote);
//parent欄位=>題目id
$parent = $Que->find($opt['parent']);

$opt['vote']++;
$parent['vote']++;
$Que->save($opt);
$Que->save($parent);

to("../index.php?do=result&id=".$parent['id']);

?>