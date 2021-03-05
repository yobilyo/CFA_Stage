<?php
    if (isset($_GET['iddon'])) {
        echo "
        <img src='lib/images/pages/don-merci.jpg' width='300'></img>
        <br/><br/><br/><br/>
        <div>Don fait avec succès !</div>
        <a href='index.php?page=42&iddon=".$_GET['iddon']."'>
            <img src='lib/images/ddl-txt.png' width = '80'></img>Cliquez ici pour télécharger un reçu de votre don
        </a>";
    } else {
        echo "erreur lors de la transaction, opération annulée.";
    }
?>
