<center>
<h2> Ajout d'un projet </h2>

<br/>

<form method ="post" action ="">
	<table>

		<tr> 
			<td>Nom : </td> 
			<td> <input type="text" class="form-control" name="nom" value ="<?php echo ($leProjet!=null) ? $leProjet['nom']:""; ?>" required></td>
		</tr>

		<tr> 
			<td>Description : </td> 
			<td> 
				<textarea  class="form-control" name="description"  rows="5" cols="33" required> </textarea>
			</td>
		</tr>

		<tr> 
			<td>Pays : </td> 
			<td><input type="text" class="form-control" name="pays" value ="<?php echo ($leProjet!=null) ? $leProjet['pays']:""; ?>" required></td>
		</tr>

		<tr>

		<td>Ville : </td> 
			<td><input type="text" class="form-control" name="ville" value ="<?php echo ($leProjet!=null) ? $leProjet['ville']:""; ?>" required></td>
		</tr>

		<tr> 
			<td>Budget : </td> 
			<td><input type="text" class="form-control" name="budget" value ="<?php echo ($leProjet!=null) ? $leProjet['budget']:""; ?>" required></td>
		</tr>

		<tr> 
			<td>Somme collectée : </td> 
			<td><input type="text" class="form-control" name="somme_collecte" value ="<?php echo ($leProjet!=null) ? $leProjet['somme_collecte']:""; ?>" required></td>
		</tr>

		<!--<tr> 
			<td>Id Association : </td> 
			<td><select class="form-control form-control-sm" name ="id_Association">
				<?php/*
				foreach ($lesAssos as $unAsso) 
				{
					echo "<option value ='"
						.$unAsso['id']."'>"
						.$unAsso['libelle'].
						"</option>";
					}
				*/?>
			</select></td>
		</tr>-->

		<tr>
		
			<td><input style="margin:50px 0px;" type="file" name="fileToUpload" id="fileToUpload"></td>
  			<td><input style="margin:50px 0px;" type="submit" value="Télécharger une image" name="submit"></td>

			<?php/*

				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) 
				{
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}*/

			?>
		
		</tr>

		<tr>
			<td><input style="margin:50px 0px;"type="reset" class='btn btn-dark' name="annuler" value ="Annuler"></td>  
			<td><input style="margin:50px 0px;" type="submit"<?php echo ($leProjet!=null) 
			? " class='btn btn-dark' name='modifier' value='Modifier' " 
			:  " class='btn btn-dark' name='valider' value='Valider' "; ?> ></td>
		</tr>

	</table>
</form>
</center>