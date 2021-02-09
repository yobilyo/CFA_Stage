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
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

	<meta charset="utf-8"/>
	<!-- 
		<link rel="shortcut icon" type="image/x-icon" href="image/ [...] .ico"/>	//logo site	
	-->

	<script src="lib/js/helpers.js"></script>
	<link rel="stylesheet" href="style/index.css"/>
</head> 
<body> 
	<center>
		<!-- Menu de navigation (navbar) -->
		<?php
			print_r($_SESSION);
			require_once("vue/vue_navbar.php");
		?>

		<?php

            // on n'est pas connecté, donc on se connecte ou on s'inscrit
            if (!isset($_SESSION['email'])) {
                if (isset($_GET['page']) && $_GET['page'] == "001") {
                    require_once("gestion_inscription.php");
                } else {
                    // ?page=001 est la page d'inscription, si ce n'est pas set on est sur la page de connexion
                    require_once("gestion_connexion.php");
                }

            } else {
                // on est connecté maintenant, donc on affiche le site
                require_once("vue/vue_navbar.php");

                if(isset($_GET['page'])) $page = $_GET['page']; 
                    else  $page = 0;
                switch ($page)
                {
                    case 0:
                        require_once("accueil.php");
                        break;
                    case 2:
                        require_once("gestion_utilisateur.php");
						break;
					case 3:
						require_once("gestion_projet.php");
						break;
					case 4:
						require_once("vue/Page4.php");
						break;
					case 90:
						require_once("gestion_moncompte.php");
						break;
                    case 10:
                        session_destroy();   
                        header("Location: index.php");             
                    }
            }

			require_once("vue/vue_footer.php");
		?>
	</center>
</body> 
</html> 	