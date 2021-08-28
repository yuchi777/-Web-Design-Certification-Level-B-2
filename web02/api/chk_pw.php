<?php include_once "../base.php";



$acc=$_GET['acc'];
$pw=$_GET['pw'];
$chk=$Mem->count(['acc'=>$acc,'pw'=>$pw]);
if($chk>0){
    echo '1';
} 


?>