<?php

	$sql = 'SELECT ID FROM utilisateur WHERE id_utilisateur = "'.$_POST['id_utilisateur'].'"';
 
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
 
	$data = mysql_fetch_array($req);
 
	$id_utilisateur = $data['id_utilisateur'];
 

	mysql_free_result ($req);
 
	
	$sql ='DELETE from utilisateur WHERE id_utilisateur="'.$_POST['id_utilisateur'].'"';
 
	
	mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());
 

	echo 'Nous venons de supprimer la fiche utilisateur '.$_POST['id_utilisateur'].' de la base';
}
else {
	echo 'La variable de notre formulaire n\'est pas initialisée.';
}
?>
