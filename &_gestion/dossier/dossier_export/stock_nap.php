<?php
session_start();
include('../../../connex.php');

$_SESSION['net_a_payer']=$_POST['net_a_payer'];

unset($con);

 
?>