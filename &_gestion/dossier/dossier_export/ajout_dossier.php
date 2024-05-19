<?php
session_start();
$time_dossier=time();
include('../../../connex.php');


$date=gmdate("Y-m-d H:i:s");

$nom_dossier=addslashes($_POST['nom_dossier']);
$description_dossier=addslashes($_POST['description_dossier']);
$date_int_dossier=$_POST['date_int_dossier'];
$service_dossier_id=$_POST['service_dossier_id'];
$membre_dossier = $_POST['membre_dossier'];
$client_id=$_POST['client_id'];
$type_transit_id=$_POST['type_transit_id'];
$export=1;
$import=0;

$ts_douane=20000;

$n=$con->query('SELECT * FROM dossier WHERE import=0 AND export=1');
$n->execute();
$nb=$n->rowcount();
$nb_new=$nb+738;
$num_dossier='S-EX000'.$nb_new.'/'.gmdate("Y");

//Date saisie comme date de création du dossier


if($nom_dossier!='' && $description_dossier!='' && $service_dossier_id && $membre_dossier!='' && $client_id!='' && $type_transit_id!='')
{
$req=$con->prepare("INSERT INTO dossier(time_dossier, num_dossier, nom_dossier, description_dossier, date_int_dossier, service_dossier_id, date_creat_dossier, secur_ajout_dossier, client_id, type_transit_id, ts_douane, export, import) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M)");
$req->execute(array('A'=>$time_dossier, 'B'=>$num_dossier, 'C'=>$nom_dossier, 'D'=>$description_dossier, 'E'=>$date_int_dossier, 'F'=>$service_dossier_id, 'G'=>$date, 'H'=>$_SESSION['secur_site'], 'I'=>$client_id, 'J'=>$type_transit_id, 'K'=>$ts_douane, 'L'=>$export, 'M'=>$import));


if($membre_dossier!='null' && $membre_dossier!='Array' && $membre_dossier!='')
{
$id_pers=explode(",",$membre_dossier);
$cmpte=count($id_pers);
$b=0;
while($b<$cmpte)
{

if($id_pers[$b]!='Array' && $id_pers[$b]!='')
{	

$prend_pers=$id_pers[$b];

$req=$con->prepare("INSERT INTO membre_dossier(dossier_time_membre, utilisateur_secur_dossier) VALUES (:A, :B)");
$req->execute(array('A'=>$time_dossier, 'B'=>$prend_pers)); 

}
$b++;

}
}


$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$lib_trace="Creation dossier exportation ".$type_transit_id."  N° ".$num_dossier." pour le client N° ".$client_id." ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));

echo'0';
unset($con);
}
 
?>