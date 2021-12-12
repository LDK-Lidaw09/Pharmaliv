<?php
session_start();
session_destroy();//Suppression de toutes les variables session
header("location:../connexion_admin.php");
?>