<?php 
    //https://www.studentstutorial.com/php/php-mysql-data-insert.php
    //https://www.studentstutorial.com/php/file-upload-in-php-mysql

    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "assostage";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
       die('Could not Connect My Sql:' .mysql_error());
    }
    else{
        if(isset($_POST['upload'])){
            $file = rand(1000,100000)."-".$_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            echo $file;
            $folder="lib/images/projet/";
            
             /* new file size in KB */
            $new_size = $file_size/1024;  
            /* new file size in KB */
            
            /* make file name in lower case */
            $new_file_name = strtolower($file);
            /* make file name in lower case */
    
            $final_file=str_replace(' ','-',$new_file_name);
     
            if(move_uploaded_file($file_loc,$folder.$final_file))
            {
                // $sql="INSERT INTO image(file,type,size) VALUES('$final_file','$file_type','$new_size')";
                // mysqli_query($conn,$sql);
                
                
                // echo "File sucessfully upload";
                $adresse = $folder.$file;
                $unControleur->setTable('image');
                echo $adresse;
                $tab=array(
                    "adresse"=>$adresse,
                    "titre"=>$file,
                    "alt"=>'test',
                    "id_Projet"=>$_GET['id']
                );
        
                $unControleur->insert($tab);
            }
            else
            {
                echo "Error.Please try again";      
            }
        }
    }


    

?>
    
