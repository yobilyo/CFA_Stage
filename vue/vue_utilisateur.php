<div class='container'>
<?php 
	//if($_SESSION['droits'] == "administrateur"){
		echo"<table class='table table-striped'>
			<thead>
				<tr> 
					<th> Id </th>
					<th> Nom </th>
					<th> Prenom</th>
					<th> Civilité</th>
					<th> Date de naissance</th>
					<th> Téléphone</th>
					<th> Droits</th>
					<th> Email</th>
					<th> Email valide</th>
					<th> Mdp</th> 
					<th> Adresse</th>
					<th> Code Postal</th>
					<th> Ville</th>
					<th> Pays</th>
					<th> Photo de Profil (URL) </th>
					<th> Operations </th>
				</tr>
			</thead>";

		echo "<tbody>";
			
				
		//print_r($lesUtilisateurs);
		foreach ($lesUtilisateurs as $unUtilisateur) {
			echo"
			<tr> 
				<td>".$unUtilisateur['id']." </td>
				<td>".$unUtilisateur['nom']." </td>
				<td>".$unUtilisateur['prenom']." </td>
				<td>".$unUtilisateur['civilite']." </td>
				<td>".$unUtilisateur['date_naissance']." </td>
				<td>".$unUtilisateur['tel']." </td>
				<td>".$unUtilisateur['droits']." </td>
				<td>".$unUtilisateur['email']." </td>
				<td>".$unUtilisateur['emailValide']." </td>
				<td>".$unUtilisateur['mdp']." </td>
				<td>".$unUtilisateur['adresse']." </td>
				<td>".$unUtilisateur['codePostal']." </td>
				<td>".$unUtilisateur['ville']." </td>
				<td>".$unUtilisateur['pays']." </td>
				<td>".
					"<img src='".$unUtilisateur['photo_profil']."' class='rounded' width='50' />
				</td>
				<td>
					<a href='index.php?page=2&action=sup&id=".$unUtilisateur['id']."'>
						<img src ='lib/images/sup.png' height='30' witdh='30'>
					</a>
					<a href='index.php?page=2&action=edit&id=".$unUtilisateur['id']."'>
						<img src ='lib/images/edition.png' height='30' witdh='30'>
					</a>
				</td>
			</tr>";	
		}		
					
	/*}
	else if($_SESSION['droits'] == "membre"){
	
		echo"<img src='".$unUtilisateur['photo_profil']."' class='rounded mx-auto d-block' />";
	}
			*/?>
			
		</tbody>

	</table>
</div>
