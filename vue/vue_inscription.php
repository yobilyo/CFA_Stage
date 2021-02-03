<a href="https://www.restosducoeur.org/"><img src='lib/images/resto-du-coeur-logo.jpg' style='position: relative' width='400'/></a>

<br/>
<br/>

<div class='col-md-5' style='background-color:#F9F9F9'>
<form method='post' action='' class='form-horizontal' role='form'>
	<fieldset>

	
	<legend>Inscription membre au site internet des Restos du Coeur</legend>
	<br/>

	<!-- Text input-->

	Nom *
	<div class='form-group'>
		<div class='col-sm-8'>
		<input type="text" required='required' name="nom" class='form-control'>
		</div>
	</div>
	<br/>

    Prénom *
	<div class='form-group'>
		<div class='col-sm-8'>
		<input type="text" required='required' name="prenom" class='form-control'>
		</div>
	</div>
	<br/>

	E-mail *
	<div class='form-group'>
		<div class='col-sm-8'>
		<input type="email" required='required' name="email" class='form-control'>
		</div>
	</div>
	<br/>

	Mot de passe *
	<div class='form-group'>
		<div class='col-sm-8'>
		
		<input type="password" required='required' name="mdp" id='myMdp' autocomplete='on' class='form-control'>
		<input type='checkbox' onclick='showMdp()'> Afficher
		</div>
	</div>
	<br/>

    Photo de Profil (URL)
	<div class='form-group'>
		<div class='col-sm-8'>
		<input type="text" name="photo_profil" value="lib/images/photo_profil/anonymous.jpg" class='form-control'>
		</div>
	</div>
	<br/>

	<div class='form-group'>
		<div class='col-sm-offset-2 col-sm-10'>
		<div class='pull-right'>
			<button type="submit" name="sinscrire" value ="S'inscrire"  id="boutonenvoyer">S'inscrire </button>
		</div>
		</div>
	</div>

	</fieldset>
</form>

</div>
