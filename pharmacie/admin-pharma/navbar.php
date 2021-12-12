<?php 

require_once("db_conn.php");
if (isset($_SESSION['email_pharma'])) {
    $email_livreur = $_SESSION['email_pharma'];
    $sql_info = "select * from pharmacie where email_pharma = '$email_pharma'";
    $query_info = mysqli_query($conn,$sql_info) or die (mysqli_error($conn));
    $info = mysqli_fetch_array($query_info);
   
}



?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">



<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index_livreur.php">PharmaLiv</a>
  
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index_pharma.php"> <i class="fa fa-home"></i> Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="liste_cmd.php"> <i class="fa fa-pause"></i> Vos commandes en attente</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"> <i class="fa fa-history"></i> Historique de vos commandes</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <a class="nav-link" href="deconn_pharma.php"> <i class="fa fa-sign-out"></i> Deconnexion</a>
    </div>
  </div>
</nav>


<nav class="navbar fixed-bottom navbar-light bg-info">
    <h5>
       <i class="fa fa-user-circle-o"></i> Connecté en tant que  <?php echo $_SESSION['email_pharma'] ?> 
    </h5>

    <div class="form-inline my-2 my-lg-0">
        <?php
       $email_livreur = $_SESSION['email_pharma'];
        $sql_id = "select id_pharma from pharmacie where email_pharma= '$email_pharma'";
        $query_id = mysqli_query($conn,$sql_id) or die (mysqli_error($conn));
        $id = mysqli_fetch_array($query_id);
        extract($id);
            echo "
                <a class='nav-link' href='modifier_profil.php?id_pharma=$id_pharma'> <i class='fa fa-sign-out'></i> Modifier votre profil</a>           
            ";
        ?>
    </div>
</nav>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>