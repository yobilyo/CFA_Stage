<?php

if (isset($_SESSION['droits']) && $_SESSION['droits'] != "autre") 
{
    $unControleur->setTable ("utilisateur");
    $where = array('id' => $_SESSION['id']);
    $unUtilisateur = $unControleur->selectWhere ($where);
    $lesUtilisateurs = array($unUtilisateur); //on construit un deuxieme tableau pour le selectAll qui contient le tableau selectWhere

    $unControleur->setTable ("les_projets"); // vue qui auto update la somme des dons
    $where = array('id_Utilisateur' => $_SESSION['id']);

    $lesProjets = $unControleur->selectWhereAll ($where);

    $unControleur->setTable ("commentaires_et_projets");
    $where = array('id_Utilisateur' => $_SESSION['id']);
    $lesCommentaires = $unControleur->selectWhereAll ($where);


    $unControleur->setTable ("dons_et_projets");
    $where = array('id_Utilisateur' => $_SESSION['id']);
    $lesDons = $unControleur->selectWhereAll ($where);


    require_once("vue/mon_compte/vue_moncompte.php");
}

?>