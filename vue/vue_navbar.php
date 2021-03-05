<link rel="stylesheet" href="vue/style/navbar.css"/>

<br/><br/><br/>


<ul id="navbar">
	<li><a href="index.php?page=0"><img src="./lib/images/asso-logo-navbar.png" alt="Accueil" title="Accueil"/></a></li>
	<li><a href="index.php?page=3">Projets</a></li> |
	
	<?php if(isset($_SESSION['droits']) && $_SESSION["droits"] == "administrateur")
	{	
		echo "<li class='afficher_dropdown'>Ajouter/Lister <span style='font-size:0.70em;'>▼</span></a>
		<span class='baisser_le_dropdown'>
		<ul class='dropdown'>
			<li><a class='lien_dropdown' href='index.php?page=2'>Utilisateurs</a></li>
			<li><a  class='lien_dropdown' href='index.php?page=35'>Projets</a></li>
			<li><a  class='lien_dropdown' href='index.php?page=36'>Commentaires</a></li>
			<li><a class='lien_dropdown' href='index.php?page=6'>Association</a></li>
			<li><a  class='lien_dropdown' href='index.php?page=37'>Don</a></li>
		</ul>
		</span>
		</li> | ";
	}
	?>

	<li><a href='index.php?page=41'>Faire un don</a></li> | 

	<?php
		if (isset($_SESSION['email']))
		{
			$unControleur->setTable ("utilisateur");
			$where = array('id' => $_SESSION['id']);
			$lUtilisateur = $unControleur->selectWhere ($where);

			echo "<li><a href='index.php?page=10'>Déconnexion</a></li>";
			echo "
			<li><a href='index.php?page=90'>
				<img src='".$lUtilisateur['photo_profil']."' width='35'>  ".$lUtilisateur['prenom']."  ".$lUtilisateur['nom']."
			</a></li>
			";
		} 
		else 
		{
			echo "<li><a href='index.php?page=002'>Connexion</a></li>";
		}
	?>
</ul>



<br/><br/><br/>