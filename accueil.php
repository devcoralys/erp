<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../connex.php');
?>
<!doctype html>
<html lang="fr">

<head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NV91QKLQDN"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-NV91QKLQDN');
</script>

  <meta charset="utf-8" />
   <title><?php include('titre_ent_1.php'); ?>  | Accueil</title>
  <?php include('meta.php'); ?>
<!--Tableau de bord-->
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<!--/Tableau de bord-->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <div class="navbar-header" >
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
                                    $afic=$con->prepare('SELECT * FROM besoin LEFT JOIN utilisateur ON utilisateur.secur=besoin.demandeur_secur WHERE id_besoin!="" AND decaisse=0 AND etat_besoin=0 AND demandeur_secur="'.$_SESSION['secur_site'].'" ORDER BY id_besoin DESC ');
                                    $afic->execute();

                                    while($iafic=$afic->fetch())
                                    {

                                                ?>

                                <a href="besoin/besoin.php" class="text-reset notification-item">
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
                            <img class="rounded-circle header-profile-user" src="photo/<?php echo $_SESSION['photo_site']; ?>" alt="Photo de profil"/>
							<?php }else{ ?> 
							<img class="rounded-circle header-profile-user" src="photo/profile-2398782.png" alt="Photo de profil">
							<?php } ?> 
                            <span class="ms-2 d-none d-sm-block user-item-desc">
                                <span class="user-name"><?php echo $_SESSION['nom_utilisateur_site']; ?></span>
                                <span class="user-sub-title"><?php echo $_SESSION['nom_type_groupe']; ?></span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <a class="dropdown-item" href="profil/profil.php"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                        
                            <a class="dropdown-item" href="deconex.php"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Déconexion</span></a>
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

                
            <li>
                <a href="client/client.php">
                    <i class="icon nav-icon fa fa-users" ></i>
                    <span class="menu-item" data-key="t-email">Clients</span>
                </a>
            </li>
            
             <?php if($_SESSION['acces_demande_decaissement']==1 ){ ?>
            <li>
                <a href="demande_decaissement/demande_decaissement.php">
                    <i class="icon nav-icon fa fa-money-bills" ></i>
                    <span class="menu-item" data-key="t-email">Demande de décaissement</span>
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
                    <li><a href="dossier/dossier_import.php" data-key="t-p-grid">Reglement Fournisseurs</a></li>
                    <li><a href="dossier/dossier_export.php" data-key="t-p-list">Reglement clients</a></li>
                    <li><a href="dossier/etat_codage.php" data-key="t-p-list">Factures normalisées</a></li>
                </ul>
            </li>
            <?php } ?>


            <li>
                <a href="javascript:void();" class="has-arrow">
                    <i class="fa fa-folder" data-feather="briefcase_"></i>
                    <span class="menu-item" data-key="t-projects">Dossiers clients</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="dossier/dossier_import.php" data-key="t-p-grid">Import</a></li>
                    <li><a href="dossier/dossier_export.php" data-key="t-p-list">Export</a></li>
                    <li><a href="dossier/etat_codage.php" data-key="t-p-list">Etat de codage</a></li>
                </ul>
            </li>

          
            <li>
                <a href="javascript:void();" class="has-arrow">
                    <i class="fa fa-credit-card" data-feather="briefcase_"></i>
                    <span class="menu-item" data-key="t-projects">Finances</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="javascript:void();" data-key="t-p-grid"> Encaissement</a></li>
                    <li><a href="depense/depense.php" data-key="t-p-list"> Décaissement</a></li>
                </ul>
            </li>

            <?php if($_SESSION['service_id']==4 || $_SESSION['service_id']==1 || $_SESSION['is_valid']==1 || $_SESSION['is_dg']==1 ){ ?>
            <li>
                <a href="personnel/personnel.php" class="active">
                    <i class="icon nav-icon fa fa-user"></i>
                    <span class="menu-item">Gestion du personnel</span>
                </a>
            </li>
            <?php } ?>
                    
            <li class="menu-title">Sécurité</li>

            <li>
                <a href="profil/profil.php">
                    <i class="icon nav-icon fa fa-user-circle"></i>
                    <span class="menu-item">Profile</span>
                </a>
            </li>
            <?php if($_SESSION['service_id']==1 ){ ?>
            <li>
                <a href="utilisateur/utilisateur.php">
                    <i class="icon nav-icon fa fa-users"></i>
                    <span class="menu-item">Utilisateur</span>
                </a>
            </li>
            <?php } ?>
            <?php if( $_SESSION['service_id']==1 || $_SESSION['is_valid']==1 || $_SESSION['is_dg']==1 ){ ?>
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
            <div class="main-content" >
                <div class="page-content" >
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Analytics</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Analytics</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row" >
                            <div class="col-xxl-9 col-lg-8">
                                <div class="card" style="background-image:url('../img/logo_fili.png'); background-repeat:no-repeat; background-position: center center;">
                                    <div class="card-header bg-transparent">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <h5 class="card-title mb-0">NOMBRE DE TRAVAILLEURS ACTIFS PAR JOUR</h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle text-reset" href="#"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="fw-semibold">Exporter vers:</span> 
                                                    </a>
            
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Fichier PDF</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-bottom py-3">
                                        <div class="row gx-lg-5">
                                            <div class="col-md-auto">
                                                <div>
                                                    <p class="text-muted mb-2">Effectif total</p>
                                                    <h4 class="mb-0">41<span class="text-muted font-size-12 fw-normal ms-2">employés<i class="uil uil-arrow-up-right text-success ms-1"></i></span></h4>
                                                </div>
                                            </div>
                                            <div class="col-md align-self-end">
                                                <div class="text-md-end mt-4 mt-md-0">
                                                    <ul class="list-inline main-chart mb-0">
                                                        <li class="list-inline-item chart-border-left me-0 border-0">
                                                            <h4 class="text-primary my-1">3<span class="text-muted d-inline-block fw-normal font-size-13 ms-2">Clients</span></h4>
                                                        </li>
                                                        <li class="list-inline-item chart-border-left me-0">
                                                            <h4 class="my-1">24<span class="text-muted d-inline-block fw-normal font-size-13 ms-2">dossiers en cours</span>
                                                            </h4>
                                                        </li>
                                                        <li class="list-inline-item chart-border-left me-0">
                                                            <h4 class="my-1">25<span class="text-muted d-inline-block fw-normal font-size-13 ms-2">Employés actifs</span></h4>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->

                                    <div>
                                        <div id="chart-area" class="apex-charts" dir="ltr"></div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
            
                            <div class="col-xxl-3 col-lg-4">
                                <div class="card">
                                    <div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title rounded-circle font-size-12">
                                                                <i class="fas fa-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-1">Utilisateurs</p>
                                                        <h5 class="font-size-16 mb-0">28</h5>
                                                    </div>
                                                    <div class="flex-shrink-0 align-self-end">
                                                        <div class="badge badge-soft-success ms-2">1.2 % <i class="uil uil-arrow-up-right text-success ms-1"></i></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title rounded-circle font-size-12">
                                                                <i class="fas fa-hourglass-start"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-1">Sessions</p>
                                                        <h5 class="font-size-16 mb-0">3.85 k</h5>
                                                    </div>
                                                    <div class="flex-shrink-0 align-self-end">
                                                        <div class="badge badge-soft-danger ms-2">1.2 % <i class="uil uil-arrow-down-left text-danger ms-1"></i></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title rounded-circle font-size-12">
                                                                <i class="fas fa-stopwatch"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-1">Durée de Session</p>
                                                        <h5 class="font-size-16 mb-0">1 min</h5>
                                                    </div>
                                                    <div class="flex-shrink-0 align-self-end">
                                                        <div class="badge badge-soft-danger ms-2">1.1 % <i class="uil uil-arrow-down-left text-danger ms-1"></i></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title rounded-circle font-size-12">
                                                                <i class="fas fa-chart-area"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-1">Taux d'utilisation</p><!--nb_user/nb_session-->
                                                        <h5 class="font-size-16 mb-0">24.03 %</h5>
                                                    </div>
                                                    <div class="flex-shrink-0 align-self-end">
                                                        <div class="badge badge-soft-success ms-2">1.2 % <i class="uil uil-arrow-up-right text-success ms-1"></i></div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="card-title text-truncate mb-4">Activités des utilisateurs</h5>
                                            </div>
    
                                            <div class="flex-shrink-0">
                                                <div class="dropdown">
                                                    <a class="font-size-16 text-muted dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal"></i>
                                                    </a>
                                                
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div id="chart-column" class="apex-charts" dir="ltr"></div>
                                        </div>
                                        
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="card-title text-truncate mb-3">Repartition des clients</h5>
                                            </div>
    
                                            <div class="flex-shrink-0">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle text-reset" href="#"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="fw-semibold">Exporter:</span> </span>
                                                    </a>
            
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Fichier PDF</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-7">
                                                <div class="d-flex h-100 map-widget">
                                                    <div id="world-map-markers" style="height: 270px;"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div data-simplebar style="max-height: 230px;">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="px-4 py-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-shrink-0 align-self-center me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light rounded-circle">
                                                                            <img src="assets/images/flags/us_.jpg" alt="" height="10">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">BACI</p>
                                                                    <h5 class="font-size-16 mb-0">81%</h5>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <div class="badge badge-soft-success">0.02 % <i class="uil uil-arrow-up-right text-success ms-1"></i></div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="px-4 py-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-shrink-0 align-self-center me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light rounded-circle">
                                                                            <img src="assets/images/flags/spain_.jpg" alt="" height="10">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">FIDA</p>
                                                                    <h5 class="font-size-16 mb-0">77%</h5>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <div class="badge badge-soft-success">0.01 % <i class="uil uil-arrow-up-right text-success ms-1"></i></div>
                                                                </div>
                                                            </div>
                                                        </li>
        
                                                        <li class="px-4 py-3">
                                                            <div class="d-flex align-items-start">
                                                                <div class="flex-shrink-0 align-self-center me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light rounded-circle">
                                                                            <img src="assets/images/flags/germany_.jpg" alt="" height="10">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">BBG Bouaké</p>
                                                                    <h5 class="font-size-16 mb-0">80%</h5>
                                                                </div>
                                                                <div class="flex-shrink-0 ms-2">
                                                                    <div class="badge badge-soft-success">0.03 % <i class="uil uil-arrow-up-right text-success ms-1"></i></div>
                                                                </div>
                                                            </div>
                                                        </li>
        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="card-title text-truncate mb-3">Progression par service</h5>
                                            </div>
    
                                            <div class="flex-shrink-0">
                                                <div class="dropdown">
                                                    <a class="dropdown-toggle text-reset" href="#"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="fw-semibold">Exporter vers:</span>
                                                    </a>
            
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Fichier PDF</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Services</th>
                                                        <th scope="col">Sessions</th>
                                                        <th scope="col">Utilisateurs</th>
                                                        <th scope="col" style="width: 25%;">Progression</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Service COMMERCIAL</th>
                                                        <td>648</td>
                                                        <td>432</td>
                                                        <td><div class="text-success text-nowrap">27.38%</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Service IMPORT MARITIME</th>
                                                        <td>524</td>
                                                        <td>385</td>
                                                        <td><div class="text-success text-nowrap">35.16%</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Service IMPORT AERIEN</th>
                                                        <td>432</td>
                                                        <td>390</td>
                                                        <td><div class="text-success text-nowrap">30.20%</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Service FINANCIER</th>
                                                        <td>521</td>
                                                        <td>423</td>
                                                        <td><div class="text-success text-nowrap">29.05%</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Service INFORMATIQUE</th>
                                                        <td>602</td>
                                                        <td>553</td>
                                                        <td><div class="text-success text-nowrap">33.14%</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Direction</th>
                                                        <td>602</td>
                                                        <td>553</td>
                                                        <td><div class="text-success text-nowrap">33.14%</div></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table responsive -->
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end  -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; Dream Team
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