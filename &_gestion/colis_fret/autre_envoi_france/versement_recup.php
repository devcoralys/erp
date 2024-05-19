<?php
session_start();
include('../../../connex.php');


$id = $_GET["ref"];

$inf=$con->prepare('SELECT * FROM caisse WHERE code_caisse=:A');
$inf->execute(array('A'=>$id));
$info=$inf->fetch();
$id=$info['num_caisse'];

$_SESSION['num_caisse_recup']=$id;
?>
