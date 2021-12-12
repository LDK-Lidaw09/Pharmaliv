<?php
session_start();

require_once("../client/php_files/db_conn.php");

// recuperer id_quartier
     
    $sql="SELECT * FROM quartiers natural join zone ";

    $requete=mysqli_query($conn,$sql) or die(mysqli_error($conn));

?>

<form action="../client/php_files/ajout_client.php" method="POST" enctype="multipart/form-data">
<div class="container" style="margin-top: 150px">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="../assets/pharma15.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Créer un compte </h1>
            <p class="font-italic text-muted mb-0">Vous souhaitez bénéficier de nos services de pharmacie en ligne ?</p>
            <p class="font-italic text-muted">Vous êtes à la bonne porte. <a href="../index.php" class="text-muted">
                <u>PharmaLiv SN</u></a>
            </p>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
           
                <div class="row">

                   <!-- Last Name --> 
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input type="text" name="nom" placeholder="Nom " class="form-control bg-white border-left-0 border-md" required>
                    </div>

                     <!-- First Name -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="lastName" type="text" name="prenoms" placeholder="Prénoms" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                   <!-- Sexe -->
                    <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="sexe" value="H" onclick="afficher('hidden');" required>
                          <label class="form-check-label" for="inlineRadio1">Homme</label>
                    </div>
                    <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="sexe" value="F" onclick="afficher('visible');" required>
                          <label class="form-check-label" for="inlineRadio2">Femme</label>
                    </div>
                        <div id="text">
                        <select name="etat_client">
                                        <option value="Normale">Normale</option>
                                        <option value="F_Allaitant">Femme allaitant un bébé </option>
                                        <option value="F_Enceinte">Femme enceinte </option>
                                    </select>
                        </div>

                        <script type="text/javascript">
                               document.getElementById("text").style.visibility = 'hidden';
                               function afficher(etat)
                               {
                                   document.getElementById("text").style.visibility=etat;
                               }
                        </script> <br> 
                    <!-- Allergies-Traitements -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input  type="text" name="allergies_traitements" placeholder="vos allergies ou Traitements " class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    <!-- Date de naissance -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-birthday-cake text-muted"></i>
                            </span>
                        </div>
                        <input  type="date" name="date_naissance" placeholder=" Date de naissance " class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
                        
                        <input type="tel" name="numero" placeholder="Téléphone" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email_client" placeholder="Email" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                     
                     <!-- Quartier -->
                   <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-location-arrow text-muted"></i>
                            </span>
                            
                        </div>
                        <select name="id_zone">
                             <option>Votre Quartier</option>
                            <?php 
                
                             while($ligne=mysqli_fetch_row($requete)){
                               echo "<option value='$ligne[0]'>$ligne[1] $ligne[2] $ligne[3]</option>";
                                };
                                mysqli_close($conn);
                             ?>
                        </select>
                        <input type="text"  placeholder="quartiers" class="form-control bg-white border-md border-left-0 pl-3" >
                        
                    </div>
                    <!-- Photo d'attestation -->
                    
                     <div class="input-group col-lg-12 mb-4">
                        <div type="file" class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-camera  text-muted"></i>
                                
                            </span>
                        </div>
                        
                        <input type="file" name="photo_att"  class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>

        
                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="mdp_client" placeholder="Password" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    
                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="passwordConfirmation" type="text" name="confirmer_mdp" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                     
                        <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2">Créer un compte </button>
                            
                        
                    </div>
                    
                 
                        
                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                
                    

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Déja enregistré? <a href="../client/connexion_client.php" class="text-primary ml-2">Se connecter</a></p>
                    </div>

                </div>
           
        </div>
    </div>
</div>
</form>
<script>

                        // When the user clicks on <div>, open the popup
                        function myFunction() {
                            var popup = document.getElementById("myPopup");
                            popup.classList.toggle("show");
                        }

$(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
});
</script>
