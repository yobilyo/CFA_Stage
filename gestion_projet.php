<?php
	$unControleur->setTable ("utilisateur");
	$tab=array("id", "nom", "prenom");
	$lesUsers = $unControleur->selectAll ($tab);

	$unControleur->setTable ("association");
	$tab=array("id", "libelle");
	$lesAssos = $unControleur->selectAll ($tab);

	$unControleur->setTable ("projet");
		
	$leProjet = null; 

	$date = date('d-m-y');
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
		// d'abord on insère le projet
		$tab=array(
			"nom"=>$_POST["nom"],
			"description"=>$_POST['description'],
			"date_lancement"=>$date,
			"pays"=>$_POST['pays'],
			"ville"=>$_POST['ville'],
			"budget"=>$_POST['budget'],
			"somme_collecte"=>$_POST['somme_collecte']
		);
		// pour le update on n'insère les clés étrangères, elles sont dans le where uniquement pour la recherche de l'entrée sql à modifier
		$where =array(
			"id"=>$idprojet,
			"id_Utilisateur"=> $_SESSION['id'],
			"id_Association"=>"1"
		);
		$unControleur->update($tab, $where);
		//update projet set nom = "ooo", description = "uuuu" etc... where id = $_GET['id'] and id_Utilisateur = $_POST['id_Utilisateur'] and id_Association = '1';

		//puis on insère l'image correspondante
		$id = $_GET['id'];
		require_once("index.php?page=351&id=".$id);
	}

	if (isset($_POST['valider']))
	{
		var_dump($_POST);
		var_dump($_FILES);

		// on insère le projet
		$unControleur->setTable("projet");
		$tab=array(
			"nom"=>$_POST["nom"],
			"description"=>$_POST['description'],
			"date_lancement"=>$date,
			"pays"=>$_POST['pays'],
			"ville"=>$_POST['ville'],
			"budget"=>$_POST['budget'],
			"somme_collecte"=>$_POST['somme_collecte'],
			"id_Utilisateur"=>$_SESSION['id'],
			"id_Association"=>"1"
		);
		var_dump($tab);
		$unControleur->insert($tab);

		//puis on insère l'image
		//pour cela, on doit d'abord récupérer l'id du projet qui vient d'etre inséré
		$unControleur->setTable("projet");
		$where = array(
			"nom"=>$_POST["nom"],
			"description"=>$_POST['description'],
			"date_lancement"=>$date,
			"pays"=>$_POST['pays'],
			"ville"=>$_POST['ville'],
			"budget"=>$_POST['budget'],
			"somme_collecte"=>$_POST['somme_collecte'],
			"id_Utilisateur"=>$_SESSION['id'],
			"id_Association"=>1
		);
		$unProjet = $unControleur->selectWhereLike($where);
		$id = $unProjet['id'];
		require_once("index.php?page=351&id=".$id);
	}

	$unControleur->setTable ("les_projets");
	$tab=array("*");
	$lesProjets = $unControleur->selectAll ($tab);

	echo "<br/><h2>Liste des Projets</h2><br/><br/>";
	require_once("vue/projet/vue_projet.php"); 
?>