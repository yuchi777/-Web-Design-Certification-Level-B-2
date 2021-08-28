<?php include_once "../base.php";



$acc=$_GET['acc'];
$chk=$Mem->count(['acc'=>$acc]);
if($chk>0){
    echo "1";
} 


?>