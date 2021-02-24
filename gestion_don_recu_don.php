<?php
    if (!isset($_SESSION['email'])) {
        echo "ERREUR 404, page non identifiée ";
    } else {
        //print_r($_GET);
        if (!isset($_GET['iddon'])) {
            echo "ERREUR: référence de don non renseignée, impossible de générer un reçu de don.";
            print_r($_GET);
        } else {
            $monDon = null;

            $unControleur->setTable ("recu_don");
            $where = array("id_Don", $_GET['iddon']);
            $monDon = $unControleur->selectWhere($where);
            // SELECT * from recu_don where id_Don = $_GET['iddon'];

            //print_r($monDon);

            if ($monDon != null) {
                if ($monDon['id_Utilisateur'] == $_SESSION['id'] || $_SESSION['droits'] == 'administrateur') {
                    // les admins ont le droit d'accéder et de générer des dons pour tous les utilisateurs

                    echo "<div>Infos Association</div>";
                    echo "<img src='".$monDon['photo_profil']."' width='200'></img>";
                    echo "<div>Référence de l'association : ".$monDon['id_Association']."</div>";
                    echo "<div>Libelle : ".$monDon['libelle']."</div>";
                    echo "<div>Nombre de projets : ".$monDon['nbprojets']."</div>";
                    echo "<br/>";

                    // on imprime les infos du don et du donateur sous forme de reçu
                    echo "<div>Infos Donateur</div>";
                    echo "<br/>";
                    echo "<div>Référence Donateur : ".$monDon['id_Utilisateur']."</div>";
                    echo "<div>Nom : ".$monDon['nom_Utilisateur']."</div>";
                    echo "<div>Nom : ".$monDon['prenom']."</div>";
                    echo "<div>Email : ".$monDon['email']."</div>";
                    echo "<br/><br/>";

                    echo "<div>Infos Don</div>";
                    echo "<br/>";
                    echo "<div>Référence du don : ".$monDon['id_Don']."</div>";
                    echo "<div>Montant du don : ".$monDon['montant']."</div>";
                    echo "<div>Date du don : ".$monDon['dateDon']."</div>";
                    echo "<div>Appréciation : ".$monDon['appreciation']."</div>";
                    echo "<div>Statut de validation du don : ".$monDon['statut']."</div>";
                    echo "<br/><br/>";

                    echo "<div>Infos Projet de ce don</div>";
                    echo "<img src='".$monDon['adresse_Image']."' width='120'></img>
                    <br/>";
                    echo "<br/>";
                    echo "<div>Référence Projet : ".$monDon['id_Projet']."</div>";
                    echo "<div>Nom : ".$monDon['nom_Projet']."</div>";
                    echo "<div>Description : ".$monDon['description']."</div>";
                    echo "<div>Date de Lancement : ".$monDon['date_lancement']."</div>";
                    echo "<div>Pays : ".$monDon['pays']."</div>";
                    echo "<div>Ville : ".$monDon['ville']."</div>";
                    echo "<div>Budget : ".$monDon['budget']."</div>";
                    echo "<div>Somme collectée : ".$monDon['somme_collecte']." €</div>";
                    echo "<br/><br/>";

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
