<?php
session_start ();
 
    include('../../../../connex.php');
	 
	include("../../../../pdf/phpToPDF.php");

	require('../../../../pdf/mysql_table.php');

class PDF extends PDF_MySQL_Table
{

function Header()
{
           
}

// Pied de page
function Footer()
{
	// Position at 1.5 cm from bottom
    $this->SetY(-19);
    //$this->Image('../../../../img/logo.jpg', 10,282,17);	
    // Arial italic 8
    $this->SetFont('Arial','',9);
	//$this->Cell(0,10,'CMS/ABJ/BS/PH',0,0,'L');
	
	//$this->Cell(0,10,'CMS/ABJ/BS/PH',0,0,'L');
	$this->Cell(0,3.5,utf8_decode('Sevice Transit Transport de Côte d\'Ivoire (STT-CI) -SARL au capital de 5.000.000 FCFA - Siège Social : Abidjan Port-Bouet  cité Douane'),0,1,'C');
	$this->Cell(0,3.5,utf8_decode("07 BP 774 Abidjan 07 - Tel: 27 21 58 09 78 / 07 57 29 04 29 - Email : servicestransittransport@gmail.com"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('RCCM : CI-ABJ-2017-B-2420 -  N° Compte Bancaire : CI 034 01022 18140790004 61 BACI '),0,1,'C');
	
	//$this->Image('../../../../img/logo.jpg', 178,282,22);	
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
}
}
            

			//Paramètres du fichier PDF 
			$pdffilename = 'bon_de_livraison.pdf';
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
			 $pdf->Image("../../../../img/logo_sempa_.jpg", -20, 5, 250, 'L');
			 //$pdf->Cell(0,2,"Syndicat des Entrepreneurs de Manutention des Ports Abidjan et de ".$cot_ivoir." ",0,1,'C');
			 //$pdf->Line(10, 35, 200, 35); 
			 $pdf->Ln(28);
			 */

			$pdf->SetTextColor(0);
			$pdf->SetFont('Arial','',10);
			$cot_ivoir=utf8_decode("Côte d'Ivoire");
			 //$pdf->Image('../../../img/entete-logo.jpg',12,8,43);
			 $pdf->Image("../../../../img/logo.jpg", 8, 5,  50, 'L');
			 $pdf->Ln(15);
			 //$pdf->Cell(0,2,utf8_decode("Services Transit Transport Côte d'Ivoire "),0,1,'C');
			 //$pdf->Line(10, 35, 200, 35); 
			 $pdf->Ln(10);

			 $pdf->SetFont('Arial','',7);
			$mot="N°";
			$num=utf8_decode($mot);
			$date=gmdate('d/m/Y');
			
		 
			$ref_dos=$_SESSION['ref_dos'];

			$inf=$con->prepare('SELECT * FROM dossier LEFT JOIN client ON client.id_client=dossier.client_id LEFT JOIN service ON service.id_service=dossier.service_dossier_id WHERE id_dossier=:A');
			$inf->execute(array('A'=>$ref_dos));
			$info=$inf->fetch();
			
			$num_dossier=$info['num_dossier'];
			$nom_client=$info['nom_client'];
			$email_client=$info['email_client'];
			$tel_client=$info['tel_client'];
			$nom_dossier=$info['nom_dossier'];
			$lib_service=$info['lib_service'];
			$dateline=$info['date_int_dossier'];
			$transport_deja_paye=$info['transport_deja_paye'];
			$montant_transport=$info['montant_transport'];
			$date_depart_expedition=$info['date_depart_expedition'];
			$date_arrivee=$info['date_arrivee'];
			$pays_provenance=$info['pays_provenance'];
			$transporteur=$info['transporteur'];
			$code_bateau=$info['code_bateau'];
			$num_connaissement=$info['num_connaissement'];
			$num_voyage=$info['num_voyage'];
			$masse_net=$info['masse_net'];
			$masse_brute=$info['masse_brute'];
			$total_colis=$info['total_colis'];
			$manifeste=$info['manifeste'];
			$tirage_declaration=$info['tirage_declaration'];
			$sydam=$info['sydam'];
			$fiche_assurance=$info['fiche_assurance'];
			$agio=$info['agio'];
			$ouverture_dossier=$info['ouverture_dossier'];
			$acconage=$info['acconage'];
			$surestarie=$info['surestarie'];
			$echange_bl=$info['echange_bl'];
			$caution=$info['caution'];
			$livraison=$info['livraison'];
			$ts_douane=$info['ts_douane'];
			$retrait_documentaire=$info['retrait_documentaire'];
			$debours_divers=$info['debours_divers'];
			$documentation_weeb=$info['documentation_weeb'];
			$bsc=$info['bsc'];
			$aiae=$info['aiae'];
			$certificat_veterinaire=$info['certificat_veterinaire'];
			$appurement_magasin=$info['appurement_magasin'];
			$magasinage=$info['magasinage'];
			$sortie_pc=$info['sortie_pc'];
			$commission=$info['commission'];
			$escorte=$info['escorte'];
			$manutention=$info['manutention'];
			$had=$info['had'];
			$certificat_phyto=$info['certificat_phyto'];
			$api=$info['api'];	
			$nature=$info['nature'];		
			$net_a_payer=$_SESSION['net_a_payer'];

			$r_num_declaration=$info['r_num_declaration'];
			$r_mode_paiement=$info['r_mode_paiement'];
			$r_liquidation=$info['r_liquidation'];
			$r_num_quittance=$info['r_num_quittance'];
			$r_dt=$info['r_dt'];
			$r_sydam=$info['r_sydam'];
			$r_agio=$info['r_agio'];
			$r_ts_douane=$info['r_ts_douane'];
			$r_bsc=$info['r_bsc'];
			$r_api=$info['r_api'];
			$r_assurance=$info['r_assurance'];
			$r_certificat_phyto=$info['r_certificat_phyto'];
			$r_magasinage=$info['r_magasinage'];
			$r_manutention=$info['r_manutention'];
			$r_echange_bl=$info['r_echange_bl'];
			$r_surestarie=$info['r_surestarie'];
			$r_caution=$info['r_caution'];
			$r_livraison=$info['r_livraison'];
			$r_transport_agent=$info['r_transport_agent'];
			$r_commission=$info['r_commission'];
			$r_retrait_documentaire=$info['r_retrait_documentaire'];
			$r_manifeste=$info['r_manifeste'];
			$r_acconage=$info['r_acconage'];


			/*
			$requete=" SELECT * FROM article WHERE id_article!='' AND dossier_id=".$ref_dos." ";
			$sqlQuery=$con->query($requete);
			$nb_colis 	= $sqlQuery->rowCount();
			*/


			$nom_fournisseur=$info['nom_fournisseur'];
			$facture_fournisseur=$info['facture_fournisseur'];
			$bon_a_enlever=$info['bon_a_enlever'];
			$copie_lta=$info['copie_lta'];
			$liste_colisage=$info['liste_colisage'];
			$autre_document=$info['autre_document'];

			$date_declaration_bl=$info['date_declaration_bl'];
			$date_lta_bl=$info['date_lta_bl'];
			$waybill_bl=$info['waybill_bl'];

			$lieu_livraison='Koumassi';


			$liste_fichiers_joints='';

			if($facture_fournisseur==1)
			{
				$liste_fichiers_joints.='Facuture fournisseur, ';
			}
		
			if($bon_a_enlever==1)
			{
				$liste_fichiers_joints.='Bon à enlever, ';
			}

			if($copie_lta==1)
			{
				$liste_fichiers_joints.='Copie LTA, ';
			}

			if($liste_colisage==1)
			{
				$liste_fichiers_joints.='Liste de colisage, ';
			}

			if($autre_document==1)
			{
				$liste_fichiers_joints.='Autre documents. ';
			}

			$requete=" SELECT * FROM dossier WHERE id_dossier!='' ";
			$sqlQuery=$con->query($requete);
			$nb_colis 	= $sqlQuery->rowCount();
			$num_bl=$nb_colis+1;
	 
			
			$date_oj=gmdate('d/m/Y');
						
			$pdf->SetFont('Arial','',10);
			//$pdf->Cell(0,4,'Date : '.$date_oj,0,1,'R'); 	

			$pdf->Ln(6);


			$date_oj=gmdate('d/m/Y');
			
	
		   
																																					  
$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,3.3,utf8_decode('BON DE LIVRAISON N° 000'.$num_bl),0,1,'C');

$pdf->Ln(4);

$pdf->SetFont('Arial','',10);

$pdf->Cell(0,4, utf8_decode('Date d\'édition :'.$date_oj),0,1,'C'); 

$pdf->Ln(4);

$pdf->SetTextColor(232,0,14);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('Dossier N° : '.$num_dossier), '0', 'C', 0);
$pdf->SetTextColor(0,0,0);

$pdf->Ln(8);

$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3.3,utf8_decode('CLIENT : '.$nom_client),0,1,'L');

$pdf->Ln(1);

$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('Fournisseur : '.$nom_fournisseur.'  '), '0', 'L', 0);



$pdf->Ln(1);

$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('Département : '.$lib_service.' - Date d\'édition : '.$date_oj), '0', 'L', 0);

$pdf->Ln(1);

$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('Nature du colis : '.$nature.' - Lieu de livraison : '.$lieu_livraison.'  '), '0', 'L', 0);

$pdf->Ln(1);

$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('N° Déclaration : '.$r_num_declaration.' du : '.$date_declaration_bl.' '), '0', 'L', 0);

$pdf->Ln(1);

$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('N° LTA : '.$num_connaissement.' du : '.$date_lta_bl.' - BL : '.$waybill_bl), '0', 'L', 0);

$pdf->Ln(1);

$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode(' Nbre Colis : '.$total_colis.' - Poids(KG) : '.$masse_brute), '0', 'L', 0);



$pdf->Ln(1);

$pdf->SetFont('Arial','U',10);
$pdf->MultiCell(0,6,utf8_decode('Liste des Fichiers joints '), '0', 'L', 0);

$pdf->Ln(1);

$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode(' '.$liste_fichiers_joints.'  '), '0', 'L', 0);

$pdf->Ln(6);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,4,utf8_decode('LIvreur(Nom, Date et VISA)                                                                                     Receptionneur(Nom, Date et VISA)'),0,1,'R'); 
$pdf->Ln(4);


$pdf->Cell(20);

//Affichage des totaux
		
$pdf->SetTextColor(0,0,0);
$width_cell=array(36,78,40,40);
$pdf->SetFont('Arial','B',10);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //

//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',7);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;

//$pdf->SetWidths(array(18,80,20,20,52));

$pdf->Ln(8);

  
$pdf->Ln(149);
$pdf->Line(10, 275, 200, 275);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>