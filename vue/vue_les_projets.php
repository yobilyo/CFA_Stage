
<h2> Liste des projets </h2>
<div class='container'>
	<table class="table table-striped">
		<thead>
			<tr> 
				<td> Id Projet </td>
				<td> Description </td> <td> Date Lancement </td>
				<td> Pays </td> <td> Ville </td>
				<td> Budget </td> <td> Somme Collectée </td>
				<td> Id Utilisateur </td> <td> Id Association </td> 
				<?php
				if (isset($_SESSION['droits']) && $_SESSION['droits'] =="administrateur")
					{
				echo "<td> Opérations </td>";
				}
				?>	
				
			</tr>
		</thead>
		<tbody>
		<?php 
		foreach ($lesProjets as $unProjet) {
			echo "<tr> 
					<td>".$unProjet['id']." </td>
					<td>".$unProjet['description']." </td>
					<td>".$unProjet['date_lancement']." </td>
					<td>".$unProjet['pays']." </td>
					<td>".$unProjet['ville']." </td>
					<td>".$unProjet['budget']." </td>
					<td>".$unProjet['somme_collecte']." </td>
					<td>".$unProjet['id_utilisateur']."
					<td>".$unProjet['id_association']." </td>" ;
				 

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
		<tbody>
	</table>
</div>
