
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
                                  <img src="../img/logo_lynays.png" alt="" height="100" class="auth-logo-light">
                                    <!--<h5>Administration | Site Web</h5> -->
                                    <p></p>
                                </div>
                                <div class="text-muted mb-4">
                                    <h5 class="">Récupération de compte</h5>
                                    <p>Vous avez oublié votre mot de passe.</p>
                                </div>
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    Veuillez entrer votre email afin de recevoir le lien de réinitialisation.
                                </div>
                                <div class="col-md-12" style="margin:10px;">
                                    <div class="error" style="background-color:red;"></div>
                                    <div class="error1" style="background-color:red;"></div>
                                    <div class="recup_ok" style="background-color:green;"></div>
                                </div>
                                <form action="#" class="form-horizontal" method="post" id="form_recup" name="form_recup">
                                    <div class="form-floating form-floating-custom mb-3">
                                        <input type="email" class="form-control" id="adres_recup" name="adres_recup" placeholder="Enter Email">
                                        <label for="input-email">Email</label>
                                        <div class="form-floating-icon">
                                            <i class="uil uil-envelope-alt"></i>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Réinitialiser</button>
                                    </div>
                                </form><!-- end form -->

                                <div class="mt-5 text-center text-muted">
                                    <p>ça vous revient ? <a href="../_logger.html" class="fw-medium text-decoration-underline"> Connexion </a></p>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center text-muted p-4">
                                <p class="mb-0">&copy; <script>document.write(new Date().getFullYear())</script> Lynays Entreprises. Tous droits Réservés</p>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div>
            </div><!-- end container -->
        </div>
        <!-- end authentication section -->

        <!-- JAVASCRIPT -->
        <script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="libs/simplebar/simplebar.min.js"></script>
        <script src="libs/feather-icons/feather.min.js"></script>

        <script src="js/jquery.min_1.7.1.js"></script>
        <script src="js/function_recup.js"></script>

    </body>
</html>
