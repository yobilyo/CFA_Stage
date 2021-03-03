<link rel="stylesheet" href="vue/style/un_projet.css"/>

<link rel="stylesheet" href="vue/style/slider.css"/>    <!--pour le slider -->

<?php

/*try 
{ 
    $bdd=new PDO('mysql:host=localhost;dbname=assostage;charset=utf8','root','',
    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' .$e->getMessage()); 
}

// si l'erreur 'Call to a member function query() on string' apparait c'est parce que vous n'avez pas réalisé l'appel de la bdd 

$requete = $bdd->query("select * from projet where id = ".$_GET['idprojet'].";"); */

$unControleur->setTable ("projet");
$where=array("id"=> $_GET['idprojet']);
$unProjet = $unControleur->selectWhere ($where);
//var_dump($unProjet);

//while($donnees=$requete->fetch() )	
//{
echo
"<h1>" .$unProjet['nom']. "</h1>
<p class=info_projet><b>Date de lancement : </b>" .$unProjet['date_lancement']. "</p>
<div id='description'>
    <p style='margin-bottom:30px;'><b>Description : </b></p>
    <p>" .$unProjet['description']. "</p>
</div>
<p class=info_projet><b>Pays : </b>" .$unProjet['pays']. "</p>
<p class=info_projet><b>Ville : </b>" .$unProjet['ville']. "</p>
<p class=info_projet><b>Budget de l'association : </b>" .$unProjet['budget']. " €</p>
<p class=info_projet><b>Somme collectée : </b>" .$unProjet['somme_collecte']. " €</p>";
//}


//VIDEO

echo "<h2 class='h2_projet'>- Vidéos -</h2>";

/*$videos = $bdd->query("select * from video where id_Projet = ".$_GET['idprojet'].";"); */

$erreurVideo = "La video n\'apparait pas";

$unControleur->setTable ("video");
$where = array("id_Projet"=>$_GET['idprojet']);
$videosProjet = $unControleur->selectWhereAll($where);

/*if(empty($donneesVideos=$videos->fetch() ) )
{
    while($donneesVideos=$videos->fetch())
    {
        echo "
        <div id='uneVideo'>
            <h3>".$donneesVideos['titre']."</h3>
            <img src='".$donneesVideos['adresse']."' alt='".$erreurVideos."'/>
        </div>";
    }
}*else
{
    echo "<p>Il n'y a pas de vidéos relatives à ce projet</p>";
}*/

// exemple de video: https://www.youtube.com/watch?v=jgVqr3lS_9U


//var_dump($videosProjet);
if (!empty($videosProjet)) 
{
    foreach ($videosProjet as $uneVideoProjet) {
        echo "
        <div id='uneVideo'>
            <h3>".$uneVideoProjet['alt']."</h3>
            <iframe width='560' height='315' src='".$uneVideoProjet['adresse']."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
        </div>";
    }
} else {
    echo "<p>Il n'y a pas de vidéos pour ce projet</p>";
}

    
//IMAGE
    
$unControleur->setTable ("image");
$where = array("id_Projet"=>$_GET['idprojet']);
$imagesProjet = $unControleur->selectWhereAll($where);

echo "<h2 class='h2_projet'>- Images -</h2>";

/*$images = $bdd->query("select * from image where id_Projet = ".$_GET['idprojet'].";"); */

/*if(empty($images))
{
    echo "<p>Il n'y a pas d'images relatives à ce projet</p>";
}
else
{  
    while($donneesImages=$images->fetch() )
    {
        echo "
        <div id='uneImage'>
            <h3>".$donneesImages['titre']."</h3>
            <img src='".$donneesImages['adresse']."' alt='".$erreurImage."'/>
        </div>";
    }
}*/

//var_dump($imagesProjet);

if (!empty($imagesProjet)) 
{
?>
    <div id="carouselExampleFade" class="carousel slide carousel-fade w-50" data-ride="carousel">
      <div class="carousel-inner">
        <?php
        
        $i = 0;
        foreach ($imagesProjet as $uneImageProjet) {
          $actives = '';
          if($i == 0){
            $actives ='active';
        }    
          ?>
        <div class="carousel-item <?= $actives; ?>">
          <?php echo "<img id='uneImg_carousel' class='d-block w-100' src=".$uneImageProjet['adresse'].">"; ?>
            <div class="carousel-caption d-none d-md-block">
              <h5 id="titre_Img"><?php echo $uneImageProjet['alt'];  ?></h5>
            </div>
        </div>
       <?php
        $i++;
        } ?>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
      </a>

    </div>
<?php
} 
else
{
    echo "<p>Il n'y a pas d'images pour ce projet</p>";
}

//COMMENTAIRE

echo '<h1 id="commentaires">Commentaires</h1>';

include "un_projet_commentaire.php";

?>