<?php

echo "<h3 class='h3_monCompte'>Mes Dons</h3>";

if(!empty($lesDons))
{
    echo "<div class='container'>
    <table class='table table-striped'>
        <thead>
            <tr> 
                <th class='police-tableau'>Montant </th>
                <th class='police-tableau'>Date</th>
                <th class='police-tableau'>Appreciation</th>
                <th class='police-tableau'>Statut</th>
                <th class='police-tableau'>Pour le projet </th>
            </tr>
        </thead>

        <tbody>";

        foreach ($lesDons as $unDon) {
            echo "<tr> 
                <td class='police-tableau'>".$unDon['montant']." </td>
                <td class='police-tableau'>".$unDon['dateDon']." </td>
                <td class='police-tableau'>".$unDon['appreciation']." </td>
                <td class='police-tableau'>".$unDon['statut']." </td>
                <td class='police-tableau'>".$unDon['nom_projet']." </td>
            </tr>";
            }
            
            echo"</tbody>
        </table>
    </div>";
}
else 
{
    echo "<p>Vous n'avez fait aucun don.</p>";
}
    
?>