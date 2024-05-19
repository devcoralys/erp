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
    <title><?php include('../titre_ent_1.php'); ?> | Accueil</title>

    <?php include('../meta.php'); ?>


    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="../assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!-- plugin css -->
    <link href="../assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet">

    <!-- One of the following themes -->
    <link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/classic.min.css" /> <!-- 'classic' theme -->
    <link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/monolith.min.css" /> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/nano.min.css" /> <!-- 'nano' theme -->

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
                            <a href="../personnel/personnel.php" class="active"
                                style="background-color:#251f75; color:#fff;">
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



                <div class="row">




                    <!--Middle Col-->
                    <div class="col-lg-12">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a
                                                    href="javascript: void(0);"><?php include('../titre_logi.php'); ?></a>
                                            </li>
                                            <li class="breadcrumb-item active">Gestion du personnel</li>
                                        </ol>
                                    </div>
                                    <div class="col-lg-4 toolbar-right">
                                        <div class="row">
                                            <div class="col-lg-12 toolbar-right">
                                                <button style="margin:3px;" class="btn btn-purple add_pers"
                                                    data-toggle="modal" data-target="#modal_pers"><i
                                                        class="fa fa-plus"></i> Ajouter une personne</button>
                                                <button style="margin:3px;" class="btn btn-success import_pers"><i
                                                        class="fa fa-download"></i> Importer la liste du
                                                    personnel</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">

                            <!--Formulaire de recherche-->
                            <div class="card">
                                <div class="card-body" style="position: relative;">

                                    <div class="row">
                                        <div class="col-lg-4 col-xs-12" style="margin-top:10px;">
                                            <select class="form-control" data-trigger id="recher_pers">
                                                <option value="">Choisir le personnel</option>
                                                <?php
	                                                 $rem=$con->prepare("SELECT * FROM personnel ORDER BY nom_personnel ASC");
                                                     $rem->execute();
                                                     while($rom=$rem->fetch())
	                                                 {
	                                                 ?>
                                                <option value="<?php echo''.$rom['id_personnel'].''; ?>">
                                                    <?php echo'('.stripslashes($rom['matricule_personnel']).') '.stripslashes($rom['nom_personnel']).''; ?>
                                                </option>
                                                <?php
	                                                 }
	                                                 ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-xs-12" style="margin-top:10px;">
                                            <select class="form-control" data-trigger id="recher_service"
                                                data-width="100%" style="margin-top:10px;">
                                                <option value="">Choisir le service</option>
                                                <?php
	                                                 $rem_1=$con->prepare("SELECT * FROM service ORDER BY lib_service ASC");
                                                     $rem_1->execute();
                                                     while($rom_1=$rem_1->fetch())
	                                                 {
	                                                 ?>
                                                <option value="<?php echo''.$rom_1['id_service'].''; ?>">
                                                    <?php echo''.stripslashes($rom_1['lib_service']).''; ?></option>
                                                <?php
	                                                 }
	                                                 ?>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-xs-12" style="margin-top:10px;">
                                            <select class="form-control" data-trigger id="recher_fonction"
                                                title="Choisir une fonction..." data-width="100%"
                                                style="margin-top:10px;">
                                                <option value="">Choisir la fonction</option>
                                                <?php
	                                                 $rem_2=$con->prepare("SELECT * FROM fonction ORDER BY lib_fonction ASC");
                                                     $rem_2->execute();
                                                     while($rom_2=$rem_2->fetch())
	                                                 {
	                                                 ?>
                                                <option value="<?php echo''.$rom_2['id_fonction'].''; ?>">
                                                    <?php echo''.stripslashes($rom_2['lib_fonction']).''; ?></option>
                                                <?php
	                                                 }
	                                                 ?>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-xs-12" style="margin-top:10px;">
                                            <select class="form-control" data-trigger id="recher_statut"
                                                data-width="100%" style="margin-top:10px;">
                                                <option value="">Choisir le statut</option>
                                                <?php
	                                               $rem_3=$con->prepare("SELECT * FROM statut_personnel ORDER BY lib_statut_personnel ASC");
                                                     $rem_3->execute();
                                                     while($rom_3=$rem_3->fetch())
	                                                 {
	                                                 ?>
                                                <option value="<?php echo''.$rom_3['id_statut_personnel'].''; ?>">
                                                    <?php echo''.stripslashes($rom_3['lib_statut_personnel']).''; ?>
                                                </option>
                                                <?php
	                                                 }
	                                                 ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-xs-12" style="margin-top:10px;">
                                            <select class="form-control" data-trigger id="recher_sexe" data-width="100%"
                                                style="margin-top:10px;">
                                                <option value="">Choisir le sexe</option>
                                                <option value="1">HOMME</option>
                                                <option value="2">FEMME</option>
                                            </select>
                                        </div>

                                        <!--<div class="col-lg-2" style="margin-top:10px; text-align:center;"><button type="submit" id="envoie_recher_pers" class="btn btn-warning envoie_recher_pers"><i class="fa fa-search"></i> Rechercher</button></div>-->
                                    </div>

                                </div>
                            </div>
                            <!--/Formulaire de recherche-->

                            <!--Contenu page-->
                            <div class="chargement" style="text-align:center; margin-top:70px"></div>
                            <div class="affiche_pers"></div>
                            <!--/contenu page-->

                        </div>
                        <!-- end row -->
                    </div>
                    <!--End Middle Col-->



                </div> <!-- end row-->

                <!--Mes Pop Up-->
                <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_pers"
                    aria-hidden="true" id="modal_pers">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="#" id="form_pers">
                                <div class="modal-header aj_col">
                                    <h5 class="modal-title"><i class="fa fa-plus"></i> Nouvelle personne</h5>
                                </div>

                                <div class="modal-body">

                                    <div class="row" style="text-align:center;">

                                        <div class="col-lg-4"
                                            style="/*background-color: #F7F7F7; border:1px solid #D1D1D1;*/ height:207px; ">

                                            <div class="col_pho" id="image_preview">
                                                <img src="../../photo/photo_profil.jpg" width="147px" height="150px"
                                                    alt="Photo de profil">
                                            </div>

                                            <div class="col-lg-12" style="margin-top:10px">
                                                <span class="pull-left btn btn-file" for="photo">
                                                    <label for="photo" class="btn_ch"><i
                                                            class="fa fa-paperclip"></i>&nbsp;Choisir photo</label>
                                                    <input type="file" id="photo" name="photo">
                                                </span>
                                            </div>

                                        </div>


                                        <!---->
                                        <div class="col-lg-8">

                                            <div class="form-group">
                                                <label class="col-lg-12 control-label">Matricule<span
                                                        class="rouge">*</span></label>
                                                <div class="col-lg-12" style="margin-bottom:10px">
                                                    <input type="text" class="form-control" name="mat" id="mat"
                                                        placeholder="Matricule">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-12 control-label">Nom & prénom(s)<span
                                                        class="rouge">*</span></label>
                                                <div class="col-lg-12s">
                                                    <input type="text" class="form-control" name="nom" id="nom"
                                                        placeholder="Nom & prénom(s)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-12 control-label" style="margin-top:10px">Sexe<span
                                                        class="rouge">*</span></label>
                                                <div class="col-lg-12">
                                                    <div class="radio">
                                                        <input id="mascu" class="magic-radio" type="radio" name="sexe"
                                                            value="1">
                                                        <label for="mascu">Masculin</label>

                                                        <input id="fem" class="magic-radio" type="radio" name="sexe"
                                                            value="2">
                                                        <label for="fem">Féminin</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="demo-msk-date" class="col-md-12 control-label">Date de
                                                    naissance<span class="rouge">*</span></label>
                                                <div class="col-md-12" style="margin-bottom:10px">
                                                    <input type="date" id="date_nais" name="date_nais"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-12 control-label">Téléphone<span
                                                        class="rouge">*</span></label>
                                                <div class="col-lg-12" style="margin-bottom:10px">
                                                    <input type="text" class="form-control" name="tel" id="tel"
                                                        placeholder="Téléphone">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-12 control-label">Email<span
                                                        class="rouge">*</span></label>
                                                <div class="col-lg-12" style="margin-bottom:10px">
                                                    <!--
					                                <input pattern="/^[^\W][a-zA-Z0-9\-\._]+[^\W]@[^\W][a-zA-Z0-9\-\._]+[^\W]\.[a-zA-Z]{2,6}$/" type="email" class="form-control" name="email" id="email" placeholder="Email">
                            -->
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-12 control-label">Date d'entrée<span
                                                        class="rouge">*</span></label>
                                                <div class="col-lg-12" style="margin-bottom:10px">
                                                    <input type="date" id="date_entre" name="date_entre"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-12 control-label">Service<span
                                                        class="rouge">*</span></label>
                                                <div class="col-lg-12" style="margin-bottom:10px">
                                                    <select data-trigger class="form-control" id="service"
                                                        name="service" style="width:100%;">
                                                        <option value="">Choisir un service...</option>
                                                        <?php
	                                                 $rem_1=$con->prepare("SELECT * FROM service ORDER BY lib_service ASC");
                                                     $rem_1->execute();
                                                     while($rom_1=$rem_1->fetch())
	                                                 {
	                                                 ?>
                                                        <option value="<?php echo''.$rom_1['id_service'].''; ?>">
                                                            <?php echo''.stripslashes($rom_1['lib_service']).''; ?>
                                                        </option>
                                                        <?php
	                                                 }
	                                                 ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-12 control-label">Fonction<span
                                                        class="rouge">*</span></label>
                                                <div class="col-lg-12" style="margin-bottom:10px">
                                                    <select data-trigger class="form-control" id="fonctio"
                                                        title="Choisir une fonction..." name="fonctio"
                                                        data-live-search="true" data-width="100%"
                                                        style="margin-top:10px;">
                                                        <option value="">Choisir une fonction...</option>
                                                        <?php
	                                                 $rem_2=$con->prepare("SELECT * FROM fonction ORDER BY lib_fonction ASC");
                                                     $rem_2->execute();
                                                     while($rom_2=$rem_2->fetch())
	                                                 {
	                                                 ?>
                                                        <option value="<?php echo''.$rom_2['id_fonction'].''; ?>">
                                                            <?php echo mb_strimwidth(stripslashes($rom_2['lib_fonction']), 0, 25, "..."); ?>
                                                        </option>
                                                        <?php
	                                                 }
	                                                 ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-12 control-label">Statut<span
                                                        class="rouge">*</span></label>
                                                <div class="col-lg-12" style="margin-bottom:10px">
                                                    <select data-trigger class="form-control selectpicker" id="statut"
                                                        title="Choisir un statut..." name="statut"
                                                        data-live-search="true" data-width="100%"
                                                        style="margin-top:10px;">
                                                        <option value="">Choisir un statut...</option>
                                                        <?php
	                                               $rem_3=$con->prepare("SELECT * FROM statut_personnel ORDER BY lib_statut_personnel ASC");
                                                     $rem_3->execute();
                                                     while($rom_3=$rem_3->fetch())
	                                                 {
	                                                 ?>
                                                        <option
                                                            value="<?php echo''.$rom_3['id_statut_personnel'].''; ?>">
                                                            <?php echo''.stripslashes($rom_3['lib_statut_personnel']).''; ?>
                                                        </option>
                                                        <?php
	                                                 }
	                                                 ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <!---->

                                    </div>

                                </div>

                                <div style="text-align:center; background-color:red; color:#fff; font-size:12;"
                                    class="msg_erreur"></div>

                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal"
                                        class="btn btn-danger button_annul">Annuler</button>&nbsp;&nbsp;
                                    <button type="submit" id="envoie_pers" class="btn btn-purple">Créer</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


                <div class="modal fade mod_pop" id="modal_mod" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="#" id="form_pers_mod">
                                <div class="modal-header modif_header">
                                    <h5 class="modal-title">Modification du personnel</h5>
                                </div>
                                <div class="msg_erreur"></div>
                                <div class="modal-body">
                                    <div id="affiche_mod"></div>


                                </div>



                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal"
                                        class="btn btn-danger button_annul">Annuler</button>
                                    <button type="submit" id="submit_mod"
                                        class="btn btn-success button_enregistrer">Enregistrer</button>
                                </div>

                        </div>

                        </form>
                    </div>
                </div>
            </div>



            <div class="modal fade mod_pop" id="modal_sup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header sup_header">
                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash-o"></i> Suppression du
                                personnel</h4>
                        </div>
                        <div class="modal-body">

                            <div class="msg_erreur"></div>
                            <div id="affiche_sup"></div>
                        </div>

                        <div class="modal-footer ajout-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-danger">Non</button>&nbsp;&nbsp;
                            <button type="submit" id="submit_sup" class="btn button_supprimer"><i
                                    class="fa fa-bitbucket"></i> Oui</button>&nbsp;&nbsp;&nbsp;
                        </div>

                    </div>
                </div>
            </div>


            <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_actif"
                aria-hidden="true" id="modal_actif">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="#" id="form_actif">
                            <div class="modal-header act_col">
                                <h5 class="modal-title">Motif de sortie</h5>

                            </div>
                            <div class="msg_erreur"></div>
                            <div class="modal-body">

                                <div class="row">

                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Motif de sortie<span
                                                class="rouge">*</span></label>
                                        <div class="col-lg-12" style="margin-bottom:10px">
                                            <select class="form-control" data-trigger id="actif"
                                                title="Choisir un motif de sortie..." name="actif"
                                                data-live-search="true" data-width="100%" style="margin-top:10px;">
                                                <option value="">Choisir un motif de sortie...</option>
                                                <?php
	                                                 $rem_2=$con->prepare("SELECT * FROM motif_sortie_pers_soign ORDER BY lib_motif ASC");
                                                     $rem_2->execute();
                                                     while($rom_2=$rem_2->fetch())
	                                                 {
	                                                 ?>
                                                <option value="<?php echo''.$rom_2['id_motif'].''; ?>">
                                                    <?php echo ''.stripslashes($rom_2['lib_motif']).''; ?></option>
                                                <?php
	                                                 }
	                                                 ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-lg-4 control-label"><b>Date de sortie</b><span
                                                class="rouge">*</span></label>
                                        <div class="col-lg-12" style="margin-bottom:10px">
                                            <input type="date" class="form-control" name="date_sortie" id="dp1"
                                                placeholder="Date de sortie">
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal"
                                    class="btn btn-danger button_annul">Annuler</button>&nbsp;&nbsp;
                                <button type="submit" id="envoie_actif" class="btn btn-dark">Valider</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <div class="modal fade mod_pop" id="modal_detail" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header detail_header">
                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-align-justify fa_jus"></i> Détail
                                du personnel</h4>
                        </div>
                        <div class="modal-body" style="background-color: #E6E6E6;">
                            <div id="affiche_detail"></div>
                        </div>

                        <div class="modal-footer ajout-footer">
                            <button type="button" data-dismiss="modal"
                                class="btn btn-danger button_annul">Fermer</button>&nbsp;&nbsp;
                        </div>

                    </div>
                </div>
            </div>

            <!--/ Mes Pop Up-->

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

            <!-- Select 2 -->
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function () {
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