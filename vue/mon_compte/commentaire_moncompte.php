<?php

echo "<h3 class='h3_monCompte'>Mes Commentaires</h3>";

if (!empty( $lesCommentaires))
{
    echo "<div class='container'>
        <table class='table table-striped'>
            <thead>
                <tr> 
                    <th class='police-tableau'>Date/heure</th>
                    <th class='police-tableau'>Contenu</th>
                    <th class='police-tableau'>Note</th>
                    <th class='police-tableau'>Commenté sur le projet</th>		
                </tr>

            </thead>
            <tbody>";
                    
            foreach ($lesCommentaires as $unCommentaire) 
            {
                echo "<tr> 
                    <td class='police-tableau'>".$unCommentaire['dateCom']." </td>
                    <td class='police-tableau'>".$unCommentaire['contenu']." </td>
                    <td class='police-tableau'>".$unCommentaire['note']." </td>
                    <td class='police-tableau'>".$unCommentaire['nom_projet']." </td>
                    </tr>";
                }

            echo"</tbody>
        </table>
    </div>";
}
else 
{
    echo "<p>Vous n'avez publié aucun commentaire.</p>";
}



?>