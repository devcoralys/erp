<?php 
session_start ();
 
include('../connex.php');


$ref=$_POST['reference_verif'];

$inf_group=$con->prepare('SELECT * FROM autre_envoi WHERE num_autre_envoi=:A');
$inf_group->execute(array('A'=>$ref));
$info=$inf_group->fetch();

$id_autre_envoi=$info['id_autre_envoi'];

header('Location: ../&_gestion/exportation/pdf/pdf_autre_envoi.php?id_autre_envoi='.$id_autre_envoi)

?>