<?php
if(isset($_SESSION['email']) && $_SESSION['droits'] =="administrateur")
	{

		$unControleur->setTable ("utilisateur");
		$tab=array("id", "nom", "prenom");
		$lesUsers = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("projet");
		
		$leProjet = null; 
		if (isset($_GET['action']) && isset($_GET['id']))
		{
			$idprojet = $_GET['id']; 
			$action = $_GET['action'];

			switch ($action){
				case "sup" : 
						$tab=array("id"=>$idprojet); 
						$unControleur->delete($tab);
						break;
				case "edit" : 
						$tab=array("id"=>$idprojet); 
						$leProjet = $unControleur->selectWhere ($tab);
						break; 
			}
		}

		require_once("vue/vue_insert_projet.php"); 

		if (isset($_POST['modifier'])){
			$tab=array(
				"nom"=>$_POST['nom'],
				"description"=>$_POST['description'],
				"date_lancement"=>$_POST['date_lancement'],
				"pays"=>$_POST['pays'],
				"ville"=>$_POST['ville'],
				"budget"=>$_POST['budget'],
				"somme_collecte"=>$_POST['somme_collecte'],
				"id_Utilisateur"=>$_POST['id_utilisateur'],
				"id_Association"=>$_POST['id_association']
			);
			
			$where =array("id"=>$idprojet);
			$unControleur->update($tab, $where);
			header("Location: index.php?page=2");
		}

		if (isset($_POST['valider'])){
		$tab=array("description"=>$_POST['description'], "date_lancement"=>$_POST['date_lancement'],
			"pays"=>$_POST['pays'],"ville"=>$_POST['ville'],"budget"=>$_POST['budget'],"somme_collecte"=>$_POST['somme_collecte'],"id_utilisateur"=>$_POST['id_utilisateur']);
			$unControleur->insert($tab);
		}
		$unControleur->setTable ("les_projets");
		$tab=array("*");
		$lesProjets = $unControleur->selectAll ($tab); 
		require_once("vue/vue_les_projets.php");
		 
	}else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="utilisateur")
			{
		$unControleur->setTable ("les_projets");
		$tab=array("*");
		$lesProjets = $unControleur->selectAll  ($tab);
		echo "<h2>Liste des Projets</h2>";
		require_once("vue/vue_les_projets.php"); 
	}
		
?>