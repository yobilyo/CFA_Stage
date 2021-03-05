<?php
    // en global qu'on soit connecté ou non
    $unControleur->setTable ("Projet");
    $tab=array("*");
    $lesProjets = $unControleur->selectAll ($tab); 

    $unControleur->setTable ("Mode_de_paiement");
    $tab=array("*");
    $lesModesdePaiements = $unControleur->selectAll ($tab);

    $unDon = null; 

    require_once("vue/vue_insert_don_faire_un_don.php"); 

?>
