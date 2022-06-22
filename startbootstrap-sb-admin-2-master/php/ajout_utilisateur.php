<?php
    require_once 'connection.php';

        if(isset($_POST) && !empty($_POST)){
            $control_form_err = false;
            var_dump($_POST);
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $token = $_POST['token'];
            $role = $_POST['role'];
            $sql = "INSERT INTO utilisateur"."(nom, prenom, token, role)"."VALUES".
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
<h3>Ajout d'un utilisateur :</h3>
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
        <p>prenom : <input type="text" name="prenom" placeholder="Enter le prenom"/></p>
        <p>token : <input type="int" name="token" placeholder="Enter token"/></p>
        <p>role : <input type="text" name="role" placeholder="Enter le role"/></p>

        <input type="submit" value = "Enregistrer">
    </form>
</section>
</body>
</html>