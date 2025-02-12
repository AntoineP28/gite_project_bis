<?php
    include './_blocks/_hosts.php'
    
?>

<?php
    include './_blocks/_entete.php'
?>

<body>

<?php

    include './_blocks/_header.php'
?>
<?php
    
    if(isset($_GET['retour'])){
        echo "<script language='javascript'>
          document.location.replace('./index.php?voir_ini=true')
          </script>";
    }
    
    if(isset($_GET['id'])){
        $idGite=$_GET['id'];
      
    
        $selectGite = $db->prepare('SELECT * FROM gef_gites 
        NATURAL JOIN gef_types 
        WHERE id_gite = ?
        ');

        $selectGite->execute([$idGite]);
        $gite=$selectGite->fetch(PDO::FETCH_OBJ);
   
    

    }
        
        
    
?>
<!-- test -->

    <div class="infoGite">
        
        <div class="galerie_carte">
            <div class="carte">
                <img src="./_imgs/<?php  echo $gite->gite_photo?>" alt="">
                
                <h2><?php echo $gite->gite_nom?></h2>
                <h3><?php echo $gite->type_name?></h3>
            </div>
            <div class="infoCarte">
                <p>Adresse : <?php echo $gite->gite_adresse?></p>
                <p>CP/VILLE : <?php echo $gite->gite_cp?> <?php echo $gite->gite_ville?> </p>
                <p>Pays : <?php echo $gite->gite_pays?></p>
            </div>
        
        </form>
        <a href="<?php echo $gite->gite_lien?>">Accès au site du gîte</a>

        <form action="">
            <input type="submit" class="voir_tout" value="Retour" name="retour" >
        </div>
    </div>
    <?php

        include './_blocks/_footer.php'
    ?>
</body>
</html>