<?php
    include './_blocks/_hosts.php'
    
?>

<?php
    include './_block/_entete.php'
?>

<body>

<?php

    include './_block/_header.php'
?>


    <div class="galerie">
        <div class="galerie_titre">
            <h2>Découvrez</h2>
            <h1>Nos gîtes disponibles</h1>
            <h2>Explorer notre sélection de gîtes uniques en Eure-et-Loir</h2>
        </div>
        <div class="galerie_carte">
        <?php while($sGEF = $selectGites->fetch(PDO::FETCH_OBJ)){?>
            <div class="carte">
                <img src="./_assets/_imgs/<?php echo $sGEF->gite_photo?>" alt="">
                <h2><?php echo $sGEF->gite_nom?></h2>
                <h3><?php echo $sGEF->type_name?></h3>
            </div>
        <?php } ?>
            <!-- <div class="carte">
                <img src="../_assets/_imgs/Product-2.png" alt="">
                <h2>Gîte Evasion</h2>
                <h3>Luxe</h3>
            </div>
            <div class="carte">
                <img src="../_assets/_imgs/Product-1.png" alt="">
                <h2>Gîte Nature</h2>
                <h3>Basique</h3>
            </div>

            <div class="carte">
                <img src="../_assets/_imgs/Product-4.png" alt="">
                <h2>Gîte Familial</h2>
                <h3>Confort</h3>
            </div>

            <div class="carte">
                <img src="../_assets/_imgs/Product-5.png" alt="">
                <h2>Gîte Romantique</h2>
                <h3>Privé</h3>
            </div>
            <div class="carte">
                <img src="../_assets/_imgs/Product.png" alt="">
                <h2>Gîte Historique</h2>
                <h3>Authentique</h3>
            </div>
         -->

        </div>
        <button class="voir_tout">Voir tout</button>
    </div>
    <?php

        include './_block/_footer.php'
    ?>
</body>
</html>