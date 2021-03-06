<?php
    if (!isset($_SESSION['email']) || $_SESSION['droits'] != "administrateur") {
        echo "ERREUR 404, page non identifiée ";
    } else {
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
                        // avant de pouvoir supprimer un utilisateur, il faut supprimer toutes les                      // les clés étrangères id_utilisateur dans 
                        /*$unControleur->setTable ("participer");
                        $tab=array("id_utilisateur"=>$id_utilisateur); 
                        $unControleur->delete($tab);*/

                        // id_utilisateur est aussi stockée dans la table commentaire
                        /*$unControleur->setTable ("commentaire");
                        $tab=array("id_utilisateur"=>$id_utilisateur); 
                        $unControleur->delete($tab);*/

                        // puis on peut supprimer l'utilisateur
                        $unControleur->setTable ("utilisateur");
                        $tab=array("id"=>$id_utilisateur); 
                        $unControleur->delete($tab);

                        // refresh de la page en PHP
                        //header("index.php?page=42");
                        
                        break;
                case "edit" : 
                        $unControleur->setTable ("utilisateur");
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

            $tab=array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "civilite"=>$_POST['civilite'],
                "date_naissance"=>$_POST['date_naissance'],
                "droits"=>$_POST['droits'],
                "email"=>$_POST['email'],
                "mdp"=>$_POST['mdp'],
                "adresse"=>$_POST['adresse'],
                "codePostal"=>$_POST['codePostal'],
                "ville"=>$_POST['ville'],
                "pays"=>$_POST['pays'],
                "photo_profil"=>$_POST['photo_profil']
            );
            $unControleur->setTable ("utilisateur");
            $where =array("id"=>$id_utilisateur);

            $unControleur->update($tab, $where);
            // erreur, ligne non nécessaire
            //header("Location: index.php?page=42");
        }

        if (isset($_POST['valider'])){
            //var_dump($_POST);
            $unControleur->setTable ("utilisateur");
            $tab=array(
                "nom"=>$_POST['nom'],
                "prenom"=>$_POST['prenom'],
                "civilite"=>$_POST['civilite'],
                "date_naissance"=>$_POST['date_naissance'],
                "droits"=>$_POST['droits'],
                "email"=>$_POST['email'],
                "mdp"=>$_POST['mdp'],
                "adresse"=>$_POST['adresse'],
                "codePostal"=>$_POST['codePostal'],
                "ville"=>$_POST['ville'],
                "pays"=>$_POST['pays'],
                "photo_profil"=>$_POST['photo_profil']
            );
            $unControleur->insert($tab);
            //header("Location: index.php?page=42");
        }


        /*} else if (isset($_SESSION['droits']) && $_SESSION['droits'] =="utilisateur")*/
        //{

            // actualisation des utilisateurs
            // il faut le faire juste avant le require_once vue_utilisateur.php,
            // pour bien afficher ces modifications sans avoir besoin d'utiliser de header
            // ni de refresh manuellement la page
            $unControleur->setTable ("utilisateur");
            $tab=array("*");
            $lesUtilisateurs = $unControleur->selectAll ($tab);
            echo "<br/><h2> Modification des utilisateurs</h2>";
            require_once("vue/vue_utilisateur.php"); 
        //}
        
    /*}
    // Modification du compte de la part de l'utilisateur
    else if($_SESSION['droits'] == "membre"){
        $unUtilisateur = null; 
        if (isset($_GET['action']) && isset($_GET['id']))  {
            $id_utilisateur = $_GET['id']; 
            $action = $_GET['action'];
            switch ($action){
                case "edit" : 
                    $unControleur->setTable ("utilisateur");
                    $tab=array("id"=>$id_utilisateur); 
                    $unUtilisateur = $unControleur->selectWhere ($tab);

                    // refresh de la page en PHP
                    //header("index.php?page=42");
                    break; 
                
            }

            $unControleur->setTable("utilisateur");
            $unUtilisateur = $unControleur->selectWhere($id_utilisateur);
            echo "<br/><h2>Modification de l'utilisateur</h2>";
            require_once("vue/vue_utilisateur.php");    
        }
    }*/
    }
?>
