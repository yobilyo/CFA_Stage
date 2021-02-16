<?php 
    echo "<form method='post' action=''>
            <img src='".$_SESSION['photo_profil']."' class='rounded'/>
            <br/>
            ".$_SESSION['nom'].' '.$_SESSION['prenom']."
            <br/><input class='btn btn-primary' type='submit' name='Modifier' value='Modifier'/> 
          </form>";
          
    if(isset($_POST['Modifier'])){
        
        echo"<div class='container'>
                <h1>Modifier votre compte</h1>
                <hr>
                <div class='row'>
                    <div class='col-md-3'>
                        <img src=".$_SESSION['photo_profil']." class='rounded'/>
                        <h6>Chargez une autre image</h6>
                        <input type='file' class='form-control'>
                    </div>
                
                
                    <div class='col-md-9 personal-info'>
                        <h3>Information Personnelle</h3>
                        <form method='post' class='form-horizontal' role='form' action''>
                            <div class='form-group'>
                                <label class='col-lg-3 control-label'>Nom : </label>
                                <div class='col-lg-8'>
                                    <input class='form-control' type='text'>
                                </div>
                            </div>
                            
                            <div class='form-group pt-2'>
                                <label class='col-lg-3 control-label'>Prenom : </label>
                                <div class='col-lg-8'>
                                        <input class='form-control' type='text'>
                                </div>
                            </div>

                            <div class='form-group pt-3'>
                                <label class='col-md-3 control-label'></label>
                                <div class='col-md-8'>
                                    <input type='submit' class='btn btn-primary' name='Confirmer' value='Confirmer'>
                                    <span></span>
                                    <input type='reset' class='btn btn-danger' value='Annuler'>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
             </div>";

             if(isset($_POST['Confirmer'])){
                    var_dump($_POST);
                    $tab=array("photo_profil"=>$_POST['photo_profil'],
                               "nom"=>$_POST['nom'],
                               "prenom"=>$_POST['prenom']);
                    $unControleur->setTable('utilisateur');
                    $where=array('id'=>$id_utilisateur);

                    $unControleur->update($tab,$where);
             }
    }
    ?>
 