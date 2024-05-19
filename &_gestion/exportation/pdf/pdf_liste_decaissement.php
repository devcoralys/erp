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

	$this->Cell(0,3.5,mb_convert_encoding("SERVICE TRANSIT TRANSPORT CÔTE D'IVOIRE", 'ISO-8859-1', 'UTF-8'));
	$this->Cell(0,3.5,utf8_decode('Au capital de 5 000 000 F CFA - Siège Social : Aéroport Félix Houphouët Boigny Zone FRET, Abidjan Port-Bouët '),0,1,'C');
	$this->Cell(0,3.5,utf8_decode("07 BP 774 Abidjan 07 - Téléphone : (+225) 27-21 58 09 78 / 07 08 26 08 65 -  Email : info@stt.ci - Site Web : https://www.stt-ci.net"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('N° CC: 1703911V - RCCM : CI-ABJ-2017-B-2420 -  N° CB : CI034 01022 18140790004 61 BACI '),0,1,'C');
	
	//$this->Image('../../../img/logo_fdfp.jpg', 172,275,30);	
	
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
} 
}

            
			//Paramètres du fichier PDF 
			$pdffilename = 'liste_decaissement.pdf';
			clearstatcache();
			if (file_exists($pdffilename)) {
			//Si le fichier PDF existe, il faut le supprimer d'abord
			unlink($pdffilename);
			}
			 
			//Création du fichier PDF
			$pdf=new PDF('P','mm','A4');
			 
			$pdf->AliasNbPages();

			$pdf->AddPage('L');
			//$pdf->AddPage();
			
		
			$pdf->SetTextColor(0);
			$pdf->SetFont('Arial','',10);
			$entreprise=utf8_decode("STT-CI");
			$pdf->Image("../../../img/entete_decaissement.jpg", 10, 10,  270, 'C');
			$pdf->Ln(25);
			//$pdf->Cell(0,2,utf8_decode("Application de Gestion des Formations "),0,1,'C');
			//$pdf->Line(10, 35, 200, 35); 
			$pdf->Ln(5);

			$pdf->SetFont('Arial','',7);
			$mot="N°";
			$num=utf8_decode($mot);
			$date=gmdate('d/m/Y');

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


    if(isset($_SESSION['recher_num_recu']) && $_SESSION['recher_num_recu']!='')
	{
	$recher_num_recu=$_SESSION['recher_num_recu'];
	}
	else
	{
	$recher_num_recu='';
	}

    if(isset($_SESSION['recher_num_dossier']) && $_SESSION['recher_num_dossier']!='')
	{
	$recher_num_dossier=$_SESSION['recher_num_dossier'];
	}
	else
	{
	$recher_num_dossier='';
	}


   
			
	$req=" SELECT * FROM decaissement WHERE id_decaissement!='' ";


	if($recher_date_debut!=''){
	    $req.=" AND date_decaissement>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $req.=" AND date_decaissement<='".$recher_date_fin."'  ";
	}

    if($recher_num_recu!=''){
	    $req.=" AND num_decaissement LIKE '%".$recher_num_recu."%' ";
	}
    
    if($recher_num_dossier!=''){
	    $req.=" AND num_dossier_decaissement LIKE '%".$recher_num_dossier."%' ";
	}

 
	$reta=$con->prepare($req); 
    $reta->execute();
	//$nbre_serv=$reta->rowcount();




	$date_oj=gmdate('d/m/Y');
				
	$pdf->Ln(8);

	$pdf->SetFont('Arial','B',10);

/*
	$pay=utf8_decode("Côte d'Ivoire");
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,3.3,utf8_decode('LISTE DES decaissementS'),0,1,'C');
	$pdf->Ln(4);
*/
	
	$pdf->SetFont('Arial','',15);
	$pdf->Cell(0,3.3,utf8_decode(' DU '.date("d/m/Y", strtotime($recher_date_debut)).' au '.date("d/m/Y", strtotime($recher_date_fin))),0,1,'C');
	$pdf->Ln(4);
	$pdf->SetFont('Arial','I',13);

				
	$pdf->Cell(20);
	$pdf->Ln(3);
				
	$width_cell=array(42,60,103,40,29);
	$pdf->SetFont('Arial','B',9);

	//Couleur d'arrère plan de l'en-tête//
	$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //
$pdf->Cell($width_cell[0],7,utf8_decode('Date'),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('N° Réçu'),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('N° Dossier'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('Client'),1,0,'C',true);
$pdf->Cell($width_cell[4],7,utf8_decode('Montant'),1,1,'C',true);
//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',7);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;

//$pdf->SetWidths(array(18,80,20,20,52));
$i=0;

 $montant_total=0;

foreach($reta as $row) {
$i++;

$montant_total=$montant_total+floatval($row['montant_decaissement']);

 
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','',10);

$pdf->Cell($width_cell[0],7,utf8_decode($row['date_decaissement']),1,0,'C',false);
$pdf->SetFont('Arial','B',12);
$pdf->Cell($width_cell[1],7,utf8_decode($row['num_recu_decaissement']),1,0,'C',false);
$pdf->SetFont('Arial','',10);
$pdf->Cell($width_cell[2],7,utf8_decode($row['num_dossier_decaissement']),1,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode($row['nom_client_decaissement']),1,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode(number_format($row['montant_decaissement'],0,',',' ').' '),1,1,'C',false);
$fill = !$fill;
}


//Affiche Total
$pdf->SetFillColor(255,255,255); 
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->SetFont('Arial','B',12);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode('TOTAL'),1,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode(number_format($montant_total,0,',',' ').''),1,1,'C',false);
$pdf->SetFont('Arial','',7);
$fill = !$fill;


$pdf->Ln(5);
			


$pdf->Line(10, 279, 200, 279);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>