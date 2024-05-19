<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../../connex.php');


    $id_decaissement_mod=$_GET['id_dec_mod'];
    
    $_SESSION['id_dec_mod']=$id_decaissement_mod;
    
    $enc=$con->prepare('SELECT * FROM decaissement WHERE id_decaissement=:A');
    $enc->execute(array('A'=>$id_decaissement_mod));

    $inf_enc=$enc->fetch();

    $date_decaissement=$inf_enc["date_decaissement"];
    $num_recu_decaissement=$inf_enc["num_recu_decaissement"];
    $num_dossier_decaissement=$inf_enc["num_dossier_decaissement"];
    $montant_decaissement=floatval($inf_enc["montant_decaissement"]);
    $mode_reglement_decaissement=$inf_enc["mode_reglement_decaissement"];
    $motif_decaissement=$inf_enc["motif_decaissement"];

?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title><?php include('../titre_ent_1.php'); ?> | decaissement</title>

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
                    <li><a href="../encaissement/encaissement.php" data-key="t-p-grid" style="background-color:#251f75; color:#fff;"> Encaissement</a></li>
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
                                                              
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php include('../titre_logi.php'); ?></a></li>
                                        <li class="breadcrumb-item active">declarations</li>
                                    </ol>
                                    
                                </div>
                                <button id="retour_enc" style="margin:10px; " class="btn btn-primary"><i class="fa fa-angle-left"></i> Retour</button>
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
                        <div class="page-content-wrap"  >
                            
                            <!-- START WIDGETS -->    
                            <div class="panel-body"> 
                            <div>
                               <br />
              
                            </div> 
                            
                            <div class="chargement" style="text-align:center;"></div>               
                            <div class="row voir aff_decaissement_modifier">
                                
                                  <form name="form_decaissement" id="form_decaissement" class="form-horizontal" action="#">
		
	
		<div class="row">
		    
            <div class="col-lg-4 col-xs-12">
                <label>Date<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px; color:green; font-weight:bold;" type="date" class="form-control" required id="date_decaissement" name="date_decaissement" value="<?php echo $inf_enc["date_decaissement"]; ?>" />
            </div>		
            
            <div class="col-lg-8 col-xs-12">
                &nbsp;
            </div>	
            
		</div>
		
		<div class="row">
		    
            <div class="col-lg-4 col-xs-12">
                <label>N° Réçu<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px; color:green; font-weight:bold;" type="text" class="form-control" required id="num_recu_decaissement" name="num_recu_decaissement" value="<?php echo $inf_enc["num_recu_decaissement"]; ?>"  />
            </div>		
            
            <div class="col-lg-8 col-xs-12">
                <label>N° Dossier<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px; color:green; font-weight:bold;" type="text" class="form-control" required id="num_dossier_decaissement" name="num_dossier_decaissement" value="<?php echo $inf_enc["num_dossier_decaissement"]; ?>" />
            </div>	
            
		</div>
		
		<div class="row">&nbsp;</div>
		
		<div class="row">
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nom_client_decaissement" name="nom_client_decaissement" placeholder="nom_client" value="<?php echo $inf_enc["nom_client_decaissement"]; ?>" >
                            <label for="floatingInput">Nom et Prénom(s) du client</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating mb-3">
                            <input  type="number" class="form-control" id="montant_decaissement" name="montant_decaissement" placeholder="montant" value="<?php echo floatval($inf_enc["montant_decaissement"]); ?>" >
                            <label for="floatingInput">Montant</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                           <label for="floatingInput">Mode de règlement</label>
                           <select id="mode_reglement" name="mode_reglement" class="form-select" style="margin:1px;">
                                <option value="">Sélectionner un mode de règlement</option>
                                <option value="cheque" <?php if($inf_enc["mode_reglement_decaissement"]=="cheque"){ echo ' selected '; } ?>>Chèque</option>
                                <option value="espece" <?php if($inf_enc["mode_reglement_decaissement"]=="espece"){ echo ' selected '; } ?>>Espèce</option>
                                <option value="virement" <?php if($inf_enc["mode_reglement_decaissement"]=="virement"){ echo ' selected '; } ?>>Virement</option>
                            </select>
                    </div>
                  
        
        </div>
        
        <hr>
        
        <div class="row">
		    
            <div class="col-lg-12 col-xs-12">
                <label>Motif<span class="semi_aste">*</span></label>
                <textarea style="background-color: rgb(249, 249, 249); color: green; font-weight: bold; height: 200px; --darkreader-inline-bgcolor: #1b1e1f; --darkreader-inline-color: #72ff72;" type="text" class="form-control" required="" id="motif_decaissement" name="motif_decaissement" data-darkreader-inline-bgcolor="" data-darkreader-inline-color=""><?php echo $inf_enc["motif_decaissement"]; ?></textarea>
            </div>		
            
		</div>
        
        <div class="row">&nbsp;</div>

		 <div class="modal-footer ajout-footer_file"> 
		 <button type="submit" id="envoie_decaissement_mod" class="btn button_valid"><i class="fa fa-check"></i> Enregistrer les modifications</button>&nbsp;&nbsp;
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