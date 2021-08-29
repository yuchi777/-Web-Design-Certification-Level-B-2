<?php
include "../base.php";

$type=$_GET['type'];
$news=$News->all(['type'=>$type]);

// echo "<pre>";
// print_r($type); //1,2,3,4
// echo "</pre>";
// echo "<hr>";

// echo "<pre>";
// print_r($news); //2維陣列 key=>0,1.. ;value=>欄位id,title,news,type,sh,pop..
// echo "</pre>";


foreach ($news as $n) {
    echo "<div><a href='javascript:getNews({$n['id']})'> ";

    echo $n['title'];

    echo "</a></div>";
}






?>