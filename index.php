<?php
	session_start();
	require_once ("controleur/controleur.class.php");
	require_once ("conf/config.ini"); 
	//instacier la classe Controleur 
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
?>

<DOCTYPE !html> 

<html> 

<head> 
	<title>PROJET STAGE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

	<meta charset="utf-8"/>
	<!-- 
		<link rel="shortcut icon" type="image/x-icon" href="image/ [...] .ico"/>	//logo site	
	-->

	<script src="lib/js/helpers.js"></script>

</head> 
<body> 
	<center>
		<!-- Menu de navigation (navbar) -->
		<?php
			echo'<p id="hautdepage"></p>';
			//pas besoin d'être connecté pour voir la navbar
			require_once("vue/vue_navbar.php");
			//print_r($_SESSION);
			echo "<br/>";

			//à enlever une fois la fonctionnalité de vérification d'email implémentée
			if (isset($_SESSION['id'])) {
				$unControleur->setTable("utilisateur");
				$where = array("id"=>$_SESSION['id']);
				$utilisateurConnecte = $unControleur->selectWhere($where);
				if ($utilisateurConnecte['emailValide'] != 1) {
					echo "Attention, votre compte n'a pas été validé, veuillez confirmer votre email
					pour accéder à l'ensemble des fonctionnalités du site internet.<br/>";
				}
			}
		?>

		<?php

            // on n'est pas connecté, donc on se connecte ou on s'inscrit
            //if (!isset($_SESSION['email'])) 
			//{
                if (isset($_GET['page']) && $_GET['page'] == "001") 
				{
                    require_once("gestion_inscription.php");
                } 
				else if (isset($_GET['page']) && $_GET['page'] == "11")
				{
                    // ?page=001 est la page d'inscription, si ce n'est pas set on est sur la page de connexion
                    require_once("gestion_connexion.php");
				}

			//pas besoin d'être connecté pour consulter certaines pages du site
            //} else {
				
                // on est connecté maintenant, donc on affiche le site
                //require_once("vue/vue_navbar.php");

                if(isset($_GET['page'])) $page = $_GET['page']; 
                    else  $page = 0;
                switch ($page)
                {
					case 0:
                        require_once("accueil.php");
						break;
					
					//1 est pour l'inscription, ne pas utiliser ici
					//11 est pour la connexion, ne pas utiliser ici

                    case 2:
                        require_once("gestion_utilisateur.php");
						break;

					//porjet et commentaire 
					case 3:
						
						$unControleur->setTable ("les_projets");
						$tab=array("*");
						$lesProjets = $unControleur->selectAll($tab);

						require_once("vue/projet/les_projets.php"); 
						break;

					//quand on clique sur un des projets
					case 5:
						require_once("vue/projet/un_projet.php");
						break;

					//Ajouter/Lister 
					case 35:
						require_once("gestion_projet.php");
						break;

					// upload
					case 351: 
						require_once("upload.php");
						break;
					
					case 36:
						require_once("gestion_commentaire.php");
						break;
					
					case 37:
						require_once("gestion_don.php");
						break;
					
					case 41:
						require_once("gestion_don_faire_un_don.php");
						break;
					case 411:
						require_once("gestion_don_transaction.php");
						break;
					case 412:
						require_once("gestion_don_merci.php");
						break;

					case 42:
						require_once("gestion_don_recu_don.php");
						break;

					case 6:
						require_once("gestion_association.php");
						break;
						
					case 90:
						require_once("gestion_moncompte.php");
						break;

					case 91 :
						require_once('vue/modifier_mesInfos.php');
						break;

                    case 10:
                        session_destroy();   
                        header("Location: index.php");             
					}
					
					//attention 11 est déjà utilisé pour la connexion
            //}

			require_once("vue/vue_footer.php");
		?>
	</center>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body> 
</html> 	