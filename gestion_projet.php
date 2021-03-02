<?php
	$unControleur->setTable ("utilisateur");
	$tab=array("id", "nom", "prenom");
	$lesUsers = $unControleur->selectAll ($tab);

	$unControleur->setTable ("association");
	$tab=array("id", "libelle");
	$lesAssos = $unControleur->selectAll ($tab);

	$unControleur->setTable ("projet");
		
	$leProjet = null; 

	$date = date('y-m-d');
	echo $date ."<br/>";
	
	if (isset($_GET['action']) && isset($_GET['id']))
	{
		$idprojet = $_GET['id']; 
		$action = $_GET['action'];

		switch ($action)
		{
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

	echo "<img src='lib/images/pages/projet.png' width='200'></img>";

	echo '<br/><br/>';

	require_once("vue/projet/vue_insert_projet.php"); 

	echo '<br/><br/>';

	if (isset($_POST['modifier']))
	{
		$tab=array(
			"nom"=>$_POST["nom"],
			"description"=>$_POST['description'],
			"date_lancement"=>$date,
			"pays"=>$_POST['pays'],
			"ville"=>$_POST['ville'],
			"budget"=>$_POST['budget'],
			"somme_collecte"=>$_POST['somme_collecte'],
			"id_Utilisateur"=> $_SESSION['id'],
			"id_Association"=>$_POST['id_Association']
		);
	
		$where =array("id"=>$idprojet);
		$unControleur->update($tab, $where);
	}

	if (isset($_POST['valider']))
	{
		var_dump($_POST);
		var_dump($_FILES);
		$tab=array(
			"nom"=>$_POST["nom"],
			"description"=>$_POST['description'],
			"date_lancement"=>$date,
			"pays"=>$_POST['pays'],
			"ville"=>$_POST['ville'],
			"budget"=>$_POST['budget'],
			"somme_collecte"=>$_POST['somme_collecte'],
			"id_Utilisateur"=>$_SESSION['id'],
			"id_Association"=>1//$_POST['id_Association']
		);

		$unControleur->insert($tab);
	}

	$unControleur->setTable ("les_projets");
	$tab=array("*");
	$lesProjets = $unControleur->selectAll ($tab);

	echo "<br/><h2>Liste des Projets</h2><br/><br/>";
	require_once("vue/projet/vue_projet.php"); 
?>