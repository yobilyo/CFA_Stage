<link rel="stylesheet" href="vue/style/commentaire.css"/>

<?php

	//Cette page affiche tout le contenu sous le titre commentaire

	$unControleur->setTable ("commentaire");
	
	$leCommentaire = null; 

	//pour les suppression et les modification des propres commentaires d'un user
	if (isset($_GET['action']))  
	{
		$id_commentaire = $_GET['id']; 
		$action = $_GET['action'];
	
		switch ($action)
		{
			case "sup" : 
				$unControleur->setTable ("commentaire");
				$tab=array("id"=>$id_commentaire); 
				$unControleur->delete($tab);
				break;
	
			case "edit" : 
				$unControleur->setTable ("commentaire");
				$tab=array("id"=>$id_commentaire); 
				$unCom = $unControleur->selectWhere($tab);
				break; 
		}
	}

	$date = date('d/m/y H:i:s');
	?>

	<!--Pour que l'utilisateur puisse écrire un commentaire-->
	<center>
    	<form method ="post" action ="">

			<legend>Rédiger un commentaire :</legend>
			<textarea id='textarea_com' placeholder="Ecrire..." style="resize:none;" name="contenu" required autocomplete="on" 
			autofocus><?php echo(isset($unCom)) ? $unCom['contenu']:"";?></textarea>
			<table>
				<tr><td>Note : </td><td><input type="number" name="note" min="0" max="20" 
				value ="<?php echo(isset($unCom)) ? $unCom['note']:"";?>" required></td></tr>
				<tr>
					<td><input style="margin-top:30px;" type="reset" class='btn btn-dark' value ="Annuler"></td>
					<td><input style="margin-top:30px;" type="submit" class='btn btn-dark' <?php echo (isset($unCom)) 
						? "name='modifier_com' value='Modifier'"
						: "name='valider_com' value='Valider'";?>/>
					</td>
				</tr>
			</table>
			
		</form>
	</center>

	<br/><br/>

	<?php
	if(isset($_POST['modifier_com']))
	{
		//probleme : ça duplique
		$tab=array("dateCom"=> $date, //pour récupéré la date et l'heure actuelle
		"contenu"=>$_POST['contenu'],
		"note"=>$_POST['note'],
		"id_Utilisateur"=>$_SESSION['id'],	//c'est bon
		"id_Projet"=>$_GET['idprojet']);
		$unControleur->insert($tab);
		
		$where =array("id"=>$id_commentaire);
		$unControleur->update($tab, $where);
		header("Location: index.php?page=5&idprojet=".$_GET['idprojet']."#commentaires");
	}

	if (isset($_POST['valider_com'])) 
	{
		$tab=array("dateCom"=> $date, //pour récupéré la date et l'heure actuelle
		"contenu"=>$_POST['contenu'],
		"note"=>$_POST['note'],
		"id_Utilisateur"=>$_SESSION['id'],	//c'est bon
		"id_Projet"=>$_GET['idprojet']);
		$unControleur->insert($tab);
	}

	$unControleur->setTable ("commentaire_of_user");
	$tab=array("*");
	$lesCommentaires_of_user = $unControleur->selectAll($tab);

	foreach($lesCommentaires_of_user as $unCommentaire_of_user)
	{
		if($unCommentaire_of_user['id_Projet'] == $_GET['idprojet'] )
		{
			echo '<em>Ecrit par : </em>' .$unCommentaire_of_user['nom']. ' ' .$unCommentaire_of_user['prenom']. '<br/>'
			.$unCommentaire_of_user['contenu']. '<br/>'
			.$unCommentaire_of_user['note']. '<br/>'
			.$unCommentaire_of_user['dateCom'] . '<br/>';
			
			if($unCommentaire_of_user['id_Utilisateur'] == $_SESSION['id'])
			{
				echo "
				
				<a href='index.php?page=5&idprojet=".$_GET['idprojet']."&action=sup&id=".$unCommentaire_of_user['id']."'>
				<img src ='lib/images/sup.png' height='15' witdh='15' title='Supprimer'></a>
				 | 
				<a href='index.php?page=5&idprojet=".$_GET['idprojet']."&action=edit&id=".$unCommentaire_of_user['id']."#commentaires'>
				<img src ='lib/images/edition.png' height='15' witdh='15' title='Modifier'></a>";
			}
			echo'<br/><br/><br/>';
		}
	}
?>