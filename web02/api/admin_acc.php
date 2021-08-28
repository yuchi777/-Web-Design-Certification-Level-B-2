<?php
include '../base.php';

// print_r($_POST['del']);

if($_POST['del']){
    foreach ($_POST['del'] as $key => $id) {
        $mem=$Mem->del($id);
    }
}

to("../backend.php?do=acc");

?>