<?php 
// Appel du fichier de connexion
require_once('db_conn.php');

// Recuperation des données du formulaire
$nom = htmlentities($_POST['nom']);

$prenoms = htmlentities($_POST['prenoms']);

$sexe = htmlentities($_POST['sexe']);


$allergies_traitements = htmlentities($_POST['allergies_traitements']);

$date_de_naissance = htmlentities($_POST['date_naissance']);

$numero = htmlentities($_POST['numero']);

$email_client = htmlentities($_POST['email_client']);

$id_zone = htmlentities($_POST['id_zone']);

$photo_att = htmlentities($_POST['photo_att']);

$mdp_client = htmlentities(sha1($_POST['mdp'])); 


// Definition de la requete de mise a jour
$update = " update client set id_zone ='$id_zone', nom='$nom', prenoms='$prenoms', sexe ='$sexe', numero ='$numero', allergies_traitements ='$allergies_traitements', date_naissance='$date_de_naissance ', email_client ='$email_client', photo_att='$photo_att', mdp_client='$mdp_client' "; // ajouter le reste des données 
// Execution de la requete
$query_mat = mysqli_query($conn,$update) or die(mysqli_error($conn));
// Redirection vers listemat.php
header ( "location:../index_client?lien=profil" )

?>