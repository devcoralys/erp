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
    <title><?php include('../titre_ent_1.php'); ?> | Evaluation</title>

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

                        <li class="menu-title">Sécurité</li>

                        <li>
                            <a href="../profil/profil.php">
                                <i class="icon nav-icon fa fa-user-circle"></i>
                                <span class="menu-item">Profile</span>
                            </a>
                        </li>
                        <?php if($_SESSION['acces_secur']==1 ){ ?>
                        <li>
                            <a href="../utilisateur/utilisateur.php" style="background-color:#251f75; color:#fff;">
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
                    <div class="col-sm-2 toolbar-left">
                        <button id="demo-btn-addrow" style="margin:10px; " class="btn btn-purple creat_util"
                            data-toggle="modal" data-target="#myModal_utilisateur"><i class="fa fa-plus"></i> Intégrer
                            un utilisateur</button>
                    </div>

                    <!--Formulaire de recherche-->
                    <div class="row">
                        <!---->
                        <div class="col-lg-12">
                            <div class="panel" style="background-color:transparent;">

                                <div class="panel-body">

                                    <div class="box-body">
                                        <div class="form-group">

                                            <div class="row">

                                                <div class="col-xs-12">&nbsp;</div>

                                                <div class="col-md-3 col-xs-12">
                                                    <label class="label_col">Groupe utilisateur<span
                                                            class="semi_aste">&nbsp;</span></label>
                                                    <select class="form-control selectpicker" data-placeholder="Choisir"
                                                        id="recher_groupe" title="Choisir..." style="width: 100%;"
                                                        data-live-search="true" data-width="100%">
                                                        <option value="">---Choisir---</option>
                                                        <?php
           //include('../../../connex.php');
           $red=$con->prepare("SELECT * FROM groupe_utilisateur ORDER BY nom_type_groupe ASC");
           $red->execute();
           while($ro=$red->fetch())
           {
           ?>
                                                        <option value="<?php echo''.$ro['id_type_groupe'].''; ?>">
                                                            <?php echo''.stripslashes($ro['nom_type_groupe']).'' ; ?>
                                                        </option>
                                                        <?php
           }
           ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-5 col-xs-12">
                                                    <label class="label_col">Service<span
                                                            class="semi_aste">&nbsp;</span></label>
                                                    <select class="form-control selectpicker" data-placeholder="Choisir"
                                                        id="recher_service" title="Choisir..." style="width: 100%;"
                                                        data-live-search="true" data-width="100%">
                                                        <option value="">---Choisir---</option>
                                                        <?php
          // include('../../../connex.php');
           $red=$con->prepare("SELECT * FROM service ORDER BY lib_service ASC");
           $red->execute();
           while($ro=$red->fetch())
           {
           ?>
                                                        <option value="<?php echo''.$ro['id_service'].''; ?>">
                                                            <?php echo''.stripslashes($ro['lib_service']).'' ; ?>
                                                        </option>
                                                        <?php
           }
           ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-4 col-xs-12">
                                                    <label class="label_col">Statut Compte<span
                                                            class="semi_aste">&nbsp;</span></label>
                                                    <select class="form-control selectpicker" data-placeholder="Choisir"
                                                        id="recher_statut" title="Choisir..." style="width: 100%;"
                                                        data-live-search="true" data-width="100%">
                                                        <option value="0">Actif</option>
                                                        <option value="1">Inactif</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <label class="label_col">Nom & prénom(s) utilisateur<span
                                                            class="semi_aste">&nbsp;</span></label>
                                                    <input type="text" class="form-control input"
                                                        id="recher_utilisateur" name="recher_utilisateur"
                                                        placeholder="Nom utilisateur">
                                                </div>

                                                <div class="col-md-3 col-xs-12 col-xs-12" style="margin-top:30px;">
                                                    <div class="box-footer">
                                                        <button id="search_util"
                                                            class="btn btn-warning">Rechercher</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!--/Formulaire de recherche-->

                        <div class="row">

                            <div class="chargement" style="text-align:center; margin-top:70px"></div>
                            <div class="aff_utilisateur row">
                            </div>
                        </div>
                        <!-- container-fluid -->
                    </div>
                    <!-- End Page-content -->

                    <!-- Modal utilisateur -->
                    <div class="modal fade" id="myModal_utilisateur" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header ajout_header_file">

                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Intégrer un
                                        utilisateur</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="msg_erreur"></div>

                                    <form name="form_utilisateur" id="form_utilisateur" class="form-horizontal"
                                        action="#">

                                        <div class="row">

                                            <div class="col-xs-12">
                                                <label class="label_col">Sélectionner une personne<span
                                                        class="semi_aste">*</span></label>
                                                <select class="form-control selectpicker"
                                                    data-placeholder="Choisir le(s) service(s)" id="personnel_id"
                                                    name="personnel_id" style="width: 100%;" data-live-search="true"
                                                    data-width="100%">
                                                    <option value="">Veuillez choisir une personne...</option>
                                                    <?php
	  //include('../../connex.php');
	  $red=$con->prepare("SELECT * FROM personnel WHERE valide!=1 ORDER BY nom_personnel ASC");
      $red->execute();
      while($ro=$red->fetch())
	  {
	  ?>
                                                    <option value="<?php echo''.$ro['id_personnel'].''; ?>">
                                                        <?php echo''.stripslashes($ro['nom_personnel']).'' ; ?></option>
                                                    <?php
	  }
	  ?>
                                                </select>
                                            </div>
                                            <div class="row">&nbsp;</div>
                                            <div class="row">&nbsp;</div>

                                            <hr />

                                            <div class="col-xs-7">
                                                <label class="label_col">Email utilisateur</label>
                                                <input type="text" class="form-control input" id="email" name="email"
                                                    readonly />
                                            </div>

                                            <div class="col-xs-5">
                                                <label class="label_col">Téléphone utilisateur</label>
                                                <input type="text" class="form-control input" id="tel" name="tel"
                                                    readonly />
                                            </div>

                                            <div class="col-xs-12">
                                                <label class="label_col">Service</label>
                                                <input type="text" class="form-control input" id="service"
                                                    name="service" readonly />
                                            </div>

                                            <div class="col-xs-12">
                                                <label class="label_col">Profession personnel</label>
                                                <input type="text" class="form-control input" id="fonction"
                                                    name="fonction" readonly />
                                            </div>

                                            <div class="col-xs-12">&nbsp;</div>

                                            <div class="col-xs-12">
                                                <label class="label_col">Groupe utilisateur<span
                                                        class="semi_aste">*</span></label>
                                                <select class="form-control selectpicker"
                                                    data-placeholder="Choisir un groupe utilisateur" id="groupe"
                                                    name="groupe" style="width: 100%;" data-live-search="true"
                                                    data-width="100%">
                                                    <option value="">Choisir un groupe utilisateur</option>
                                                    <?php
	  //include('../../connex.php');
	  $red=$con->prepare("SELECT * FROM groupe_utilisateur ORDER BY nom_type_groupe ASC");
      $red->execute();
      while($ro=$red->fetch())
	  {
	  ?>
                                                    <option value="<?php echo''.$ro['id_type_groupe'].''; ?>">
                                                        <?php echo''.stripslashes($ro['nom_type_groupe']).'' ; ?>
                                                    </option>
                                                    <?php
	  }
	  ?>
                                                </select>
                                            </div>

                                            <div class="col-xs-12">&nbsp;</div>

                                            <!--
	  <div class="col-xs-12">
         <label class="label_col">Droit(s)</label><br />
		 <div class="af_choix"> </div>
     </div>
    -->

                                            <div class="col-xs-12">&nbsp;</div>

                                            <div style="text-align:right;">
                                                <button type="button" class="btn btn-danger button_annul"
                                                    data-dismiss="modal"><i class="fa fa-times"></i>
                                                    Annuler</button>&nbsp;&nbsp;
                                                <button type="submit" id="envoie"
                                                    class="btn btn-success button_valid"><i class="fa fa-check"></i>
                                                    Créer</button>
                                            </div>

                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade mod_pop" id="myModal_utilisateur_mod" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header modif_header">

                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Modifier un
                                        utilisateur</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="msg_erreur"></div>
                                    <div id="affiche_utilisateur_mod"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade mod_pop" id="myModal_utilisateur_sup" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header sup_header">

                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash-o"></i> Supprimer un
                                        utilisateur</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="msg_erreur"></div>
                                    <div id="affiche_utilisateur_sup"></div>
                                </div>

                                <div class="modal-footer sup-footer">
                                    <button type="button" class="btn button_annul" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Non</button>
                                    <button type="submit" id="submit_utilisateur_sup" class="btn button_supprimer"><i
                                            class="fa fa-bitbucket"></i> Oui</button>&nbsp;&nbsp;&nbsp;
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- fin modal utilisateur-->

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