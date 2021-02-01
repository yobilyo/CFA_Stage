<DOCTYPE !html> 

<html> 

<head> 
	<title>PROJET STAGE</title>
	<meta charset="utf-8"/>
	<!-- 
		<link rel="shortcut icon" type="image/x-icon" href="image/ [...] .ico"/>	//logo site	
	-->
	<link rel="stylesheet" href="style/index.css"/>

</head> 

<body> 

<center><a href="index.php?page=0"><img src=" " alt="Accueil"/></a></center>

<br/><br/>

<!-- Menu de navigation -->
<nav>
	<div><a href="index.php?page=1">Page 1</a></div> | 
	<div><a href="index.php?page=2">Page 2</a></div> | 
	<div><a href="index.php?page=3">Page 3</a></div>
</nav>

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
		case 0 : require_once("accueil.php");break;
		case 1 : require_once("Page1.php");break; 
		case 2 : require_once("Page2.php");break; 
		case 3 : require_once("Page3.php");break; 
	}
?> 

</body> 
</html> 	