
<script src="lib/js/helpers.js"></script>

<img src='./lib/images/asso-logo.png' style='position: relative' width='270'/>

<br/><br/><br/>

<div class='col-md-5' style='background-color:#F9F9F9'>
  <form method='post' action='' class='form-horizontal' role='form'>
	<fieldset>

	<br/><br/>
	  
	  <legend>Connectez-vous pour accéder à votre compte</legend>

	  <br/><br/>

	  <!-- Text input-->
	  Votre email :
	  <div class='form-group'>
		<div class='col-sm-8'>
		  <input type='email' required='required' name = 'email' class='form-control'>
		</div>
	  </div>
	  <br/>

	  <!-- Text input-->
	  Votre mot de passe :
	  <div class='form-group'>
		<div class='col-sm-8'>
		  <!-- Password field -->
		  <input type='password' name = 'mdp' id='myMdp' autocomplete='on' class='form-control'><br/>
		  <input type='checkbox' onclick='showMdp()'> Afficher
		</div>
	  </div>
	  <br/>

	  <div class='form-group'>
		<div class='col-sm-offset-2 col-sm-10'>
		  <div class='pull-right'>
			<button type='submit' name='seconnecter' value ='Connectez-vous' id="boutonenvoyer">Connectez-vous</button>
		  </div>
		</div>
	  </div>

	</fieldset>
  </form>
  <a href="index.php?page=001">Cliquez ici pour vous inscrire.</a>
  <br/><br/>
</div>

