<?php
//Connexion et sélection de la source de données
$server="localhost:3306";

$user="userpharma";

$pwd="passer";

$db="pharmaliv";

$conn=mysqli_connect($server, $user, $pwd, $db);
if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: ". mysqli_connect_error();
 exit();
}
?> 