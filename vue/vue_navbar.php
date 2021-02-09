<nav>
	<div>
		<a href="index.php?page=0"><img src=" " alt="Accueil"/></a>
	</div> | 
	<div>
		<a href="index.php?page=2">Utilisateurs</a>
	</div> | 
	<div>
		<a href="index.php?page=3">Projets</a>
	</div> | 
	<div>
		<a href="index.php?page=6">Association</a>
	</div> | 
	<div>
		<a href="index.php?page=90">Mon Compte</a>
	</div>
	<?php
		if (isset($_SESSION['email'])) {
			echo "
			<div>
				<a href='index.php?page=10'>Déconnexion</a>
			</div>
			";
		} else {
			echo "
			<div>
				<a href='index.php?page=0'>Connexion</a>
			</div>
			";
		}
	?>
</nav>
