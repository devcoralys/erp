<?php
 session_start();
?>
<!--Page zo-->

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Réinitialisation de mot de passe | Lynays Entreprises</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Outil d'administration du site web de Lynays Entreprises" name="Gestion intelligente des mouvements d'énergie, Climatisation, Electricité, Formation" >
        <meta content="Lynays Entreprises" name="Lynays Entreprises" >
        <!-- App favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    
    <body>

    <!-- <body data-layout="horizontal"> -->

        <div class="authentication-bg min-vh-100">
            <div class="bg-overlay bg-white"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                        
                            <div class="text-center py-5">
                                <div class="mb-4">
                                  <img src="../img/logo_connex.png" alt="" height="100" class="auth-logo-light">
                                    <!--<h5>Administration | Site Web</h5> -->
                                    <p></p>
                                </div>
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    Vous venez de recevoir un mail de réinitialisation à l'adresse
                                    <?php echo' "<strong>'.$_SESSION['identifiant'].'</strong>" ' ; ?> 
                                    Veuillez consulter votre boîte de réception ou vos spams pour continuer l'opération. Merci
                                </div>

                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center text-muted p-4">
                                <p class="mb-0">&copy; <script>document.write(new Date().getFullYear())</script> Yadec Consulting. Tous droits Réservés</p>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div>
            </div><!-- end container -->
        </div>
        <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="../js/jquery.min_1.7.1.js"></script>
        <!--  <script src="../js/co_form.js"></script>-->
        <script src="function_recup.js"></script>

    </body>
</html>
