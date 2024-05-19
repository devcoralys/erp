<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../connex.php');


    // Inclusion de la classe DataProvider
    require_once('DataProvider.php');

    // Création d'une instance de la classe DataProvider
    $dataProvider = new DataProvider();


if($_SESSION['acces_dashboard']==1){ header('Location: accueil_dg.php'); }
?>
<!doctype html>
<html lang="fr">

<head>


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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
                                                <span class="bg-primary rounded-circle font-size-16">
                                                    <i class="uil-shopping-basket"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1"><?php echo stripslashes($iafic['objet_demande']); ?></h6>
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
                                    class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span
                                    class="align-middle">Profile</span></a>

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
                                                <p class="mb-1 text-truncate text-muted">Demandes de décaissement</p>
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
                                                <p class="mb-1 text-truncate text-muted">Règlements fournisseurs</p>
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
                                                <p class="mb-1 text-truncate text-muted">Factures normalisées</p>
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
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; MALEA Supply Chain Services Consulting .
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