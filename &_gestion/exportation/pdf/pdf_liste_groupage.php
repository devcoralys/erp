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

            
			//Paramètres du fichier PDF 
			$pdffilename = 'liste_groupage.pdf';
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
			$pdf->Image("../../../img/entete_fiche.jpg", 10, 10,  270, 'C');
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


    if(isset($_SESSION['recher_expediteur']) && $_SESSION['recher_expediteur']!='')
	{
	$recher_expediteur=$_SESSION['recher_expediteur'];
	}
	else
	{
	$recher_expediteur='';
	}

    if(isset($_SESSION['recher_num_cni']) && $_SESSION['recher_num_cni']!='')
	{
	$recher_num_cni=$_SESSION['recher_num_cni'];
	}
	else
	{
	$recher_num_cni='';
	}


    if(isset($_SESSION['recher_code_colis']) && $_SESSION['recher_code_colis']!='')
	{
	$recher_code_colis=$_SESSION['recher_code_colis'];
	}
	else
	{
	$recher_code_colis='';
	}
	
	if(isset($_SESSION['recher_destinataire']) && $_SESSION['recher_destinataire']!='')
	{
	$recher_destinataire=$_SESSION['recher_destinataire'];
	}
	else
	{
	$recher_destinataire='';
	}
	
	if(isset($_SESSION['recher_destination']) && $_SESSION['recher_destination']!='')
	{
	$recher_destination=$_SESSION['recher_destination'];
	}
	else
	{
	$recher_destination='';
	}
			
	$req=" SELECT * FROM groupage WHERE id_groupage!='' AND annulation!=2 AND secur_ajout_groupage='".$_SESSION['secur_site']."' ";
	
    if($_SESSION['acces_tout_groupage']==1)
    {
        $req=" SELECT * FROM groupage WHERE id_groupage!='' AND annulation!=2 ";
    }

	if($recher_date_debut!=''){
	    $req.=" AND date_groupage>='".$recher_date_debut."'  ";
	}

    if($recher_date_fin!=''){
	    $req.=" AND date_groupage<='".$recher_date_fin."'  ";
	}

    if($recher_expediteur!=''){
	    $req.=" AND expediteur_groupage LIKE '%".$recher_expediteur."%' ";
	}
    
    if($recher_num_cni!=''){
	    $req.=" AND num_cni_expediteur_groupage LIKE '%".$recher_num_cni."%' ";
	}

    if($recher_code_colis!=''){
	    $req.=" AND num_groupage LIKE '%".$recher_code_colis."%'  ";
	}

    if($recher_destinataire!=''){
	    $req.=" AND destinataire_groupage LIKE '%".$recher_destinataire."%'  ";
	}


    if($recher_destination!=""){
        $req.=" AND destination_groupage LIKE '%".$recher_destination."%' ";
    }
			 
	$reta=$con->prepare($req); 
    $reta->execute();
	//$nbre_serv=$reta->rowcount();




	$date_oj=gmdate('d/m/Y');
				
	$pdf->Ln(8);

	$pdf->SetFont('Arial','B',10);

	$pay=utf8_decode("Côte d'Ivoire");
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(0,3.3,utf8_decode('LISTE DES GROUPAGES TRAITES'),0,1,'C');
	$pdf->Ln(4);

	
	$pdf->SetFont('Arial','',15);
	$pdf->Cell(0,3.3,utf8_decode(' DU '.date("d/m/Y", strtotime($recher_date_debut)).' au '.date("d/m/Y", strtotime($recher_date_fin))),0,1,'C');
	$pdf->Ln(4);
	$pdf->SetFont('Arial','I',13);

				
	$pdf->Cell(20);
	$pdf->Ln(3);
				
	$width_cell=array(12,24,67,30,30,18,18,50,29);
	$pdf->SetFont('Arial','B',9);

	//Couleur d'arrère plan de l'en-tête//
	$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //
$pdf->Cell($width_cell[0],7,utf8_decode('N°'),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('Code colis'),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('Destinataire'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('Tel. Destinataire'),1,0,'C',true);
$pdf->Cell($width_cell[4],7,utf8_decode('Tel. Expéditeur'),1,0,'C',true);
$pdf->Cell($width_cell[5],7,utf8_decode('Poids (kg)'),1,0,'C',true);
$pdf->Cell($width_cell[6],7,utf8_decode('Nbre Colis'),1,0,'C',true);
$pdf->Cell($width_cell[7],7,utf8_decode('Nature Colis'),1,0,'C',true);
$pdf->Cell($width_cell[8],7,utf8_decode('Montant (FCFA)'),1,1,'C',true);
//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',7);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;

//$pdf->SetWidths(array(18,80,20,20,52));
$i=0;

$tot_group=0;
$tot_poids=0;
$tot_nb_col=0;
foreach($reta as $row) {
$i++;



$poids_groupage=0;
$nbre_colis=0;
$montant_total=0;

$nature_colis='';



$nco1=$con->prepare(" SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage='".$row['id_groupage']."' AND annulation!=2 AND secur_ajout_groupage='".$_SESSION['secur_site']."' ");
    if($_SESSION['acces_tout_groupage']==1)
    {
        $nco1=$con->prepare(" SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage='".$row['id_groupage']."' AND annulation!=2 ");
    }
$nco1->execute();
while($info_nco=$nco1->fetch())
{
	$nbre_colis=$nbre_colis+$info_nco['nbre_colis'];
}	

//Calcul Total
$tot=$con->prepare('SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage="'.$row['id_groupage'].'" AND annulation!=2 AND secur_ajout_groupage="'.$_SESSION['secur_site'].'" ');
   if($_SESSION['acces_tout_groupage']==1)
    {
        $tot=$con->prepare('SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage="'.$row['id_groupage'].'" AND annulation!=2 ');
    }
$tot->execute();
while($itot=$tot->fetch())
{
	$montant_total=$montant_total + ($itot['poids_colis']*$itot['pu_colis']) + $itot['emballage_colis'] + $itot['montant_assurance'];
}

//Calcul Poids Total
$poi=$con->prepare('SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage="'.$row['id_groupage'].'" AND annulation!=2 AND secur_ajout_groupage="'.$_SESSION['secur_site'].'" ');
   if($_SESSION['acces_tout_groupage']==1)
    {
        $poi=$con->prepare('SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time WHERE id_groupage="'.$row['id_groupage'].'" AND annulation!=2 ');
    }
$poi->execute();
while($ipoi=$poi->fetch())
{
	$poids_groupage=$poids_groupage + $ipoi['poids_colis'];
	
	$nature_colis.=' '.$ipoi['nature_colis'].' ';
}

if($row['etat_groupage']==0)
{
	$progress_class="primary";
}

if($row['etat_groupage']==1)
{
	$progress_class="secondary";
}

if($row['etat_groupage']==2)
{
	$progress_class="success";
}
$pdf->SetTextColor(0, 0, 0);

$tot_group=$tot_group+$montant_total;
$tot_poids=$tot_poids+$poids_groupage;
$tot_nb_col=$tot_nb_col+$nbre_colis;
$pdf->SetFont('Arial','',10);

$pdf->Cell($width_cell[0],7,utf8_decode($i),1,0,'C',false);
$pdf->SetFont('Arial','B',12);
$pdf->Cell($width_cell[1],7,utf8_decode($row['num_groupage']),1,0,'C',false);
$pdf->SetFont('Arial','',10);
$pdf->Cell($width_cell[2],7,utf8_decode($row['destinataire_groupage']),1,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode($row['tel_destinataire_groupage']),1,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode($row['tel_expediteur_groupage']),1,0,'C',false);
$pdf->Cell($width_cell[5],7,utf8_decode($poids_groupage),1,0,'C',false);
$pdf->Cell($width_cell[6],7,$nbre_colis,1,0,'C',false);
$pdf->Cell($width_cell[7],7,substr($nature_colis, 0, 17).'...',1,0,'C',false);
$pdf->Cell($width_cell[8],7,utf8_decode(number_format($montant_total,0,',',' ').' '),1,1,'C',false);
$fill = !$fill;
}


//Affiche Total
$pdf->SetFillColor(255,255,255); 
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode(''),0,0,'C',false);
$pdf->SetFont('Arial','B',12);
$pdf->Cell($width_cell[3],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode('TOTAL'),1,0,'C',false);
$pdf->Cell($width_cell[5],7,utf8_decode($tot_poids),1,0,'C',false);
$pdf->Cell($width_cell[6],7,utf8_decode($tot_nb_col),1,0,'C',true);
$pdf->Cell($width_cell[7],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[8],7,utf8_decode(number_format($tot_group,0,',',' ').''),1,1,'C',false);
$pdf->SetFont('Arial','',7);
$fill = !$fill;


$pdf->Ln(5);
			


$pdf->Line(10, 279, 200, 279);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>