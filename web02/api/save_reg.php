<?php
include_once '../base.php';

echo $Mem->save([
    'acc'=>$_POST['acc'],
    'pw'=>$_POST['pw'],
    'email'=>$_POST['email']
]);







?>