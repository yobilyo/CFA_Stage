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

echo "<h2 class='h2_projet'>- Vidéos -</h2>

    <p>Afficher vos vidéos</p>
    
    <h2 class='h2_projet'>- Images -</h2>

    <p>Afficher vos images</p>";

?>

<h1 id="commentaires">Commentaires</h1>

<?php
    include "un_projet_commentaire.php";
?>