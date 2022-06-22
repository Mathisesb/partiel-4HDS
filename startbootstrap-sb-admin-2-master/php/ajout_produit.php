<?php
    require_once 'connection.php';

        if(isset($_POST) && !empty($_POST)){
            $control_form_err = false;
            var_dump($_POST);
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $stock = $_POST['stock'];
            $reference = $_POST['reference'];
            $sql = "INSERT INTO produit"."(nom, description, prix, stock, reference)"."VALUES".
            "('$numero','$tel')";
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
<html lang="en">

<body>


<section>
<h3>Ajout d'un produit :</h3>
    <form action="<?php $_PHP_SELF ?>" method="POST">
        
    <?php   if(isset($_POST)  && !empty($_POST)){  ?>

<?php   if(!$control_form_err){  ?>

    <a href="#">L'enregistrement a été effectuer avec succès</a>


<?php   }  ?> 

<?php   if($control_form_err){  ?>

    <a href="#">L'enregistrement a échoué</a>


<?php   }  ?>  

<?php   }  ?>  

        <p>nom : <input type="text" name="nom" placeholder="Enter le nom'"/></p>
        <p>description : <input type="text" name="description" placeholder="Enter la description"/></p>
        <p>prix : <input type="int" name="prix" placeholder="Enter le prix"/></p>
        <p>reference : <input type="int" name="reference" placeholder="Enter la reference"/></p>

        <input type="submit" value = "Enregistrer">
    </form>
</section>
</body>
</html>