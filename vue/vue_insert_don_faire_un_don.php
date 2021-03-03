<link rel="stylesheet" href="vue/style/faire_un_don.css">

<!--<h2 id='grand_titre'>Faire un don</h2>
<img id='img' src='lib/images/pages/faire-don-asso.png' width='200'></img>-->

<form method="post" action="">
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
                $codePostal = " value = '".$lUtilisateur['codePostal']."' style='background-color:gainsboro;'readonly";
                $ville = " value = '".$lUtilisateur['ville']."' style='background-color:gainsboro;'readonly";
                $civilite = " value = '".$lUtilisateur['civilite']."' style='background-color:gainsboro;'readonly";
                $pays = " value = '".$lUtilisateur['pays']."' style='background-color:gainsboro;'readonly";
                $datenaissance = " value ='".$lUtilisateur['date_naissance']."' style='background-color:gainsboro;' readonly";
            }

            echo "
            <h3 class='title_faireDon'>2. Mes coordonnées</h3> 

            <select name='civilite'>";

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
            <input type='password' placeholder='Mot de passe' name='password'".$password.">
            <input type='text' placeholder='Adresse' name='adresse' ".$adresse.">
            <input type='text' placeholder='Code Postal' name='codePostal' ".$codePostal." >
            <input type='text' placeholder='Ville' name='ville' ".$ville.">   
            <input type='text' placeholder='Pays' name='ville' ".$pays.">         
            <input type='date' placeholder='Date de naissance' name='naissance' ".$datenaissance.">
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
        <center><input style="margin-top:30px;width:120px;" type="submit" value="Payer" name="Payer"/></center>
    </div>
</div>
</form>



<?php
    /*echo"
    <div class='col-sm-4'>
        <!-- //https://getbootstrap.com/docs/4.0/components/forms/ -->
            <form method='post' action=''>
                <div>
                    <h3>(1/3) Choix du Projet</h3><br/>
                </div>
                <!-- id du nouveau don à insérer codée en dur null -->
                <div class='form-group'>Appréciation :
                    <textarea class='form-control' name='appreciation' rows='6'></textarea>
                </div>
                <!-- statut du don codé en dur 'en cours' par défaut -->
                <input type='hidden' name='id_Utilisateur' value='".$_SESSION['id']."' >
                <div class='form-group'>Projet :
                    <select class='form-control' name='id_Projet'>";
                    foreach ($lesProjets as $unProjet) {
                        echo "<option value='".$unProjet['id']."'>".$unProjet['nom']." (".$unProjet['pays'].")</option>";
                    }
                    echo "
                    </select>
                </div>
                <!-- idA_Association codé en dur 1 car on a qu'une asso -->

                <div>
                    <h3>(2/3) Votre Paiement</h3><br>
                </div>
                <div class='form-group'>Montant :
                    <input type='text' name='montant' class='form-control' >
                </div> 
                <!-- dateDon codée en dur new Date() -->
                <div>Mode de Paiement:<br/>";
                foreach ($lesModesdePaiements as $unModeDePaiement) {
                    echo "
                    <div class='form-check form-check-inline'>
                        <img src='".$unModeDePaiement['image_url']."' width='30'></img>
                        <input class='form-check-input' type='radio' name='id_Mode_de_paiement' value='".$unModeDePaiement['id']."'>  
                    </div>
                    ";
                }
                echo"
                </div>
                <input type='submit' class='btn btn-dark' name='ok2' value='OK'>
            </form>
        </div>";


        //version avec plusieurs pages non fonctionelle pour le moment
        /*
        $tab = array();

        echo"
        <div class='col-sm-4'>
            <div>
                <h3>(1/3) Choix du Projet</h3><br/>
            </div>
            <!-- //https://getbootstrap.com/docs/4.0/components/forms/ -->
            <form method='post' action=''>
                <!-- id du nouveau don à insérer codée en dur null -->
                <div class='form-group'>Appréciation :
                    <textarea class='form-control' name='appreciation' rows='6'></textarea>
                </div>
                <!-- statut du don codé en dur 'en cours' par défaut -->
                <input type='hidden' name='id_Utilisateur' value='".$_SESSION['id']."' >
                <div class='form-group'>Projet :
                    <select class='form-control' name='id_Projet'>";
                    foreach ($lesProjets as $unProjet) {
                        echo "<option value='".$unProjet['id_Projet']."'>".$unProjet['nom']." (".$unProjet['pays'].")</option>";
                    }
                    echo "
                    </select>
                </div>
                <!-- idA_Association codé en dur 1 car on a qu'une asso -->

                <input type='submit' class='btn btn-dark' name='ok1' value='OK'>
            </form>
        </div>";

        if (isset($_POST['ok1'])) {
            $tab['appreciation'] = $_POST['appreciation'];
            $tab['id_Utilisateur'] = $_POST['id_Utilisateur'];
            $tab['id_Projet'] = $_POST['id_Projet'];
            $tab['ok1'] = $_POST['id_Projet'];

            echo"
            <div class='col-sm-4'>
                <div>
                    <h3>(2/3) Votre Paiement</h3><br>
                </div>
                <!-- //https://getbootstrap.com/docs/4.0/components/forms/ -->
                <form method='post' action=''>
                    <div class='form-group'>Montant :
                        <input type='text' name='montant' class='form-control' >
                    </div> 
                    <!-- dateDon codée en dur new Date() -->
                    <div>Mode de Paiement:<br/>";
                    foreach ($lesModesdePaiements as $unModeDePaiement) {
                        echo "
                        <div class='form-check form-check-inline'>
                            <img src='".$unModeDePaiement['image_url']."' width='30'></img>
                            <input class='form-check-input' type='radio' name='id_Mode_de_paiement' value='".$unModeDePaiement['id']."'>  
                        </div>
                        ";
                    }
                    echo"
                    </div>
                    <input type='submit' class='btn btn-dark' name='ok2' value='OK'>
                </form>
            </div>";
        }

        if (isset($_POST['ok2'])) {
            $tab['montant'] = $_POST['montant'];
            $tab['id_Mode_de_paiement'] = $_POST['id_Mode_de_paiement'];
            $tab['ok2'] = $_POST['ok2'];
        }
        print_r($_POST);
        echo "<br/><br/>";
        print_r($tab);

        */
        //version avec plusieurs pages non fonctionelle pour le moment

        ?>
	</div>
</div>