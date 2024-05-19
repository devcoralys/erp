<?php
 session_start ();
 
 include('../../../../../connex.php');
	 
			include("phpToPDF.php");


require('mysql_table.php');

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
    $this->Image('../../../../img/logo_t_care.jpg', 10,282,17);	
    // Arial italic 8
    $this->SetFont('Arial','',7);
	//$this->Cell(0,10,'CMS/ABJ/BS/PH',0,0,'L');
	
	//$this->Cell(0,10,'CMS/ABJ/BS/PH',0,0,'L');
	
	$this->Cell(0,3.5,utf8_decode("SYNDICAT DES ENTREPRENEURS DE MANUTENTION DES PORTS ABIDJAN ET DE COTE D'IVOIRE - SEMPA"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('Au capital de XXXXX F CFA - Siège Social : Bd de Marseille, vers SODECI - Zone portuaire Treichville'),0,1,'C');
$this->Cell(0,3.5,utf8_decode("01 BP 4082 Abidjan 01 - Abidjan - COTE D'IVOIRE - Téléphone : (+225) 21 21 35 50  -  Fax : (+225) 21 25 69 88"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('RCCM :  -  N° CC : '),0,1,'C');
	
	$this->Image('../../../../img/logo_sempa.jpg', 178,282,22);	
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
}
}
            
			//Paramètres du fichier PDF 
			$pdffilename = 'Bon de sortie produit.pdf';
			clearstatcache();
			if (file_exists($pdffilename)) {
			//Si le fichier PDF existe, il faut le supprimer d'abord
			unlink($pdffilename);
			}
			 
			
			//Création du fichier PDF
			$pdf=new PDF('P','mm','A4');
			 
			$pdf->AliasNbPages();

			$pdf->AddPage();
			
			$pdf->SetTextColor(0);
			$pdf->SetFont('Arial','B',8);
			$cot_ivoir=utf8_decode("Côte d'Ivoire");
			 //$pdf->Image('../../../img/entete-logo.jpg',12,8,43);
			 $pdf->Image("../../../../img/logo_sempa_.jpg", -20, 5, 250, 'L');
			 //$pdf->Cell(0,2,"Syndicat des Entrepreneurs de Manutention des ports Abidjan et de ".$cot_ivoir." ",0,1,'C');
			 //$pdf->Line(10, 35, 200, 35); 
			 $pdf->Ln(28);
			 $pdf->SetFont('Arial','',7);
			$mot="N°";
			$num=utf8_decode($mot);
			$date=gmdate('d/m/Y');
			
			if( isset($_SESSION['id_bon_sortie']) && ($_SESSION['id_bon_sortie']!='') ){ $id_bon=$_SESSION['id_bon_sortie']; }else{ $id_bon=''; }
			$reta=$con->prepare("SELECT * FROM bon_sortie_stock WHERE id_bon_sortie_stock=:A"); 
            $reta->execute(array('A' =>$id_bon));
            $uta=$reta->fetch();
			
			
			$rek=$con->prepare("SELECT * FROM fournisseur WHERE id_fournisseur=:A"); 
            $rek->execute(array('A' =>$uta["fournisseur_med_id"]));
            $utak=$rek->fetch();
		     
			$pay=utf8_decode("Côte d'Ivoire");
			$pdf->SetFont('Arial','B',15);
			$pdf->Cell(0,3.3,'BON DE SORTIE '.$num.' : '.$uta["num_bon_sortie"].'',0,1,'C');
			
			$pdf->Ln(6);
			$date_oj=gmdate('d/m/Y');
			
			$pdf->SetFont('Arial','',10);
			//$pdf->Rect(10,31,55,21);
			//$pdf->Cell(0,3.7,'                                                                                                                                                     
			// Abidjan le '.$date_oj.' ',0,1,'L');
			$pdf->Cell(0,4,' DESTINATAIRE : 
			                                                                                                                         Abidjan le '.$date_oj,0,1,'L'); 
																																		  
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(0,5,stripslashes(strtoupper($utak["nom_fournisseur"])),0,1,'L');                      
			
			$pdf->Ln(4);
			$pdf->SetFont('Arial','B',7);
			//$pdf->Cell(0,3.7,'SOUCHE',0,1,'L');
			
			/*$pdf->SetFont('Arial','',10);
			$pdf->Cell(0,3.7,' MOTIF DE SORTIE : '.stripslashes(strtoupper($utak["lib_motif_sortie_medicament"])),0,1,'C');
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(0,2,"BON DE SORTIE ".$num." : ".$uta["num_bon_sortie"]."",0,1,'C');*/
			
			$pdf->Cell(20);
			$pdf->Ln(8);
			
    $rek=$con->prepare("SELECT SUM(montant_stock_produit_sortie) AS mont_tot FROM stock_produit_sortie WHERE bon_sortie_stock_id='".$_SESSION['id_bon_sortie']."'");
$rek->execute();
$rok=$rek->fetch(); 
$mont_pro=$rok['mont_tot'];
$mont_p=strrev(wordwrap(strrev($mont_pro), 3, ' ', true));

            $pdf->SetFont('Arial','B',9);
			$pdf->Cell(0,3.7,'MONTANT TOTAL PRODUITS : '.$mont_p.' FCFA',0,1,'L');
			
			$pdf->Cell(20);
			$pdf->Ln(3);
			
$width_cell=array(18,80,20,20,52);
$pdf->SetFont('Arial','B',7);

//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(193,229,252);

//EN-TETE /// 
//Colonne 1 //
$pdf->Cell($width_cell[0],7,utf8_decode('QUANTITE'),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('DESIGNATION'),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('PU'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('PRIX TOTAL'),1,0,'C',true);
$pdf->Cell($width_cell[4],7,utf8_decode('MOTIF'),1,1,'C',true);
//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',7);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;


//$pdf->SetWidths(array(18,80,20,20,52));

$recor=$con->query("SELECT * FROM stock_produit_sortie WHERE bon_sortie_stock_id='".$id_bon."'");
foreach($recor as $row) {

$rem_1=$con->prepare("SELECT * FROM produit WHERE id_produit='".$row['produit_id']."'");
$rem_1->execute();
$rom_1=$rem_1->fetch(); 

$rem=$con->prepare("SELECT * FROM motif_sortie_medicament WHERE id_motif_sortie_medicament=:A");
$rem->execute(array('A'=>$row['motif_sortie_med_id']));
$rom=$rem->fetch(); 

$date_expi = date("d/m/Y", strtotime($row['date_expiration'])); 

$prix_stock=strrev(wordwrap(strrev($row['prix_stock_produit_sortie']), 3, ' ', true));
$mont_stock=strrev(wordwrap(strrev($row['montant_stock_produit_sortie']), 3, ' ', true));
           
$pdf->Cell($width_cell[0],8,$row['qte_stock_produit_sortie'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],8,stripslashes($rom_1['lib_produit']),1,0,'C',$fill);
$pdf->Cell($width_cell[2],8,$prix_stock,1,0,'C',$fill);
$pdf->Cell($width_cell[3],8,$mont_stock,1,0,'C',$fill);
$pdf->Cell($width_cell[4],8,stripslashes(strtoupper($rom['lib_motif_sortie_medicament'])),1,1,'C',$fill);
$fill = !$fill;

}
$pdf->Ln(8);

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
			$pdf->Ln(149);
			$pdf->Line(10, 275, 200, 275);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";


?>