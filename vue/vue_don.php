<div class='container'>
	<table class="table table-striped">
		<thead>
			<tr> 
				<th> Id </th>
				<th> montant </th>
                <th> Date du Don</th>
				<th> Appreciation</th>
                <th> statut</th>
                <th> Id du donateur</th> 
				<th> Id du Projet </th>
                <th> Id du Mode de paiement </th>
                <th> Id de l'association </th>
				<th>Operations</th>
			</tr>
		</thead>

		<tbody>
            <?php 
            print_r($lesDons);
			foreach ($lesDons as $unDon) {
				echo "<tr> 
						<td>".$unDon['id']." </td>
						<td>".$unDon['montant']." </td>
                        <td>".
                        $unDon['dateDon']." </td>
                        <td>".
                        $unDon['appreciation']." </td>
                        <td>".
                        $unDon['statut']." </td>
                        <td>".
                        $unDon['id_Utilisateur']." </td>
                        <td>".
                        $unDon['id_Projet']." </td>
                        <td>".
                        $unDon['id_Mode_de_paiement']." </td>
                        <td>".
                        $unDon['id_Association']." </td>
                        
						<td>
							<a href='index.php?page=37&action=sup&id=".$unDon['id']."'>
							<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

							<a href='index.php?page=37&action=edit&id=".$unDon['id']."'>
							<img src ='lib/images/edition.png' height='30' witdh='30'> </a>

							</td>
					</tr>";
			}
			?>
		</tbody>

	</table>
</div>
