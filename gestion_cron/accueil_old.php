<?php
session_start();
if( isset($_SESSION['pass_hop']) && $_SESSION['pass_hop']!='' && isset($_SESSION['secur_hop']) && $_SESSION['secur_hop']!='')
{
include('../connex.php');

//Enregistrememnt connexion
$date=date("Y-m-d");
$result= $con->prepare("INSERT INTO visite (ip, date, heure) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$date."', '".time()."') ");      
$result->execute();

//Usage global du budget
$bud=$con->prepare('SELECT * FROM budget LEFT JOIN budget_service ON budget.code_budget=budget_service.budget_code_service LEFT JOIN service ON budget_service.service_id_budget=service.id_service WHERE actif_budget=0');
$bud->execute();
$ibud=$bud->fetch();

$valeur_initiale_budget=$ibud['valeur_initiale_budget'];
$valeur_actuelle_budget=$ibud['valeur_actuelle_budget'];

//Répartition du budget par service
$bud_serv=$con->prepare('SELECT * FROM budget LEFT JOIN budget_service ON budget.code_budget=budget_service.budget_code_service LEFT JOIN service ON budget_service.service_id_budget=service.id_service WHERE actif_budget=0');
$bud_serv->execute();

/*
while($ibud_serv=$bud_serv->fetch())
{
   
    if($ibud_serv['id_service']==1)
    {
        $serv_commercial=floatval($ibud_serv['montant_alloue']/$valeur_initiale_budget)*100;
    }

    if($ibud_serv['id_service']==2)
    {
        $serv_comptable=floatval($ibud_serv['montant_alloue']/$valeur_initiale_budget)*100;
    }

    if($ibud_serv['id_service']==3)
    {
        $serv_GRH=floatval($ibud_serv['montant_alloue']/$valeur_initiale_budget)*100;
    }

    if($ibud_serv['id_service']==4)
    {
        $serv_informatique=floatval($ibud_serv['montant_alloue']/$valeur_initiale_budget)*100;
    }

    if($ibud_serv['id_service']==5)
    {
        $direction=floatval($ibud_serv['montant_alloue']/$valeur_initiale_budget)*100;
    }
}
*/


?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
         <title><?php include('titre_ent_1.php'); ?>  | Accueil</title>
        <?php include('meta.php'); ?>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

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
            <div class="navbar-header" >
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="accueil.php" class="logo logo-dark">
                            <span class="logo-sm">
                                <!--<img src="assets/images/logo-sm.png" alt="" height="22">-->
                                <?php //include('titre_ent.php'); ?>
                                <?php //include('titre_ent_ac_sm.php'); ?>
                            </span>
                            <span class="logo-lg">
                                <!--<img src="assets/images/logo-dark.png" alt="" height="22">-->
                                <?php include('titre_ent_ac.php'); ?>
                            </span>
                        </a>

                        <a href="accueil.php" class="logo logo-light">
                            <span class="logo-sm">
                                <!--<img src="assets/images/logo-sm.png" alt="" height="22">-->
                                <?php //include('titre_ent.php'); ?>
                            </span>
                            <span class="logo-lg">
                                <!--<img src="assets/images/logo-light.png" alt="" height="22">-->
                                <?php include('titre_ent_ac.php'); ?>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                </div>

                <div class="d-flex">

                

                    <a href="accueil_horizontal.php" title="Horizontal">
                    <div class="d-inline-block">
                        <button type="button" class="btn header-item noti-icon" style="color:#fff;">
                            <i class="fa fa-exchange fa-3x"></i> Vue analyste
                        </button>
                    </div>
                    </a>


                    <a href="statistique/statistique.php" title="Statistiques">
                    <div class="d-inline-block">
                        <button type="button" class="btn header-item noti-icon">
                            <i class="fa fa-chart-line fa-3x"></i>
                        </button>
                    </div>
                    </a>

                    <a href="evaluation/evaluation.php" title="Evaluations">
                    <div class="d-inline-block">
                        <button type="button" class="btn header-item noti-icon">
                            <i class="fa fa-balance-scale fa-3x"></i>
                        </button>
                    </div>
                    </a>

                    <a href="formation/formation.php" title="Formations">
                    <div class="d-inline-block">
                        <button type="button" class="btn header-item noti-icon">
                            <i class="fa fa-graduation-cap fa-3x"></i>
                        </button>
                    </div>
                    </a>

                    <a href="demande_formation/demande_formation.php" title="Demandes de formation">
                    <div class="d-inline-block">
                        <button type="button" class="btn header-item noti-icon">
                            <i class="fa fa-comments fa-3x"></i>
                        </button>
                    </div>
                    </a>

                    <a href="personnel/personnel.php" title="Gestion du personnel">
                    <div class="d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle">
                            <i class="fa fa-users fa-3x"></i>
                        </button>
                    </div>
                    </a>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if($_SESSION['photo_hop']!=''){ ?>
                            <img class="rounded-circle header-profile-user" src="photo/<?php echo $_SESSION['photo_hop']; ?>" alt="Photo de profil"/>
							<?php }else{ ?> 
							<img class="rounded-circle header-profile-user" src="photo/profile-2398782.png" alt="Photo de profil">
							<?php } ?> 
                            <span class="ms-2 d-none d-sm-block user-item-desc">
                                <span class="user-name"><?php echo $_SESSION['nom_adm_hop']; ?></span>
                                <span class="user-sub-title"><?php echo $_SESSION['nom_type_groupe']; ?></span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <!--  
                                <div class="p-3 bg-primary border-bottom">
                                    <h6 class="mb-0 text-white"><?php //echo $_SESSION['nom_utilisateur_hop']; ?></h6>
                                    <p class="mb-0 font-size-11 text-white-50 fw-semibold"><?php //echo $_SESSION['email_utilisateur_hop']; ?></p>
                                </div>
                            -->
                            <a class="dropdown-item" href="profil/profil.php"><i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="#"><i class="mdi mdi-cog-outline text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Paramètres</span></a>
                            <a class="dropdown-item" href="deconex.php"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">Déconexion</span></a>
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
                    <span class="logo-sm">
                        <!--<img src="assets/images/logo-sm.png" alt="" height="22">-->
                        <?php //include('titre_ent.php'); ?>
                    </span>
                    <span class="logo-lg">
                        <!--<img src="assets/images/logo-dark.png" alt="" height="22">-->
                        <?php include('titre_ent_ac.php'); ?>
                    </span>
                </a>

                <a href="accueil.php" class="logo logo-light">
                    <span class="logo-lg">
                        <!--<img src="assets/images/logo-light.png" alt="" height="22">-->
                        <?php include('titre_ent_ac.php'); ?>
                    </span>
                    <span class="logo-sm">
                        <!--<img src="assets/images/logo-sm-light.png" alt="" height="22">-->
                        <?php //include('titre_ent.php'); ?>
                        <?php //include('titre_ent_ac_sm.php'); ?>
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

                        <li class="mm-active">
                            <a href="accueil.php" class="active">
                                <i class="icon nav-icon fa fa-home"></i>
                                <span class="menu-item">Tableau de bord</span>
                            </a>
                        </li>

                        <?php if($_SESSION['id_type_groupe']<=2){ ?>

                       <li class="menu-title">Ressources Humaines</li>

                        <li>
                            <a href="personnel/personnel.php">
                                <i class="icon nav-icon fa fa-user" ></i>
                                <span class="menu-item">Gestion du personnel</span>
                            </a>
                        </li>

                        <li>
                            <a href="organigramme/organigramme.php">
                                <i class="icon nav-icon fa fa-link" ></i>
                                <span class="menu-item">Organigramme</span>
                            </a>
                        </li>

                        <li class="menu-title">Finances</li>

                        <li>
                            <a href="budget/budget.php">
                                <i class="icon nav-icon fa fa-credit-card"></i>
                                <span class="menu-item">Gestion du budget</span>
                            </a>
                        </li>

                        <?php } ?>

                        <li class="menu-title">Formation</li>

                        <li>
                            <a href="demande_formation/demande_formation.php">
                                <i class="icon nav-icon fa fa-comments" ></i>
                                <span class="menu-item">Demandes</span>
                            </a>
                        </li>
                         
                        <?php if($_SESSION['id_type_groupe']<=2){ ?>
                        <li>
                            <a href="formateur/formateur.php">
                                <i class="icon nav-icon fa fa-school" ></i>
                                <span class="menu-item">Formateur</span>
                            </a>
                        </li>
                        <?php } ?>

                        <li>
                            <a href="formation/formation.php">
                                <i class="icon nav-icon fa fa-graduation-cap" ></i>
                                <span class="menu-item">Formation</span>
                            </a>
                        </li>

                        <li class="menu-title">Evaluation</li>

                        <li>
                            <a href="evaluation/evaluation.php">
                                <i class="icon nav-icon fa fa-balance-scale" ></i>
                                <span class="menu-item">Evaluations</span>
                            </a>
                        </li>
                        <?php if($_SESSION['id_type_groupe']<=2){ ?>
                        <li>
                            <a href="statistique/statistique.php">
                                <i class="icon nav-icon fa fa-chart-line"></i>
                                <span class="menu-item">Statistiques</span>
                            </a>
                        </li>

                        <li>
                            <a href="evaluation/fiche.php">
                                <i class="icon nav-icon fa fa-file-pdf"></i>
                                <span class="menu-item">Fiches d'évaluation</span>
                            </a>
                        </li>
                       
                        <li class="menu-title">Paramètres</li>

                        <li>
                            <a href="parametre/parametre.php">
                                <i class="icon nav-icon fa fa-gears"></i>
                                <span class="menu-item">Paramètres</span>
                            </a>
                        </li>
                        <?php } ?>
                        <li class="menu-title">Sécurité</li>

                        <li>
                            <a href="profil/profil.php">
                                <i class="icon nav-icon fa fa-user-circle"></i>
                                <span class="menu-item">Profile</span>
                            </a>
                        </li>
                        <?php if($_SESSION['id_type_groupe']<=2){ ?>
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
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Tableau de bord</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php include('titre_logi.php'); ?></a></li>
                                        <li class="breadcrumb-item active">Tableau de bord</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
        </div> <!-- end row-->


        <?php if($_SESSION['id_type_groupe']<=2){ ?>
        

                        <div class="row">
                            <div class="col-lg-4 col-xs-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Budget alloué aux formations - <?php echo number_format($valeur_initiale_budget,0,',',' '); ?> FCFA</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="pie-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4 col-xs-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Répartition du budget par service</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="donut-chart" class="apex-charts"  dir="ltr"></div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="col-lg-4 col-xs-12">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Nombre de participants par formation</h4>
                                        <!--<a href="#" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a>-->
                                     </div><!-- end card header --> 
                                    <div class="card-body">                                        
                                        <div id="column_chart_datalabel" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                           
                          
                        </div><!-- end row -->

                        <div class="row">

                            <div class="col-lg-4 col-xs-12">
                                <div class="card">
                                    <div class="card-header justify-content-between d-flex align-items-center">
                                        <h4 class="card-title">Personnes formées par service</h4>
                                        <!--<a href="#" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a>-->
                                     </div><!-- end card header --> 
                                    <div class="card-body">                                        
                                        <div id="line_chart_datalabel" class="apex-charts" dir="ltr"></div>                                      
                                    </div>
                                </div><!--end card-->
                            </div><!--end col-->

                            <div class="col-lg-4 col-xs-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Formations prévues | formations executées</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="pie-chart-1" class="apex-charts" dir="ltr"></div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4 col-xs-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Demandes de formation par service</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="donut-chart-1" class="apex-charts"  dir="ltr"></div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="fw-semibold">Exporter vers :</span> <span class="text-muted">Choisir...<i
                                                        class="mdi mdi-chevron-down ms-1"></i></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="exportation/excel/excel_budget_par_service.php"><i class="fa fa-file-excel"></i> Feuille de calcul Excel</a>
                                                <a class="dropdown-item" target="_blank" href="exportation/pdf/pdf_budget_par_service.php"><i class="fa fa-file-pdf"></i> Fichier PDF</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-4">Etat du budget par service  </h4>

                                        <div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover table-nowrap mb-0 align-middle table-check">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Date et heure</th>
                                                    <th>Service</th>
                                                    <th>Budget alloué</th>
                                                    <th>Budget exécutée</th>
                                                    <th>Budget disponible</th>
                                                </tr>
                                                <!-- end tr -->
                                            </thead>
                                            <!-- end thead -->
                                            <tbody>

                                                <!-- begin tr -->
                                                <?php
                        $valbud=$con->prepare('SELECT * FROM budget LEFT JOIN budget_service ON budget.code_budget=budget_service.budget_code_service LEFT JOIN service ON budget_service.service_id_budget=service.id_service WHERE actif_budget=0');
                        $valbud->execute();
                        $i=0;
                        while($ivalbud=$valbud->fetch()){
                            $i++;
                        $montant_restant=$ivalbud['montant_alloue']-$ivalbud['montant_execute'];
                                                ?>
                                                <tr>
                                                    <td class="fw-medium">
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td class="fw-medium" style="/*color:#f7b84b;*/">
                                                        <?php echo gmdate('d/m/Y H:i:s'); ?>
                                                    </td>
                                                    <td class="fw-medium" style="/*color:#f7b84b;*/">
                                                        <?php echo $ivalbud['lib_service']; ?>
                                                    </td>
                                                    <td style="color:#0379bb;">
                                                        <?php echo number_format($ivalbud['montant_alloue'],0,',',' ').' FCFA'; ?>
                                                    </td>

                                                    <td style="color:#f06548;">
                                                        <?php echo number_format($ivalbud['montant_execute'],0,',',' ').' FCFA'; ?>
                                                    </td>
                                                    <td style="color:#51d28c;">
                                                        <?php echo number_format($montant_restant,0,',',' ').' FCFA'; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                                <!-- end /tr -->

                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <?php } ?>

                   
                    <?php // include('stat_global.php'); ?>
                                          

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-end">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="fw-semibold">Exporter vers :</span> <span class="text-muted">Choisir...<i
                                                        class="mdi mdi-chevron-down ms-1"></i></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="exportation/excel/excel_formation.php"><i class="fa fa-file-excel"></i> Feuille de calcul Excel</a>
                                                <a class="dropdown-item" target="_blank" href="exportation/pdf/pdf_formation.php"><i class="fa fa-file-pdf"></i> Fichier PDF</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title mb-4">Liste des formations </h4>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-nowrap mb-0 align-middle table-check">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Thème</th>
                                                    <th>Montant</th>
                                                    <th>Début</th>
                                                    <th>Fin</th>
                                                </tr>
                                                <!-- end tr -->
                                            </thead>
                                            <!-- end thead -->
                                            <tbody>

                                                <!-- begin tr -->
                                                <?php
                        $lst_for=$con->prepare('SELECT * FROM formation LEFT JOIN demande_formation ON demande_formation.id_demande_formation=formation.demande_formation_id WHERE date_fin_formation<=:A');
                        $lst_for->execute(array('A'=>gmdate('Y-m-d')));
                        while($iform=$lst_for->fetch()){
                                                ?>
                                                <tr>
                                                    <td class="fw-medium">
                                                        <?php echo $iform['num_formation']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $iform['formation_demande']; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo number_format($iform['montant_formation'],0,',',' ').' FCFA'; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo date("d/m/Y", strtotime($iform['date_debut_formation'])); ?>
                                                    </td>
                                                    <td>
                                                        <?php if($iform['date_fin_formation']!='0000-00-00'){echo date("d/m/Y", strtotime($iform['date_fin_formation'])); }else{ echo '<i style="color:orange">Pas encore définie</i>'; } ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                                <!-- end /tr -->

                                            </tbody><!-- end tbody -->
                                        </table><!-- end table -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                                     <!--
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Fréquences de connexions</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php //include('high.php'); ?>
                                    </div>
                                   
                                </div>
                                
                            </div>
                           
                        </div>
                                            -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> &copy; Yadec Consulting.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                               Découvrez nos solution en <i class="mdi mdi-cubes text-danger"></i> <a href="https://www.yadecdigital.com" target="_blank" class="text-reset">cliquant ici</a> 
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

                <a href="javascript:void(0);" class="right-bar-toggle-close ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="m-0" />

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

     <!-- JAVASCRIPT -->


    <!-- apexcharts -->
      <!-- apexcharts -->
      <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- areacharts init -->
<!--<script src="assets/js/pages/apexcharts.init.js"></script>-->

<script>
     //Personnes formées par service
    var options = {
        chart: { height: 285, type: "line", zoom: { enabled: !1 }, toolbar: { show: !1 } },
        colors: ["#038edc", "#5fd0f3"],
        dataLabels: { enabled: !1 },
        stroke: { width: [3, 3], curve: "straight" },
        series: [
            { name: "Effectif", data: [
                <?php
                
                $ser=$con->prepare('SELECT * FROM service ');
                $ser->execute();
                $nser=$ser->rowcount();

                $i=0;
                $se=$con->prepare('SELECT * FROM service ');
                $se->execute();
                while($ise=$se->fetch())
                {
                    $i++;
                    $pe=$con->prepare('SELECT * FROM personnel_soignant WHERE service_id=:A');
                    $pe->execute(array('A'=>$ise['id_service']));
                    $np=$pe->rowcount();
                    echo $np;
                    if($i<$nser){ echo ','; }
                }
                
                ?>
            ] },
            { name: "Personnes formées", 
                data: [
                    <?php
                
                $ser=$con->prepare('SELECT * FROM service ');
                $ser->execute();
                $nser=$ser->rowcount();

                $i=0;
                $se=$con->prepare('SELECT * FROM service ');
                $se->execute();
                while($ise=$se->fetch())
                {
                    $i++;
                    $pe=$con->prepare('SELECT * FROM personnel_soignant LEFT JOIN participe_formation ON participe_formation.personnel_id=personnel_soignant.id_personnel_soignant WHERE service_id=:A AND id_participe_formation!="" ');
                    $pe->execute(array('A'=>$ise['id_service']));
                    $np=$pe->rowcount();
                    echo $np;
                    if($i<$nser){ echo ','; }
                }
                
                ?>
             
            ] },
        ],
        grid: { row: { colors: ["transparent", "transparent"], opacity: 0.2 }, borderColor: "#f1f1f1" },
        markers: { style: "inverted", size: 4, hover: { size: 6 } },
        xaxis: { categories: [
            <?php 

//Répartition du budget par service
$ser=$con->prepare('SELECT * FROM service ');
                $ser->execute();
                $nser=$ser->rowcount(); 

$bud_serv_1=$con->prepare('SELECT * FROM service ');
$bud_serv_1->execute(); 

        $i=0;
        while($ibud_serv_1=$bud_serv_1->fetch())
        {
            $i++;
            echo "'".$ibud_serv_1['lib_service']."'";
           if($i<$nser){ echo ', '; }
        }
        ?>

        ], title: { text: "Service", style: { fontWeight: 500 } } },
        yaxis: { title: { text: "Effectif | Personnes formées", style: { fontWeight: 500 } }, min: 0, max: 40 },
        legend: { position: "top", horizontalAlign: "right", floating: !0, offsetY: -25, offsetX: -5 },
        responsive: [{ breakpoint: 600, options: { chart: { toolbar: { show: !1 } }, legend: { show: !1 } } }],
    },
    chart = new ApexCharts(document.querySelector("#line_chart_datalabel"), options);
    chart.render();

    //
    options = {
    chart: { height: 285, type: "area", toolbar: { show: !1 } },
    dataLabels: { enabled: !1 },
    stroke: { curve: "smooth", width: 3 },
    series: [
        { name: "series1", data: [34, 40, 28, 52, 42, 109, 100] },
        { name: "series2", data: [32, 60, 34, 46, 34, 52, 41] },
    ],
    colors: ["#038edc", "#5fd0f3"],
    xaxis: { type: "datetime", categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"] },
    grid: { borderColor: "#f1f1f1" },
    fill: { type: "gradient", gradient: { shadeIntensity: 1, inverseColors: !1, opacityFrom: 0.45, opacityTo: 0.05, stops: [20, 100, 100, 100] } },
    tooltip: { x: { format: "dd/MM/yy HH:mm" } },
    };

    //Nombre de participants par formation
    options = {
          series: [{  name: "Participants",
          data: [
              
            <?php 

//Participants 
$ser=$con->prepare('SELECT * FROM formation ');
$ser->execute();
$nser=$ser->rowcount(); 

$for=$con->prepare('SELECT * FROM formation LEFT JOIN demande_formation ON formation.demande_formation_id=demande_formation.id_demande_formation ');
$for->execute();
$i=0;
while($ifor=$for->fetch())
{
    $i++;
    $pe=$con->prepare('SELECT * FROM personnel_soignant LEFT JOIN participe_formation ON participe_formation.personnel_id=personnel_soignant.id_personnel_soignant LEFT JOIN demande_formation ON demande_formation.num_demande_formation=participe_formation.formation_code LEFT JOIN formation ON formation.demande_formation_id=demande_formation.id_demande_formation WHERE formation_code=:A');
    $pe->execute(array('A'=>$ifor['num_demande_formation']));
    $np=$pe->rowcount();
    echo $np;
    if($i<$nser){ echo ','; }
}
?>
        
        ]
        }],
          chart: {
          type: 'bar',
          height: 290
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: [
              
            <?php 

                //Formations
                $ser=$con->prepare('SELECT * FROM formation ');
                $ser->execute();
                $nser=$ser->rowcount(); 

                $bud_serv_1=$con->prepare('SELECT * FROM formation LEFT JOIN demande_formation ON formation.demande_formation_id=demande_formation.id_demande_formation');
                $bud_serv_1->execute(); 

                $i=0;
                while($ibud_serv_1=$bud_serv_1->fetch())
                {
                    $i++;
                    echo "'".$ibud_serv_1['formation_demande']."'";
                if($i<$nser){ echo ', '; }
                }
        ?>

          ],
        }
        };

        var chart = new ApexCharts(document.querySelector("#column_chart_datalabel"), options);
        chart.render();

     //Camember - Représentation du Budget global Exécuté/Disponible
     <?php
     $bud_rest=floatval($valeur_actuelle_budget/$valeur_initiale_budget)*100;
     $bud_exec=100-$bud_rest;
     ?>
    (chart = new ApexCharts(document.querySelector("#bar_chart"), options)).render();
    var bud_exec=<?php echo floatval($bud_exec); ?>;
    var bud_rest=<?php echo floatval($bud_rest); ?>;
    options = {
    chart: { height: 320, type: "pie" },
    series: [bud_exec,bud_rest],
    labels: ["Budget exécuté", "Budget disponible"],
    colors: ["#f06548", "#51d28c"],
    legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: -10 },
    responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
    };

    (chart = new ApexCharts(document.querySelector("#pie-chart"), options)).render();

       //Camember - Représentation formations Exécuté/Prévues
       <?php
    $prev=$con->prepare('SELECT * FROM demande_formation');
    $prev->execute();
    $nprev=$prev->rowcount();

    $exef=$con->prepare('SELECT * FROM formation');
    $exef->execute();
    $nexef=$exef->rowcount();
     ?>
    (chart = new ApexCharts(document.querySelector("#bar_chart"), options)).render();
    var bud_exec=<?php echo floatval($nexef); ?>;
    var bud_rest=<?php echo floatval($nprev); ?>;
    options = {
    chart: { height: 320, type: "pie" },
    series: [bud_exec,bud_rest],
    labels: ["Formations effectuées", "Formations prévues"],
    colors: ["#51d28c", "#f7b84b"],
    legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: -10 },
    responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
    };

    (chart = new ApexCharts(document.querySelector("#pie-chart-1"), options)).render();


    
    //Camember - Représentation de la répartition du budget par service
    options = {
    chart: { height: 320, type: "donut" },
    series: [
             
        <?php

        $ser=$con->query('SELECT * FROM service');
        $ser->execute();
        $nser=$ser->rowcount();

        $i=0;
        while($ibud_serv=$bud_serv->fetch())
        {
            $i++;
            echo floatval($ibud_serv['montant_alloue']/$valeur_initiale_budget)*100;
           if($i<$nser){ echo ', '; }
        }
        
        ?>
    ],
    labels: [
        <?php 

//Répartition du budget par service
$bud_serv_1=$con->prepare('SELECT * FROM budget LEFT JOIN budget_service ON budget.code_budget=budget_service.budget_code_service LEFT JOIN service ON budget_service.service_id_budget=service.id_service WHERE actif_budget=0');
$bud_serv_1->execute(); 

        $i=0;
        while($ibud_serv_1=$bud_serv_1->fetch())
        {
            $i++;
            echo "'".$ibud_serv_1['lib_service']."'";
           if($i<$nser){ echo ', '; }
        }
        ?>
    ],
    colors: ["#5fd0f3", "#038edc", "#f06548", "#51d28c", "#f7b84b", "green", "blue", "red", "violet", "pink", "orange", "yellow", "grey"],
    legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: -10 },
    responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
    };
    (chart = new ApexCharts(document.querySelector("#donut-chart"), options)).render();

     //Camember - Demandes de formations par service
     options = {
    chart: { height: 320, type: "donut" },
    series: [
             
        <?php

        $ser=$con->query('SELECT * FROM service ');
        $ser->execute();
        $nser=$ser->rowcount();


        $ser=$con->query('SELECT * FROM service ');
        $ser->execute();
        $i=0;
        while($ibud_serv=$ser->fetch())
        {
            $i++;
            $dem=$con->prepare('SELECT * FROM demande_formation LEFT JOIN utilisateur ON utilisateur.secur=demande_formation.secur_ajout_demande LEFT JOIN personnel_soignant ON personnel_soignant.id_personnel_soignant=utilisateur.personnel_soignant_id LEFT JOIN service ON service.id_service=personnel_soignant.service_id WHERE service_id=:A');
            $dem->execute(array('A'=>$ibud_serv['id_service']));
            $ndem=$dem->rowcount();
            echo floatval($ndem);
           if($i<$nser){ echo ', '; }
        }
        
        ?>
    ],
    labels: [
        <?php 
$bud_serv_1=$con->prepare('SELECT * FROM service ');
$bud_serv_1->execute(); 

        $i=0;
        while($ibud_serv_1=$bud_serv_1->fetch())
        {
            $i++;
            echo "'".$ibud_serv_1['lib_service']."'";
           if($i<$nser){ echo ', '; }
        }
        ?>
    ],
    colors: ["#5fd0f3", "#038edc", "#f06548", "#51d28c", "#f7b84b", "green", "blue", "red", "violet", "pink", "orange", "yellow", "grey"],
    legend: { show: !0, position: "bottom", horizontalAlign: "center", verticalAlign: "middle", floating: !1, fontSize: "14px", offsetX: 0, offsetY: -10 },
    responsive: [{ breakpoint: 600, options: { chart: { height: 240 }, legend: { show: !1 } } }],
    };
    (chart = new ApexCharts(document.querySelector("#donut-chart-1"), options)).render();


            var options5 = {
        series: [{ data: [10, 20, 15, 40, 20, 50, 70, 60, 90, 70, 110] }],
        chart: { type: "bar", height: 50, sparkline: { enabled: !0 } },
        plotOptions: { bar: { columnWidth: "50%" } },
        tooltip: {
            fixed: { enabled: !1 },
            y: {
                title: {
                    formatter: function (e) {
                        return "";
                    },
                },
            },
        },
        colors: ["#038edc"],
    },
    chart5 = new ApexCharts(document.querySelector("#sparkline-chart-1"), options5);
    chart5.render();
    var options = {
        series: [{ name: "Series A", data: [10, 90, 30, 60, 50, 90, 25, 55, 30, 40] }],
        chart: { height: 50, type: "area", sparkline: { enabled: !0 }, toolbar: { show: !1 } },
        dataLabels: { enabled: !1 },
        stroke: { curve: "smooth", width: 2 },
        fill: { type: "gradient", gradient: { shadeIntensity: 1, inverseColors: !1, opacityFrom: 0.45, opacityTo: 0.05, stops: [50, 100, 100, 100] } },
        colors: ["#038edc", "transparent"],
    },

    
    chart = new ApexCharts(document.querySelector("#sparkline-chart-2"), options);
    chart.render();
    options5 = {
    series: [{  data: [40, 20, 30, 40, 20, 60, 55, 70, 95, 65, 110] }],
    chart: { type: "bar", height: 50, sparkline: { enabled: !0 } },
    plotOptions: { bar: { columnWidth: "50%" } },
    tooltip: {
        fixed: { enabled: !1 },
        y: {
            title: {
                formatter: function (e) {
                    return "";
                },
            },
        },
    },
    colors: ["#038edc"],
    };

    //Personnes formées 
    (chart5 = new ApexCharts(document.querySelector("#sparkline-chart-3"), options5)).render();
    options = {
    series: [{ name: "Personnes formées", data: [10, 90, 30, 60, 50, 90, 25, 55, 30, 40] }],
    chart: { height: 50, type: "area", sparkline: { enabled: !0 }, toolbar: { show: !1 } },
    dataLabels: { enabled: !1 },
    stroke: { curve: "smooth", width: 2 },
    fill: { type: "gradient", gradient: { shadeIntensity: 1, inverseColors: !1, opacityFrom: 0.45, opacityTo: 0.05, stops: [50, 100, 100, 100] } },
    colors: ["#038edc", "transparent"],
    };


    (chart = new ApexCharts(document.querySelector("#sparkline-chart-4"), options)).render();
    options = {
    chart: { height: 332, type: "line", stacked: !1, offsetY: -5, toolbar: { show: !1 } },
    stroke: { width: [0, 0, 0, 1], curve: "smooth" },
    plotOptions: { bar: { columnWidth: "30%" } },
    colors: ["#5fd0f3", "#038edc", "#dfe2e6", "#51d28c"],
    series: [
        { name: "Formations effectuées", type: "column", data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30] },
        { name: "Personnes formées", type: "column", data: [19, 8, 26, 21, 18, 36, 30, 28, 40, 39, 15] },
        { name: "Budget par personne", type: "area", data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43] },
        { name: "Formateurs", type: "line", data: [9, 11, 13, 12, 10, 8, 6, 9, 14, 17, 22] },
    ],
    fill: { opacity: [0.85, 1, 0.25, 1], gradient: { inverseColors: !1, shade: "light", type: "vertical", opacityFrom: 0.85, opacityTo: 0.55, stops: [0, 100, 100, 100] } },
    labels: ["01/01/2003", "02/01/2003", "03/01/2003", "04/01/2003", "05/01/2003", "06/01/2003", "07/01/2003", "08/01/2003", "09/01/2003", "10/01/2003", "11/01/2003"],
    markers: { size: 0 },
    xaxis: { type: "datetime" },
    yaxis: { title: { text: "Analyse Financière", style: { fontWeight: 500 } } },
    tooltip: {
        shared: !0,
        intersect: !1,
        y: {
            formatter: function (e) {
                return void 0 !== e ? e.toFixed(0) : e;
            },
        },
    },
    grid: { borderColor: "#f1f1f1", padding: { bottom: 15 } },
    };
    (chart = new ApexCharts(document.querySelector("#sales-analytics-chart"), options)).render();


</script>



    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!--<script src="assets/js/pages/dashboard-sales.init.js"></script>-->

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