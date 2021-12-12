<?php
//Appel du fichier de connexion
require_once('db_conn.php');
//Récupération des données par post
$nom_pharma=htmlentities($_POST['nom']);

$nom_gerant=htmlentities($_POST['nom_gérant']);

$email_gerant =htmlentities($_POST['email']);

$Numero=htmlentities($_POST['phone']);

$addr_pharma=htmlentities($_POST['add']);

$zone_pharma=htmlentities($_POST['zone']);

$hr_ouvr=htmlentities($_POST['hr_ouv']);

$hr_ferm=htmlentities($_POST['hr_ferm']);

$mdp_client=htmlentities(sha1($_POST['mdp'])); 

$conf_mdp=htmlentities(sha1($_POST['passConf'])); 


if ($mdp_client == $conf_mdp) {

$sql_ajout="insert into pharmacie values(null,'$zone_pharma','$nom_pharma','$nom_gerant','$email_gerant','$Numero','$addr_pharma','$hr_ouvr','$hr_ferm','$mdp_client')";
$query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));

mysqli_close($conn);

header("location:success_ajout_pharma.php");

session_destroy();//Suppression de toutes les variables session

}

?>