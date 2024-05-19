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
	
   // $this->Image('../../../img/logo_veritas.jpg', 10,275,30);	
    // Arial italic 8
    $this->SetFont('Arial','',7);

	$this->Cell(0,3.5,utf8_decode("SERVICE TRANSIT TRANSPORT CÔTE D'IVOIRE"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('Au capital de 5 000 000 F CFA - Siège Social : Aéroport Félix Houphouët Boigny Zone FRET, Abidjan Port-Bouët '),0,1,'C');
	$this->Cell(0,3.5,utf8_decode("07 BP 774 Abidjan 07 - Téléphone : (+225) 27-21 58 09 78 / 07 08 26 08 65 -  Email : info@stt.ci - Site Web : https://www.stt-ci.net"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('N° CC: 1703911V - RCCM : CI-ABJ-2017-B-2420 -  N° CB : CI034 01022 18140790004 61 BACI '),0,1,'C');
	
	//$this->Image('../../../img/logo_fdfp.jpg', 172,275,30);	
	
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
} 
}

if(isset($_GET['id_demande_decaissement']) && $_GET['id_demande_decaissement']!=''){ $_SESSION['id_demande_decaissement']=$_GET['id_demande_decaissement']; }
            
			//Paramètres du fichier PDF 
			$pdffilename = 'fiche_demande_decaissement.pdf';
			clearstatcache();
			if (file_exists($pdffilename)) {
			//Si le fichier PDF existe, il faut le supprimer d'abord
			unlink($pdffilename);
			}
			 
			//Création du fichier PDF
			$pdf=new PDF('L','mm','A5');
			 
			$pdf->AliasNbPages();

			//$pdf->AddPage('L');
			$pdf->AddPage();
			
		
			$pdf->SetTextColor(0);
			$pdf->SetFont('Arial','',10);
			$entreprise=utf8_decode("STT-CI");
			$pdf->Image("../../../img/entete_fiche_caisse_1.jpg", 5, 10,  200, 'C');
			$pdf->Ln(25);
			//$pdf->Cell(0,2,utf8_decode("Application de Gestion des Formations "),0,1,'C');
			//$pdf->Line(10, 35, 200, 35); 
			$pdf->Ln(5);

		
			
	$req1=$con->prepare(" SELECT * FROM demande_decaissement WHERE id_demande_decaissement='".$_SESSION['id_demande_decaissement']."'  ");
	$req1->execute();
	$info_fiche=$req1->fetch();	
	
	$pdf->SetFont('Arial','',7);
	$date=gmdate('d/m/Y');

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,3.3,utf8_decode('N° '.$info_fiche['num_demande_decaissement']),0,1,'L');
	$pdf->Ln(2);
	
	$date_oj=gmdate('d/m/Y');
	


	$pdf->SetFont('Arial','B',10);

/*
	$pay=utf8_decode("Côte d'Ivoire");
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,3.3,utf8_decode('ENTREE EN CAISSE'),0,1,'C');
	$pdf->Ln(4);
	$pdf->SetFont('Arial','I',13);
	*/

	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('Arial','B',7);
				
	$pdf->Cell(20);
	$pdf->Ln(8);


	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,3.3,utf8_decode('N° Demande : '.$info_fiche['num_demande_decaissement']),0,1,'L');
	$pdf->Ln(2);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,3.7,utf8_decode('DATE : '.date("d/m/Y", strtotime($info_fiche['date_demande_decaissement'])).' '),0,1,'L');
	$pdf->Ln(2);
	$pdf->Cell(0,3.7,utf8_decode('Montant : '.number_format($info_fiche['montant_demande_decaissement'],0,',',' ').' FCFA        Mode de règlement : '.$info_fiche['mode_reglement_demande_decaissement'].' '),0,1,'L');
	$pdf->Ln(2);  
	$pdf->Cell(0,3.7,utf8_decode('Motif : '.$info_fiche['motif_demande_decaissement'].' '),0,1,'L');
	$pdf->Ln(2);  

	$pdf->SetTextColor(0, 0, 0);


	$pdf->Cell(20);
	$pdf->Ln(3);
				
	$width_cell=array(12,17,17,72,18,29,29);
	$pdf->SetFont('Arial','B',8);

	//Couleur d'arrère plan de l'en-tête//
	$pdf->SetFillColor(193,229,252);


$pdf->Ln(5);
			
$pdf->SetFont('Arial','BI',10);
$pdf->Cell(0,4,utf8_decode('La Comptabilité (date et visa)                                                                                                  Le Demandeur (date et visa)'),0,1,'R'); 
$pdf->Ln(40);



	
	
$pdf->Line(10, 279, 200, 279);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>