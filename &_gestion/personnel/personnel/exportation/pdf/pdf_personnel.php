<?php
session_start ();
 
    include('../../../connex.php');
	 
	include("../../../pdf/phpToPDF.php");

	require('../../../pdf/mysql_table.php');

class PDF extends PDF_MySQL_Table
{

function Header()
{
           
 
}

// Pied de page
function Footer()
{
	// Position at 1.5 cm from bottom
    $this->SetY(-15);
    $this->Image('../../../../../img/logo_t_care.jpg', 10,282,17);	
    // Arial italic 8
    $this->SetFont('Arial','',7);
	//$this->Cell(0,10,'CMS/ABJ/BS/PH',0,0,'L');
	
	//$this->Cell(0,10,'CMS/ABJ/BS/PH',0,0,'L');
	/*
	$this->Cell(0,3.5,utf8_decode("SYNDICAT DES ENTREPRENEURS DE MANUTENTION DES PORTS ABIDJAN ET DE COTE D'IVOIRE - SEMPA"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('Au capital de XXXXX F CFA - Siège Social : Bd de Marseille, vers SODECI - Zone portuaire Treichville'),0,1,'C');
$this->Cell(0,3.5,utf8_decode("01 BP 4082 Abidjan 01 - Abidjan - COTE D'IVOIRE - Téléphone : (+225) 21 21 35 50  -  Fax : (+225) 21 25 69 88"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('RCCM :  -  N° CC : '),0,1,'C');
	*/
	$this->Image('../../../../../img/logo_sempa.jpg', 178,282,22);	
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
}
}
            
			//Paramètres du fichier PDF 
			$pdffilename = 'liste_personnel_cms.pdf';
			clearstatcache();
			if (file_exists($pdffilename)) {
			//Si le fichier PDF existe, il faut le supprimer d'abord
			unlink($pdffilename);
			}
			 
			//Création du fichier PDF
			$pdf=new PDF('P','mm','A4');
			 
			$pdf->AliasNbPages();

			//$pdf->AddPage('L');
			$pdf->AddPage();
			
			/*
			$pdf->SetTextColor(0);
			$pdf->SetFont('Arial','B',8);
			$cot_ivoir=utf8_decode("Côte d'Ivoire");
			 //$pdf->Image('../../../img/entete-logo.jpg',12,8,43);
			 $pdf->Image("../../../../../img/logo_sempa_.jpg", -20, 5, 250, 'L');
			 //$pdf->Cell(0,2,"Syndicat des Entrepreneurs de Manutention des Ports Abidjan et de ".$cot_ivoir." ",0,1,'C');
			 //$pdf->Line(10, 35, 200, 35); 
			 $pdf->Ln(28);
			 */

			$pdf->SetTextColor(0);
			$pdf->SetFont('Arial','',10);
			$cot_ivoir=utf8_decode("Côte d'Ivoire");
			 //$pdf->Image('../../../img/entete-logo.jpg',12,8,43);
			 $pdf->Image("../../../../../img/logo_sempa.jpg", 80, 5,  40, 'L');
			 $pdf->Ln(15);
			 $pdf->Cell(0,2,"Syndicat des Entreprises de Manutention des Ports de ".$cot_ivoir." ",0,1,'C');
			 //$pdf->Line(10, 35, 200, 35); 
			 $pdf->Ln(10);

			 $pdf->SetFont('Arial','',7);
			$mot="N°";
			$num=utf8_decode($mot);
			$date=gmdate('d/m/Y');
			
		 
	if(isset($_SESSION['recher_pers']) && $_SESSION['recher_pers']!='')
	{
	$recher_pers=$_SESSION['recher_pers'];
	}
	else
	{
	$recher_pers='';
	}
	
	if(isset($_SESSION['recher_service']) && $_SESSION['recher_service']!='')
	{
	$recher_service=$_SESSION['recher_service'];
	}
	else
	{
	$recher_service='';
	}
	
	if(isset($_SESSION['recher_fonction']) && $_SESSION['recher_fonction']!='')
	{
	$recher_fonction=$_SESSION['recher_fonction'];
	}
	else
	{
	$recher_fonction='';
	}
	
	if(isset($_SESSION['recher_statut']) && $_SESSION['recher_statut']!='')
	{
	$recher_statut=$_SESSION['recher_statut'];
	}
	else
	{
	$recher_statut='';
	}
	
	if(isset($_SESSION['recher_actif']) && $_SESSION['recher_actif']!='')
	{
	$recher_actif=$_SESSION['recher_actif'];
	}
	else
	{
	$recher_actif='';
	}
	
	if(isset($_SESSION['recher_sexe']) && $_SESSION['recher_sexe']!='')
	{
	$recher_sexe=$_SESSION['recher_sexe'];
	}
	else
	{
	$recher_sexe='';
	}

		
	if(isset($_SESSION['recher_site']) && $_SESSION['recher_site']!='')
	{
	$recher_site=$_SESSION['recher_site'];
	}
	else
	{
	$recher_site='';
	}
	

 $req="SELECT * FROM personnel_soignant WHERE id_personnel_soignant!=''";
	 
	 if($recher_pers!=""){
	 $req.=" and id_personnel_soignant IN (".$recher_pers.")";
	 }
	 
	 if($recher_service!=""){
	 $req.="and service_id IN (".$recher_service.")";
	 }
	 
	 if($recher_fonction!=""){
	 $req.="and fonction_id IN (".$recher_fonction.")";
	 }
	 
	 if($recher_statut!=""){
	 $req.="and statut_pers_soignant_code IN (".$recher_statut.")";
	 }
	  
	 if($recher_actif!=""){
	 $req.="and valide=".$recher_actif."";
	 }  
	 
	 if($recher_sexe!=""){
	 $req.="and sexe_personnel_soignant IN (".$recher_sexe.")";
	 }

	 if($recher_site!=""){
		$req.="and site_id IN (".$recher_site.")";
	 }
			
			
	$req.=" ORDER BY nom_personnel_soignant ASC, matricule_personnel_soignant ASC ";
	 
	$reta=$con->prepare($req); 
    $reta->execute();
	$uta=$reta->fetch();
	$nbre_pers=$reta->rowcount();
			
			/*
			$rek=$con->prepare("SELECT * FROM fournisseur WHERE id_fournisseur=:A"); 
            $rek->execute(array('A' =>$uta["com_fournisseur_id"]));
			$utak=$rek->fetch();
			*/
		     
$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,3.3,'LISTE DU PERSONNEL CMS',0,1,'C');
			
$pdf->Ln(6);
$date_oj=gmdate('d/m/Y');
			
$pdf->SetFont('Arial','',10);
//$pdf->Rect(10,31,55,21);
//$pdf->Cell(0,3.7,'                                                                                                                                                     
// Abidjan le '.$date_oj.' ',0,1,'L');
$pdf->Cell(0,4,'
			                                                                                                                         Abidjan le '.$date_oj,0,1,'L'); 																																		  
/*
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,5,' '.stripslashes(strtoupper($utak["nom_fournisseur"])),0,1,'L');                      
*/
			
$pdf->Ln(4);
$pdf->SetFont('Arial','B',7);
//$pdf->Cell(0,3.7,'SOUCHE',0,1,'L');
			
/*$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3.7,' MOTIF DE SORTIE : '.stripslashes(strtoupper($utak["lib_motif_sortie_medicament"])),0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,2,"BON DE SORTIE ".$num." : ".$uta["num_bon_sortie"]."",0,1,'C');*/
			
$pdf->Cell(20);
$pdf->Ln(8);
/*
$cal="SELECT SUM(prix_stock_produit_commande*qte_stock_produit_commande) AS mont_tot FROM stock_produit_commande LEFT JOIN utilisateur ON utilisateur.secur=stock_produit_commande.secur_ajout_commande LEFT JOIN produit ON stock_produit_commande.produit_id=produit.id_produit LEFT JOIN famille_produit ON famille_produit.id_famille_produit=produit.famille_produit_id LEFT JOIN medicament_rayon ON medicament_rayon.produit_id=produit.id_produit LEFT JOIN rayon ON rayon.id_rayon=medicament_rayon.rayon_id LEFT JOIN bon_commande_medic ON stock_produit_commande.bon_id=bon_commande_medic.id_bon_commande LEFT JOIN fournisseur ON fournisseur.id_fournisseur=bon_commande_medic.com_fournisseur_id WHERE bon_id!='' ";

if($recher_com_fourn!='')
{
$cal.= "  AND (lib_produit LIKE '%".$recher_com_fourn."%' || nom_utilisateur LIKE '%".$recher_com_fourn."%' ) ";
}

if($recher_famille_produit!='')
{
$cal.=" AND (famille_produit_id=".$recher_famille_produit.") ";
}

if($recher_rayon!='')
{
$cal.=" AND (id_rayon=".$recher_rayon.") ";
}

if($recher_fournisseur!='')
{
$cal.=" AND (id_fournisseur=".$recher_fournisseur.") ";
}
		
$rek=$con->prepare($cal);
$rek->execute();
$rok=$rek->fetch(); 
$mont_pro=$rok['mont_tot'];
$mont_p=strrev(wordwrap(strrev($mont_pro), 3, ' ', true));
*/

$pdf->SetFont('Arial','B',9);
$pdf->Cell(0,3.7,utf8_decode('Nombre de personnes trouvées : '.$nbre_pers.' '),0,1,'L');
			
$pdf->Cell(20);
$pdf->Ln(3);
			
$width_cell=array(18,50,45,45,18,18);
$pdf->SetFont('Arial','B',7);

//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //
$pdf->Cell($width_cell[0],7,utf8_decode('MATRICULE'),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('NOM ET PRENOM(S)'),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('SERVICE'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('FONCTION'),1,0,'C',true);
$pdf->Cell($width_cell[4],7,utf8_decode('STATUT'),1,0,'C',true);
$pdf->Cell($width_cell[5],7,utf8_decode('SITE'),1,1,'C',true);
//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',5);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;

//$pdf->SetWidths(array(18,80,20,20,52));

foreach($reta as $row) {

//Req
$rep=$con->prepare("SELECT * FROM service WHERE id_service='".$row['service_id']."'");
$rep->execute(); 
$ro=$rep->fetch();

$rep_1=$con->prepare("SELECT * FROM fonction WHERE id_fonction='".$row['fonction_id']."'");
$rep_1->execute(); 
$ro_1=$rep_1->fetch();

$rep_2=$con->prepare("SELECT * FROM statut_pers_soignant WHERE code_statut_pers_soignant='".$row['statut_pers_soignant_code']."'");
$rep_2->execute(); 
$ro_2=$rep_2->fetch();

$rep_3=$con->prepare("SELECT * FROM site WHERE id_site='".$row['site_id']."'");
$rep_3->execute(); 
$ro_3=$rep_3->fetch();

if($row['sexe_personnel_soignant']=='1'){ $sexe='HOMME'; }else if($row['sexe_personnel_soignant']=='2'){ $sexe='FEMME'; }else{ $sexe=''; } 

$date_nais = date("d/m/Y", strtotime($row['date_nais_personnel_soignant']));
//Req

$pdf->Cell($width_cell[0],7,utf8_decode($row['matricule_personnel_soignant']),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode($row['nom_personnel_soignant']),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode($ro['lib_service']),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode($ro_1['lib_fonction']),1,0,'C',true);
$pdf->Cell($width_cell[4],7,utf8_decode($ro_2['lib_statut_pers_soignant']),1,0,'C',true);
$pdf->Cell($width_cell[5],7,utf8_decode($ro_3['lib_site']),1,1,'C',true);
$fill = !$fill;

}
$pdf->Ln(8);

/*
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,6,utf8_decode('Validé par : '),0,1,'R');
$pdf->SetFont('Arial','B',10);

if($uta["valide_sortie_prod"]==1)
{
$reb=$con->prepare("SELECT * FROM utilisateur WHERE secur='".$uta['secur_valide']."'");
$reb->execute();
$rob=$reb->fetch(); 

$pdf->Cell(0,6,stripslashes(strtoupper($rob['nom_utilisateur'])),0,1,'R');
}     
*/    
$pdf->Ln(149);
$pdf->Line(10, 275, 200, 275);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>