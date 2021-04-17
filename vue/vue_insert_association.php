<h2> Ajout d'une Association </h2>
<form method ="post" action ="">
	<table>
		<tr> 
			<td>  Libelle : </td> 
			<td> <input type="text" class="form-control" name="libelle" value ="<?php echo ($uneAssociation!=null) ? $uneAssociation['libelle']:""; ?>" ></td>
		</tr>
		<tr> 
			<td>  Email : </td> 
			<td> <input type="text" class="form-control" name="email" value ="<?php echo ($uneAssociation!=null) ? $uneAssociation['email']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Nombre de Projets : </td> 
			<td> <input type="text" class="form-control" name="nbprojets" value ="<?php echo ($uneAssociation!=null) ? $uneAssociation['nbprojets']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Budget des Projets Total : </td> 
			<td> <input type="text" class="form-control" name="budgetProjetsTot" value ="<?php echo ($uneAssociation!=null) ? $uneAssociation['budgetProjetsTot']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Somme collectée Totale : </td> 
			<td> <input type="text" class="form-control" name="sommeCollecteeTot" value ="<?php echo ($uneAssociation!=null) ? $uneAssociation['sommeCollecteeTot']:""; ?>" ></td>
		</tr>
        <tr> 
			<td> Photo de profil (URL) : </td> 
			<td> <input type="text" class="form-control" name="photo_profil" value ="<?php echo ($uneAssociation!=null) ? $uneAssociation['photo_profil']:"lib/images/photo_profil/nom_image.jpg"; ?>" ></td>
		</tr>

        <!-- Id association caché envoyé dans le formulaire aussi -->
		<?php echo ($uneAssociation!=null) ? "<input type='hidden' name='id' value ='".$uneAssociation['id']."'>" : ""; ?>


		<td>  <input type="reset" class='btn btn-dark' name="annnuler" value ="Annuler"></td>  
		<td> <input type="submit" 
			<?php echo ($uneAssociation!=null) ? " class='btn btn-dark' name='modifier' value='Modifier' " : " class='btn btn-dark' name='valider' value='Valider' "; ?> 
			>
		</tr>
	</table>
</form>
