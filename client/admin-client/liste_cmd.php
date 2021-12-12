<?php 
session_start();

require_once("db_conn.php");

if (isset($_SESSION['email_client'])) {
    $email_client = $_SESSION['email_client'];
    $sql_info = "select * from client where email_client = '$email_client'";
    $query_info = mysqli_query($conn,$sql_info) or die (mysqli_error($conn));
    //$info = mysqli_fetch_array($query_info);
   
}
if (isset($_SESSION['email_client'])) {
  $email_client = $_SESSION['email_client'];
  $sql_numero = "select numero from client where email_client = '$email_client'";
  $query_numero = mysqli_query($conn,$sql_numero) or die (mysqli_error($conn));
  
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

    <title>Liste commandes client</title>
  </head>
  <body>
  <?php include('navbar.php') ?>    


  <div class="container-fluid" style="margin-top:80px; width: 50%">
  <h3>Liste de vos commandes</h3>
    <table class="table table-striped">
      <thead>
        <tr>
            <th scope="col"> <i class="fa fa-sort"></i> Medicament</th>
            <th scope="col">Date livraison</th>
            <th scope="col">Heure livraison</th>
            <th scope="col">Gérer la commande</th>
        </tr>
      </thead>
      <tbody>
        
      
      <?php
          while($numero = mysqli_fetch_array($query_numero)){
            extract($numero);
            //echo $numero;
            $cmd = "select * from notif_client where num_client = '$numero'";
            $query_cmd = mysqli_query($conn, $cmd) or die(mysqli_error($conn));
            while($notif = mysqli_fetch_array($query_cmd)){
              extract($notif);

              echo "
                  
                    <tr>
                      <th scope='row'>$nom_medic</th>
                      <td>$date_livr</td>
                      <td>$hr_livr</td>
                      

                      <td>
                        <a href='fiche_cmd.php?id_notif_client=$id_notif_client'> Voir détails </a>
                      </td>
                    </tr>

              ";
            }
            
          }
      ?>
      </tbody>
  </table>
  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>