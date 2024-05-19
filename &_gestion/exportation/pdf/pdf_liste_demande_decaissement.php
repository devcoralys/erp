<?php
session_start ();
 
    include('../../../connex.php');
	 
	include("../../../pdf/phpToPDF.php");

	require('../../../pdf/mysql_table.php');
	
	require_once 'nuts.php';

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
			$pdffilename = 'liste_demande_decaissement.pdf';
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
			$pdf->Image("../../../img/entete_liste_decaissement.jpg", 10, 10,  270, 'C');
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
	
	if(isset($_SESSION['recher_etat']) && $_SESSION['recher_etat']!='')
	{
	$recher_etat=$_SESSION['recher_etat'];
	
	if($recher_etat==0){$lib_etat="Demandes En Attente";}
    if($recher_etat==1){$lib_etat="Demandes Acceptées";}
    if($recher_etat==2){$lib_etat="Demandes Réfusées";}
    if($recher_etat==3){$lib_etat="Demandes Décaissées";}
    
	}
	else
	{
	$recher_etat='';
	}


	$req=" SELECT * FROM demande_decaissement LEFT JOIN utilisateur ON utilisateur.secur=demande_decaissement.secur_ajout_demande_decaissement WHERE id_demande_decaissement!='' ";


	if($recher_date_debut!=''){
	    $req.=" AND date_demande_decaissement>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $req.=" AND date_demande_decaissement<='".$recher_date_fin."'  ";
	}

	if($recher_etat!=''){
	    $req.=" AND etat_demande=".$recher_etat." ";
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
	$pdf->Cell(0,3.3,utf8_decode('LISTE DES demande_decaissementS'),0,1,'C');
	$pdf->Ln(4);
*/
    
    if($recher_date_debut!=""){$recher_date_debut=date("d/m/Y", strtotime($recher_date_debut));};
    if($recher_date_fin!=""){$recher_date_fin=date("d/m/Y", strtotime($recher_date_fin));};
    
    $titre="";
    if($lib_etat!='')
    {
        $titre.=$lib_etat;
    }
    if($recher_date_debut!="")
    {
        $titre.=" depuis le ".$recher_date_debut." ";
    }
    if($recher_date_fin!="")
    {
        $titre.=" jusqu'au ".$recher_date_fin." ";
    }
	
	$pdf->SetFont('Arial','',15);
	$pdf->Cell(0,3.3,utf8_decode($titre),0,1,'C');
	$pdf->Ln(4);
	$pdf->SetFont('Arial','I',13);
	
	
	//Chiffres en lettres
	
	$montant_total=$_SESSION['total_dem_dec'];
	
	$pdf->Ln(2);
    // méthode avec la classe nuts
    $nuts = new nuts($montant_total, ' FCFA');
    //echo $nuts->convert('fr-FR');
    
    $pdf->SetTextColor(255, 0, 0);
    $pdf->SetFont('Arial','I',8);
	$pdf->Cell(0,3.3,utf8_decode('Le montant total de '.$titre.' est de '.number_format($montant_total,0,',',' ').' FCFA ('.$nuts->convert('fr-FR').' FCFA)'),0,1,'C');
	$pdf->Ln(1);
	$pdf->SetFont('Arial','I',8);
	$pdf->Cell(0,3.3,utf8_decode('Pour les détails veuillez consulter le tableau suivant.'),0,1,'C');
	$pdf->Ln(4);
    $pdf->SetTextColor(0, 0, 0);
    //Fin chiffres en lettres

				
	$pdf->Cell(20);
	$pdf->Ln(3);
				
	$width_cell=array(18,37,172,18,15,20);
	$pdf->SetFont('Arial','B',7);

	//Couleur d'arrère plan de l'en-tête//
	$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //
$pdf->Cell($width_cell[0],7,utf8_decode('Date'),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('Demandeur'),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('Motif'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('Montant'),1,0,'C',true);
$pdf->Cell($width_cell[4],7,utf8_decode('Mode Règl.'),1,0,'C',true);
$pdf->Cell($width_cell[5],7,utf8_decode('Etat'),1,1,'C',true);
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

$montant_total=$montant_total+floatval($row['montant_demande_decaissement']);


if($row['etat_demande']==0){ $etat="Non défini"; }
if($row['etat_demande']==1){ $etat="Acceptée"; }
if($row['etat_demande']==2){ $etat="Réfusée"; }
if($row['etat_demande']==3){ $etat="Decaissée"; }
 
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','',6);

$pdf->Cell($width_cell[0],7,date("d/m/Y", strtotime($row['date_demande_decaissement'])),1,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode($row['nom_utilisateur']),1,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode($row['motif_demande_decaissement']),1,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode(number_format($row['montant_demande_decaissement'],0,',',' ').' '),1,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode($row['mode_reglement_demande_decaissement']),1,0,'C',false);
$pdf->Cell($width_cell[5],7,utf8_decode($etat),1,1,'C',false);

$fill = !$fill;
}


//Affiche Total
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','B',7);
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);

$pdf->SetFont('Arial','B',8);
$pdf->Cell($width_cell[2],7,utf8_decode('TOTAL'),0,0,'R',false);
$pdf->Cell($width_cell[3],7,utf8_decode(number_format($montant_total,0,',',' ').''),1,0,'C',false);
$pdf->SetFont('Arial','',7);

$pdf->Cell($width_cell[4],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[5],7,utf8_decode(''),0,1,'C',false);

$fill = !$fill;


   
			


$pdf->Line(10, 279, 200, 279);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>