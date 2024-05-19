<?php

session_start ();

$date_du_jour=gmdate('Y-m-d');

//$date_du_jour="2023-10-12";

$_SESSION['recher_date_debut']=$date_du_jour.' 00:00:00';
$_SESSION['recher_date_fin']=$date_du_jour.' 23:59:00';

	$recher_date_debut=$_SESSION['recher_date_debut'];
	$recher_date_fin=$_SESSION['recher_date_fin'];


$date_decaissement=date("Y-m-d", strtotime($_SESSION['recher_date_debut']));
//Send mail

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/phpmailer/src/Exception.php';
require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'mail.stt.ci';
$mail->SMTPAuth = true;
$mail->Username = "support@stt.ci";
$mail->Password = "@Succes2019";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;

$mail->From = "support@stt.ci";
$mail->FromName = "SUPPORT STT";


$mail->AddAddress("serge.kadjo@outlook.fr", "Serge KADJO");
$mail->AddBCC("amani_ulrich@outlook.fr", "Ulrich AMANI");


$mail->isHTML(true);

$mail->Subject = "POINT JOURNALIER";
$mail->Body = "Ce mail contient une pi&egrave;ce jointe : <br> <ol><li>La liste des d&eacute;caissements du jour (nomm&eacute; demande_decaissees_jour_mois_annee_heure_min.pdf)</li></ol>";
$mail->AltBody = "DETAILS";

//Creation PDF
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
			//$pdffilename = 'demandes_decaissees_23_08_2023.pdf';
			$pdffilename = 'demandes_decaissees_'.gmdate('d_m_Y_H_i').'.pdf';
			clearstatcache();
			if (file_exists($pdffilename)) {
			//Si le fichier PDF existe, il faut le supprimer d'abord
			unlink($pdffilename);
			}
			 
			//Création du fichier PDF
			$pdf=new PDF('L','mm','A4');
			 
			$pdf->AliasNbPages();

			//$pdf->AddPage('L');
			$pdf->AddPage();
			
		
			$pdf->SetTextColor(0);
			$pdf->SetFont('Arial','',10);
			$entreprise=utf8_decode("STT-CI");
			$pdf->Image("../../../img/entete_fiche.jpg", 50, 10,  200, 'C');
			$pdf->Ln(25);
			//$pdf->Cell(0,2,utf8_decode("Application de Gestion des Formations "),0,1,'C');
			//$pdf->Line(10, 35, 200, 35); 
			$pdf->Ln(5);

			$pdf->SetFont('Arial','',7);
			$mot="N°";
			$num=utf8_decode($mot);
			$date=gmdate('d/m/Y');

	

	
   
			
	$req=" SELECT * FROM demande_decaissement WHERE etat_demande=3  ";
	
		 
	 if($recher_date_debut!=""){
	 $req.=" AND demande_decaissement.date_decaisse_demande_decaissement>='".$recher_date_debut."'  ";
	 }
	 
	 if($recher_date_fin!=""){
	 $req.=" AND demande_decaissement.date_decaisse_demande_decaissement<='".$recher_date_fin."' ";
	 }

    
     
     $req.=" ORDER BY id_demande_decaissement ASC ";
			 
	$reta=$con->prepare($req); 
    $reta->execute();
	$nbre_serv=$reta->rowcount();


	$req0_=" SELECT * FROM demande_decaissement WHERE etat_demande=3 ";
	
		 
	 if($recher_date_debut!=""){
	 $req0_.=" AND demande_decaissement.date_decaisse_demande_decaissement>='".$recher_date_debut."'  ";
	 }
	 
	 if($recher_date_fin!=""){
	 $req0_.=" AND demande_decaissement.date_decaisse_demande_decaissement<='".$recher_date_fin."' ";
	 }


   
     	$req0=$con->prepare($req0_);
	
	$req0->execute();
	$info_fiche0=$req0->fetch();	
			
$date_oj=gmdate('d/m/Y');
			
$pdf->SetFont('Arial','',10);

$pdf->Cell(0,4,'		                                                                                                                                                                 Date :'.$date_oj,0,1,'L'); 	

$pdf->Ln(6);

$pay=mb_convert_encoding("Côte d'Ivoire", 'ISO-8859-7', 'UTF-8');
$pdf->SetFont('Arial','BU',15);
$pdf->Cell(0,3.3,mb_convert_encoding('DECAISSEMENTS DU JOUR', 'ISO-8859-7', 'UTF-8'),0,1,'C');
$pdf->Ln(6);
$pdf->SetFont('Arial','',15);
$pdf->Cell(0,3.3,'Debut : '.date("d/m/Y H:i:s", strtotime($recher_date_debut)).' - Fin :'.date("d/m/Y H:i:s", strtotime($recher_date_fin)).' ',0,1,'C');
$pdf->SetFont('Arial','I',13);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','B',7);
			
$pdf->Cell(20);
$pdf->Ln(8);

     $req1_="  SELECT * FROM demande_decaissement WHERE etat_demande=3 ";

	 
	 if($recher_date_debut!=""){
	 $req1_.=" AND demande_decaissement.date_decaisse_demande_decaissement>='".$recher_date_debut."'  ";
	 }
	 
	 if($recher_date_fin!=""){
	 $req1_.=" AND demande_decaissement.date_decaisse_demande_decaissement<='".$recher_date_fin."' ";
	 }


   
     $req1=$con->prepare($req1_);

$req1->execute();
$info_fiche=$req1->fetch();	

$pdf->SetTextColor(0, 0, 0);

$pdf->Ln(8);
	
$pdf->SetFont('Arial','B',9);
$pdf->Cell(0,3.7,utf8_decode('Nombre d\'éléments : '.$nbre_serv.' '),0,1,'L');
			
$pdf->Cell(20);
$pdf->Ln(3);
	
$width_cell=array(25,53,99,50,29,29);
$pdf->SetFont('Arial','B',8);

//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //
$pdf->Cell($width_cell[0],7,utf8_decode('N°'),1,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('Montant (en XOF)'),1,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('Motif'),1,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('Validé Par'),1,0,'C',true);
$pdf->Cell($width_cell[4],7,utf8_decode('Décaissé Par'),1,0,'C',true);
$pdf->Cell($width_cell[5],7,utf8_decode('Mode Paiement'),1,1,'C',true);
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
    
    $val=$con->prepare('SELECT * FROM utilisateur WHERE secur=:A');
    $val->execute(array('A'=>$row['secur_accepte_demande_decaissement']));
    $ival=$val->fetch();
    $nom_validateur=$ival['nom_utilisateur'];
    
    $dec=$con->prepare('SELECT * FROM utilisateur WHERE secur=:A');
    $dec->execute(array('A'=>$row['secur_decaisse_demande_decaissement']));
    $idec=$dec->fetch();
    $nom_decaisseur=$idec['nom_utilisateur'];
    
   
    
    $pdf->Cell($width_cell[0],7,utf8_decode(substr($row['num_demande_decaissement'], 0, 45)),1,0,'C',false);
    $pdf->SetFont('Arial','B',9);
    $pdf->SetTextColor(6,43,22);
    $pdf->Cell($width_cell[1],7,number_format($row['montant_demande_decaissement'],0,',',' ').' FCFA',1,0,'C',false);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell($width_cell[2],7,utf8_decode(substr($row['motif_demande_decaissement'], 0, 45)),1,0,'C',false);
    
    $pdf->Cell($width_cell[3],7,utf8_decode(substr( $nom_validateur, 0, 45)),1,0,'C',false);

    $pdf->Cell($width_cell[4],7,utf8_decode(substr($nom_decaisseur, 0, 45)),1,0,'C',false);
    $pdf->Cell($width_cell[5],7,utf8_decode(substr($row['mode_reglement_demande_decaissement'], 0, 45)),1,1,'C',false);

    
    $fill = !$fill;
}

    //Calcul Total
    $tota=' SELECT * FROM demande_decaissement WHERE etat_demande=3 ';

	 
	 if($recher_date_debut!=""){
	 $tota.=" AND demande_decaissement.date_decaisse_demande_decaissement>='".$recher_date_debut."'  ";
	 }
	 
	 if($recher_date_fin!=""){
	 $tota.=" AND demande_decaissement.date_decaisse_demande_decaissement<='".$recher_date_fin."' ";
	 }


    
     $tot=$con->prepare($tota);

$tot->execute();
$montant_total=0;
while($itot=$tot->fetch())
{
	$montant_total=$montant_total + ($itot['montant_demande_decaissement']);
}

//Affiche Total
$pdf->SetFillColor(255,255,255); 
$pdf->Cell($width_cell[0],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[1],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[2],7,utf8_decode(''),0,0,'C',false);
$pdf->Cell($width_cell[3],7,utf8_decode(''),0,0,'C',false);
$pdf->SetFont('Arial','B',9);
$pdf->Cell($width_cell[4],7,utf8_decode('TOTAL'),1,0,'R',false);
$pdf->Cell($width_cell[5],7,utf8_decode(number_format($montant_total,0,',',' ').' FCFA'),1,1,'C',true);
$pdf->SetFont('Arial','',7);
$fill = !$fill;

$pdf->Ln(8);
      
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,4,utf8_decode('                                                                                                                                          Le Directeur Général (nom, date et visa) '),0,1,'R'); 
/*
$pdf->Ln(20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,4,utf8_decode('Approbation du DG (nom, date et visa)'),0,1,'R'); 
*/

$pdf->Ln(149);
$pdf->Line(10, 272, 200, 272);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";
//End Creation PDF

// Add Static Attachment
$attachment = $pdffilename;
$mail->AddAttachment($attachment , $pdffilename);


try {
    $mail->send();
    echo "Message envoyé avec succes";
} catch (Exception $e) {
    echo "Erreur d'envoi du mail: " . $mail->ErrorInfo;
}
//End mail

//WhatsApp Notif
/*
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://graph.facebook.com/%7B%7BVersion%7D%7D/%7B%7BPhone-Number-ID%7D%7D/messages',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "messaging_product": "whatsapp",
    "recipient_type": "individual",
    "to": "{{2250748367710}}",
    "type": "application/pdf",
    "image": {
        "link": "$pdffilename"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer {{User-Access-Token}}',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
*/
//End WhatsApp Notif
 
//header('Location: pdf_liste.php');
	

?>