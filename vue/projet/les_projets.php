<link rel="stylesheet" href="vue/style/les_projets.css"/>
<h1>Nos projets : </h1>

<br/>

<form method="post" action="">
    <table>
        <tr>
            <td><input type="text" name="nomProjet" placeholder="Entrer le nom d'un projet" style="width: 300px;"></td>
            <td><input type="submit" name='ok' value='Rechercher'></td>
	    </tr>
    </table>
</form> 

<?php
    // initialisation à placer avant la recherche qui pourrait
    // actualiser cette valuer
    //on utilise la vue projet main qui contient aussi l'image main
    $unControleur->setTable ("les_projets_image_main");
    $tab = array("*");
    $lesProjets = $unControleur->selectAll($tab);

    /*LA RECHERCHE*/
	if(isset($_POST['ok'])) //recherche la ville
	{
		$unControleur->setTable ("les_projets_image_main");
        $lesProjets = $unControleur->selectByNomProjet($_POST['nomProjet']);
        //var_dump($lesProjets);
	}
    echo "<br/>";

    foreach ($lesProjets as $unProjet)
    {
        //<img src=" . $unProjet["image"] . "/> (peut etre inserer apres le h3)
        echo "
            <section id='un_projet'>
                <img src='".$unProjet['adresse']."' width='300'></img>
                <a href='index.php?page=5&idprojet=".$unProjet['id']."#hautdepage'>
                    <h3 id='titre_projet'>" . $unProjet['nom'] . "</h3>
                    <p>Date de lancement : " .$unProjet['date_lancement']. "</p>
                    <p id='somme_collecte'>Somme collecté : " .$unProjet['somme_collecte']. " €</p>
                </a>
                <p style='padding-top: 80px;'>Faire un don pour ce projet</p>
                <p style='padding-bottom: 20px;'><a href='index.php?page=5&idprojet=".$unProjet['id']."#commentaires'>Voir les commentaires</a></p>       
            </section>
            
            <br/>";
    }
?>
