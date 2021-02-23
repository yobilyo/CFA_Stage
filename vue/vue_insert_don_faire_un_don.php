<h2> Activités du comité d'entreprise </h2>
<div class='container'>
	<div class="row">
        <?php 
            foreach ($lesActivites as $uneActivite) {
                echo "<div class='col-sm-6 col-md-4'>
                    <br>
                    <img src='".$uneActivite['image_url']."' class='rounded' width='350' />
                    <div class='text-left'>Nom : ".$uneActivite['nom']." </div>
                    <div class='text-left'>Lieu : ".$uneActivite['lieu']." </div>
                    <div class='text-left'>Budget : ".$uneActivite['budget']." </div>
                    <div class='text-left'>En bref : ".$uneActivite['description']." </div>
                    <div class='text-left'>Début : ".$uneActivite['date_debut']."</div>
                    <div class='text-left'>Fin : ".$uneActivite['date_fin']."</div>
                    <div class='text-left'>Prix : ".$uneActivite['prix']."</div>
                    <div class='text-left'>Participants : ".$uneActivite['nb_personnes']."</div>
                    <div class='text-left'><a href='".$uneActivite['lien']."'>En savoir plus...</a></div>
                    <p class='text-right'>";
                    if ($_SESSION['droits'] != "sponsor") {
                        echo "<a href='index.php?page=3' class='btn btn-primary' role='button'>Participer</a></p>";
                    }
                echo "</div>";
            }
        ?>
	</div>
</div>