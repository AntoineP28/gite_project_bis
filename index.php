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

    if(isset($_GET['voir_tout'])){
        
        $_SESSION['listeGite']['listeGiteMini']=0;
        $_SESSION['listeGite']['listeGiteMaxi']=100000;
        
     
    }else{
        
        $_SESSION['listeGite']['listeGiteMini']=0;
        $_SESSION['listeGite']['listeGiteMaxi']=4;
        
    }
?>
<!-- test -->

    <div class="galerie">
        <div class="galerie_titre">
            <h2>Découvrez</h2>
            <h1>Nos gîtes disponibles</h1>
            <h2>Explorer notre sélection de gîtes uniques en Eure-et-Loir</h2>
        </div>
        <div class="galerie_carte">
        <?php while($sGEF = $selectGites->fetch(PDO::FETCH_OBJ)){?>
            <div class="carte">
                <a href="gite.php?id=<?php echo $sGEF->id_gite?>"> <img src="./_imgs/<?php echo $sGEF->gite_photo?>" alt=""></a>
                
                <h2><?php echo $sGEF->gite_nom?></h2>
                <h3><?php echo $sGEF->type_name?></h3>
            </div>
        <?php } ?>

        </div>
        <form action="">
        <?php 
            
            if(isset($_GET['voir_ini'])){?>
                <input type="submit" class="voir_tout" value="4 Premiers" name="voir_tout" >
                <?php
            }else{?>
                <input type="submit" class="voir_tout" value="Voir tout" name="voir_ini" >
                <?php
            };
        ?>
        </form>
    </div>
    <?php

        include './_blocks/_footer.php'
    ?>
</body>
</html>