<?php
    if (!isset($_SESSION['email'])) {
        echo "ERREUR 404, page non identifiée ";
    } else if ($_SESSION['droits'] == "administrateur") {
        echo "
        <img src='lib/images/pages/don.png' width='200'></img>
        <br/>";
        
        $unControleur->setTable ("don");
        $tab=array("*");
        $lesDons = $unControleur->selectAll ($tab);

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

        $unControleur->setTable ("don");



        $unDon = null; 

        /*$uneTresorerie = null;
        $unControleur->setTable ("tresorerie");
        $tab=array("*");
        $lesTresoreries = $unControleur->selectAll ($tab);*/

        if (isset($_GET['action']) && isset($_GET['id']))  {
            $id_don = $_GET['id']; 
            $action = $_GET['action'];

            switch ($action){
                case "sup" : 
                        // avant de pouvoir supprimer un don, il faut supprimer toutes les                      // les clés étrangères id_don dans 
                        /*$unControleur->setTable ("participer");
                        $tab=array("id_don"=>$id_don); 
                        $unControleur->delete($tab);*/
                        
                        // id_don est aussi stockée dans la table commentaire
                        /*$unControleur->setTable ("commentaire");
                        $tab=array("id_don"=>$id_don); 
                        $unControleur->delete($tab);*/

                        // puis on peut supprimer l'don
                        $unControleur->setTable ("don");
                        $tab=array("id"=>$id_don); 
                        $unControleur->delete($tab);

                        // refresh de la page en PHP
                        //header("index.php?page=42");
                        
                        break;
                case "edit" : 
                        $unControleur->setTable ("don");
                        $tab=array("id"=>$id_don); 
                        $unDon = $unControleur->selectWhere ($tab);

                        // refresh de la page en PHP
                        //header("index.php?page=42");
                        break; 
            }
        }

        require_once("vue/vue_insert_don.php"); 


        if (isset($_POST['modifier'])){
            //var_dump($_POST);

            $tab=array("montant"=>$_POST['montant'],
                        "dateDon"=>$_POST['dateDon'],
                        "appreciation"=>$_POST['appreciation'],
                        "statut"=>$_POST['statut'],
                        "id_Utilisateur"=>$_POST['id_Utilisateur'],
                        "id_Projet"=>$_POST['id_Projet'],
                        "id_Mode_de_paiement"=>$_POST['id_Mode_de_paiement'],
                        "id_Association"=>1 
                    );
            $unControleur->setTable ("don");
            $where =array("id"=>$id_don);

            $unControleur->update($tab, $where);
            // erreur, ligne non nécessaire
            //header("Location: index.php?page=42");
        }

        if (isset($_POST['valider'])){
            //var_dump($_POST);
            $unControleur->setTable ("don");
            $tab=array("montant"=>$_POST['montant'],
                        "dateDon"=>$_POST['dateDon'],
                        "appreciation"=>$_POST['appreciation'],
                        "statut"=>$_POST['statut'],
                        "id_Utilisateur"=>$_POST['id_Utilisateur'],
                        "id_Projet"=>$_POST['id_Projet'],
                        "id_Mode_de_paiement"=>$_POST['id_Mode_de_paiement'],
                        "id_Association"=>1 
                    );
            $unControleur->insert($tab);
            //header("Location: index.php?page=42");
        }


        /*} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="don")*/
        //{

            // actualisation des dons
            // il faut le faire juste avant le require_once vue_don.php,
            // pour bien afficher ces modifications sans avoir besoin d'utiliser de header
            // ni de refresh manuellement la page
            $unControleur->setTable ("don");
            $tab=array("*");
            $lesDons = $unControleur->selectAll ($tab);
            echo "<br/><h2>Liste des dons</h2>";  

            require_once("vue/vue_don.php"); 
        //}
    }
?>
