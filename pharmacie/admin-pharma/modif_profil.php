<?php 
// Appel du fichier de connexion
require_once('db_conn.php');

// Recuperation des données du formulaire
$nom = htmlentities($_POST['nom']);

$nom_gerant = htmlentities($_POST['nom_gerant']);


$numero = htmlentities($_POST['numero']);

$email_pharma = htmlentities($_POST['email_pharma']);

$id_zone = htmlentities($_POST['id_zone']);

$hr_ouvr = htmlentities($_POST['hr_ouvr']);

$hr_ferm = htmlentities($_POST['hr_ferm']);

$mdp_pharma = htmlentities(sha1($_POST['mdp'])); 


// Definition de la requete de mise a jour
$update = " update pharmacie set id_quartier nom_pharma='$nom', nom_gerant='$nom_gerant', numero ='$numero', email_pharma ='$email_pharma',addr_pharma ='$id_zone',hr_ouvr ='$hr_ouvr',hr_ferm ='$hr_ferm', mdp_pharma='$mdp_pharma' "; // ajouter le reste des données 
// Execution de la requete
$query_mat = mysqli_query($conn,$update) or die(mysqli_error($conn));
// Redirection vers listemat.php
header ( "location:index_pharma?lien=profil" )

?>