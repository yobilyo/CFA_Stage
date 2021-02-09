<div class='container'>
	<table class="table table-striped">
		<thead>
			<tr> 
				<th> Id Projet </th>
				<th> Nom </th>
				<th> Description </th> <th> Date Lancement </th>
				<th> Pays </th> <th> Ville </th>
				<th> Budget </th> <th> Somme Collectée </th>
				<th> Id Utilisateur </th> <th> Id Association </th> 
				<?php
				if (isset($_SESSION['droits']) && $_SESSION['droits'] =="administrateur")
					{
				echo "<th> Opérations </th>";
				}
				?>	
				
			</tr>
		</thead>
		<tbody>
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
					<td>".$unProjet['id_Utilisateur']."
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
		<tbody>
	</table>
</div>