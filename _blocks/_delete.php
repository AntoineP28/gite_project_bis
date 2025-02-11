<?php
    include './_hosts.php'
?>

<?php




    if(isset($_GET['id'])) {

        $idGite=$_GET['id'];
        

        $deleteGite = $db->prepare('
            DELETE FROM gef_gites
            WHERE id_gite=?
            
        ');

        $deleteGite->execute([$idGite]);
       

    }


    echo "<script language='javascript'>
          document.location.replace('./_admin.php')
          </script>";
  
  
    

    


?>
