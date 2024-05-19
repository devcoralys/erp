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
			 $pdf->Ln(12);
			 //$pdf->Cell(0,2,utf8_decode("Services Transit Transport Côte d'Ivoire "),0,1,'C');
			 //$pdf->Line(10, 35, 200, 35); 
			 //$pdf->Ln(10);

			 $pdf->SetFont('Arial','',8);
			$mot="N°";
			$num=utf8_decode($mot);
			$date=gmdate('d/m/Y');
			
		 
			$ref_dos=$_SESSION['ref_dos'];

			$inf=$con->prepare('SELECT * FROM dossier LEFT JOIN client ON client.id_client=dossier.client_id LEFT JOIN service ON service.id_service=dossier.service_dossier_id WHERE id_dossier=:A');
			$inf->execute(array('A'=>$ref_dos));
			$info=$inf->fetch();
			
			$num_dossier=$info['num_dossier'];
			$nom_client=$info['nom_client'];
			$adresse_client=$info['adresse'];
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
			$net_a_payer=$_SESSION['net_a_payer']+(0.35*floatval($had));
			$dt_total=$info['dt_total'];
	 	    $cotation_valide=$info['cotation_valide'];
			
			$date_oj=gmdate('d/m/Y');
						
			$pdf->SetFont('Arial','',10);
			//$pdf->Cell(0,4,'Date : '.$date_oj,0,1,'R'); 	

			$pdf->Ln(6);

			$num_cot=$con->prepare('SELECT * FROM dossier WHERE id_dossier=:A ');
			$num_cot->execute(array('A'=>$ref_dos));
			$inum_dos=$num_cot->fetch();
			$id_dos=$inum_dos['id_dossier'];

			$cod_proforma=$id_dos;
			$_SESSION['cod_proforma']=$cod_proforma;
		     
$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','BU',12);

/*
if($cotation_valide==1)
{
    */
$pdf->Cell(0,3.3,utf8_decode('FACTURE PROFORMA N° 00'.$cod_proforma),0,1,'C');
/*
}
else
{
$pdf->Cell(0,3.3,utf8_decode('FACTURE PROFORMA N° 00'.$cod_proforma.' '),0,1,'C');  
$pdf->SetTextColor(219,41,32);
$pdf->SetFont('Arial','B',18);
$pdf->Ln(2);
$pdf->Cell(0,3.3,utf8_decode(' BROUILLON '),0,1,'C');  
$pdf->SetFont('Arial','BU',12);
$pdf->SetTextColor(0,0,0);
}
*/
$pdf->Ln(10);
$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3.3,utf8_decode('CLIENT : '.$nom_client.' - '.$adresse_client),0,1,'L');
$pdf->Ln(4);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('N° Connaissement : '.$num_connaissement.' - N° Vol/Voyage : '.$num_voyage.' - Pays de provenance : '.$pays_provenance), '0', 'L', 0);
$pdf->Ln(0);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('Nombre de colis : '.$total_colis.' - Masse Brute : '.$masse_brute.' - Nature : '.$nature), '0', 'L', 0);
$pdf->Ln(0);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0,6,utf8_decode($num_dossier.' - '.$lib_service.' - Date : '.$date_oj), '0', 'L', 0);
$pdf->Ln(1);


$pdf->Cell(20);

//Affichage des totaux

$pdf->Ln(5);
$width_cell=array(36,78,40,40);
$pdf->SetFont('Arial','',8);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(255,255,255);
//EN-TETE /// 
$pdf->Cell($width_cell[0],7,utf8_decode('FOB'),0,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('FRET'),0,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('ASS'),0,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('CAF'),0,1,'C',true);
//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',8);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;
$pdf->Cell($width_cell[0],7,number_format($_SESSION['total_fob_cfa'],0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[1],7,number_format($_SESSION['total_fret'],0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[2],7,number_format($_SESSION['total_ass'],0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[3],7,number_format($_SESSION['total_caf'],0,',',' ').' XOF',0,1,'C',true);
$fill = !$fill;

$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,3.3,utf8_decode('Débours douane'),0,1,'C');

$pdf->Ln(1);
$width_cell=array(36,78,40,40);
$pdf->SetFont('Arial','',8);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(255,255,255);
//EN-TETE /// 
$pdf->Cell($width_cell[0],7,utf8_decode('DD'),0,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('TS'),0,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('RPI'),0,0,'C',true);
$pdf->SetFont('Arial','B',8);
$pdf->Cell($width_cell[3],7,utf8_decode('TOTAL D&T'),0,1,'C',true);
$pdf->SetFont('Arial','',8);
//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',8);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;
$pdf->Cell($width_cell[0],7,number_format($_SESSION['total_dd'],0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[1],7,number_format(20000,0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[2],7,number_format($_SESSION['rpi'],0,',',' ').' XOF',0,0,'C',true);
$pdf->SetFont('Arial','B',8);
$pdf->Cell($width_cell[3],7,number_format($_SESSION['dt'],0,',',' ').' XOF',0,1,'C',true);
$pdf->SetFont('Arial','',8);
$fill = !$fill;


$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,3.3,utf8_decode('Frais transit'),0,1,'C');

$pdf->Ln(1);
$width_cell=array(40,36,40,40,38);
$pdf->SetFont('Arial','',8);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(255,255,255);
//EN-TETE /// 
$pdf->Cell($width_cell[0],7,utf8_decode('TIRAGE DECL.'),0,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('SYDAM'),0,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('FICHE ASSURANCE'),0,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('AGIO'),0,0,'C',true);
$pdf->SetFont('Arial','B',8);
$pdf->Cell($width_cell[4],7,utf8_decode('TOTAL FRAIS TRANSIT'),0,1,'C',true);
$pdf->SetFont('Arial','',8);
//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',8);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;
$pdf->Cell($width_cell[0],7,number_format($tirage_declaration,0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[1],7,number_format($sydam,0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[2],7,number_format($fiche_assurance,0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[3],7,number_format(0.006*floatval($dt_total),0,',',' ').' XOF',0,0,'C',true);
$pdf->SetFont('Arial','B',8);
$pdf->Cell($width_cell[4],7,number_format($tirage_declaration+$sydam+$fiche_assurance+0.006*floatval($dt_total),0,',',' ').' XOF',0,1,'C',true);
$pdf->SetFont('Arial','',8);
$fill = !$fill;

$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,3.3,utf8_decode('Débours divers'),0,1,'C');
$pdf->Ln(2);


$pdf->Ln(1);
$width_cell=array(166,28);
$pdf->SetFont('Arial','',8);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(235,236,236); 

$total_debours_divers=0;

if($ouverture_dossier!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Ouverture dossier'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($ouverture_dossier,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$ouverture_dossier;
}
if($acconage!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Acconage'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($acconage,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$acconage;
}
if($surestarie!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Surestarie'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($surestarie,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$surestarie;
}
if($echange_bl!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Echange BL'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($echange_bl,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$echange_bl;
}
if($caution!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Caution'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($caution,0,',',' ').' XOF',0,1,'R',true);
	//Element//
}
if($livraison!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Livraison'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($livraison,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$livraison;
}
if($ts_douane!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Passage Douane'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($ts_douane,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$ts_douane;
}
if($retrait_documentaire!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Retrait documentaire'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($retrait_documentaire,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$retrait_documentaire;
}
if($debours_divers!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Débours divers'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($debours_divers,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$debours_divers;
}
if($documentation_weeb!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Documentation Weeb'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($documentation_weeb,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$documentation_weeb;
}
if($bsc!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('BSC'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($bsc,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$bsc;
}
if($certificat_phyto!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Certificat Phyto'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($certificat_phyto,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$certificat_phyto;
}
if($api!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('API'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($api,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$api;
}
if($aiae!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('AI + AE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($aiae,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$aiae;
}
if($certificat_veterinaire!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Certificat vétérinaire'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($certificat_veterinaire,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$certificat_veterinaire;
}
if($appurement_magasin!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Appurement magasin'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($appurement_magasin,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$appurement_magasin;
}
if($magasinage!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Magasinage'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($magasinage,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$magasinage;
}
if($sortie_pc!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Sortie PC'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($sortie_pc,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$sortie_pc;
}
if($commission!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Commission'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($commission,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$commission;
}
if($escorte!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Escorte'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($escorte,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$escorte;
}
if($manutention!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('Manutention'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($manutention,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_debours_divers=$total_debours_divers+$manutention;
}

$pdf->SetFont('Arial','B',8);
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('TOTAL DEBOURS DIVERS'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,number_format($total_debours_divers,0,',',' ').' XOF',0,1,'R',true);
//Element//
$pdf->Ln(3);
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('HAD'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,''.number_format($had,0,',',' ').' XOF',0,1,'R',true);
//Element//
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('BC'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,''.number_format(0.35*floatval($had),0,',',' ').' XOF',0,1,'R',true);
//Element//
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('MONTANT HT'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,''.number_format($net_a_payer,0,',',' ').' XOF',0,1,'R',true);
//Element//

//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('TVA (18%)'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,''.number_format(0.18*$had,0,',',' ').' XOF',0,1,'R',true);
//Element//

//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('NET A PAYER'),1,0,'R',true);
$pdf->Cell($width_cell[1],7,''.number_format(0.18*$had+$net_a_payer,0,',',' ').' XOF',1,1,'R',true);
//Element//

		
$pdf->SetTextColor(0,0,0);
$width_cell=array(36,78,40,40);
$pdf->SetFont('Arial','B',10);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //

//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',8);
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