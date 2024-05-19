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
        <title><?php include('../titre_ent_1.php'); ?> | Suivi général</title>

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
            
            <li style="background-color:#251f75; color:#fff;">
                <a href="../rapport/rapport.php" class="active">
                    <i class="icon nav-icon fa fa-file-text"></i>
                    <span style="color:#fff;" class="menu-item">suivi général journalier</span>
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
                                        <li class="breadcrumb-item active">suivi général des dossiers</li>
                                    </ol>
                                    
                                </div>
 <!--                                <button id="ajout_suivi_general" data-toggle="modal" data-target="#myModal_suivi_general" style="margin:10px; " class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter un enregistrement</button>-->
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
                            <div class="row voir aff_suivi_général__">
                                
                                <!-- Table to display editable data -->
<form id="dataForm" method="post" action="save_data.php">
<div class="table-responsive">
<table id="editableTable" class="table table-bordered">
    <thead>
        <tr>
            <th>N° Dossier</th>
            <th>Client</th>
            <th>Agent en charge</th>
            <th>N° Cotation</th>
            <th>FDI/AC</th>
            <th>N° RFCV</th>
            <th>N° DCH</th>
            <th>Bureau</th>
            <th>Passage</th>
            <th>Facture</th>
            <th>Montant</th>
            <th>Mode règlement</th>
            <th>Date de règlement</th>
            <th>Caution</th>
            <th>N° Bordereau</th>
            <th>N° Archive</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Rows will be dynamically added here -->
    </tbody>
</table>
</div>
<!-- Button to add a new row -->
<button type="button" class="btn btn-success" id="addRowBtn">Ajouter</button>

<!-- Bouton de soumission -->
<button type="submit" class="btn btn-primary">Enregistrer en BDD</button>
</form>
<script>
    $(document).ready(function() {
        // Function to add a new row to the table
        $("#addRowBtn").click(function() {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type="text" class="form-control" name="dossier[]"></td>';
            cols += '<td><input type="text" class="form-control" name="client[]"></td>';
            cols += '<td><input type="text" class="form-control" name="agent[]"></td>';
            cols += '<td><input type="text" class="form-control" name="cotation[]"></td>';
            cols += '<td><input type="text" class="form-control" name="fdi_ac[]"></td>';
            cols += '<td><input type="text" class="form-control" name="rfcv[]"></td>';
            cols += '<td><input type="text" class="form-control" name="dch[]"></td>';
            cols += '<td><input type="text" class="form-control" name="bureau[]"></td>';
            cols += '<td><input type="text" class="form-control" name="passage[]"></td>';
            cols += '<td><input type="text" class="form-control" name="facture[]"></td>';
            cols += '<td><input type="text" class="form-control" name="montant[]"></td>';
            cols += '<td><input type="text" class="form-control" name="mode_reglement[]"></td>';
            cols += '<td><input type="text" class="form-control" name="date_reglement[]"></td>';
            cols += '<td><input type="text" class="form-control" name="caution[]"></td>';
            cols += '<td><input type="text" class="form-control" name="bordereau[]"></td>';
            cols += '<td><input type="text" class="form-control" name="archive[]"></td>';
            cols += '<td><button type="button" class="btn btn-danger removeRowBtn">Remove</button></td>';

            newRow.append(cols);
            $("table tbody").append(newRow);
            
            // Événement pour soumettre le formulaire lors de la modification
            $("#editableTable").on("input", "input[type='text']", function() {
                $("#dataForm").submit();
            });
        });

        // Function to remove a row from the table
        $("table").on("click", ".removeRowBtn", function() {
            $(this).closest("tr").remove();
        });
    });
</script>

                         
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
<div class="modal fade" id="myModal_suivi_general" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ajout_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-list"></i> Suivi général des dossiers</h4>
      </div>
      <div class="modal-body">
	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>
				
		<div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">GridJs Table</h4>
                                        <a href="https://gridjs.io/" target="_blank" class="btn btn-sm btn-secondary-subtle">Docs <i class="mdi mdi-arrow-right align-middle"></i></a>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div id="table-gridjs" class="table"><div role="complementary" class="gridjs gridjs-container" style="width: 100%;"><div class="gridjs-head">
                                            <div class="gridjs-search"><input type="search" placeholder="Type a keyword..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input"></div></div><div class="gridjs-wrapper" style="height: auto;"><table role="grid" class="gridjs-table" style="height: auto;"><thead class="gridjs-thead"><tr class="gridjs-tr"><th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0" style="min-width: 82px; width: 176px;"><div class="gridjs-th-content">Name</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button></th><th data-column-id="email" class="gridjs-th gridjs-th-sort" tabindex="0" style="min-width: 178px; width: 382px;"><div class="gridjs-th-content">Email</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button></th><th data-column-id="position" class="gridjs-th gridjs-th-sort" tabindex="0" style="min-width: 229px; width: 493px;"><div class="gridjs-th-content">Position</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button></th><th data-column-id="company" class="gridjs-th gridjs-th-sort" tabindex="0" style="min-width: 121px; width: 261px;"><div class="gridjs-th-content">Company</div><button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button></th><th data-column-id="country" class="gridjs-th gridjs-th-sort" tabindex="0" style="min-width: 115px; width: 246px;"><div class="gridjs-th-content">Country</div><button tabindex="-1" aria-label="Sort column descending" title="Sort column descending" class="gridjs-sort gridjs-sort-asc"></button></th></tr></thead><tbody class="gridjs-tbody"><tr class="gridjs-tr"><td data-column-id="name" class="gridjs-td">Noel</td><td data-column-id="email" class="gridjs-td">noel@example.com</td><td data-column-id="position" class="gridjs-td">Customer Data Director</td><td data-column-id="company" class="gridjs-td">Howell - Rippin</td><td data-column-id="country" class="gridjs-td">Germany</td></tr><tr class="gridjs-tr"><td data-column-id="name" class="gridjs-td">Jonathan</td><td data-column-id="email" class="gridjs-td">jonathan@example.com</td><td data-column-id="position" class="gridjs-td">Senior Implementation Architect</td><td data-column-id="company" class="gridjs-td">Hauck Inc</td><td data-column-id="country" class="gridjs-td">Holy See</td></tr><tr class="gridjs-tr"><td data-column-id="name" class="gridjs-td">Harold</td><td data-column-id="email" class="gridjs-td">harold@example.com</td><td data-column-id="position" class="gridjs-td">Forward Creative Coordinator</td><td data-column-id="company" class="gridjs-td">Metz Inc</td><td data-column-id="country" class="gridjs-td">Iran</td></tr><tr class="gridjs-tr"><td data-column-id="name" class="gridjs-td">Cathy</td><td data-column-id="email" class="gridjs-td">cathy@example.com</td><td data-column-id="position" class="gridjs-td">Customer Data Director</td><td data-column-id="company" class="gridjs-td">Ebert, Schamberger and Johnston</td><td data-column-id="country" class="gridjs-td">Mexico</td></tr><tr class="gridjs-tr"><td data-column-id="name" class="gridjs-td">Kerry</td><td data-column-id="email" class="gridjs-td">kerry@example.com</td><td data-column-id="position" class="gridjs-td">Lead Applications Associate</td><td data-column-id="company" class="gridjs-td">Feeney, Langworth and Tremblay</td><td data-column-id="country" class="gridjs-td">Niger</td></tr></tbody></table></div><div class="gridjs-footer"><div class="gridjs-pagination"><div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 2">Showing <b>1</b> to <b>5</b> of <b>10</b> results</div><div class="gridjs-pages"><button tabindex="0" role="button" disabled="" title="Previous" aria-label="Previous" class="">Previous</button><button tabindex="0" role="button" class="gridjs-currentPage" title="Page 1" aria-label="Page 1">1</button><button tabindex="0" role="button" class="" title="Page 2" aria-label="Page 2">2</button><button tabindex="0" role="button" title="Next" aria-label="Next" class="">Next</button></div></div></div><div id="gridjs-temp" class="gridjs-temp"></div></div></div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>

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
        
                <!-- gridjs js -->
        <script src="assets/libs/gridjs/gridjs.umd.js"></script>

        <script src="assets/js/pages/gridjs.init.js"></script>

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