<?php
    if (isset($_SESSION['droits']) && $_SESSION['droits'] != "autre") {
        // pour vue_salarie.php
        // pour afficher les infos salaries
        $unControleur->setTable ("utilisateur");
        $where = array('id' => $_SESSION['id']);
        //pour les salariés on utilise un fetch qui retourne un seul résultat donc on le stock dans une array de arraydeRésultat
        $lUtilisateur = $unControleur->selectWhere ($where);
        // requete:
        // SELECT * from utilisateur where id = $_SESSION['id'];
        $lesUtilisateurs = array($lUtilisateur); //on construit un deuxieme tableau pour le selectAll qui contient le tableau selectWhere

        // pour les participations et les autres tables, on utilise la méthode fetchAll qui retourne un tableau contenant plusieurs tableaux donc on n' a pas besoin de créer un tableau pour contenir les résutats car ils sont déjà dans un tableau
        $unControleur->setTable ("les_projets"); // vue qui auto update la somme des dons
        $where = array('id_Utilisateur' => $_SESSION['id']);
        // requete:
        // SELECT * from projet where id_Utilisateur = $_SESSION['id'];
        $lesProjets = $unControleur->selectWhereAll ($where);
        // pas besoin de cette ligne car on fait un fetchAll qui retourne déjà un tableau de tableaux
        // $les$lesProjets = array($leProjet);

        $unControleur->setTable ("commentaire");
        $where = array('id_Utilisateur' => $_SESSION['id']);
        // requete:
        // SELECT * from commentaire where id_Utilisateur = $_SESSION['id'];
        $lesCommentaires = $unControleur->selectWhereAll ($where);
        // pas besoin de cette ligne car on fait un fetchAll qui retourne déjà un tableau de tableaux
        // $les$lesProjets = array($leProjet); 

        $unControleur->setTable ("don");
        $where = array('id_Utilisateur' => $_SESSION['id']);
        // requete:
        // SELECT * from don where id_Utilisateur = $_SESSION['id'];
        $lesDons = $unControleur->selectWhereAll ($where);
        // pas besoin de cette ligne car on fait un fetchAll qui retourne déjà un tableau de tableaux
        // $les$lesProjets = array($leProjet); 

        /*$unControleur->setTable ("utilisateur_salarie_activite_commentaire");
        $where = array('idutilisateur' => $_SESSION['idutilisateur']);
        $lesCommentaires = $unControleur->selectWhereAll ($where);
        // pas besoin de cette ligne car on fait un fetchAll qui retourne déjà un tableau de tableaux
        //$lesCommentaires = array($leCommentaireSalarie); 
        //
        $unControleur->setTable ("utilisateur_contact");
        $where = array('idutilisateur' => $_SESSION['idutilisateur']);
        $lesContacts = $unControleur->selectWhereAll ($where);
        // pas besoin de cette ligne car on fait un fetchAll qui retourne déjà un tableau de tableaux
        // $lesContacts = array($leContactSalarie);*/

        require_once("vue/vue_moncompte.php");
    }
?>