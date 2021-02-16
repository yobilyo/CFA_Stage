<?php

	//Cette page affiche tout le contenu sous le titre commentaire
	$unControleur->setTable ("Utilisateur");
	$tab=array("id", "nom", "prenom");
	$lesUsers = $unControleur->selectAll($tab);

	$unControleur->setTable ("commentaire");
	
	$leCommentaire = null; 

	$date = date('d/m/y H:i:s');
	
	//Pour que l'utilisateur puisse écrire un commentaire
	include "ecrire_commentaire.php"; 

	if (isset($_POST['valider_commentaire']))
	{
		$tab=array("dateCom"=> $date, //pour récupéré la date et l'heure actuelle
		"contenu"=>$_POST['contenu'],
		"note"=>$_POST['note'],
		"id_Utilisateur"=>$_SESSION['id'],	//c'est bon
		"id_Projet"=>$_POST['id_Projet']);
		$unControleur->insert($tab);
	}

	$unControleur->setTable ("commentaire_of_user");
	$tab=array("*");
	$lesCommentaires_of_user = $unControleur->selectAll($tab);

		foreach($lesCommentaires_of_user as $unCommentaire_of_user)
		{
			//if($unCommentaire_of_user['id_Projet'] == ){
				echo '<em>Ecrit par : </em>' .$unCommentaire_of_user['nom']. ' ' .$unCommentaire_of_user['prenom']. '<br/>'
				.$unCommentaire_of_user['contenu']. '<br/>'
				.$unCommentaire_of_user['note']. '<br/>'
				.$unCommentaire_of_user['dateCom'] . '<br/>
	
				<br/><br/><br/>';
			//}
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