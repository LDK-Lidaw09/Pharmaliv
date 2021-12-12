<?php  

if(isset($_POST['Email']) AND isset($_POST['mdp'])){

  $Email = htmlspecialchars($_POST['Email']);

$mdp = htmlspecialchars(sha1($_POST['mdp']));

require_once("db_conn.php");

  $sql="select email_client,mdp_client from pharmacie where email_client='$Email' and mdp_client ='$mdp' ";

  $infos_client=mysqli_query($conn,$sql) or die('<br>Erreur pour selectionner'.mysqli_error($conn));

  $client = mysqli_fetch_array($infos_client);

  if(mysqli_num_rows($infos_client) == 1){

      header('location:../pharma_panel.php');

      echo 'ok';
  }  
  else{
      echo 'Vos identifiants sont incorrects';
  }
}
?>
 

