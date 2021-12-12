<?php 
    require_once("../db_conn/db_conn.php");
    $sql="SELECT *FROM livreurs";
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
        <caption>Liste des Livreurs</caption>
        <tr>
            <th>id_livreur</th>
            <th>Nom</th>
            <th>Prénoms</th>
            <th>Date de naissance</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>Id_zone</th>
            <th> Mot de passe</th>
            
             
        </tr>
        <?php 
            while($ligne=mysqli_fetch_array($requete)){
                echo "<tr>
                <td>".$ligne['id_livreur']."</td>
                <td>".$ligne['nom']."</td>
                <td>".$ligne['prénoms']."</td>
                <td>".$ligne['date_naissance']."</td>
                <td>".$ligne['numero']."</td>
                <td>".$ligne['email_livreur']."</td>
                <td>".$ligne['id_zone']."</td>
                <td>".$ligne['mdp_livreur']."</td>
                
              
                </tr>";
            }
            mysqli_close($conn);
        ?>
        
    </table>
</body>
</html>