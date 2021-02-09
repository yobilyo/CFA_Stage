<link rel="stylesheet" href="vue/navbar.css"/>

<br/><br/><br/>


<ul id="navbar">
	<li><a href="index.php?page=0"><img src="./lib/images/asso-logo-navbar.png" alt="Accueil" title="Accueil"/></a></li>
	<li><a href="index.php?page=2">Utilisateurs</a></li> | 

	<li id="afficher_dropdown"><a href="index.php?page=3">Projets ↓</a>
		<ul id="dropdown">
			<li><a  class="lien_dropdown" href="index.php?page=31">Listes des projets</a></li>
		</ul>
	</li> | 
	<li><a href="index.php?page=4">Dons</a></li> | 
	<li><a href="index.php?page=5">Commentaires</a></li> | 
	<li><a href="index.php?page=6">Associations</a></li> | 
	<li><a href="index.php?page=90">Mon Compte</a></li> | 

	<?php
		if (isset($_SESSION['email']))
		{
			echo "<li><a href='index.php?page=10'>Déconnexion</a></li>";
		} 
		else 
		{
			echo "<li><a href='index.php?page=0'>Connexion</a></li>";
		}
	?>
</ul>



<br/><br/><br/>