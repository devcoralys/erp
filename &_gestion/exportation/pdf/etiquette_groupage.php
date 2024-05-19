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
/*
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
*/
}

if(isset($_GET['id_groupage']) && $_GET['id_groupage']!=''){ $_SESSION['id_groupage']=$_GET['id_groupage']; }
            
			//Paramètres du fichier PDF 
			$pdffilename = 'fiche_groupage.pdf';
			clearstatcache();
			if (file_exists($pdffilename)) {
			//Si le fichier PDF existe, il faut le supprimer d'abord
			unlink($pdffilename);
			}
			 
			//Création du fichier PDF
			$pdf=new PDF('P','mm','A4');
			 
			$pdf->AliasNbPages();

			//$pdf->AddPage();
			$pdf->AddPage('L');
			
		
			$pdf->SetTextColor(0);
			$pdf->SetFont('Arial','',10);
			$entreprise=utf8_decode("STT-CI");
			$pdf->Image("../../../img/entete_fiche.jpg", 5, 10,  290, 'C');
			$pdf->Ln(25);
			//$pdf->Cell(0,2,utf8_decode("Application de Gestion des Formations "),0,1,'C');
			//$pdf->Line(10, 35, 200, 35); 
			$pdf->Ln(5);

			$pdf->SetFont('Arial','',7);
			$mot="N°";
			$num=utf8_decode($mot);
			$date=gmdate('d/m/Y');
			
	$req=" SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage='".$_SESSION['id_groupage']."' ";
			 
	$reta=$con->prepare($req); 
    $reta->execute();
	$nbre_serv=$reta->rowcount();


	$req0=$con->prepare(" SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time LEFT JOIN utilisateur ON utilisateur.secur=groupage.secur_ajout_groupage LEFT JOIN personnel ON personnel.id_personnel=utilisateur.personnel_id WHERE id_groupage='".$_SESSION['id_groupage']."' ");
	$req0->execute();
	$info_fiche0=$req0->fetch();	
		
		
			$pdf->Ln(15)	;
		
	$pdf->SetFont('Arial','',22);
	$pdf->Cell(0,3.3,utf8_decode('Ref: '.$info_fiche0['num_groupage'].' | '.$info_fiche0['nom_utilisateur'].' | '.$info_fiche0['tel_personnel']),0,1,'L');
	$pdf->Ln(5);

	$req1=$con->prepare(" SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage='".$_SESSION['id_groupage']."' ");
	$req1->execute();
	$info_fiche=$req1->fetch();	


	$nbre_colis=0;
	$nco1=$con->prepare(" SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage='".$_SESSION['id_groupage']."' ");
	$nco1->execute();
	while($info_nco=$nco1->fetch())
	{
		$nbre_colis=$nbre_colis+$info_nco['nbre_colis'];
	}	

	$date_oj=gmdate('d/m/Y');
				
	$pdf->SetFont('Arial','B',10);

	$pay=utf8_decode("Côte d'Ivoire");

	$pdf->SetFont('Arial','I',13);

	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('Arial','B',7);
				
	$pdf->Cell(20);
				
	$width_cell=array(12,17,17,72,18,29,29);
	$pdf->SetFont('Arial','B',8);

	//Couleur d'arrère plan de l'en-tête//
	$pdf->SetFillColor(193,229,252);



$pdf->Line(10, 279, 200, 279);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>