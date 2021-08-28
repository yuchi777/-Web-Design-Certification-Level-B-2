<?php include_once "../base.php";

// echo $Mem->count($_GET);//精簡

$acc=$_GET['acc'];
$pw=$_GET['pw'];
$chk=$Mem->count(['acc'=>$acc,'pw'=>$pw]);
if($chk>0){
    echo '1';
    $_SESSION['login']=$_GET['acc'];
} 


?>