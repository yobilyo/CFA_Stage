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
	echo //"<img src='".$donnees=['']."'/>
        "<h1>" .$donnees['nom']. "</h1><br/><br/>
        <p>Date de lancement : <strong>" .$donnees['date_lancement']. "</strong></p>
        <p> Description : <br/>" .$donnees['description']. "</p>
        <p>Pays : " .$donnees['pays']. "</p>
        <p>Ville : " .$donnees['ville']. "</p>
        <p>Budget de l'association : " .$donnees['budget']. "</p>
        <p>Somme colllectée : " .$donnees['somme_collecte']. "</p>";
}

?>

<br/><br/>

<h1 id="commentaires">Commentaires</h1>

<br/><br/>

<?php

include "un_projet_commentaire.php";
?>