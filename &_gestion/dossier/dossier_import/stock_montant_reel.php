<?php
session_start();
include('../../../connex.php');

$_SESSION['total_formalite']=$_POST['total_formalite'];

unset($con);

 
?>