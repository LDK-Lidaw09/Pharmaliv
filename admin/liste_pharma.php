<?php 
    require_once("../db_conn/db_conn.php");
    $sql="SELECT *FROM pharmacie";
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
        <caption>Liste des Pharmacies</caption>
        <tr>
            <th>id_pharma</th>
            <th>Nom_pharma</th>
            <th>Nom_gerant</th>
            <th>Email Address</th>
            <th>Phone Number</th>
            <th>Addr_pharma</th>
            <th>Zone_pharma</th>
            <th>Heure d'ouverture</th>
            <th>Heure de fermeture</th>
            <th> Mot de passe</th>
          
             
        </tr>
        <?php 
            while($ligne=mysqli_fetch_array($requete)){
                echo "<tr>
                <td>".$ligne['id_pharma']."</td>
                <td>".$ligne['nom_pharma']."</td>
                <td>".$ligne['nom_gerant']."</td>
                <td>".$ligne['email_pharma']."</td>
                <td>".$ligne['numero']."</td>
                <td>".$ligne['addr_pharma']."</td>
                <td>".$ligne['id_quartier']."</td>
                <td>".$ligne['hr_ouvr']."</td>
                <td>".$ligne['hr_ferm']."</td>
                <td>".$ligne['mdp_pharma']."</td>
                
              
                </tr>";
            }
            mysqli_close($conn);
        ?>
        
    </table>
</body>
</html>