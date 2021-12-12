<?php
//Appel du fichier de connexion
require_once('db_conn.php');
//Récupération des données par post
$nom_client=htmlentities($_POST['nom']);

$prenoms_client=htmlentities($_POST['prenoms']);

$Date_de_naissance=htmlentities($_POST['Date']);

$Numero=htmlentities($_POST['phone']);

$email_livreur=htmlentities($_POST['Email']);

$zones=htmlentities($_POST['id_zone']);

$mdp_livreur=htmlentities(sha1($_POST['mdp'])); 

$conf_mdp=htmlentities(sha1($_POST['passConf'])); 


if ($mdp_livreur == $conf_mdp) {

$sql_ajout="insert into livreurs values(null,'$zones','$nom_client','$prenoms_client','$Date_de_naissance','$Numero','$email_livreur','$mdp_livreur')";

$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));

mysqli_close($conn);



header("location:succes_ajout_livreur.php");

session_destroy();//Suppression de toutes les variables session
}



?>