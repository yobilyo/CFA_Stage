<?php
    if (!isset($_SESSION['email'])) {
        echo "ERREUR 404, page non identifiée ";
    } else if ($_SESSION['droits'] == "administrateur") {
        echo "<br/>
        <img src='lib/images/pages/utilisateur.png' width='200'></img>
        <br/>";

        $unUtilisateur = null; 

        /*$uneTresorerie = null;
        $unControleur->setTable ("tresorerie");
        $tab=array("*");
        $lesTresoreries = $unControleur->selectAll ($tab);*/

        if (isset($_GET['action']) && isset($_GET['id']))  {
            $id_utilisateur = $_GET['id']; 
            $action = $_GET['action'];

            switch ($action){
                case "sup" : 
                        // avant de pouvoir supprimer une utilisateur, il faut supprimer toutes les participants à cette utilisateur
                        // les clés étrangères id_utilisateur dans la table participer ne peuvent pas devenir orphelines ce qui bloque la suppression d'une utilisateur
                        // DELETE from participer WHERE id_utilisateur = $id_utilisateur
                        /*$unControleur->setTable ("participer");
                        $tab=array("id_utilisateur"=>$id_utilisateur); 
                        $unControleur->delete($tab);*/

                        // id_utilisateur est aussi stockée dans la table commentaire
                        /*$unControleur->setTable ("commentaire");
                        $tab=array("id_utilisateur"=>$id_utilisateur); 
                        $unControleur->delete($tab);*/

                        // puis on peut supprimer l'utilisateur
                        $unControleur->setTable ("user");
                        $tab=array("id"=>$id_utilisateur); 
                        $unControleur->delete($tab);

                        // refresh de la page en PHP
                        //header("index.php?page=42");
                        
                        break;
                case "edit" : 
                        $unControleur->setTable ("user");
                        $tab=array("id"=>$id_utilisateur); 
                        $unUtilisateur = $unControleur->selectWhere ($tab);

                        // refresh de la page en PHP
                        //header("index.php?page=42");
                        break; 
            }
        }

        require_once("vue/vue_insert_utilisateur.php"); 


        if (isset($_POST['modifier'])){
            //var_dump($_POST);

            $tab=array("id"=>$_POST['id'],
                        "nom"=>$_POST['nom'],
                        "prenom"=>$_POST['prenom'],
                        "droits"=>$_POST['droits'],
                        "email"=>$_POST['email'],
                        "mdp"=>$_POST['mdp'],
                        "photo_profil"=>$_POST['photo_profil']);
            $unControleur->setTable ("user");
            $where =array("id"=>$id_utilisateur);

            $unControleur->update($tab, $where);
            // erreur, ligne non nécessaire
            //header("Location: index.php?page=42");
        }

        if (isset($_POST['valider'])){
            //var_dump($_POST);
            $unControleur->setTable ("user");
            $tab=array("id"=>$_POST['id'],
                        "nom"=>$_POST['nom'],
                        "prenom"=>$_POST['prenom'],
                        "droits"=>$_POST['droits'],
                        "email"=>$_POST['email'],
                        "mdp"=>$_POST['mdp'],
                        "photo_profil"=>$_POST['photo_profil']);
            $unControleur->insert($tab);
            //header("Location: index.php?page=42");
        }


        /*} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="user")*/
        //{

            // actualisation des utilisateurs
            // il faut le faire juste avant le require_once vue_utilisateur.php,
            // pour bien afficher ces modifications sans avoir besoin d'utiliser de header
            // ni de refresh manuellement la page
            $unControleur->setTable ("user");
            $tab=array("*");
            $lesUtilisateurs = $unControleur->selectAll ($tab);
            echo "<br/><h2> Modification des utilisateurs</h2>";
            require_once("vue/vue_utilisateur.php"); 
        //}
    }
?>
