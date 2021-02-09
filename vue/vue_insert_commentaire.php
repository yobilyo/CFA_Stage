<center>
<h2> Ajout d'un Commentaire  </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td> Date : </td> 
			<td> <input type="date" class="form-control" name="date" value ="<?php echo ($leCommentaire!=null) ? $leCommentaire['date']:""; ?>"></td>
		</tr>
		<tr> 
			<td> Contenu : </td> 
			<td> 
				<textarea  class="form-control" name="contenu"  rows="5" cols="33"> </textarea>
			</td>
		</tr>
		<tr> 
			<td> Note </td> 
			<td> <input type="text"  class="form-control" name="note" value ="<?php echo ($leCommentaire!=null) ? $leCommentaire['note']:""; ?>"></td>
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

			<td>  <input type="reset" class='btn btn-dark' name="annnuler" value ="Annuler"></td>  
			<td> <input type="submit" <?php echo ($leCommentaire!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " : " class='btn btn-dark' name='valider' value='Valider' "; ?> ></td>
		</tr>
	</table>
</form>

</center>
