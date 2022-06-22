<?php
    require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="fr">

<body>

<section>
<h3>Liste des utilisateurs d'un produit :</h3>
    <?php 
    $sql = "SELECT nom, prenom,token,rôle FROM utilisateur";
    $sql = "SELECT nom, descript,prix,stock,reference, FROM produit";
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
           <tr>
               <th id="ide">Nom</th>
               <th id="ide">DESCRIPTION</th>
               <th id="ide">PRIX</th>
               <th id="ide">STOCK</th>
               <th id="ide">reference</th>
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
            <tr>
                <th id="data"><?= $row["nom"] ?></th>
                <td id="data"><?= $row["description"]?></td>
                <td id="data"><?= $row["prix"]?></td>
                <td id="data"><?= $row["stock"]?></td>
                <td id="data"><?= $row["reference"]?></td>
                <td id="data"><a href="./modif_produit.php?id_produit=<?= $row["id_produit"] ?>" ><button type="button">MODIFIER</button></a>
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