<?php
    if (!isset($_POST['sinscrire'])){
        // pour s'inscrire, on affiche le formulaire d'inscription
        require_once("vue/vue_inscription.php");
    } else {
        // lorsqu'on clique sur le bouton s'inscrire, on insère ces informations dans la table user
        
        // insertion de l'utilisateur
        $droits = "utilisateur";
        $tabUtilisateur=array(
            // pas besoin de l'idutilisateur pour un INSERT (null par défaut)
            // et pas besoin non plus pour l'update, car c'est un UPDATE username,email,... WHERE idutilisateur est stocké dans le $where
            "nom"=>$_POST['nom'],
            "prenom"=>$_POST['prenom'],
            "droits"=>$droits,
            "email"=>$_POST['email'],
            "mdp"=>$_POST['mdp'],
            "photo_profil"=>$_POST['photo_profil']
        );
        $unControleur->setTable ("user");
        $unControleur->insert($tabUtilisateur);

        // une fois qu'on est inscrit, on revient à l'index pour se connecter (donc on enlève le get page = 001 de la page d'inscription)
        header('Location: index.php');
    }

?>