<?php
require_once 'connection.php';
$id_produit = $_GET["id_produit"];
if(isset($_POST) && !empty($_POST)){
            $control_form_err = false;
            var_dump($_POST);
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $stock = $_POST['stock'];
            $reference = $_POST['reference'];
            
            $sql = "UPDATE produit SET nom = '".$nom."', description = '".$description."', prix = '".$prix."',stock ='"$stock"', reference = '".$reference."' WHERE id_produit = '".$id_produit."'";
            mysqli_select_db($conn, 'gestion_stock_medicaments');
            $retval = mysqli_query($conn, $sql);
            if(! $retval ) {
                die('could not enter data:' .mysqli_error($conn));
                }
                else {
                echo "data sont bien rentrée";
                mysqli_close($conn); 
                }
                if(! $retval ) {
                   $control_form_err = true;
               }
        }
?>
<!DOCTYPE html>
<html lang="fr">

<body>
<?php

if(isset($_POST) && !empty($_POST)){

}else{
    $sql = "SELECT * FROM produit WHERE id_produit = '".$id_produit."'";

    if ($retval = mysqli_query( $conn, $sql )){
    
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) { ?>
            <h5>le nom est : <span><?= $row["nom"] ?></span></h5>
            <h5>La description est : <span><?= $row["description"] ?></span></h5>
            <h5>le prix est : <span><?= $row["prix"] ?></span></h5>
            <h5>le stock est : <span><?= $row["stock"] ?></span></h5>            
            <h5>La reference est : <span><?= $row["reference"] ?></span></h5>
            <?php } 
             
    }
    

}

?>

<br>
<br>

<h4>MODIFICATION :</h4>
<form action="<?php $_PHP_SELF ?>" method="POST">
        
    <?php   if(isset($_POST)  && !empty($_POST)){  ?>

<?php   if(!$control_form_err){  ?>

    <a href= "#">L'enregistrement a été effectuer avec succès</a>




<?php   if(!$control_form_err){  ?>

    <a href="#">L'enregistrement a été effectuer avec succès</a>


<?php   }  ?> 

<?php   if($control_form_err){  ?>

    <a href="#">L'enregistrement a échoué</a>


<?php   }  ?>  

<?php   }  ?>  

        <p>nom : <input type="text" name="nom" placeholder="Enter le nom'"/></p>
        <p>prenom : <input type="text" name="description" placeholder="Enter la description"/></p>
        <p>prix : <input type="int" name="token" placeholder="Enter le prix"/></p>
        <p>stock : <input type="text" name="role" placeholder="Enter le stock"/></p>
        <p>reference : <input type="text" name="role" placeholder="Enter la reference"/></p>
        <input type="submit" value = "Enregistrer">
</form>



<br>
<br>
<br>

<a href="./list_produit.php"><button type="button">Voir la liste</button> </a>
</body>
</html>
