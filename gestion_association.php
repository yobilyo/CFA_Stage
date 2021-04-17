<?php
    if (!isset($_SESSION['email'])) {
        echo "ERREUR 404, page non identifiée ";
    } else if ($_SESSION['droits'] == "administrateur") {
        echo "<br/>
        <img src='lib/images/pages/asso-logo.png' width='200'></img>
        <br/>";

        $uneAssociation = null; 

        /*$uneTresorerie = null;
        $unControleur->setTable ("tresorerie");
        $tab=array("*");
        $lesTresoreries = $unControleur->selectAll ($tab);*/

        if (isset($_GET['action']) && isset($_GET['id']))  {
            $id_association = $_GET['id']; 
            $action = $_GET['action'];

            switch ($action){
                case "sup" : 
                        // avant de pouvoir supprimer une association, il faut supprimer toutes les                      // les clés étrangères id_association dans 
                        /*$unControleur->setTable ("participer");
                        $tab=array("id_association"=>$id_association); 
                        $unControleur->delete($tab);*/

                        // id_association est aussi stockée dans la table commentaire
                        /*$unControleur->setTable ("commentaire");
                        $tab=array("id_association"=>$id_association); 
                        $unControleur->delete($tab);*/

                        // puis on peut supprimer l'association
                        $unControleur->setTable ("association");
                        $tab=array("id"=>$id_association); 
                        $unControleur->delete($tab);

                        // refresh de la page en PHP
                        //header("index.php?page=42");
                        
                        break;
                case "edit" : 
                        $unControleur->setTable ("association");
                        $tab=array("id"=>$id_association); 
                        $uneAssociation = $unControleur->selectWhere ($tab);

                        // refresh de la page en PHP
                        //header("index.php?page=42");
                        break; 
            }
        }

        require_once("vue/vue_insert_association.php"); 


        if (isset($_POST['modifier'])){
            //var_dump($_POST);

            $tab=array(
                "libelle"=>$_POST['libelle'],
                "email"=>$_POST['email'],
                "nbprojets"=>$_POST['nbprojets'],
                "budgetProjetsTot"=>$_POST['budgetProjetsTot'],
                "sommeCollecteeTot"=>$_POST['sommeCollecteeTot'],
                "photo_profil"=>$_POST['photo_profil']
            );
            $unControleur->setTable ("association");
            $where =array("id"=>$id_association);

            $unControleur->update($tab, $where);
            // erreur, ligne non nécessaire
            //header("Location: index.php?page=42");
        }

        if (isset($_POST['valider'])){
            //var_dump($_POST);
            $unControleur->setTable ("association");
            $tab=array(
                "libelle"=>$_POST['libelle'],
                "email"=>$_POST['email'],
                "nbprojets"=>$_POST['nbprojets'],
                "budgetProjetsTot"=>$_POST['budgetProjetsTot'],
                "sommeCollecteeTot"=>$_POST['sommeCollecteeTot'],
                "photo_profil"=>$_POST['photo_profil']
            );
            $unControleur->insert($tab);
            //header("Location: index.php?page=42");
        }


        /*} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="utilisateur")*/
        //{

            // actualisation des associations
            // il faut le faire juste avant le require_once vue_association.php,
            // pour bien afficher ces modifications sans avoir besoin d'utiliser de header
            // ni de refresh manuellement la page
            $unControleur->setTable ("association");
            $tab=array("*");
            $lesAssociations = $unControleur->selectAll ($tab);
            echo "<br/><h2> Modification des Associations</h2>";
            require_once("vue/vue_association.php"); 
        //}
    }
?>
