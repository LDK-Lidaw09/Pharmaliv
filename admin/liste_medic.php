<?php 
    require_once("../db_conn/db_conn.php");
    $sql="SELECT nom_medic,nbr_medocs FROM commande";
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
        <caption>Liste des medicaments</caption>
        <tr>
            
            <td>Nom_medoc</td>
            <td>nbr_medocs</td>
            
             
        </tr>
        <?php 
            while($ligne=mysqli_fetch_array($requete)){
                echo "<tr>
                <td>".$ligne['nom_medic']."</td>
                <td>".$ligne['nbr_medocs']."</td>
                
              
                </tr>";
            }
            mysqli_close($conn);
        ?>
        
    </table>
</body>
</html>