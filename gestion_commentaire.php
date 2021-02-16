<?php
	$unControleur->setTable ("Projet");
	$tab=array("id", "nom","date_lancement");
	$lesProjets = $unControleur->selectAll ($tab); 

	$unControleur->setTable ("Utilisateur");
	$tab=array("id", "nom", "prenom");
	$lesUsers = $unControleur->selectAll ($tab);

	$unControleur->setTable ("commentaire");
		
	$leCommentaire = null; 

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

			case "edit" : 
				$tab=array("id"=>$idcomment); 
				$leCommentaire = $unControleur->selectWhere ($tab);
				break; 
		}
	}

	echo "<img src='lib/images/pages/commentaire.png' width='200'></img>";
	
	echo '<br/><br/>';

	include "vue/commentaire/vue_insert_commentaire.php"; 

	echo '<br/><br/>';
		
	if (isset($_POST['modifier']))
	{
		$tab=array("dateCom"=>$_POST['dateCom'], 
		"contenu"=>$_POST['contenu'],
		"note"=>$_POST['note'],
		"id_Utilisateur"=>$_POST['id_Utilisateur'],
		"id_Projet"=>$_POST['id_Projet']);
		$where =array("id"=>$idcomment);

		$unControleur->update($tab, $where);
	}

	if (isset($_POST['valider']))
	{
		$tab=array("dateCom"=>$_POST['dateCom'], 
		"contenu"=>$_POST['contenu'],
		"note"=>$_POST['note'],
		"id_Utilisateur"=>$_POST['id_Utilisateur'],
		"id_Projet"=>$_POST['id_Projet']);
		$unControleur->insert($tab);
	}
	$tab=array("*");
	$lesCommentaires = $unControleur->selectAll ($tab);

	echo "<br/><h2>Liste des Commentaires</h2><br/><br/>"; 

	include "vue/commentaire/vue_commentaire.php";
?>