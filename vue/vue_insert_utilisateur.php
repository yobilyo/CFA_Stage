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
					<!-- choix de la valeur sélectionnée en cours avec le mot clé HTML selected https://www.geeksforgeeks.org/how-to-set-the-default-value-for-an-html-select-element/-->
					<?php
						if ($unUtilisateur == null) {
							echo "<option value='utilisateur'>utilisateur</option>
								  <option value='administrateur'>administrateur</option>";
						} else if ($unUtilisateur['droits'] == "utilisateur") {
							echo "<option value='utilisateur' selected>utilisateur</option>
								  <option value='administrateur'>administrateur</option>";
						} else if ($unUtilisateur['droits'] == "administrateur") {
							echo "<option value='utilisateur' >utilisateur</option>
								  <option value='administrateur' selected>administrateur</option>";
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