<h1>Mon Compte<h1>
<br/>


<?php
    /*
    echo"<h2>Mes infos Utilisateur</h2>";
    require_once("vue_utilisateur.php");
    */
    ?>
<h2>Modifier Compte </h2>
<?php 
require_once("vue_modifiercompte.php")
?>

<br/>
<br/>
<h2>Mes Dons</h2>
<?php
    require_once("vue_don.php");
?>

<br/>
<br/>
<h2>Mes Commentaires</h2>
<?php
    require_once("commentaire/vue_commentaire.php");
?>

<?php
    if ($_SESSION['droits'] == "administrateur") {
        echo "<br/>
        <br/>
        <h2>Mes Projets</h2>";
        require_once("projet/vue_projet.php");
    }

?>

