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
				$unControleur->setTable("commentaire");
				$tab=array("id"=>$id_commentaire); 
				$unControleur->delete($tab);
				break;
	
			case "edit" : 
				$unControleur->setTable("commentaire");
				$tab=array("id"=>$id_commentaire); 
				$unCom = $unControleur->selectWhere($tab);
				break; 
		}
	}

	$date = date('d/m/y H:i:s');
	?>

	<!--Pour que l'utilisateur puisse écrire un commentaire-->
	<center>
		<?php
			if (isset($_SESSION['email'])) {
				echo "
				<form method ='post' action =''>
				";

					$contenu = " ";
					$note = " ";
					$com = " name='valider_com' value='Valider'";

					if (isset($unCom)) {
						$contenu = $unCom['contenu'];
						$note = $unCom['note'];
						$com = " name='modifier_com' value='Modifier'";
					}

					echo "
					<legend>Ajouter un commentaire :</legend>
					<textarea id='textarea_com' placeholder='Ecrire...' style='resize:none;' maxlength='500' name='contenu' required autocomplete='on' 
					autofocus>".$contenu."</textarea>
					<table>
						<tr><td>Note : </td><td><input type='number' name='note' min='0' max='20' 
						value ='".$note."' required></td></tr>
						<tr>
							<td><input style='margin-top:30px;' type='reset' class='btn btn-dark' value ='Annuler'></td>
							<td><input style='margin-top:30px;' type='submit' class='btn btn-dark' ".$com."/>
							</td>
						</tr>
					</table>
					
				</form>
				";
			}
		?>
	</center>

	<br/><br/>

	<?php
	if(isset($_POST['modifier_com']))
	{
		//probleme : ça duplique
		$tab=array("dateCom"=> $date, //pour récupéré la date et l'heure actuelle
		"contenu"=>$_POST['contenu'],
		"note"=>$_POST['note'],
		"id_Utilisateur"=>$_SESSION['id'],
		"id_Projet"=>$_GET['idprojet']);
		
		$where =array("id"=>$id_commentaire);
		$unControleur->update($tab, $where);
		header("Location: index.php?page=5&idprojet=".$_GET['idprojet']."#commentaires");
	}

	if (isset($_POST['valider_com'])) 
	{
		$tab=array("dateCom"=> $date, //pour récupéré la date et l'heure actuelle
		"contenu"=>$_POST['contenu'],
		"note"=>$_POST['note'],
		"id_Utilisateur"=>$_SESSION['id'],
		"id_Projet"=>$_GET['idprojet']);
		$unControleur->insert($tab);
	}

		$unControleur->setTable ("commentaire_of_user");
		$tab=array("*");
		$order="datecom";
		$lesCommentaires_of_user = $unControleur->selectAllOrderByDesc($tab, $order);

	foreach($lesCommentaires_of_user as $unCommentaire_of_user)
	{
		if($unCommentaire_of_user['id_Projet'] == $_GET['idprojet'] )
		{
			echo '<div id="cadre_contenu_com">
				<div id="info_com"> 
					<span id="nom_com">' .$unCommentaire_of_user['nom']. ' ' .$unCommentaire_of_user['prenom']. '</span> 
					<span id="note_com">Note : <strong>'.$unCommentaire_of_user['note']. '</strong></span>
				</div>
				<div id="border_contenu_com">
					<div id="contenu_com">' .$unCommentaire_of_user['contenu']. '</div>
				</div>
				
				<div id="bas_com">
					<span id="action_com">';
				
				if (isset($_SESSION['email']) && $unCommentaire_of_user['id_Utilisateur'] == $_SESSION['id'])
				{
					echo"	
						<a href='index.php?page=5&idprojet=".$_GET['idprojet']."&action=sup&id=".$unCommentaire_of_user['id']."'>
						<img src ='lib/images/sup.png' height='15' witdh='10' title='Supprimer'></a>
						<a href='index.php?page=5&idprojet=".$_GET['idprojet']."&action=edit&id=".$unCommentaire_of_user['id']."#commentaires'>
						<img src ='lib/images/edition.png' height='15' witdh='10' title='Modifier'></a>";
				}
				
				echo '</span>
				<span id="date_com">'.$unCommentaire_of_user['dateCom'] . '<span>
				</div>';

			echo '</div>';
		}
	}
?>