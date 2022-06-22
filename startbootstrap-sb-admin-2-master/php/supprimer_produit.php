<?php

	$sql = 'SELECT ID FROM produit WHERE id_produit = "'.$_POST['id_produit'].'"';
 
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
 
	$data = mysql_fetch_array($req);
 
	$id_utilisateur = $data['id_produit'];
 

	mysql_free_result ($req);
 
	
	$sql ='DELETE from produit WHERE id_produit="'.$_POST['id_produit'].'"';
 
	
	mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
 

	echo 'Nous venons de supprimer la fiche produit '.$_POST['id_produit'].' de la base';
}
else {
	echo 'La variable de notre formulaire n\'est pas initialisée.';
}
?>