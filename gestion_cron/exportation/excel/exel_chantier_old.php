<?PHP 
include('../../../connex.php');
session_start ();
$date=gmdate("Y-m-d H:i:s");
   
$recher_chantier=$_SESSION["recher_chantier"];       

$req=" SELECT * FROM fiche LEFT JOIN chantier ON chantier.id_chantier=fiche.chantier_id LEFT JOIN decaissement ON decaissement.num_fiche_decaissement=fiche.num_fiche WHERE id_fiche!='' ";
if($recher_chantier!=""){
	$req.=" AND chantier_id='".$recher_chantier."' ";
 }
$records=$con->query($req);   


$montant_devis=0;
$montant_debourse=0;
$somme_avance_decaisse=0;

//Calcul montant devis et montant chantier
$cal=$con->prepare('SELECT * FROM chantier LEFT JOIN operation ON operation.chantier_id_operation=chantier.id_chantier LEFT JOIN designation ON designation.operation_id_designation=operation.id_operation  WHERE id_chantier=:A ');
$cal->execute(array('A'=>$recher_chantier));
while($ical=$cal->fetch())
{
   $montant_devis=$montant_devis+(floatval($ical['qte_designation'])*floatval($ical['prix_designation']));
   $montant_debourse=$montant_debourse+floatval($ical['montant_debourse']);
}


//Calcul somme des avances à payer
$cal2=$con->prepare('SELECT * FROM fiche LEFT JOIN decaissement ON decaissement.num_fiche_decaissement=fiche.num_fiche WHERE chantier_id=:A AND decaisse=1 ');
$cal2->execute(array('A'=>$recher_chantier));
while($ical2=$cal2->fetch())
{
   $somme_avance_decaisse=$somme_avance_decaisse+floatval($ical2['montant']);
}

$solde_restant_a_payer = $montant_debourse-$somme_avance_decaisse;

$marge=$montant_devis-$montant_debourse;
  

header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-disposition: attachment; filename=liste_formation".$date.".xls");

$count = $records->rowCount();

  echo'<b>Montant devis : </b> '.$montant_devis.'<br>'; 
  echo'<b>Montant debourse : </b> '.$montant_debourse.'<br>';
  echo'<b>Montant decaisse : </b> '.$somme_avance_decaisse.'<br>';

  echo'&Eacute;L&Eacute;MENTS TROUV&Eacute;S : '.$count;
  
   echo'
   		<table  style="border:1px solid">
         	<tr style="font-size:14px; font-weight:500; border:1px solid; background-color:#f5f6f8;">
				<th>Fiche N°</th>
				<th>Date</th>
				<th>Demandeur</th>
				<th>Motif demande</th>	
				<th>Montant disponible</th>
				<th>Montant décaissé</th>
			</tr>
	'; 
	$i=0;
	while($row= $records->fetch())
   {			
	
	
//Calcul somme des avances à payer
$cal2=$con->prepare('SELECT SUM(montant) AS total_montant FROM decaissement WHERE num_fiche_decaissement=:B ');
$cal2->execute(array('B'=>$row['num_fiche']));
$ical2=$cal->fetch();
$avance_decaisse=floatval($ical2['total_montant']);


	   		$i++;
            echo'
				<tr style="border:1px solid">
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['num_fiche']).'</span></td>
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['date_creat_fiche']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['beficiaire_fiche']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['designation_fiche']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['montant_fiche']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($avance_decaisse).'</span></td> 
				</tr>
			';
 
	}
	
   echo'
   		</table>
	';
   
   unset($con); 
 
?>
