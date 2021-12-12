<?php 
session_start(); 

require_once("db_conn.php");

if (isset($_SESSION['email_client'])) {
    $email_client = $_SESSION['email_client'];
    $sql_info = "select * from client where email_client = '$email_client'";
    $query_info = mysqli_query($conn,$sql_info) or die (mysqli_error($conn));

    $query_num = mysqli_query($conn,$sql_info) or die (mysqli_error($conn));
   
}
    // recuperer id_quartier
    $sql="SELECT * FROM quartiers ";
    $requete=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    // recuperer id_pharma
    $sql_pharma = "SELECT * FROM pharmacie ";
    $requete_pharma = mysqli_query($conn, $sql_pharma) or die(mysqli_error($conn));
    


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Passer une commande</title>
  </head>
  <body>
  <?php include('navbar.php') ?>    



    <div class="container" style="margin-top:80px; width:50%; padding:20px">
        <form action="../admin-client/php_file/passer_cmd.php" method="POST" style="margin:20px" class="bg-light">  
            <div class="form-row" style="margin-top:10px">
                <div class="col" >
                    <select class="custom-select" name="id_pharma">
                            <option>Choisir une pharmicie</option>
                                <?php                             
                                    while($pharma=mysqli_fetch_row($requete_pharma)){
                                        echo "<option  value='$pharma[0]'>$pharma[2] $pharma[0]</option>";
                                    };
                                    mysqli_close($conn);
                                ?>
                    </select>
                </div>
                <div class="col" >
                    <select class="custom-select" name="id_quartier">
                            <option>Votre Zone</option>
                                <?php                             
                                    while($ligne=mysqli_fetch_row($requete)){
                                        echo "<option value='$ligne[0]'>$ligne[0] $ligne[1]</option>";
                                    };
                                    mysqli_close($conn);
                                ?>
                        </select>
                </div>
            </div>
            <div class="form-row" style="margin-top:10px">
                <div class="col">
                    <input type="text" class="form-control" name="nom_medic" placeholder="nom medicament">
                </div>
                <div class="col">
                    <?php 
                            while ($info_num = mysqli_fetch_array($query_num)) {
                                extract($info_num);

                                echo "<input type='tel' class='form-control' name='num_client' value='$numero' >";
                            }
                        ?>
                </div>
            </div>           
            <div class="form-row" style="margin-top:10px">
                <div class="col">
                    <input class="form-control" type="file" name="photo_ordonnance" >
                </div>
                
            </div> 
            <div class="form-row" style="margin-top:10px">
                <div class="col">
                    <label>date de livraison</label>
                    <input class="form-control" type="date" name="date_livr" >
                </div>
            </div>
            <div class="form-row" style="margin-top:10px">
                <div class="col">
                    <label>heure de livraison</label>
                    <input class="form-control" type="time" name="hr_livr">
                </div>
            </div>                
                    
                                <hr class="my-2">
                    <!-- bouton -->
                    <div class="row" style="margin-top:10px">
                        <a style="margin-left:20px" href="index_client.php">Revenir à l'accueil</a>
                        <input type="submit" class="btn btn-success"  style="margin-left:50%" value="envoyer" name="">
                    </div>
                    <div class="row">
                        
                    </div>
                        
                                
    </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>