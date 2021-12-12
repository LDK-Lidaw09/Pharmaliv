<?php
session_start();
if(isset($_SESSION['email_livreur'])){//Si la variable session a ŽtŽ crŽee
   header("location:../livreur/livreur_panel.php");
    exit();
}

if(isset($_POST['Bconn'])){//SI on clique sur le bouton connexion
    //Appel du fichier de connexion la bd
    require_once('db_conn.php');
    //RŽcupŽration des donnŽes par la mŽthode POST
    $email_livreur=$_POST['email_livreur'];
    $mdp_livreur=$_POST['mdp_livreur'];
    $mdpHash=sha1($mdp_livreur);
    //DŽfinition de la requte de selection
    $sql_auth="select * from livreurs where email_livreur='$email_livreur' and mdp_livreur='$mdpHash'";
    $query_auth=mysqli_query($conn,$sql_auth) or die(mysqli_error($conn));
    $auth=mysqli_fetch_array($query_auth);
    
    if($auth['id_livreur'!='']){//Si l'authentification est correcte
        //CrŽation d'une variable session
        $_SESSION['email_livreur']=$email_livreur;
        $_SESSION['email_livreur']= $_POST['email_livreur'];
        $_SESSION['id_livreur'] = $auth['id_livreur'];
        header("location:../livreur/livreur_panel.php");
       
        exit();
    }

  else{
      echo 'Vos identifiants sont incorrects';
  }
}

?>





<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Connexion client</title>

    <script type="text/javascript">
    function SwitchPass(){
        var typeInput = document.getElementById('mdp');
        var txtHREF = document.getElementById('AffPass');
        if(typeInput.type == 'password'){
            typeInput.type = 'text';
            txtHREF.innerHTML = 'Cacher le mot de passe';
        }
        else{
            typeInput.type = 'password';
            txtHREF.innerHTML = 'Afficher mot de passe';
        }
   }

  </script>
  </head>
  <form id="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<!-- Email Address -->
<div class="container" style="margin-top: 150px">
  <div  class="input-group col-lg-6 mb-4" style="margin-left: 200px">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email_livreur" placeholder="Email_livreur" class="form-control bg-white border-left-0 border-md">
                    </div>
  <!-- Password -->
  <div class="input-group col-lg-6 mb-4" style="margin-left: 200px">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="mdp_livreur" placeholder="Password_livreur" class="form-control bg-white border-left-0 border-md">
                    </div>
                    
                    
                      <!-- Submit Button -->
                    <div class="input-group col-lg-4 mb-4" style="margin-left: 300px">
                        <button type="submit" class="btn btn-primary btn-block py-2" name="Bconn">Se connecter </button>
                            
                        
                    </div>
</div> 
</form>