<?php
    // pour se connecter, on affiche le formulaire de connexion
    require_once("vue/vue_connexion.php");
    var_dump($_POST);

    // lorsqu'on clique sur le bouton se connecter, on teste les infos de connexion dans la table utilisateur, et si cet utilisateur existe bien dans notre base de données sql on se connecte et on entre ses informations dans la $_SESSION
    if (isset($_POST['seconnecter'])) {
        $unControleur->setTable ("utilisateur");
        $tab=array("email"=>$_POST['email'], "mdp"=>$_POST['mdp']); 
        $membreConnecte = $unControleur->selectWhere ($tab);

        if ($membreConnecte == null || $membreConnecte == false )
        {
            echo "<br /> Erreur de connexion, Veuillez vérifier vos identifiants";

        } else if (isset($membreConnecte['email'])){
            $_SESSION['id'] = $membreConnecte['id'];
            $_SESSION['nom'] = $membreConnecte['nom'];
            $_SESSION['prenom'] = $membreConnecte['prenom'];
            $_SESSION['civilite'] = $membreConnecte['civilite'];
            $_SESSION['date_naissance'] = $membreConnecte['date_naissance'];
            $_SESSION['droits'] = $membreConnecte['droits'];
            $_SESSION['email'] = $membreConnecte['email'];
            $_SESSION['emailValide'] = $membreConnecte['emailValide'];
            $_SESSION['mdp'] = $membreConnecte['mdp']; 
            $_SESSION['tel'] = $membreConnecte['tel']; 
            $_SESSION['adresse'] = $membreConnecte['adresse'];
            $_SESSION['codePostal'] = $membreConnecte['codePostal'];
            $_SESSION['ville'] = $membreConnecte['ville'];
            $_SESSION['pays'] = $membreConnecte['pays'];
            $_SESSION['photo_profil'] = $membreConnecte['photo_profil']; 

            // maintenant que l'utilisateur est connecté, on rafraichît la page d'index qui n'affichera plus le formulaire de connexion, mais l'accueil
            header("Location: index.php");
        }

    }
?>



  