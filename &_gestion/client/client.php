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
            <li style="background-color:#251f75; color:#fff;">
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
           
                

                    <div class="row">

                 


               <!--Middle Col-->
               <div class="col-lg-12">

                   <!-- start page title -->
                   <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                                                                             
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php include('../titre_logi.php'); ?></a></li>
                                        <li class="breadcrumb-item active">Gestion des clients</li>
                                    </ol>
                                </div>
                                <div class="col-lg-4 toolbar-right">
                                    <div class="row">
                                        <div class="col-lg-12 toolbar-right">
                                            <button style="margin:3px;" class="btn btn-purple add_pers" data-toggle="modal" data-target="#modal_pers"><i class="fa fa-plus"></i> Ajouter un client</button>
                                            <button style="margin:3px;" class="btn btn-success import_pers"><i class="fa fa-upload"></i> Importer la liste des clients</button>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 toolbar-left">
                                    <a href="../../xls/liste_client.csv"><button style="margin:3px;" class="btn btn-warning"><i class="fa fa-download"></i> Télécharger un modèle</button></a>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <!-- end page title -->
                    <div class="row">
                          
                      <!--Formulaire de recherche-->
                      <div class="card">
                        <div class="card-body" style="position: relative;">
                        
                    <div class="row">
                    <div class="col-lg-4 col-xs-12" style="margin-top:10px;">
			  <select class="form-control" data-trigger id="recher_pers">
              <option value="">Choisir le client</option>
					                                  <?php
	                                                 $rem=$con->prepare("SELECT * FROM client ORDER BY nom_client ASC");
                                                     $rem->execute();
                                                     while($rom=$rem->fetch())
	                                                 {
	                                                 ?>
        <option value="<?php echo''.$rom['id_client'].''; ?>"><?php echo'('.stripslashes($rom['code_client']).') '.stripslashes($rom['nom_client']).' - '.stripslashes($rom['tel_client']).' - '.stripslashes($rom['email_client']).' '; ?></option>
                                                     <?php
	                                                 }
	                                                 ?>
					                            </select>
					            </div>
								<div class="col-lg-4 col-xs-12" style="margin-top:10px;">
                                    <select class="form-control" data-trigger  id="recher_service" data-width="100%" style="margin-top:10px;">
                                        <option value="">Choisir le type de client</option>
                                        <option value="">Permanent</option>
                                        <option value="">Contractuel</option>	
                                        <option value="">Usagers</option>	 
                                        <option value="">Groupage</option>	                                
                                    </select>
					            </div>								
								
								<div class="col-lg-4 col-xs-12" style="margin-top:10px;">
                                    <select class="form-control" data-trigger  id="recher_service" data-width="100%" style="margin-top:10px;">
                                        <option value="">Aérien</option>
                                        <option value="">Maritime</option>	                                
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
  <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_pers" aria-hidden="true" id="modal_pers">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<form action="#" id="form_pers">
									<div class="modal-header aj_col">
									<h5 class="modal-title"><i class="fa fa-plus"></i> Nouveau client</h5>
									</div>
									
									<div class="modal-body">                
														
										<div class="row" style="text-align:center;">
										
									
										<!---->
										 <div class="col-lg-12">
										 
					                        <div class="form-group">
					                            <label class="col-lg-12 control-label">Nom du client<span class="rouge">*</span></label>
					                            <div class="col-lg-12s">
					                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom du client">
					                            </div>
					                        </div>
																	
											<div class="form-group">
					                            <label class="col-lg-12 control-label">Téléphone<span class="rouge">*</span></label>
					                            <div class="col-lg-12" style="margin-bottom:10px">
					                                <input type="text" class="form-control" name="tel" id="tel" placeholder="Téléphone">
					                            </div>
					                        </div>
					                        
					                        <div class="form-group">
					                            <label class="col-lg-12 control-label">Adresse<span class="rouge">*</span></label>
					                            <div class="col-lg-12" style="margin-bottom:10px">
					                                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse">
					                            </div>
					                        </div>
					                        
											<div class="form-group">
					                            <label class="col-lg-12 control-label">Email<span class="rouge">*</span></label>
					                            <div class="col-lg-12" style="margin-bottom:10px">
                                                <!--
					                                <input pattern="/^[^\W][a-zA-Z0-9\-\._]+[^\W]@[^\W][a-zA-Z0-9\-\._]+[^\W]\.[a-zA-Z]{2,6}$/" type="email" class="form-control" name="email" id="email" placeholder="Email">
                            -->
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
					                            </div>
					                        </div>
							
											
										 </div>
										<!---->	
											
									    </div>
										
									</div>   
                                    
                                    <div style="text-align:center; background-color:red; color:#fff; font-size:12;" class="msg_erreur"></div>	
									
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-danger button_annul">Annuler</button>&nbsp;&nbsp;
										<button type="submit" id="envoie_pers" class="btn btn-purple">Créer</button>
									</div>
										
									</form>										
								</div>
							</div>
						</div>
					
							
<div class="modal fade mod_pop" id="modal_mod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
									<form action="#" id="form_pers_mod">
									<div class="modal-header modif_header">
									<h5 class="modal-title">Modification du client</h5>
									</div>
									<div class="msg_erreur"></div>	
									<div class="modal-body">   
		                              <div id="affiche_mod"></div>
		
		                             
		                             </div>
										
									            
									
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-danger button_annul">Annuler</button>
	                                    <button type="submit" id="submit_mod" class="btn btn-success button_enregistrer">Enregistrer</button>
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
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash-o"></i> Suppression du client</h4>
      </div>
      <div class="modal-body">
	
	    <div class="msg_erreur"></div>
		<div id="affiche_sup"></div>
		</div>
		
		<div class="modal-footer ajout-footer">
		<button type="button" data-dismiss="modal" class="btn btn-danger">Non</button>&nbsp;&nbsp;
        <button type="submit" id="submit_sup" class="btn button_supprimer"><i class="fa fa-bitbucket"></i> Oui</button>&nbsp;&nbsp;&nbsp;
      </div>
	  
    </div>
  </div>
</div>
							
<div class="modal fade mod_pop" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header detail_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-align-justify fa_jus"></i> Détail du client</h4>
      </div>
      <div class="modal-body"  style="background-color: #E6E6E6;">
		<div id="affiche_detail"></div>
		</div>
		
		<div class="modal-footer ajout-footer">
		<button type="button" data-dismiss="modal" class="btn btn-danger button_annul">Fermer</button>&nbsp;&nbsp;
      </div>
	  
    </div>
  </div>
</div>

            <!--/ Mes Pop Up-->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> &copy; MALEA Supply Chain Services Consulting .
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