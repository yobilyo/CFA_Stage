<?php

	//Cette page affiche tout le contenu sous le titre commentaire
	
	$unControleur->setTable ("Utilisateur");
	$tab=array("id", "nom", "prenom");
	$lesUsers = $unControleur->selectAll ($tab);

	$unControleur->setTable ("commentaire");
		
	$leCommentaire = null; 

	$date = date('d/m/y H:i:s');
	
	//Pour que l'utilisateur puisse écrire un commentaire
	include "ecrire_commentaire.php"; 

	if (isset($_POST['valider']))
	{
		$tab=array("dateCom"=> $date, //pour récupéré la date et l'heure actuelle
		"contenu"=>$_POST['contenu'],
		"note"=>$_POST['note'],
		"id_Utilisateur"=>$_POST['id_Utilisateur'],
		"id_Projet"=>$_POST['id_Projet']);
		$unControleur->insert($tab);
	}
	$tab=array("*");
	$lesCommentaires = $unControleur->selectAll ($tab);

	foreach($lesCommentaires as $unCommentaire)
	{
		echo '<em>nom de l user</em><br/>'
		.$unCommentaire['contenu']. '<br/>'
		.$unCommentaire['note']. '<br/>'
		.$unCommentaire['dateCom'] . '<br/>

		<br/><br/><br/>';
	}

	/*pour permettre à l'admin de supprimer un commentaire 
	if($_SESSION['droits']='administrateur')
	{
		if (isset($_GET['action']) && isset($_GET['id']))
		{
			$idcomment = $_GET['id']; 
			$action = $_GET['action'];

			switch ($action)
			{
				case "sup" : 
					$tab=array("id"=>$idcomment); 
					$unControleur->delete($tab);
					break;
			}
		}
	}*/
?>

<br/><br/><br/>

<em>vous etes sur un_projet_commentaire.php</em>