<div class="container">
    <form method="post" action="">
        <table class="table table-bordered">
        <?php
           echo" <tr>
                <td>Email actuel : ."$unUtilisateur['id']."</td>
                <td>Changez d'email :</td>
                <td> Email : </td> 
			    <td> <input type="text" class="form-control" name="email" value ="echo ($unUtilisateur!=null) ? $unUtilisateur['email']:""; " ></td>
            </tr>";
        ?>

        </table>
    </form>

</div>