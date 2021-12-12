<?php
//Appel du fichier de connexion
require_once('db_conn.php');
//Récupération des données par post
$nom = htmlentities($_POST['nom']);

$prenoms = htmlentities($_POST['prenoms']);

$sexe = htmlentities($_POST['sexe']);

$etat_client = htmlentities($_POST['etat_client']);

$allergies_traitements = htmlentities($_POST['allergies_traitements']);

$date_de_naissance = ($_POST['date_naissance']);

$numero = htmlentities($_POST['numero']);

$email_client = htmlentities($_POST['email_client']);

$id_zone = htmlentities($_POST['id_zone']);

$photo_att = htmlentities($_POST['photo_att']);

$mdp_client = htmlentities(sha1($_POST['mdp_client'])); 

$confirmer_mdp = htmlentities(sha1($_POST['confirmer_mdp'])); 


if ($mdp_client == $confirmer_mdp) {
    if ( !isset($_FILES['photo_att']) ){
        die ("Veuillez vous rendre au formulaire et soumettre un fichier");
    }
    $file = $_FILES['photo_att']; // On recupere le fichier à envoyé
    if( $file['error'] == 0 ){ // ON verifie qu'il n'y a pas d'erreur
        // Il n'y a pas d'erreur
        $nom = $file['name']; // Nom du fichier
        $type = $file['type']; // Type du fichier
        $taille = $file['size'] / 1024 ; // Taille du fichier en ko

        $nom_tmp = $file['tmp_name']; // Nom temporaire
        

        $destination = "upload/".$nom; // Destination du fichier

        move_uploaded_file( $nom_tmp, $destination ); // Deplacer le fichier dans notre dossier

        echo " Le fichier ".$nom." de taille ".$taille." ko (".$type.") a été enregistré!";
    }
    else{
        // Il y a des erreurs
        // echo "Attention! Il y a une erreur ".$file['error'];
        switch ( $file['error'] ){
            case 1: echo "La taille maximale (php.ini) est dépassée"; break;
            case 2: echo "La taille maximal (form) dépassée"; break;
            case 3: echo "Fichier uploadé partiellement!"; break;
            case 4: echo "Aucun fichier uploadé!"; break;
            default: echo "Il y a une erreur ".$file['error']; break;
        }
    }

    $sql_ajout="insert into client values(null,'$id_zone','$nom','$prenoms','$sexe','$etat_client','$allergies_traitements','$date_de_naissance','$numero','$email_client','$photo_att ','$mdp_client')";
    
    $query_ajout=mysqli_query($conn,$sql_ajout) or die(mysqli_error($conn));
    
    mysqli_close($conn);
    
    header("location:success_ajout_client.php");

    session_destroy();//Suppression de toutes les variables session
}


?>