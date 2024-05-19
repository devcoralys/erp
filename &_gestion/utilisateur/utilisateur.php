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

                                <a href="../besoin/besoin.php" class="text-reset notification-item">
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php include('../titre_logi.php'); ?></a></li>
                                        <li class="breadcrumb-item active">Formation</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="col-sm-2 toolbar-left">
				     <button id="demo-btn-addrow" style="margin:10px; " class="btn btn-purple creat_util" data-toggle="modal" data-target="#myModal_utilisateur"><i class="fa fa-plus"></i> Intégrer un utilisateur</button>
				</div>

                    <!--Formulaire de recherche-->
                    <div class="row">
					   <!---->
					    <div class="col-lg-12">
					        <div class="panel" style="background-color:transparent;">
					           								
					<div class="panel-body">
			  	 
                   <div class="box-body" >
                     <div class="form-group">
                       
                       <div class="row">
					   
					   <div class="col-xs-12">&nbsp;</div>
					   
                    <div class="col-md-3 col-xs-12">
              <label class="label_col">Groupe utilisateur<span class="semi_aste">&nbsp;</span></label>
        <select class="form-control selectpicker" data-placeholder="Choisir" id="recher_groupe" title="Choisir..." style="width: 100%;" data-live-search="true" data-width="100%">
        <option value="">---Choisir---</option>
                     <?php
           //include('../../../connex.php');
           $red=$con->prepare("SELECT * FROM groupe_utilisateur ORDER BY nom_type_groupe ASC");
           $red->execute();
           while($ro=$red->fetch())
           {
           ?>
           <option value="<?php echo''.$ro['id_type_groupe'].''; ?>"><?php echo''.stripslashes($ro['nom_type_groupe']).'' ; ?></option>
           <?php
           }
           ?>
           </select>
          </div>
           <div class="col-md-5 col-xs-12">
              <label class="label_col">Service<span class="semi_aste">&nbsp;</span></label>
            <select class="form-control selectpicker" data-placeholder="Choisir" id="recher_service" title="Choisir..." style="width: 100%;" data-live-search="true" data-width="100%">
            <option value="">---Choisir---</option>
                    <?php
          // include('../../../connex.php');
           $red=$con->prepare("SELECT * FROM service ORDER BY lib_service ASC");
           $red->execute();
           while($ro=$red->fetch())
           {
           ?>
           <option value="<?php echo''.$ro['id_service'].''; ?>"><?php echo''.stripslashes($ro['lib_service']).'' ; ?></option>
           <?php
           }
           ?>
           </select>
          </div>
       
           <div class="col-md-4 col-xs-12">
              <label class="label_col">Statut Compte<span class="semi_aste">&nbsp;</span></label>
  <select class="form-control selectpicker" data-placeholder="Choisir" id="recher_statut" title="Choisir..." style="width: 100%;" data-live-search="true" data-width="100%">
            <option value="0">Actif</option>
            <option value="1">Inactif</option>
           </select>
          </div>
                   <div class="col-md-6 col-xs-12">
                   <label class="label_col">Nom & prénom(s) utilisateur<span class="semi_aste">&nbsp;</span></label>
            <input type="text" class="form-control input" id="recher_utilisateur" name="recher_utilisateur" placeholder="Nom utilisateur"> 
                   </div>
                   
                     <div class="col-md-3 col-xs-12 col-xs-12" style="margin-top:30px;">
                   <div class="box-footer" >
                     <button id="search_util" class="btn btn-warning">Rechercher</button>
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
  <div class="modal fade" id="myModal_utilisateur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ajout_header_file">
        
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Intégrer un utilisateur</h4>
      </div>
      <div class="modal-body">
      <div class="msg_erreur"></div>
    
    <form name="form_utilisateur" id="form_utilisateur" class="form-horizontal" action="#">
    
     <div class="row">

     <div class="col-xs-12">
         <label class="label_col">Sélectionner une personne<span class="semi_aste">*</span></label>
         <select class="form-control selectpicker" data-placeholder="Choisir le(s) service(s)" id="personnel_id" name="personnel_id" style="width: 100%;" data-live-search="true" data-width="100%">
               <option value="">Veuillez choisir une personne...</option>
                <?php
	  //include('../../connex.php');
	  $red=$con->prepare("SELECT * FROM personnel WHERE valide!=1 ORDER BY nom_personnel ASC");
      $red->execute();
      while($ro=$red->fetch())
	  {
	  ?>
	  <option value="<?php echo''.$ro['id_personnel'].''; ?>"><?php echo''.stripslashes($ro['nom_personnel']).'' ; ?></option>
      <?php
	  }
	  ?>
      </select>
     </div>
      <div class="row">&nbsp;</div> <div class="row">&nbsp;</div>

      <hr/>
      	 
	 <div class="col-xs-7">
         <label class="label_col">Email utilisateur</label>
         <input type="text" class="form-control input" id="email" name="email"  readonly />
     </div>
	 
	 <div class="col-xs-5">
         <label class="label_col">Téléphone utilisateur</label>
         <input type="text" class="form-control input" id="tel" name="tel" readonly  />
     </div>
	 
	 <div class="col-xs-12">
         <label class="label_col">Service</label>
         <input type="text" class="form-control input" id="service" name="service" readonly  />
     </div>

     <div class="col-xs-12">
         <label class="label_col">Profession personnel</label>
         <input type="text" class="form-control input" id="fonction" name="fonction" readonly  />
     </div>
	
     <div class="col-xs-12">&nbsp;</div>

	  <div class="col-xs-12">
         <label class="label_col">Groupe utilisateur<span class="semi_aste">*</span></label>
       <select class="form-control selectpicker" data-placeholder="Choisir un groupe utilisateur" id="groupe" name="groupe" style="width: 100%;" data-live-search="true" data-width="100%">
	   <option value="">Choisir un groupe utilisateur</option>
                <?php
	  //include('../../connex.php');
	  $red=$con->prepare("SELECT * FROM groupe_utilisateur ORDER BY nom_type_groupe ASC");
      $red->execute();
      while($ro=$red->fetch())
	  {
	  ?>
	  <option value="<?php echo''.$ro['id_type_groupe'].''; ?>"><?php echo''.stripslashes($ro['nom_type_groupe']).'' ; ?></option>
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
        <button type="button" class="btn btn-danger button_annul" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</button>&nbsp;&nbsp;
        <button type="submit" id="envoie" class="btn btn-success button_valid"><i class="fa fa-check"></i> Créer</button>
     </div>

    </div>
    
    
      </form>
      </div>
     
    </div>
  </div>
</div>

<div class="modal fade mod_pop" id="myModal_utilisateur_mod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modif_header">
        
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil"></i> Modifier un utilisateur</h4>
      </div>
      <div class="modal-body">
      <div class="msg_erreur"></div>
    <div id="affiche_utilisateur_mod"></div>
    </div>
    
    </div>
  </div>
</div>  

<div class="modal fade mod_pop" id="myModal_utilisateur_sup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header sup_header">
        
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash-o"></i> Supprimer un utilisateur</h4>
      </div>
      <div class="modal-body">
      <div class="msg_erreur"></div>
    <div id="affiche_utilisateur_sup"></div>
    </div>
    
      <div class="modal-footer sup-footer">
        <button type="button" class="btn button_annul" data-dismiss="modal"><i class="fa fa-times"></i> Non</button>
        <button type="submit" id="submit_utilisateur_sup" class="btn button_supprimer"><i class="fa fa-bitbucket"></i> Oui</button>&nbsp;&nbsp;&nbsp;
      </div>
    
    </div>
  </div>
</div>  
<!-- fin modal utilisateur-->

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