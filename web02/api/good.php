<?php
include "../base.php";

$type = $_POST['type'];
$news = $_POST['news'];
$acc = $_POST['acc'];

switch ($type) {
    // 按讚
    case '1':
        $Log->save(['news'=>$news, 'acc'=>$acc]);
        break;

    //收回讚
    case '2':
        $Log->del(['news'=>$news, 'acc'=>$acc]);
        break;
    
    default:
        # code...
        break;
}




?>