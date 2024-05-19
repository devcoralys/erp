<?php
//session_start();
include('../../../connex.php');

$id=$_GET['cpt_id'];

$red=$con->prepare("SELECT * FROM groupe_utilisateur WHERE id_type_groupe=:A"); 
$red->execute(array('A' =>$id));
$uti=$red->fetch();

			    echo "";

unset($con);

?>