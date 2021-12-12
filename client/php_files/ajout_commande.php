
<?php
session_start();

require_once("db_conn.php");

// recuperer id_quartier
     
    $sql="SELECT * FROM quartiers natural join zone ";

    $requete=mysqli_query($conn,$sql) or die(mysqli_error($conn));


    // recuperer id_pharma
    $sql="SELECT * FROM pharmacie  ";

    $req=mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>

<div class="container" style="margin-top: 150px">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="../assets/pharma12.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Passer une commande</h1>
            <p class="font-italic text-muted mb-0">Cet espace est dédié pour passer vos commandes sur nos pharmacies en ligne </p>
            <p class="font-italic text-muted">Faites vous plaisir. <a href="../index.php" class="text-muted">
                <u>PharmaLiv SN</u></a>
            </p>
        </div>
        
        <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
            <form action="../client/components/css/ajout_cmd.php" method="POST">
                <div class="row">

                   <!-- Commande --> 
                   <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-shopping-basket text-muted"></i>
                            </span>
                        </div>
                        
                        <input type="text" name="cmd" placeholder="Commande" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                    <!-- Phone Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                        </div>
        
                        <input type="tel" name="num_client" placeholder="Téléphone" class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>
                   
                    <!-- Photo d'ordonnance -->
                    <div class="input-group col-lg-12 mb-4">
                        <div type="file" class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-camera  text-muted"></i>
                                
                            </span>
                        </div>
                        
                        <input type="file" name="photo_ordonnance"  class="form-control bg-white border-md border-left-0 pl-3" required>
                    </div>

                    
        
                    <!-- Quartier -->
                   <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-location-arrow text-muted"></i>
                            </span>
                            
                        </div>
                        <select name="id_quartier">
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
                
                    <!-- Pharmacie -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-home text-muted"></i>
                            </span>
                        </div>
                       <select name="id_pharma">
                            <option>Pharmacie de votre choix</option>
                                <?php 
                                        
                                 while($ligne=mysqli_fetch_row($req)){
                                    echo "<option value='$ligne[0]'>$ligne[1] $ligne[2]  </option>";
                                        };
                                        mysqli_close($conn);
                                    ?>
                         </select>
                        <input type="text"  placeholder="pharmacies" class="form-control bg-white border-md border-left-0 pl-3" >
                    </div>
                      <!-- Horaire de livraison-->
                    <div class="input-group col-lg-6 mb-4 popup">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            Heure_livr
                            </span>
                        </div>
                        <input type="time" name="hr_livr" placeholder="Heure de livraison" class="form-control bg-white border-left-0 border-md" required >
                    </div>

                    <!-- Date de livraison-->
                    <div class="input-group col-lg-6 mb-4 popup">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                            Date
                            </span>
                        </div>
                        
                        <input type="date" name="date_livr" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    

                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2">Commander</button>
                            
                        
                    </div>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                
                    

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Déja enregistré? <a href="#" class="text-primary ml-2">Se connecter</a></p>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>

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
 