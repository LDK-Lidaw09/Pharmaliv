<?php 
session_start();

require_once("db_conn.php");
if (isset($_SESSION['email_client'])) {
    $email_client = $_SESSION['email_client'];
    $sql_info = "select * from client where email_client = '$email_client'";
    $query_info = mysqli_query($conn,$sql_info) or die (mysqli_error($conn));
    //$info = mysqli_fetch_array($query_info);
   
}

// Recuperer les info de la commande
$id_notif_client = $_GET["id_notif_client"];

    $sql_notif="SELECT * FROM notif_client  WHERE id_notif_client = $id_notif_client";
    $requete_notif=mysqli_query($conn,$sql_notif) or die(mysqli_error($conn));
    $fiche_notif=mysqli_fetch_array($requete_notif);
    extract($fiche_notif);



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Details commande</title>
  </head>
  <body>
  <?php include('navbar.php') ?>    
    

    <h1>
        Client <?php echo $_SESSION['email_client'] ?> 
    </h1>
    <h2> 
        <?php 
                while ($info = mysqli_fetch_array($query_info)) {
                    extract($info);

                    echo "$nom";
                }
        ?>

    </h2>
    <div class="container">
        <a href="liste_cmd.php">Liste des commandes en attente</a> |
        <a href="deconn_client.php">Deconnexion</a>
    </div>

    <form class="container" action="../php_file/valider_cmd.php" method="POST">
        <div class="row">
            <label>Nom medicament:</label>
            <input type="text" name="nom_medic" readonly value="<?= $nom_medic?>">
        </div>
        <br>
        <div class="row">
            <input type="text" name="id_cmd" readonly value="<?=$id_notif_client ?>"> 
        </div>
        <br>
        <div class="row">
            <label>pharmacie:</label>
            <input type="text" name="id_pharma" readonly value="<?=$id_pharma ?>">
        </div>
        <br>
        <div class="row">
            <label for="email">num client:</label>
            <input type="text" name="num_client" value="<?=$num_client?>">
        </div>
        <br>
        <div class="row">
            <label>photo ordonnance:</label>
            <input type="text" name="photo_ordonnance" readonly value="<?=$photo_ordonnance?>">
        </div>
        <br>
        <div class="row">
            <label>date livraison:</label>
            <input type="text" name="date_livr" readonly value="<?=$date_livr ?>">
        </div>
        <br>
        <div class="row">
            <label> heure livraison:</label>
            <input type="text" name="hr_livr" readonly value="<?=$hr_livr ?>">
        </div>
        <br>
        <hr class="my-5">
        <h3>Informations supplementaires:</h3>
        <div class="row">
            <input type="text" name="nbr_medocs"placeholder="nombres de boites">
        </div>
        <br>
        <div class="row">
            <select name="mode_pai" >
                <option selected>Mode de paiement</option>
                <option value="orange_money">Orange money</option>
                <option value="Wari">Wari</option>
                <option value="Carte de credit">Carte de credit</option>
                <option value="sur_place">A la livraison</option>
            </select>
        </div>
        
        <br>
    
        <input type="hidden" name="id" value="<?=$id_notif ?>">
        <input type="submit" value="Valider la commande">
    </form>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>