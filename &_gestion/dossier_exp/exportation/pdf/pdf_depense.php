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
			$pdffilename = 'FACTURE_PROFORMA.pdf';
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
			$adresse=$info['adresse'];
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
	 
			
			$date_oj=gmdate('d/m/Y');
						
			$pdf->SetFont('Arial','',10);
			//$pdf->Cell(0,4,'Date : '.$date_oj,0,1,'R'); 	

			$pdf->Ln(6);
			
			$cre=$con->prepare('SELECT * FROM dossier LEFT JOIN utilisateur ON utilisateur.secur=dossier.secur_ajout_dossier WHERE id_dossier=:A');
			$cre->execute(array('A'=>$ref_dos));
			$info_cre=$cre->fetch();
			$agent_en_charge=$info_cre['nom_utilisateur'];
			

$pdf->SetFont('Arial','B',7);
$pdf->Cell(0,3.3,utf8_decode(' '.$agent_en_charge.' '),0,1,'L');
$pdf->SetFont('Arial','B',10);
			$pdf->Ln(3);

		     
$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,3.3,utf8_decode('CHARGES'),0,1,'C');

$pdf->Ln(10);
$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3.3,utf8_decode('CLIENT : '.$nom_client.' - '.$adresse),0,1,'L');
$pdf->Ln(4);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0,6,utf8_decode($num_dossier.' - '.$lib_service.' - Date : '.$date_oj), '0', 'C', 0);
$pdf->Ln(1);


$pdf->Cell(20);

//Affichage des totaux

$pdf->Ln(5);


$pdf->Ln(1);
$width_cell=array(166,28);
$pdf->SetFont('Arial','',8);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(255,255,255); 

$total_charge=0;

$pdf->SetFont('Arial','B',8);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(255,255,255);
//EN-TETE /// 
$pdf->Cell($width_cell[0],7,utf8_decode('DESIGNATION'),0,0,'L',true);
$pdf->Cell($width_cell[1],7,utf8_decode('MONTANT'),0,1,'R',true);
//// FIN EN-TETE ///////

$pdf->SetFillColor(255,255,255); 
if($r_dt!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Droits & Taxes'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_dt,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_dt;
}

if($r_sydam!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Sydam & Tirage'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_sydam,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_sydam;
}

if($r_agio!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Agio'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_agio,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_agio;
}

if($r_ts_douane!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Passage Douane'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_ts_douane,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_ts_douane;
}

if($r_bsc!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('BSC'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_bsc,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_bsc;
}

if($r_api!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('API'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_api,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_api;
}

if($r_assurance!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('ASSURANCE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_assurance,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_assurance;
}

if($r_certificat_phyto!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('CERTIFICAT PHYTO'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_certificat_phyto,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_certificat_phyto;
}

if($r_magasinage!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('MAGASINAGE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_magasinage,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_magasinage;
}

if($r_manutention!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('MANUTENTION'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_manutention,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_manutention;
}

if($r_echange_bl!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('ECHANGE BL'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_echange_bl,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_echange_bl;
}

if($r_acconage!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('ACCONAGE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_acconage,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_acconage;
}

if($r_surestarie!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('SURESTARIE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_surestarie,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_surestarie;
}

if($r_caution!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('CAUTION'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_caution,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_caution;
}

if($r_livraison!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('LIVRAISON'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_livraison,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_livraison;
}

if($r_transport_agent!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('TRANSPORT AGENT'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_transport_agent,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_transport_agent;
}

if($r_commission!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('COMMISSION'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_commission,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_commission;
}

if($r_retrait_documentaire!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('RETRAIT DOCUMENTAIRE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_retrait_documentaire,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_retrait_documentaire;
}

if($r_manifeste!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('AGENT NAS / MANIFESTE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($r_manifeste,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_charge=$total_charge+$r_manifeste;
}


$pdf->SetFont('Arial','B',8);
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('Charge Totale'),1,0,'R',true);
$pdf->Cell($width_cell[1],7,number_format($total_charge,0,',',' ').' XOF',1,1,'R',true);
//Element//
$pdf->Ln(3);

		
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
$pdf->SetFillColor(255,255,255); 
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