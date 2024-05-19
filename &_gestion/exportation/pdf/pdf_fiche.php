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
	/*
    $this->Image('../../../img/logo_veritas.jpg', 10,275,30);	
    // Arial italic 8
    $this->SetFont('Arial','',7);

	$this->Cell(0,3.5,utf8_decode("GESTION INTELLIGENTE DES MOUVEMENTS D'ENERGIE"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('Au capital de 65 000 000 F CFA - Siège Social : Angré 9e tranche, rue de l\'immeuble CGK, près du trésor public'),0,1,'C');
	$this->Cell(0,3.5,utf8_decode("XX BP XXXX Abidjan XX - Téléphone : (+225) +225 27-224-259-36  -  Email : info@lynaysentreprises.com"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('RCCM :  -  N° CC : '),0,1,'C');
	
	$this->Image('../../../img/logo_fdfp.jpg', 172,275,30);	
	*/
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
} 
}

if(isset($_GET['num_fiche']) && $_GET['num_fiche']!=''){ $_SESSION['num_fiche']=$_GET['num_fiche']; }
            
			//Paramètres du fichier PDF 
			$pdffilename = 'fiche_expression_besoin_achat.pdf';
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
			$entreprise=utf8_decode("Lynays Entreprises");
			$pdf->Image("../../../img/entete_fiche.jpg", 5, 10,  200, 'C');
			$pdf->Ln(25);
			//$pdf->Cell(0,2,utf8_decode("Application de Gestion des Formations "),0,1,'C');
			//$pdf->Line(10, 35, 200, 35); 
			$pdf->Ln(5);

			$pdf->SetFont('Arial','',7);
			$mot="N°";
			$num=utf8_decode($mot);
			$date=gmdate('d/m/Y');
			
	$req=" SELECT * FROM besoin LEFT JOIN article_besoin ON article_besoin.besoin_num = besoin.num_fiche LEFT JOIN article ON article.num_article=article_besoin.article_num LEFT JOIN utilisateur ON utilisateur.secur=besoin.demandeur_secur WHERE num_fiche='".$_SESSION['num_fiche']."' ";
			 
	$reta=$con->prepare($req); 
    $reta->execute();
	$nbre_serv=$reta->rowcount();


	$req0=$con->prepare(" SELECT * FROM besoin LEFT JOIN article_besoin ON article_besoin.besoin_num = besoin.num_fiche LEFT JOIN article ON article.num_article=article_besoin.article_num LEFT JOIN utilisateur ON utilisateur.secur=besoin.demandeur_secur WHERE num_fiche='".$_SESSION['num_fiche']."' ");
	$req0->execute();
	$info_fiche0=$req0->fetch();	
			
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3.3,utf8_decode('Ref: '.$_SESSION['num_fiche']),0,1,'L');
$pdf->Ln(5);

$date_oj=gmdate('d/m/Y');
			
$pdf->SetFont('Arial','',10);

$pdf->Cell(0,4,'
			                                                                                                                                                                 Date :'.$date_oj,0,1,'L'); 	
$pdf->Ln(6);

$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,3.3,utf8_decode('FICHE D\'EXPRESSION DE BESOIN D\'ACHAT'),0,1,'C');
$pdf->Ln(4);
$pdf->SetFont('Arial','I',13);

		if($info_fiche0['etat_besoin']==1){
$pdf->SetTextColor(255, 128, 0);
$pdf->Cell(0,3.3,utf8_decode('En attente de 1ère validation'),0,1,'C');
		}

		if($info_fiche0['etat_besoin']==2){
$pdf->SetTextColor(255, 128, 0);
$pdf->Cell(0,3.3,utf8_decode('En attente de 2ème validation'),0,1,'C');
		}

		if($info_fiche0['etat_besoin']==3){
$pdf->SetTextColor(0, 255, 50);
$pdf->Cell(0,3.3,utf8_decode('Demande Validée'),0,1,'C');
		}

		if($info_fiche0['etat_besoin']==4){
$pdf->SetTextColor(255, 0, 50);
$pdf->Cell(0,3.3,utf8_decode('Demande Réfusée'),0,1,'C');
		}

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','B',7);
			
$pdf->Cell(20);
$pdf->Ln(8);

$req1=$con->prepare(" SELECT * FROM besoin LEFT JOIN article_besoin ON article_besoin.besoin_num = besoin.num_fiche LEFT JOIN article ON article.num_article=article_besoin.article_num LEFT JOIN utilisateur ON utilisateur.secur=besoin.demandeur_secur WHERE num_fiche='".$_SESSION['num_fiche']."' ");
$req1->execute();
$info_fiche=$req1->fetch();	

$pdf->SetFont('Arial','',9);
$pdf->Cell(0,3.7,utf8_decode('Demandeur : '.$info_fiche['nom_utilisateur'].''),0,1,'L');
$pdf->Ln(2);
$pdf->SetFont('Arial','',9);
$pdf->Cell(0,3.7,utf8_decode('Objet de la demande : '.$info_fiche['objet_demande'].' '),0,1,'L');
$pdf->Ln(2);

if($info_fiche['besoin_immediat']==1){
$pdf->SetFont('Arial','B',9);
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(0,3.7,utf8_decode('BESOIN IMMEDIAT'),0,1,'L');
}
$pdf->SetTextColor(0, 0, 0);

$pdf->Ln(8);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(0,3.7,utf8_decode('Nombre d\'éléments : '.$nbre_serv.' '),0,1,'L');
			
$pdf->Cell(20);
$pdf->Ln(3);
			
$width_cell=array(18,90,28,29,29);
$pdf->SetFont('Arial','B',8);

//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //
$pdf->Cell($width_cell[0],7,utf8_decode('N°'),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('Désignation'),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('Quantité'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('Prix Unitaire'),1,0,'C',true);
$pdf->Cell($width_cell[4],7,utf8_decode('Prix Total'),1,1,'C',true);
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
$pdf->Cell($width_cell[1],7,utf8_decode($row['designation_article']),1,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode($row['qte_article']),1,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode(number_format($row['prix_article'],0,',',' ').' FCFA'),1,0,'C',false);
$pdf->Cell($width_cell[4],7,utf8_decode(number_format($row['prix_article']*$row['qte_article'],0,',',' ').' FCFA'),1,1,'C',false);
$fill = !$fill;
}

//Calcul Total
$tot=$con->prepare('SELECT * FROM besoin LEFT JOIN article_besoin ON article_besoin.besoin_num = besoin.num_fiche LEFT JOIN article ON article.num_article=article_besoin.article_num LEFT JOIN utilisateur ON utilisateur.secur=besoin.demandeur_secur WHERE num_fiche="'.$_SESSION['num_fiche'].'" ');
$tot->execute();
$montant_total=0;
while($itot=$tot->fetch())
{
	$montant_total=$montant_total + ($itot['qte_article']*$itot['prix_article']);
}

//Affiche Total
$pdf->SetFillColor(255,255,255); 
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode(''),0,0,'C',false);
$pdf->SetFont('Arial','B',9);
$pdf->Cell($width_cell[3],7,utf8_decode('TOTAL'),1,0,'R',false);
$pdf->Cell($width_cell[4],7,utf8_decode(number_format($montant_total,0,',',' ').' FCFA'),1,1,'C',true);
$pdf->SetFont('Arial','',7);
$fill = !$fill;

$pdf->Ln(8);
			
$pdf->SetFont('Arial','BI',10);
$pdf->Cell(0,4,utf8_decode('DGA/Resp. moyens généraux (date et visa)                                                          Approbation du DG (date et visa)'),0,1,'R'); 
$pdf->Ln(4);

//Infos validateurs
$va1=$con->prepare('SELECT * from besoin LEFT JOIN utilisateur ON besoin.secur_valid_1=utilisateur.secur WHERE num_fiche="'.$_SESSION['num_fiche'].'" ');
$va1->execute();
$iva1=$va1->fetch();
if($iva1['secur_valid_1']!='' && $iva1['secur_refus_1']=='')
{
	$validateur_1=$iva1['nom_utilisateur'];
	$note_1='Validée par';
}
if($iva1['secur_valid_1']=='' && $iva1['secur_refus_1']!='')
{
	$validateur_1=$iva1['nom_utilisateur'];
	$note_1='Réfusée par';
}
if($iva1['secur_valid_1']=='' && $iva1['secur_refus_1']=='')
{
	$validateur_1=$iva1['nom_utilisateur'];
	$note_1='En attente de validation';
	$note_1='                        ';
}

$va2=$con->prepare('SELECT * from besoin LEFT JOIN utilisateur ON besoin.secur_valid_2=utilisateur.secur WHERE num_fiche="'.$_SESSION['num_fiche'].'"  ');
$va2->execute();
$iva2=$va2->fetch();
if($iva2['secur_valid_2']!='' && $iva2['secur_refus_2']=='')
{
	$validateur_2=$iva2['nom_utilisateur'];
	$note_2='Validée par';
}
if($iva2['secur_valid_2']=='' && $iva2['secur_refus_2']!='')
{
	$validateur_2=$iva2['nom_utilisateur'];
	$note_2='Réfusée par';
}
if($iva2['secur_valid_2']=='' && $iva2['secur_refus_2']=='')
{
	$validateur_2=$iva2['nom_utilisateur'];
	$note_2='En attente de validation';
	$note_2='                        ';
}

			
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,4,utf8_decode('      ('.$note_1.' '.$validateur_1.')                                                                                               ('.$note_2.' '.$validateur_2.') '),0,1,'R'); 
/*
$pdf->Ln(20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,4,utf8_decode('Approbation du DG (nom, date et visa)'),0,1,'R'); 
*/

$pdf->Ln(149);
//$pdf->Line(10, 270, 200, 270);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>