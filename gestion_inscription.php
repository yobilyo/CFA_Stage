<?php
    if (!isset($_POST['sinscrire'])){
        // pour s'inscrire, on affiche le formulaire d'inscription
        require_once("vue/vue_inscription.php");
    } else {
        // lorsqu'on clique sur le bouton s'inscrire, on insère ces informations dans la table utilisateur
        
        // insertion du membre
        $droits = "membre";
        $tabUtilisateur=array(
            // pas besoin de l'idmembre pour un INSERT (null par défaut)
            // et pas besoin non plus pour l'update, car c'est un UPDATE utilisateurname,email,... WHERE idmembre est stocké dans le $where
            "nom"=>$_POST['nom'],
            "prenom"=>$_POST['prenom'],
            "civilite"=>$_POST['civilite'],
            "date_naissance"=>$_POST['date_naissance'],
            "droits"=>$droits,
            "email"=>$_POST['email'],
            "mdp"=>$_POST['mdp'],
            "adresse"=>$_POST['adresse'],
            "codePostal"=>$_POST['codePostal'],
            "ville"=>$_POST['ville'],
            "pays"=>$_POST['pays'],
            "photo_profil"=>$_POST['photo_profil']
        );
        $unControleur->setTable ("utilisateur");
        $unControleur->insert($tabUtilisateur);

        // une fois qu'on est inscrit, on revient à l'index pour se connecter (donc on enlève le get page = 001 de la page d'inscription)
        header('Location: index.php');
    }

?>