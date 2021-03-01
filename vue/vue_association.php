<div class='container'>
	<table class="table table-striped">
		<thead>
			<tr> 
				<th> Id </th>
				<th> Libellé </th>
                <th> Nb Projets</th>
				<th> Budget Projets Total</th>
                <th> Somme Collectée Totale</th>
                <th> Photo Profil (URL)</th>
				<th>Operations</th>
			</tr>
		</thead>

		<tbody>
            <?php 
            //print_r($lesAssociations);
			foreach ($lesAssociations as $uneAssociation) {
				echo "<tr> 
						<td>".$uneAssociation['id']." </td>
						<td>".$uneAssociation['libelle']." </td>
                        <td>".
                        $uneAssociation['nbprojets']." </td>
                        <td>".
                        $uneAssociation['budgetProjetsTot']." </td>
                        <td>".
                        $uneAssociation['sommeCollecteeTot']." </td>
                        <td>".
						"<img src='".$uneAssociation['photo_profil']."' class='rounded' width='50' /> </td>
						<td>
							<a href='index.php?page=6&action=sup&id=".$uneAssociation['id']."'>
							<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

							<a href='index.php?page=6&action=edit&id=".$uneAssociation['id']."'>
							<img src ='lib/images/edition.png' height='30' witdh='30'> </a>

							</td>
					</tr>";
			}
			?>
		</tbody>

	</table>
</div>
