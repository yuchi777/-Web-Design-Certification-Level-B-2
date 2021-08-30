<?php
include "../base.php";

$type = $_POST['type'];
$news = $_POST['news'];
$acc = $_POST['acc'];

switch ($type) {
    // 按讚
    case '1':
        $Log->save(['news'=>$news, 'acc'=>$acc]);

        // 增加按讚人氣次數 //撈資料>pop+1>回存
        $p=$News->find($news);
        $p['pop']++;
        $News->save($p);
        break;

    //收回讚
    case '2':
        $Log->del(['news'=>$news, 'acc'=>$acc]);

        // 減去按讚人氣次數 //撈資料>pop-1>回存
        $p=$News->find($news);
        $p['pop']--;
        $News->save($p);
        break;
    
    default:
        # code...
        break;
}




?>