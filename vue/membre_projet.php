<link rel="stylesheet" href="vue/style/membre_projet.css"/>

<h1>Nos projets : </h1>

<br/>

<form method="post" action="">
    <table>
       
        <tr>
            <td><input type="text" name="recherche" placeholder="Entrer un projet"/></td>
            <td><input type="submit" name='ok' value='Rechercher'></td>
	    </tr>
    </table>
</form> 

<br/><br/>

<?php 

//$lesProjets est declare dans l'index

foreach ($lesProjets as $unProjet)
{
    //<img src=" . $unProjet["image"] . "/> (peut etre inserer apres le h3)
    echo "
        <section id='un_projet'>
        <a href='unprojet.php'>
            <h3 id='titre_projet'>" . $unProjet['nom'] . "</h3>
            <p id='description_projet'>" . $unProjet['description'] . "</p>
        </a>
        <a id='commentaire_projet' href='unprojet.php#commentaires'>Voir les commentaires</a>
        </section><br/><br/>";
}
?>