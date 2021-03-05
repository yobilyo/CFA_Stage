<?php
    if (!isset($_POST['payer'])) {
        echo "ERREUR 404, pas de don posté. ";
    } else {
        //var_dump($_POST);

        // valeurs par défaut codées en dur
        $date = date("Y-m-d");
        $statut = "en_attente";
        $id_Association = 1;

        $id = null;
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
        } else {
            //inscription du nouvel utilisateur au cours du don
            $droits = "membre";
            $photo_profil = "lib/images/photo_profil/anonymous.jpg";

            $unControleur->setTable ("utilisateur");
            $tabUtilisateur=array(
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
                "photo_profil"=>$photo_profil
            );
            $unControleur->insert($tabUtilisateur);

            //récupération de l'idUtilisateur inséré
            $unControleur->setTable ("utilisateur");
            $tab=array("email"=>$_POST['email']); 
            $membreConnecte = $unControleur->selectWhere ($tab);
            $id = $membreConnecte['id'];
            
            // TODO gestion de l'erreur lors de l'inscription
            /*if ($membreConnecte == null) {

            }*/

            //connexion
            $unControleur->setTable ("utilisateur");
            $tab=array("email"=>$_POST['email'], "mdp"=>$_POST['mdp']); 
            $membreConnecte = $unControleur->selectWhere ($tab);
    
            if (isset($membreConnecte['email'])){
                $_SESSION['id'] = $membreConnecte['id'];
                $_SESSION['nom'] = $membreConnecte['nom'];
                $_SESSION['prenom'] = $membreConnecte['prenom'];
                $_SESSION['civilite'] = $membreConnecte['civilite'];
                $_SESSION['date_naissance'] = $membreConnecte['date_naissance'];
                $_SESSION['droits'] = $membreConnecte['droits'];
                $_SESSION['email'] = $membreConnecte['email'];
                $_SESSION['mdp'] = $membreConnecte['mdp']; 
                $_SESSION['adresse'] = $membreConnecte['adresse'];
                $_SESSION['codePostal'] = $membreConnecte['codePostal'];
                $_SESSION['ville'] = $membreConnecte['ville'];
                $_SESSION['pays'] = $membreConnecte['pays'];
                $_SESSION['photo_profil'] = $membreConnecte['photo_profil']; 
            }
        }

        $unControleur->setTable ("don");
        $tab=array(
            "montant"=>$_POST['montant'],
            "dateDon"=>$date,
            "appreciation"=>$_POST['appreciation'],
            "statut"=>$statut,
            "id_Utilisateur"=>$id,
            "id_Projet"=>$_POST['id_Projet'],
            "id_Mode_de_paiement"=>$_POST['id_Mode_de_paiement'],
            "id_Association"=>$id_Association  
        );
        $unControleur->insert($tab);

        // après que le don soit fait avec succès, récupéaration de l'id du don
        // et proposer d'aller vers la page de génération d'un reçu
        $unControleur->setTable ("don");
        $where = array(
            "montant"=>$_POST['montant'],
            "dateDon"=>$date,
            "appreciation"=>$_POST['appreciation'],
            "statut"=>$statut,
            "id_Utilisateur"=>$id,
            "id_Projet"=>$_POST['id_Projet'],
            "id_Mode_de_paiement"=>$_POST['id_Mode_de_paiement'],
            "id_Association"=>$id_Association  
        );
        $monDon = $unControleur->selectWhereLike($where);
        $idDon = $monDon['id']; // id du don inséré obtenu par un selectWhere

        if (isset($monDon) && $monDon['id'] != null) {
            // transférer l'id du don dans le $GET
            header("Location:index.php?page=412&iddon=".$idDon);
        }
    }
?>