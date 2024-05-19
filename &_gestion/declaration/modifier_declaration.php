<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../../connex.php');


    $id_declaration_mod=$_GET['id_dec_mod'];
    $_SESSION['id_dec_mod']=$id_declaration_mod;
    
    $dec=$con->prepare('SELECT * FROM declaration WHERE id_declaration=:A');
    $dec->execute(array('A'=>$id_declaration_mod));

    $inf_dec=$dec->fetch();

    $date_declaration=$inf_dec["date_declaration"];
    $reference_declaration=$inf_dec["reference_declaration"];
    $client_declaration=$inf_dec["client_declaration"];
    $regime_declaration=$inf_dec["regime_declaration"];
    $bureau_declaration=$inf_dec["bureau_declaration"];
    $num_declaration=$inf_dec["num_declaration"];
    $num_liquidation_declaration=$inf_dec["num_liquidation_declaration"];
    $paiement_declaration=$inf_dec["paiement_declaration"];
    $dt_declaration=$inf_dec["dt_declaration"];
    $agio_declaration=$inf_dec["agio_declaration"];
    $tirage_declaration=$inf_dec["tirage_declaration"];
    $ouverture_declaration=$inf_dec["ouverture_declaration"];
    $fdi_declaration=$inf_dec["fdi_declaration"];
    $assurance_declaration=$inf_dec["assurance_declaration"];
    $num_quittance_declaration=$inf_dec["num_quittance_declaration"];
    $conteneur_declaration=$inf_dec["conteneur_declaration"];
    $bsc_declaration=$inf_dec["bsc_declaration"];
    $lta_declaration=$inf_dec["lta_declaration"];
    $poids_declaration=$inf_dec["poids_declaration"];
    
    $montant_total=floatval($inf_dec['dt_declaration'])+floatval($inf_dec['agio_declaration'])+floatval($inf_dec['tirage_declaration'])+floatval($inf_dec['ouverture_declaration'])+floatval($inf_dec['fdi_declaration'])+floatval($inf_dec['assurance_declaration']);
    

?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title><?php include('../titre_ent_1.php'); ?> | declaration</title>

        <?php include('../meta.php'); ?>
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

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
	    <script type="text/javascript" src="js/function_mod.js"></script> 

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

            <?php if($_SESSION['acces_fournisseur']==1 ){ ?>
            <li>
                <a href="../fournisseur/fournisseur.php">
                    <i class="icon nav-icon fa fa-handshake" ></i>
                    <span class="menu-item" data-key="t-email">fournisseurs</span>
                </a>
            </li>
            <?php } ?>

            <?php if($_SESSION['acces_fournisseur']==1 ){ ?>
            <li>
                <a href="../fournisseur/fournisseur.php">
                    <i class="icon nav-icon fa fa-handshake" ></i>
                    <span class="menu-item" data-key="t-email">fournisseurs</span>
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
                    <li><a href="../dossier_exp/dossier_export.php" data-key="t-p-list">Export</a></li>
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
                    <li><a href="../declaration/declaration.php" data-key="t-p-list" style="background-color:#251f75; color:#fff;"> Déclaration</a></li>
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
                                                              
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php include('../titre_logi.php'); ?></a></li>
                                        <li class="breadcrumb-item active">declarations</li>
                                    </ol>
                                    
                                </div>
                                <button id="retour_dec" style="margin:10px; " class="btn btn-primary"><i class="fa fa-angle-left"></i> Retour</button>
                            </div>
                            
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        
                    <div class="chargement_" style="text-align:center; margin-top:70px"></div>
						  <div class="aff_evaluation_">

                        <div class="row">

                        <!--Debut caisses-->
						<div class="col-md-12 col-xs-12">
                       
                        <div class="card bg- text-white-50" style="color:#038bd7;">
                       
                            <div class="card-body">
                                                
 <!--
    <br>
    <b style="color:#72768a;">Exporter vers </b>
    <a href="excel/excel_declaration.php" target="_blank" title="Exporter en Excel" id="title">
        <i class="fa fa-file-excel fa-2x" style="color:green;"></i>
    </a>
                            -->
                             
                    
                        
                          <!-- PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrap"  style="">
                            
                            <!-- START WIDGETS -->    
                            <div class="panel-body"> 
                            <div>
                               <br />
              
                            </div> 
                            
                            <div class="chargement" style="text-align:center;"></div>               
                            <div class="row voir aff_declaration_modifier">
                                
                                  <form name="form_declaration" id="form_declaration" class="form-horizontal" action="#">
		
	
		<div class="row">
		    
            <div class="col-lg-4 col-xs-12">
                <label>Date<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px; color:green; font-weight:bold;" type="date" class="form-control" required id="date_declaration" name="date_declaration" value="<?php echo $inf_dec["date_declaration"]; ?>" />
            </div>		
            
            <div class="col-lg-8 col-xs-12">
                &nbsp;
            </div>	
            
		</div>
		
		<div class="row">
		    
            <div class="col-lg-4 col-xs-12">
                <label>Référence<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px; color:green; font-weight:bold;" type="text" class="form-control" required id="reference_declaration" name="reference_declaration" value="<?php echo $inf_dec["reference_declaration"]; ?>"  />
            </div>		
            
            <div class="col-lg-8 col-xs-12">
                <label>Client<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px; color:green; font-weight:bold;" type="text" class="form-control" required id="client_declaration" name="client_declaration" value="<?php echo $inf_dec["client_declaration"]; ?>" />
            </div>	
            
		</div>
		
		<div class="row">&nbsp;</div>
		
		<div class="row">
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="regime_declaration" name="regime_declaration" placeholder="REGIME" value="<?php echo $inf_dec["regime_declaration"]; ?>" >
                            <label for="floatingInput">REGIME</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input  type="text" class="form-control" id="bureau_declaration" name="bureau_declaration" placeholder="BUREAU" value="<?php echo $inf_dec["bureau_declaration"]; ?>" >
                            <label for="floatingInput">BUREAU</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="num_declaration" name="num_declaration" placeholder="N° DECLARATION" value="<?php echo $inf_dec["num_declaration"]; ?>" >
                            <label for="floatingInput">N° DECLARATION </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="num_liquidation_declaration" name="num_liquidation_declaration" placeholder="N° LIQUIDATION" value="<?php echo $inf_dec["num_liquidation_declaration"]; ?>" >
                            <label for="floatingInput">N° LIQUIDATION</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                           <label for="floatingInput">TYPE DE PAIEMENT</label>
                           <select id="paiement_declaration" name="paiement_declaration" class="form-select" style="margin:1px;">
                                <option value="">Sélectionner un type paiement</option>
                                <option value="credit" <?php if(["client_declaration"]=="credit"){ echo ' selected '; } ?>>Crédit</option>
                                <option value="comptant" <?php if(["client_declaration"]=="credit"){ echo ' selected '; } ?>>Comptant</option>
                            </select>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="dt_declaration" name="dt_declaration" placeholder="D&T" value="<?php echo $inf_dec["dt_declaration"]; ?>">
                            <label for="floatingInput">D&T</label>
                        </div>
                    </div>
          
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="agio_declaration" name="agio_declaration" placeholder="AGIO" value="<?php echo $inf_dec["agio_declaration"]; ?>">
                            <label for="floatingInput">AGIO </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="tirage_declaration" name="tirage_declaration" placeholder="TIRAGE" value="<?php echo $inf_dec["tirage_declaration"]; ?>">
                            <label for="floatingInput">TIRAGE</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="ouverture_declaration" name="ouverture_declaration" placeholder="OUVERTURE" value="<?php echo $inf_dec["ouverture_declaration"]; ?>">
                            <label for="floatingInput">OUVERTURE</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="fdi_declaration" name="fdi_declaration" placeholder="FDI + RFCV" value="<?php echo $inf_dec["fdi_declaration"]; ?>">
                            <label for="floatingInput">FDI + RFCV</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="assurance_declaration" name="assurance_declaration" placeholder="ASSURANCE" value="<?php echo $inf_dec["assurance_declaration"]; ?>">
                            <label for="floatingInput">ASSURANCE</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="num_quittance_declaration" name="num_quittance_declaration" placeholder="QUITTANCE N°" value="<?php echo $inf_dec["num_quittance_declaration"]; ?>">
                            <label for="floatingInput">QUITTANCE N°</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="conteneur_declaration" name="conteneur_declaration" placeholder="CONTENEUR" value="<?php echo $inf_dec["conteneur_declaration"]; ?>">
                            <label for="floatingInput">CONTENEUR</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="bsc_declaration" name="bsc_declaration" placeholder="DIVERS/BSC" value="<?php echo $inf_dec["bsc_declaration"]; ?>">
                            <label for="floatingInput">DIVERS/BSC</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="lta_declaration" name="lta_declaration" placeholder="LTA" value="<?php echo $inf_dec["lta_declaration"]; ?>">
                            <label for="floatingInput">LTA/BL</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="poids_declaration" name="poids_declaration" placeholder="POIDS" value="<?php echo $inf_dec["poids_declaration"]; ?>"> 
                            <label for="floatingInput">POIDS</label>
                        </div>
                    </div>
        
        
        </div>
        
        <hr>
		
		<div class="row">
		    
            <div class="col-lg-3 col-xs-12">
                &nbsp;
            </div>		
            
            <div class="col-lg-6 col-xs-12">
                <label>Montant Total : <span id="aff_total_declaration" class="semi_aste" style="font-weight:bold; font-size:23px; color:green;"><?php echo number_format($montant_total,0,',',' '); ?></span> FCFA</label> 
            </div>	
            
            <div class="col-lg-3 col-xs-12">
                &nbsp;
            </div>	
            
		</div>
		
        <div class="row">&nbsp;</div>

		 <div class="modal-footer ajout-footer_file"> 
		 <button type="submit" id="envoie_declaration_mod" class="btn button_valid"><i class="fa fa-check"></i> Enregistrer les modifications</button>&nbsp;&nbsp;
         <button type="button" class="btn button_annul" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</button>
         </div>
      </form>
                         
                            </div>
                            </div>
                            <!-- END WIDGETS --> 
                            <br />       
                        </div>
                        <!-- END PAGE CONTENT WRAPPER --> 
                                
                               
                            </div>
                        </div>
                     
                        </div>
                        <!--/fin declaration-->


                        
                      
         
						
                        </div>
						

                          </div>

                    </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

<!-- Modal declaration -->
<!-- Modal -->
<div class="modal fade" id="myModal_declaration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ajout_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bullhorn"></i> Effectuer une declaration</h4>
      </div>
      <div class="modal-body">
	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>
				
				
	
      </div>
     
    </div>
  </div>
</div>



<div class="modal fade mod_pop" id="myModal_declaration_mod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modif_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Modification declaration</h4>
      </div>
      <div class="modal-body">
	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>
		<div id="affiche_declaration_mod"></div>
		</div>
	  
    </div>
  </div>
</div>	

<div class="modal fade mod_pop" id="myModal_declaration_sup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header sup_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Suppression declaration</h4>
      </div>
      <div class="modal-body">

	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>
		<div id="affiche_declaration_sup"></div>
		</div>

		<div class="modal-footer ajout-footer">
        <button type="button" class="btn button_annuler" data-dismiss="modal"><i class="fa fa-times"></i> Non</button>
        <button type="submit" id="submit_declaration_sup" class="btn button_supprimer"><i class="fa fa-bitbucket"></i> Oui</button>&nbsp;&nbsp;&nbsp;
      </div>
	  
    </div>
  </div>
</div>	
<!-- fin modal declaration-->



            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> &copy; Success'Lab.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Découvrez nos solution en <i class="mdi mdi-cubes text-danger"></i> <a href="#" target="_blank" class="text-reset">cliquant ici</a>
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
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center bg-dark p-3">

               
            </div>

            <!-- Settings -->
            <hr class="m-0" />

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

        <!-- Select 2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    <script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });  
    </script>

           <!-- JAVASCRIPT -->
           <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/feather-icons/feather.min.js"></script>

        <!-- plugins -->
        <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="../assets/libs/flatpickr/flatpickr.min.js"></script>

        <!-- Modern colorpicker bundle -->
        <script src="../assets/libs/@simonwep/pickr/pickr.min.js"></script>

        <!-- init js -->
        <script src="../assets/js/pages/form-advanced.init.js"></script>

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