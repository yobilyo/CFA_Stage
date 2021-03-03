<img style="float:left;margin:40px;" src='./lib/images/asso-logo.png' style='position: relative' width='250'/>

<br/><br/><br/><br/><br/>

<div class='col-md-5' style='background-color:#F9F9F9'>
	<form method='post' action='' class='form-horizontal' role='form'>
		<fieldset>

			<br/><br/>
			<legend>Devenir membre</legend>
			<br/><br/>

			<!-- Text input-->

			Nom * :
			<div class='form-group'>
				<div class='col-sm-8'>
				<input type="text" required='required' name="nom" class='form-control'>
				</div>
			</div>
			<br/>

			Prénom * :
			<div class='form-group'>
				<div class='col-sm-8'>
				<input type="text" required='required' name="prenom" class='form-control'>
				</div>
			</div>
			<br/>

			Civilite * :
			<div class='form-group'>
				<div class='col-sm-8'>
				<select class='form-control' name='civilite' required='required'>
					<option value='M'>M</option>
					<option value='Mme'>Mme</option>
					<option value='Mlle'>Mlle</option>
				</select>
				</div>
			</div>
			<br/>

			Date de naissance * :
			<div class='form-group'>
				<div class='col-sm-8'>
				<input type="date" required='required' name="date_naissance" class='form-control'>
				</div>
			</div>
			<br/>

			E-mail * :
			<div class='form-group'>
				<div class='col-sm-8'>
				<input type="email" required='required' name="email" class='form-control'>
				</div>
			</div>
			<br/>

			Mot de passe * :
			<div class='form-group'>
				<div class='col-sm-8'>
				
				<input type="password" required='required' name="mdp" id='myMdp' autocomplete='on' class='form-control'><br/>
				<input type='checkbox' onclick='showMdp()'> Afficher
				</div>
			</div>
			<br/>

			Adresse * :
			<div class='form-group'>
				<div class='col-sm-8'>
				<input type="text" required='required' name="adresse" class='form-control'><br/>
				</div>
			</div>
			<br/>

			Code Postal * :
			<div class='form-group'>
				<div class='col-sm-8'>
				<input type="text" required='required' name="codePostal" class='form-control'><br/>
				</div>
			</div>
			<br/>

			Ville * :
			<div class='form-group'>
				<div class='col-sm-8'>
				<input type="text" required='required' name="ville" class='form-control'><br/>
				</div>
			</div>
			<br/>

			Pays * :
			<div class='form-group'>
				<div class='col-sm-8'>
				<input type="text" required='required' name="pays" class='form-control'><br/>
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
						<button class="btn btn-primary" type="submit" name="sinscrire" value ="S'inscrire"  id="boutonenvoyer">S'inscrire </button>
					</div>
				</div>
			</div>
			<br/>
		</fieldset>
	</form>

</div>
