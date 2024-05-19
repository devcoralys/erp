<?PHP 
include('../../../connex.php');
session_start ();
$date=gmdate("Y-m-d H:i:s");
   
$recher_chantier=$_SESSION["recher_chantier"];       

/*
$req=" SELECT * FROM fiche LEFT JOIN chantier ON chantier.id_chantier=fiche.chantier_id LEFT JOIN operation ON operation.chantier_id_operation=chantier.id_chantier LEFT JOIN designation ON designation.operation_id_designation=operation.id_operation LEFT JOIN decaissement ON decaissement.num_fiche_decaissement=fiche.num_fiche WHERE id_fiche!='' AND chantier_id=".$recher_chantier." AND fiche.decaisse=1 ";
*/

$req="
SELECT * FROM fiche LEFT JOIN chantier ON fiche.chantier_id=chantier.id_chantier LEFT JOIN operation ON operation.chantier_id_operation=chantier.id_chantier LEFT JOIN designation ON designation.operation_id_designation=operation.id_operation   WHERE chantier_id=".$recher_chantier." AND decaisse=1

";

$records=$con->query($req);   

header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-disposition: attachment; filename=detail_chantier_".$recher_chantier."_".$date.".xls");

$count = $records->rowCount();

  echo'&Eacute;L&Eacute;MENTS TROUV&Eacute;S : '.$count;
  
   echo utf8_decode('
   		<table  style="border:1px solid">
         	<tr style="font-size:14px; font-weight:500; border:1px solid; background-color:#f5f6f8;">
				<th>&nbsp;</th>
				<th>Chantier</th>
				<th>Désignation</th>
				<th>Quantité</th>	
				<th>Prix Unitaire</th>
				<th>Prix Total</th>	
				<th>Fourniture debourse</th>	
				<th>Main d\'oeuvre debourse</th>	
				<th>Montant debourse</th>	
				<th>Marge</th>	
				<th>Avance</th>	
				<th>Solde</th>	
			</tr>
	'); 
	$i=0;
	while($row= $records->fetch())
   {			

	$av=$con->prepare('SELECT SUM(montant) AS deja_decaisse FROM fiche LEFT JOIN decaissement ON decaissement.num_fiche_decaissement=fiche.num_fiche LEFT JOIN chantier ON chantier.id_chantier=fiche.chantier_id WHERE chantier_id=:A AND decaisse=1 AND designation_fiche=:B AND num_fiche_decaissement="'.$row['num_fiche'].'" ');
    $av->execute(array('A'=>$recher_chantier, 'B'=>$row['lib_designation']));
    $iav=$av->fetch();

    $deja_decaisse=floatval($iav['deja_decaisse']);
	

	   		$i++;
            echo'
				<tr style="border:1px solid">
				    <td>&nbsp;</td>
				    <td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['lib_chantier']).'</span></td>
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['lib_designation']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['qte_designation']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['prix_designation']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['qte_designation']*$row['prix_designation']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['fourniture_debourse']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['main_doeuvre_debourse']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['montant_debourse']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['qte_designation']*$row['prix_designation']-$row['montant_debourse']).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($deja_decaisse).'</span></td> 
					<td><span class="text-muted" style="color:#CC9900; font-weight:600; text-transform:uppercase">'.stripslashes($row['montant_debourse']-$deja_decaisse).'</span></td> 
				</tr>
			';
 
	}
	
   echo'
   		</table>
	';
   
   unset($con); 
 
?>
