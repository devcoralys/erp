
<?php
session_start();

setlocale(LC_TIME,"fr_FR.UTF-8","French_France.1252");
$zone=3600*0 ;
$heure=gmdate("H:i:s", time() + $zone); 

$date_creat=date("Y-m-d").' '.$heure;


$fichier=$_FILES["file1"]["name"];

// ouverture du fichier en lecture
if ($fichier)
{
//ouverture du fichier temporaire
$fp = fopen ($_FILES["file1"]["tmp_name"], "r");
}
else{
echo'1';

exit();
}

$info = pathinfo($_FILES['file1']['name']);
$extension = $info['extension'];
$extension_autoriser = array('csv','CSV');

if(in_array($extension, $extension_autoriser))
{
$cpt=0;

include('../../../connex.php');

/*
$navi=$_POST['navire'];
$date=date("Y-m-d");

$red=$con->prepare("DELETE FROM navire_operation WHERE type_op='".$navi."' "); 
$red->execute();
*/
 
while (!feof($fp))
{
$ligne = fgets($fp,4096);
$liste = explode(";",$ligne);
$liste[0] = ( isset($liste[0]) ) ? $liste[0] : Null;
$liste[1] = ( isset($liste[1]) ) ? $liste[1] : Null;
$liste[2] = ( isset($liste[2]) ) ? $liste[2] : Null;
$liste[3] = ( isset($liste[3]) ) ? $liste[3] : Null;
$liste[4] = ( isset($liste[4]) ) ? $liste[4] : Null;
$liste[5] = ( isset($liste[5]) ) ? $liste[5] : Null;
$liste[6] = ( isset($liste[6]) ) ? $liste[6] : Null;
$liste[7] = ( isset($liste[7]) ) ? $liste[7] : Null;

$mat=addslashes($liste[0]);
$nom_p=addslashes($liste[1].' '.$liste[2]); 
$sex=addslashes($liste[3]); 
$servi=addslashes($liste[4]); 
$Foncti=addslashes($liste[5]);
$tel=addslashes($liste[6]);
$email=addslashes($liste[7]);
$date=gmdate('Y-m-d H:i:s');
$img="";


$cpt++;

$red=$con->prepare("SELECT * FROM personnel WHERE email_personnel =:A "); 
$red->execute(array('A' => $email ));

if ($red->rowCount())
{

  $ip	= $_SERVER['REMOTE_ADDR'];
  $port = $_SERVER['REMOTE_PORT'];
  $adresse='Adresse IP: '.$ip.' Port: '.$port;
  //$histo=date('d/m/Y').' '.$heure;
  $date=gmdate('Y-m-d H:i:s');

  $lib_doublon='Doublon détecté sur la personne de <b>'.$nom_p.'</b> Veuillez vérifier votre base de données';

  $req=$con->prepare("INSERT INTO trace(lib_trace, date_trace, secur, adresse_ip) VALUES (:A, :B, :C, :D)");
  $req->execute(array('A'=>$lib_doublon, 'B'=>$date, 'C'=>$_SESSION["secur_site"], 'D'=>$adresse));
  
}
else
{

  //Service select
  $srv=$con->prepare('SELECT * FROM service WHERE lib_service=:A');
  $srv->execute(array('A'=>$servi));
  $iserv=$srv->fetch();
  $serv_id=$iserv['id_service'];

  //Fonction select
  $fct=$con->prepare('SELECT * FROM fonction WHERE lib_fonction=:A ');
  $fct->execute(array('A'=>$Foncti));
  $ifct=$fct->fetch();
  $fct_id=$ifct['id_fonction'];

  $req=$con->prepare("INSERT INTO personnel(nom_personnel, sexe_personnel, tel_personnel, email_personnel, photo_personnel, service_id, fonction_id, date_creat_personnel, secur_ajout, matricule_personnel) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J)");
  $req->execute(array('A'=>$nom_p, 'B'=>$sex, 'C'=>$tel, 'D'=>$email, 'E'=>$img, 'F'=>$serv_id, 'G'=>$fct_id, 'H'=>$date, 'I'=>$_SESSION['secur_site'], 'J'=>$mat));
}

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;
//$histo=date('d/m/Y').' '.$heure;
$date=gmdate('Y-m-d H:i:s');


  $lib_trace="Ajout du personnel <b>".$nom_p."</b> | email <b>".$email."</b> | telephone : <b>".$tel."</b>";

         $reb=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
         $reb->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

}
//echo'2';
fclose($fp);
header('Location: ../personnel.php');
}
else
{
echo'
Probleme avec limportation. Veuillez contacter le support technique SVP.
';
}

?>
 
 