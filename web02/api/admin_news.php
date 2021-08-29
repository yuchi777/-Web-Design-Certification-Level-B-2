<?php
include '../base.php';

print_r($_POST['id']);


foreach ($_POST['id'] as  $id) {

    // 判斷del 
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $News->del($id);
    }else{
        // 判斷sh
        $news=$News->find($id);

        //三元運算子
        $news['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $News->save($news);

    }
}


to("../backend.php?do=news");

?>