<?php 
session_start();

require_once("db_conn.php");

if (isset($_SESSION['email_livreur'])) {
    $email_livreur = $_SESSION['email_livreur'];
    $sql_info = "select * from livreurs where email_livreur = '$email_livreur'";
    $query_info = mysqli_query($conn,$sql_info) or die (mysqli_error($conn));
    //$info = mysqli_fetch_array($query_info);
  
}

if (isset($_SESSION['email_livreur'])) {
    $email_livreur = $_SESSION['email_livreur'];
    $sql_id = "select id_livreur from livreurs where email_livreur = '$email_livreur'";
    $query_id = mysqli_query($conn,$sql_id) or die (mysqli_error($conn));
    
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

    <title>Gérez vos commandes</title>
  </head>
  <body>
    

    <h1>
        Pharmacie <?php echo $_SESSION['email_livreur'] ?> 
    </h1>
    
    <div class="container">
        <a href="index_pharma.php">Revenir à l'accueil</a> |
        <a href="../php_files/deconn_livreur.php">Deconnexion</a>
    </div>
    <table>
                  <tr>
                    <th>Numéro</th>
                    <th>Zone</th>
                    <th>Date livraison</th>
                    <th>Heure livraison</th>
                    <th>Gérer la commande</th>
                  </tr>
    <?php
        while($liste_cmd = mysqli_fetch_array($query_id)){
          extract($liste_cmd);

          $cmd = "select * from notif_livreur where id_livreur = '$id_livreur'";
          $query_cmd = mysqli_query($conn, $cmd) or die(mysqli_error($conn));
          while($notif = mysqli_fetch_array($query_cmd)){
            extract($notif);

            echo "
                
                  <tr>
                    <td>$num_client</td>
                    <td>$zone</td>
                    <td>$nom_medic</td>
                    <td>$date_livr</td>
                    <td>$hr_livr</td>
                    
                  </tr>

            ";
          }
          
        }
    ?>

</table>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>