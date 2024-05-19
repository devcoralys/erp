<?PHP 
include('../../../connex.php');
session_start ();
$date=gmdate("Y-m-d H:i:s");
   

	if(isset($_SESSION['recher_date_debut']) && $_SESSION['recher_date_debut']!='')
	{
	$recher_date_debut=$_SESSION['recher_date_debut'];
	}
	else
	{
	$recher_date_debut='';
	}

	if(isset($_SESSION['recher_date_fin']) && $_SESSION['recher_date_fin']!='')
	{
	$recher_date_fin=$_SESSION['recher_date_fin'];
	}
	else
	{
	$recher_date_fin='';
	}


	$req=" SELECT * FROM mouvement WHERE id_mouvement!='' ";


	if($recher_date_debut!='')
	{
		$req.=" AND date_creat_mouvement>='".$recher_date_debut."' ";
	}

	if($recher_date_fin!='')
	{
		$req.=" AND date_creat_mouvement<='".$recher_date_fin."' ";
	}


    $req.=" ORDER BY date_creat_mouvement DESC ";
	$records=$con->query($req);   
	
	/*
	$inf=$con->query(" SELECT * FROM utilisateur WHERE id_utilisateur='".$recher_utilisateur."' ");
	$info=$inf->fetch();
	$nom_utilisateur=$info['nom_utilisateur'];
	*/		  

header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-disposition: attachment; filename=mouvements_financiers_".$date.".xls");

$count = $records->rowCount();

  echo'<h3>MOUVEMENTS FINANCIERS</h3>';
/*
  echo '<b>Crit&egrave;res:</b><p>Recherche= <b>'.$recher_historique.'</b>, Utilisateur= <b>'.$nom_utilisateur.'</b>,  Debut= <b>'.$dp1.'</b>, Fin= <b>'.$dp2.'</b></p> ';
  */
  echo'&Eacute;L&Eacute;MENTS TROUV&Eacute;S : '.$count;
  
   echo'<table  style="border:1px solid;">
    <tr style="font-size:14px; font-weight:500; border:1px solid; color:#fff; background-color:#038dda;">
        <td width="150">CODE</td>
        <td width="130">DATE</td>
		<td width="380">MONTANT</td>
	</tr>'; 
 
	while($row= $records->fetch())
   {

	if($row['type_mouvement']==0){
		$montant=-floatval($row['montant_mouvement']);
	}
	else
	{
		$montant=floatval($row['montant_mouvement']);
	}
 				
		
    echo'<tr style="border:1px solid">
			<td width="180">'.$row['num_mouvement'].'</td>
			<td width="100">'.$row['date_creat_mouvement'].'</td>
			<td width="130">'.$montant.'</td>
		</tr>';
 
	}
	
   echo'</table>';
   
   unset($con); 
 
?>
