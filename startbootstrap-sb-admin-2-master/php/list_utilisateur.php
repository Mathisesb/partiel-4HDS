<?php
    require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="fr">

<body>

<section>
<h3>Liste des utilisateurs :</h3>
    <?php 
    $sql = "SELECT nom,prenom,token,role, FROM utilisateur";
    $retval = mysqli_query($conn,$sql);
    if(! $retval){ ?>
        <h3>ECHEC DE L'AFFICHAGE</h3>
   <?php } else {?>
   <table class="table">
       <thead class="thead">
           <tr>
               <th id="ide">Nom</th>
               <th id="ide">PRENOM</th>
               <th id="ide">TOKEN</th>
               <th id="ide">ROLE</th>
           </tr>
       </thead>
       <tbody class="tbody">
           <?php while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) { ?>
            <tr>
                <th id="data"><?= $row["nom"] ?></th>
                <td id="data"><?= $row["prenom"]?></td>
                <td id="data"><?= $row["token"]?></td>
                <td id="data"><?= $row["role"]?></td>
                <td id="data"><a href="./modif_utilisateur.php?id_utilisateur=<?= $row["id_utilisateur"] ?>" ><button type="button">MODIFIER</button></a>
                </td>
            </tr>
            <?php } ?>
       </tbody>
   </table>
   <?php } ?>
   <?php mysqli_close($conn);    ?> 
</section>
</body>
</html>