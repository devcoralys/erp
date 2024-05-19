<?php
session_start();
include('../../../connex.php');

$actif=addslashes($_POST['actif']); 
$date_sortie=$_POST['date_sortie'];
$date=gmdate("Y-m-d H:i:s");

if($actif=='')
{
echo'1';
}
else
{

$rep=$con->prepare("UPDATE personnel SET valide=:A, motif_sortie_pers_soign_id=:B, date_creat_sortie=:C, date_sortie=:D WHERE id_personnel=:K");
$rep->execute(array('A'=>'1', 'B'=>$actif, 'C'=>$date, 'D'=>$date_sortie, 'K'=>$_SESSION['id_pers_soi_actif']));

$rev=$con->prepare("UPDATE utilisateur SET valide_util=:A WHERE personnel_id=:K");
$rev->execute(array('A'=>'1', 'K'=>$_SESSION['id_pers_soi_actif']));


unset($con);
}
?>