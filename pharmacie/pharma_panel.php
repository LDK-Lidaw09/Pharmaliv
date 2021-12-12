<?php
session_start();
if(isset($_SESSION['email_pharma'])){//Si la variable session a ŽtŽ crŽee
  
    

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="components/css/pharma_navbar.css">
    <link rel="stylesheet" href="components/css/pharma_form.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <title>Connexion Client - PharmaLiv</title>
  </head>
  <body>
    <?php include("components/pharma_navbar.php") ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <div class="container" >
    
 <div class="pt-5" style="margin-top: 150px">
    <div class="row">
        <div class="container">
            <h1 class="text-uppercase" style="margin-left: 40%">a propos</h1>
            <div class="container-fluid">
                <p>
                    Bienvenue dans votre espace Pharma !! <br>
                    Vous avez la possiblité de faire de passer ds commmandes, vous réinscrire et pleins d'autres choses. <br>
                    Apprécier cette experience en ligne!
                </p>
            </div>


            <hr class="my-5">
        </div>
    </div>
              <!-- Submit Button -->
                    
                    <div class="media position-relative">
                        <img src="../assets/pharma3.jpg" class="input-group col-lg-2 mb-4" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">NOTIFICATIONS</h5>
                            <p>Vous pouvez verifier vos notifications pour examiner les commandes</p>
                            <div class="input-group col-lg-4 mb-4" style="margin-left: 300px">
                      
                            <a href="../pharmacie/admin-pharma/index_pharma.php" class="stretched-link">Basculer</a>
                        
                    </div>
                        </div>
                        </div>

                    
                     <!-- Submit Button -->
                     <div  class="input-group col-lg-4 mb-4" style="margin-left: 380px">
                        <a href="../pharmacie/php_files/deconn_pharma.php" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Deconnexion</span>
                        </a>
                    </div>
                    
</div>    
<?php 
}
else{
    echo 'connectez-vous
    <a href="../pharmacie/pharmacie_conn.php" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Appuyer ici pour vous connecter</span>
                        </a>';
}
?>                
  </body>
</html>
