
<div class='container'>
	<table class="table table-striped">
		<thead>
			<tr> 
				<th> Id </th>
				<th> Date </th> <th> Contenu  </th>
				<th> Note </td> <th> Id Utilisateur </th> 
				<th> Id Projet </th> 
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
		foreach ($lesCommentaires as $unCommentaire) {
			echo "<tr> 
					<td>".$unCommentaire['id']." </td>
					<td>".$unCommentaire['date']." </td>
					<td>".$unCommentaire['contenu']." </td>
					<td>".$unCommentaire['note']." </td>
					<td>".$unCommentaire['id_Utilisateur']." </td>
					<td>".$unCommentaire['id_Projet']." </td>" ;

				  	if (isset($_SESSION['droits']) && $_SESSION['droits'] =="administrateur")
					{
					echo "<td>
					<a href='index.php?page=5&action=sup&id=".$unCommentaire['id']."'>
					<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

					<a href='index.php?page=5&action=edit&id=".$unCommentaire['id']."'>
					<img src ='lib/images/edition.png' height='30' witdh='30'> </a>

					</td>"; 
					}

				  echo "</tr>";
		}
		?>
		</tbody>
	</table>
</div>