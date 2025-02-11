<?php
    include './_block/_hosts.php'
?>


<?php
    
    if(isset($_FILES['file'])){ // on vérifie la présence de 'file'
        
        //on récupère les valeurs
        $tempName= $_FILES['file']['tmp_name'];
        $name= $_FILES['file']['name'];
        $size= $_FILES['file']['size'];
        $error= $_FILES['file']['error'];
        $type= $_FILES['file']['type'];
        $tailleMaxi = 500000;

        //salon.jpg  récupere l'extension
        $tabExtension = explode('.',$name);

        $newName=strtolower($tabExtension[0]);
        
        

        $extension=strtolower(end($tabExtension));
        
        $extentionAutorisees=['jpg','jpeg','gif','png'];
    
        if(in_array($extension,$extentionAutorisees)){
            //$uniqueName=uniqid('',true);
            $uniqueName=substr(bin2hex(random_bytes(3)), 0, 4);

            $fileName=$newName.'_'.$uniqueName.".".$extension;
     


            move_uploaded_file($tempName,'./_imgs/'.$fileName);
        }else{

            
        }
      
    }

    
    if(isset($_POST['gite_nom']) and isset($fileName)){
        $giteNom=$_POST['gite_nom'];
        $giteAdresse=$_POST['gite_adresse'];
        $giteCp=$_POST['gite_cp'];
        $giteVille=$_POST['gite_ville'];
        $gitePays=$_POST['gite_pays'];
        $idType=$_POST['id_type'];
        $giteLien=$_POST['gite_lien'];
        
     

        $addGite = $db->prepare('
            INSERT INTO gef_gites set 
        
            gite_nom=?,
            gite_adresse=?,
            gite_cp=?,
            gite_ville=?,
            gite_pays=?,
            id_type=?,
            gite_lien=?,
            gite_photo=?
            
        ');

        $addGite->execute([
            $giteNom,
            $giteAdresse,
            $giteCp,
            $giteVille,
            $gitePays,
            $idType,
            $giteLien,
            $fileName
        ]);
       

    }
    echo "<script language='javascript'>
          document.location.replace('./_admin.php')
          </script>";
  
  
    

    


?>
