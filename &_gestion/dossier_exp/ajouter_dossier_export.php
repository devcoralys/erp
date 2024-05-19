
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
    <title><?php include('../titre_ent_1.php'); ?> | Création de dossier</title>

    <?php include('../meta.php'); ?>
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="../assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

            <!-- dropzone css -->
        <link href="../assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />


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
                                    <h4 class="mb-0">Créer un dossier d'exportation</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">dossier</a></li>
                                            <li class="breadcrumb-item active">Créer un dossier d'exportation</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                                        <div class="grp_choice">
                                            <div class="row" id="select_single">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-no-search" class="form-label font-size-13 text-muted">Options added
                                                            via config with no search</label>
                                                        <select class="form-control" name="choices-single-no-search" id="choices-single-no-search">
                                                            <option value="0">Zero</option>
                                                        </select>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="choices-single-no-sorting" class="form-label font-size-13 text-muted">Options configurées</label>
                                                        <select class="form-control" name="choices-single-no-sorting" id="choices-single-no-sorting">
                                                            
                                                        </select>
                                                    </div>
                                                </div><!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <!-- Single select input Example -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <ul class="wizard-nav mb-5">
                                                <li class="wizard-list-item">
                                                    <div class="list-item">
                                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Infos basiques">
                                                            <i class="uil uil-clipboard-notes"></i>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="wizard-list-item">
                                                    <div class="list-item">
                                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Assignations">
                                                            <i class="uil uil-users-alt"></i>
                                                        </div>
                                                    </div>
                                                </li>
    <!--
                                                <li class="wizard-list-item">
                                                    <div class="list-item">
                                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Fichiers joints">
                                                            <i class="uil uil-paperclip"></i>
                                                        </div>
                                                    </div>
                                                </li>
            -->
                                            </ul>
                                            <!-- wizard-nav -->

                                            <div class="wizard-tab">
                                                <div class="text-center mb-4">
                                                    <h5>Informations sur le dossier</h5>
                                                    <p class="card-title-desc">Veuillez remplir le formulaire ci-dessous</p>
                                                </div>
                                                <form>
                                                    <div>
                                                        <div class="row">

                                                        <div class="col-md-4">
                                                            <label for="nom_dossier" class="form-label">Marchandise</label>
                                                            <input required id="nom_dossier" name="nom_dossier" type="text" class="form-control" placeholder="Marchandise">
                                                        </div>
                                                        
                                                        <div class="col-md-4">
                                                            <label for="nom_dossier" class="form-label">Client</label>
                                                            <select class="form-control selectpicker" data-placeholder="Choisir" id="client_id" title="Choisir..." style="width: 100%;" data-live-search="true" data-width="100%">
                                                                <option value="">---Choisir---</option>
                                                                        <?php
                                                                $red=$con->prepare("SELECT * FROM client ORDER BY nom_client ASC");
                                                                $red->execute();
                                                                while($ro=$red->fetch())
                                                                {
                                                                ?>
                                                                <option value="<?php echo''.$ro['id_client'].''; ?>"><?php echo' ('.$ro['code_client'].') '.stripslashes($ro['nom_client']).'' ; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="nom_dossier" class="form-label">Type de transit</label>
                                                            <select class="form-control selectpicker" data-placeholder="Choisir" id="type_transit_id" title="Choisir..." style="width: 100%;" data-live-search="true" data-width="100%">
                                                                <option value="">---Choisir---</option>
                                                                        <?php
                                                                $red=$con->prepare("SELECT * FROM type_transit ORDER BY lib_type_transit ASC");
                                                                $red->execute();
                                                                while($ro=$red->fetch())
                                                                {
                                                                ?>
                                                                <option value="<?php echo''.$ro['id_type_transit'].''; ?>"><?php echo ''.stripslashes($ro['lib_type_transit']).'' ; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        </div>
    
                                                        <div class="mb-3">
                                                            <label for="description_dossier" class="form-label">Détails marchandise</label>
                                                            <textarea required class="form-control" id="description_dossier" name="description_dossier" rows="3" placeholder="Détails marchandise..."></textarea>
                                                        </div>
                                                        
                                                        <div class="mb-3">
                                                            <label class="form-label">Date</label>
                                                            <input type="text" class="date_int_dossier form-control" id="datepicker-range">
                                                        </div>  
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- wizard-tab -->

                                            <div class="wizard-tab">
                                                
                                                <div class="text-center mb-4">
                                                    <h5>Assignations</h5>
                                                    <p class="card-title-desc">Constitution de l'équipe</p>
                                                </div>
                                                <form>
                                                    <div>

                                                        <div class="mb-3">
                                                            <label>Service</label>
                                                            <select required id="service_dossier_id" name="service_dossier_id" class="form-select shadow-none">
                                                                    <option value="">Service concerné par le dossier</option>
                                                                    <?php
                                                                    $rem_2=$con->prepare("SELECT * FROM service ORDER BY lib_service ASC");
                                                                    $rem_2->execute();
                                                                    while($rom_2=$rem_2->fetch())
                                                                    {
                                                                    ?>
                                        <option value="<?php echo''.$rom_2['id_service'].''; ?>"><?php echo ' SERVICE '.stripslashes($rom_2['lib_service']); ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                            </select>
                                                        </div>
    
                                                        <div class="mb-4">
                                                            <label>Membres de l'équipe</label>
                                                            <div class="mb-3">
                                                                <select required class="form-control" name="membre_dossier[]" id="choices-multiple-remove-button"  multiple>
                                                                    <option value="">Veuillez sélectionner une ou plusieurs personnes</option>
                                                                    <?php
                                                                    $rem_2=$con->prepare("SELECT * FROM utilisateur LEFT JOIN personnel ON personnel.id_personnel=utilisateur.personnel_id LEFT JOIN fonction ON fonction.id_fonction=personnel.fonction_id ORDER BY nom_utilisateur ASC");
                                                                    $rem_2->execute();
                                                                    while($rom_2=$rem_2->fetch())
                                                                    {
                                                                    ?>
                                        <option value="<?php echo''.$rom_2['secur'].''; ?>"><?php echo ' '.stripslashes($rom_2['nom_utilisateur']).' (<b>'.stripslashes($rom_2['lib_fonction']).'</b>) '; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                            <!-- wizard-tab -->

                                            <!--
                                            <div class="wizard-tab">
                                                <div class="text-center mb-4">
                                                    <h5>Fichiers joints</h5>
                                                    <p class="card-title-desc">Téléchargement des fichiers joints</p>
                                                </div>
                                                <form action="#" class="dropzone">
                                                    <div class="fallback">
                                                        <input id="fichier" name="fichier[]" type="file" multiple />
                                                    </div>

                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-light uil uil-upload-alt"></i>
                                                        </div>

                                                        <h5 class="font-size-16">Glisser déposer ou cliquer pour joindre des fichiers au dossier.</h5>
                                                    </div>
                                                </form>
                                            </div>
                                                                -->
                                            <!-- wizard-tab -->

                                            <div class="d-flex align-items-start gap-3 mt-4">
                                                <button type="button" class="btn btn-primary w-sm" id="prevBtn" onclick="nextPrev(-1)">Précédent</button>
                                                <button type="button" class="btn btn-primary w-sm ms-auto" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
                                                <button type="button" class="btn btn-primary w-sm ms-auto" id="submit_form">Soumettre</button>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row --> 
                    </div> <!-- container-fluid -->
                </div><!-- End Page-content -->

                
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


                <!-- Select 2 -->
                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    <script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });  
    </script>


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/feather-icons/feather.min.js"></script>

        

        <!-- flatpickr js -->
        <script src="../assets/libs/flatpickr/flatpickr.min.js"></script>

            <!-- plugins -->
            <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
        <!-- Modern colorpicker bundle -->
        <script src="../assets/libs/@simonwep/pickr/pickr.min.js"></script>

        <!-- init js -->
        <script src="../assets/js/pages/form-advanced.init.js"></script>

        <!-- dropzone plugin -->
        <script src="../assets/libs/dropzone/min/dropzone.min.js"></script>

        <!-- init js -->
        <script src="../assets/js/pages/project-create.init.js"></script>

        <script src="../assets/js/app.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            //Select multiple
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
                $('.js-example-basic-single').select2();
            });
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