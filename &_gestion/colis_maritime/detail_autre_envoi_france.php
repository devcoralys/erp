<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../../connex.php');


$_SESSION['id_colis_maritime']=$_GET['id_colis_maritime'];


//Traçabilité
$ip	= $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];
$adresse='Adresse IP: '.$ip.' Port: '.$port;

$date=gmdate("Y-m-d H:i:s");

$inf1=$con->prepare('SELECT * FROM colis_maritime WHERE id_colis_maritime=:A');
$inf1->execute(array('A'=>$_SESSION['id_colis_maritime']));
$info1=$inf1->fetch();

$lib_trace="Ouverture autre envoi N* <b>".$info1['num_colis_maritime']."</b> ";

$red=$con->prepare("INSERT INTO trace (lib_trace, date_trace, adresse_ip, secur) VALUES (:A, :B, :C, :D)");
$red->execute(array('A'=>$lib_trace, 'B'=>$date, 'C'=>$adresse, 'D'=>$_SESSION['secur_site']));
//Tracabilité

$inf=$con->prepare('SELECT * FROM colis_maritime WHERE id_colis_maritime=:A');
$inf->execute(array('A'=>$_SESSION['id_colis_maritime']));
$info=$inf->fetch();

$num_colis_maritime=$info['num_colis_maritime'];
$date_colis_maritime=date("d/m/Y", strtotime($info['date_colis_maritime']));
$expediteur_colis_maritime=stripslashes($info['expediteur_colis_maritime']);
$num_cni_expediteur_colis_maritime=stripslashes($info['num_cni_expediteur_colis_maritime']);
$tel_expediteur_colis_maritime=stripslashes($info['tel_expediteur_colis_maritime']);
$code_colis_colis_maritime=stripslashes($info['code_colis_colis_maritime']);
$destinataire_colis_maritime=stripslashes($info['destinataire_colis_maritime']);
$destination_colis_maritime=stripslashes($info['destination_colis_maritime']);
$tel_destinataire_colis_maritime=stripslashes($info['tel_destinataire_colis_maritime']);
$etat_colis_maritime=$info['etat_colis_maritime'];
$time_colis_maritime=$info['time_colis_maritime'];
$valeur_colis_colis_maritime=$info['valeur_colis_colis_maritime'];
$montant_assurance=$info['montant_assurance'];

$_SESSION['time']=$time_colis_maritime;
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title><?php include('../titre_ent_1.php'); ?> | colis_maritime</title>

        <?php include('../meta.php'); ?>
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <a href="../accueil.php">
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

            <?php if($_SESSION['acces_colis_maritime']==1 ){ ?>
            <li>
                <a href="../colis_maritime/colis_maritime.php" style="background-color:#251f75; color:#fff;">
                    <i class="icon nav-icon fa fa-ravelry"></i>
                    <span class="menu-item" data-key="t-email">STT International</span>
                </a>
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
                                                              
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php include('../titre_logi.php'); ?></a></li>
                                        <li class="breadcrumb-item active">ENVOI</li>
                                    </ol>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        
                    <div class="chargement_" style="text-align:center; margin-top:70px"></div>
						  <div class="aff_evaluation_">

                          <div>
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


                          <!--En tête-->
                          <div class="row">

                          <?php 

                          $bes=$con->prepare('SELECT * FROM colis_maritime WHERE id_colis_maritime=:A');
                          $bes->execute(array('A'=>$_SESSION['id_colis_maritime']));
                          $ibes=$bes->fetch();

                       
                          $etat_colis_maritime = $ibes['etat_colis_maritime'];
                     
                          if($etat_colis_maritime==0)
                          {
                            $etat='En cours d\'édition';
                          }
                          
                          if($etat_colis_maritime==1)
                          {
                            $etat='En attente de 1ère validation';
                          }
                          
                          if($etat_colis_maritime==2)
                          {
                            $etat='En attente de 2ème validation';
                          }
                          
                          if($etat_colis_maritime==3)
                          {
                            $etat='Demande validée';
                          }
                          
                          if($etat_colis_maritime==4)
                          {
                            $etat='Demande réfusée';
                          }
                          
                          
                          ?>
					   
                     
					    <div class="col-lg-12">
					        <div class="panel">
					            <div class="panel-heading" style="background-color:#a44b73; background-color:#f7f8fa;">
					                <h3 class="panel-title"  style="text-align:center; color:#3e58ff;">LISTE DE COLISAGE <b>N° <?php echo $num_colis_maritime; ?></b></h3><br>
                                    <p style="text-align:center; color:#3e58ff;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <b>Date : <?php echo $date_colis_maritime; ?> </b><br>
                                                <b>Expéditeur : </b><label><?php echo $expediteur_colis_maritime; ?></label><br>
                                            </div>
                                            <div class="col-md-3">
                                                <b>N° CNI : </b><label><?php echo $num_cni_expediteur_colis_maritime; ?></label><br>
                                                <b>Téléphone Expéditeur : </b><label><?php echo $tel_expediteur_colis_maritime; ?></label><br>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Code Colis : <?php echo $code_colis_colis_maritime; ?> </b><br>
                                                <b>Destinataire : </b><label><?php echo $destinataire_colis_maritime; ?></label><br>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Destination : </b><label><?php echo $destination_colis_maritime; ?></label><br>
                                                <b>Téléphone Destinataire : </b><label><?php echo $tel_destinataire_colis_maritime; ?></label><br>
                                            </div>
                                        </div>
                                    </p>
					            </div>
                                <div id="demo-custom-toolbar2" class="table-toolbar-left" style="margin-left:20px; padding-top:10px">
					            </div>
                                <div id="demo-custom-toolbar2" class="table-toolbar-right" style="margin-right:20px; padding-top:10px">

		<button class="btn btn-danger btn-sm" id="fermer" ><i class="fa fa-times"></i> Fermer</button>
        <?php if($etat_colis_maritime==0){ ?>
        <button id="terminer" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Terminer</button>
        <button id="ajout_colis_colis_maritime" data-toggle="modal" data-target="#myModal_colis_colis_maritime" style="margin:10px; right:10px; position:absolute; margin-bottom:10px;" class="btn btn-purple right"><i class="fa fa-plus"></i> Ajouter une ligne</button>
         <button id="ajout_assurance" data-toggle="modal" data-target="#myModal_assurance" style="margin:10px; " class="btn btn-warning"><i class="fa fa-shield"></i> Appliquer assurance</button>
        <?php } ?>   

        </div>

        <div>&nbsp;</div>
        
        <p style="border-bottom:1px solid #E3E3E3">&nbsp;&nbsp;</p>
                <p style="text-align:center; font-size:20px; color:#4d627b; font-weight:bold;">
                <?php if($etat_colis_maritime>=1){ ?>
                <a href="../exportation/pdf/pdf_colis_maritime.php?id_colis_maritime=<?php echo $_SESSION['id_colis_maritime']; ?>" target="_blank" style="font-size:28px; font-weight:600; color: black;" title="Cliquez pour générer la fiche">
                    <i class="fa fa-print"></i>
                </a>
                &nbsp;
                <!--
                <a href="../exportation/pdf/pdf_detail.php" target="_blank" style="font-size:28px; font-weight:600; color: black" title="Cliquez pour imprimer">
                    <i class="fa fa-print"></i>
                </a>
                -->
                <?php } ?>
        </p>
      

			</div>
					           
					         </div>
						</div>
						
						 <!--Fin etete-->		
						 
						 <h4 class="panel-title" style="text-align:left; /*color:#3e58ff;*/">Assurance : <b id="montant_aff_assurance" style="color:#51d28c;"><?php echo $montant_assurance; ?></b> FCFA</h4>
                         <hr>		
                         
                         


                        <div class="row">

                        <!--Debut caisses-->
						<div class="col-md-12 col-xs-12">
                       
                        <div class="card bg- text-white-50" style="color:#038bd7;">
                       
                            <div class="card-body">
                                                
 <!--
    <br>
    <b style="color:#72768a;">Exporter vers </b>
    <a href="excel/excel_caisse.php" target="_blank" title="Exporter en Excel" id="title">
        <i class="fa fa-file-excel fa-2x" style="color:green;"></i>
    </a>
                            -->
                             
                    
                        
                          <!-- PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrap">
                            
                            <!-- START WIDGETS -->    
                            <div class="panel-body"> 
                            <div>
                            <br />
                        </div> 
                        
                            <div class="chargement" style="text-align:center;"></div>               
                            <div class="row voir aff_colis_colis_maritime">
                         
                            </div>
                            </div>
                            <!-- END WIDGETS --> 
                            <br />       
                        </div>
                        <!-- END PAGE CONTENT WRAPPER --> 
                                
                               
                            </div>
                        </div>
                     
                        </div>
                        <!--/fin caisse-->


                        
                      
         
						
                        </div>
						

                          </div>

                    </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

<!-- Modal colis_colis_maritime -->
<!-- Modal -->
<div class="modal fade" id="myModal_colis_colis_maritime" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ajout_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Ajouter un colis</h4>
      </div>
      <div class="modal-body">
	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>
				
				
	  <form name="form_colis_colis_maritime" id="form_colis_colis_maritime" class="form-horizontal" action="#">
		
		<div class="row">
        
            <div class="col-lg-3 col-xs-12">
                <label>Nbre Colis<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px;" type="number" class="form-control" required id="nbre_colis_colis_maritime" name="nbre_colis_colis_maritime" placeholder="Nombre Colis" />
                <input style="background-color:#f9f9f9; height:45px;" type="hidden" class="form-control" required value="<?php echo $time_colis_maritime; ?>" id="time_colis_maritime" />
            </div>	
            <div class="col-lg-3 col-xs-12">
                <label>Nbre Article<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px;" type="number" class="form-control" required id="nbre_article" name="nbre_article" placeholder="Nombre Article" />
            </div>	
            <div class="col-lg-6 col-xs-12">
                <label>Nature du colis<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px;" type="text" class="form-control" required id="nature_colis_colis_maritime" name="nature_colis_colis_maritime" placeholder="Nature du colis"  />
            </div>
            <div class="col-lg-4 col-xs-12">
                <label>Poids<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px;" type="number" class="form-control" required id="poids_colis_colis_maritime" name="poids_colis_colis_maritime" placeholder="Poids"  />
            </div>
            <div class="col-lg-4 col-xs-12">
                <label>Prix / Kilo<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px;" type="number" class="form-control" required id="pu_colis_colis_maritime" name="pu_colis_colis_maritime" placeholder="Prix/Kg"  />
            </div>	
            <div class="col-lg-4 col-xs-12">
                <label>Emballage<span class="semi_aste">*</span></label>
                <input style="background-color:#f9f9f9; height:45px;" type="number" class="form-control" required id="emballage_colis_colis_maritime" name="emballage_colis_colis_maritime" placeholder="Coût de l'emballage"  />
            </div>	
            
            <div class="row">&nbsp;</div>
            
     
            
            <div class="row">	
            
                <div class="col-lg-3 col-xs-12">
                   &nbsp;
                </div>  
                <div class="col-lg-6 col-xs-12">
                    <label style="margin-top:37px;">Prix du colis : <span class="semi_aste" id="prix_total_colis_colis_maritime" style="color:grey; font-weight:bold;font-size:23px;">0 FCFA</span></label>
                </div>  
                <div class="col-lg-3 col-xs-12">
                   &nbsp;
                </div>  
            
             </div>     
             
		</div>

        <div class="col-lg-12 col-xs-12 msg_error"></div>
        </div>

		
		 <div class="modal-footer ajout-footer_file"> 
		 <button type="submit" id="envoie_colis_colis_maritime" class="btn"><i class="fa fa-check"></i> Valider</button>&nbsp;&nbsp;
         <button type="button" class="btn button_annul" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</button>
         </div>
      </form>
      </div>
     
    </div>
  </div>
</div>

<!-- Modal assurance -->
<!-- Modal -->
<div class="modal fade" id="myModal_assurance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header ajout_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Appliquer l'assurance de 35%</h4>
      </div>
      <div class="modal-body">
	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>
				
				
	  <form name="form_colis_colis_maritime" id="form_colis_colis_maritime" class="form-horizontal" action="#">
		
		<div class="row">
        
          
 
            
            
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="form-check form-switch form-switch-md mb-2">
                        <input class="form-check-input" type="checkbox" id="payer_assurance" name="payer_assurance" checked disabled>
                        <label class="form-check-label" for="flexSwitchCheckDefault"> Vous êtes d'accord pour payer l'assurance <i style="color:#ffd7d3;">35% de la valeur du colis</i></label>
                    </div>
                </div>
                
                <div class="row">&nbsp;</div>
                
                <div class="col-lg-6 col-xs-12">
                    <label>Valeur estimative du colis<span class="semi_aste">*</span></label>
                    <input style="background-color:#f9f9f9; height:45px;" type="text" class="form-control" required id="valeur_colis_colis_maritime" name="valeur_colis_colis_maritime" placeholder="Saisir le prix total de cet envoi"  />
                </div>	
                <div class="col-lg-6 col-xs-12 bloc_assurance">
                    <label>Montant assurance (en FCFA)</label>
                    <input style="background-color:#f9f9f9; height:45px;" type="text" class="form-control" id="montant_assurance" readonly>
                </div>
            </div>
            
            <div class="row">	
            
                <div class="col-lg-6 col-xs-12">
                    <label style="margin-top:37px;">Prix de la marchandise : <span class="semi_aste" id="prix_final_colis_colis_maritime" style="color:grey; font-weight:bold;font-size:23px;">0 FCFA</span></label>
                </div>  
                <div class="col-lg-6 col-xs-12">
                    <label style="margin-top:37px;">Montant total à payer : <span class="semi_aste" id="montant_total_a_payer" style="color:green; font-weight:bold;font-size:23px;">0 FCFA</span></label>
                </div>  
             
             </div>     
             
		</div>

        <div class="col-lg-12 col-xs-12 msg_error"></div>
        </div>

		
		 <div class="modal-footer ajout-footer_file"> 
		 <button type="submit" id="envoie_assurance" class="btn"><i class="fa fa-check"></i> Valider</button>&nbsp;&nbsp;
         <button type="button" class="btn button_annul" data-dismiss="modal"><i class="fa fa-times"></i> Annuler</button>
         </div>
      </form>
      </div>
     
    </div>
  </div>
</div>

<div class="modal fade mod_pop" id="myModal_colis_colis_maritime_mod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header modif_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Modification colis_colis_maritime</h4>
      </div>
      <div class="modal-body">
	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>
		<div id="affiche_colis_colis_maritime_mod"></div>
		</div>
	  
    </div>
  </div>
</div>	

<div class="modal fade mod_pop" id="myModal_colis_colis_maritime_sup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header sup_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-trash"></i> Suppression colis</h4>
      </div>
      <div class="modal-body">

	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>
		<div id="affiche_colis_colis_maritime_sup"></div>
		</div>

		<div class="modal-footer ajout-footer">
        <button type="button" class="btn button_annuler" data-dismiss="modal"><i class="fa fa-times"></i> Non</button>
        <button type="submit" id="submit_colis_colis_maritime_sup" class="btn button_supprimer"><i class="fa fa-bitbucket"></i> Oui</button>&nbsp;&nbsp;&nbsp;
      </div>
	  
    </div>
  </div>
</div>	

<div class="modal fade mod_pop" id="myModal_terminer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header sup_header">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-check"></i> Terminer la saisie</h4>
      </div>
      <div class="modal-body">

	    <div style="background-color:red; color:#fff; text-align:center;" class="msg_erreur"></div>
		<div id="affiche_terminer">Voulez-vous vraiment clôturer la saisie de ce colis_maritime ?</div>
		</div>

		<div class="modal-footer ajout-footer">
        <button type="button" class="btn button_annul" data-dismiss="modal"><i class="fa fa-times"></i> Non</button>
        <button type="submit" id="submit_terminer" class="btn button_supprimer"><i class="fa fa-check"></i> Oui</button>&nbsp;&nbsp;&nbsp;
      </div>
	  
    </div>
  </div>
</div>	
<!-- fin modal colis-->



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