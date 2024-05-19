<?php
session_start();
if( isset($_SESSION['pass_site']) && $_SESSION['pass_site']!='' && isset($_SESSION['secur_site']) && $_SESSION['secur_site']!='')
{
include('../../connex.php');

$id_accepte=$_GET['id_accepte'];

$_SESSION['id_accepte']=$id_accepte;

$acc=$con->prepare('SELECT * FROM demande_decaissement LEFT JOIN utilisateur ON utilisateur.secur=demande_decaissement.secur_ajout_demande_decaissement WHERE id_demande_decaissement=:A ');
$acc->execute(array('A'=>$id_accepte));
while($iacc=$acc->fetch())
{
    $demandeur=$iacc['nom_utilisateur'];
    $motif=$iacc['motif_demande_decaissement'];
    $montant=$iacc['montant_demande_decaissement'];
    $mode_reglement=$iacc['mode_reglement_demande_decaissement'];
    $num_demande=$iacc['num_demande_decaissement'];
}

?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title><?php include('../titre_ent_1.php'); ?> | demande_decaissement</title>

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
        <!--<link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />-->

         <!--Intégration de jquery/Ajax-->
         <script type="text/javascript" src="../../js/jquery_1.7.1_jquery.min.js"></script>
	    <script type="text/javascript" src="js/function.js"></script> 

    </head>

    
<body> 

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

  
   
        

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                  
                    
                      
                    <div class="row">
                        
                    <div class="chargement_" style="text-align:center; margin-top:70px"></div>
						  <div class="aff_evaluation_">

                        <div class="row">

                        <!--Debut caisses-->
                        <div class="col-md-2">&nbsp;</div>
						<div class="col-md-8 col-xs-12">
                       
                        <div class="card bg- text-white-50" style="color:#038bd7;">
                       
                            <div class="card-body">
                                                

                    
                        
                          <!-- PAGE CONTENT WRAPPER -->
                        <div class="page-content-wrap"  style="">
                            <a href="demande_decaissement.php"><button style="margin:10px; " class="btn btn-info right"><i class="fa fa-angle-left"></i> Retour</button></a>
                            <!-- START WIDGETS -->    
                            <div class="panel-body"> 
                            <div>
                               <br />
              
              </div> 
                            <div class="chargement" style="text-align:center;"></div>               
                            <div class="row voir aff_a_valider">
                                
                                <h4>DEMANDE DE DECAISSEMENT N° <?php echo $num_demande; ?></h4>
                                <p style="color:#495057;">
                                    Soumise par <b><?php echo $demandeur; ?></b> <br/>
                                    Pour <b><?php echo $motif; ?></b> <br/>
                                    Montant : <b style="color:green;"><?php echo number_format($montant,0,',',' '); ?> FCFA</b> <br/>
                                    Mode de paiement : <b><?php echo $mode_reglement; ?></b> <br/>
                                </p>
                         
                            </div>
                                <a href="accepter_demande.php"><button style="margin:10px; " class="btn btn-success"><i class="fa fa-check"></i> Accepter</button></a>
                                <a href="refuser_demande.php"><button style="margin:10px; " class="btn btn-danger"><i class="fa fa-trash"></i> Réfuser</button></a>
                            </div>
                            <!-- END WIDGETS --> 
                            <br />       
                        </div>
                        <!-- END PAGE CONTENT WRAPPER --> 
                                
                               
                            </div>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                     
                        </div>
                        <!--/fin demande_decaissement-->


                        
                      
         
						
                        </div>
						

                          </div>

                    </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->





          

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