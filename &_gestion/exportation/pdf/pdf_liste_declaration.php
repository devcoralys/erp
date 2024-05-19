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

            
			//Paramètres du fichier PDF 
			$pdffilename = 'liste_declaration.pdf';
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
			$pdf->Image("../../../img/entete_declaration.jpg", 10, 10,  270, 'C');
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


    if(isset($_SESSION['recher_num_declaration']) && $_SESSION['recher_num_declaration']!='')
	{
	$recher_num_declaration=$_SESSION['recher_num_declaration'];
	}
	else
	{
	$recher_num_declaration='';
	}

    if(isset($_SESSION['recher_reference']) && $_SESSION['recher_reference']!='')
	{
	$recher_reference=$_SESSION['recher_reference'];
	}
	else
	{
	$recher_reference='';
	}


   
			
	$req=" SELECT * FROM declaration WHERE id_declaration!='' ";


	if($recher_date_debut!=''){
	    $req.=" AND date_declaration>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $req.=" AND date_declaration<='".$recher_date_fin."'  ";
	}

    if($recher_num_declaration!=''){
	    $req.=" AND num_declaration LIKE '%".$recher_num_declaration."%' ";
	}
    
    if($recher_reference!=''){
	    $req.=" AND reference_declaration LIKE '%".$recher_reference."%' ";
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
	$pdf->Cell(0,3.3,utf8_decode('LISTE DES DECLARATIONS'),0,1,'C');
	$pdf->Ln(4);
*/
	
	$pdf->SetFont('Arial','',15);
	$pdf->Cell(0,3.3,utf8_decode(' DU '.date("d/m/Y", strtotime($recher_date_debut)).' au '.date("d/m/Y", strtotime($recher_date_fin))),0,1,'C');
	$pdf->Ln(4);
	$pdf->SetFont('Arial','I',13);

				
	$pdf->Cell(20);
	$pdf->Ln(3);
				
	$width_cell=array(20,38,47,28,20,20,20,20,20,20,29);
	$pdf->SetFont('Arial','B',8);

	//Couleur d'arrère plan de l'en-tête//
	$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //
$pdf->Cell($width_cell[0],7,utf8_decode('Date'),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('Référence'),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('Client'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('D&T'),1,0,'C',true);
$pdf->Cell($width_cell[4],7,utf8_decode('Agio'),1,0,'C',true);
$pdf->Cell($width_cell[5],7,utf8_decode('Tirage'),1,0,'C',true);
$pdf->Cell($width_cell[6],7,utf8_decode('Ouverture'),1,0,'C',true);
$pdf->Cell($width_cell[7],7,utf8_decode('FDI + RFCV'),1,0,'C',true);
$pdf->Cell($width_cell[8],7,utf8_decode('Assurance'),1,0,'C',true);
$pdf->Cell($width_cell[9],7,utf8_decode('Divers/BSC'),1,0,'C',true);
$pdf->Cell($width_cell[10],7,utf8_decode('TOTAL (FCFA)'),1,1,'C',true);
//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',6);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;

//$pdf->SetWidths(array(18,80,20,20,52));
$i=0;

 $montant_total=0;
 $tot_dec=0;
 $tot_dt=0;
 $tot_agio=0;
 $tot_tirage=0;
 $tot_ouverture=0;
 $tot_fdi=0;
 $tot_assurance=0;
 $tot_bsc=0;

foreach($reta as $row) {
$i++;

 $montant_total=floatval($row['dt_declaration'])+floatval($row['agio_declaration'])+floatval($row['tirage_declaration'])+floatval($row['ouverture_declaration'])+floatval($row['fdi_declaration'])+floatval($row['assurance_declaration'])+floatval($row['bsc_declaration']);
 
 $tot_dec=$tot_dec+$montant_total;
 $tot_dt=$tot_dt+floatval($row['dt_declaration']);
 $tot_agio=$tot_agio+floatval($row['agio_declaration']);
 $tot_tirage=$tot_tirage+floatval($row['tirage_declaration']);
 $tot_ouverture=$tot_ouverture+floatval($row['ouverture_declaration']);
 $tot_fdi=$tot_fdi+floatval($row['fdi_declaration']);
 $tot_assurance=$tot_assurance+floatval($row['assurance_declaration']);
 $tot_bsc=$tot_bsc+floatval($row['bsc_declaration']);

$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('Arial','',10);
$pdf->Cell($width_cell[0],7,utf8_decode(date("d/m/Y", strtotime($row['date_declaration']))),1,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode($row['reference_declaration']),1,0,'C',false);
$pdf->SetFont('Arial','B',12);
$pdf->Cell($width_cell[2],7,utf8_decode($row['client_declaration']),1,0,'C',false);
$pdf->SetFont('Arial','',10);
$pdf->Cell($width_cell[3],7,utf8_decode(number_format($row['dt_declaration'],0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode(number_format($row['agio_declaration'],0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[5],7,utf8_decode(number_format($row['tirage_declaration'],0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[6],7,utf8_decode(number_format($row['ouverture_declaration'],0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[7],7,utf8_decode(number_format($row['fdi_declaration'],0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[8],7,utf8_decode(number_format($row['assurance_declaration'],0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[9],7,utf8_decode(number_format($row['bsc_declaration'],0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[10],7,utf8_decode(number_format($montant_total,0,',',' ').' '),1,1,'C',false);
$fill = !$fill;
}


//Affiche Total
$pdf->SetFillColor(255,255,255); 
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);
$pdf->SetFont('Arial','B',12);
$pdf->Cell($width_cell[2],7,utf8_decode('TOTAL'),1,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode(number_format($tot_dt,0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode(number_format($tot_agio,0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[5],7,utf8_decode(number_format($tot_tirage,0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[6],7,utf8_decode(number_format($tot_ouverture,0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[7],7,utf8_decode(number_format($tot_fdi,0,',',' ')),1,0,'C',true);
$pdf->Cell($width_cell[8],7,utf8_decode(number_format($tot_assurance,0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[9],7,utf8_decode(number_format($tot_bsc,0,',',' ')),1,0,'C',false);
$pdf->Cell($width_cell[10],7,utf8_decode(number_format($tot_dec,0,',',' ').''),1,1,'C',false);
$pdf->SetFont('Arial','',7);
$fill = !$fill;


$pdf->Ln(5);
			


$pdf->Line(10, 279, 200, 279);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>