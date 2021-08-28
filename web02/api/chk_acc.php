<?php include_once "../base.php";

// echo $Mem->count($_GET);//精簡

$acc=$_GET['acc'];
$chk=$Mem->count(['acc'=>$acc]);
if($chk>0){
    echo '1';
} 


?>