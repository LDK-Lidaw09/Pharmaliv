<?php
//Appel du fichier de connexion
require_once('db_conn.php');
//Récupération des données par post


$id_pharma = htmlentities($_POST['id_pharma']);

$id_quartier = htmlentities($_POST['id_quartier']);

$nom_medic = htmlentities($_POST['nom_medic']);

$num_client = htmlentities($_POST['num_client']);

$photo_ordonnance = htmlentities($_POST['photo_ordonnance']);

$nbr_medocs = htmlentities($_POST['nbr_medocs']);

$date_livr = htmlentities($_POST['date_livr']);

$hr_livr = htmlentities($_POST['hr_livr']);

$mode_pai = htmlentities($_POST['mode_pai']);




    $sql_ajout= "insert into commande values(null,'$id_pharma','$id_quartier','$nom_medic','$num_client','$photo_ordonnance','$nbr_medocs','$date_livr', '$hr_livr', '$mode_pai')";
   
    //$sql_suppr = "DELETE FROM notif_pharma where id_notif=$id_notif";

    //$query_suppr = mysqli_query($conn, $sql_suppr) or die(mysqli_error($conn));

    $query_ajout = mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));
    
    mysqli_close($conn);
    
    header("location:../liste_cmd.php");

    session_destroy();//Suppression de toutes les variables session


?>