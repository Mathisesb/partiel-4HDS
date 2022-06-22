<?php
require_once 'connection.php';
$id_utilisateur = $_GET["id_utilisateur"];
if(isset($_POST) && !empty($_POST)){
            $control_form_err = false;
            var_dump($_POST);
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $token = $_POST['token'];
            $role = $_POST['role'];
            $sql = "UPDATE utilisateur SET nom = '".$nom."', prenom = '".$prenom."', token = '".$token."', role = '".$role."' WHERE id_utilisateur = '".$id_utilisateur."'";
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
    $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = '".$id_utilisateur."'";

    if ($retval = mysqli_query( $conn, $sql )){
    
        while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) { ?>
            <h5>le nom est : <span><?= $row["nom"] ?></span></h5>
            <h5>Le prenom est : <span><?= $row["prenom"] ?></span></h5>
            <h5>token est : <span><?= $row["token"] ?></span></h5>
            <h5>Le role est : <span><?= $row["role"] ?></span></h5>
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
        <p>prenom : <input type="text" name="prenom" placeholder="Enter le prenom"/></p>
        <p>token : <input type="int" name="token" placeholder="Enter token"/></p>
        <p>role : <input type="text" name="role" placeholder="Enter le role"/></p>

        <input type="submit" value = "Enregistrer">
</form>



<br>
<br>
<br>

<a href="./list_utilisateur.php"><button type="button">Voir la liste</button> </a>
</body>
</html>
