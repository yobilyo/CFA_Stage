<?php

if ($_SESSION['droits'] == "administrateur") 
{
    echo "<h3 class='h3_monCompte'>Mes Projets</h3>";
        
    if(!empty($lesProjets))
    {
        echo "<div class='container'>
        <table class='table table-striped'>
            <thead>
                <tr> 
                    <th class='police-tableau'>Id</th>
                    <th class='police-tableau'>Nom</th>
                    <th class='police-tableau'>Lancement</th>
                    <th class='police-tableau'>Pays</th> 
                    <th class='police-tableau'>Ville</th>
                    <th class='police-tableau'>Budget</th> 
                    <th class='police-tableau'>Somme Collectée</th>
                </tr>

            </thead>
            <tbody>";
                
                foreach ($lesProjets as $unProjet) 
                {
                    echo //<td>".$unProjet['somme_collecte']." </td>
                        "<tr> 
                            <td class='police-tableau'>".$unProjet['id']." </td>
                            <td class='police-tableau'>".$unProjet['nom']." </td>
                            <td class='police-tableau'>".$unProjet['date_lancement']." </td>
                            <td class='police-tableau'>".$unProjet['pays']." </td>
                            <td class='police-tableau'>".$unProjet['ville']." </td>
                            <td class='police-tableau'>".$unProjet['budget']." </td>
                            <td class='police-tableau'>".$unProjet['somme_collecte']." </td>
                    </tr>";
                }
                
                echo"<tbody>
            </table>
        </div>";
    }
    else 
    {
        echo"<p>Vous n'avez pas créer de projet.</p>";
    }
}
?>