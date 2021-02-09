<center>
<h2> Ajout d'un projet </h2>
<form method ="post" action ="">
	<table>

		<tr> 
			<td> Nom </td> 
			<td> <input type="text" class="form-control" name="nom" value ="<?php echo ($leProjet!=null) ? $leProjet['nom']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Description : </td> 
			<td> 
				<textarea  class="form-control" name="description"  rows="5" cols="33"> </textarea>
			</td>
		</tr>
		<tr> 
			<td> Date lancement du projet : </td> 
			<td> <input type="date" class="form-control" name="date_lancement" value ="<?php echo ($leProjet!=null) ? $leProjet['date_lancement']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Pays </td> 
			<td> <input type="text" class="form-control" name="pays" value ="<?php echo ($leProjet!=null) ? $leProjet['pays']:""; ?>"></td>
		</tr>
		<tr>

		<td> Ville </td> 
			<td> <input type="text" class="form-control" name="ville" value ="<?php echo ($leProjet!=null) ? $leProjet['ville']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Budget </td> 
			<td> <input type="text" class="form-control" name="budget" value ="<?php echo ($leProjet!=null) ? $leProjet['budget']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Somme Collectée </td> 
			<td> <input type="text" class="form-control" name="somme_collecte" value ="<?php echo ($leProjet!=null) ? $leProjet['somme_collecte']:""; ?>"></td>
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
			<td> Id Association : </td> 
			<td> <select class="form-control form-control-sm" name ="id_Association">
					 <?php
					 	foreach ($lesAssos as $unAsso) {
					 		echo "<option value ='".$unAsso['id']."'>".$unAsso['libelle']."</option>";
					 	}
					 ?>
				</select>
			</td>
		</tr>

			<td>  <input type="reset" class='btn btn-dark' name="annuler" value ="Annuler"></td>  
			<td> <input type="submit" 
			<?php echo ($leProjet!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " :  " class='btn btn-dark' name='valider' value='Valider' "; ?> ></td>
		</tr>
	</table>
</form>
</center>