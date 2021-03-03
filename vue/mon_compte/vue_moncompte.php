<link rel="stylesheet" href="vue/style/mon_compte.css"/> 

<?php 

echo "

<h1 class='h1_monCompte'>Mon Compte<h1>

<h3 class='h3_monCompte'>Mes informations personnelles</h3>


<div class='flex'>
    <div class='colonne'>
        <legend id='legend_maPhoto'>Votre photo de profil :</legend>
        <img id='img_monCompte' src='".$unUtilisateur['photo_profil']."'>
    </div>

    <div class='colonne'>
        <p class='p_mesInfos'><span class='legend_mesInfos'> Civilité :</span> ".$unUtilisateur['civilite']."</p>
        <p class='p_mesInfos'><span class='legend_mesInfos'> Nom :</span> ".$unUtilisateur['nom']."</p>
        <p class='p_mesInfos'><span class='legend_mesInfos'> Prénom :</span> ".$unUtilisateur['prenom']."</p>
        <p class='p_mesInfos'><span class='legend_mesInfos'> Date de naissance :</span> ".$unUtilisateur['date_naissance']."</p>
        <p class='p_mesInfos'><span class='legend_mesInfos'> E-mail :</span> ".$unUtilisateur['email']."</p>
        <p class='p_mesInfos'><span class='legend_mesInfos'> Adresse :</span> ".$unUtilisateur['adresse']."</p>
        <p class='p_mesInfos'><span class='legend_mesInfos'> Code Postal :</span> ".$unUtilisateur['codePostal']."</p>
        <p class='p_mesInfos'><span class='legend_mesInfos'> Ville :</span> ".$unUtilisateur['ville']."</p>
        <p class='p_mesInfos'><span class='legend_mesInfos'> Pays :</span> ".$unUtilisateur['pays']."</p>
    </div>
</div>

<form method='post' action=''>
    <input style='margin-top:30px;'type='submit' name='Modifier' Value='Modifier mes informations personnelles'/>
</form>";

if(isset($_POST["Modifier"]))
{
    header('Location:index.php?page=91');
}

echo "<h1 class='h1_monCompte'>Mes activités</h1>

<div style='width:800px;'>";

// < DONS 

    include("don_moncompte.php");

// >

// < COMMENTAIRE

    include("commentaire_moncompte.php");

// >

// < PROJET

    include("projet_moncompte.php");

// >

echo "</div>";

?>

<br/><br/><br/><br/><br/>