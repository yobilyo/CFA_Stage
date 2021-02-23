<h2> Aidez nos activités en faisant un don ! </h2>
<br/>
<div class='container'>
	<div class="row">

        <?php
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
                    <select multiple class='form-control' name='id_Projet'>";
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

        ?>
	</div>
</div>