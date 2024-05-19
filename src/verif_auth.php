<?php 
session_start ();
 
include('../connex.php');


$ref=$_POST['reference_verif'];

$inf_group=$con->prepare('SELECT * FROM groupage WHERE num_groupage=:A');
$inf_group->execute(array('A'=>$ref));
$info=$inf_group->fetch();

$id_groupage=$info['id_groupage'];

header('Location: ../&_gestion/exportation/pdf/pdf_groupage.php?id_groupage='.$id_groupage)

?>