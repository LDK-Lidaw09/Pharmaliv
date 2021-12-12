<?php
session_start();
session_destroy();//Suppression de toutes les variables session
header("location:../pharma_panel.php");
?>