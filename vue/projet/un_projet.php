<link rel="stylesheet" href="vue/style/un_projet.css"/>

<?php

try 
{ 
    $bdd=new PDO('mysql:host=localhost;dbname=assostage;charset=utf8','root','',
    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' .$e->getMessage()); 
}

// si l'erreur 'Call to a member function query() on string' apparait c'est parce que vous n'avez pas réalisé l'appel de la bdd 

$requete = $bdd->query("select * from projet where id = ".$_GET['idprojet'].";"); 

while($donnees=$requete->fetch() )					
{
	echo
        "<h1>" .$donnees['nom']. "</h1>
        <p class=info_projet><b>Date de lancement : </b>" .$donnees['date_lancement']. "</p>
        <div id='description'>
            <p style='margin-bottom:30px;'><b>Description : </b></p>
            <p>" .$donnees['description']. "</p>
        </div>
        <p class=info_projet><b>Pays : </b>" .$donnees['pays']. "</p>
        <p class=info_projet><b>Ville : </b>" .$donnees['ville']. "</p>
        <p class=info_projet><b>Budget de l'association : </b>" .$donnees['budget']. " €</p>
        <p class=info_projet><b>Somme collectée : </b>" .$donnees['somme_collecte']. " €</p>";
}

//VIDEO

    echo "<h2 class='h2_projet'>- Vidéos -</h2>";

    $videos = $bdd->query("select * from video where id_Projet = ".$_GET['idprojet'].";"); 

    /*if(empty($donneesVideos=$videos->fetch() ) )
    {*/
        while($donneesVideos=$videos->fetch())
        {
            echo "
            <div id='uneVideo'>
                <h5>".$donneesVideos['titre']."</h5>

                <!-- Intégration YouTube -->
                <iframe width='560' height='315' src='".$donneesVideos['adresse']."' frameborder='0' 
                allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
                picture-in-picture' allowfullscreen></iframe>

            </div>";
        }
    /*}
    else
    {
        echo "<p>Il n'y a pas de vidéos relatives à ce projet</p>";
    }*/

//IMAGE
    
    echo "<h2 class='h2_projet'>- Images -</h2>";

    $images = $bdd->query("select * from image where id_Projet = ".$_GET['idprojet'].";"); 
    $erreurImage = "L image n\'apparait pas";

    /*if(empty($images))
    {
        echo "<p>Il n'y a pas d'images relatives à ce projet</p>";
    }
    else
    {*/
        while($donneesImages=$images->fetch() )
        {
            echo "
            <div id='uneImage'>
                <h5>".$donneesImages['titre']."</h5>
                <img id='tailleImage'  src='".$donneesImages['adresse']."' alt='".$erreurImage."'/>
            </div>";
        }
    //}

//COMMENTAIRE

echo '<h1 id="commentaires">Commentaires</h1>';

include "un_projet_commentaire.php";

?>