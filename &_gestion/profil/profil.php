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
        <title><?php include('../titre_ent_1.php'); ?> | Profil</title>
        
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
        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
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
                <a href="../profil/profil.php" style="background-color:#251f75; color:#fff;">
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
						  <div class="aff_profil">

                              <!--Form_profil-->
    <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card" id="cards">
                                                        <div class="card-body">
                                                            <h4 class="card-title mb-4">Modifier mon profil</h4>
                    
                                                            <div class="row">
                                                                <div class="col-md-6 col-xl-3">
                                            
                                                                    <!-- Simple card -->
                                                                    <!-- Profile Image -->
                                                                    <div class="box box-primary">
                                                                    <div class="box-body box-profile" id="user_image">
                                                                    <form name="form_photo" id="form_photo" class="form-horizontal">
                                                                        <div id="image_preview">
                                                                        <?php if($_SESSION['photo_site']!=''){ ?>
                                                                        <img class="profile-user-img img-responsive rounded-circle" style="height:150px;witdh:150px;" src="../photo/<?php echo $_SESSION['photo_site']; ?>" alt="Image profile"/>
                                                                                    <?php }else{ ?> 
                                                                                    <img class="profile-user-img img-responsive rounded-circle" style="height:150px;witdh:150px;" src="../photo/person.png" alt="Image profil">
                                                                                    <?php } ?> 
                                                                        </div>
                                                                        
                                                                        <h3 class="profile-username text-center" style="font-size:16px; text-align:center;"><?php echo $_SESSION['nom_utilisateur_site']; ?></h3>

                                                                        <p class="text-muted text-center" style="font-style:italic; color: #CC6600; font-weight:600; text-align:center;"><?php echo stripslashes($_SESSION['nom_type_groupe']); ?></p>
                                                                        <p class="text-muted text-center" style="font-size:12px; text-align:center;">
                                                                        <?php
                                                                        $red=$con->prepare("SELECT * FROM service LEFT JOIN utilisateur_service ON utilisateur_service.service_id=service.id_service WHERE utilisateur_id=:A"); 
                                                                    //$red=$con->prepare("SELECT * FROM utilisateur WHERE email_utilisateur=:A AND motpass_utilisateur=:B AND statut=:C"); 
                                                                        $red->execute(array('A'=>$_SESSION['id_utilisateur']));
                                                                        while($membre=$red->fetch()){
                                                                        echo stripslashes($membre['lib_service'])." ";
                                                                        }
                                                                        ?>
                                                                        </p>
                                                                        <p class="text-muted text-center">&nbsp;</p>

                                                                        <div class="col-md-12">
                                                                            <div class="file-wrapper">
                                                                                <div class="upload-btn-wrapper" style="text-align:center;">
                                                                                    <label for="photo" class="btn_ch"><i class="fa fa-paperclip"></i>&nbsp;Choisir photo</label>
                                                                                    <input type="file" id="photo" name="photo" />
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-12" style="text-align:center;">
                                                                            <button type="submit" id="change_photo" class="btn btn-success button_valider"><i class="fa fa-check"></i>&nbsp;Changer Photo</button>
                                                                        </div>

                                                                    </form>
                                                                    </div>
                                                                    <!-- /.box-body -->
                                                                    </div>
                                                                    <!-- /.box -->
                                            
                                                                </div><!-- end col -->
                                            
                                                                <div class="col-md-6 col-xl-6">
                                            
                                                                
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#settings" data-toggle="tab">Modification de mot de passe</a></li>
  </ul>
  <div class="tab-content">        

    <div class="active tab-pane" id="settings">
      <form class="form-horizontal" id="form_mot"  name="form_mot">
        <div class="form-group">
          <label for="mot_actu" class="col-sm-12 control-label">Mot de passe actuel</label>

          <div class="col-sm-12">
            <input type="password" class="form-control input" id="mot_actu" required placeholder="Mot de passe actuel">
          </div>
        </div>
        <div class="form-group">
          <label for="mot_new" class="col-sm-12 control-label">Nouveau mot de passe</label>

          <div class="col-sm-12">
            <input type="password" class="form-control input" id="mot_new" required placeholder="Nouveau mot de passe">
          </div>
        </div>
        <div class="form-group">
          <label for="mot_conf" class="col-sm-12 control-label">Confirmer mot de passe</label>

          <div class="col-sm-12">
            <input type="password" class="form-control input" id="mot_conf" required placeholder="Confirmer mot de passe">
          </div>
        </div>

        <div class="row">&nbsp;</div>

        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" id="confirm">Enregistrer</button> 
            <div class="div_load"><img src="../../img/loading_1.gif" style="width:35px; height:35px;" /> ...</div>
          </div>
          
           <div class="col-sm-12">
           <div class="msg_erreur"></div> 
           <div class="msg_ok"></div> 
          </div>
          
        </div>
      </form>
    </div>
    <!-- /.tab-pane -->
  </div>
  <!-- /.tab-content -->

                                                                    </div>
                                            
                                                                </div><!-- end col -->
                    
                                                        
                                                            </div>
                                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    <!--/Form_profil-->

                   				          <!--CONTENU PROFIL-->
                <div class="col-md-4">

<!-- Profile Image -->
<div class="box box-primary">
  <div class="box-body box-profile" id="user_image">

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



              <!--/CONTENU PROFIL-->		

                          </div>

                    </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> &copy; Dream Team
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