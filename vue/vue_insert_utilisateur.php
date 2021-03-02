<h2> Ajout d'un utilisateur </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td>  Nom : </td> 
			<td> <input type="text" class="form-control" name="nom" value ="<?php echo ($unUtilisateur!=null) ? $unUtilisateur['nom']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Prenom : </td> 
			<td> <input type="text" class="form-control" name="prenom" value ="<?php echo ($unUtilisateur!=null) ? $unUtilisateur['prenom']:""; ?>" ></td>
		</tr>
		<tr> 
			<td> Droits : </td> 
			<!-- $unUtilisateur -->
			<td>
				<select name='droits' class="form-control form-control-sm">
					<?php
						$lesDroits = array("utilisateur", "administrateur");
						foreach ($lesDroits as $unDroit) {
							// sélection du droit égal à celui de l'utilisateur actuel

							$selected = "";
							if ($unDroit == $unUtilisateur['droits']) {
								$selected = " selected";
							} else {
								$selected = " ";
							}
							echo "<option value ='".$unDroit."' ".$selected.">".$unDroit."</option>";
						}
					?>
				</select>
			</td>
		</tr>
        <tr> 
			<td> Email : </td> 
			<td> <input type="text" class="form-control" name="email" value ="<?php echo ($unUtilisateur!=null) ? $unUtilisateur['email']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Mot de passe : </td> 
			<!-- $unUtilisateur -->
			<td> <input type="password" class="form-control" required="required" name="mdp" value ="<?php echo ($unUtilisateur!=null) ? $unUtilisateur['mdp']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Photo de profil (URL) : </td> 
			<td> <input type="text" class="form-control" name="photo_profil" value ="<?php echo ($unUtilisateur!=null) ? $unUtilisateur['photo_profil']:"lib/images/photo_profil/nom_image.jpg"; ?>" ></td>
		</tr>

        <!-- Id utilisateur caché envoyé dans le formulaire aussi -->
		<?php echo ($unUtilisateur!=null) ? "<input type='hidden' name='id' value ='".$unUtilisateur['id']."'>" : ""; ?>


		<td>  <input type="reset" class='btn btn-dark' name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($unUtilisateur!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " : " class='btn btn-dark' name='valider' value='Valider' "; ?> 
			>
		</tr>
	</table>
</form>