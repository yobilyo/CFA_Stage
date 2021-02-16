<?php
    if (!isset($_SESSION['email'])) {
        echo "ERREUR 404, page non identifiée ";
    } else {
        echo "<br/>
        <img src='lib/images/resto-du-coeur-logo.jpg' width='400'></img>
        <br/>";

        print_r($_GET);
        if (!isset($_GET['iddon'])) {
            echo "ERREUR: référence de don non renseignée, impossible de générer un reçu de don.";
            print_r($_GET);
        } else {
            $monDon = null;

            $unControleur->setTable ("don");
            $where = array("id", $_GET['iddon']);
            $monDon = $unControleur->selectWhere($where);
            // SELECT * from don where id = $_GET['iddon'];

            print_r($monDon);

            if ($monDon != null) {
                if ($monDon['id_Utilisateur'] == $_SESSION['id'] || $_SESSION['droits'] == 'administrateur') {
                    // les admins ont le droit d'accéder et de générer des dons pour tous les utilisateurs

                    // on récupère les infos de l'utilisateur qui a fait ce don à l'aide de
                    // l'id_Utilisateur du don
                    $unControleur->setTable ("utilisateur");
                    $where = array("id", $monDon['id_Utilisateur']);
                    $lUtilisateurDonateur = $unControleur->selectWhere($where);

                    // on imprime les infos du don et du donateur sous forme de reçu
                    echo "<div>Infos Donateur</div>";
                    echo "<br/>";
                    echo "<div>Référence Donateur : ".$lUtilisateurDonateur['id']."</div>";
                    echo "<div>Nom : ".$lUtilisateurDonateur['nom']."</div>";
                    echo "<div>Nom : ".$lUtilisateurDonateur['prenom']."</div>";
                    echo "<div>Email : ".$lUtilisateurDonateur['email']."</div>";
                    echo "<br/><br/>";

                    echo "<div>Infos Don</div>";
                    echo "<br/>";
                    echo "<div>Référence du don : ".$monDon['id']."</div>";
                    echo "<div>Montant du don : ".$monDon['montant']."</div>";
                    echo "<div>Date du don : ".$monDon['dateDon']."</div>";
                    echo "<div>Appréciation : ".$monDon['appreciation']."</div>";
                    echo "<div>Statut de validation du don : ".$monDon['statut']."</div>";
                    echo "<br/><br/>";

                    // on récupère les infos du projet pour lequel ce don a été fait à l'aide de 
                    // l'id_Projet du don
                    $unControleur->setTable ("projet");
                    $where = array("id", $monDon['id_Projet']);
                    $leProjetRecepteur = $unControleur->selectWhere($where);

                    echo "<div>Infos Projet de ce don</div>";
                    echo "<br/>";
                    echo "<div>Référence Projet : ".$leProjetRecepteur['id']."</div>";
                    echo "<div>Nom : ".$leProjetRecepteur['nom']."</div>";
                    echo "<div>Description : ".$leProjetRecepteur['description']."</div>";
                    echo "<div>Date de Lancement : ".$leProjetRecepteur['date_lancement']."</div>";
                    echo "<div>Pays : ".$leProjetRecepteur['pays']."</div>";
                    echo "<div>Ville : ".$leProjetRecepteur['ville']."</div>";
                    echo "<div>Budget : ".$leProjetRecepteur['budget']."</div>";
                    echo "<div>Somme collectée : ".$leProjetRecepteur['somme_collecte']." €</div>";
                    echo "<br/><br/>";

                    // on récupère les infos de l'association pour laquelle ce don a été fait à l'aide de 
                    // l'id_Association du don
                    $unControleur->setTable ("association");
                    $where = array("id", $monDon['id_Association']);
                    $lAssoReceptrice = $unControleur->selectWhere($where);

                    echo "<div>Infos Association</div>";
                    echo "<br/>";
                    echo "<img src='".$lAssoReceptrice['photo_profil']."' width='100'></img>";
                    echo "<div>Référence de l'association : ".$lAssoReceptrice['id']."</div>";
                    echo "<div>Libelle : ".$lAssoReceptrice['libelle']."</div>";
                    echo "<div>Nombre de projets : ".$lAssoReceptrice['nbprojets']."</div>";
                    echo "<br/>";

                    $dateActuelle = date("d/m/Y");
                    echo "<br/>";
                    echo "<div>Fait à Paris, le ".$dateActuelle."</div>";
                } else {
                    echo "ACCES NON AUTORISE: ce don a été fait par un autre utilisateur, vous n'avez pas le droit d'y accéder.";
                }
            } else {
                echo "ERREUR: référence de don introuvable dans la base de données, impossible de générer un reçu de don.";
                print_r($monDon);
            }       
        }
    }
?>
