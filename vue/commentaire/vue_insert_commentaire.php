<center>
<h2>Ajout d'un commentaire</h2>

<br/>

<form method ="post" action ="">
	<table>
		<tr> 
			<td> Contenu : </td> 
			<td> 
				<textarea  class="form-control" name="contenu"  rows="5" cols="33"><?php echo ($leCommentaire!=null) ? $leCommentaire['contenu']:""; ?></textarea>
			</td>
		</tr>
		<tr> 
			<td> Note : </td> 
			<td> <input type="number"  class="form-control" name="note" min=0 max=20 value ="<?php echo ($leCommentaire!=null) ? $leCommentaire['note']:""; ?>"></td>
		</tr>

		<tr> 
			<td> Commenté par : </td> 
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
			<td> Projet concerné : </td> 
			<td> <select  class="form-control" name ="id_Projet">
					 <?php
					 	foreach ($lesProjets as $unProjet) 
						{
					 		echo "<option value ='"
							 	.$unProjet['id']."'>"
								.$unProjet['nom']." - "
								.$unProjet['date_lancement'].
							 "</option>";
					 	}
					 ?>
				</select>
			</td>
		</tr>

		<tr>
			<td><br/><input type="reset" class='btn btn-dark' name="annnuler" value ="Annuler"></td>  
			<td><br/><input type="submit" <?php echo ($leCommentaire!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " : " class='btn btn-dark' name='valider' value='Valider' "; ?> ></td>
		</tr>
	</table>
</form>

</center>
