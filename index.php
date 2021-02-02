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
	<link rel="stylesheet" href="style/index.css"/>
</head> 
<body> 
	<center>
		<a href="index.php?page=0"><img src=" " alt="Accueil"/></a>

		<br/><br/>

		<!-- Menu de navigation -->
		<?php
			require_once("vue/vue_navbar.php");
		?>

		<!-- Rubrique se connecter -->
		<br/><br/>
		<section>
			<p><em>à faire</em></p>
			<a href="connexion.php">Se connecter</a><br/>	
			<a href="inscription.php">S'inscrire</a>
		<section>

		<br/><br/>

		<?php 
			$page = (isset($_GET['page'])) ? $_GET['page'] : 0 ;
			try
			{

			}
			catch(Exception $e)
			{
				die ("Erreur : ".$e->getMessage() );
			}
			switch($page)
			{
				case 0 :
					require_once("accueil.php");
					break;
				case 1 :
					require_once("vue/page1.php");
					break; 
				case 2 :
					require_once("vue/page2.php");
					break; 
				case 3 :
					require_once("vue/page3.php");
					break; 
			}

			require_once("vue/vue_footer.php");
		?>
	</center>
</body> 
</html> 	