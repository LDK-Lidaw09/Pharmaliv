<?php 
    require_once("../db_conn/db_conn.php");
    $sql="SELECT *FROM client";
    $requete=mysqli_query($conn,$sql) or die(mysqli_error($conn));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
 table
{
    border-collapse: collapse; /* Les bordures du tableau seront collées (plus joli) */
    
    
}
td,th
{
    border: 1px solid black;
    
    
}

    </style>
</head>
<body>
    <table>
        <caption>Liste des clients</caption>
        <tr>
            <td>id_client</td>
            <td>Nom</td>
            <td>Prénoms</td>
            <td>Sexe</td>
            <td>Etat_client</td>
            <td>Allergies-Traitements</td>
            <td>Date de naissance</td>
            <td>Phone Number</td>
            <td>Email Address</td>
            <td>Photo d'attestation</td>
            <td> Mot de passe</td>
            
             
        </tr>
        <?php 
            while($ligne=mysqli_fetch_array($requete)){
                echo "<tr>
                <td>".$ligne['id_client']."</td>
                <td>".$ligne['nom']."</td>
                <td>".$ligne['prenoms']."</td>
                <td>".$ligne['sexe']."</td>
                <td>".$ligne['etat_client']."</td>
                <td>".$ligne['allergies_traitements']."</td>
                <td>".$ligne['date_naissance']."</td>
                <td>".$ligne['numero']."</td>
                <td>".$ligne['email_client']."</td>
                <td>".$ligne['photo_att']."</td>
                <td>".$ligne['mdp_client']."</td>
                
              
                </tr>";
            }
            mysqli_close($conn);
        ?>
        
    </table>
</body>
</html>