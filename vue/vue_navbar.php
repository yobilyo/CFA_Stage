<link rel="stylesheet" href="vue/style/navbar.css"/>

<br/><br/><br/>


<ul id="navbar">
	<li><a href="index.php?page=0"><img src="./lib/images/asso-logo-navbar.png" alt="Accueil" title="Accueil"/></a></li>
	<li><a href="index.php?page=2">Utilisateurs</a></li> | 

	<li class="afficher_dropdown"><a href="index.php?page=3">Projets <span style="font-size:0.70em;">▼</span></a>
		<span class="baisser_le_dropdown">
		<ul class="dropdown">
			<li><a  class="lien_dropdown" href="index.php?page=31">Listes des projets</a></li>
		</ul>
		</span>
	</li> | 
	<li><a href="index.php?page=4">Dons</a></li> | 
	<li><a href="index.php?page=41">Faire un Don</a></li> | 
	<li><a href="index.php?page=42&iddon=1">Reçu</a></li> | 
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