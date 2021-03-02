<h2> Ajout d'un don </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td>  Montant : </td> 
			<td> <input type="text" class="form-control" name="montant" value ="<?php echo ($unDon!=null) ? $unDon['montant']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Date du Don : </td> 
			<td> <input type="date" class="form-control" name="dateDon" value ="<?php echo ($unDon!=null) ? $unDon['dateDon']:""; ?>" ></td>
		</tr>
		<tr> 
			<td> Appreciation : </td> 
			<td> <input type="text" class="form-control" name="appreciation" value ="<?php echo ($unDon!=null) ? $unDon['appreciation']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Statut : </td> 
			<td> <select class="form-control form-control-sm" name ="statut">
					<?php
						$lesStatuts = array("valide", "en_attente", "annule");
						foreach ($lesStatuts as $unStatut) {
							// sélection du statut égal à celui du don actuel

							$selected = "";
							if ($unStatut == $unDon['statut']) {
								$selected = " selected";
							} else {
								$selected = " ";
							}
							echo "<option value ='".$unStatut."' ".$selected.">".$unStatut."</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr> 
			<td> Id Utilisateur : </td> 
			<td> <select class="form-control form-control-sm" name ="id_Utilisateur">
					<?php
					 	foreach ($lesUsers as $unUser) {
							// sélection de l'utilisateur correspondant au don actuel
							$selected = "";
							if ($unUser['id'] == $unDon['id_Utilisateur']) {
								$selected = " selected";
							} else {
								$selected = " ";
							}
					 		echo "<option value ='".$unUser['id']."' ".$selected.">".$unUser['nom']."  ".$unUser['prenom']."</option>";
					 	}
					?>
				</select>
			</td>
		</tr>
						
		<tr> 
			<td> Le projet : </td> 
			<td> <select  class="form-control" name ="id_Projet">
					<?php
					 	foreach ($lesProjets as $unProjet) {
							// sélection du projet correspondant au don actuel
							$selected = "";
							if ($unProjet['id'] == $unDon['id_Projet']) {
								$selected = " selected";
							} else {
								$selected = " ";
							}
					 		echo "<option value ='".$unProjet['id']."' ".$selected.">".$unProjet['nom']."  ".$unProjet['date_lancement']."</option>";
					 	}
					?>
				</select>
			</td>
		</tr>

	    <tr> 
			<td> Mode de paiement : </td> 
			<td> <select  class="form-control" name ="id_Mode_de_paiement">
					<?php
					 	foreach ($lesModesdePaiements as $unModeDePaiement) {
							// sélection du mode de paiement correspondant au don actuel
							$selected = "";
							if ($unModeDePaiement['id'] == $unDon['id_Mode_de_paiement']) {
								$selected = " selected";
							} else {
								$selected = " ";
							}
					 		echo "<option value ='".$unModeDePaiement['id']."' ".$selected.">".$unModeDePaiement['mode']."  "."</option>";
					 	}
					?>
				</select>
			</td>
		</tr>


        <!-- Id don caché envoyé dans le formulaire aussi -->
		<?php echo ($unDon!=null) ? "<input type='hidden' name='id' value ='".$unDon['id']."'>" : ""; ?>


		<td>  <input type="reset" class='btn btn-dark' name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($unDon!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " : " class='btn btn-dark' name='valider' value='Valider' "; ?> 
			>
		</tr>
	</table>
</form>