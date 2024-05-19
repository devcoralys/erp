<?php
session_start ();
 
    include('../../../../../connex.php');
	 
	include("../../../../../pdf/phpToPDF.php");

	require('../../../../../pdf/mysql_table.php');

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
    //$this->Image('../../../../../img/logo.jpg', 10,282,17);	
    // Arial italic 8
    $this->SetFont('Arial','',9);
	//$this->Cell(0,10,'CMS/ABJ/BS/PH',0,0,'L');
	
	//$this->Cell(0,10,'CMS/ABJ/BS/PH',0,0,'L');
	$this->Cell(0,3.5,utf8_decode('Sevice Transit Transport de Côte d\'Ivoire (STT-CI) -SARL au capital de 5.000.000 FCFA - Siège Social : Abidjan Port-Bouet  cité Douane'),0,1,'C');
	$this->Cell(0,3.5,utf8_decode("07 BP 774 Abidjan 07 - Tel: 27 21 58 09 78 / 07 57 29 04 29 - Email : servicestransittransport@gmail.com"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('RCCM : CI-ABJ-2017-B-2420 -  N° Compte Bancaire : CI 034 01022 18140790004 61 BACI '),0,1,'C');
	
	//$this->Image('../../../../../img/logo.jpg', 178,282,22);	
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
}
}
            

			//Paramètres du fichier PDF 
			$pdffilename = 'liste_fournisseur_sttci.pdf';
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
			 $pdf->Image("../../../../../img/logo.jpg", 8, 5,  50, 'L');
			 $pdf->Ln(15);
			 //$pdf->Cell(0,2,utf8_decode("Services Transit Transport Côte d'Ivoire "),0,1,'C');
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

 $req="SELECT * FROM fournisseur WHERE id_fournisseur!=''";
	 
	 if($recher_pers!=""){
	 $req.=" and id_fournisseur =".$recher_pers." ";
	 }
	 
			
	$req.=" ORDER BY code_fournisseur DESC ";
	 
	$reta=$con->prepare($req); 
    $reta->execute();
	$uta=$reta->fetch();
	$nbre_pers=$reta->rowcount();
			
		     
$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','BU',15);
$pdf->Cell(0,3.3,'LISTE DES fournisseurS',0,1,'C');
			
$pdf->Ln(6);
$date_oj=gmdate('d/m/Y');
			
$pdf->SetFont('Arial','',10);
//$pdf->Rect(10,31,55,21);
//$pdf->Cell(0,3.7,'                                                                                                                                                     
// Abidjan le '.$date_oj.' ',0,1,'L');
$pdf->Cell(0,4,'
			                                                                                                                         Abidjan le '.$date_oj,0,1,'L'); 																																		  
			
$pdf->Ln(4);
$pdf->SetFont('Arial','B',7);
//$pdf->Cell(0,3.7,'SOUCHE',0,1,'L');

			
$pdf->Cell(20);
$pdf->Ln(8);


$pdf->SetFont('Arial','B',9);
$pdf->Cell(0,3.7,utf8_decode('Nombre de fournisseurs trouvés : '.$nbre_pers.' '),0,1,'L');
			
$pdf->Cell(20);
$pdf->Ln(3);
			
$width_cell=array(36,40,40,40,38);
$pdf->SetFont('Arial','B',10);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(193,229,252);
//EN-TETE /// 
$pdf->Cell($width_cell[0],7,utf8_decode('CODE'),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('NOM DU fournisseur'),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('EMAIL'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('TELEPHONE'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('ADRESSE'),1,1,'C',true);
//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',7);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;

//$pdf->SetWidths(array(18,80,20,20,52));

foreach($reta as $row) {

//Req
//Req

$pdf->Cell($width_cell[0],7,utf8_decode($row['code_fournisseur']),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode($row['nom_fournisseur']),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode($row['email_fournisseur']),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode($row['tel_fournisseur']),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode($row['adresse']),1,1,'C',true);
$fill = !$fill;

}
$pdf->Ln(8);

  
$pdf->Ln(149);
$pdf->Line(10, 275, 200, 275);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>