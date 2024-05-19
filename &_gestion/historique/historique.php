<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../../connex.php');
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?php include('../titre_ent_1.php'); ?> | Historique</title>

    <?php include('../meta.php'); ?>


    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="../assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!--Intégration de jquery/Ajax-->
    <script type="text/javascript" src="../../js/jquery_1.7.1_jquery.min.js"></script>
    <script type="text/javascript" src="js/function.js"></script>
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

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item user text-start d-flex align-items-center"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <?php if($_SESSION['photo_site']!=''){ ?>
                            <img class="rounded-circle header-profile-user"
                                src="../photo/<?php echo $_SESSION['photo_site']; ?>" alt="Photo de profil" />
                            <?php }else{ ?>
                            <img class="rounded-circle header-profile-user" src="../photo/profile-2398782.png"
                                alt="Photo de profil">
                            <?php } ?>
                            <span class="ms-2 d-none d-sm-block user-item-desc">
                                <span class="user-name"><?php echo $_SESSION['nom_utilisateur_site']; ?></span>
                                <span class="user-sub-title"><?php echo $_SESSION['nom_type_groupe']; ?></span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <a class="dropdown-item" href="../profil/profil.php"><i
                                    class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span
                                    class="align-middle">Profile</span></a>

                            <a class="dropdown-item" href="../deconex.php"><i
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
                            <a href="../historique/historique.php" style="background-color:#251f75; color:#fff;">
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
                                        <li class="breadcrumb-item"><a
                                                href="javascript: void(0);"><?php include('../titre_logi.php'); ?></a>
                                        </li>
                                        <li class="breadcrumb-item active">Formation</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!--Formulaire de recherche-->

                    <!--/Formulaire de recherche-->

                    <div class="row">

                        <div class="chargement" style="text-align:center; margin-top:70px"></div>
                        <div class="aff_evaluation">

                            <div class="row">
                                <!---->
                                <div class="col-lg-12">
                                    <div class="panel">



                                        <div class="panel-body" style="background-color: #FDFDFD">
                                            <!--  	<form role="form" id="form_recher_hist" name="form_recher_hist" action="#">-->

                                            <div class="">
                                                <div class="form-group">

                                                    <div class="row">

                                                        <!--
                   <div class="col-xs-5">
 <input type="text" class="form-control input" id="recher_historique" name="recher_historique" placeholder="Rechercher par date, adresse ip, nom de l'utilisateur ou opération"/>
                   </div>
-->
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="recher_historiquer" class="control-label">
                                                                    <b>Recherche opération ou adresse ip</b>
                                                                </label><br />
                                                                <input type="text" class="form-control input"
                                                                    id="recher_historique" name="recher_historique"
                                                                    placeholder="Libellé de l'opération ou adresse ip" />
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label for="recher_utilisateur" class="control-label">
                                                                    <b>Recherche Utilisateur</b>
                                                                </label><br />
                                                                <select id="recher_utilisateur"
                                                                    name="recher_utilisateur"
                                                                    data-placeholder="Choisir un utilisateur"
                                                                    class="form-control selectpicker"
                                                                    data-live-search="true" data-width="100%">
                                                                    <option value="">Choix utilisateur...</option><?php $red=$con->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur!='' ORDER BY nom_utilisateur ASC");
                                                     $red->execute();
                                                     while($ro=$red->fetch())
                                                     {
                                                     ?>
                                                                    <option
                                                                        value="<?php echo''.$ro['id_utilisateur'].''; ?>">
                                                                        <?php echo ''.stripslashes($ro['nom_utilisateur']).''; ?>
                                                                    </option>
                                                                    <?php
                                                     }
                                                     ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label for="recher_date_debut" class="control-label">
                                                                    <b>Début des opérations</b>
                                                                </label><br />
                                                                <input type="date" class="form-control" id="dp1"
                                                                    name="recher_date_debut" placeholder="Date Début" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <label for="recher_date_fin" class="control-label">
                                                                    <b>Fin des opérations</b>
                                                                </label><br />
                                                                <input type="date" class="form-control" id="dp2"
                                                                    name="recher_date_fin" placeholder="Date Fin" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-1" style="margin-top:8px;">
                                                            <div class="form-group">
                                                                <br />
                                                                <button id="hist_search"
                                                                    class="btn btn-warning btn-md">Ok</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--</form>-->
                                    </div>


                                </div>

                            </div>

                            <div class="chargement" style="text-align:center; margin-top:70px"></div>
                            <div class="affiche_historique" style="margin-top:20px; margin-bottom:30px;">



                            </div>

                        </div>


                    </div>

                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Modal demande_formation -->

        <!-- fin modal demande_formation-->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; Zeinab Pressing.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Découvrez nos solution en <i class="mdi mdi-cubes text-danger"></i> <a href="#"
                                target="_blank" class="text-reset">cliquant ici</a>
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

            <!-- JAVASCRIPT -->
            <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="../assets/libs/simplebar/simplebar.min.js"></script>
            <script src="../assets/libs/feather-icons/feather.min.js"></script>

            <!-- apexcharts -->
            <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

            <script src="../assets/js/pages/dashboard-sales.init.js"></script>

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