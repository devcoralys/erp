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

	$this->Cell(0,3.5,utf8_decode("SERVICES TRANSIT TRANSPORT CÔTE D'IVOIRE"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('Au capital de 5 000 000 F CFA - Siège Social : Aéroport Félix Houphouët Boigny Zone FRET, Abidjan Port-Bouët '),0,1,'C');
	$this->Cell(0,3.5,utf8_decode("07 BP 774 Abidjan 07 - Téléphone : (+225) 27-21 58 09 78 / 07 08 26 08 65 -  Email : info@stt.ci - Site Web : https://www.stt-ci.net"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('N° CC: 1703911V - RCCM : CI-ABJ-2017-B-2420 -  N° CB : CI034 01022 18140790004 61 BACI '),0,1,'C');
	
	//$this->Image('../../../img/logo_fdfp.jpg', 172,275,30);	
	
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
} 
}

if(isset($_GET['id_autre_envoi_france']) && $_GET['id_autre_envoi_france']!=''){ $_SESSION['id_autre_envoi_france']=$_GET['id_autre_envoi_france']; }
            
			//Paramètres du fichier PDF 
			$pdffilename = 'fiche_autre_envoi_france.pdf';
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
			
		
			$pdf->SetTextColor(0);
			$pdf->SetFont('Arial','',10);
			$entreprise=utf8_decode("STT-CI");
			$pdf->Image("../../../img/entete_fiche.jpg", 5, 10,  200, 'C');
			$pdf->Ln(25);
			//$pdf->Cell(0,2,utf8_decode("Application de Gestion des Formations "),0,1,'C');
			//$pdf->Line(10, 35, 200, 35); 
			$pdf->Ln(5);

			$pdf->SetFont('Arial','',7);
			$mot="N°";
			$num=utf8_decode($mot);
			$date=gmdate('d/m/Y');
			
	$req=" SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time WHERE id_autre_envoi_france='".$_SESSION['id_autre_envoi_france']."'  ";
			 
	$reta=$con->prepare($req); 
    $reta->execute();
	$nbre_serv=$reta->rowcount();


	$req0=$con->prepare(" SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time LEFT JOIN utilisateur ON utilisateur.secur=autre_envoi_france.secur_ajout_autre_envoi_france LEFT JOIN personnel ON personnel.id_personnel=utilisateur.personnel_id WHERE id_autre_envoi_france='".$_SESSION['id_autre_envoi_france']."'  ");
	$req0->execute();
	$info_fiche0=$req0->fetch();
	/*
    $pdf->SetTextColor(255,0,0);
    $pdf->SetFont('Arial','',8);
    $pdf->Ln(2);
    $pdf->Cell(0,4,utf8_decode(strtoupper(' Vous ne disposez que de trois jours pour la recuperation de votre colis_autre_envoi_france a compter de la date de notification.')),0,1,'C'); 
     $pdf->Cell(0,4,utf8_decode(strtoupper('Passe ce delai, nous declinons toute responsabilite vis a vis du colis ')),0,1,'C'); 
    $pdf->SetTextColor(0, 0, 0);
		*/
		    $pdf->Ln(5);	
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(0,3.3,utf8_decode('Ref: '.$info_fiche0['num_autre_envoi_france'].' | '.$info_fiche0['nom_utilisateur'].' | '.$info_fiche0['tel_personnel']),0,1,'L');
	$pdf->Ln(2);
		$pdf->SetFont('Arial','B',8);
		 $pdf->SetTextColor(37,31,117);
	$pdf->Cell(0,3.3,utf8_decode('Notre agence : '.$info_fiche0['agence_utilisateur'].' '),0,1,'L');
	$pdf->SetTextColor(0, 0, 0);
		$pdf->SetFont('Arial','',10);
	$pdf->Ln(5);

	$req1=$con->prepare(" SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time WHERE id_autre_envoi_france='".$_SESSION['id_autre_envoi_france']."'  ");
	$req1->execute();
	$info_fiche=$req1->fetch();	


	$nbre_colis_autre_envoi_france=0;
	$nco1=$con->prepare(" SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time WHERE id_autre_envoi_france='".$_SESSION['id_autre_envoi_france']."'  ");
	$nco1->execute();
	while($info_nco=$nco1->fetch())
	{
		$nbre_colis_autre_envoi_france=$nbre_colis_autre_envoi_france+$info_nco['nbre_colis_autre_envoi_france'];
	}	

	$date_oj=gmdate('d/m/Y');
				
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(158,4,'CODE ENVOI :',0,0,'R'); 
	$pdf->SetFont('Arial','B',14);	
	$pdf->Cell(0,4,$info_fiche['mode_envoi'].' / '.$info_fiche['num_autre_envoi_france'],0,0,'R'); 	
	$pdf->Ln(2);

	$pdf->SetFont('Arial','B',10);

	$pay=utf8_decode("Côte d'Ivoire");
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,3.3,utf8_decode('ENVOI'),0,1,'C');
	$pdf->Ln(4);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(190,3.3,utf8_decode('Nombre de colis : '),0,0,'C');
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(-153,3.3,utf8_decode($nbre_colis_autre_envoi_france),0,0,'C');
	$pdf->Ln(4);
	$pdf->SetFont('Arial','I',13);

	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('Arial','B',7);
				
	$pdf->Cell(20);
	$pdf->Ln(8);

	$pdf->SetFont('Arial','',9);
	$pdf->Cell(0,3.7,utf8_decode('DATE : '.date("d/m/Y", strtotime($info_fiche['date_autre_envoi_france'])).' '.date("H:i:s", strtotime($info_fiche['date_creat_autre_envoi_france'])).' '),0,1,'L');
	$pdf->Ln(2);
	$pdf->Cell(0,3.7,utf8_decode('EXPEDITEUR : '.$info_fiche['expediteur_autre_envoi_france'].'                                                                                             DESTINATION : '.$info_fiche['destination_autre_envoi_france'].' '),0,1,'L');
	$pdf->Ln(2);
	$pdf->Cell(0,3.7,utf8_decode('N° CNI EXPEDITEUR : '.$info_fiche['num_cni_expediteur_autre_envoi_france'].'                                                                                                 DESTINATAIRE : '.$info_fiche['destinataire_autre_envoi_france'].' '),0,1,'L');
	$pdf->Ln(2);
	$pdf->Cell(0,3.7,utf8_decode('TEL : '.$info_fiche['tel_expediteur_autre_envoi_france'].'                                                                                                                       TEL : '.$info_fiche['tel_destinataire_autre_envoi_france'].' '),0,1,'L');
	$pdf->Ln(2);     

	$pdf->SetTextColor(0, 0, 0);

	$pdf->Ln(8);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(0,3.7,utf8_decode('Nombre d\'éléments : '.$nbre_serv.' '),0,1,'L');
				
	$pdf->Cell(20);
	$pdf->Ln(3);
				
	$width_cell=array(12,17,17,72,18,29,29);
	$pdf->SetFont('Arial','B',8);

	//Couleur d'arrère plan de l'en-tête//
	$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //
$pdf->Cell($width_cell[0],7,utf8_decode('N°'),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('Nbre colis'),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('Nbre Art.'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('Nature colis'),1,0,'C',true);
$pdf->Cell($width_cell[4],7,utf8_decode('Poids'),1,0,'C',true);
$pdf->Cell($width_cell[5],7,utf8_decode('Prix / Kg'),1,0,'C',true);
$pdf->Cell($width_cell[6],7,utf8_decode('Prix Total'),1,1,'C',true);
//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',7);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;

//$pdf->SetWidths(array(18,80,20,20,52));
$i=0;
foreach($reta as $row) {
$i++;

$pdf->Cell($width_cell[0],7,utf8_decode($i),1,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode($row['nbre_colis_autre_envoi_france']),1,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode($row['nbre_article']),1,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode($row['nature_colis_autre_envoi_france']),1,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode($row['poids_colis_autre_envoi_france']),1,0,'C',false);
$pdf->Cell($width_cell[5],7,utf8_decode(number_format($row['pu_colis_autre_envoi_france'],0,',',' ').' FCFA'),1,0,'C',false);
$pdf->Cell($width_cell[6],7,utf8_decode(number_format($row['poids_colis_autre_envoi_france']*$row['pu_colis_autre_envoi_france'],0,',',' ').' FCFA'),1,1,'C',false);
$fill = !$fill;
}

//Calcul Total
$tot=$con->prepare('SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time WHERE id_autre_envoi_france="'.$_SESSION['id_autre_envoi_france'].'" ');
$tot->execute();
$montant_total=0;
while($itot=$tot->fetch())
{
    $montant_assurance=$itot['montant_assurance'];
	$montant_total=$montant_total + ($itot['poids_colis_autre_envoi_france']*$itot['pu_colis_autre_envoi_france']) + $itot['emballage_colis_autre_envoi_france'];//+$montant_assurance;
	
}

$montant_total=$montant_total+$montant_assurance;
$montant_euro=$montant_total/655.957;

//Calcul Total Emballage
$emb=$con->prepare('SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time WHERE id_autre_envoi_france="'.$_SESSION['id_autre_envoi_france'].'"  ');
$emb->execute();
$montant_embal=0;
while($iemb=$emb->fetch())
{
	$montant_embal=$montant_embal + $iemb['emballage_colis_autre_envoi_france'];
}

//Sous-Total
$sous=$con->prepare('SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time WHERE id_autre_envoi_france="'.$_SESSION['id_autre_envoi_france'].'"  ');
$sous->execute();
$montant_sousal=0;
while($isous=$sous->fetch())
{
	$montant_sousal=$montant_sousal + ($isous['poids_colis_autre_envoi_france']*$isous['pu_colis_autre_envoi_france']) ;
}

//Calcul Total Assurance
/*
$ass=$con->prepare('SELECT * FROM autre_envoi_france LEFT JOIN colis_autre_envoi_france ON autre_envoi_france.time_autre_envoi_france=colis_autre_envoi_france.autre_envoi_france_time WHERE id_autre_envoi_france="'.$_SESSION['id_autre_envoi_france'].'"  ');
$ass->execute();
$montant_assurance=0;
while($iass=$ass->fetch())
{
	$montant_assurance=$montant_assurance + $iass['$montant_assurance'];
}
*/

//Affiche Sous Total
$pdf->SetFillColor(255,255,255); 
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode(''),0,0,'C',false);
$pdf->SetFont('Arial','B',8);
$pdf->Cell($width_cell[5],7,utf8_decode('SOUS-TOTAL'),1,0,'R',false);
$pdf->Cell($width_cell[6],7,utf8_decode(number_format($montant_sousal,0,',',' ').' FCFA'),1,1,'C',true);
$pdf->SetFont('Arial','',7);
$fill = !$fill;

//Affiche Total Emballage
$pdf->SetFillColor(255,255,255); 
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode(''),0,0,'C',false);
$pdf->SetFont('Arial','B',8);
$pdf->Cell($width_cell[5],7,utf8_decode('EMBALLAGE'),1,0,'R',false);
$pdf->Cell($width_cell[6],7,utf8_decode(number_format($montant_embal,0,',',' ').' FCFA'),1,1,'C',true);
$pdf->SetFont('Arial','',7);
$fill = !$fill;

//Affiche Total Assurance
$pdf->SetFillColor(255,255,255); 
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode(''),0,0,'C',false);
$pdf->SetFont('Arial','B',8);
$pdf->Cell($width_cell[5],7,utf8_decode('ASSURANCE'),1,0,'R',false);
$pdf->Cell($width_cell[6],7,utf8_decode(number_format($montant_assurance,0,',',' ').' FCFA'),1,1,'C',true);
$pdf->SetFont('Arial','',7);
$fill = !$fill;

//Affiche Total
$pdf->SetFillColor(255,255,255); 
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode(''),0,0,'C',false);
$pdf->SetFont('Arial','B',8);
$pdf->Cell($width_cell[5],7,utf8_decode('MONTANT TOTAL'),1,0,'R',false);
$pdf->Cell($width_cell[6],7,utf8_decode(number_format($montant_total,0,',',' ').' FCFA'),1,1,'C',true);
$pdf->SetFont('Arial','',7);
$fill = !$fill;
//Affiche Total
$pdf->SetFillColor(255,255,255); 
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode(''),0,0,'C',false);
$pdf->SetFont('Arial','B',8);
$pdf->Cell($width_cell[5],7,utf8_decode('Soit'),1,0,'R',false);
$pdf->Cell($width_cell[6],7,utf8_decode(number_format($montant_euro,2,',',' ').' euros'),1,1,'C',true);
$pdf->SetFont('Arial','',7);
$fill = !$fill;

$pdf->Ln(5);
			
$pdf->SetFont('Arial','BI',10);
$pdf->Cell(0,4,utf8_decode('CLIENT (date et visa)                                                                                                                   SOCIETE (date et visa)'),0,1,'R'); 
$pdf->Ln(40);


$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,4,utf8_decode('Adresse de recupération : '.$info_fiche['adresse_recuperation_autre_envoi_france']),0,1,'L'); 
$pdf->Ln(1);
$pdf->Cell(0,4,utf8_decode('Nom           : '.$info_fiche['nom_recuperateur']),0,1,'L'); 
$pdf->Ln(1);
$pdf->Cell(0,4,utf8_decode('Téléphone : '.$info_fiche['tel_recuperateur']),0,1,'L'); 

$pdf->Ln(18);
$pdf->SetFont('Arial','I',8);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,4,utf8_decode('Les frais de transaction (Orange, MTN, Western Union etc.) sont à la charge du client. Merci de votre compréhension. '),0,1,'L'); 
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',8);

	
	
$pdf->Line(10, 279, 200, 279);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>