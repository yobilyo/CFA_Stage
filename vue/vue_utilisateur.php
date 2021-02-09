<div class='container'>
	<table class="table table-striped">
		<thead>
			<tr> 
				<th> Id </th>
				<th> Nom </th>
                <th> Prenom</th>
				<th> Droits</th>
                <th> Email</th>
                <th> Mdp</th> 
				<th> Photo de Profil (URL) </th>
				<th>Operations</th>
			</tr>
		</thead>

		<tbody>
            <?php 
            print_r($lesUtilisateurs);
			foreach ($lesUtilisateurs as $unUtilisateur) {
				echo "<tr> 
						<td>".$unUtilisateur['id']." </td>
						<td>".$unUtilisateur['nom']." </td>
                        <td>".
                        $unUtilisateur['prenom']." </td>
                        <td>".
                        $unUtilisateur['droits']." </td>
                        <td>".
                        $unUtilisateur['email']." </td>
                        <td>".
                        $unUtilisateur['mdp']." </td>
						<td>".
						"<img src='".$unUtilisateur['photo_profil']."' class='rounded' width='50' /> </td>
						<td>
							<a href='index.php?page=2&action=sup&id=".$unUtilisateur['id']."'>
							<img src ='lib/images/sup.png' height='30' witdh='30'> </a>

							<a href='index.php?page=2&action=edit&id=".$unUtilisateur['id']."'>
							<img src ='lib/images/edition.png' height='30' witdh='30'> </a>

							</td>
					</tr>";
			}
			?>
		</tbody>

	</table>
</div>
