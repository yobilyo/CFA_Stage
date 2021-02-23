<link rel="stylesheet" href="vue/style/les_projets.css"/>
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
            <a href='index.php?page=5&idprojet=".$unProjet['id']."#top'>
                <h3 id='titre_projet'>" . $unProjet['nom'] . "</h3>
                <p id='somme_collecte'>Somme collecté : " .$unProjet['somme_collecte']. " €</p>
            </a>
            <p style='padding-top: 80px;'>Faire un don pour ce projet</p>
            <p style='padding-bottom: 20px;'><a href='index.php?page=5&idprojet=".$unProjet['id']."#commentaires'>Voir les commentaires</a></p>       
        </section>
        
        <br/><br/>";
}
?>
<!--                -->