<h1>Mon Compte<h1>
<br/>

<h2>Mes infos Utilisateur</h2>
<?php
    require_once("vue_utilisateur.php");
?>

<br/>
<br/>
<h2>Mes Dons</h2>
<?php
    //require_once("vue_don.php");
?>

<br/>
<br/>
<h2>Mes Commentaires</h2>
<?php
    //require_once("vue_don.php");
?>

<?php
    if ($_SESSION['droits'] == "administrateur") {
        echo "<br/>
        <br/>
        <h2>Mes Projets</h2>";
        require_once("vue_projet.php");
    }

?>