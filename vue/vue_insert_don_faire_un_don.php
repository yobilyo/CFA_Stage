<link rel="stylesheet" href="vue/style/faire_un_don.css">

<!--<h2 id='grand_titre'>Faire un don</h2>
<img id='img' src='lib/images/pages/faire-don-asso.png' width='200'></img>-->

<form method="post" action="index.php?page=411">
<div id="faire_un_don">

    <div class="colonne">
        <h3 class='title_faireDon'>1. Mon soutien</h3> 
        <input type="number" placeholder="€" name="montant" min="2"/> 
        <br/>   
        <legend>Le projet que vous souhaitez soutenir : </legend>
        <select name='id_Projet'>
        <?php
            foreach ($lesProjets as $unProjet) 
            {
                echo "<option value='".$unProjet['id']."'>".$unProjet['nom']."</option>";
            }
        ?>
        </select>
        <br/>
        <legend>Un petit message : </legend>
        <textarea name='appreciation' rows='3' cols='3'></textarea>
    </div>

    <div class="colonne">
        <?php
            $nom = " ";
            $prenom = " ";
            $email = " ";
            $password = " ";
            $adresse = " ";
            $rue = " ";
            $codePostal = " ";
            $ville = " ";
            $civilite = " ";
            $civiliteDisabled = " ";
            $datenaissance = " ";

            $lUtilisateur = null; 

            if (isset($_SESSION['id']))
            {
                // si l'utilisateur est connecté, on met les champs existants en readonly
                // on actualise la dernière version des données directement dans la table sql
                $unControleur->setTable("utilisateur");
                $tab = array("id"=>$_SESSION['id']);
                $lUtilisateur = $unControleur->selectWhere($tab);

                $nom = " value ='".$lUtilisateur['nom']."' style='background-color:gainsboro;' readonly";
                $prenom = " value ='".$lUtilisateur['prenom']."' style='background-color:gainsboro;' readonly";
                $email = " value ='".$lUtilisateur['email']."' style='background-color:gainsboro;' readonly";
                $password = " value ='hiddenpassword' readonly style='background-color:gainsboro;'";
                $adresse = " value ='".$lUtilisateur['adresse']."' style='background-color:gainsboro;' readonly";
                $codePostal = " value = '".$lUtilisateur['codePostal']."' style='background-color:gainsboro;' readonly";
                $ville = " value = '".$lUtilisateur['ville']."' style='background-color:gainsboro;' readonly";
                $civilite = " value = '".$lUtilisateur['civilite']."' style='background-color:gainsboro;'";
                $civiliteDisabled = "style='background-color:gainsboro;' disabled";
                $pays = " value = '".$lUtilisateur['pays']."' style='background-color:gainsboro;' readonly";
                $datenaissance = " value ='".$lUtilisateur['date_naissance']."' style='background-color:gainsboro;' readonly";
            }

            echo "
            <h3 class='title_faireDon'>2. Mes coordonnées</h3> 

            <select name='civilite' ".$civiliteDisabled.">";

            $lesCivilites = array("M", "Mme", "Mlle");
            foreach ($lesCivilites as $uneCivilite) 
            {
                // sélection du droit égal à celui de l'utilisateur actuel
                $selected = " ";
                if ($lUtilisateur != null && $lUtilisateur['civilite'] == $uneCivilite) 
                {
                    $selected = " selected";
                } 
                else
                {
                    $selected = " ";
                }
                echo "<option value ='".$uneCivilite."' ".$selected.">".$uneCivilite."</option>";
            }

            echo "</select>
            <input type='text' placeholder='Prénom' name='prenom' ".$prenom.">
            <input type='text' placeholder='Nom' name='nom'".$nom.">
            <input type='text' placeholder='E-mail' name='email'".$email.">
            <input type='password' placeholder='Mot de passe' name='mdp'".$password.">
            <input type='date' placeholder='Date de naissance' name='date_naissance' ".$datenaissance.">
            <input type='text' placeholder='Adresse' name='adresse' ".$adresse.">
            <input type='text' placeholder='Code Postal' name='codePostal' ".$codePostal." >
            <input type='text' placeholder='Ville' name='ville' ".$ville.">   
            <input type='text' placeholder='Pays' name='pays' ".$pays.">         
            ";
            
        ?>
    </div>
    
    <div class="colonne">
        <h3 class='title_faireDon'>3. Mon réglement</h3>
        <input type='text' placeholder='Numéro de carte bancaire'/>
         
        <br/>

        <div id="dateCarte">
        <legend>Mois : </legend>
            <select name="mois_carte">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>

            <?php 
            
            $date = date("Y"); 

            echo "
            
            <legend>Année :</legend>
            <select name='annee_carte'>
                <option value='".$date."'>".$date."</option>
                <option value='".($date+1)."'>".($date+1)."</option>
                <option value='".($date+2)."'>".($date+2)."</option>
                <option value='".($date+3)."'>".($date+3)."</option>
                <option value='".($date+4)."'>".($date+4)."</option>
                <option value='".($date+5)."'>".($date+5)."</option>
                <option value='".($date+6)."'>".($date+6)."</option>
                <option value='".($date+7)."'>".($date+7)."</option>
                <option value='".($date+8)."'>".($date+8)."</option>
                <option value='".($date+9)."'>".($date+9)."</option>
                <option value='".($date+10)."'>".($date+10)."</option>
            </select>";
            ?>
        </div>

        <!--<input type='number' placeholder="CVC" max="999" name="CVC">-->
        <br/>
        <legend>Mode de Paiement : </legend>
        <div id="modePaiement">
        <?php foreach ($lesModesdePaiements as $unModeDePaiement)
        {
            echo "<div id='colonnePaiement'>
                    <img src='".$unModeDePaiement['image_url']."' width='30'></img>
                    <input class='form-check-input' type='radio' name='id_Mode_de_paiement' value='".$unModeDePaiement['id']."'>
                </div> ";
        }
        ?>
        </div>
        <center><input style="margin-top:30px;width:120px;" type="submit" value="Payer" name="payer"/></center>
    </div>
</div>
</form>
