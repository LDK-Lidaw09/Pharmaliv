<?php 
session_start();

require_once("db_conn.php");
if (isset($_SESSION['email_pharma'])) {
    $email_client = $_SESSION['email_client'];
    $sql_info = "select * from pharmacies where email_pharma = '$email_pharma'";
    $query_info = mysqli_query($conn,$sql_info) or die (mysqli_error($conn));
    $info = mysqli_fetch_array($query_info);
    extract($info);
   
}

// Recuperer les info de la commande
$id_client = $_GET["id_client"];



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Modifier votre profil</title>
  </head>
  <body>
  <?php include('navbar.php') ?>    
    
  <div class="container">
    <h3 class="upper-case" style="text-align:center">
      Modifier vos données
    </h3>
    <hr class="my-2">
  </div>

    <div class="container bg-light" style="margin-top:80px; width:50%; padding:20px">
      <form class="container" action="../admin-client/php_file/modifier_profil.php" method="POST">
          
          <div class="container">
            <div class="form-row" >
              <div class="col">
                <label>Nom_pharma</label>
                <input type="text" name="nom" class="form-control" value="<?= $nom?>">
              </div>
              <div class="col">
              <label>Prénoms</label>
                <input type="text" name="prenoms" class="form-control"value="<?=$prenoms ?>">
              </div>
            
            </div>
            <div class="form-row" style="margin-top:10px" >
              <div class="col">
                <label>Numero de telephone</label>
                <input type="text" name="numero" class="form-control" value="<?= $numero?>">
              </div>
              <div class="col">
              <label>Email</label>
                <input type="text" name="email_client" class="form-control"value="<?=$email_client ?>">
              </div>
            </div>
            <div class="form-row" style="margin-top:10px" >
              <div class="col">
                <label>Quartier</label>
                <input type="text" name="id_zone" class="form-control" value="<?= $id_zone?>">
              </div>
              
            </div>
            <div class="form-row" style="margin-top:10px" >
            
              <div class="col">
              <label>mdp</label>
                <input type="password" name="mdp" class="form-control"value="<?=$mdp_client?>">
              </div>
              
            </div>
          </div>
          
          <hr class="my-2">
          <input type="submit" class="btn btn-success" value="Modifier votre profil">
      </form>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>