<?php
//header('Location: _logger.html');     
?>

<!DOCTYPE HTML>
<html>
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Nous mettons en oeuvre des solutions Transit, Transport et Logistique sur mesure partout en Afrique de l’Ouest" name="description" />
        <meta content="STTCI" name="Service Transit Transport Côte d'Ivoire" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>        

        <link rel="stylesheet" href="css/style.css">
        <script src="js/function_autre.js"></script>
      
    </head>
    <body style="background-color:#fff; font-family:Raleway; background-repeat:no-repeat; padding:20px; overflow-x: hidden;">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <form id="regForm" method="post" action="src/verif_auth_env.php">
                        <h1 id="register"><i class="fa fa-lock"></i> Authenticity check</h1>
                  
                        <div class="tab_">
                        <h6>Veuillez saisir la référence de votre document svp</h6>
                            <p>
                            <input class="form-control" placeholder="Référence..." oninput="this.className = ''" name="reference_verif" id="reference_verif" value=""></p>
                            
                    
                      
                        <div class="thanks-message text-center" id="text-message"> <img src="https://static.wixstatic.com/media/48864f_62fe1cbdab1c4dbe9a28b6f3e9a8d2c1~mv2.jpeg/v1/fill/w_109,h_50,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/logosttcijpg.jpeg" width="100" class="mb-4">
                            <h3>Merci !</h3> <span>STTCI</span>
                        </div>
                        <div style="overflow:auto;" id="nextprevious">
                            <div style="float:right;">
                            <button type="button" class="btn btn-danger" id="annul_verif"><i class="fa fa-ban"></i> Annuler</button> 
                            <button type="submit" class="btn btn-success" id="valid_verif"><i class="fa fa-check"></i> Vérifier</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
