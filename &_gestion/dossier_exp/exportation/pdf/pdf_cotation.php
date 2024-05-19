<?php
session_start ();
 
    include('../../../../connex.php');
	 
	include("../../../../pdf/phpToPDF.php");

	require('../../../../pdf/mysql_table.php');

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
    //$this->Image('../../../../img/logo.jpg', 10,282,17);	
    // Arial italic 8
    $this->SetFont('Arial','',9);
	//$this->Cell(0,10,'CMS/ABJ/BS/PH',0,0,'L');
	
	//$this->Cell(0,10,'CMS/ABJ/BS/PH',0,0,'L');
	$this->Cell(0,3.5,utf8_decode('Sevice Transit Transport de Côte d\'Ivoire (STT-CI) -SARL au capital de 5.000.000 FCFA - Siège Social : Abidjan Port-Bouet  cité Douane'),0,1,'C');
	$this->Cell(0,3.5,utf8_decode("07 BP 774 Abidjan 07 - Tel: 27 21 58 09 78 / 07 57 29 04 29 - Email : servicestransittransport@gmail.com"),0,1,'C');
	$this->Cell(0,3.5,utf8_decode('RCCM : CI-ABJ-2017-B-2420 -  N° Compte Bancaire : CI 034 01022 18140790004 61 BACI '),0,1,'C');
	
	//$this->Image('../../../../img/logo.jpg', 178,282,22);	
    // Page number
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	
}
}
            

			//Paramètres du fichier PDF 
			$pdffilename = 'FACTURE_PROFORMA.pdf';
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
			 $pdf->Image("../../../../img/logo_sempa_.jpg", -20, 5, 250, 'L');
			 //$pdf->Cell(0,2,"Syndicat des Entrepreneurs de Manutention des Ports Abidjan et de ".$cot_ivoir." ",0,1,'C');
			 //$pdf->Line(10, 35, 200, 35); 
			 $pdf->Ln(28);
			 */

			$pdf->SetTextColor(0);
			$pdf->SetFont('Arial','',10);
			$cot_ivoir=utf8_decode("Côte d'Ivoire");
			 //$pdf->Image('../../../img/entete-logo.jpg',12,8,43);
			 $pdf->Image("../../../../img/logo.jpg", 8, 5,  50, 'L');
			 $pdf->Ln(12);
			 //$pdf->Cell(0,2,utf8_decode("Services Transit Transport Côte d'Ivoire "),0,1,'C');
			 //$pdf->Line(10, 35, 200, 35); 
			 //$pdf->Ln(10);

			 $pdf->SetFont('Arial','',8);
			$mot="N°";
			$num=utf8_decode($mot);
			$date=gmdate('d/m/Y');
			
		 
			$ref_dos=$_SESSION['ref_dos'];


			$inf=$con->prepare('SELECT * FROM dossier_exp LEFT JOIN client ON client.id_client=dossier_exp.client_id LEFT JOIN service ON service.id_service=dossier_exp.service_dossier_id WHERE id_dossier=:A');
            $inf->execute(array('A'=>$ref_dos));
            $info=$inf->fetch();
			
            $cotation_valide=$info['cotation_valide'];
            $cotation_soumise=$info['cotation_soumise'];
            $num_dossier=$info['num_dossier'];
            $nom_client=$info['nom_client'];
            $nom_dossier=$info['nom_dossier'];
            $lib_service=$info['lib_service'];
            $dateline=$info['date_int_dossier'];
            $date_depart_expedition=$info['date_depart_expedition'];
            $date_arrivee=$info['date_arrivee'];
            $pays_destination=$info['pays_provenance'];
            $transporteur=$info['transporteur'];
            $code_bateau=$info['code_bateau'];
            $num_connaissement=$info['num_connaissement'];
            $num_voyage=$info['num_voyage'];
            $masse_net=$info['masse_net'];
            $masse_brute=$info['masse_brute'];
            $total_colis=$info['total_colis'];
            $tirage_declaration=$info['tirage_declaration'];
            $sydam=$info['sydam'];
            $fiche_assurance=$info['fiche_assurance'];
            $agio=$info['agio'];
            $ouverture_dossier=$info['ouverture_dossier'];
            $acconage=$info['acconage'];
            $surestarie=$info['surestarie'];
            $echange_bl=$info['echange_bl'];
            $caution=$info['caution'];
            $livraison=$info['livraison'];
          //  $ts_douane=$info['ts_douane'];
            $retrait_documentaire=$info['retrait_documentaire'];
            $debours_divers=$info['debours_divers'];
            $documentation_weeb=$info['documentation_weeb'];
            $bsc=$info['bsc'];
            $aiae=$info['aiae'];
            $certificat_veterinaire=$info['certificat_veterinaire'];
            $appurement_magasin=$info['appurement_magasin'];
            $magasinage=$info['magasinage'];
            $sortie_pc=$info['sortie_pc'];
            $commission=$info['commission'];
            $escorte=$info['escorte'];
            $manutention=$info['manutention'];
            $had=$info['had'];
            //$certificat_phyto=$info['certificat_phyto'];
            $nature=$info['nature'];
            $description_dossier=$info['description_dossier'];
            

            
            /*
            $requete=" SELECT * FROM article WHERE id_article!='' AND dossier_id=".$ref_dos." ";
            $sqlQuery=$con->query($requete);
            $nb_colis 	= $sqlQuery->rowCount();
            */
            $nom_fournisseur=$info['nom_fournisseur'];
            $facture_fournisseur=$info['facture_fournisseur'];
            $bon_a_enlever=$info['bon_a_enlever'];
            $copie_lta=$info['copie_lta'];
            $liste_colisage=$info['liste_colisage'];
            $autre_document=$info['autre_document'];
            
            $date_declaration_bl=$info['date_declaration_bl'];
            $date_lta_bl=$info['date_lta_bl'];
            $waybill_bl=$info['waybill_bl'];
            
            $port_dechargement=$info['port_dechargement'];
            $destinataire=$info['destinataire'];
            $lieu_empotage=$info['lieu_empotage'];
            
            //Cotation variables
            $fret=$info['fret'];
            $fuel_surcharge=$info['fuel_surcharge'];
            $irc=$info['irc'];
            $pmp=$info['pmp'];
            $avisecure=$info['avisecure'];
            $frais_lta=$info['frais_lta'];
            $frais_nas=$info['frais_nas'];
            
            //Frais transit var
            $ts=$info['ts'];
            $co_eur1=$info['co_eur1'];
            $fiche_empotage=$info['fiche_empotage'];
            $intervention_douane=$info['intervention_douane'];
            $redressement=$info['redressement'];
            $visite_douane=$info['visite_douane'];
            $manutention=$info['manutention'];
            $dgd=$info['dgd'];
            $absence_d3=$info['absence_d3'];
            $amende_douane=$info['amende_douane'];
            $acceptation_nas=$info['acceptation_nas'];
            $tc_supplementaire=$info['tc_supplementaire'];
            $rectf=$info['rectf'];
            
            //Frais phyto var
            $autorisation_maq=$info['autorisation_maq'];
            $rapport_journalier=$info['rapport_journalier'];
            $certificat_phytosanitaire=$info['certificat_phytosanitaire'];
            $agent_phyto=$info['agent_phyto'];
            
            //Frais Compagnie var
            $posit_relevage=$info['posit_relevage'];
            $edition_eir=$info['edition_eir'];
            $pesage_manut=$info['pesage_manut'];
            $msr=$info['msr'];
            $abidjan_terminal=$info['abidjan_terminal'];
            $waybill=$info['waybill'];
            $surpoids=$info['surpoids'];
            $detention_container=$info['detention_container'];
            $expedition_dhl=$info['expedition_dhl'];
            
            //Intervention HT var
            $had_exp=$info['had_exp'];
			
			$date_oj=gmdate('d/m/Y');
						
			$pdf->SetFont('Arial','',10);
			//$pdf->Cell(0,4,'Date : '.$date_oj,0,1,'R'); 	

			$pdf->Ln(6);

			$num_cot=$con->prepare('SELECT * FROM dossier_exp WHERE id_dossier=:A ');
			$num_cot->execute(array('A'=>$ref_dos));
			$inum_dos=$num_cot->fetch();
			$id_dos=$inum_dos['id_dossier'];

			$cod_proforma=$id_dos;
			$_SESSION['cod_proforma']=$cod_proforma;
		     
$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','BU',12);

/*
if($cotation_valide==1)
{
    */
$pdf->Cell(0,3.3,utf8_decode('FACTURE PROFORMA N° 00'.$cod_proforma),0,1,'C');
/*
    
}
else
{
$pdf->Cell(0,3.3,utf8_decode('FACTURE PROFORMA N° 00'.$cod_proforma.' '),0,1,'C');  
$pdf->SetTextColor(219,41,32);
$pdf->SetFont('Arial','B',18);
$pdf->Ln(2);
$pdf->Cell(0,3.3,utf8_decode(' BROUILLON '),0,1,'C');  
$pdf->SetFont('Arial','BU',12);
$pdf->SetTextColor(0,0,0);
}
*/
$pdf->Ln(10);
$pay=utf8_decode("Côte d'Ivoire");
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,3.3,utf8_decode('CLIENT : '.$nom_client.' - '.$adresse_client),0,1,'L');
$pdf->Ln(4);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('LTA/BL : '.$num_connaissement.' - N° Vol/Voyage : '.$num_voyage.' - Destination : '.$pays_destination.' '), '0', 'L', 0);
$pdf->Ln(0);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('Nombre de colis : '.$total_colis.' - Masse Brute : '.$masse_brute.' - Nature : '.$nature), '0', 'L', 0);
$pdf->Ln(0);
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,6,utf8_decode('Destinataire : '.$destinataire.' - Port de déchargement : '.$port_dechargement.' '), '0', 'L', 0);
$pdf->Ln(0);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0,6,utf8_decode($num_dossier.' - '.$lib_service.' - Date : '.$date_oj), '0', 'L', 0);
$pdf->Ln(1);


$pdf->Cell(20);

//Affichage des totaux
/*
$pdf->Ln(5);
$width_cell=array(36,78,40,40);
$pdf->SetFont('Arial','',8);

$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,3.3,utf8_decode('Frais Transport/Charges'),0,1,'C');

$pdf->Ln(1);

//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(255,255,255);
//EN-TETE /// 
$pdf->Cell($width_cell[0],7,utf8_decode('FRET'),0,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('FRAIS NAS'),0,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('FRAIS LTA)'),0,0,'C',true);
$pdf->Cell($width_cell[3],7,utf8_decode('TAXE PESEE (PMP)'),0,1,'C',true);
//// FIN EN-TETE ///////

$pdf->SetFont('Arial','',8);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;
$pdf->Cell($width_cell[0],7,number_format($fret,0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[1],7,number_format($frais_nas,0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[2],7,number_format($frais_lta,0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[3],7,number_format($pmp,0,',',' ').' XOF',0,1,'C',true);
$fill = !$fill;


$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(255,255,255);
$width_cell=array(36,78,80);
//EN-TETE /// 
$pdf->Cell($width_cell[0],7,utf8_decode('AVISECURE'),0,0,'C',true);
$pdf->Cell($width_cell[1],7,utf8_decode('IRC (INSURANCE RISK CHARGES)'),0,0,'C',true);
$pdf->Cell($width_cell[2],7,utf8_decode('FUEL SURCHARGE(PMY)'),0,1,'C',true);
//// FIN EN-TETE ///////

$pdf->SetFont('Arial','',8);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;
$pdf->Cell($width_cell[0],7,number_format($avisecure,0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[1],7,number_format($irc,0,',',' ').' XOF',0,0,'C',true);
$pdf->Cell($width_cell[2],7,number_format($fuel_surcharge,0,',',' ').' XOF',0,1,'C',true);
$fill = !$fill;

*/

$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,3.3,utf8_decode('Frais Transport/Charges'),0,1,'C');
$pdf->Ln(2);


$pdf->Ln(1);
$width_cell=array(166,28);
$pdf->SetFont('Arial','',8);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(235,236,236); 

$total_frais_transport=0;

if($fret!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('FRET'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($fret,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_transport=$total_frais_transport+$fret;
}

if($frais_nas!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('FRAIS NAS'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($frais_nas,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_transport=$total_frais_transport+$frais_nas;
}

if($frais_lta!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('FRAIS LTA'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($frais_lta,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_transport=$total_frais_transport+$frais_lta;
}

if($pmp!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('TAXE PESEE (PMP)'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($pmp,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_transport=$total_frais_transport+$pmp;
}

if($avisecure!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('AVISECURE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($avisecure,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_transport=$total_frais_transport+$avisecure;
}

if($irc!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('IRC (INSURANCE RISK CHARGES)'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($irc,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_transport=$total_frais_transport+$irc;
}

if($fuel_surcharge!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('FUEL SURCHARGE (PMY)'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($fuel_surcharge,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_transport=$total_frais_transport+$fuel_surcharge;
}

$pdf->SetFont('Arial','B',8);
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('TOTAL FRAIS TRANSPORT/CHARGES'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,number_format($total_frais_transport,0,',',' ').' XOF',0,1,'R',true);




$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,3.3,utf8_decode('Frais Transit Douane'),0,1,'C');
$pdf->Ln(2);


$pdf->Ln(1);
$width_cell=array(166,28);
$pdf->SetFont('Arial','',8);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(235,236,236); 

$total_transit_douane=0;

if($tirage_declaration!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('TIRAGE DECLARATION'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($tirage_declaration,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$tirage_declaration;
}
if($sydam!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('SYDAM'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($sydam,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$sydam;
}
if($ts!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('TS'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($ts,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$ts;
}
if($co_eur1!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('CO / EUR1'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($co_eur1,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$co_eur1;
}
if($fiche_empotage!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('FICHE EMPOTAGE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($fiche_empotage,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$fiche_empotage;
}
if($intervention_douane!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('INTERVENTION DOUANE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($intervention_douane,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$intervention_douane;
}
if($redressement!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('REDRESSEMENT'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($redressement,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$redressement;
}
if($visite_douane!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('VISITE DOUANE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($visite_douane,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$visite_douane;
}
if($manutention!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('MANUTENTION'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($manutention,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$manutention;
}

if($dgd!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('DGD'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($dgd,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$dgd;
}
if($absence_d3!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('ABSENCE D3'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($absence_d3,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$absence_d3;
}
if($amende_douane!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('AMENDE DOUANE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($amende_douane,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$amende_douane;
}
if($acceptation_nas!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('ACCEPTATION NAS'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($acceptation_nas,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$acceptation_nas;
}
if($tc_supplementaire!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('TC SUPPLEMENTAIRE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($tc_supplementaire,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$tc_supplementaire;
}
if($rectf!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('RECTF'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($rectf,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_transit_douane=$total_transit_douane+$rectf;
}


$pdf->SetFont('Arial','B',8);
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('TOTAL FRAIS TRANSIT/DOUANE'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,number_format($total_transit_douane,0,',',' ').' XOF',0,1,'R',true);


$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,3.3,utf8_decode('Frais Phyto'),0,1,'C');
$pdf->Ln(2);

$total_frais_phyto=0;

if($autorisation_maq!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('AUTORISATION DE MISE A QUAI'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($autorisation_maq,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_phyto=$total_frais_phyto+$autorisation_maq;
}

if($rapport_journalier!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('RAPPORT JOURNALIER'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($rapport_journalier,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_phyto=$total_frais_phyto+$rapport_journalier;
}

if($certificat_phytosanitaire!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('CERTIFICAT PHYTOSANITAIRE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($certificat_phytosanitaire,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_phyto=$total_frais_phyto+$certificat_phytosanitaire;
}

if($agent_phyto!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('AGENT PHYTO / TS'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($agent_phyto,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_phyto=$agent_phyto+$total_frais_phyto;
}


$pdf->SetFont('Arial','B',8);
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('TOTAL FRAIS PHYTO'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,number_format($total_frais_phyto,0,',',' ').' XOF',0,1,'R',true);


$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,3.3,utf8_decode('Frais Compagnie'),0,1,'C');
$pdf->Ln(2);

$total_frais_compagnie=0;

if($posit_relevage!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('POSIT/RELEVAGE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($posit_relevage,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_compagnie=$total_frais_compagnie+$posit_relevage;
}

if($edition_eir!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('EDITION EIR'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($edition_eir,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_compagnie=$total_frais_compagnie+$edition_eir;
}

if($pesage_manut!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('PESAGE/MANUT'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($pesage_manut,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_compagnie=$total_frais_compagnie+$pesage_manut;
}

if($msr!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('MISE SUR REMORQUE'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($msr,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_compagnie=$total_frais_compagnie+$msr;
}

if($abidjan_terminal!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('ABIDJAN TERMINAL'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($abidjan_terminal,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_compagnie=$total_frais_compagnie+$abidjan_terminal;
}

if($waybill!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('WAYBILL'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($waybill,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_compagnie=$total_frais_compagnie+$waybill;
}

if($surpoids!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('SURPOIDS'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($surpoids,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_compagnie=$total_frais_compagnie+$surpoids;
}

if($detention_container!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('DETENTION CONTAINER'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($detention_container,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_compagnie=$total_frais_compagnie+$detention_container;
}

if($expedition_dhl!=0)
{
	//Element// 
	$pdf->Cell($width_cell[0],7,utf8_decode('EXPEDITION DHL'),0,0,'L',true);
	$pdf->Cell($width_cell[1],7,number_format($expedition_dhl,0,',',' ').' XOF',0,1,'R',true);
	//Element//
	$total_frais_compagnie=$total_frais_compagnie+$expedition_dhl;
}

$pdf->SetFont('Arial','B',8);
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('TOTAL FRAIS COMPAGNIE'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,number_format($total_frais_compagnie,0,',',' ').' XOF',0,1,'R',true);


//Element//
$pdf->Ln(3);
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('HAD'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,''.number_format($had_exp,0,',',' ').' XOF',0,1,'R',true);
//Element//
//Element// 
/*
$pdf->Cell($width_cell[0],7,utf8_decode('BC'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,''.number_format(0.35*floatval($had),0,',',' ').' XOF',0,1,'R',true);
*/
//Element//
$net_a_payer=$total_transit_douane+$total_frais_phyto+$total_frais_compagnie+$total_frais_transport;
//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('MONTANT HT'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,''.number_format($net_a_payer,0,',',' ').' XOF',0,1,'R',true);
//Element//

//Element// 
/*
$pdf->Cell($width_cell[0],7,utf8_decode('TVA (18%)'),0,0,'R',true);
$pdf->Cell($width_cell[1],7,''.number_format(0.18*$had,0,',',' ').' XOF',0,1,'R',true);
*/
//Element//

//Element// 
$pdf->Cell($width_cell[0],7,utf8_decode('NET A PAYER'),1,0,'R',true);
$pdf->Cell($width_cell[1],7,''.number_format($had_exp+$net_a_payer,0,',',' ').' XOF',1,1,'R',true);
//Element//

		
$pdf->SetTextColor(0,0,0);
$width_cell=array(36,78,40,40);
$pdf->SetFont('Arial','B',10);
//Couleur d'arrère plan de l'en-tête//
$pdf->SetFillColor(193,229,252);

//EN-TETE /// 

//Colonne 1 //

//// FIN EN-TETE ///////
$pdf->SetFont('Arial','',8);
//Couleur arriere plan en-tête//
$pdf->SetFillColor(235,236,236); 
//Pour donner des couleurs d'arrière plan alternatives// 
$fill=false;

//$pdf->SetWidths(array(18,80,20,20,52));

$pdf->Ln(8);

  
$pdf->Ln(149);
$pdf->Line(10, 275, 200, 275);
			
//Sauvegarde du fichier PDF généré
$pdf->Output($pdffilename);
			
echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=$pdffilename'>";

?>