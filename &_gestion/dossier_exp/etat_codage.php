
<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../../connex.php');

?>
<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8" />
    <title><?php include('../titre_ent_1.php'); ?> | Etat de codage</title>

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
    <script type="text/javascript" src="js_import/function.js"></script> 

    <style> 
    .espace {
        margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;
    }
   
    .class_titre{
    width: 74.9pt;border-right: 1pt solid windowtext;
    border-bottom: 1pt solid windowtext;
    border-left: 1pt solid windowtext;
    border-image: initial;border-top: none;
    padding: 0cm 5.4pt;height: 22.9pt;
    vertical-align: middle;
    }


    .elm_1{
        width: 49.85pt;
        border-top: none;
        border-bottom: none;
        border-left: none;
        border-image: initial;
        border-right: 1pt solid windowtext;
        padding: 0cm 5.4pt;
        height: 21.4pt;
        vertical-align: middle;
    }

    .elm_2{
        width: 25.05pt;
        border-top: 1pt solid windowtext;
        border-right: 1pt solid windowtext;
        border-bottom: 1pt solid windowtext;
        border-image: initial;
        border-left: none;
        padding: 0cm 5.4pt;
        height: 21.4pt;
        vertical-align: middle;
    }

    .elm_3{
        width: 98.7pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;
    }

    .elm_4{
        margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;
    }

    .elm_5{
        margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;
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
                <a href="../accueil.php">
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
                                    <h4 class="mb-0">Gestion des dossiers</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Accueil</a></li>
                                            <li class="breadcrumb-item active">dossiers</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <a href="ajouter_dossier_import.php" class="btn btn-light">
                                                        <i class="uil uil-plus me-1"></i> Créer un dossier
                                                    </a>
                                                </div>
                                                <div class="mb-3">
                                                    <a id="export_etat_codage_import" class="btn btn-light">
                                                        <i class="fa fa-download"></i> Importer état de codage
                                                    </a>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-md-9">
                                                <div class="d-flex flex-wrap align-items-start justify-content-md-end gap-2 mb-3">
                                                    <div class="search-box ">
                                                        <div class="position-relative">
                                                            <input type="text" id="recher_dossier" name="recher_dossier" class="form-control bg-light border-light rounded" placeholder="Rechercher...">
                                                            <i class="uil uil-search search-icon"></i>
                                                        </div>
                                                    </div><!-- end serch box -->
                                                    
                                                    <div class="dropdown">
                                                        Exporter vers
                                                        <a class="btn btn-link text-dark dropdown-toggle shadow-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="uil uil-ellipsis-h"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="#"><i class="fa fa-file-pdf"></i> Fichier pdf</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fa fa-file-excel"></i> Tableau excel</a></li>
                                                        </ul>
                                                    </div><!-- end dropdown -->
                                                </div>
                                                
                                            </div><!-- end col -->
                                        </div><!-- end row -->

                                        <div class="mt-2">
                                            <ul class="nav nav-tabs nav-tabs-custom mb-4" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#etat_import">Import</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#etat_export" role="tab">Export</a>
                                                </li>
                                            </ul><!-- end ul -->
                                        </div>

                                        <!-- Tab content -->
                                        <div class="tab-content">
                                            

                                            <!-- Tous les dossiers-->
                                            <div class="tab-pane active" id="etat_import" role="tabpanel">

                                            <div class="mb-3">
                                                    <input type='button' id='btn' value="Imprimer l'état de codage" onclick='printDiv();'>
                                                </div>

                                                <div class="chargement"></div>
                                                <div class="row aff_etat_codage_import table-responsive"  style="padding:100px; padding-top:10px" id='DivIdToPrint'>

                                                 <!--Etat codage Import-->

                                            

<table style="width: 5.5e+2pt;margin-left:-45.85pt;border-collapse:collapse;border:none;" >
    <tbody>
        <tr>
            <td colspan="2" class="elm_1">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Bureau</span></strong></p>
            </td>
            <td colspan="5" class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:150px; text-align:center; border:0px;"></span></strong></p>
            </td>
         
            <td colspan="6" style="width: 144.55pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Type de d&eacute;claration&nbsp;:</span></strong></p>
            </td>
            <td class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:20px; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:20px; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="9" style="width: 157.95pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code R&eacute;gime&nbsp;:</span></strong></p>
            </td>
            <td class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:20px; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="elm_3">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Exportateur</span></strong></p>
            </td>
            <td colspan="2" style="width: 93.8pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; RC&nbsp;:</span></strong></p>
            </td>
            <td colspan="20" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 4.85pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border: none;padding: 0cm 5.4pt;height: 4.85pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 4.65pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="elm_3">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Destinataire&nbsp;</span></strong></p>
            </td>
            <td colspan="5" style="width: 93.8pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Raison Social&nbsp;:</span></strong></p>
            </td>
            <td colspan="17" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="elm_3">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="5" style="width: 93.8pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Adresse&nbsp;:</span></strong></p>
            </td>
            <td colspan="17" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 4.85pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border: none;padding: 0cm 5.4pt;height: 4.85pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="border:none;padding:0cm 0cm 0cm 0cm;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
            </td>
            <td colspan="5" style="width: 93.8pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; RC&nbsp;:</span></strong></p>
            </td>
            <td colspan="20" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="9" style="border:none;padding:0cm 0cm 0cm 0cm;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td style="width: 26.9pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="25" style="width: 518.55pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 5.15pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 5.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 74.9pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Manifeste</span></strong></p>
            </td>
            <td colspan="8" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="6" style="width: 117.95pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Total Colis&nbsp;:</span></strong></p>
            </td>
            <td colspan="9" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 11.3pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="width: 122.15pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Code&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>dernier pays</span></strong></p>
            </td>
            <td style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="3" style="width: 96.4pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Pays d&rsquo;exploitation&nbsp;:</span></strong></p>
            </td>
            <td colspan="6" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="5" style="width: 108pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code pays destination&nbsp;:</span></strong></p>
            </td>
            <td style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 16.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 6.45pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border-right: none;border-bottom: none;border-left: none;border-image: initial;border-top: 1pt solid windowtext;padding: 0cm 5.4pt;height: 4.75pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="width: 122.15pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; &nbsp;VOL / NAVIRE</span></strong></p>
            </td>
            <td colspan="10" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 77.2pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code Nationalit&eacute;</span></strong></p>
            </td>
            <td colspan="2" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>

        <tr>
            <td colspan="5" style="width: 122.15pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; LTA / NAVIRE</span></strong></p>
            </td>
            <td colspan="10" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 77.2pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code Nationalit&eacute;</span></strong></p>
            </td>
            <td colspan="2" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>

        <tr>
            <td colspan="26" style="width: 545.45pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 4.6pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="width: 145.6pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Mode de Transport Frontiere</span></strong></p>
            </td>
            <td colspan="2" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td style="width: 48.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
            <td colspan="6" style="width: 142.15pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Lieux de Charge / decharg</span></strong></p>
            </td>
            <td colspan="9" style="width: 200.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 20.7pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="class_titre">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Bureau d&rsquo;Entr&eacute;e</span></strong></p>
            </td>
            <td colspan="5" class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:150px; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="2" style="width: 72.95pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Monnaie</span></strong></p>
            </td>
            <td colspan="4" class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:150px; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="6" style="width: 76.9pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Montant Facture</span></strong></p>
            </td>
            <td colspan="10" class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:120px; text-align:center; border:0px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 9.3pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="class_titre">
                <p class="elm_4"><strong><span style='font-family:"Arial",sans-serif;'>Incoterm</span></strong></p>
            </td>
            <td colspan="3" class="elm_2">
                <p class="elm_4"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:150px; text-align:center; border:0px;"></span></strong></p>
            </td>
            <td colspan="3" style="width: 95.65pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Banque</span></strong></p>
            </td>
            <td colspan="6" style="width: 119.25pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 18px;"></span></strong></span></strong></p>
            </td>
            <td colspan="8" style="width: 130.9pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Condition de paiement</span></strong></p>
            </td>
            <td colspan="2" style="width: 54.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:30px; text-align:center; border:0px; font-size: 18px;"></span></strong></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 8.4pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="width: 108.95pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Nombre de Colis</span></strong></p>
            </td>
            <td colspan="8" style="width: 181.8pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 22px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 109.05pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Marque &nbsp; &nbsp;&nbsp;</span></strong></p>
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>de Colis</span></strong></p>
            </td>
            <td colspan="8" style="width: 145.65pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 22px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 8.4pt;vertical-align: middle;">
                <p class="espace"><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 74.9pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>Position Tarifaire</span></strong></p>
            </td>
            <td colspan="7" style="width: 166.35pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style="font-size:16px;"><input type="text" style="width:100%; text-align:center; border:0px; font-size: 18px;"></span></strong></p>
            </td>
            <td colspan="4" style="width: 72.35pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code pays d&rsquo;origine</span></strong></p>
            </td>
            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 22px;"></span></strong></p>
            </td>
            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 22px;"></span></strong></p>
            </td>
            <td colspan="7" style="width: 103.85pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Type Emballage</span></strong></p>
            </td>
            <td colspan="3" style="width: 81.1pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 22px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="width: 74.9pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; Conteneur</span></strong></p>
            </td>
            <td colspan="7" style="width: 166.35pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p class="espace"><strong><span style="font-size:16px;"><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></span></strong></p>
            </td>
            <td colspan="11" style="width: 184.95pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:right; vertical-align: middle;'><strong><span style='font-family:"Arial",sans-serif;'>N&deg; P&uml;lomb</span></strong></p>
            </td>
            <td colspan="5" style="border:none;border-bottom:solid windowtext 1.0pt; vertical-align: middle;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif; vertical-align:middle;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border: none;padding: 0cm 5.4pt;height: 4.05pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="26" style="width: 545.45pt;border-right: none;border-bottom: none;border-left: none;border-image: initial;border-top: 1pt solid windowtext;padding: 0cm 5.4pt;height: 13.7pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                <p class="espace"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="7" style="width: 145.6pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:16px;font-family:"Arial",sans-serif;'>Poids Brut</span></strong></p>
            </td>
            <td colspan="4" style="width: 119.85pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></span></strong></p>
            </td>
            <td colspan="3" rowspan="2" style="width: 48.15pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></span></strong></p>
            </td>
            <td colspan="5" style="width: 96.85pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>R&eacute;gime</span></strong></p>
            </td>
            <td colspan="7" style="width: 135pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></span></strong></p>
            </td>
        </tr>
        <tr>
            <td colspan="7" style="width: 145.6pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="elm_4"><strong><span style='font-size:16px;font-family:"Arial",sans-serif;'>Poids Net</span></strong></p>
            </td>
            <td colspan="4" style="width: 119.85pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                <p class="espace"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'><input type="text" style="width:100%; text-align:center; border:0px; font-size: 28px;"></span></strong></p>
            </td>
            <td colspan="12" style="border:none;padding:0cm 0cm 0cm 0cm;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
            <td style="border:none;"><br></td>
        </tr>
    </tbody>
</table>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                                               <!-- / /Etat codage Import-->

                                                </div>

                                            </div>
                                            <!-- /Tous les dossiers -->

                                            <!-- Tous les dossiers-->
                                            <div class="tab-pane" id="etat_export" role="tabpanel">

                                                <div class="chargement"></div>
                                                <div class="row" style="padding:100px; padding-top:10px">
                                                
                                                <!-- Etat codage export -->
                                                <table >
    <tbody>
        <tr>
            <td colspan="2" style="width: 49.85pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                <table style="width: 5.5e+2pt;margin-left:-32.6pt;border-collapse:collapse;border:none;">
                    <tbody>
                        <tr>
                            <td colspan="2" class="elm_1">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Bureau</span></strong></p>
                            </td>
                            <td class="elm_2">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>C</span></strong></p>
                            </td>
                            <td style="width: 23.55pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>I</span></strong></p>
                            </td>
                            <td colspan="2" style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:21px;font-family:"Arial",sans-serif;'>A</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:21px;font-family:"Arial",sans-serif;'>B</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:21px;font-family:"Arial",sans-serif;'>E</span></strong></p>
                            </td>
                            <td colspan="7" style="width: 144.55pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Type de d&eacute;claration&nbsp;:</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>E</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>X</span></strong></p>
                            </td>
                            <td colspan="2" style="width: 27.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="7" style="width: 130.9pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code R&eacute;gime&nbsp;:</span></strong></p>
                            </td>
                            <td style="width: 27pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.4pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>1</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26.9pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="26" style="width: 518.3pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="26" style="width: 518.3pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="width: 98.45pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Exportateur</span></strong></p>
                            </td>
                            <td colspan="5" style="width: 93.8pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Raison Social&nbsp;:</span></strong></p>
                            </td>
                            <td colspan="18" style="width: 352.95pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:21px;font-family:"Arial",sans-serif;'>1004713V</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="26" style="width: 518.3pt;border: none;padding: 0cm 5.4pt;height: 3.2pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                                <p class="contenu_1"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="width: 98.45pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="5" style="width: 93.8pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Adresse&nbsp;:</span></strong></p>
                            </td>
                            <td colspan="18" style="width: 352.95pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>ULTRA BRAG AG                                                                              TERMINAL 1 Auhafen  Auhafenstrasse 2880                                             4132 Muttenz SWITZERLAND</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26.9pt;border: none;padding: 0cm 5.4pt;height: 4.85pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="26" style="width: 518.3pt;border: none;padding: 0cm 5.4pt;height: 4.85pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border:none;padding:0cm 0cm 0cm 0cm;">
                                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            </td>
                            <td colspan="5" style="width: 93.8pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; RC&nbsp;:</span></strong></p>
                            </td>
                            <td colspan="9" style="width: 190.9pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'><input id="num_rc_etat" type="text" class="form-control"/></span></strong></p>
                            </td>
                            <td colspan="9" style="border:none;padding:0cm 0cm 0cm 0cm;">
                                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 26.9pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="26" style="width: 518.3pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 4.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="width: 98.45pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Destinataire</span></strong></p>
                            </td>
                            <td colspan="5" style="width: 93.8pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; RC&nbsp;:</span></strong></p>
                            </td>
                            <td colspan="18" style="width: 352.95pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: bottom;">
                                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;font-family:"Times New Roman",serif;'>ULTRA BRAG AG &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TERMINAL 1 Auhafen &nbsp;Auhafenstrasse 2880 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 4132 Muttenz SWITZERLAND</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 3.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                                <p class="contenu_1"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                                <p class="contenu_1"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border-top: 1pt solid windowtext;border-left: none;border-bottom: 1pt solid windowtext;border-right: none;padding: 0cm 5.4pt;height: 5.15pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                                <p class="contenu_1"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                                <p class="contenu_1"><strong><span style='font-size:1px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 5.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width: 74.9pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Manifeste</span></strong></p>
                            </td>
                            <td style="width: 23.55pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="2" style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td style="width: 24.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td style="width: 24.3pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td style="width: 24.2pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="6" style="width: 117.95pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Total Colis&nbsp;:</span></strong></p>
                            </td>
                            <td colspan="3" style="width: 27.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="6" style="width: 135pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_4"><strong><span style='font-family:"Arial",sans-serif;'>55&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 11.3pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:4px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="width: 121.9pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Code&nbsp;</span></strong></p>
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>dernier pays</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>B</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>E</span></strong></p>
                            </td>
                            <td colspan="4" style="width: 96.4pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Pays d&rsquo;exploitation&nbsp;:</span></strong></p>
                            </td>
                            <td style="width: 24.1pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="2" style="width: 24.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>C</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>I</span></strong></p>
                            </td>
                            <td style="width: 22.9pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="7" style="width: 108pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code pays destination&nbsp;:</span></strong></p>
                            </td>
                            <td style="width: 27.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>C</span></strong></p>
                            </td>
                            <td style="width: 27pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 21.65pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>H</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 16.8pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 6.45pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="width: 98.45pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Nom du Navire</span></strong></p>
                            </td>
                            <td colspan="23" style="width: 446.75pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:#0D0D0D;'>SEASPAN SAIGON&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 4.75pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="width: 121.9pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 26.85pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Tpe de Conteneur</span></strong></p>
                            </td>
                            <td colspan="7" style="width: 167.4pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 26.85pt;vertical-align: middle;">
                                <p class="elm_4"><span style='font-size:32px;font-family:"Arial",sans-serif;'>20 DV</span></p>
                            </td>
                            <td colspan="3" style="width: 47.5pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 26.85pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="6" style="width: 83.35pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 26.85pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; Plomb</span></strong></p>
                            </td>
                            <td colspan="5" style="width: 125.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 26.85pt;vertical-align: middle;">
                                <p class="contenu_1"><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>HLG1552410</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" style="width: 121.9pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>N&deg; du Conteneur</span></strong></p>
                            </td>
                            <td colspan="7" style="width:167.4pt;border:solid windowtext 1.0pt;border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:22.9pt;">
                                <p class="elm_4"><span style='font-size:21px;font-family:"Times New Roman",serif;color:black;'>BSIU2299006</span></p>
                            </td>
                            <td colspan="3" style="width: 47.5pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="9" style="width: 154.35pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code Nationalit&eacute;</span></strong></p>
                            </td>
                            <td style="width: 27.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>H</span></strong></p>
                            </td>
                            <td style="width: 27pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>K</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.8pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 4.6pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7" style="width: 145.35pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Mode de Transport Frontiere</span></strong></p>
                            </td>
                            <td colspan="2" style="width: 46.9pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>1</span></strong></p>
                            </td>
                            <td colspan="2" style="width: 48.75pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="7" style="width: 142.15pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Lieux de Charge / decharg</span></strong></p>
                            </td>
                            <td colspan="9" style="width: 162.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:21px;font-family:"Arial",sans-serif;'>BEANR</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 20.7pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="class_titre">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Bureau d&rsquo;Entr&eacute;e</span></strong></p>
                            </td>
                            <td style="width: 23.55pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>C</span></strong></p>
                            </td>
                            <td colspan="2" style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>I</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>A</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>B</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>E</span></strong></p>
                            </td>
                            <td colspan="3" style="width: 72.95pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Monnaie</span></strong></p>
                            </td>
                            <td style="width: 24.1pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>E</span></strong></p>
                            </td>
                            <td colspan="2" style="width: 24.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>U</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>R</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="6" style="width: 76.9pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="4" style="width: 108.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>40480</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 9.3pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="class_titre">
                                <p class="elm_4"><strong><span style='font-family:"Arial",sans-serif;'>Incoterm</span></strong></p>
                            </td>
                            <td style="width: 23.55pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>F</span></strong></p>
                            </td>
                            <td colspan="2" style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>O</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>B</span></strong></p>
                            </td>
                            <td colspan="4" style="width: 95.65pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="6" style="width: 119.25pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:19px;font-family:"Arial",sans-serif;'>SGCI</span></strong></p>
                            </td>
                            <td colspan="8" style="width: 130.9pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Condition de paiement</span></strong></p>
                            </td>
                            <td colspan="2" style="width: 54.05pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>B</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 8.4pt;vertical-align: middle;">
                                <p class="elm_4"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="width: 108.95pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Nombre de Colis</span></strong></p>
                            </td>
                            <td colspan="9" style="width: 181.8pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>55</span></strong></p>
                            </td>
                            <td colspan="6" style="width: 109.05pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Marque &nbsp; &nbsp;&nbsp;</span></strong></p>
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>de Colis</span></strong></p>
                            </td>
                            <td colspan="7" style="width: 145.4pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>V/D</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 8.4pt;vertical-align: middle;">
                                <p class="contenu_1"><span style='font-size:9px;font-family:"Arial",sans-serif;'>&nbsp;</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width: 74.9pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>Position Tarifaire</span></strong></p>
                            </td>
                            <td colspan="8" style="width: 166.1pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style="font-size:16px;">1513110000</span></strong></p>
                            </td>
                            <td colspan="4" style="width: 72.35pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Code pays d&rsquo;origine</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>C</span></strong></p>
                            </td>
                            <td style="width: 23.45pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>I</span></strong></p>
                            </td>
                            <td colspan="7" style="width: 103.85pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>Emballage</span></strong></p>
                            </td>
                            <td colspan="3" style="width: 81.1pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 30.8pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>FUTS</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border-top: none;border-right: none;border-left: none;border-image: initial;border-bottom: 1pt solid windowtext;padding: 0cm 5.4pt;height: 3.5pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:5px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border: none;padding: 0cm 5.4pt;height: 4.05pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:8px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="27" style="width: 545.2pt;border-right: none;border-bottom: none;border-left: none;border-image: initial;border-top: 1pt solid windowtext;padding: 0cm 5.4pt;height: 13.7pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                                <p class="contenu_1"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                                <p class="contenu_1"><strong><span style='font-size:7px;font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7" style="width: 145.35pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_4"><strong><span style='font-size:16px;font-family:"Arial",sans-serif;'>Poids Brut</span></strong></p>
                            </td>
                            <td colspan="5" style="width: 119.85pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>10120 Kgs</span></strong></p>
                            </td>
                            <td colspan="3" rowspan="2" style="width: 48.15pt;border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-family:"Arial",sans-serif;'>&nbsp;</span></strong></p>
                            </td>
                            <td colspan="6" style="width: 96.85pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_5"><strong><span style='font-family:"Arial",sans-serif;'>R&eacute;gime</span></strong></p>
                            </td>
                            <td colspan="6" style="width: 135pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>1000</span></strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7" style="width: 145.35pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="elm_4"><strong><span style='font-size:16px;font-family:"Arial",sans-serif;'>Poids Net</span></strong></p>
                            </td>
                            <td colspan="5" style="width: 119.85pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;height: 22.9pt;vertical-align: middle;">
                                <p class="contenu_1"><strong><span style='font-size:24px;font-family:"Arial",sans-serif;'>10120 Kgs</span></strong></p>
                            </td>
                            <td colspan="12" style="border:none;padding:0cm 0cm 0cm 0cm;">
                                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                            </td>
                        </tr>
                     
                    </tbody>
                </table>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:10.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>&nbsp;</p>
            </td>
          
        </tr>
    </tbody>
</table>
                                                <!-- /Etat codage export -->
                                           
                                                </div>
                                                
                                                
                                            </div>
                                            <!-- /Tous les dossiers -->

                                        

                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                            
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->

                            
                        </div>
                        <!-- end row -->

                        
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; MALEA Supply Chain Services Consulting .
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

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/feather-icons/feather.min.js"></script>

        <script src="../assets/js/app.js"></script>
        <script>
        function printDiv() 
        {

        var divToPrint=document.getElementById('DivIdToPrint');

        var newWin=window.open('','Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

        newWin.document.close();

        setTimeout(function(){newWin.close();},10);

        }
        </script>

    </body>
</html>
<?php
}
else
{
 echo'<meta http-equiv="refresh" content="0; url=../deconex.php" />';
}
?>