
<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../../connex.php');


$ref_dos=$_GET['ref_dos'];

$_SESSION['ref_dos']=$ref_dos;

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
$transport_deja_paye=$info['transport_deja_paye'];
$montant_transport=$info['montant_transport'];
$date_depart_expedition=$info['date_depart_expedition'];
$date_arrivee=$info['date_arrivee'];
$pays_provenance=$info['pays_provenance'];
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
$ts_douane=$info['ts_douane'];
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
$api=$info['api'];
$nature=$info['nature'];
$description_dossier=$info['description_dossier'];

$r_num_declaration=$info['r_num_declaration'];
$r_mode_paiement=$info['r_mode_paiement'];
$r_liquidation=$info['r_liquidation'];
$r_num_quittance=$info['r_num_quittance'];
$r_dt=$info['r_dt'];
$r_sydam=$info['r_sydam'];
$r_agio=$info['r_agio'];
$r_ts_douane=$info['r_ts_douane'];
$r_bsc=$info['r_bsc'];
$r_api=$info['r_api'];
$r_assurance=$info['r_assurance'];
$r_certificat_phyto=$info['r_certificat_phyto'];
$r_magasinage=$info['r_magasinage'];
$r_manutention=$info['r_manutention'];
$r_echange_bl=$info['r_echange_bl'];
$r_surestarie=$info['r_surestarie'];
$r_caution=$info['r_caution'];
$r_livraison=$info['r_livraison'];
$r_transport_agent=$info['r_transport_agent'];
$r_commission=$info['r_commission'];
$r_retrait_documentaire=$info['r_retrait_documentaire'];

$r_acconage=$info['r_acconage'];

$mail_recup_tc_caution=$info['mail_recup_tc_caution'];
$envoi_mail_recup_tc_caution=$info['envoi_mail_recup_tc_caution'];
$recuperation_bmc_caution=$info['recuperation_bmc_caution'];
$fichier_recuperation_bmc_caution=$info['fichier_recuperation_bmc_caution'];
$demande_remboursement_caution=$info['demande_remboursement_caution'];
$fichier_demande_remboursement_caution=$info['fichier_demande_remboursement_caution'];
$cheque_caution=$info['cheque_caution'];
$fichier_cheque_caution=$info['fichier_cheque_caution'];
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



$requete=" SELECT * FROM dossier_exp WHERE id_dossier!='' ";
$sqlQuery=$con->query($requete);
$nb_colis 	= $sqlQuery->rowCount();
$num_bl=$nb_colis+1;


$type_transit_id=$info['type_transit_id'];
if($type_transit_id==1)
{
    $icon='<i style="color:#f34e4e; font-size:35px;" class="fa-solid fa-ship"></i>';
}
else if($type_transit_id==2)
{
    $icon='<i style="color:#f34e4e; font-size:35px;" class="fa-solid fa-plane-departure"></i>';
}
else
{
    $icon='<i style="color:#f34e4e; font-size:35px;" class="fa-solid fa-question"></i>';
}

$inf1=$con->prepare('SELECT * FROM dossier_exp LEFT JOIN membre_dossier ON dossier_exp.time_dossier=membre_dossier.dossier_time_membre LEFT JOIN utilisateur ON membre_dossier.utilisateur_secur_dossier=utilisateur.secur WHERE id_dossier=:A');
$inf1->execute(array('A'=>$ref_dos));

$equipe='';
while($info1=$inf1->fetch())
{
    $equipe.='<li>'.$info1['nom_utilisateur'].'</li>';
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php include('../titre_ent_1.php'); ?> | Détails dossier exportation</title>

    <?php include('../meta.php'); ?>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="../assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="../assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <!-- plugin css -->
    <link href="../assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet">
    <!-- One of the following themes -->
    <link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/classic.min.css"/> <!-- 'classic' theme -->
    <link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/monolith.min.css"/> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/nano.min.css"/> <!-- 'nano' theme -->
    <!-- Bootstrap Css -->
    <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!--Intégration de jquery/Ajax-->
    <script type="text/javascript" src="../../js/jquery_1.7.1_jquery.min.js"></script>
    <script type="text/javascript" src="js_export/function.js"></script> 
    <style> 
        .nav-link.active {
            color: #495057;
            background-color: blue;
            border-color: #e2e5e8 #e2e5e8 #fff;
        }
    </style> 
</head>

    
    <body>

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                     <!-- LOGO -->
                     <div class="navbar-brand-box">
                        <a href="../accueil.php" class="logo logo-dark">
                            <span class="logo-lg">
                                <?php include('../titre_ent.php'); ?>
                            </span>
                        </a>

                        <a href="../accueil.php" class="logo logo-light">
                            <span class="logo-lg">
                                <?php include('../titre_ent.php'); ?>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                </div>

                <div class="d-flex">

                     <!--Notifications-->
                     <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i style="color:#fff;" class="icon-sm" data-feather="bell"></i>
                            <span style="background-color:red; border-color:#3e58ff;" class="noti-dot bg-"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-15"> Notifications </h5>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small"> Marquer comme lu</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 250px;">
                                <h6 class="dropdown-header bg-light">Demandes en cours de saisie</h6>
                           

                                <?php
                                    $afic=$con->prepare('SELECT * FROM besoin LEFT JOIN utilisateur ON utilisateur.secur=besoin.demandeur_secur WHERE id_besoin!="" AND decaisse=0 AND etat_besoin=0 ORDER BY id_besoin DESC ');
                                    $afic->execute();

                                    while($iafic=$afic->fetch())
                                    {

                                                ?>

                                <a href="besoin.php" class="text-reset notification-item">
                                    <div class="d-flex border-bottom align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="avatar-sm me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="uil-shopping-basket"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1"><?php echo stripslashes($iafic['objet_demande']); ?></h6>
                                            <div class="text-muted">
                                                <p class="mb-1 font-size-13">Cette demande est encore en cours de saisie.</p>
                                                <p class="mb-0 font-size-10 text-uppercase fw-bold"><i class="mdi mdi-clock-outline"></i> Depuis le <?php echo date("d/m/Y à H:i:s", strtotime($iafic['date_creat_fiche'])); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            <?php } ?>

                            </div>
                            <div class="p-2 border-top d-grid">
                                <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)"> 
                                    <i class="uil-arrow-circle-right me-1"></i> <span>Continuer la saisie..</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--/Fin notifications-->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <?php if($_SESSION['photo_site']!=''){ ?>
                            <img class="rounded-circle header-profile-user" src="../photo/<?php echo $_SESSION['photo_site']; ?>" alt="Photo de profil"/>
							<?php }else{ ?> 
							<img class="rounded-circle header-profile-user" src="../photo/profile-2398782.png" alt="Photo de profil">
							<?php } ?> 
                            <span class="ms-2 d-none d-sm-block user-item-desc">
                                <span class="user-name"><?php echo $_SESSION['nom_utilisateur_site']; ?></span>
                                <span class="user-sub-title"><?php echo $_SESSION['nom_type_groupe']; ?></span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <a class="dropdown-item" href="../profil/profil.php"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                            
                            <a class="dropdown-item" href="../deconex.php"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Déconexion</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
          
   <!-- ========== Left Sidebar Start ========== -->
   <div class="vertical-menu">

<!-- LOGO -->
<div class="navbar-brand-box">
    <a href="accueil.php" class="logo logo-dark">
        <span class="logo-lg">
            <?php include('../titre_ent.php'); ?>
        </span>
    </a>

    <a href="accueil.php" class="logo logo-light">
        <span class="logo-lg">
            <?php include('../titre_ent.php'); ?>
        </span>
     
    </a>
</div>

<button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
    <i class="fa fa-fw fa-bars"></i>
</button>



<div data-simplebar class="sidebar-menu-scroll">



    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="../accueil.php" class="active">
                    <i class="icon nav-icon fa fa-home"></i>
                    <span class="menu-item">Dashboard</span>
                </a>
            </li>

                
            <?php if($_SESSION['acces_client']==1 ){ ?>
            <li>
                <a href="../client/client.php">
                    <i class="icon nav-icon fa fa-users" ></i>
                    <span class="menu-item" data-key="t-email">Clients</span>
                </a>
            </li>
            <?php } ?>
            
           <?php if($_SESSION['acces_demande_decaissement']==1 ){ ?>
            <li>
                <a href="../demande_decaissement/demande_decaissement.php">
                    <i class="icon nav-icon fa fa-money-bills" ></i>
                    <span class="menu-item" data-key="t-email">Demande de décaissement</span>
                </a>
            </li>
            <?php } ?>
            
            <?php if($_SESSION['acces_caisse']==1 ){ ?>
            <li>
                <a href="../caisse/caisse.php">
                    <i class="icon nav-icon fas fa-cash-register" ></i>
                    <span class="menu-item" data-key="t-email">Caisse</span>
                </a>
            </li>
            <?php } ?>
            
            <?php if($_SESSION['acces_comptabilite']==1 ){ ?>
            <li>
                <a href="javascript:void();" class="has-arrow">
                    <i class="fa fa-balance-scale" data-feather="briefcase_"></i>
                    <span class="menu-item" data-key="t-projects">Comptabilité</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="../reglement_fournisseur/reglement_fournisseur.php" data-key="t-p-grid">Reglement Fournisseurs</a></li>
                    <li><a href="../reglement_client/reglement_client.php" data-key="t-p-list">Reglement clients</a></li>
                    <li><a href="../facture_normalise/facture_normalise.php" data-key="t-p-list">Factures normalisées</a></li>
                </ul>
            </li>
            <?php } ?>

            <?php if($_SESSION['acces_dossier']==1 ){ ?>
            <li>
                <a href="javascript:void();" class="has-arrow">
                    <i class="fa fa-folder" data-feather="briefcase_"></i>
                    <span class="menu-item" data-key="t-projects">Dossiers clients</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="../dossier/dossier_import.php" data-key="t-p-grid">Import</a></li>
                    <li><a href="../dossier_exp/dossier_export.php" data-key="t-p-list" style="background-color:#251f75; color:#fff;">Export</a></li>
                    <!--<li><a href="../dossier/etat_codage.php" data-key="t-p-list">Etat de codage</a></li>-->
                </ul>
            </li>
            <?php } ?>
            <?php if($_SESSION['acces_groupage']==1 ){ ?>
            <li>
                <a href="../groupage/groupage.php">
                    <i class="icon nav-icon fa fa-globe"></i>
                    <span class="menu-item" data-key="t-email">Groupage</span>
                </a>
            </li>
            <?php } ?>
            
             <?php if($_SESSION['acces_autre_envoi']==1 ){ ?>
            <li>
                <a href="../autre_envoi/autre_envoi.php">
                    <i class="icon nav-icon fa fa-share"></i>
                    <span class="menu-item" data-key="t-email">Autre envoi</span>
                </a>
            </li>
            <?php } ?>  

     <?php if($_SESSION['acces_autre_envoi_france']==1 ){ ?>
                        <li>
                            <a href="javascript:void();" class="has-arrow">
                                <i class="fa fa-plane" data-feather="briefcase_"></i>
                                <span class="menu-item" data-key="t-projects">STT International</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a a href="../autre_envoi_france/autre_envoi_france.php" data-key="t-p-grid"> Colis accompagnés</a></li>
                                <li><a href="../autre_envoi_france/autre_envoi_france.php" data-key="t-p-list"> Colis DHL</a></li>
                                <li><a href="../autre_envoi_france/autre_envoi_france.php" data-key="t-p-list"> Colis Fret</a></li>
                                <li><a href="../autre_envoi_france/autre_envoi_france.php" data-key="t-p-list"> Colis Maritime</a></li>
                            </ul>
                        </li>
                        <?php } ?>

            <?php if($_SESSION['acces_finance']==1 ){ ?>
            <li>
                <a href="javascript:void();" class="has-arrow">
                    <i class="fa fa-credit-card" data-feather="briefcase_"></i>
                    <span class="menu-item" data-key="t-projects">Finances</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="../encaissement/encaissement.php" data-key="t-p-grid"> Encaissement</a></li>
                    <li><a href="../decaissement/decaissement.php" data-key="t-p-list"> Décaissement</a></li>
                    <li><a href="../declaration/declaration.php" data-key="t-p-list"> Déclaration</a></li>
                </ul>
            </li>
            <?php } ?>


            <?php if($_SESSION['acces_rh']==1 ){ ?>
            <li>
                <a href="../personnel/personnel.php" class="active">
                    <i class="icon nav-icon fa fa-user"></i>
                    <span class="menu-item">Gestion du personnel</span>
                </a>
            </li>
            <?php } ?>
            
            <li>
                <a href="../rapport/rapport.php" class="active">
                    <i class="icon nav-icon fa fa-file-text"></i>
                    <span class="menu-item">Rapport journalier</span>
                </a>
            </li>
                    
            <li class="menu-title">Sécurité</li>

            <li>
                <a href="../profil/profil.php">
                    <i class="icon nav-icon fa fa-user-circle"></i>
                    <span class="menu-item">Profile</span>
                </a>
            </li>
            <?php if($_SESSION['acces_secur']==1 ){ ?>
            <li>
                <a href="../utilisateur/utilisateur.php">
                    <i class="icon nav-icon fa fa-users"></i>
                    <span class="menu-item">Utilisateur</span>
                </a>
            </li>
            <li>
                <a href="../historique/historique.php">
                    <i class="icon nav-icon fa fa-file-excel"></i>
                    <span class="menu-item">Traçabilité</span>
                </a>
            </li>
            <?php } ?>
         
        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Détails du dossier d'exportation</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dossier</a></li>
                                            <li class="breadcrumb-item active">Détails dossier</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <div class="avatar" style="background-color:">
                                                            
                                                                <?php echo $icon; ?>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <div class="text-muted">
                                                            <h5 class="font-size-16 mb-1">Dossier N° <?php echo $num_dossier; ?></h5>
                                                            <p class="mb-0">Client : <b><?php echo $nom_client; ?></b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col

                                            <div class="col-auto">
                                                <div>
                                                    <div class="d-flex flex-wrap align-items-start justify-content-md-end gap-2 mb-3">
                                                        <div class="dropdown">
                                                            <a class="btn btn-link text-dark dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="uil uil-ellipsis-h"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="#">Classeur Excel</a></li>
                                                                <li><a class="dropdown-item" href="#">Fichier PDF</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="mt-3">
                                                    <ul class="text-muted">
                                                        <label><?php echo $nom_dossier; ?> | service <?php echo $lib_service; ?></label>
                                                        <br/>
                                                        <label>Equipe en charge du dossier</label>
                                                        <?php echo $equipe; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col -->

                                            <div class="col-lg-7">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="d-flex align-items-center mt-4">
                                                            <div class="flex-shrink-0 me-3">
                                                                <i class="uil uil-calendar-alt text-danger" style="font-size:30px;"></i>
                                                            </div>
                                                            <div class="flex-grow-1" style="font-size:15px;">
                                                                <h5 class="font-size-12 mb-1">Date de départ</h5>
                                                                <p class="text-muted mb-0" id="aff_date_depart_expedition"> <?php echo $date_depart_expedition; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                    <!--
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="d-flex align-items-center mt-4">
                                                            <div class="flex-shrink-0 me-3">
                                                                <i class="uil uil-plane-arrival text-danger" style="font-size:30px;"></i>
                                                            </div>
                                                            <div class="flex-grow-1" style="font-size:15px;">
                                                                <h5 class="font-size-12 mb-1">Manifeste</h5>
                                                                <p class="text-muted mb-0" id="aff_manifeste"> <?php //echo $manifeste; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    -->
                                                    <!-- end col -->
                                                   
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="d-flex align-items-center mt-4">
                                                            <div class="flex-shrink-0 me-3">
                                                                <i class="uil uil-file-check-alt text-danger" style="font-size:30px;"></i>
                                                            </div>
                                                            <div class="flex-grow-1" style="font-size:15px;">
                                                                <h5 class="font-size-12 mb-1">N° Déclaration</h5>
                                                                <p class="text-muted mb-0" id="aff_num_declaration"> <?php echo $r_num_declaration; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="d-flex align-items-center mt-4">
                                                            <div class="flex-shrink-0 me-3">
                                                                <i class="uil uil-money-withdrawal text-danger" style="font-size:30px;"></i>
                                                            </div>
                                                            <div class="flex-grow-1" style="font-size:15px;">
                                                                <h5 class="font-size-12 mb-1">Liquidation</h5>
                                                                <p class="text-muted mb-0" id="aff_liquidation"> <?php echo $r_liquidation; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                              
                                                    <!-- end col -->
                                                </div><!-- end row -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->

                                        <div class="mt-3">
                                             <!-- Nav tabs -->
                                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab">Aperçu global</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#transport" role="tab">Transport & Avis d'arrivée TC</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#cotation" role="tab">Cotation</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#documentation" role="tab">Documentation</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#formalites_douanieres" role="tab">Formalités douanières et compagnie</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#tab_livraison" role="tab">Livraison</a>
                                                </li>
                                                <?php if($type_transit_id==1){  ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#suivi_caution" role="tab">Suivi de caution</a>
                                                </li>
                                                <?php } ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#observation" role="tab">Observations</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- en card -->

                                <div class="tab-content">
                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-3 col-sm-6">
                                                        <div class="card border shadow-none">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="avatar-sm">
                                                                            <div class="avatar-title bg-light text-primary rounded-circle font-size-18">
                                                                            <!--<i class="uil uil-list-ul"></i>-->
                                                                                <img src="../ico_app/Transport.png" style="width:30px; height:30px;" alt="Transport et avis d'arrivée TC">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <p class="mb-1 text-truncate text-muted" style="color:#251f75;">Transport et avis d'arrivée TC</p>
                                                                        <div class="row">&nbsp;</div>
                                                                        <span class="font-size-16 mb-0">LTA : </span><b><?php echo $num_connaissement; ?></b></br> 
                                                                        <span class="font-size-16 mb-0">N° Vol : </span><b><?php echo $num_voyage; ?></b> </br>
                                                                        <span class="font-size-16 mb-0">Poids Brute : </span><b><?php echo $masse_brute; ?> kg</b></br>
                                                                        <span class="font-size-16 mb-0">Pays de destination : </span><b><?php echo $pays_provenance; ?> </b></br>
                                                                        <span class="font-size-16 mb-0" style="text-decoration:underline;">Container(s) </span></br>
                                                                        <ul class="list-group">
                                                                            <?php 
                                                                            
                                                            $cont=$con->prepare('SELECT * FROM container_exp WHERE dossier_id_container=:A AND num_container!="" ');
                                                            $cont->execute(array('A'=>$ref_dos));

                                                            while($icont=$cont->fetch())
                                                            {
                                                                echo '<li class="list-group-item">'.$icont['num_container'].'</li>';
                                                            }
                                                                            
                                                                            ?>
                                                                            
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col -->
                                                    <div class="col-xl-3 col-sm-6">
                                                        <div class="card border shadow-none">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="avatar-sm">
                                                                            <div class="avatar-title bg-light text-primary rounded-circle font-size-18">
                                                                            <!--<i class="uil uil-list-ul"></i>-->
                                                                                <img src="../ico_app/Cotation.png" style="width:30px; height:30px;" alt="Cotation">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <p class="mb-1 text-truncate text-muted">Cotation</p>
                                                                        <div class="row">&nbsp;</div>
                                                                        <span class="font-size-16 mb-0">Proforma N° </span><b style="font-size:18px;">00<?php echo $ref_dos; ?></b></br>
                                                                        <span class="font-size-16 mb-0">Montant de la cotation </span><b style="color:green;"><?php echo number_format($_SESSION['net_a_payer']/*+(floatval($had))*/,0,',',' '); ?> FCFA</b></br>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                        <div class="col-xl-12 col-sm-12">
                                                        <div class="card border shadow-none">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="avatar-title bg-light text-primary rounded-circle font-size-18">
                                                                            <!--<i class="uil uil-list-ul"></i>-->
                                                                            <img src="../ico_app/Formalite.png" style="width:30px; height:30px;" alt="Cotation">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <p class="mb-1 text-truncate text-muted">Formalités douanières et compagnie</p>
                                                                        <span class="font-size-16 mb-0">Total Dépenses : </span><b style="color:green;"><?php //echo number_format($_SESSION['total_formalite'],0,',',' '); ?> FCFA</b></br>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body-->
                                                        </div><!-- end card -->
                                                    </div> <!-- end col -->
                                                    </div><!-- end col -->
                                                    <div class="col-xl-6 col-sm-6">
                                                        <div class="card border shadow-none">
                                                            <div class="card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="avatar-sm">
                                                                            <div class="avatar-title bg-light text-primary rounded-circle font-size-18">
                                                                                <!--<i class="uil uil-list-ul"></i>-->
                                                                                <img src="../ico_app/Doc.png" style="width:30px; height:30px;" alt="Documentation exportation">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <p class="mb-1 text-truncate text-muted">Documentation</p>
                                                                        <div class="row">&nbsp;</div>
                                                                        
                                                                        <?php            
                                        $list_doc=$con->prepare('SELECT * FROM doc_exp WHERE dossier_id_doc=:A');
                                        $list_doc->execute(array('A'=>$_SESSION['ref_dos']));

                                        while($idoc=$list_doc->fetch())
                                        {
                                                            ?>
                                              
                                        
                                            <a target="_blank" href="doc/<?php echo $idoc['lib_doc']; ?>" class="text-dark fw-medium"><i style="color:grey;" class="fas fa-file-alt align-middle text-primary me-2"></i> <?php echo $idoc['lib_doc']; ?></a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                           
                                        <?php
                                        }
                                        ?>
                                                                            
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col -->
                                                 
                                                </div><!-- end row -->

                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="card border shadow-none h-100 mb-lg-0">
                                                            <div class="card-body">
                                                                <h5 class="card-title mb-4">Description</h5>

                                                                <div class="text-muted">
                                                                    <p>
                                                                        <?php echo $description_dossier; ?>
                                                                    </p>
                                                                </div>
                                                            </div><!-- end card body -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col -->
                                                    <div class="col-lg-4">
                                                        <div class="card border shadow-none h-100 mb-lg-0">
                                                            <div class="card-body">
                                                                <h5 class="card-title mb-3">Etat d'avancement</h5>

                                                                <div>
                                                                    <div class="py-3">
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="font-size-14">Documentation</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0">
                                                                                <p class="text-muted mb-0">2/5</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="progress animated-progess custom-progress mt-2">
                                                                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="py-3">
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="font-size-14">Passage</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0">
                                                                                <p class="text-muted mb-0">02/07</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="progress animated-progess custom-progress mt-2">
                                                                            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="py-3">
                                                                        <div class="d-flex">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="font-size-14">Livraison</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0">
                                                                                <p class="text-muted mb-0">02/05</p> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="progress animated-progess custom-progress mt-2">
                                                                            <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col -->
                                                </div><!-- end row -->
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end tab pane -->

                                    <!-- Frais de transport -->

                                    <div class="tab-pane" id="transport" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title">Transport </h5>
                                                    </div>
                                                </div>

                                                <div data-simplebar  style="max-height: 325px;">
                                                    <!-- transport_body -->

                                            <form id="form_transport">
                                            <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <label for="transport_deja_paye" class="">Total Fret Payé par le client</label>
                                                    <input type="checkbox" id="transport_deja_paye" name="transport_deja_paye" switch="success" <?php if($transport_deja_paye==1){ echo ' checked '; }; ?> />
                                                    <label for="transport_deja_paye" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                </div>
                                                <div class="row">&nbsp;</div>
                                                <div class="d-flex flex-wrap gap-2" id="grp_tp">
                                                    Montant (FCFA)
                                                    <input required class="form-control" type="text" id="montant_transport" name="montant_transport" value="<?php echo $montant_transport; ?>"/>
                                                    <label for="" class=""></label>
                                                </div>
                                            </div>
                                            <!-- 
                                            <div class="col-md-3">
                                                <h5 class="font-size-14 mb-3"></h5>
                                                <div class="d-flex flex-wrap gap-2">
                                                    &nbsp;
                                                </div>
                                                <div class="row">&nbsp;</div>
                                                <div class="d-flex flex-wrap gap-2" id="grp_tp">
                                                    SYDAM/MANIFESTE
                                                    <input required class="form-control" type="text" id="manifeste" name="manifeste" value="<?php //echo $manifeste; ?>"/>
                                                    <label for="" class=""></label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                              &nbsp;
                                            </div>
                                            </div>
                                            -->
                                            </form>
                                                    <!-- /transport_body -->
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title">Exportation</h5>
                                                    </div>
        
                                                </div>
                                                <div class="row">&nbsp;</div>  <div class="row">&nbsp;</div>
                                                <div class="row">
                                       
				
                                                            
                                                            <form name="form_depense" id="form_depense" class="form-horizontal" action="#">
                                                            
                                                            <div class="row">
                                                            
                                                            
                                                            <div data-simplebar  style="max-height: 325px;">
                                                        <!-- container_body -->

                                                        <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="nature">Nature du colis</label>
                                                            <input type="text" class="form-control" id="nature" name="nature" placeholder="Nature du colis" value="<?php echo $nature; ?>" >
                                                        </div>
                                                        </div>

                                                        <div class="row">

                                                        <div class="col-md-3">
                                                            <label for="date_depart_expedition">Date de départ</label>
                                                            <input type="date" class="form-control" id="date_depart_expedition" name="date_depart_expedition" placeholder="Date de départ" value="<?php echo $date_depart_expedition; ?>" >
                                                        </div>

                                                        <div class="col-md-3">
                                                                <label for="pays_provenance">Armateur</label>
                                                                <input type="text" class="form-control" id="transporteur" name="transporteur" placeholder="Transporteur" value="<?php echo $transporteur; ?>">
                                                        </div>
                                                                                                         
                                                        <div class="col-md-3">
                                                                <label for="pays_provenance">Pays de destination</label>
                                                                <input type="text" class="form-control" id="pays_provenance" name="pays_provenance" placeholder="Pays de destination" value="<?php echo $pays_provenance; ?>">
                                                        </div>

                                                        <div class="col-md-3">
                                                                <label for="pays_provenance">Port de déchargement</label>
                                                                <input type="text" class="form-control" id="port_dechargement" name="port_dechargement" placeholder="Port de déchargement" value="<?php echo $port_dechargement; ?>">
                                                        </div>

                                                                                                   
                                                        <div class="row">&nbsp;</div>  <div class="row">&nbsp;</div>

                                                        <div class="row">
                                                     
                                                        <div class="col-md-4">
                                                        <label for="floatingInput">N° vol/Voyage/Transport Routier </label>
                                                            <input type="text" class="form-control" id="num_voyage" name="num_voyage" placeholder="N° Vol/Voyage/Transport Routier" value="<?php echo $num_voyage; ?>">
                                                        
                                                        </div>
                                                        <div class="col-md-4">
                                                        <label for="floatingInput">Identification du moyen de transport </label>
                                                            <input type="text" class="form-control" id="code_bateau" name="code_bateau" placeholder="Identification du moyen de transport" value="<?php echo $code_bateau; ?>">
                                                        
                                                        </div>

                                                        <div class="col-md-4">
                                                        <label for="num_connaissement">N° Lettre de Transport Aérien/Connaissement/CMR </label>
                                                            <input type="text" class="form-control" id="num_connaissement" name="num_connaissement" placeholder="N° Lettre de Transport Aérien/Connaissement/CMR" value="<?php echo $num_connaissement; ?>">
                                                        
                                                        </div>

                                                        <div class="row">&nbsp;</div>  <div class="row">&nbsp;</div>

                                                        <div class="row">
                                                        <div class="col-md-3">
                                                        <label for="floatingInput">Masse Nette (kg)  </label>
                                                            <input type="text" class="form-control" id="masse_net" name="masse_net" placeholder="0" value="<?php echo $masse_net; ?>">
                                                            
                                                        </div>              
                                                        <div class="col-md-3">
                                                        <label for="floatingInput">Masse Brute (kg)  </label>
                                                            <input type="text" class="form-control" id="masse_brute" name="masse_brute" placeholder="0" value="<?php echo $masse_brute; ?>">
                                                    
                                                        </div>
                                                        <div class="col-md-3">
                                                        <label for="floatingInput"> Total Colis  </label>
                                                            <input type="text" class="form-control" id="total_colis" name="total_colis" placeholder="0" value="<?php echo $total_colis; ?>">
                                                        
                                                        </div>
                                                        </div>

                                                        <div class="row">
                                                            <!--
                                                        <div class="col-md-3">
                                                        <label for="floatingInput"> Lieu de livraison   </label>
                                                            <input type="text" class="form-control" id="total_colis" name="total_colis" placeholder="Lieu de livraison" value="">
                                                        
                                                        </div>  
                                                     
                                                        <div class="col-md-3">
                                                        <label for="floatingInput">Identification du véhicule de livraison  </label>
                                                            <input type="text" class="form-control" id="total_colis" name="total_colis" placeholder="Véhicule de livraison" value="<?php //echo $total_colis; ?>">
                                                        
                                                        </div>
                                                        -->
                                                        <div class="col-md-6">
                                                        <label for="floatingInput">Destinataire </label>
                                                            <input type="text" class="form-control" id="destinataire" name="destinataire" placeholder="Destinataire" value="<?php echo $destinataire; ?>">
                                                        
                                                        </div>

                                                        <div class="col-md-6">
                                                        <label for="floatingInput">Lieu d'empotage </label>
                                                            <input type="text" class="form-control" id="lieu_empotage" name="lieu_empotage" placeholder="Lieu d'empotage" value="<?php echo $lieu_empotage; ?>">
                                                        
                                                        </div>

                                                        </div>


                                                        </div>
                                                        <!-- /container_body -->     
                                                    
                                                            </div>
                                                    
                                                            <div class="row">&nbsp;</div>
                                                            </form>
                                                    </div>
                                                </div>


                                                <div class="row">&nbsp;</div>
                                                <!-- Liste containers -->
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title">Container</h5>
                                                    </div>
                                                  
                                                </div>

                                                <div>
                                                    <button  id="ajout_container" data-toggle="modal" data-target="#myModal_container" style="margin:10px; " class="btn btn-info"><i class="fa fa-add"></i> Ajouter un container</button>
                                                </div>
                                               

                                                <div class="gridjs-wrapper" style="height: auto;">
                                                        <!-- Liste container -->
                                                        <div class="chargement" style="text-align:center; margin-top:70px"></div>
						                                <div class="aff_container"></div>
                                                        <!-- /Liste container -->
                                                </div>
                                                <!-- /Liste containers -->
                                                <div class="row">&nbsp;</div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end tab pane -->
                                    </div></div>

                                    <!-- /Frais de transport -->

                                    <div class="tab-pane" id="cotation" role="tabpanel">
                                        <div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <h5 class="card-title">Génération de la cotation</h5>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-md-6">
                                                            <div class="d-flex flex-wrap align-items-start justify-content-end gap-2 mb-3">
                                                                <div>
                                                                <!-- button id="ajout_cotation" data-toggle="modal" data-target="#myModal_cotation" style="margin:10px; " class="btn btn-info"><i class="fa fa-add"></i> Générer la cotation</button -->
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                    <div class="row">
                                                       
                                                     <!--/Aperçu cotation-->
                                                    <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="invoice-title">
                                            <h4 class="float-end font-size-15">Cotation #COT0204 <span class="badge bg-success font-size-12 ms-2">Payée</span></h4>
                                            <div class="mb-4">
                                                Agent en charge du dossier : <b><?php echo $equipe; ?></b>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                    
                                        <!-- end row -->
                                        
                                        <div class="py-2">
                                            <h5 class="font-size-15">Détails de la cotation</h5>

                                          

                                          

                                                        <div class="row">&nbsp;</div><div class="row">&nbsp;</div>

                                                           <!-- Infos Cotation -->
                                               				
	  <form name="form_cotation" id="form_cotation" class="form-horizontal" action="#">
		
		
                <!-- container_body -->

                <hr> <h4>Frais Transport / Charges</h4>  <hr> 
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="fret" name="fret" placeholder="FRET" value="<?php echo $fret ; ?>">
                            <label for="tirage_declaration">FRET </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="fuel_surcharge" name="fuel_surcharge" placeholder="FUEL SURCHARGE (PMY)" value="<?php echo $fuel_surcharge; ?>">
                            <label for="fuel_surcharge">FUEL SURCHARGE (PMY)</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="irc" name="irc" placeholder="IRC (INSURANCE RISK CHARGES)" value="<?php echo $irc; ?>" >
                            <label for="irc">IRC (INSURANCE RISK CHARGES)  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="pmp" name="pmp" placeholder="TAXE PESEE (PMP)" value="<?php echo $pmp ; ?>">
                            <label for="agio">TAXE PESEE (PMP)  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="avisecure" name="avisecure" placeholder="AVISECURE" value="<?php echo $avisecure ; ?>">
                            <label for="agio">AVISECURE  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="frais_lta" name="frais_lta" placeholder="FRAIS LTA" value="<?php echo $frais_lta ; ?>">
                            <label for="agio">FRAIS LTA  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="frais_nas" name="frais_nas" placeholder="FRAIS NAS" value="<?php echo $frais_nas ; ?>">
                            <label for="agio">FRAIS NAS  </label>
                        </div>
                    </div>
                    <div class="row">
                        <label for="floatingInput">Total frais transport : <b style="color:green;" id="total_frais_transport"></b></label>
                    </div>
                </div> 
                
                <hr> <h4>Frais transit / douane</h4>  <hr> 

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="tirage_declaration" name="tirage_declaration" placeholder="TIRAGE DECLARATION" value="<?php echo $tirage_declaration ; ?>">
                            <label for="tirage_declaration">TIRAGE DECLARATION </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="sydam" name="sydam" placeholder="SYDAM" value="<?php echo $sydam; ?>">
                            <label for="sydam">SYDAM  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="ts" name="ts" placeholder="TS" value="<?php echo $ts; ?>" >
                            <label for="fiche_assurance">TS  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="co_eur1" name="co_eur1" placeholder="CO /EUR1" value="<?php echo $co_eur1 ; ?>">
                            <label for="co_eur1">CO / EUR1  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fiche_empotage" name="fiche_empotage" placeholder="FICHE EMPOTAGE" value="<?php echo $fiche_empotage; ?>">
                            <label for="fiche_empotage">FICHE EMPOTAGE  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="intervention_douane" name="intervention_douane" placeholder="INTERVENTION DOUANE" value="<?php echo $intervention_douane; ?>">
                            <label for="intervention_douane">INTERVENTION DOUANE  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="redressement" name="redressement" placeholder="REDRESSEMENT" value="<?php echo $redressement; ?>">
                            <label for="redressement">REDRESSEMENT  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="visite_douane" name="visite_douane" placeholder="VISITE DOUANE" value="<?php echo $visite_douane; ?>">
                            <label for="visite_douane">VISITE DOUANE  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="manutention" name="manutention" placeholder="MANUTENTION" value="<?php echo $manutention; ?>">
                            <label for="manutention">MANUTENTION  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="dgd" name="dgd" placeholder="DGD" value="<?php echo $dgd; ?>">
                            <label for="dgd">DGD  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="absence_d3" name="absence_d3" placeholder="ABSENCE D3" value="<?php echo $absence_d3; ?>">
                            <label for="dgd">ABSENCE D3  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="amende_douane" name="amende_douane" placeholder="AMENDE DOUANE" value="<?php echo $amende_douane; ?>">
                            <label for="amende_douane">AMENDE DOUANE </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="acceptation_nas" name="acceptation_nas" placeholder="ACCEPTATION NAS" value="<?php echo $acceptation_nas; ?>">
                            <label for="acceptation_nas">ACCEPTATION NAS </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="tc_supplementaire" name="tc_supplementaire" placeholder="TC SUPPLEMENTAIRE" value="<?php echo $tc_supplementaire; ?>">
                            <label for="tc_supplementaire">TC SUPPLEMENTAIRE </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="rectf" name="rectf" placeholder="RECTF" value="<?php echo $rectf; ?>">
                            <label for="rectf">RECTF </label>
                        </div>
                    </div>
                    <div class="row">
                        <label for="floatingInput">Total frais transit / douane : <b style="color:green;" id="total_frais_transit"></b></label>
                    </div>
                </div> 

                <hr> <h4>Frais Phyto</h4>  <hr> 
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="autorisation_maq" name="autorisation_maq"  placeholder="AUTORISATION MAQ" value="<?php echo $autorisation_maq; ?>" >
                            <label for="autorisation_maq">AUTORISATION DE MISE A QUAI </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="rapport_journalier" name="rapport_journalier"  placeholder="RAPPORT JOURNALIER" value="<?php echo $rapport_journalier; ?>" >
                            <label for="rapport_journalier">RAPPORT JOURNALIER  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="certificat_phytosanitaire" name="certificat_phytosanitaire" placeholder="CERTIFICAT PHYTOSANITAIRE" value="<?php echo $certificat_phytosanitaire; ?>">
                            <label for="certificat_phytosanitaire">CERTIFICAT PHYTOSANITAIRE </label>
                        </div>
                    </div>
                  
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="agent_phyto" name="agent_phyto" placeholder="AGENT PHYTO / TS" value="<?php echo $agent_phyto; ?>">
                            <label for="agent_phyto">Agent phyto / TS </label>
                        </div>
                    </div>
                                   
                    <div class="row">
                        <label for="floatingInput">Total Frais Phyto : <b style="color:green;" id="total_frais_phyto"></b></label>
                    </div>
                </div> 

                <hr> <h4>Frais Compagnie</h4>  <hr> 
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="posit_relevage" name="posit_relevage"  placeholder="POSIT RELEVAGE" value="<?php echo $posit_relevage; ?>" >
                            <label for="posit_relevage">POSIT RELEVAGE </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="edition_eir" name="edition_eir"  placeholder="EDITION EIR" value="<?php echo $edition_eir; ?>" >
                            <label for="edition_eir">EDITION EIR </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pesage_manut" name="pesage_manut"  placeholder="PESAGE/MANUT" value="<?php echo $pesage_manut; ?>" >
                            <label for="pesage_manut">PESAGE/MANUT </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="msr" name="msr"  placeholder="MISE SUR REMORQUE" value="<?php echo $msr; ?>" >
                            <label for="msr">MISE SUR REMORQUE</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="abidjan_terminal" name="abidjan_terminal"  placeholder="ABIDJAN TERMINAL" value="<?php echo $abidjan_terminal; ?>" >
                            <label for="abidjan_terminal">ABIDJAN TERMINAL</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="waybill" name="waybill"  placeholder="DOCUMENTATION / WAYBILL" value="<?php echo $waybill; ?>" >
                            <label for="waybill">DOCUMENTATION / WAYBILL</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="surpoids" name="surpoids"  placeholder="SURPOIDS" value="<?php echo $surpoids; ?>" >
                            <label for="surpoids">SURPOIDS</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="detention_container" name="detention_container"  placeholder="DETENTION CONTAINER" value="<?php echo $detention_container; ?>" >
                            <label for="DETENTION CONTAINER">DETENTION CONTAINER</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="expedition_dhl" name="expedition_dhl"  placeholder="EXPEDITION DHL" value="<?php echo $expedition_dhl; ?>" >
                            <label for="expedition_dhl">EXPEDITION DHL</label>
                        </div>
                    </div>

                    <div class="row">
                        <label for="floatingInput">Total Frais Compagnie : <b style="color:green;" id="total_frais_compagnie"></b></label>
                    </div>
                </div> 

                <hr> <h4>Intervention HT</h4>  <hr> 

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="had_exp" name="had_exp" placeholder="had_exp" value="<?php echo $had_exp; ?>">
                            <label for="had_exp">HAD</label>
                        </div>
                    </div>
                </div>

                <hr> <h4>Total Intervention Transit HT</h4>  <hr> 

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input readonly type="text" class="form-control" id="tva" name="tva" placeholder="TIRAGE DECLARATION" value="0">
                            <label for="floatingInput">TVA (18 %)</label>
                        </div>
                    </div>
                    <div class="row">
                        <label for="net_a_payer">NET A PAYER : <b style="color:green;" id="net_a_payer"></b></label>
                    </div>
                </div> 

                <!-- /container_body -->
                <div class="row">&nbsp;</div>     <div class="row">&nbsp;</div>
      

        <div class="row">&nbsp;</div>
      </form>
                                                <div class="float-end">
                                                    <a target="_blank" href="exportation/pdf/pdf_cotation.php" class="btn btn-info me-1"><i class="fa fa-print"></i> Générer</a>
                                                    &nbsp;
                                                    <?php 
                                                        if($cotation_valide==0 && $cotation_soumise==1 && $_SESSION['acces_cotation_valide']==1){ 
                                                    ?>
                                                    
                                                    <a target="_blank" href="dossier_export/valider_cotation.php" class="btn btn-success me-1"><i class="fa fa-check"></i> Valider</a>
                                                  
                                                    
                                                     <?php 
                                                        } 
                                                     ?>
                                                        &nbsp; 
                                                    <?php 
                                                        if($cotation_soumise==0){ 
                                                    ?>
                                                   
                                                    <a target="_blank" href="dossier_export/soumettre_cotation.php" class="btn btn-success me-1"><i class="fa fa-share"></i> Soumettre</a>
                                                      <?php 
                                                        } 
                                                     ?>
                                                </div>
                                               <!-- /Infos Cotation -->
                                                                            
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div>
                                                    <!--/Aperçu cotation-->
                                                
                                                
                                                    </div><!-- end row -->
                                             
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="documentation" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header bg-transparent border-bottom d-flex">
                                                <h5 class="card-title mb-0">Documentation</h5>

                                            </div>
        
                                            <div class="card-body">
                         
                                                <div class="mt-4">
                                                    <hr class="mt-2">
        
                                                    <div class="table-responsive">
                                                       
                                                    </div>
                                                    <!-- Affichage docs -->
                                                    <div class="row">
                                                        <div class="row col-12">
                                                            <div class="col-md-3">
                                                                <!-- Liste docs -->
                                                                <div class="table-responsive">
                                                        <table class="table align-middle table-nowrap table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Nom</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col" colspan="2">Taille</th>
                                                                </tr><!-- end tr -->
                                                              </thead><!-- end thead -->
                                                            <tbody>

                                                            <?php            
                                        $list_doc=$con->prepare('SELECT * FROM doc_exp WHERE dossier_id_doc=:A');
                                        $list_doc->execute(array('A'=>$_SESSION['ref_dos']));

                                        while($idoc=$list_doc->fetch())
                                        {
                                                            ?>
                                              
                                        <tr>
                                            <td><a target="_blank" href="doc/<?php echo $idoc['lib_doc']; ?>" class="text-dark fw-medium"><i style="color:grey;" class="fas fa-file-alt align-middle text-primary me-2"></i> <?php echo $idoc['lib_doc']; ?></a></td>
                                            <td><?php echo $idoc['date_ajout_doc']; ?></td>
                                            <td><?php echo $idoc['taille_doc']; ?> B</td>
                                        </tr><!-- end tr -->
                                           
                                        <?php
                                        }
                                        ?>
                                                            </tbody><!-- end tbody -->
                                                        </table><!-- end table -->
                                                    </div><!-- end table responsive -->
                                                                <!-- /Liste docs -->
                                                            </div>
                                                            <div class="col-md-9">
                                                            <div class="card">
                                                                <div class="card-header justify-content-between d-flex align-items-center">
                                                                    <h4 class="card-title">Documents attachés au dossier</h4>
                                                                </div><!-- end card header -->
                                                                <div class="card-body">
                                                                    <div>
                                                                        <form id="form_drop" action="dossier_export/upload_doc.php" class="dropzone">
                                                                            <div class="fallback">
                                                                                <input name="file" type="file" multiple="multiple">
                                                                            </div>
                                                                            <div class="dz-message needsclick">
                                                                                <div class="mb-3">
                                                                                    <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                                                </div>

                                                                                <h4>Glissez-deposez ou cliquez pour ajouter des fichiers.</h4>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card -->
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
                                                    <!-- / Affichage docs -->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <div class="tab-pane" id="formalites_douanieres" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header bg-transparent border-bottom d-flex">
                                                <h5 class="card-title mb-0">Formalités douanières et compagnies de transport (<b style="color:green;" id="montant_reel"></b>) </h5> 
                                            </div>
        
                                            <div class="card-body">
                         
                                                <div class="mt-4">        
                                                    <!-- Affiche formalités douanières -->
                                                    <div class="row">
                                            <div class="col-12">
                                      
                                          
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="r_num_declaration">Numéro Déclaration</label>
                                                  
                                                            <input class="form-control" type="text"  id="r_num_declaration" value="<?php echo $r_num_declaration; ?>">
                                               
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="r_num_declaration">Mode de paiement</label>
                                                        <select id="r_mode_paiement" name="r_mode_paiement" class="form-select">
                                                            <option <?php if($r_mode_paiement==0){ echo ' selected '; } ?> value="0">--Choisir--</option>
                                                            <option <?php if($r_mode_paiement==1){ echo ' selected '; } ?> value="1">Crédit</option>
                                                            <option <?php if($r_mode_paiement==2){ echo ' selected '; } ?> value="2">Comptant</option>
                                                        </select>
                                                    </div>
                                                   
                                                    <div class="col-md-3">
                                                        <label for="r_liquidation">Liquidation</label>
                                                            <input class="form-control" type="text"  id="r_liquidation" value="<?php echo $r_liquidation; ?>">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="r_num_quittance">N° Quittance</label>
                                                            <input class="form-control" type="text"  id="r_num_quittance" value="<?php echo $r_num_quittance; ?>">
                                                    </div>
                                                </div><!-- end row -->

                                                <div class="row">&nbsp;</div>
                                                <hr class="mt-2">
                        
                                                <div class="row">
                                                    
                                                
                                                    <div class="col-md-2">
                                                        <label for="r_fret">FRET</label>
                                                            <input class="form-control" type="number"  id="r_fret" value="<?php echo $r_fret; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_fret">FUEL SURCHARGE (PMY)</label>
                                                            <input class="form-control" type="number"  id="r_fuel_surcharge" value="<?php echo $r_fuel_surcharge; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_irc">IRC (INSURANCE RISK CHARGES)</label>
                                                            <input class="form-control" type="number"  id="r_irc" value="<?php //echo $r_irc; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_pmp">TAXE PESEE</label>
                                                            <input class="form-control" type="number"  id="r_pmp" value="<?php //echo $r_pmp; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_avisecure">AVISECURE</label>
                                                            <input class="form-control" type="number"  id="r_avisecure" value="<?php //echo $r_avisecure; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_frais_lta">FRAIS LTA</label>
                                                            <input class="form-control" type="number"  id="r_frais_lta" value="<?php //echo $r_frais_lta; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_frais_nas">FRAIS NAS</label>
                                                            <input class="form-control" type="number"  id="r_frais_nas" value="<?php //echo $r_frais_nas; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_tirage_declaration">TIRAGE DECLARATION</label>
                                                            <input class="form-control" type="number"  id="r_tirage_declaration" value="<?php //echo $r_tirage_declaration; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_sydam">SYDAM</label>
                                                            <input class="form-control" type="number"  id="r_sydam" value="<?php //echo $r_sydam; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_ts">TS</label>
                                                            <input class="form-control" type="number"  id="r_ts" value="<?php //echo $r_ts; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_co_eur1">CO / EUR1</label>
                                                            <input class="form-control" type="number"  id="r_co_eur1" value="<?php //echo $r_co_eur1; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_fiche_empotage">FICHE EMPOTAGE</label>
                                                            <input class="form-control" type="number"  id="r_fiche_empotage" value="<?php //echo $r_fiche_empotage; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_intervention_douane">INTERVENTION DOUANE</label>
                                                            <input class="form-control" type="number"  id="r_intervention_douane" value="<?php //echo $r_intervention_douane; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_redressement">REDRESSEMENT</label>
                                                            <input class="form-control" type="number"  id="r_redressement" value="<?php //echo $r_redressement; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_visite_douane">VISITE DOUANE</label>
                                                            <input class="form-control" type="number"  id="r_visite_douane" value="<?php //echo $r_visite_douane; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_manutention">MANUTENTION</label>
                                                            <input class="form-control" type="number"  id="r_manutention" value="<?php //echo $r_manutention; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_certificat_phytosanitaire">CERTIFICAT PHYTOSANITAIRE</label>
                                                            <input class="form-control" type="number"  id="r_certificat_phytosanitaire" value="<?php //echo $r_certificat_phytosanitaire; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_dgd">DGD</label>
                                                            <input class="form-control" type="number"  id="r_dgd" value="<?php //echo $r_dgd; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_absence_d3">ABSENCE D3</label>
                                                            <input class="form-control" type="number"  id="r_absence_d3" value="<?php //echo $r_absence_d3; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_amende_douane">AMENDE DOUANE</label>
                                                            <input class="form-control" type="number"  id="r_amende_douane" value="<?php //echo $r_amende_douane; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_acceptation_nas">ACCEPTATION NAS</label>
                                                            <input class="form-control" type="number"  id="r_acceptation_nas" value="<?php //echo $r_acceptation_nas; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_tc_supplementaire">TC SUPPLEMENTAIRE</label>
                                                            <input class="form-control" type="number"  id="r_tc_supplementaire" value="<?php //echo $r_tc_supplementaire; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_rectf">RECTF</label>
                                                            <input class="form-control" type="number"  id="r_rectf" value="<?php //echo $r_rectf; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_autorisation_maq">AUTORISATION DE MISE A QUAI</label>
                                                            <input class="form-control" type="number"  id="r_autorisation_maq" value="<?php //echo $r_autorisation_maq; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_rapport_journalier">RAPPORT JOURNALIER</label>
                                                            <input class="form-control" type="number"  id="r_rapport_journalier" value="<?php //echo $r_rapport_journalier; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_agent_phyto">AGENT PHYTO / TS</label>
                                                            <input class="form-control" type="number"  id="r_agent_phyto" value="<?php //echo $r_agent_phyto; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_posit_relevage">POSIT/RELEVAGE</label>
                                                            <input class="form-control" type="number"  id="r_posit_relevage" value="<?php //echo $r_posit_relevage; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_edition_eir">EDITION EIR</label>
                                                            <input class="form-control" type="number"  id="r_edition_eir" value="<?php //echo $r_edition_eir; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_pesage_manut">PESAGE/MANUT</label>
                                                            <input class="form-control" type="number"  id="r_pesage_manut" value="<?php //echo $r_pesage_manut; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_msr">MISE SUR REMORQUE</label>
                                                            <input class="form-control" type="number"  id="r_msr" value="<?php //echo $r_msr; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_abidjan_terminal">ABIDJAN TERMINAL</label>
                                                            <input class="form-control" type="number"  id="r_abidjan_terminal" value="<?php //echo $r_abidjan_terminal; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_waybill">DOCUMENTATION/WAYBILL</label>
                                                            <input class="form-control" type="number"  id="r_waybill" value="<?php //echo $r_waybill; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_surpoids">SURPOIDS</label>
                                                            <input class="form-control" type="text"  id="r_surpoids" value="<?php //echo $r_surpoids; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_detention_conteneur">DETENTION CONTENEUR</label>
                                                            <input class="form-control" type="text"  id="r_detention_conteneur" value="<?php //echo $r_detention_conteneur; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_expedition_dhl">EXPEDITION DHL</label>
                                                            <input class="form-control" type="text"  id="r_expedition_dhl" value="<?php //echo $r_expedition_dhl; ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <label for="r_autre">Autres</label>
                                                            <input class="form-control" type="number"  id="r_autre" value="<?php //echo $r_autre; ?>">
                                                    </div>
                                                    
                                                    
                                                </div><!-- end row -->


                                                <div class="row">&nbsp;</div>

                                                <div class="float-end">
                                                    <a target="_blank" href="exportation/pdf/pdf_depense.php" class="btn btn-success me-1"><i class="fa fa-print"></i> Générer la facture</a>
                                                </div>
                                        
                                            </div><!-- end col -->
                                        </div><!-- end row -->

                                                    <!-- /Affiche formalités douanières -->
                                                </div>
                                                
                                            </div>


                                    
                                       


                                        </div>
                                        <!-- end card -->
                                    </div>

                                    <div class="tab-pane" id="tab_livraison" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header bg-transparent border-bottom d-flex">
                                                <h5 class="card-title mb-0">Edition du bon de livraison</h5> 
                                            </div>
        
                                            <div class="card-body">
                         
                                                <div class="mt-4">        
                                                    <!-- Affiche livraison -->
                         <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">BON DE LIVRAISON N° <?php echo $num_bl; ?></h4>
                                        <a href="exportation/pdf/pdf_bl.php" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf fa-4X"></i> Générer le bon de livraison <i class="mdi mdi-arrow-right align-middle"></i></a>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="form-label" for="date_edition">Edité le</label>
                                                    <input readonly class="form-control" type="date" id="date_edition" placeholder="Date d'édition" value="<?php echo gmdate('Y-m-d'); ?>">
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label" for="heure_edition">Heure d'édition</label>
                                                    <input readonly class="form-control" type="time" id="heure_edition" placeholder="Heure d'édition" value="<?php echo gmdate('H:i:s'); ?>">
                                                </div>
                                                <div class="col-md-8">
                                                            &nbsp;
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="nom_client_bl">Client</label>
                                                    <input readonly class="form-control" type="text" id="nom_client_bl" placeholder="Nom du client" value="<?php echo $nom_client; ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="nom_fournisseur">Fournisseur</label>
                                                    <input class="form-control" type="text" id="nom_fournisseur" placeholder="Nom du fournisseur" value="<?php echo $nom_fournisseur; ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="num_dossier_bl">Numéro du dossier</label>
                                                    <input readonly class="form-control" type="text" id="num_dossier_bl" placeholder="N° du dossier" value="<?php echo $ref_dos; ?>" >
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label" for="num_declaration_bl">N° de déclaration</label>  
                                                    <input readonly class="form-control" type="text" id="num_declaration_bl" placeholder="N° de déclaration" value="<?php echo $r_num_declaration; ?>" >
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="date_declaration_bl">Date de déclaration</label>
                                                    <input class="form-control" type="date" id="date_declaration_bl" placeholder="Date de déclaration" value="<?php echo $date_declaration_bl; ?>" >
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="num_lta_bl">N° LTA</label>
                                                    <input readonly class="form-control" type="text" id="num_lta_bl" placeholder="N° LTA" value="<?php echo $num_connaissement; ?>" >
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label" for="date_lta_bl">Date LTA</label>
                                                    <input class="form-control" type="date" id="date_lta_bl" placeholder="Date LTA" value="<?php echo $date_lta_bl; ?>" >
                                                </div>
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="nbre_colis_bl">Nombre de colis</label>
                                                    <input readonly class="form-control" type="text" id="nbre_colis_bl" placeholder="Nombre de colis" value="<?php echo $total_colis; ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="poids_colis_bl">Poids (en kg)</label>
                                                    <input readonly class="form-control" type="text" id="poids_colis_bl" placeholder="Poids brute" value="<?php echo $masse_brute; ?>" >
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="waybill_bl">Waybill</label>
                                                    <input class="form-control" type="text" id="waybill_bl" placeholder="Waybill" value="<?php echo $waybill_bl; ?>">
                                                </div>
                                            </div>

                                            <div class="row">&nbsp;</div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="facture_fournisseur" class="">Facture Fournisseur</label><br/>
                                                    <input type="checkbox" id="facture_fournisseur" name="facture_fournisseur" switch="success" <?php if($facture_fournisseur==1){ echo ' checked '; }; ?> />
                                                    <label for="facture_fournisseur" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="bon_a_enlever" class="">Bon à enlever</label><br/>
                                                    <input type="checkbox" id="bon_a_enlever" name="bon_a_enlever" switch="success" <?php if($bon_a_enlever==1){ echo ' checked '; }; ?> />
                                                    <label for="bon_a_enlever" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="copie_lta" class="">Copie LTA</label><br/>
                                                    <input type="checkbox" id="copie_lta" name="copie_lta" switch="success" <?php if($copie_lta==1){ echo ' checked '; }; ?> />
                                                    <label for="copie_lta" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="liste_colisage" class="">Liste colisage</label><br/>
                                                    <input type="checkbox" id="liste_colisage" name="liste_colisage" switch="success" <?php if($liste_colisage==1){ echo ' checked '; }; ?> />
                                                    <label for="liste_colisage" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="autre_document" class="">Autre document</label><br/>
                                                    <input type="checkbox" id="autre_document" name="autre_document" switch="success" <?php if($autre_document==1){ echo ' checked '; }; ?> />
                                                    <label for="autre_document" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                </div>
                                            </div>

                                            <div class="row" id="type_autre_doc">
                                                <div class="col-md-9">
                                              &nbsp;
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="autre_document" class="">Lister les autres documents</label><br/>
                                                    <textarea class="form-control" placeholder="Lister tous les autres documents ici"></textarea>
                                                    <label for="autre_document" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                </div>
                                            </div>
                                          
                                        </form><!-- end form -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                                                    <!-- /Affiche livraison -->
                                                </div>
                                                
                                            </div>

                                        </div>
                                        <!-- end card -->
                                    </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="documentation" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header bg-transparent border-bottom d-flex">
                                                <h5 class="card-title mb-0">Documentation</h5>

                                            </div>
        
                                            <div class="card-body">
                         
                                                <div class="mt-4">
                                                    <hr class="mt-2">
        
                                                    <div class="table-responsive">
                                                       
                                                    </div>
                                                    <!-- Affichage docs -->
                                                    <div class="row">
                                                        <div class="row col-12">
                                                            <div class="col-md-3">
                                                                <!-- Liste docs -->
                                                                <div class="table-responsive">
                                                        <table class="table align-middle table-nowrap table-hover mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Nom</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col" colspan="2">Taille</th>
                                                                </tr><!-- end tr -->
                                                              </thead><!-- end thead -->
                                                            <tbody>

                                                                                                                        </tbody><!-- end tbody -->
                                                        </table><!-- end table -->
                                                    </div><!-- end table responsive -->
                                                                <!-- /Liste docs -->
                                                            </div>
                                                            <div class="col-md-9">
                                                            <div class="card">
                                                                <div class="card-header justify-content-between d-flex align-items-center">
                                                                    <h4 class="card-title">Documents attachés au dossier</h4>
                                                                </div><!-- end card header -->
                                                                <div class="card-body">
                                                                    <div>
                                                                        <form id="form_drop" action="dossier_export/upload_doc.php" class="dropzone">
                                                                            <div class="fallback">
                                                                                <input name="file" type="file" multiple="multiple">
                                                                            </div>
                                                                            <div class="dz-message needsclick">
                                                                                <div class="mb-3">
                                                                                    <i class="display-4 text-muted uil uil-cloud-upload"></i>
                                                                                </div>

                                                                                <h4>Glissez-deposez ou cliquez pour ajouter des fichiers.</h4>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div><!-- end card -->
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
                                                    <!-- / Affichage docs -->
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end card -->
                                    </div>


                                    <div class="tab-pane" id="suivi_caution" role="tabpanel">
                                        <div class="card col-9">
                                            <div class="card-header bg-transparent border-bottom d-flex">
                                                <h5 class="card-title mb-0">Suivi de caution</h5>

                                            </div>
        
                                            <div class="card-body">
                         
                                                <div class="mt-4">
                                                    <hr class="mt-2">
        
                                                    <div class="table-responsive">
                                                       
                                                    </div>
                                                    <!-- Affichage docs -->
                                                    <div class="row">
                                                        <div class="row col-12">
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="d-flex flex-wrap gap-2">
                                                                        <label for="mail_recup_tc_caution" class="">Mail de récupération TC vide</label>
                                                                        <input type="checkbox" id="mail_recup_tc_caution" name="mail_recup_tc_caution" switch="success" <?php if($mail_recup_tc_caution==1){ echo ' checked '; }; ?> />
                                                                        <label for="mail_recup_tc_caution" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="">
                                                                        <button type="submit" class="btn btn-primary w-md" id="envoi_mail_recup_tc_caution" ><i class="fa fa-envelope"></i> >>Cliquez ici pour envoyer le mail de récupération<< </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                        <div class="row">&nbsp;</div>  
                                                        <hr>  
                                                        <div class="row">&nbsp;</div>  
                                                        <div class="row col-12">
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="d-flex flex-wrap gap-2">
                                                                        <label for="recuperation_bmc_caution" class="">Récupération BMC</label>
                                                                        <input type="checkbox" id="recuperation_bmc_caution" name="recuperation_bmc_caution" switch="success" <?php if($recuperation_bmc_caution==1){ echo ' checked '; }; ?> />
                                                                        <label for="recuperation_bmc_caution" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <input class="form-control" type="file" id="fichier_recuperation_bmc_caution">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                        <div class="row">&nbsp;</div>  
                                                        <hr>   
                                                        <div class="row">&nbsp;</div>  
                                                        <div class="row col-12">
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="d-flex flex-wrap gap-2">
                                                                        <label for="demande_remboursement_caution" class="">Demande de remboursement de caution</label>
                                                                        <input type="checkbox" id="demande_remboursement_caution" name="demande_remboursement_caution" switch="success" <?php if($demande_remboursement_caution==1){ echo ' checked '; }; ?> />
                                                                        <label for="demande_remboursement_caution" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <input class="form-control" type="file" id="fichier_demande_remboursement_caution">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                        <div class="row">&nbsp;</div>  
                                                        <hr>   
                                                        <div class="row">&nbsp;</div>  
                                                        <div class="row col-12">
                                                            <div class="col-md-4">
                                                                <div class="row">
                                                                    <div class="d-flex flex-wrap gap-2">
                                                                        <label for="cheque_caution" class="">Chèque caution</label>
                                                                        <input type="checkbox" id="cheque_caution" name="cheque_caution" switch="success" <?php if($cheque_caution==1){ echo ' checked '; }; ?> />
                                                                        <label for="cheque_caution" data-on-label="Oui" data-off-label="Non" class="mb-0"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <input class="form-control" type="file" id="fichier_cheque_caution">
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
                                                    <!-- / Affichage docs -->
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end card -->
                                    </div>

                                </div>
                                <!-- end tab content -->

                                
                                


                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->
<div class="modal fade" id="myModal_container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ajout_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Ajouter un container</h4>
      </div>
      <div class="modal-body">
	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>
				
				
	  <form name="form_container" id="form_container" class="form-horizontal" action="#">
		
		<div class="row">
        <div data-simplebar  style="max-height: 325px;">
    <!-- container_body -->
    <div class="row">
    <div class="col-md-6">
    <label for="num_container">N° container </label>
        <input type="text" class="form-control" id="num_container" name="num_container" placeholder="N° du container">
    </div>

    <div class="col-md-6">
    <label for="floatingInput">Type </label>
        <input type="text" class="form-control" id="type_container" name="type_container" placeholder="Type de container">
    </div>
    </div>

    <div class="row">
    <div class="col-md-6">
    <label for="floatingInput">Taille</label>
        <input type="text" class="form-control" id="taille_container" name="taille_container" placeholder="Taille du container">
    </div>

    <div class="col-md-6">
    <label for="floatingInput">N° de scellé </label>
        <input type="text" class="form-control" id="num_scelle_container" name="num_scelle_container" placeholder="N° de scellé">
    </div>
    </div>
    <!-- /container_body -->
</div>

		</div>

        <div class="row">&nbsp;</div>

		 <div class="modal-footer ajout-footer_file"> 
		 <button type="submit" id="envoie" class="btn button_valid"><i class="fa fa-check"></i> Valider</button>&nbsp;&nbsp;
         <button type="button" class="btn button_annul" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</button>
         </div>
      </form>
      </div>
     
    </div>
  </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="myModal_article" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ajout_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Ajouter un article</h4>
      </div>
      <div class="modal-body">
	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>

        <div class="row">&nbsp;</div>
				
				
	  <form name="form_article" id="form_article" class="form-horizontal" action="#">
		
		<div class="row">
        <div data-simplebar  style="max-height: 325px;">
    <!-- article_body -->
    <div class="row">
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="code_tarifaire" name="code_tarifaire" placeholder="CODE TARIFAIRE">
                            <label for="floatingInput">CODE TARIFAIRE </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input readonly type="text" class="form-control" id="fob_cfa" name="fob_cfa" placeholder="FOB">
                            <label for="floatingInput">FOB  (en CFA)</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input readonly type="text" class="form-control" id="caf" name="caf" placeholder="CAF">
                            <label for="floatingInput">CAF  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fob_euro" name="fob_euro" placeholder="FOB">
                            <label for="floatingInput">FOB (en euro) </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fret" name="fret" placeholder="FRET">
                            <label for="floatingInput">FRET  </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="ass" name="ass" placeholder="ASS">
                            <label for="floatingInput">ASS  </label>
                        </div>
                    </div>
          
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="taux" name="taux" placeholder="TAUX">
                            <label for="floatingInput">TAUX TARIFAIRE </label>
                        </div>
                    </div>
                </div> 
    <!-- /article_body -->
</div>

		</div>

        <div class="row">&nbsp;</div>

		 <div class="modal-footer ajout-footer_file"> 
		 <button type="submit" id="envoie_article" class="btn button_valid"><i class="fa fa-check"></i> Valider</button>&nbsp;&nbsp;
         <button type="button" class="btn button_annul" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</button>
         </div>
      </form>
      </div>
     
    </div>
  </div>
</div>

<div class="modal fade mod_pop" id="myModal_article_mod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
									<form action="#" id="form_pers_mod">
									<div class="modal-header modif_header">
									<h5 class="modal-title">Modification article</h5>
									</div>
									<div class="msg_erreur"></div>	
									<div class="modal-body">   
		                              <div id="affiche_mod"></div>
		
		                             
		                             </div>
										
                                    </div> 
										
									</form>										
								</div>
							</div>
						</div>



<div class="modal fade mod_pop" id="modal_sup_article" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header sup_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash-o"></i> Suppression de l'article</h4>
      </div>
      <div class="modal-body">
	
	    <div class="msg_erreur"></div>
		<div id="affiche_sup"></div>
		</div>
		
		<div class="modal-footer ajout-footer">
		<button type="button" data-dismiss="modal" class="btn btn-danger">Non</button>&nbsp;&nbsp;
        <button type="submit" id="submit_sup_article" class="btn button_supprimer"><i class="fa fa-bitbucket"></i> Oui</button>&nbsp;&nbsp;&nbsp;
      </div>
	  
    </div>
  </div>
</div>

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Succes'Lab .
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Créé avec <i class="mdi mdi-heart text-danger"></i> par <a href="https://www.linkedin.com/in/ulrich-amani-643a3311b/" target="_blank" class="text-reset">Success'Lab</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
    

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

         <!-- JAVASCRIPT -->
         <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/feather-icons/feather.min.js"></script>

         <!-- Plugins js -->
        <script src="../assets/libs/dropzone/min/dropzone.min.js"></script>

        <script src="../assets/js/app.js"></script>

    </body>
</html>
<?php
}
else
{
 echo'<meta http-equiv="refresh" content="0; url=../deconex.php" />';
}
?>