<strong> Cette section en gras est contenu dans le fichier 'un_projet.php' qui est un fichier dynamique qui montrera toutes les infos sur un projet au propre</strong>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<h1 id="commentaires">Commentaires</h1>

<br/><br/>

<?php

include "un_projet_commentaire.php";

$lesCommentaires = $unControleur->selectAll ($tab);

?>