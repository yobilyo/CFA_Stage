
<div class='container'>
	<table class="table table-striped">
		<thead>
			<tr> 
				<th>Id</th>
				<th>Date et heure</th>
				<th>Contenu</th>
				<th>Note</th>
				<th>Id Utilisateur</th> 
				<th>Id Projet</th> 
				<th> Opérations </th>			
			</tr>

		</thead>

		<tbody>
			<?php 
				foreach ($lesCommentaires as $unCommentaire) 
				{
					echo "<tr> 
							<td>".$unCommentaire['id']." </td>
							<td>".$unCommentaire['dateCom']." </td>
							<td>".$unCommentaire['contenu']." </td>
							<td>".$unCommentaire['note']." </td>
							<td>".$unCommentaire['id_Utilisateur']." </td>
							<td>".$unCommentaire['id_Projet']." </td>
							
							<td>
							<a href='index.php?page=5&action=sup&id=".$unCommentaire['id']."'>
							<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

							<a href='index.php?page=5&action=edit&id=".$unCommentaire['id']."'>
							<img src ='lib/images/edition.png' height='30' witdh='30'> </a>

							</td>

						</tr>";
				}
			?>
		</tbody>
	</table>
</div>