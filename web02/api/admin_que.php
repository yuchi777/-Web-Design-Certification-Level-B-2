<?php
include '../base.php';

// 存問卷名稱
$Que->save(['text'=>$_POST['subject'], 'parent'=>0, 'vote'=> 0]);

// 抓取id值
$parent = $Que->find(['text'=>$_POST['subject']])['id'];

//存選項
foreach ($_POST['opts'] as $opt) {
    $Que->save(['text'=>$opt, 'parent'=>$parent, 'vote'=>0]);
}

to("../backend.php?do=que");

?>