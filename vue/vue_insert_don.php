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
					<option value='en_attente'>En attente</option>
					<option value='annule'>Annulé</option>
					<option value='valide'>Validé</option>
				</select>
			</td>
		</tr>
		<tr> 
			<td> Id Utilisateur : </td> 
			<td> <select class="form-control form-control-sm" name ="id_Utilisateur">
					 <?php
					 	foreach ($lesUsers as $unUser) {
					 		echo "<option value ='".$unUser['id']."'>".$unUser['nom']."  ".$unUser['prenom']."</option>";
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
					 		echo "<option value ='".$unProjet['id']."'>".$unProjet['nom']."  ".$unProjet['date_lancement']."</option>";
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
					 		echo "<option value ='".$unModeDePaiement['id']."'>".$unModeDePaiement['mode']."  "."</option>";
					 	}
					 ?>
				</select>
			</td>
		</tr>

		<tr> 
			<td> Association : </td> 
			<td> <select  class="form-control" name ="id_Association">
					 <?php
					 	foreach ($lesAssociations as $uneAssociation) {
					 		echo "<option value ='".$uneAssociation['id']."'>".$uneAssociation['libelle']."  "."</option>";
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