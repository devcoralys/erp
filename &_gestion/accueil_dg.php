<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../connex.php');




    // Inclusion de la classe DataProvider
    require_once('DataProvider.php');

    // Création d'une instance de la classe DataProvider
    $dataProvider = new DataProvider();


if($_SESSION['acces_dashboard']==0){ header('Location: accueil.php'); }

?>
<!doctype html>
<html lang="fr">

<head>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1234567890123456"
        crossorigin="anonymous"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NV91QKLQDN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-NV91QKLQDN');
    </script>

    <meta charset="utf-8" />
    <title><?php include('titre_ent_1.php'); ?> | Accueil</title>
    <?php include('meta.php'); ?>
    <!--Tableau de bord-->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <!--/Tableau de bord-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- dragula css -->
    <link href="assets/libs/dragula/dragula.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- plugin css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

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
                        <a href="accueil.php" class="logo logo-dark">
                            <span class="logo-lg">
                                <?php include('titre_ent_ac.php'); ?>
                            </span>
                        </a>

                        <a href="accueil.php" class="logo logo-light">
                            <span class="logo-lg">
                                <?php include('titre_ent_ac.php'); ?>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- </div>

                <div class="d-flex" style="color:#251f75;">
                  
                <a href="accueil.php">
                    <i class="icon nav-icon fa fa-home"></i>
                </a>

                &nbsp;

                   <?php if($_SESSION['acces_client']==1 ){ ?>

                <a href="client/client.php">
                    <i class="icon nav-icon fa fa-users" ></i>
                </a>

            <?php } ?>
            
            <?php if($_SESSION['acces_demande_decaissement']==1 ){ ?>
                <a href="demande_decaissement/demande_decaissement.php">
                    <i class="icon nav-icon fa fa-money-bills" ></i>
                </a>
            <?php } ?>
            
            <?php if($_SESSION['acces_caisse']==1 ){ ?>
                <a href="caisse/caisse.php">
                    <i class="icon nav-icon fas fa-cash-register" ></i>
                </a>
            <?php } ?>
            
            <?php if($_SESSION['acces_comptabilite']==1 ){ ?>
                <a href="javascript:void();" class="has-arrow">
                    <i class="fa fa-balance-scale" data-feather="briefcase_"></i>
                </a>
            <?php } ?>

            <?php if($_SESSION['acces_dossier']==1 ){ ?>
            <li>
                <a href="javascript:void();" class="has-arrow">
                    <i class="fa fa-folder" data-feather="briefcase_"></i>
                </a>
            </li>
            <?php } ?>
            <?php if($_SESSION['acces_groupage']==1 ){ ?>
                <a href="groupage/groupage.php">
                    <i class="icon nav-icon fa fa-globe"></i>
                </a>
            <?php } ?>
            
           <?php if($_SESSION['acces_autre_envoi']==1 ){ ?>
                <a href="autre_envoi/autre_envoi.php">
                    <i class="icon nav-icon fa fa-share"></i>
                </a>
            <?php } ?>
            
            <?php if($_SESSION['acces_autre_envoi_france']==1 ){ ?>
                 href="autre_envoi_france/autre_envoi_france.php">
                    <i class="icon nav-icon fa fa-share"></i>
                </a>
            <?php } ?>

            <?php if($_SESSION['acces_finance']==1 ){ ?>
                <a href="javascript:void();" class="has-arrow">
                    <i class="fa fa-credit-card" data-feather="briefcase_"></i>
                </a>
            <?php } ?>


            <?php if($_SESSION['acces_rh']==1 ){ ?>
                <a href="personnel/personnel.php" class="active">
                    <i class="icon nav-icon fa fa-user"></i>
                </a>
            <?php } ?>
            
                <a href="rapport/rapport.php" class="active">
                    <i class="icon nav-icon fa fa-file-text"></i>
                </a>

                <a href="profil/profil.php">
                    <i class="icon nav-icon fa fa-user-circle"></i>
                </a>
            <?php if($_SESSION['acces_secur']==1 ){ ?>

                <a href="utilisateur/utilisateur.php">
                    <i class="icon nav-icon fa fa-users"></i>
                </a>

                <a href="historique/historique.php">
                    <i class="icon nav-icon fa fa-file-excel"></i>
                </a>
            <?php } ?>


                </div> -->

                    <div class="d-flex">
                        <!--Notifications-->
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
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
                                    $afic=$con->prepare('SELECT * FROM besoin LEFT JOIN utilisateur ON utilisateur.secur=besoin.demandeur_secur WHERE id_besoin!="" AND decaisse=0 AND etat_besoin=0 AND demandeur_secur="'.$_SESSION['secur_site'].'" ORDER BY id_besoin DESC ');
                                    $afic->execute();

                                    while($iafic=$afic->fetch())
                                    {

                                                ?>

                                    <a href="javascript:void();" class="text-reset notification-item">
                                        <div class="d-flex border-bottom align-items-start">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-sm me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="uil-shopping-basket"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1"><?php echo stripslashes($iafic['objet_demande']); ?>
                                                </h6>
                                                <div class="text-muted">
                                                    <p class="mb-1 font-size-13">Cette demande est encore en cours de
                                                        saisie.</p>
                                                    <p class="mb-0 font-size-10 text-uppercase fw-bold"><i
                                                            class="mdi mdi-clock-outline"></i> Depuis le
                                                        <?php echo date("d/m/Y à H:i:s", strtotime($iafic['date_creat_fiche'])); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <?php } ?>

                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="btn btn-sm btn-link font-size-14 btn-block text-center"
                                        href="javascript:void(0)">
                                        <i class="uil-arrow-circle-right me-1"></i> <span>Continuer la saisie..</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--/Fin notifications-->

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item user text-start d-flex align-items-center"
                                id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <?php if($_SESSION['photo_site']!=''){ ?>
                                <img class="rounded-circle header-profile-user"
                                    src="photo/<?php echo $_SESSION['photo_site']; ?>" alt="Photo de profil" />
                                <?php }else{ ?>
                                <img class="rounded-circle header-profile-user" src="photo/profile-2398782.png"
                                    alt="Photo de profil">
                                <?php } ?>
                                <span class="ms-2 d-none d-sm-block user-item-desc">
                                    <span class="user-name"><?php echo $_SESSION['nom_utilisateur_site']; ?></span>
                                    <span class="user-sub-title"><?php echo $_SESSION['nom_type_groupe']; ?></span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end pt-0">
                                <a class="dropdown-item" href="profil/profil.php"><i
                                        class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i>
                                    <span class="align-middle">Profile</span></a>

                                <a class="dropdown-item" href="deconex.php"><i
                                        class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span
                                        class="align-middle">Déconexion</span></a>
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
                        <?php include('titre_ent_ac.php'); ?>
                    </span>
                </a>

                <a href="accueil.php" class="logo logo-light">
                    <span class="logo-lg">
                        <?php include('titre_ent_ac.php'); ?>
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
                            <a href="accueil.php" style="background-color:#251f75; color:#fff;">
                                <i class="icon nav-icon fa fa-home"></i>
                                <span class="menu-item">Dashboard</span>
                            </a>
                        </li>

                        <?php if($_SESSION['acces_client']==1 ){ ?>
                        <li>
                            <a href="client/client.php">
                                <i class="icon nav-icon fa fa-users"></i>
                                <span class="menu-item" data-key="t-email">Clients</span>
                            </a>
                        </li>
                        <?php } ?>

                        <?php if($_SESSION['acces_fournisseur']==1 ){ ?>
                        <li>
                            <a href="fournisseur/fournisseur.php">
                                <i class="icon nav-icon fa fa-handshake"></i>
                                <span class="menu-item" data-key="t-email">fournisseurs</span>
                            </a>
                        </li>
                        <?php } ?>

                        <?php if($_SESSION['acces_demande_decaissement']==1 ){ ?>
                        <li>
                            <a href="demande_decaissement/demande_decaissement.php">
                                <i class="icon nav-icon fa fa-money-bills"></i>
                                <span class="menu-item" data-key="t-email">Demande de décaissement</span>
                            </a>
                        </li>
                        <?php } ?>

                        <?php if($_SESSION['acces_caisse']==1 ){ ?>
                        <li>
                            <a href="caisse/caisse.php">
                                <i class="icon nav-icon fas fa-cash-register"></i>
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
                                <li><a href="reglement_fournisseur/reglement_fournisseur.php"
                                        data-key="t-p-grid">Reglement Fournisseurs</a></li>
                                <li><a href="reglement_client/reglement_client.php" data-key="t-p-list">Reglement
                                        clients</a></li>
                                <li><a href="facture_normalise/facture_normalise.php" data-key="t-p-list">Factures
                                        normalisées</a></li>
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
                                <li><a href="dossier/dossier_import.php" data-key="t-p-grid">Import</a></li>
                                <li><a href="dossier_exp/dossier_export.php" data-key="t-p-list">Export</a></li>
                                <li><a href="dossier/etat_codage.php" data-key="t-p-list">Etat de codage</a></li>
                            </ul>
                        </li>

                        <li class="bg-warning">
                            <a href="suivi_general/suivi_general.php">
                                <i class="fa fa-eye" data-feather="briefcase_"></i>
                                <span class="menu-item" data-key="t-projects">Suivi général</span>
                            </a>
                        </li>

                        <?php } ?>
                        <?php if($_SESSION['acces_groupage']==1 ){ ?>
                        <li>
                            <a href="groupage/groupage.php">
                                <i class="icon nav-icon fa fa-globe"></i>
                                <span class="menu-item" data-key="t-email">Groupage</span>
                            </a>
                        </li>
                        <?php } ?>

                        <?php if($_SESSION['acces_autre_envoi']==1 ){ ?>
                        <li>
                            <a href="autre_envoi/autre_envoi.php">
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
                                <li><a a href="autre_envoi_france/autre_envoi_france.php" data-key="t-p-grid"> Colis accompagnés</a></li>
                                <li><a href="decaissement/decaissement.php" data-key="t-p-list"> Colis DHL</a></li>
                                <li><a href="declaration/declaration.php" data-key="t-p-list"> Colis Fret</a></li>
                                <li><a href="declaration/declaration.php" data-key="t-p-list"> Colis Maritime</a></li>
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
                                <li><a href="encaissement/encaissement.php" data-key="t-p-grid"> Encaissement</a></li>
                                <li><a href="decaissement/decaissement.php" data-key="t-p-list"> Décaissement</a></li>
                                <li><a href="declaration/declaration.php" data-key="t-p-list"> Déclaration</a></li>
                            </ul>
                        </li>
                        <?php } ?>


                        <?php if($_SESSION['acces_rh']==1 ){ ?>
                        <li>
                            <a href="personnel/personnel.php" class="active">
                                <i class="icon nav-icon fa fa-user"></i>
                                <span class="menu-item">Gestion du personnel</span>
                            </a>
                        </li>
                        <?php } ?>

                        <li>
                            <a href="rapport/rapport.php" class="active">
                                <i class="icon nav-icon fa fa-file-text"></i>
                                <span class="menu-item">Rapport journalier</span>
                            </a>
                        </li>

                        <li class="menu-title">Sécurité</li>

                        <li>
                            <a href="profil/profil.php">
                                <i class="icon nav-icon fa fa-user-circle"></i>
                                <span class="menu-item">Profile</span>
                            </a>
                        </li>
                        <?php if($_SESSION['acces_secur']==1 ){ ?>
                        <li>
                            <a href="utilisateur/utilisateur.php">
                                <i class="icon nav-icon fa fa-users"></i>
                                <span class="menu-item">Utilisateur</span>
                            </a>
                        </li>
                        <li>
                            <a href="historique/historique.php">
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
                                <h4 class="mb-0">Accès rapides</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a>
                                        </li>
                                        <li class="breadcrumb-item active">Analytique</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <section id="minimal-statistics">


                            <!-- Contenu du tableau de bord -->
                            <div class="row">

                                <div class="col-xl-3 col-sm-6">
                                    <a href="fournisseur/fournisseur.php" class="card-link">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div
                                                                class="bg-primary-subtle text-primary rounded-circle font-size-18">
                                                                <i class="fas fa-users"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1 text-truncate text-muted">Fournisseurs</p>
                                                        <h5 class="font-size-16 mb-0">
                                                            <?php 
    echo $dataProvider->countTableRows('fournisseur');
                            ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                </div><!-- end col -->

                                <div class="col-xl-3 col-sm-6">
                                    <a href="demande_decaissement/demande_decaissement.php" class="card-link">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div
                                                                class="bg-primary-subtle text-primary rounded-circle font-size-18">
                                                                <i class="fas fa-hand-holding-usd"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1 text-truncate text-muted">Demandes de
                                                            décaissement</p>
                                                        <h5 class="font-size-16 mb-0">
                                                            <?php 
    echo $dataProvider->countTableRows('demande_decaissement');
                            ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                </div><!-- end col -->

                                <div class="col-xl-3 col-sm-6">
                                    <a href="caisse/caisse.php" class="card-link">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div
                                                                class="bg-primary-subtle text-primary rounded-circle font-size-18">
                                                                <i class="fas fa-cash-register"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1 text-truncate text-muted">Caisse</p>
                                                        <h5 class="font-size-16 mb-0">
                                                            <?php 
    echo $dataProvider->countTableRows('caisse');
                            ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </a>
                                </div><!-- end col -->

                                <div class="col-xl-3 col-sm-6">
                                    <a href="reglement_fournisseur/reglement_fournisseur.php" class="card-link">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div
                                                                class="bg-primary-subtle text-primary rounded-circle font-size-18">
                                                                <i class="fas fa-money-check-alt"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1 text-truncate text-muted">Règlements fournisseurs
                                                        </p>
                                                        <h5 class="font-size-16 mb-0">
                                                            <?php 
    echo $dataProvider->countTableRows('reglement_fournisseur');
                            ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div><!-- end card body-->
                                        </div><!-- end card -->
                                    </a>
                                </div><!-- end col -->

                                <div class="col-xl-3 col-sm-6">
                                    <a href="reglement_client/reglement_client.php" class="card-link">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div
                                                                class="bg-primary-subtle text-primary rounded-circle font-size-18">
                                                                <i class="fas fa-receipt"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1 text-truncate text-muted">Règlements clients</p>
                                                        <h5 class="font-size-16 mb-0">
                                                            <?php 
    echo $dataProvider->countTableRows('reglement_client');
                            ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div><!-- end card body-->
                                        </div><!-- end card -->
                                    </a>
                                </div><!-- end col -->

                                <div class="col-xl-3 col-sm-6">
                                    <a href="facture_normalise/facture_normalise.php" class="card-link">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div
                                                                class="bg-primary-subtle text-primary rounded-circle font-size-18">
                                                                <i class="fas fa-file-invoice-dollar"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="mb-1 text-truncate text-muted">Factures normalisées
                                                        </p>
                                                        <h5 class="font-size-16 mb-0">
                                                            <?php 
    echo $dataProvider->countTableRows('facture_normalise');
                            ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div><!-- end card body-->
                                        </div><!-- end card -->
                                    </a>
                                </div><!-- end col -->

                                <!-- Ajoutez les autres colonnes de la même manière -->

                            </div>
                            <!-- /Contenu du tableau de bord -->


                            <!--Point Financier-->

                            <div class="row">
                                <div class="col-12 mt-3 mb-1">
                                    <h4 class="text-uppercase">Point caisse et charges</h4>
                                    <!--<p>Statistics on minimal cards.</p>-->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 col-sm-6">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="font-size-xs text-uppercase">Total Entrées caisse</h6>
                                                    <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">

                                                        <?php
                                                
                                                //Total Approvisionnement caisse
                                                $ap=$con->prepare('SELECT * FROM caisse WHERE id_caisse!="" ');
                                                $ap->execute();
                                                $tot_ap_caisse=0;
                                                while($iap=$ap->fetch())
                                                {
                                                    $tot_ap_caisse=$iap['montant_caisse']+$tot_ap_caisse;
                                                }

                                                //Total Encaissement caisse
                                                $tot_ec_caisse=0;
                                                /*
                                                $ec=$con->prepare('SELECT * FROM encaissement WHERE id_encaissement!="" ');
                                                $ec->execute();
                                                $tot_ec_caisse=0;
                                                while($iec=$ec->fetch())
                                                {
                                                    $tot_ec_caisse=$iec['montant_encaissement']+$tot_ec_caisse;
                                                }
                                                */
                                                
                                                $tot_entree=$tot_ap_caisse+$tot_ec_caisse;
                                                
                                                echo number_format($tot_entree,0,',',' ').' FCFA';
                                                
                                                ?>
                                                    </h4>
                                                    <div class="text-muted">Entrées Caisse</div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-light btn-sm" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span class="text-muted">Détails<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Excel</a>
                                                            <a class="dropdown-item" href="#">PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apex-charts mt-3" id="sparkline-chart-1"
                                                style="min-height: 50px;">
                                                <div id="apexchartsl6jhkyzo"
                                                    class="apexcharts-canvas apexchartsl6jhkyzo apexcharts-theme-light"
                                                    style="width: 253px; height: 50px;"><svg id="SvgjsSvg1695"
                                                        width="253" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1697" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(17.433333333333334, 0)">
                                                            <defs id="SvgjsDefs1696">
                                                                <linearGradient id="SvgjsLinearGradient1700" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                                    <stop id="SvgjsStop1701" stop-opacity="0.4"
                                                                        stop-color="rgba(216,227,240,0.4)" offset="0">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1702" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1703" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                </linearGradient>
                                                                <clipPath id="gridRectMaskl6jhkyzo">
                                                                    <rect id="SvgjsRect1705" width="257" height="50"
                                                                        x="-15.433333333333334" y="0" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskl6jhkyzo"></clipPath>
                                                                <clipPath id="nonForecastMaskl6jhkyzo"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskl6jhkyzo">
                                                                    <rect id="SvgjsRect1706" width="230.13333333333333"
                                                                        height="54" x="-2" y="-2" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <rect id="SvgjsRect1704" width="11.306666666666665"
                                                                height="50" x="197.69331583658854" y="0" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke-dasharray="3"
                                                                fill="url(#SvgjsLinearGradient1700)"
                                                                class="apexcharts-xcrosshairs" y2="50" filter="none"
                                                                fill-opacity="0.9" x1="197.69331583658854"
                                                                x2="197.69331583658854"></rect>
                                                            <g id="SvgjsG1733" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1734" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1742" class="apexcharts-grid">
                                                                <g id="SvgjsG1743"
                                                                    class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1745" x1="-13.433333333333334"
                                                                        y1="0" x2="239.56666666666666" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1746" x1="-13.433333333333334"
                                                                        y1="12.5" x2="239.56666666666666" y2="12.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1747" x1="-13.433333333333334"
                                                                        y1="25" x2="239.56666666666666" y2="25"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1748" x1="-13.433333333333334"
                                                                        y1="37.5" x2="239.56666666666666" y2="37.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1749" x1="-13.433333333333334"
                                                                        y1="50" x2="239.56666666666666" y2="50"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1744" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1751" x1="0" y1="50"
                                                                    x2="226.13333333333333" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1750" x1="0" y1="1" x2="0" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1707"
                                                                class="apexcharts-bar-series apexcharts-plot-series">
                                                                <g id="SvgjsG1708" class="apexcharts-series" rel="1"
                                                                    seriesName="seriesx1" data:realIndex="0">
                                                                    <path id="SvgjsPath1712"
                                                                        d="M -5.653333333333332 50L -5.653333333333332 45.833333333333336Q -5.653333333333332 45.833333333333336 -5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336Q 5.653333333333332 45.833333333333336 5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M -5.653333333333332 50L -5.653333333333332 45.833333333333336Q -5.653333333333332 45.833333333333336 -5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336Q 5.653333333333332 45.833333333333336 5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        pathFrom="M -5.653333333333332 50L -5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L -5.653333333333332 50"
                                                                        cy="45.833333333333336" cx="5.653333333333332"
                                                                        j="0" val="10" barHeight="4.166666666666667"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1714"
                                                                        d="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        pathFrom="M 16.959999999999997 50L 16.959999999999997 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 16.959999999999997 50"
                                                                        cy="41.666666666666664" cx="28.266666666666662"
                                                                        j="1" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1716"
                                                                        d="M 39.57333333333332 50L 39.57333333333332 43.75Q 39.57333333333332 43.75 39.57333333333332 43.75L 50.87999999999999 43.75Q 50.87999999999999 43.75 50.87999999999999 43.75L 50.87999999999999 43.75L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 39.57333333333332 50L 39.57333333333332 43.75Q 39.57333333333332 43.75 39.57333333333332 43.75L 50.87999999999999 43.75Q 50.87999999999999 43.75 50.87999999999999 43.75L 50.87999999999999 43.75L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        pathFrom="M 39.57333333333332 50L 39.57333333333332 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 39.57333333333332 50"
                                                                        cy="43.75" cx="50.87999999999999" j="2" val="15"
                                                                        barHeight="6.25" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1718"
                                                                        d="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        pathFrom="M 62.18666666666665 50L 62.18666666666665 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 62.18666666666665 50"
                                                                        cy="33.33333333333333" cx="73.49333333333331"
                                                                        j="3" val="40" barHeight="16.666666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1720"
                                                                        d="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        pathFrom="M 84.79999999999998 50L 84.79999999999998 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 84.79999999999998 50"
                                                                        cy="41.666666666666664" cx="96.10666666666665"
                                                                        j="4" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1722"
                                                                        d="M 107.41333333333333 50L 107.41333333333333 29.166666666666664Q 107.41333333333333 29.166666666666664 107.41333333333333 29.166666666666664L 118.72 29.166666666666664Q 118.72 29.166666666666664 118.72 29.166666666666664L 118.72 29.166666666666664L 118.72 50L 118.72 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 107.41333333333333 50L 107.41333333333333 29.166666666666664Q 107.41333333333333 29.166666666666664 107.41333333333333 29.166666666666664L 118.72 29.166666666666664Q 118.72 29.166666666666664 118.72 29.166666666666664L 118.72 29.166666666666664L 118.72 50L 118.72 50z"
                                                                        pathFrom="M 107.41333333333333 50L 107.41333333333333 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 107.41333333333333 50"
                                                                        cy="29.166666666666664" cx="118.72" j="5"
                                                                        val="50" barHeight="20.833333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1724"
                                                                        d="M 130.02666666666664 50L 130.02666666666664 20.833333333333332Q 130.02666666666664 20.833333333333332 130.02666666666664 20.833333333333332L 141.33333333333331 20.833333333333332Q 141.33333333333331 20.833333333333332 141.33333333333331 20.833333333333332L 141.33333333333331 20.833333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 130.02666666666664 50L 130.02666666666664 20.833333333333332Q 130.02666666666664 20.833333333333332 130.02666666666664 20.833333333333332L 141.33333333333331 20.833333333333332Q 141.33333333333331 20.833333333333332 141.33333333333331 20.833333333333332L 141.33333333333331 20.833333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        pathFrom="M 130.02666666666664 50L 130.02666666666664 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 130.02666666666664 50"
                                                                        cy="20.833333333333332" cx="141.33333333333331"
                                                                        j="6" val="70" barHeight="29.166666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1726"
                                                                        d="M 152.64 50L 152.64 25Q 152.64 25 152.64 25L 163.94666666666666 25Q 163.94666666666666 25 163.94666666666666 25L 163.94666666666666 25L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 152.64 50L 152.64 25Q 152.64 25 152.64 25L 163.94666666666666 25Q 163.94666666666666 25 163.94666666666666 25L 163.94666666666666 25L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        pathFrom="M 152.64 50L 152.64 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 152.64 50"
                                                                        cy="25" cx="163.94666666666666" j="7" val="60"
                                                                        barHeight="25" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1728"
                                                                        d="M 175.2533333333333 50L 175.2533333333333 12.5Q 175.2533333333333 12.5 175.2533333333333 12.5L 186.55999999999997 12.5Q 186.55999999999997 12.5 186.55999999999997 12.5L 186.55999999999997 12.5L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 175.2533333333333 50L 175.2533333333333 12.5Q 175.2533333333333 12.5 175.2533333333333 12.5L 186.55999999999997 12.5Q 186.55999999999997 12.5 186.55999999999997 12.5L 186.55999999999997 12.5L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        pathFrom="M 175.2533333333333 50L 175.2533333333333 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 175.2533333333333 50"
                                                                        cy="12.5" cx="186.55999999999997" j="8" val="90"
                                                                        barHeight="37.5" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1730"
                                                                        d="M 197.86666666666665 50L 197.86666666666665 20.833333333333332Q 197.86666666666665 20.833333333333332 197.86666666666665 20.833333333333332L 209.17333333333332 20.833333333333332Q 209.17333333333332 20.833333333333332 209.17333333333332 20.833333333333332L 209.17333333333332 20.833333333333332L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 197.86666666666665 50L 197.86666666666665 20.833333333333332Q 197.86666666666665 20.833333333333332 197.86666666666665 20.833333333333332L 209.17333333333332 20.833333333333332Q 209.17333333333332 20.833333333333332 209.17333333333332 20.833333333333332L 209.17333333333332 20.833333333333332L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        pathFrom="M 197.86666666666665 50L 197.86666666666665 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 197.86666666666665 50"
                                                                        cy="20.833333333333332" cx="209.17333333333332"
                                                                        j="9" val="70" barHeight="29.166666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1732"
                                                                        d="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        pathFrom="M 220.48 50L 220.48 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 220.48 50"
                                                                        cy="4.166666666666664" cx="231.78666666666666"
                                                                        j="10" val="110" barHeight="45.833333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <g id="SvgjsG1710"
                                                                        class="apexcharts-bar-goals-markers"
                                                                        style="pointer-events: none">
                                                                        <g id="SvgjsG1711"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1713"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1715"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1717"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1719"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1721"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1723"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1725"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1727"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1729"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1731"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1709" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1752" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1753" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1754" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1755" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1756" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG1741" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1698" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light"
                                                        style="left: 158.671px; top: -20px;">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            10</div>
                                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                            style="order: 1; display: flex;"><span
                                                                class="apexcharts-tooltip-marker"
                                                                style="background-color: rgba(3, 142, 220, 0.85);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value">70</span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="font-size-xs text-uppercase">Total Sorties Caisse</h6>
                                                    <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                                        <?php
                                                
                                                //Total Décaissement
                                                $dd=$con->prepare('SELECT * FROM demande_decaissement WHERE etat_demande=3 ');
                                                $dd->execute();
                                                $tot_dd_caisse=0;
                                                while($idd=$dd->fetch())
                                                {
                                                    $tot_dd_caisse=$idd['montant_demande_decaissement']+$tot_dd_caisse;
                                                }
                                                

                                                echo number_format($tot_dd_caisse,0,',',' ').' FCFA';
                                                
                                                ?>
                                                    </h4>
                                                    <div class="text-muted">Sorties Caisse</div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-light btn-sm" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span class="text-muted">Détails<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Excel</a>
                                                            <a class="dropdown-item" href="#">PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apex-charts mt-3" id="sparkline-chart-2"
                                                style="min-height: 50px;">
                                                <div id="apexchartsrequonla"
                                                    class="apexcharts-canvas apexchartsrequonla apexcharts-theme-light"
                                                    style="width: 253px; height: 50px;"><svg id="SvgjsSvg1758"
                                                        width="253" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1760" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(0, 0)">
                                                            <defs id="SvgjsDefs1759">
                                                                <clipPath id="gridRectMaskrequonla">
                                                                    <rect id="SvgjsRect1765" width="259" height="52"
                                                                        x="-3" y="-1" rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskrequonla"></clipPath>
                                                                <clipPath id="nonForecastMaskrequonla"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskrequonla">
                                                                    <rect id="SvgjsRect1766" width="257" height="54"
                                                                        x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <linearGradient id="SvgjsLinearGradient1771" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                                    <stop id="SvgjsStop1772" stop-opacity="0.45"
                                                                        stop-color="rgba(3,142,220,0.45)" offset="0.5">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1773" stop-opacity="0.05"
                                                                        stop-color="rgba(255,255,255,0.05)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1774" stop-opacity="0.05"
                                                                        stop-color="rgba(255,255,255,0.05)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1775" stop-opacity="0.45"
                                                                        stop-color="rgba(3,142,220,0.45)" offset="1">
                                                                    </stop>
                                                                </linearGradient>
                                                            </defs>
                                                            <line id="SvgjsLine1764" x1="0" y1="0" x2="0" y2="50"
                                                                stroke="#b6b6b6" stroke-dasharray="3"
                                                                stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                                                x="0" y="0" width="1" height="50" fill="#b1b9c4"
                                                                filter="none" fill-opacity="0.9" stroke-width="1">
                                                            </line>
                                                            <g id="SvgjsG1778" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1779" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1791" class="apexcharts-grid">
                                                                <g id="SvgjsG1792"
                                                                    class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1794" x1="0" y1="0" x2="253"
                                                                        y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1795" x1="0" y1="10" x2="253"
                                                                        y2="10" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1796" x1="0" y1="20" x2="253"
                                                                        y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1797" x1="0" y1="30" x2="253"
                                                                        y2="30" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1798" x1="0" y1="40" x2="253"
                                                                        y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1799" x1="0" y1="50" x2="253"
                                                                        y2="50" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1793" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1801" x1="0" y1="50" x2="253" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1800" x1="0" y1="1" x2="0" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1767"
                                                                class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1768" class="apexcharts-series"
                                                                    seriesName="SeriesxA" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path id="SvgjsPath1776"
                                                                        d="M 0 50L 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30C 252.99999999999997 30 252.99999999999997 30 252.99999999999997 50M 252.99999999999997 30z"
                                                                        fill="url(#SvgjsLinearGradient1771)"
                                                                        fill-opacity="1" stroke-opacity="1"
                                                                        stroke-linecap="butt" stroke-width="0"
                                                                        stroke-dasharray="0" class="apexcharts-area"
                                                                        index="0" clip-path="url(#gridRectMaskrequonla)"
                                                                        pathTo="M 0 50L 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30C 252.99999999999997 30 252.99999999999997 30 252.99999999999997 50M 252.99999999999997 30z"
                                                                        pathFrom="M -1 50L -1 50L 28.111111111111107 50L 56.222222222222214 50L 84.33333333333333 50L 112.44444444444443 50L 140.55555555555554 50L 168.66666666666666 50L 196.77777777777777 50L 224.88888888888886 50L 252.99999999999997 50">
                                                                    </path>
                                                                    <path id="SvgjsPath1777"
                                                                        d="M 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30"
                                                                        fill="none" fill-opacity="1" stroke="#038edc"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMaskrequonla)"
                                                                        pathTo="M 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30"
                                                                        pathFrom="M -1 50L -1 50L 28.111111111111107 50L 56.222222222222214 50L 84.33333333333333 50L 112.44444444444443 50L 140.55555555555554 50L 168.66666666666666 50L 196.77777777777777 50L 224.88888888888886 50L 252.99999999999997 50">
                                                                    </path>
                                                                    <g id="SvgjsG1769"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="0">
                                                                        <g class="apexcharts-series-markers">
                                                                            <circle id="SvgjsCircle1807" r="0" cx="0"
                                                                                cy="0"
                                                                                class="apexcharts-marker wd5xa0y2e no-pointer-events"
                                                                                stroke="#ffffff" fill="#038edc"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9"
                                                                                default-marker-size="0"></circle>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1770" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1802" x1="0" y1="0" x2="253" y2="0"
                                                                stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1803" x1="0" y1="0" x2="253" y2="0"
                                                                stroke-dasharray="0" stroke-width="0"
                                                                stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1804" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1805" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <rect id="SvgjsRect1763" width="0" height="0" x="0" y="0" rx="0"
                                                            ry="0" opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fefefe"></rect>
                                                        <g id="SvgjsG1790" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1761" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                            <span class="apexcharts-tooltip-marker"
                                                                style="background-color: rgb(3, 142, 220);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="font-size-xs text-uppercase">Solde Caisse</h6>
                                                    <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                                        <?php
                                                
                                                //Solde caisse
                                               $solde=$tot_entree-$tot_dd_caisse;
                                                
                                                echo number_format($solde,0,',',' ').' FCFA';
                                                
                                                ?>
                                                    </h4>
                                                    <div class="text-muted">En temps réel</div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-light btn-sm" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span class="text-muted">Détails<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Excel</a>
                                                            <a class="dropdown-item" href="#">PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apex-charts mt-3" id="sparkline-chart-3"
                                                style="min-height: 50px;">
                                                <div id="apexchartsd0m4owgt"
                                                    class="apexcharts-canvas apexchartsd0m4owgt apexcharts-theme-light"
                                                    style="width: 253px; height: 50px;"><svg id="SvgjsSvg1808"
                                                        width="253" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1810" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(17.433333333333334, 0)">
                                                            <defs id="SvgjsDefs1809">
                                                                <linearGradient id="SvgjsLinearGradient1813" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                                    <stop id="SvgjsStop1814" stop-opacity="0.4"
                                                                        stop-color="rgba(216,227,240,0.4)" offset="0">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1815" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1816" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                </linearGradient>
                                                                <clipPath id="gridRectMaskd0m4owgt">
                                                                    <rect id="SvgjsRect1818" width="257" height="50"
                                                                        x="-15.433333333333334" y="0" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskd0m4owgt"></clipPath>
                                                                <clipPath id="nonForecastMaskd0m4owgt"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskd0m4owgt">
                                                                    <rect id="SvgjsRect1819" width="230.13333333333333"
                                                                        height="54" x="-2" y="-2" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <rect id="SvgjsRect1817" width="11.306666666666665"
                                                                height="50" x="0" y="0" rx="0" ry="0" opacity="1"
                                                                stroke-width="0" stroke-dasharray="3"
                                                                fill="url(#SvgjsLinearGradient1813)"
                                                                class="apexcharts-xcrosshairs" y2="50" filter="none"
                                                                fill-opacity="0.9"></rect>
                                                            <g id="SvgjsG1846" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1847" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856"
                                                                    class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1858" x1="-13.433333333333334"
                                                                        y1="0" x2="239.56666666666666" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1859" x1="-13.433333333333334"
                                                                        y1="12.5" x2="239.56666666666666" y2="12.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="-13.433333333333334"
                                                                        y1="25" x2="239.56666666666666" y2="25"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1861" x1="-13.433333333333334"
                                                                        y1="37.5" x2="239.56666666666666" y2="37.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1862" x1="-13.433333333333334"
                                                                        y1="50" x2="239.56666666666666" y2="50"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1864" x1="0" y1="50"
                                                                    x2="226.13333333333333" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1863" x1="0" y1="1" x2="0" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1820"
                                                                class="apexcharts-bar-series apexcharts-plot-series">
                                                                <g id="SvgjsG1821" class="apexcharts-series" rel="1"
                                                                    seriesName="seriesx1" data:realIndex="0">
                                                                    <path id="SvgjsPath1825"
                                                                        d="M -5.653333333333332 50L -5.653333333333332 33.33333333333333Q -5.653333333333332 33.33333333333333 -5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333Q 5.653333333333332 33.33333333333333 5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M -5.653333333333332 50L -5.653333333333332 33.33333333333333Q -5.653333333333332 33.33333333333333 -5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333Q 5.653333333333332 33.33333333333333 5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        pathFrom="M -5.653333333333332 50L -5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L -5.653333333333332 50"
                                                                        cy="33.33333333333333" cx="5.653333333333332"
                                                                        j="0" val="40" barHeight="16.666666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1827"
                                                                        d="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        pathFrom="M 16.959999999999997 50L 16.959999999999997 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 16.959999999999997 50"
                                                                        cy="41.666666666666664" cx="28.266666666666662"
                                                                        j="1" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1829"
                                                                        d="M 39.57333333333332 50L 39.57333333333332 37.5Q 39.57333333333332 37.5 39.57333333333332 37.5L 50.87999999999999 37.5Q 50.87999999999999 37.5 50.87999999999999 37.5L 50.87999999999999 37.5L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 39.57333333333332 50L 39.57333333333332 37.5Q 39.57333333333332 37.5 39.57333333333332 37.5L 50.87999999999999 37.5Q 50.87999999999999 37.5 50.87999999999999 37.5L 50.87999999999999 37.5L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        pathFrom="M 39.57333333333332 50L 39.57333333333332 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 39.57333333333332 50"
                                                                        cy="37.5" cx="50.87999999999999" j="2" val="30"
                                                                        barHeight="12.5" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1831"
                                                                        d="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        pathFrom="M 62.18666666666665 50L 62.18666666666665 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 62.18666666666665 50"
                                                                        cy="33.33333333333333" cx="73.49333333333331"
                                                                        j="3" val="40" barHeight="16.666666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1833"
                                                                        d="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        pathFrom="M 84.79999999999998 50L 84.79999999999998 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 84.79999999999998 50"
                                                                        cy="41.666666666666664" cx="96.10666666666665"
                                                                        j="4" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1835"
                                                                        d="M 107.41333333333333 50L 107.41333333333333 25Q 107.41333333333333 25 107.41333333333333 25L 118.72 25Q 118.72 25 118.72 25L 118.72 25L 118.72 50L 118.72 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 107.41333333333333 50L 107.41333333333333 25Q 107.41333333333333 25 107.41333333333333 25L 118.72 25Q 118.72 25 118.72 25L 118.72 25L 118.72 50L 118.72 50z"
                                                                        pathFrom="M 107.41333333333333 50L 107.41333333333333 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 107.41333333333333 50"
                                                                        cy="25" cx="118.72" j="5" val="60"
                                                                        barHeight="25" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1837"
                                                                        d="M 130.02666666666664 50L 130.02666666666664 27.083333333333332Q 130.02666666666664 27.083333333333332 130.02666666666664 27.083333333333332L 141.33333333333331 27.083333333333332Q 141.33333333333331 27.083333333333332 141.33333333333331 27.083333333333332L 141.33333333333331 27.083333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 130.02666666666664 50L 130.02666666666664 27.083333333333332Q 130.02666666666664 27.083333333333332 130.02666666666664 27.083333333333332L 141.33333333333331 27.083333333333332Q 141.33333333333331 27.083333333333332 141.33333333333331 27.083333333333332L 141.33333333333331 27.083333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        pathFrom="M 130.02666666666664 50L 130.02666666666664 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 130.02666666666664 50"
                                                                        cy="27.083333333333332" cx="141.33333333333331"
                                                                        j="6" val="55" barHeight="22.916666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1839"
                                                                        d="M 152.64 50L 152.64 20.833333333333332Q 152.64 20.833333333333332 152.64 20.833333333333332L 163.94666666666666 20.833333333333332Q 163.94666666666666 20.833333333333332 163.94666666666666 20.833333333333332L 163.94666666666666 20.833333333333332L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 152.64 50L 152.64 20.833333333333332Q 152.64 20.833333333333332 152.64 20.833333333333332L 163.94666666666666 20.833333333333332Q 163.94666666666666 20.833333333333332 163.94666666666666 20.833333333333332L 163.94666666666666 20.833333333333332L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        pathFrom="M 152.64 50L 152.64 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 152.64 50"
                                                                        cy="20.833333333333332" cx="163.94666666666666"
                                                                        j="7" val="70" barHeight="29.166666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1841"
                                                                        d="M 175.2533333333333 50L 175.2533333333333 10.416666666666664Q 175.2533333333333 10.416666666666664 175.2533333333333 10.416666666666664L 186.55999999999997 10.416666666666664Q 186.55999999999997 10.416666666666664 186.55999999999997 10.416666666666664L 186.55999999999997 10.416666666666664L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 175.2533333333333 50L 175.2533333333333 10.416666666666664Q 175.2533333333333 10.416666666666664 175.2533333333333 10.416666666666664L 186.55999999999997 10.416666666666664Q 186.55999999999997 10.416666666666664 186.55999999999997 10.416666666666664L 186.55999999999997 10.416666666666664L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        pathFrom="M 175.2533333333333 50L 175.2533333333333 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 175.2533333333333 50"
                                                                        cy="10.416666666666664" cx="186.55999999999997"
                                                                        j="8" val="95" barHeight="39.583333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1843"
                                                                        d="M 197.86666666666665 50L 197.86666666666665 22.916666666666664Q 197.86666666666665 22.916666666666664 197.86666666666665 22.916666666666664L 209.17333333333332 22.916666666666664Q 209.17333333333332 22.916666666666664 209.17333333333332 22.916666666666664L 209.17333333333332 22.916666666666664L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 197.86666666666665 50L 197.86666666666665 22.916666666666664Q 197.86666666666665 22.916666666666664 197.86666666666665 22.916666666666664L 209.17333333333332 22.916666666666664Q 209.17333333333332 22.916666666666664 209.17333333333332 22.916666666666664L 209.17333333333332 22.916666666666664L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        pathFrom="M 197.86666666666665 50L 197.86666666666665 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 197.86666666666665 50"
                                                                        cy="22.916666666666664" cx="209.17333333333332"
                                                                        j="9" val="65" barHeight="27.083333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1845"
                                                                        d="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        pathFrom="M 220.48 50L 220.48 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 220.48 50"
                                                                        cy="4.166666666666664" cx="231.78666666666666"
                                                                        j="10" val="110" barHeight="45.833333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <g id="SvgjsG1823"
                                                                        class="apexcharts-bar-goals-markers"
                                                                        style="pointer-events: none">
                                                                        <g id="SvgjsG1824"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1826"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1828"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1830"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1832"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1834"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1836"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1838"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1840"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1842"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1844"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1822" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1865" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1866" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1867" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1868" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1869" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG1854" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1811" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                            <span class="apexcharts-tooltip-marker"
                                                                style="background-color: rgb(3, 142, 220);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="font-size-xs text-uppercase">Charges Totales</h6>
                                                    <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                                        15 000 000 FCFA
                                                    </h4>
                                                    <div class="text-muted">Salaires, Factures, etc.</div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-light btn-sm" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span class="text-muted">Détails<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Excel</a>
                                                            <a class="dropdown-item" href="#">PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apex-charts mt-3" id="sparkline-chart-4"
                                                style="min-height: 50px;">
                                                <div id="apexchartsq366t7xs"
                                                    class="apexcharts-canvas apexchartsq366t7xs apexcharts-theme-light"
                                                    style="width: 253px; height: 50px;"><svg id="SvgjsSvg1871"
                                                        width="253" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1873" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(0, 0)">
                                                            <defs id="SvgjsDefs1872">
                                                                <clipPath id="gridRectMaskq366t7xs">
                                                                    <rect id="SvgjsRect1878" width="259" height="52"
                                                                        x="-3" y="-1" rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskq366t7xs"></clipPath>
                                                                <clipPath id="nonForecastMaskq366t7xs"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskq366t7xs">
                                                                    <rect id="SvgjsRect1879" width="257" height="54"
                                                                        x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <linearGradient id="SvgjsLinearGradient1884" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                                    <stop id="SvgjsStop1885" stop-opacity="0.45"
                                                                        stop-color="rgba(3,142,220,0.45)" offset="0.5">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1886" stop-opacity="0.05"
                                                                        stop-color="rgba(255,255,255,0.05)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1887" stop-opacity="0.05"
                                                                        stop-color="rgba(255,255,255,0.05)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1888" stop-opacity="0.45"
                                                                        stop-color="rgba(3,142,220,0.45)" offset="1">
                                                                    </stop>
                                                                </linearGradient>
                                                            </defs>
                                                            <line id="SvgjsLine1877" x1="0" y1="0" x2="0" y2="50"
                                                                stroke="#b6b6b6" stroke-dasharray="3"
                                                                stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                                                x="0" y="0" width="1" height="50" fill="#b1b9c4"
                                                                filter="none" fill-opacity="0.9" stroke-width="1">
                                                            </line>
                                                            <g id="SvgjsG1891" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1892" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1904" class="apexcharts-grid">
                                                                <g id="SvgjsG1905"
                                                                    class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1907" x1="0" y1="0" x2="253"
                                                                        y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1908" x1="0" y1="10" x2="253"
                                                                        y2="10" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1909" x1="0" y1="20" x2="253"
                                                                        y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1910" x1="0" y1="30" x2="253"
                                                                        y2="30" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1911" x1="0" y1="40" x2="253"
                                                                        y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1912" x1="0" y1="50" x2="253"
                                                                        y2="50" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1906" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1914" x1="0" y1="50" x2="253" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1913" x1="0" y1="1" x2="0" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1880"
                                                                class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1881" class="apexcharts-series"
                                                                    seriesName="SeriesxA" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path id="SvgjsPath1889"
                                                                        d="M 0 50L 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30C 252.99999999999997 30 252.99999999999997 30 252.99999999999997 50M 252.99999999999997 30z"
                                                                        fill="url(#SvgjsLinearGradient1884)"
                                                                        fill-opacity="1" stroke-opacity="1"
                                                                        stroke-linecap="butt" stroke-width="0"
                                                                        stroke-dasharray="0" class="apexcharts-area"
                                                                        index="0" clip-path="url(#gridRectMaskq366t7xs)"
                                                                        pathTo="M 0 50L 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30C 252.99999999999997 30 252.99999999999997 30 252.99999999999997 50M 252.99999999999997 30z"
                                                                        pathFrom="M -1 50L -1 50L 28.111111111111107 50L 56.222222222222214 50L 84.33333333333333 50L 112.44444444444443 50L 140.55555555555554 50L 168.66666666666666 50L 196.77777777777777 50L 224.88888888888886 50L 252.99999999999997 50">
                                                                    </path>
                                                                    <path id="SvgjsPath1890"
                                                                        d="M 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30"
                                                                        fill="none" fill-opacity="1" stroke="#038edc"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMaskq366t7xs)"
                                                                        pathTo="M 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30"
                                                                        pathFrom="M -1 50L -1 50L 28.111111111111107 50L 56.222222222222214 50L 84.33333333333333 50L 112.44444444444443 50L 140.55555555555554 50L 168.66666666666666 50L 196.77777777777777 50L 224.88888888888886 50L 252.99999999999997 50">
                                                                    </path>
                                                                    <g id="SvgjsG1882"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="0">
                                                                        <g class="apexcharts-series-markers">
                                                                            <circle id="SvgjsCircle1920" r="0" cx="0"
                                                                                cy="0"
                                                                                class="apexcharts-marker wcvoycg3r no-pointer-events"
                                                                                stroke="#ffffff" fill="#038edc"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9"
                                                                                default-marker-size="0"></circle>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1883" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1915" x1="0" y1="0" x2="253" y2="0"
                                                                stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1916" x1="0" y1="0" x2="253" y2="0"
                                                                stroke-dasharray="0" stroke-width="0"
                                                                stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1917" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1918" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1919" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <rect id="SvgjsRect1876" width="0" height="0" x="0" y="0" rx="0"
                                                            ry="0" opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fefefe"></rect>
                                                        <g id="SvgjsG1903" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1874" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                            <span class="apexcharts-tooltip-marker"
                                                                style="background-color: rgb(3, 142, 220);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/Point Financier-->


                            <!--Point Financier groupage-->

                            <div class="row">
                                <div class="col-12 mt-3 mb-1">
                                    <h4 class="text-uppercase">Point financier groupages</h4>
                                    <!--<p>Statistics on minimal cards.</p>-->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-4 col-sm-6">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="font-size-xs text-uppercase">Total Entrées groupage</h6>
                                                    <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">

                                                        <?php
                                                
//Calcul Total
$montant_total=0;
$tot=$con->prepare('SELECT * FROM groupage LEFT JOIN colis ON groupage.time_groupage=colis.groupage_time  ');
$tot->execute();
while($itot=$tot->fetch())
{
    $montant_total=$montant_total + ($itot['poids_colis']*$itot['pu_colis']) + $itot['emballage_colis'] + $itot['montant_assurance'];
}
                                                
                                                echo number_format($montant_total,0,',',' ').' FCFA';
                                                
                                                ?>
                                                    </h4>
                                                    <div class="text-muted">Entrées Caisse</div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-light btn-sm" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span class="text-muted">Détails<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Excel</a>
                                                            <a class="dropdown-item" href="#">PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apex-charts mt-3" id="sparkline-chart-1"
                                                style="min-height: 50px;">
                                                <div id="apexchartsl6jhkyzo"
                                                    class="apexcharts-canvas apexchartsl6jhkyzo apexcharts-theme-light"
                                                    style="width: 253px; height: 50px;"><svg id="SvgjsSvg1695"
                                                        width="253" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1697" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(17.433333333333334, 0)">
                                                            <defs id="SvgjsDefs1696">
                                                                <linearGradient id="SvgjsLinearGradient1700" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                                    <stop id="SvgjsStop1701" stop-opacity="0.4"
                                                                        stop-color="rgba(216,227,240,0.4)" offset="0">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1702" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1703" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                </linearGradient>
                                                                <clipPath id="gridRectMaskl6jhkyzo">
                                                                    <rect id="SvgjsRect1705" width="257" height="50"
                                                                        x="-15.433333333333334" y="0" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskl6jhkyzo"></clipPath>
                                                                <clipPath id="nonForecastMaskl6jhkyzo"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskl6jhkyzo">
                                                                    <rect id="SvgjsRect1706" width="230.13333333333333"
                                                                        height="54" x="-2" y="-2" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <rect id="SvgjsRect1704" width="11.306666666666665"
                                                                height="50" x="197.69331583658854" y="0" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke-dasharray="3"
                                                                fill="url(#SvgjsLinearGradient1700)"
                                                                class="apexcharts-xcrosshairs" y2="50" filter="none"
                                                                fill-opacity="0.9" x1="197.69331583658854"
                                                                x2="197.69331583658854"></rect>
                                                            <g id="SvgjsG1733" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1734" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1742" class="apexcharts-grid">
                                                                <g id="SvgjsG1743"
                                                                    class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1745" x1="-13.433333333333334"
                                                                        y1="0" x2="239.56666666666666" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1746" x1="-13.433333333333334"
                                                                        y1="12.5" x2="239.56666666666666" y2="12.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1747" x1="-13.433333333333334"
                                                                        y1="25" x2="239.56666666666666" y2="25"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1748" x1="-13.433333333333334"
                                                                        y1="37.5" x2="239.56666666666666" y2="37.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1749" x1="-13.433333333333334"
                                                                        y1="50" x2="239.56666666666666" y2="50"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1744" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1751" x1="0" y1="50"
                                                                    x2="226.13333333333333" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1750" x1="0" y1="1" x2="0" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1707"
                                                                class="apexcharts-bar-series apexcharts-plot-series">
                                                                <g id="SvgjsG1708" class="apexcharts-series" rel="1"
                                                                    seriesName="seriesx1" data:realIndex="0">
                                                                    <path id="SvgjsPath1712"
                                                                        d="M -5.653333333333332 50L -5.653333333333332 45.833333333333336Q -5.653333333333332 45.833333333333336 -5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336Q 5.653333333333332 45.833333333333336 5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M -5.653333333333332 50L -5.653333333333332 45.833333333333336Q -5.653333333333332 45.833333333333336 -5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336Q 5.653333333333332 45.833333333333336 5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        pathFrom="M -5.653333333333332 50L -5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L -5.653333333333332 50"
                                                                        cy="45.833333333333336" cx="5.653333333333332"
                                                                        j="0" val="10" barHeight="4.166666666666667"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1714"
                                                                        d="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        pathFrom="M 16.959999999999997 50L 16.959999999999997 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 16.959999999999997 50"
                                                                        cy="41.666666666666664" cx="28.266666666666662"
                                                                        j="1" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1716"
                                                                        d="M 39.57333333333332 50L 39.57333333333332 43.75Q 39.57333333333332 43.75 39.57333333333332 43.75L 50.87999999999999 43.75Q 50.87999999999999 43.75 50.87999999999999 43.75L 50.87999999999999 43.75L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 39.57333333333332 50L 39.57333333333332 43.75Q 39.57333333333332 43.75 39.57333333333332 43.75L 50.87999999999999 43.75Q 50.87999999999999 43.75 50.87999999999999 43.75L 50.87999999999999 43.75L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        pathFrom="M 39.57333333333332 50L 39.57333333333332 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 39.57333333333332 50"
                                                                        cy="43.75" cx="50.87999999999999" j="2" val="15"
                                                                        barHeight="6.25" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1718"
                                                                        d="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        pathFrom="M 62.18666666666665 50L 62.18666666666665 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 62.18666666666665 50"
                                                                        cy="33.33333333333333" cx="73.49333333333331"
                                                                        j="3" val="40" barHeight="16.666666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1720"
                                                                        d="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        pathFrom="M 84.79999999999998 50L 84.79999999999998 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 84.79999999999998 50"
                                                                        cy="41.666666666666664" cx="96.10666666666665"
                                                                        j="4" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1722"
                                                                        d="M 107.41333333333333 50L 107.41333333333333 29.166666666666664Q 107.41333333333333 29.166666666666664 107.41333333333333 29.166666666666664L 118.72 29.166666666666664Q 118.72 29.166666666666664 118.72 29.166666666666664L 118.72 29.166666666666664L 118.72 50L 118.72 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 107.41333333333333 50L 107.41333333333333 29.166666666666664Q 107.41333333333333 29.166666666666664 107.41333333333333 29.166666666666664L 118.72 29.166666666666664Q 118.72 29.166666666666664 118.72 29.166666666666664L 118.72 29.166666666666664L 118.72 50L 118.72 50z"
                                                                        pathFrom="M 107.41333333333333 50L 107.41333333333333 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 107.41333333333333 50"
                                                                        cy="29.166666666666664" cx="118.72" j="5"
                                                                        val="50" barHeight="20.833333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1724"
                                                                        d="M 130.02666666666664 50L 130.02666666666664 20.833333333333332Q 130.02666666666664 20.833333333333332 130.02666666666664 20.833333333333332L 141.33333333333331 20.833333333333332Q 141.33333333333331 20.833333333333332 141.33333333333331 20.833333333333332L 141.33333333333331 20.833333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 130.02666666666664 50L 130.02666666666664 20.833333333333332Q 130.02666666666664 20.833333333333332 130.02666666666664 20.833333333333332L 141.33333333333331 20.833333333333332Q 141.33333333333331 20.833333333333332 141.33333333333331 20.833333333333332L 141.33333333333331 20.833333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        pathFrom="M 130.02666666666664 50L 130.02666666666664 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 130.02666666666664 50"
                                                                        cy="20.833333333333332" cx="141.33333333333331"
                                                                        j="6" val="70" barHeight="29.166666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1726"
                                                                        d="M 152.64 50L 152.64 25Q 152.64 25 152.64 25L 163.94666666666666 25Q 163.94666666666666 25 163.94666666666666 25L 163.94666666666666 25L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 152.64 50L 152.64 25Q 152.64 25 152.64 25L 163.94666666666666 25Q 163.94666666666666 25 163.94666666666666 25L 163.94666666666666 25L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        pathFrom="M 152.64 50L 152.64 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 152.64 50"
                                                                        cy="25" cx="163.94666666666666" j="7" val="60"
                                                                        barHeight="25" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1728"
                                                                        d="M 175.2533333333333 50L 175.2533333333333 12.5Q 175.2533333333333 12.5 175.2533333333333 12.5L 186.55999999999997 12.5Q 186.55999999999997 12.5 186.55999999999997 12.5L 186.55999999999997 12.5L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 175.2533333333333 50L 175.2533333333333 12.5Q 175.2533333333333 12.5 175.2533333333333 12.5L 186.55999999999997 12.5Q 186.55999999999997 12.5 186.55999999999997 12.5L 186.55999999999997 12.5L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        pathFrom="M 175.2533333333333 50L 175.2533333333333 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 175.2533333333333 50"
                                                                        cy="12.5" cx="186.55999999999997" j="8" val="90"
                                                                        barHeight="37.5" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1730"
                                                                        d="M 197.86666666666665 50L 197.86666666666665 20.833333333333332Q 197.86666666666665 20.833333333333332 197.86666666666665 20.833333333333332L 209.17333333333332 20.833333333333332Q 209.17333333333332 20.833333333333332 209.17333333333332 20.833333333333332L 209.17333333333332 20.833333333333332L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 197.86666666666665 50L 197.86666666666665 20.833333333333332Q 197.86666666666665 20.833333333333332 197.86666666666665 20.833333333333332L 209.17333333333332 20.833333333333332Q 209.17333333333332 20.833333333333332 209.17333333333332 20.833333333333332L 209.17333333333332 20.833333333333332L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        pathFrom="M 197.86666666666665 50L 197.86666666666665 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 197.86666666666665 50"
                                                                        cy="20.833333333333332" cx="209.17333333333332"
                                                                        j="9" val="70" barHeight="29.166666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1732"
                                                                        d="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        pathFrom="M 220.48 50L 220.48 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 220.48 50"
                                                                        cy="4.166666666666664" cx="231.78666666666666"
                                                                        j="10" val="110" barHeight="45.833333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <g id="SvgjsG1710"
                                                                        class="apexcharts-bar-goals-markers"
                                                                        style="pointer-events: none">
                                                                        <g id="SvgjsG1711"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1713"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1715"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1717"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1719"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1721"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1723"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1725"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1727"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1729"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1731"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1709" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1752" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1753" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1754" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1755" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1756" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG1741" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1698" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light"
                                                        style="left: 158.671px; top: -20px;">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            10</div>
                                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                            style="order: 1; display: flex;"><span
                                                                class="apexcharts-tooltip-marker"
                                                                style="background-color: rgba(3, 142, 220, 0.85);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value">70</span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="font-size-xs text-uppercase">Total Sorties groupage</h6>
                                                    <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                                        <?php
                                                
                                              echo 'En attente de méthode de calcul';
                                                
                                                ?>
                                                    </h4>
                                                    <div class="text-muted">Sorties Caisse</div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-light btn-sm" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span class="text-muted">Détails<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Excel</a>
                                                            <a class="dropdown-item" href="#">PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apex-charts mt-3" id="sparkline-chart-2"
                                                style="min-height: 50px;">
                                                <div id="apexchartsrequonla"
                                                    class="apexcharts-canvas apexchartsrequonla apexcharts-theme-light"
                                                    style="width: 253px; height: 50px;"><svg id="SvgjsSvg1758"
                                                        width="253" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1760" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(0, 0)">
                                                            <defs id="SvgjsDefs1759">
                                                                <clipPath id="gridRectMaskrequonla">
                                                                    <rect id="SvgjsRect1765" width="259" height="52"
                                                                        x="-3" y="-1" rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskrequonla"></clipPath>
                                                                <clipPath id="nonForecastMaskrequonla"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskrequonla">
                                                                    <rect id="SvgjsRect1766" width="257" height="54"
                                                                        x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <linearGradient id="SvgjsLinearGradient1771" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                                    <stop id="SvgjsStop1772" stop-opacity="0.45"
                                                                        stop-color="rgba(3,142,220,0.45)" offset="0.5">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1773" stop-opacity="0.05"
                                                                        stop-color="rgba(255,255,255,0.05)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1774" stop-opacity="0.05"
                                                                        stop-color="rgba(255,255,255,0.05)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1775" stop-opacity="0.45"
                                                                        stop-color="rgba(3,142,220,0.45)" offset="1">
                                                                    </stop>
                                                                </linearGradient>
                                                            </defs>
                                                            <line id="SvgjsLine1764" x1="0" y1="0" x2="0" y2="50"
                                                                stroke="#b6b6b6" stroke-dasharray="3"
                                                                stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                                                x="0" y="0" width="1" height="50" fill="#b1b9c4"
                                                                filter="none" fill-opacity="0.9" stroke-width="1">
                                                            </line>
                                                            <g id="SvgjsG1778" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1779" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1791" class="apexcharts-grid">
                                                                <g id="SvgjsG1792"
                                                                    class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1794" x1="0" y1="0" x2="253"
                                                                        y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1795" x1="0" y1="10" x2="253"
                                                                        y2="10" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1796" x1="0" y1="20" x2="253"
                                                                        y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1797" x1="0" y1="30" x2="253"
                                                                        y2="30" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1798" x1="0" y1="40" x2="253"
                                                                        y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1799" x1="0" y1="50" x2="253"
                                                                        y2="50" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1793" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1801" x1="0" y1="50" x2="253" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1800" x1="0" y1="1" x2="0" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1767"
                                                                class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1768" class="apexcharts-series"
                                                                    seriesName="SeriesxA" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path id="SvgjsPath1776"
                                                                        d="M 0 50L 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30C 252.99999999999997 30 252.99999999999997 30 252.99999999999997 50M 252.99999999999997 30z"
                                                                        fill="url(#SvgjsLinearGradient1771)"
                                                                        fill-opacity="1" stroke-opacity="1"
                                                                        stroke-linecap="butt" stroke-width="0"
                                                                        stroke-dasharray="0" class="apexcharts-area"
                                                                        index="0" clip-path="url(#gridRectMaskrequonla)"
                                                                        pathTo="M 0 50L 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30C 252.99999999999997 30 252.99999999999997 30 252.99999999999997 50M 252.99999999999997 30z"
                                                                        pathFrom="M -1 50L -1 50L 28.111111111111107 50L 56.222222222222214 50L 84.33333333333333 50L 112.44444444444443 50L 140.55555555555554 50L 168.66666666666666 50L 196.77777777777777 50L 224.88888888888886 50L 252.99999999999997 50">
                                                                    </path>
                                                                    <path id="SvgjsPath1777"
                                                                        d="M 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30"
                                                                        fill="none" fill-opacity="1" stroke="#038edc"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMaskrequonla)"
                                                                        pathTo="M 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30"
                                                                        pathFrom="M -1 50L -1 50L 28.111111111111107 50L 56.222222222222214 50L 84.33333333333333 50L 112.44444444444443 50L 140.55555555555554 50L 168.66666666666666 50L 196.77777777777777 50L 224.88888888888886 50L 252.99999999999997 50">
                                                                    </path>
                                                                    <g id="SvgjsG1769"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="0">
                                                                        <g class="apexcharts-series-markers">
                                                                            <circle id="SvgjsCircle1807" r="0" cx="0"
                                                                                cy="0"
                                                                                class="apexcharts-marker wd5xa0y2e no-pointer-events"
                                                                                stroke="#ffffff" fill="#038edc"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9"
                                                                                default-marker-size="0"></circle>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1770" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1802" x1="0" y1="0" x2="253" y2="0"
                                                                stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1803" x1="0" y1="0" x2="253" y2="0"
                                                                stroke-dasharray="0" stroke-width="0"
                                                                stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1804" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1805" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <rect id="SvgjsRect1763" width="0" height="0" x="0" y="0" rx="0"
                                                            ry="0" opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fefefe"></rect>
                                                        <g id="SvgjsG1790" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1761" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                            <span class="apexcharts-tooltip-marker"
                                                                style="background-color: rgb(3, 142, 220);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="font-size-xs text-uppercase">Total bénéfice groupage</h6>
                                                    <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                                        <?php
                                                
                                            echo 'En attente de méthode de calcul';
                                                
                                                ?>
                                                    </h4>
                                                    <div class="text-muted">En temps réel</div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-light btn-sm" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span class="text-muted">Détails<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Excel</a>
                                                            <a class="dropdown-item" href="#">PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apex-charts mt-3" id="sparkline-chart-3"
                                                style="min-height: 50px;">
                                                <div id="apexchartsd0m4owgt"
                                                    class="apexcharts-canvas apexchartsd0m4owgt apexcharts-theme-light"
                                                    style="width: 253px; height: 50px;"><svg id="SvgjsSvg1808"
                                                        width="253" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1810" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(17.433333333333334, 0)">
                                                            <defs id="SvgjsDefs1809">
                                                                <linearGradient id="SvgjsLinearGradient1813" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                                    <stop id="SvgjsStop1814" stop-opacity="0.4"
                                                                        stop-color="rgba(216,227,240,0.4)" offset="0">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1815" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1816" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                </linearGradient>
                                                                <clipPath id="gridRectMaskd0m4owgt">
                                                                    <rect id="SvgjsRect1818" width="257" height="50"
                                                                        x="-15.433333333333334" y="0" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskd0m4owgt"></clipPath>
                                                                <clipPath id="nonForecastMaskd0m4owgt"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskd0m4owgt">
                                                                    <rect id="SvgjsRect1819" width="230.13333333333333"
                                                                        height="54" x="-2" y="-2" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <rect id="SvgjsRect1817" width="11.306666666666665"
                                                                height="50" x="0" y="0" rx="0" ry="0" opacity="1"
                                                                stroke-width="0" stroke-dasharray="3"
                                                                fill="url(#SvgjsLinearGradient1813)"
                                                                class="apexcharts-xcrosshairs" y2="50" filter="none"
                                                                fill-opacity="0.9"></rect>
                                                            <g id="SvgjsG1846" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1847" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856"
                                                                    class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1858" x1="-13.433333333333334"
                                                                        y1="0" x2="239.56666666666666" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1859" x1="-13.433333333333334"
                                                                        y1="12.5" x2="239.56666666666666" y2="12.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="-13.433333333333334"
                                                                        y1="25" x2="239.56666666666666" y2="25"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1861" x1="-13.433333333333334"
                                                                        y1="37.5" x2="239.56666666666666" y2="37.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1862" x1="-13.433333333333334"
                                                                        y1="50" x2="239.56666666666666" y2="50"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1864" x1="0" y1="50"
                                                                    x2="226.13333333333333" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1863" x1="0" y1="1" x2="0" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1820"
                                                                class="apexcharts-bar-series apexcharts-plot-series">
                                                                <g id="SvgjsG1821" class="apexcharts-series" rel="1"
                                                                    seriesName="seriesx1" data:realIndex="0">
                                                                    <path id="SvgjsPath1825"
                                                                        d="M -5.653333333333332 50L -5.653333333333332 33.33333333333333Q -5.653333333333332 33.33333333333333 -5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333Q 5.653333333333332 33.33333333333333 5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M -5.653333333333332 50L -5.653333333333332 33.33333333333333Q -5.653333333333332 33.33333333333333 -5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333Q 5.653333333333332 33.33333333333333 5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        pathFrom="M -5.653333333333332 50L -5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L -5.653333333333332 50"
                                                                        cy="33.33333333333333" cx="5.653333333333332"
                                                                        j="0" val="40" barHeight="16.666666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1827"
                                                                        d="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        pathFrom="M 16.959999999999997 50L 16.959999999999997 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 16.959999999999997 50"
                                                                        cy="41.666666666666664" cx="28.266666666666662"
                                                                        j="1" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1829"
                                                                        d="M 39.57333333333332 50L 39.57333333333332 37.5Q 39.57333333333332 37.5 39.57333333333332 37.5L 50.87999999999999 37.5Q 50.87999999999999 37.5 50.87999999999999 37.5L 50.87999999999999 37.5L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 39.57333333333332 50L 39.57333333333332 37.5Q 39.57333333333332 37.5 39.57333333333332 37.5L 50.87999999999999 37.5Q 50.87999999999999 37.5 50.87999999999999 37.5L 50.87999999999999 37.5L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        pathFrom="M 39.57333333333332 50L 39.57333333333332 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 39.57333333333332 50"
                                                                        cy="37.5" cx="50.87999999999999" j="2" val="30"
                                                                        barHeight="12.5" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1831"
                                                                        d="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        pathFrom="M 62.18666666666665 50L 62.18666666666665 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 62.18666666666665 50"
                                                                        cy="33.33333333333333" cx="73.49333333333331"
                                                                        j="3" val="40" barHeight="16.666666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1833"
                                                                        d="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        pathFrom="M 84.79999999999998 50L 84.79999999999998 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 84.79999999999998 50"
                                                                        cy="41.666666666666664" cx="96.10666666666665"
                                                                        j="4" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1835"
                                                                        d="M 107.41333333333333 50L 107.41333333333333 25Q 107.41333333333333 25 107.41333333333333 25L 118.72 25Q 118.72 25 118.72 25L 118.72 25L 118.72 50L 118.72 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 107.41333333333333 50L 107.41333333333333 25Q 107.41333333333333 25 107.41333333333333 25L 118.72 25Q 118.72 25 118.72 25L 118.72 25L 118.72 50L 118.72 50z"
                                                                        pathFrom="M 107.41333333333333 50L 107.41333333333333 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 107.41333333333333 50"
                                                                        cy="25" cx="118.72" j="5" val="60"
                                                                        barHeight="25" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1837"
                                                                        d="M 130.02666666666664 50L 130.02666666666664 27.083333333333332Q 130.02666666666664 27.083333333333332 130.02666666666664 27.083333333333332L 141.33333333333331 27.083333333333332Q 141.33333333333331 27.083333333333332 141.33333333333331 27.083333333333332L 141.33333333333331 27.083333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 130.02666666666664 50L 130.02666666666664 27.083333333333332Q 130.02666666666664 27.083333333333332 130.02666666666664 27.083333333333332L 141.33333333333331 27.083333333333332Q 141.33333333333331 27.083333333333332 141.33333333333331 27.083333333333332L 141.33333333333331 27.083333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        pathFrom="M 130.02666666666664 50L 130.02666666666664 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 130.02666666666664 50"
                                                                        cy="27.083333333333332" cx="141.33333333333331"
                                                                        j="6" val="55" barHeight="22.916666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1839"
                                                                        d="M 152.64 50L 152.64 20.833333333333332Q 152.64 20.833333333333332 152.64 20.833333333333332L 163.94666666666666 20.833333333333332Q 163.94666666666666 20.833333333333332 163.94666666666666 20.833333333333332L 163.94666666666666 20.833333333333332L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 152.64 50L 152.64 20.833333333333332Q 152.64 20.833333333333332 152.64 20.833333333333332L 163.94666666666666 20.833333333333332Q 163.94666666666666 20.833333333333332 163.94666666666666 20.833333333333332L 163.94666666666666 20.833333333333332L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        pathFrom="M 152.64 50L 152.64 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 152.64 50"
                                                                        cy="20.833333333333332" cx="163.94666666666666"
                                                                        j="7" val="70" barHeight="29.166666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1841"
                                                                        d="M 175.2533333333333 50L 175.2533333333333 10.416666666666664Q 175.2533333333333 10.416666666666664 175.2533333333333 10.416666666666664L 186.55999999999997 10.416666666666664Q 186.55999999999997 10.416666666666664 186.55999999999997 10.416666666666664L 186.55999999999997 10.416666666666664L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 175.2533333333333 50L 175.2533333333333 10.416666666666664Q 175.2533333333333 10.416666666666664 175.2533333333333 10.416666666666664L 186.55999999999997 10.416666666666664Q 186.55999999999997 10.416666666666664 186.55999999999997 10.416666666666664L 186.55999999999997 10.416666666666664L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        pathFrom="M 175.2533333333333 50L 175.2533333333333 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 175.2533333333333 50"
                                                                        cy="10.416666666666664" cx="186.55999999999997"
                                                                        j="8" val="95" barHeight="39.583333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1843"
                                                                        d="M 197.86666666666665 50L 197.86666666666665 22.916666666666664Q 197.86666666666665 22.916666666666664 197.86666666666665 22.916666666666664L 209.17333333333332 22.916666666666664Q 209.17333333333332 22.916666666666664 209.17333333333332 22.916666666666664L 209.17333333333332 22.916666666666664L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 197.86666666666665 50L 197.86666666666665 22.916666666666664Q 197.86666666666665 22.916666666666664 197.86666666666665 22.916666666666664L 209.17333333333332 22.916666666666664Q 209.17333333333332 22.916666666666664 209.17333333333332 22.916666666666664L 209.17333333333332 22.916666666666664L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        pathFrom="M 197.86666666666665 50L 197.86666666666665 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 197.86666666666665 50"
                                                                        cy="22.916666666666664" cx="209.17333333333332"
                                                                        j="9" val="65" barHeight="27.083333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1845"
                                                                        d="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        pathFrom="M 220.48 50L 220.48 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 220.48 50"
                                                                        cy="4.166666666666664" cx="231.78666666666666"
                                                                        j="10" val="110" barHeight="45.833333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <g id="SvgjsG1823"
                                                                        class="apexcharts-bar-goals-markers"
                                                                        style="pointer-events: none">
                                                                        <g id="SvgjsG1824"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1826"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1828"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1830"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1832"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1834"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1836"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1838"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1840"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1842"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1844"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1822" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1865" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1866" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1867" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1868" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1869" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG1854" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1811" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                            <span class="apexcharts-tooltip-marker"
                                                                style="background-color: rgb(3, 142, 220);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--/Point Financier groupage et AE-->

                            <!--Point Financier autre envoi-->

                            <div class="row">
                                <div class="col-12 mt-3 mb-1">
                                    <h4 class="text-uppercase">Point financier Autres envois</h4>
                                    <!--<p>Statistics on minimal cards.</p>-->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-4 col-sm-6">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="font-size-xs text-uppercase">Total Entrées autres envois
                                                    </h6>
                                                    <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">

                                                        <?php
                                                
                                             //Calcul Total
$montant_total=0;

$tot=$con->prepare('SELECT * FROM autre_envoi LEFT JOIN colis_autre_envoi ON autre_envoi.time_autre_envoi=colis_autre_envoi.autre_envoi_time  ');

$tot->execute();
while($itot=$tot->fetch())
{
	$montant_total=$montant_total + ($itot['poids_colis_autre_envoi']*$itot['pu_colis_autre_envoi']) + $itot['emballage_colis_autre_envoi'] + $itot['montant_assurance'];
	
}
                                                
                                                echo number_format($montant_total,0,',',' ').' FCFA';
                                                
                                                ?>
                                                    </h4>
                                                    <div class="text-muted">Montants encaissés</div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-light btn-sm" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span class="text-muted">Détails<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Excel</a>
                                                            <a class="dropdown-item" href="#">PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apex-charts mt-3" id="sparkline-chart-1"
                                                style="min-height: 50px;">
                                                <div id="apexchartsl6jhkyzo"
                                                    class="apexcharts-canvas apexchartsl6jhkyzo apexcharts-theme-light"
                                                    style="width: 253px; height: 50px;"><svg id="SvgjsSvg1695"
                                                        width="253" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1697" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(17.433333333333334, 0)">
                                                            <defs id="SvgjsDefs1696">
                                                                <linearGradient id="SvgjsLinearGradient1700" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                                    <stop id="SvgjsStop1701" stop-opacity="0.4"
                                                                        stop-color="rgba(216,227,240,0.4)" offset="0">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1702" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1703" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                </linearGradient>
                                                                <clipPath id="gridRectMaskl6jhkyzo">
                                                                    <rect id="SvgjsRect1705" width="257" height="50"
                                                                        x="-15.433333333333334" y="0" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskl6jhkyzo"></clipPath>
                                                                <clipPath id="nonForecastMaskl6jhkyzo"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskl6jhkyzo">
                                                                    <rect id="SvgjsRect1706" width="230.13333333333333"
                                                                        height="54" x="-2" y="-2" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <rect id="SvgjsRect1704" width="11.306666666666665"
                                                                height="50" x="197.69331583658854" y="0" rx="0" ry="0"
                                                                opacity="1" stroke-width="0" stroke-dasharray="3"
                                                                fill="url(#SvgjsLinearGradient1700)"
                                                                class="apexcharts-xcrosshairs" y2="50" filter="none"
                                                                fill-opacity="0.9" x1="197.69331583658854"
                                                                x2="197.69331583658854"></rect>
                                                            <g id="SvgjsG1733" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1734" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1742" class="apexcharts-grid">
                                                                <g id="SvgjsG1743"
                                                                    class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1745" x1="-13.433333333333334"
                                                                        y1="0" x2="239.56666666666666" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1746" x1="-13.433333333333334"
                                                                        y1="12.5" x2="239.56666666666666" y2="12.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1747" x1="-13.433333333333334"
                                                                        y1="25" x2="239.56666666666666" y2="25"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1748" x1="-13.433333333333334"
                                                                        y1="37.5" x2="239.56666666666666" y2="37.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1749" x1="-13.433333333333334"
                                                                        y1="50" x2="239.56666666666666" y2="50"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1744" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1751" x1="0" y1="50"
                                                                    x2="226.13333333333333" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1750" x1="0" y1="1" x2="0" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1707"
                                                                class="apexcharts-bar-series apexcharts-plot-series">
                                                                <g id="SvgjsG1708" class="apexcharts-series" rel="1"
                                                                    seriesName="seriesx1" data:realIndex="0">
                                                                    <path id="SvgjsPath1712"
                                                                        d="M -5.653333333333332 50L -5.653333333333332 45.833333333333336Q -5.653333333333332 45.833333333333336 -5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336Q 5.653333333333332 45.833333333333336 5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M -5.653333333333332 50L -5.653333333333332 45.833333333333336Q -5.653333333333332 45.833333333333336 -5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336Q 5.653333333333332 45.833333333333336 5.653333333333332 45.833333333333336L 5.653333333333332 45.833333333333336L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        pathFrom="M -5.653333333333332 50L -5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L -5.653333333333332 50"
                                                                        cy="45.833333333333336" cx="5.653333333333332"
                                                                        j="0" val="10" barHeight="4.166666666666667"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1714"
                                                                        d="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        pathFrom="M 16.959999999999997 50L 16.959999999999997 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 16.959999999999997 50"
                                                                        cy="41.666666666666664" cx="28.266666666666662"
                                                                        j="1" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1716"
                                                                        d="M 39.57333333333332 50L 39.57333333333332 43.75Q 39.57333333333332 43.75 39.57333333333332 43.75L 50.87999999999999 43.75Q 50.87999999999999 43.75 50.87999999999999 43.75L 50.87999999999999 43.75L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 39.57333333333332 50L 39.57333333333332 43.75Q 39.57333333333332 43.75 39.57333333333332 43.75L 50.87999999999999 43.75Q 50.87999999999999 43.75 50.87999999999999 43.75L 50.87999999999999 43.75L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        pathFrom="M 39.57333333333332 50L 39.57333333333332 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 39.57333333333332 50"
                                                                        cy="43.75" cx="50.87999999999999" j="2" val="15"
                                                                        barHeight="6.25" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1718"
                                                                        d="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        pathFrom="M 62.18666666666665 50L 62.18666666666665 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 62.18666666666665 50"
                                                                        cy="33.33333333333333" cx="73.49333333333331"
                                                                        j="3" val="40" barHeight="16.666666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1720"
                                                                        d="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        pathFrom="M 84.79999999999998 50L 84.79999999999998 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 84.79999999999998 50"
                                                                        cy="41.666666666666664" cx="96.10666666666665"
                                                                        j="4" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1722"
                                                                        d="M 107.41333333333333 50L 107.41333333333333 29.166666666666664Q 107.41333333333333 29.166666666666664 107.41333333333333 29.166666666666664L 118.72 29.166666666666664Q 118.72 29.166666666666664 118.72 29.166666666666664L 118.72 29.166666666666664L 118.72 50L 118.72 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 107.41333333333333 50L 107.41333333333333 29.166666666666664Q 107.41333333333333 29.166666666666664 107.41333333333333 29.166666666666664L 118.72 29.166666666666664Q 118.72 29.166666666666664 118.72 29.166666666666664L 118.72 29.166666666666664L 118.72 50L 118.72 50z"
                                                                        pathFrom="M 107.41333333333333 50L 107.41333333333333 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 107.41333333333333 50"
                                                                        cy="29.166666666666664" cx="118.72" j="5"
                                                                        val="50" barHeight="20.833333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1724"
                                                                        d="M 130.02666666666664 50L 130.02666666666664 20.833333333333332Q 130.02666666666664 20.833333333333332 130.02666666666664 20.833333333333332L 141.33333333333331 20.833333333333332Q 141.33333333333331 20.833333333333332 141.33333333333331 20.833333333333332L 141.33333333333331 20.833333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 130.02666666666664 50L 130.02666666666664 20.833333333333332Q 130.02666666666664 20.833333333333332 130.02666666666664 20.833333333333332L 141.33333333333331 20.833333333333332Q 141.33333333333331 20.833333333333332 141.33333333333331 20.833333333333332L 141.33333333333331 20.833333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        pathFrom="M 130.02666666666664 50L 130.02666666666664 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 130.02666666666664 50"
                                                                        cy="20.833333333333332" cx="141.33333333333331"
                                                                        j="6" val="70" barHeight="29.166666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1726"
                                                                        d="M 152.64 50L 152.64 25Q 152.64 25 152.64 25L 163.94666666666666 25Q 163.94666666666666 25 163.94666666666666 25L 163.94666666666666 25L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 152.64 50L 152.64 25Q 152.64 25 152.64 25L 163.94666666666666 25Q 163.94666666666666 25 163.94666666666666 25L 163.94666666666666 25L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        pathFrom="M 152.64 50L 152.64 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 152.64 50"
                                                                        cy="25" cx="163.94666666666666" j="7" val="60"
                                                                        barHeight="25" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1728"
                                                                        d="M 175.2533333333333 50L 175.2533333333333 12.5Q 175.2533333333333 12.5 175.2533333333333 12.5L 186.55999999999997 12.5Q 186.55999999999997 12.5 186.55999999999997 12.5L 186.55999999999997 12.5L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 175.2533333333333 50L 175.2533333333333 12.5Q 175.2533333333333 12.5 175.2533333333333 12.5L 186.55999999999997 12.5Q 186.55999999999997 12.5 186.55999999999997 12.5L 186.55999999999997 12.5L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        pathFrom="M 175.2533333333333 50L 175.2533333333333 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 175.2533333333333 50"
                                                                        cy="12.5" cx="186.55999999999997" j="8" val="90"
                                                                        barHeight="37.5" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1730"
                                                                        d="M 197.86666666666665 50L 197.86666666666665 20.833333333333332Q 197.86666666666665 20.833333333333332 197.86666666666665 20.833333333333332L 209.17333333333332 20.833333333333332Q 209.17333333333332 20.833333333333332 209.17333333333332 20.833333333333332L 209.17333333333332 20.833333333333332L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 197.86666666666665 50L 197.86666666666665 20.833333333333332Q 197.86666666666665 20.833333333333332 197.86666666666665 20.833333333333332L 209.17333333333332 20.833333333333332Q 209.17333333333332 20.833333333333332 209.17333333333332 20.833333333333332L 209.17333333333332 20.833333333333332L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        pathFrom="M 197.86666666666665 50L 197.86666666666665 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 197.86666666666665 50"
                                                                        cy="20.833333333333332" cx="209.17333333333332"
                                                                        j="9" val="70" barHeight="29.166666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1732"
                                                                        d="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskl6jhkyzo)"
                                                                        pathTo="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        pathFrom="M 220.48 50L 220.48 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 220.48 50"
                                                                        cy="4.166666666666664" cx="231.78666666666666"
                                                                        j="10" val="110" barHeight="45.833333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <g id="SvgjsG1710"
                                                                        class="apexcharts-bar-goals-markers"
                                                                        style="pointer-events: none">
                                                                        <g id="SvgjsG1711"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1713"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1715"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1717"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1719"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1721"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1723"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1725"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1727"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1729"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1731"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1709" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1752" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1753" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1754" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1755" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1756" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG1741" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1698" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light"
                                                        style="left: 158.671px; top: -20px;">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            10</div>
                                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                            style="order: 1; display: flex;"><span
                                                                class="apexcharts-tooltip-marker"
                                                                style="background-color: rgba(3, 142, 220, 0.85);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value">70</span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="font-size-xs text-uppercase">Total Sorties autres envois
                                                    </h6>
                                                    <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                                        <?php
                                                
                                             //Calcul Total
$montant_total_sorties=0;

$tot=$con->prepare('SELECT * FROM autre_envoi   ');

$tot->execute();
while($itot=$tot->fetch())
{
	$montant_total_sorties=$montant_total_sorties + $itot['frais_compagnie'];
	
}
                                                
                                                echo number_format($montant_total_sorties,0,',',' ').' FCFA';
                                                
                                                ?>
                                                    </h4>
                                                    <div class="text-muted">montant reversé aux compagnies </div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-light btn-sm" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span class="text-muted">Détails<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Excel</a>
                                                            <a class="dropdown-item" href="#">PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apex-charts mt-3" id="sparkline-chart-2"
                                                style="min-height: 50px;">
                                                <div id="apexchartsrequonla"
                                                    class="apexcharts-canvas apexchartsrequonla apexcharts-theme-light"
                                                    style="width: 253px; height: 50px;"><svg id="SvgjsSvg1758"
                                                        width="253" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1760" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(0, 0)">
                                                            <defs id="SvgjsDefs1759">
                                                                <clipPath id="gridRectMaskrequonla">
                                                                    <rect id="SvgjsRect1765" width="259" height="52"
                                                                        x="-3" y="-1" rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskrequonla"></clipPath>
                                                                <clipPath id="nonForecastMaskrequonla"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskrequonla">
                                                                    <rect id="SvgjsRect1766" width="257" height="54"
                                                                        x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <linearGradient id="SvgjsLinearGradient1771" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                                    <stop id="SvgjsStop1772" stop-opacity="0.45"
                                                                        stop-color="rgba(3,142,220,0.45)" offset="0.5">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1773" stop-opacity="0.05"
                                                                        stop-color="rgba(255,255,255,0.05)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1774" stop-opacity="0.05"
                                                                        stop-color="rgba(255,255,255,0.05)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1775" stop-opacity="0.45"
                                                                        stop-color="rgba(3,142,220,0.45)" offset="1">
                                                                    </stop>
                                                                </linearGradient>
                                                            </defs>
                                                            <line id="SvgjsLine1764" x1="0" y1="0" x2="0" y2="50"
                                                                stroke="#b6b6b6" stroke-dasharray="3"
                                                                stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                                                x="0" y="0" width="1" height="50" fill="#b1b9c4"
                                                                filter="none" fill-opacity="0.9" stroke-width="1">
                                                            </line>
                                                            <g id="SvgjsG1778" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1779" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1791" class="apexcharts-grid">
                                                                <g id="SvgjsG1792"
                                                                    class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1794" x1="0" y1="0" x2="253"
                                                                        y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1795" x1="0" y1="10" x2="253"
                                                                        y2="10" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1796" x1="0" y1="20" x2="253"
                                                                        y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1797" x1="0" y1="30" x2="253"
                                                                        y2="30" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1798" x1="0" y1="40" x2="253"
                                                                        y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1799" x1="0" y1="50" x2="253"
                                                                        y2="50" stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1793" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1801" x1="0" y1="50" x2="253" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1800" x1="0" y1="1" x2="0" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1767"
                                                                class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1768" class="apexcharts-series"
                                                                    seriesName="SeriesxA" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path id="SvgjsPath1776"
                                                                        d="M 0 50L 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30C 252.99999999999997 30 252.99999999999997 30 252.99999999999997 50M 252.99999999999997 30z"
                                                                        fill="url(#SvgjsLinearGradient1771)"
                                                                        fill-opacity="1" stroke-opacity="1"
                                                                        stroke-linecap="butt" stroke-width="0"
                                                                        stroke-dasharray="0" class="apexcharts-area"
                                                                        index="0" clip-path="url(#gridRectMaskrequonla)"
                                                                        pathTo="M 0 50L 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30C 252.99999999999997 30 252.99999999999997 30 252.99999999999997 50M 252.99999999999997 30z"
                                                                        pathFrom="M -1 50L -1 50L 28.111111111111107 50L 56.222222222222214 50L 84.33333333333333 50L 112.44444444444443 50L 140.55555555555554 50L 168.66666666666666 50L 196.77777777777777 50L 224.88888888888886 50L 252.99999999999997 50">
                                                                    </path>
                                                                    <path id="SvgjsPath1777"
                                                                        d="M 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30"
                                                                        fill="none" fill-opacity="1" stroke="#038edc"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMaskrequonla)"
                                                                        pathTo="M 0 45C 9.838888888888887 45 18.27222222222222 5 28.111111111111107 5C 37.949999999999996 5 46.383333333333326 35 56.222222222222214 35C 66.0611111111111 35 74.49444444444444 20 84.33333333333333 20C 94.17222222222222 20 102.60555555555554 25 112.44444444444443 25C 122.28333333333332 25 130.71666666666664 5 140.55555555555554 5C 150.39444444444445 5 158.82777777777778 37.5 168.66666666666666 37.5C 178.50555555555553 37.5 186.93888888888887 22.5 196.77777777777777 22.5C 206.61666666666665 22.5 215.04999999999998 35 224.88888888888886 35C 234.72777777777776 35 243.1611111111111 30 252.99999999999997 30"
                                                                        pathFrom="M -1 50L -1 50L 28.111111111111107 50L 56.222222222222214 50L 84.33333333333333 50L 112.44444444444443 50L 140.55555555555554 50L 168.66666666666666 50L 196.77777777777777 50L 224.88888888888886 50L 252.99999999999997 50">
                                                                    </path>
                                                                    <g id="SvgjsG1769"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="0">
                                                                        <g class="apexcharts-series-markers">
                                                                            <circle id="SvgjsCircle1807" r="0" cx="0"
                                                                                cy="0"
                                                                                class="apexcharts-marker wd5xa0y2e no-pointer-events"
                                                                                stroke="#ffffff" fill="#038edc"
                                                                                fill-opacity="1" stroke-width="2"
                                                                                stroke-opacity="0.9"
                                                                                default-marker-size="0"></circle>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1770" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1802" x1="0" y1="0" x2="253" y2="0"
                                                                stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1803" x1="0" y1="0" x2="253" y2="0"
                                                                stroke-dasharray="0" stroke-width="0"
                                                                stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1804" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1805" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1806" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <rect id="SvgjsRect1763" width="0" height="0" x="0" y="0" rx="0"
                                                            ry="0" opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fefefe"></rect>
                                                        <g id="SvgjsG1790" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1761" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                            <span class="apexcharts-tooltip-marker"
                                                                style="background-color: rgb(3, 142, 220);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-6">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h6 class="font-size-xs text-uppercase">Total bénéfice autres envois
                                                    </h6>
                                                    <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                                        <?php
                                                
                                                //Solde caisse
                                                $solde=$montant_total-$montant_total_sorties;
                                                
                                                echo number_format($solde,0,',',' ').' FCFA';
                                                
                                                ?>
                                                    </h4>
                                                    <div class="text-muted">En temps réel</div>
                                                </div>
                                                <div>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-light btn-sm" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><span class="text-muted">Détails<i
                                                                    class="mdi mdi-chevron-down ms-1"></i></span>
                                                        </a>

                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Excel</a>
                                                            <a class="dropdown-item" href="#">PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="apex-charts mt-3" id="sparkline-chart-3"
                                                style="min-height: 50px;">
                                                <div id="apexchartsd0m4owgt"
                                                    class="apexcharts-canvas apexchartsd0m4owgt apexcharts-theme-light"
                                                    style="width: 253px; height: 50px;"><svg id="SvgjsSvg1808"
                                                        width="253" height="50" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1810" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(17.433333333333334, 0)">
                                                            <defs id="SvgjsDefs1809">
                                                                <linearGradient id="SvgjsLinearGradient1813" x1="0"
                                                                    y1="0" x2="0" y2="1">
                                                                    <stop id="SvgjsStop1814" stop-opacity="0.4"
                                                                        stop-color="rgba(216,227,240,0.4)" offset="0">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1815" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1816" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)" offset="1">
                                                                    </stop>
                                                                </linearGradient>
                                                                <clipPath id="gridRectMaskd0m4owgt">
                                                                    <rect id="SvgjsRect1818" width="257" height="50"
                                                                        x="-15.433333333333334" y="0" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMaskd0m4owgt"></clipPath>
                                                                <clipPath id="nonForecastMaskd0m4owgt"></clipPath>
                                                                <clipPath id="gridRectMarkerMaskd0m4owgt">
                                                                    <rect id="SvgjsRect1819" width="230.13333333333333"
                                                                        height="54" x="-2" y="-2" rx="0" ry="0"
                                                                        opacity="1" stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <rect id="SvgjsRect1817" width="11.306666666666665"
                                                                height="50" x="0" y="0" rx="0" ry="0" opacity="1"
                                                                stroke-width="0" stroke-dasharray="3"
                                                                fill="url(#SvgjsLinearGradient1813)"
                                                                class="apexcharts-xcrosshairs" y2="50" filter="none"
                                                                fill-opacity="0.9"></rect>
                                                            <g id="SvgjsG1846" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1847" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1855" class="apexcharts-grid">
                                                                <g id="SvgjsG1856"
                                                                    class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1858" x1="-13.433333333333334"
                                                                        y1="0" x2="239.56666666666666" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1859" x1="-13.433333333333334"
                                                                        y1="12.5" x2="239.56666666666666" y2="12.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1860" x1="-13.433333333333334"
                                                                        y1="25" x2="239.56666666666666" y2="25"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1861" x1="-13.433333333333334"
                                                                        y1="37.5" x2="239.56666666666666" y2="37.5"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine1862" x1="-13.433333333333334"
                                                                        y1="50" x2="239.56666666666666" y2="50"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG1857" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1864" x1="0" y1="50"
                                                                    x2="226.13333333333333" y2="50" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1863" x1="0" y1="1" x2="0" y2="50"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1820"
                                                                class="apexcharts-bar-series apexcharts-plot-series">
                                                                <g id="SvgjsG1821" class="apexcharts-series" rel="1"
                                                                    seriesName="seriesx1" data:realIndex="0">
                                                                    <path id="SvgjsPath1825"
                                                                        d="M -5.653333333333332 50L -5.653333333333332 33.33333333333333Q -5.653333333333332 33.33333333333333 -5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333Q 5.653333333333332 33.33333333333333 5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M -5.653333333333332 50L -5.653333333333332 33.33333333333333Q -5.653333333333332 33.33333333333333 -5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333Q 5.653333333333332 33.33333333333333 5.653333333333332 33.33333333333333L 5.653333333333332 33.33333333333333L 5.653333333333332 50L 5.653333333333332 50z"
                                                                        pathFrom="M -5.653333333333332 50L -5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L 5.653333333333332 50L -5.653333333333332 50"
                                                                        cy="33.33333333333333" cx="5.653333333333332"
                                                                        j="0" val="40" barHeight="16.666666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1827"
                                                                        d="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 16.959999999999997 50L 16.959999999999997 41.666666666666664Q 16.959999999999997 41.666666666666664 16.959999999999997 41.666666666666664L 28.266666666666662 41.666666666666664Q 28.266666666666662 41.666666666666664 28.266666666666662 41.666666666666664L 28.266666666666662 41.666666666666664L 28.266666666666662 50L 28.266666666666662 50z"
                                                                        pathFrom="M 16.959999999999997 50L 16.959999999999997 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 28.266666666666662 50L 16.959999999999997 50"
                                                                        cy="41.666666666666664" cx="28.266666666666662"
                                                                        j="1" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1829"
                                                                        d="M 39.57333333333332 50L 39.57333333333332 37.5Q 39.57333333333332 37.5 39.57333333333332 37.5L 50.87999999999999 37.5Q 50.87999999999999 37.5 50.87999999999999 37.5L 50.87999999999999 37.5L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 39.57333333333332 50L 39.57333333333332 37.5Q 39.57333333333332 37.5 39.57333333333332 37.5L 50.87999999999999 37.5Q 50.87999999999999 37.5 50.87999999999999 37.5L 50.87999999999999 37.5L 50.87999999999999 50L 50.87999999999999 50z"
                                                                        pathFrom="M 39.57333333333332 50L 39.57333333333332 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 50.87999999999999 50L 39.57333333333332 50"
                                                                        cy="37.5" cx="50.87999999999999" j="2" val="30"
                                                                        barHeight="12.5" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1831"
                                                                        d="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 62.18666666666665 50L 62.18666666666665 33.33333333333333Q 62.18666666666665 33.33333333333333 62.18666666666665 33.33333333333333L 73.49333333333331 33.33333333333333Q 73.49333333333331 33.33333333333333 73.49333333333331 33.33333333333333L 73.49333333333331 33.33333333333333L 73.49333333333331 50L 73.49333333333331 50z"
                                                                        pathFrom="M 62.18666666666665 50L 62.18666666666665 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 73.49333333333331 50L 62.18666666666665 50"
                                                                        cy="33.33333333333333" cx="73.49333333333331"
                                                                        j="3" val="40" barHeight="16.666666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1833"
                                                                        d="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 84.79999999999998 50L 84.79999999999998 41.666666666666664Q 84.79999999999998 41.666666666666664 84.79999999999998 41.666666666666664L 96.10666666666665 41.666666666666664Q 96.10666666666665 41.666666666666664 96.10666666666665 41.666666666666664L 96.10666666666665 41.666666666666664L 96.10666666666665 50L 96.10666666666665 50z"
                                                                        pathFrom="M 84.79999999999998 50L 84.79999999999998 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 96.10666666666665 50L 84.79999999999998 50"
                                                                        cy="41.666666666666664" cx="96.10666666666665"
                                                                        j="4" val="20" barHeight="8.333333333333334"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1835"
                                                                        d="M 107.41333333333333 50L 107.41333333333333 25Q 107.41333333333333 25 107.41333333333333 25L 118.72 25Q 118.72 25 118.72 25L 118.72 25L 118.72 50L 118.72 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 107.41333333333333 50L 107.41333333333333 25Q 107.41333333333333 25 107.41333333333333 25L 118.72 25Q 118.72 25 118.72 25L 118.72 25L 118.72 50L 118.72 50z"
                                                                        pathFrom="M 107.41333333333333 50L 107.41333333333333 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 118.72 50L 107.41333333333333 50"
                                                                        cy="25" cx="118.72" j="5" val="60"
                                                                        barHeight="25" barWidth="11.306666666666665">
                                                                    </path>
                                                                    <path id="SvgjsPath1837"
                                                                        d="M 130.02666666666664 50L 130.02666666666664 27.083333333333332Q 130.02666666666664 27.083333333333332 130.02666666666664 27.083333333333332L 141.33333333333331 27.083333333333332Q 141.33333333333331 27.083333333333332 141.33333333333331 27.083333333333332L 141.33333333333331 27.083333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 130.02666666666664 50L 130.02666666666664 27.083333333333332Q 130.02666666666664 27.083333333333332 130.02666666666664 27.083333333333332L 141.33333333333331 27.083333333333332Q 141.33333333333331 27.083333333333332 141.33333333333331 27.083333333333332L 141.33333333333331 27.083333333333332L 141.33333333333331 50L 141.33333333333331 50z"
                                                                        pathFrom="M 130.02666666666664 50L 130.02666666666664 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 141.33333333333331 50L 130.02666666666664 50"
                                                                        cy="27.083333333333332" cx="141.33333333333331"
                                                                        j="6" val="55" barHeight="22.916666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1839"
                                                                        d="M 152.64 50L 152.64 20.833333333333332Q 152.64 20.833333333333332 152.64 20.833333333333332L 163.94666666666666 20.833333333333332Q 163.94666666666666 20.833333333333332 163.94666666666666 20.833333333333332L 163.94666666666666 20.833333333333332L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 152.64 50L 152.64 20.833333333333332Q 152.64 20.833333333333332 152.64 20.833333333333332L 163.94666666666666 20.833333333333332Q 163.94666666666666 20.833333333333332 163.94666666666666 20.833333333333332L 163.94666666666666 20.833333333333332L 163.94666666666666 50L 163.94666666666666 50z"
                                                                        pathFrom="M 152.64 50L 152.64 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 163.94666666666666 50L 152.64 50"
                                                                        cy="20.833333333333332" cx="163.94666666666666"
                                                                        j="7" val="70" barHeight="29.166666666666668"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1841"
                                                                        d="M 175.2533333333333 50L 175.2533333333333 10.416666666666664Q 175.2533333333333 10.416666666666664 175.2533333333333 10.416666666666664L 186.55999999999997 10.416666666666664Q 186.55999999999997 10.416666666666664 186.55999999999997 10.416666666666664L 186.55999999999997 10.416666666666664L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 175.2533333333333 50L 175.2533333333333 10.416666666666664Q 175.2533333333333 10.416666666666664 175.2533333333333 10.416666666666664L 186.55999999999997 10.416666666666664Q 186.55999999999997 10.416666666666664 186.55999999999997 10.416666666666664L 186.55999999999997 10.416666666666664L 186.55999999999997 50L 186.55999999999997 50z"
                                                                        pathFrom="M 175.2533333333333 50L 175.2533333333333 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 186.55999999999997 50L 175.2533333333333 50"
                                                                        cy="10.416666666666664" cx="186.55999999999997"
                                                                        j="8" val="95" barHeight="39.583333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1843"
                                                                        d="M 197.86666666666665 50L 197.86666666666665 22.916666666666664Q 197.86666666666665 22.916666666666664 197.86666666666665 22.916666666666664L 209.17333333333332 22.916666666666664Q 209.17333333333332 22.916666666666664 209.17333333333332 22.916666666666664L 209.17333333333332 22.916666666666664L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 197.86666666666665 50L 197.86666666666665 22.916666666666664Q 197.86666666666665 22.916666666666664 197.86666666666665 22.916666666666664L 209.17333333333332 22.916666666666664Q 209.17333333333332 22.916666666666664 209.17333333333332 22.916666666666664L 209.17333333333332 22.916666666666664L 209.17333333333332 50L 209.17333333333332 50z"
                                                                        pathFrom="M 197.86666666666665 50L 197.86666666666665 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 209.17333333333332 50L 197.86666666666665 50"
                                                                        cy="22.916666666666664" cx="209.17333333333332"
                                                                        j="9" val="65" barHeight="27.083333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <path id="SvgjsPath1845"
                                                                        d="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        fill="rgba(3,142,220,0.85)" fill-opacity="1"
                                                                        stroke-opacity="1" stroke-linecap="round"
                                                                        stroke-width="0" stroke-dasharray="0"
                                                                        class="apexcharts-bar-area" index="0"
                                                                        clip-path="url(#gridRectMaskd0m4owgt)"
                                                                        pathTo="M 220.48 50L 220.48 4.166666666666664Q 220.48 4.166666666666664 220.48 4.166666666666664L 231.78666666666666 4.166666666666664Q 231.78666666666666 4.166666666666664 231.78666666666666 4.166666666666664L 231.78666666666666 4.166666666666664L 231.78666666666666 50L 231.78666666666666 50z"
                                                                        pathFrom="M 220.48 50L 220.48 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 231.78666666666666 50L 220.48 50"
                                                                        cy="4.166666666666664" cx="231.78666666666666"
                                                                        j="10" val="110" barHeight="45.833333333333336"
                                                                        barWidth="11.306666666666665"></path>
                                                                    <g id="SvgjsG1823"
                                                                        class="apexcharts-bar-goals-markers"
                                                                        style="pointer-events: none">
                                                                        <g id="SvgjsG1824"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1826"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1828"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1830"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1832"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1834"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1836"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1838"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1840"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1842"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                        <g id="SvgjsG1844"
                                                                            className="apexcharts-bar-goals-groups"></g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1822" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1865" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1866" x1="-13.433333333333334" y1="0"
                                                                x2="239.56666666666666" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1867" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1868" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1869" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG1854" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1811" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 25px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                            <span class="apexcharts-tooltip-marker"
                                                                style="background-color: rgb(3, 142, 220);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--/Point Financier autres envois-->


                            <div class="row">
                                <div class="col-12 mt-3 mb-1">
                                    <h4 class="text-uppercase">Bilan des groupages</h4>
                                    <!--<p>Statistics on minimal cards.</p>-->
                                </div>
                            </div>

                            <div class="row">


                                <div class="col-xl-3 col-sm-6 col-12">
                                    <a href="javascript:void();">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media d-flex">
                                                        <div class="media-body text-left">
                                                            <h3>

                                                                <?php
            $grp=$con->prepare('SELECT * FROM groupage WHERE id_groupage!="" ');
            $grp->execute();
            $nb_grp=$grp->rowcount();
            
            echo $nb_grp;
                    
                    ?>

                                                            </h3>

                                                            <span>Groupages créés</span>
                                                        </div>
                                                        <div class="align-self-center">
                                                            <i
                                                                class="fa fa-globe primary_ font-large-2 float-right"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress mt-1 mb-0" style="height: 7px;">
                                                        <div class="progress-bar bg-primary_" role="progressbar"
                                                            style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>



                                <div class="col-xl-3 col-sm-6 col-12">
                                    <a href="javascript:void();">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media d-flex">
                                                        <div class="media-body text-left">
                                                            <h3 class="warning">

                                                                <?php
            $grp=$con->prepare('SELECT * FROM groupage LEFT JOIN colis_autre_envoi ON groupage.time_groupage=colis_autre_envoi.autre_envoi_time WHERE etat_groupage=0 ');
            $grp->execute();
            $nb_grp=$grp->rowcount();
            
            echo $nb_grp;
                    
                    ?>

                                                            </h3>

                                                            <span>En cours de saisie</span>
                                                        </div>
                                                        <div class="align-self-center">
                                                            <i
                                                                class="fa fa-spinner fa-spin warning font-large-2 float-right"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress mt-1 mb-0" style="height: 7px;">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>



                                <div class="col-xl-3 col-sm-6 col-12">
                                    <a href="javascript:void();">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media d-flex">
                                                        <div class="media-body text-left">
                                                            <h3 class="danger">

                                                                <?php
            $grp=$con->prepare('SELECT * FROM groupage WHERE id_groupage!="" AND etat_groupage=1 ');
            $grp->execute();
            $nb_grp=$grp->rowcount();
            
            echo $nb_grp;
                    
                    ?>

                                                            </h3>
                                                            <span>En attente de livraison</span>
                                                        </div>
                                                        <div class="align-self-center">
                                                            <i class="fa fa-ban danger font-large-2 float-right"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress mt-1 mb-0" style="height: 7px;">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>



                                <div class="col-xl-3 col-sm-6 col-12">
                                    <a href="javascript:void();">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media d-flex">
                                                        <div class="media-body text-left">
                                                            <h3 class="success">
                                                                <?php
                    
            $grp=$con->prepare('SELECT * FROM groupage WHERE id_groupage!="" AND etat_groupage=2 ');
            $grp->execute();
            $nb_grp=$grp->rowcount();
            
            echo $nb_grp;
                    
                    ?>

                                                            </h3>
                                                            <span>Livrés</span>
                                                        </div>
                                                        <div class="align-self-center">
                                                            <i
                                                                class="fa fa-check-circle success font-large-2 float-right"></i>
                                                        </div>
                                                    </div>
                                                    <div class="progress mt-1 mb-0" style="height: 7px;">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="row">
                                    <div class="col-12 mt-3 mb-1">
                                        <h4 class="text-uppercase">Bilan autres Envois (DHL ou Bagage Accompagné)</h4>
                                        <!--<p>Statistics on minimal cards.</p>-->
                                    </div>
                                </div>

                                <div class="row">


                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <a href="javascript:void();">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left">
                                                                <h3>

                                                                    <?php
            $grp=$con->prepare('SELECT * FROM autre_envoi WHERE id_autre_envoi!="" ');
            $grp->execute();
            $nb_grp=$grp->rowcount();
            
            echo $nb_grp;
                    
                    ?>

                                                                </h3>

                                                                <span>autre_envois créés</span>
                                                            </div>
                                                            <div class="align-self-center">
                                                                <i
                                                                    class="fa fa-share primary_ font-large-2 float-right"></i>
                                                            </div>
                                                        </div>
                                                        <div class="progress mt-1 mb-0" style="height: 7px;">
                                                            <div class="progress-bar bg-primary_" role="progressbar"
                                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>



                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <a href="javascript:void();">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left">
                                                                <h3 class="warning">

                                                                    <?php
            $grp=$con->prepare('SELECT * FROM autre_envoi LEFT JOIN colis_autre_envoi ON autre_envoi.time_autre_envoi=colis_autre_envoi.autre_envoi_time WHERE etat_autre_envoi=0 ');
            $grp->execute();
            $nb_grp=$grp->rowcount();
            
            echo $nb_grp;
                    
                    ?>

                                                                </h3>

                                                                <span>En cours de saisie</span>
                                                            </div>
                                                            <div class="align-self-center">
                                                                <i
                                                                    class="fa fa-spinner fa-spin warning font-large-2 float-right"></i>
                                                            </div>
                                                        </div>
                                                        <div class="progress mt-1 mb-0" style="height: 7px;">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>



                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <a href="javascript:void();">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left">
                                                                <h3 class="danger">

                                                                    <?php
            $grp=$con->prepare('SELECT * FROM autre_envoi WHERE id_autre_envoi!="" AND etat_autre_envoi=1 ');
            $grp->execute();
            $nb_grp=$grp->rowcount();
            
            echo $nb_grp;
                    
                    ?>

                                                                </h3>
                                                                <span>En attente de livraison</span>
                                                            </div>
                                                            <div class="align-self-center">
                                                                <i
                                                                    class="fa fa-ban danger font-large-2 float-right"></i>
                                                            </div>
                                                        </div>
                                                        <div class="progress mt-1 mb-0" style="height: 7px;">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>



                                    <div class="col-xl-3 col-sm-6 col-12">
                                        <a href="javascript:void();">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="media-body text-left">
                                                                <h3 class="success">
                                                                    <?php
                    
            $grp=$con->prepare('SELECT * FROM autre_envoi WHERE id_autre_envoi!="" AND etat_autre_envoi=2 ');
            $grp->execute();
            $nb_grp=$grp->rowcount();
            
            echo $nb_grp;
                    
                    ?>

                                                                </h3>
                                                                <span>Livrés</span>
                                                            </div>
                                                            <div class="align-self-center">
                                                                <i
                                                                    class="fa fa-check-circle success font-large-2 float-right"></i>
                                                            </div>
                                                        </div>
                                                        <div class="progress mt-1 mb-0" style="height: 7px;">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 100%" aria-valuenow="100"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                </div>





                            </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--/Fin view comptable-->


    </div>
    </section>
    </div>
    <!-- end row -->






    <div class="dropdown d-inline">
        <a class="dropdown-toggle text-reset mb-3" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <span class="fw-semibold">Exporter vers </span> <span class="text-muted"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Fichier pdf</a>
            <a class="dropdown-item" href="#">Feuille de calcul excel</a>
        </div>
    </div>
    </div>
    </div>

    <div class="table-responsive">

    </div>
    </div>
    </div>
    </div>
    </div>
    <!--/Fin view comptable-->


    </div>
    </section>
    </div>
    <!-- end row -->




    </div>
    <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; Success'Lab .
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Créé avec <i class="mdi mdi-heart text-danger"></i> par <a
                            href="https://www.linkedin.com/in/ulrich-amani-643a3311b/" target="_blank"
                            class="text-reset">Success'Lab</a>
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
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>
    <!-- analytics dashboard init -->
    <script src="assets/js/pages/dashboard-analytics.init.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>
<?php
}
else
{
 echo'<meta http-equiv="refresh" content="0; url=deconex.php" />';
}
?>