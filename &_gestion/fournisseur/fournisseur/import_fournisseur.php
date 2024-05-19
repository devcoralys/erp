
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

 
while (!feof($fp))
{
$ligne = fgets($fp,4096);
$liste = explode(";",$ligne);
$liste[0] = ( isset($liste[0]) ) ? $liste[0] : Null;
$liste[1] = ( isset($liste[1]) ) ? $liste[1] : Null;
$liste[2] = ( isset($liste[2]) ) ? $liste[2] : Null;
$liste[3] = ( isset($liste[3]) ) ? $liste[3] : Null;


$nom_p=addslashes($liste[0]); 
$tel=addslashes($liste[1]);
$email=addslashes($liste[2]);
$adresse=addslashes($liste[3]);
$date=gmdate('Y-m-d H:i:s');

$cpt++;

$red=$con->prepare("SELECT * FROM fournisseur WHERE email_fournisseur =:A OR tel_fournisseur=:B "); 
$red->execute(array('A' => $email, 'B' => $tel ));

if ($red->rowCount())
{

  $ip	= $_SERVER['REMOTE_ADDR'];
  $port = $_SERVER['REMOTE_PORT'];
  $adresse='Adresse IP: '.$ip.' Port: '.$port;
  //$histo=date('d/m/Y').' '.$heure;
  $date=gmdate('Y-m-d H:i:s');

  $lib_doublon='Doublon détecté sur le fournisseur <b>'.$nom_p.'</b> Veuillez vérifier votre base de données';

  $req=$con->prepare("INSERT INTO trace(lib_trace, date_trace, secur, adresse_ip) VALUES (:A, :B, :C, :D)");
  $req->execute(array('A'=>$lib_doublon, 'B'=>$date, 'C'=>$_SESSION["secur_site"], 'D'=>$adresse));
  
}
else
{

  if($nom_p!='' && $tel!='' && $email!='')
  {
    $nc=$con->prepare('SELECT * FROM fournisseur ');
    $nc->execute();
    $nb=$nc->rowcount();

    $code_fournisseur='STT'.gmdate('Ymd').'-000'.$nb;


    $req=$con->prepare("INSERT INTO fournisseur(code_fournisseur, nom_fournisseur, tel_fournisseur, email_fournisseur, date_creat_fournisseur, secur_ajout, adresse) VALUES (:A, :B, :E, :F, :K, :L, :M)");
    $req->execute(array('A'=>$code_fournisseur, 'B'=>$nom_p, 'E'=>$tel, 'F'=>$email, 'K'=>$date, 'L'=>$_SESSION['secur_site'], 'M'=>$adresse));
  }
}

$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;
//$histo=date('d/m/Y').' '.$heure;
$date=gmdate('Y-m-d H:i:s');


  $lib_trace="Ajout du fournisseur <b>".$nom_p."</b> | email <b>".$email."</b> | telephone : <b>".$tel."</b> | adresse : <b>".$adresse."</b>";

         $reb=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
         $reb->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

}
//echo'2';
fclose($fp);
header('Location: ../fournisseur.php');
}
else
{
echo'
Probleme avec limportation. Veuillez contacter le support technique SVP.
';
}

?>
 
 