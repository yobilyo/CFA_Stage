<center>
<table border = "1">
	<tr> 
			<td> Id Projet </td>
			<td> Description </td> <td> Date Lancement </td>
			<td> Pays </td> <td> Ville </td>
			<td> Budget </td> <td> Somme Collectée </td>
			<td> Id Utilisation </td> <td> Id Association </td>
			<?php
			if (isset($_SESSION['droits']) && $_SESSION['droits'] =="administrateur")
				{
			echo "<td> Opérations </td>";
			}
			?>	
			
	</tr>

	<?php 
	foreach ($lesProjets as $unProjet) {
		echo "<tr> 
				<td>".$unProjet['id']." </td>
				<td>".$unProjet['nom']." </td>
				<td>".$unProjet['description']." </td>
				<td>".$unProjet['date_lancement']." </td>
				<td>".$unProjet['pays']." </td>
				<td>".$unProjet['ville']." </td>
				<td>".$unProjet['budget']." </td>
				<td>".$unProjet['somme_collecte']." </td>
				<td>".$unProjet['id_Utilisateur']." </td>
				<td>".$unProjet['id_Association']." </td>" ;
			 

			 	if (isset($_SESSION['droits']) && $_SESSION['droits'] =="administrateur")
				{
				echo "<td>
				<a href='index.php?page=3&action=sup&id=".$unProjet['id']."'>
				<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

				<a href='index.php?page=3&action=edit&id=".$unProjet['id']."'>
				<img src ='lib/images/edition.png' height='30' witdh='30'> </a>

				</td>"; 
				}

			  echo "</tr>";
	}
	?>

</table>
</center>