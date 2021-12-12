<?php 
session_start();

require_once('db_conn.php');

if (isset($_SESSION['email_livreur'])) {
    $email_livreur = $_SESSION['email_livreur'];
    $sql_info = "select * from livreurs where email_livreur = '$email_livreur'";
    $query_info = mysqli_query($conn,$sql_info) or die (mysqli_error($conn));
    //$info = mysqli_fetch_array($query_info);
   
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Accueuil livreurs</title>
  </head>
  <body>
  <?php include('navbar.php') ?>    

    <h2> 
        <?php 
                while ($info = mysqli_fetch_array($query_info)) {
                    extract($info);

                    echo "$nom";
                }
        ?>

    </h2>
    <div class="container">
        <a href="liste_cmd.php">Voir vos livraison</a> |
        <a href="deconn_livreur.php">Deconnexion</a>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>