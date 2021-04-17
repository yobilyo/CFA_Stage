<link rel="stylesheet" href="vue/style/mon_compte.css"/> 

<?php

$unControleur->setTable ("utilisateur");
$where = array('id' => $_SESSION['id']);
$unUtilisateur = $unControleur->selectWhere ($where);

echo"
<div id='masque_si_mdp_valide'>
    <form method='post' action=''>

        <legend>Veuillez saisir votre mot de passe : </legend>
        <input type='password' name='mdp' required>

        <input type='submit' name='ValiderMDP' value='Valider'>

    </form>
</div>";

echo "<br/><br/>";

if(isset($_POST['ValiderMDP']))
{
    if($unUtilisateur['mdp'] == $_POST['mdp'])
    {      
        //<pour cacher le form du mdp si il est valide
        echo "<style type='text/css'>

            #masque_si_mdp_valide
            {
                visibility: hidden;
            }

        </style>";
        // >
        
        echo "<form method='post' action=''>
            <table>

                <tr>
                    <td>Civilité :</td>
                    <td><select name='civilite'>";
                        $lesCivilites = array("M", "Mme", "Mlle");
                        foreach ($lesCivilites as $uneCivilite) 
                        {
                            $selected = " ";
                            if ($unUtilisateur != null && $unUtilisateur['civilite'] == $uneCivilite) 
                            {
                                $selected = " selected";
                            } 
                            else
                            {
                                $selected = " ";
                            }
                            echo "<option value ='".$uneCivilite."' ".$selected.">".$uneCivilite."</option>";
                        }
                    echo"</td>
                </tr>

                <tr>
                   <td>Nom :</td>               
                   <td><input type='text' name='nom' value='".$unUtilisateur['nom']."'/></td>
                </tr>
                <tr>
                   <td>Prénom :</td>            
                   <td><input type='text' name='prenom' value='".$unUtilisateur['prenom']."'/></td>
                </tr>
                <tr>
                    <td>Date de naissance :</td>
                    <td><input type='date' name='date_naissance' value='".$unUtilisateur['date_naissance']."' /></td>
                </tr>
               <tr>
                   <td>E-mail :</td>            
                   <td><input type='text' name='email' value='".$unUtilisateur['email']."'/></td>
                </tr>
                ";

                if ($unUtilisateur['droits'] == 'administrateur') {
                    echo "
                    <tr>
                    <td>Email valide :</td>
                    <td><select name='emailValide'>";
                        $lesOptions = array("0", "1");
                        foreach ($lesOptions as $uneOption) 
                        {
                            $selected = " ";
                            if ($unUtilisateur != null && $unUtilisateur['emailValide'] == $uneOption) 
                            {
                                $selected = " selected";
                            } 
                            else
                            {
                                $selected = " ";
                            }
                            echo "<option value ='".$uneOption."' ".$selected.">".$uneOption."</option>";
                        }
                    echo"</td>
                    </tr>";
                } else {
                    echo "
                    <input type='hidden' name='emailValide' value='".$unUtilisateur['emailValide']."' />
                    ";
                }
                
                echo "         
                <tr>
                    <td>Téléphone :</td>            
                    <td><input type='text' name='tel' value='".$unUtilisateur['tel']."'/></td>
                </tr>
               <tr>
                   <td>Adresse</td>             
                   <td><input type='text' name='adresse' value='".$unUtilisateur['adresse']."'/></td>
                </tr>
               <tr>
                   <td>Code Postal :</td>        
                   <td><input type='number' max=99999 name='codePostal' value='".$unUtilisateur['codePostal']."'/></td>
                </tr>
               <tr>
                   <td>Ville :</td>             
                   <td><input type='text' name='ville' value='".$unUtilisateur['ville']."'/></td>
                </tr>
                <tr>
                   <td>Pays :</td>              
                   <td><input type='text' name='pays' value='".$unUtilisateur['pays']."'/></td>
                </tr>
                <tr>
                   <td>Photo de profil :</td>              
                   <td><input type='text' name='photo_profil' value='".$unUtilisateur['photo_profil']."'/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br/><input type='submit' value='Valider' name='ValiderINFOS'></td>
                </tr>
                
            </table>
        </form>";
    }
    else 
    { 
        echo "<p>Mot de passe incorrect. Veuillez réessayer.</p>";
    }
}

if(isset($_POST['ValiderINFOS']))
{
    $tab=array(
        "nom"=>$_POST['nom'],
        "prenom"=>$_POST['prenom'],
        "civilite"=>$_POST['civilite'],
        "date_naissance"=>$_POST['date_naissance'],
        "tel"=>$_POST['tel'],
        "droits"=>$unUtilisateur['droits'],
        "email"=>$_POST['email'],
        "emailValide"=>$_POST['emailValide'],
        "mdp"=>$unUtilisateur['mdp'],
        "adresse"=>$_POST['adresse'],
        "codePostal"=>$_POST['codePostal'],
        "ville"=>$_POST['ville'],
        "pays"=>$_POST['pays'],
        "photo_profil"=>$_POST['photo_profil']
    );

    $unControleur->setTable("utilisateur");
    $where = array('id' => $_SESSION['id']);

    $unControleur->update($tab, $where);
}

?>
