<center>
<h2> Ajout d'un projet </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Description : </td> 
			<td> 
				<textarea  name="description"  rows="5" cols="33"> </textarea>
			</td>
		</tr>
		<tr> 
			<td> Date lancement du projet : </td> 
			<td> <input type="date" name="date_lancement" value ="<?php echo ($leProjet!=null) ? $leProjet['date_lancement']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Pays </td> 
			<td> <input type="text" name="pays" value ="<?php echo ($leProjet!=null) ? $leProjet['pays']:""; ?>"></td>
		</tr>
		<tr>

		<td> Ville </td> 
			<td> <input type="text" name="ville" value ="<?php echo ($leProjet!=null) ? $leProjet['ville']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Budget </td> 
			<td> <input type="text" name="budget" value ="<?php echo ($leProjet!=null) ? $leProjet['budget']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Somme Collectée </td> 
			<td> <input type="text" name="somme_collecte" value ="<?php echo ($leProjet!=null) ? $leProjet['somme_collecte']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Id Utilisateur : </td> 
			<td> <select name ="id_utilisateur">
					 <?php
					 	foreach ($lesUsers as $unUser) {
					 		echo "<option value ='".$unUser['id']."'>".$unUser['nom']."  ".$unUser['prenom']."</option>";
					 	}
					 ?>
				</select>
			</td>
		</tr>

		<tr> 
			<td> Id Association : </td> 
			<td> <select name ="id_association">
					 <?php
					 	foreach ($lesAssos as $unAsso) {
					 		echo "<option value ='".$unAsso['id']."'>".$unAsso['libelle']."</option>";
					 	}
					 ?>
				</select>
			</td>
		</tr>

			<td>  <input type="reset" name="annuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($leProjet!=null) ? " name='modifier' value='Modifier' " : " name='valider' value='Valider' "; ?> ></td>
		</tr>
	</table>
</form>
</center>