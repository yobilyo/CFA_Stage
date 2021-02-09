<?php
if(isset($_SESSION['email']) && $_SESSION['droits'] =="administrateur")
	{
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

			switch ($action){
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

		echo "<br/>
        <img src='lib/images/pages/commentaire.png' width='200'></img>
        <br/>";
		require_once("vue/vue_insert_commentaire.php"); 

		if (isset($_POST['modifier'])){
		$tab=array("date"=>$_POST['date'], "contenu"=>$_POST['contenu'],
			"note"=>$_POST['note'],"id_Utilisateur"=>$_POST['id_Utilisateur'],"id_Projet"=>$_POST['id_Projet']);
			$where =array("id"=>$idcomment);

			$unControleur->update($tab, $where);
			header("Location: index.php?page=5");
		}

		if (isset($_POST['valider'])){
		$tab=array("date"=>$_POST['date'], "contenu"=>$_POST['contenu'],
			"note"=>$_POST['note'],"id_Utilisateur"=>$_POST['id_Utilisateur'],"id_Projet"=>$_POST['id_Projet']);
			$unControleur->insert($tab);
		}
		$tab=array("*");
		$lesCommentaires = $unControleur->selectAll ($tab);
		echo "<h2>Liste des Commentaires</h2>"; 
		require_once("vue/vue_commentaire.php");
		 
	} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="utilisateur")
			{
		$unControleur->setTable ("projet");
		$tab=array("id", "nom","date_lancement");
		$lesConcerts = $unControleur->selectAll ($tab); 

		$unControleur->setTable ("utilisateur");
		$tab=array("id", "nom", "prenom");
		$lesUsers = $unControleur->selectAll ($tab);
				
		$leCommentaire = null;
		$unControleur->setTable ("commentaire");
		
		require_once("vue/vue_insert_commentaire.php"); 

		if (isset($_POST['modifier'])){
		$tab=array("date"=>$_POST['date'], "contenu"=>$_POST['contenu'],
			"note"=>$_POST['note'],"id_Utilisateur"=>$_POST['id_Utilisateur'],"id_Projet"=>$_POST['id_Projet']);

			$unControleur->update($tab, $where);
			header("Location: index.php?page=5");
		}

		if (isset($_POST['valider'])){
		$tab=array("date"=>$_POST['date'], "contenu"=>$_POST['contenu'],
			"note"=>$_POST['note'],"id_Utilisateur"=>$_POST['id_Utilisateur'],"id_Projet"=>$_POST['id_Projet']);
			var_dump($tab);
		}
		$tab=array("*");
		$lesCommentaires = $unControleur->selectAll ($tab); 
		echo "<h2>Liste des Commentaires</h2>";
		require_once("vue/vue_commentaire.php");
			}
		/***** Si l'user n'est pas connecté *****/

		/*else{
			$unControleur->setTable ("commentaire");
			$leCommentaire = null;

			$tab=array("*");
			$lesCommentaires = $unControleur->selectAll ($tab);
			require_once("vue/vue_commentaire.php");
			echo "<center><p style = 'font-size : 50px;'>Veuillez vous connecter pour ajouter un commentaire !</p></center>";
			} */
?>