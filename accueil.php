
<?php
    $unControleur->setTable ("association");
    $where=array("id"=>1);
    $uneAsso = $unControleur->selectWhere($where);
    
    echo "
    <h3 style='margin:30px 0px;'><center>Bienvenue sur <em>".$uneAsso['libelle']."</em> !</center></h3>
    ";

    include('slider.php');

?>
