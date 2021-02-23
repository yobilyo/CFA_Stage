<?php
    if (!isset($_SESSION['email'])) {
        echo "ERREUR 404, page non identifiée ";
    } else {
        echo "<br/>
        <img src='lib/images/pages/faire-don-asso.png' width='200'></img>
        <br/>";

        $unControleur->setTable ("Projet");
        $tab=array("*");
        $lesProjets = $unControleur->selectAll ($tab); 

        $unControleur->setTable ("Utilisateur");
        $tab=array("*");
        $lesUsers = $unControleur->selectAll ($tab);

        $unControleur->setTable ("Mode_de_paiement");
        $tab=array("*");
        $lesModesdePaiements = $unControleur->selectAll ($tab);

        $unControleur->setTable ("Association");
        $tab=array("*");
        $lesAssociations = $unControleur->selectAll ($tab);

        $unDon = null; 

        require_once("vue/vue_insert_don_faire_un_don.php"); 

        // pour l'instant seulement disponible pour les utilisateurs déjà authentifiés/connectés (pas de don anonyme):
        if (isset($_POST['validerfairedon'])){
            //var_dump($_POST);
            $unControleur->setTable ("don");
            $tab=array(
                "montant"=>$_POST['montant'],
                "dateDon"=>$date,
                "appreciation"=>$_POST['appreciation'],
                "statut"=>$statut,
                "id_Utilisateur"=>$_SESSION['id'], // session pas post
                "id_Projet"=>$_POST['id_Projet'],
                "id_Mode_de_paiement"=>$_POST['id_Mode_de_paiement'],
                "id_Association"=>$_POST['id_Association']  
            );
            $unControleur->insert($tab);

            // après que le don soit fait avec succès, récupéaration de l'id du don
            // et aller vers la page de génération d'un reçu
            $unControleur->setTable ("don");
            $where = array(
                "montant"=>$_POST['montant'],
                "dateDon"=>$date,
                "appreciation"=>$_POST['appreciation'],
                "statut"=>$statut,
                "id_Utilisateur"=>$_SESSION['id'], // session pas post
                "id_Projet"=>$_POST['id_Projet'],
                "id_Mode_de_paiement"=>$_POST['id_Mode_de_paiement'],
                "id_Association"=>$_POST['id_Association']  
            );
            $monDon = $unControleur->selectWhere($where);

            $idDon = $monDon['id']; // id du don inséré obtenu par un selectWhere

            // transférer l'id du don dans le $GET
            echo "<div>Don fait avec succès !</div>
            <br/>
            <a src='index.php?page=42&iddon=".$idDon."'>Cliquez ici pour télécharger un reçu de votre don</a>";
        }
    }
?>
