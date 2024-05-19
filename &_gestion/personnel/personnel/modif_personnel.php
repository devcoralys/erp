<?php
session_start();
include('../../../connex.php');

$matr=addslashes($_POST['mat_mod']); 
$nom_p=$_POST['nom_mod'];
$sex=$_POST['sexe_mod']; 
$date_naiss=$_POST['date_nais_mod'];
$date_entre=$_POST['date_entre_mod']; 

$tele=$_POST['tel_mod']; 
$mail=addslashes($_POST['email_mod']); 
$servi=$_POST['service_mod'];
$Foncti=$_POST['fonctio_mod']; 
$statu=$_POST['statut_mod']; 



$date=gmdate("Y-m-d H:i:s");


$sqlQuery = $con->query("SELECT * FROM personnel WHERE matricule_personnel='".$matr."' AND id_personnel!='".$_SESSION['id_pers_soi_mod']."'");
$count = $sqlQuery->rowCount();

if($count>0)
{
echo'1';
}
else
{
if(isset($_FILES['photo_mod']) AND $_FILES['photo_mod']['error'] == 0)
{
$tmp_name=$_FILES["photo_mod"]['tmp_name'];
$name=$_FILES["photo_mod"]['name'];
$info = pathinfo($name);
$extension = $info['extension'];
$img="photo_".time().".".$extension;
move_uploaded_file($tmp_name, '../../../photo/'.$img);

$rek=$con->prepare("UPDATE personnel SET photo_personnel=:A WHERE id_personnel=:J");
$rek->execute(array('A'=>$img, 'J'=>$_SESSION['id_pers_soi_mod']));

}

$rep=$con->prepare("UPDATE personnel SET matricule_personnel=:A, nom_personnel=:B, sexe_personnel=:C, date_nais_personnel=:D, tel_personnel=:E, email_personnel=:F, service_id=:G, fonction_id=:H, statut_personnel_id=:I, date_recrutement=:J WHERE id_personnel=:K");
$rep->execute(array('A'=>$matr, 'B'=>$nom_p, 'C'=>$sex, 'D'=>$date_naiss, 'E'=>$tele, 'F'=>$mail, 'G'=>$servi, 'H'=>$Foncti, 'I'=>$statu, 'J'=>$date_entre, 'K'=>$_SESSION['id_pers_soi_mod']));


$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$reg=$con->prepare("SELECT * FROM service WHERE id_service=:A"); 
$reg->execute(array('A' =>$servi));
$utig=$reg->fetch();

$ref=$con->prepare("SELECT * FROM fonction WHERE id_fonction=:A"); 
$ref->execute(array('A' =>$Foncti));
$utif=$ref->fetch();

$res=$con->prepare("SELECT * FROM statut_pers_soignant WHERE code_statut_pers_soignant=:A"); 
$res->execute(array('A' =>$statu));
$utis=$res->fetch();

$lib_trace="Modification personnel (".$matr.") ".$nom_p." ayant pour fonction ".stripslashes($utif['lib_fonction']).' et pour statut '.stripslashes($utis['lib_statut_pers_soignant'])." du service ".$utig['lib_service'];

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
 

unset($con);
}
?>