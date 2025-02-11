<?php
  
    include './_hosts.php'
?>

<?php
    include '_entete.php'
?>

<body>

<?php

    include '_header.php'
?>

<div class="liste_gites">

    <?php while($sGEF = $selectGites->fetch(PDO::FETCH_OBJ)){?>
        <div class="liste_carte">
            <img src="../gite_project2/_imgs/<?php echo $sGEF->gite_photo?>" alt=""></td>
            <p><?php echo $sGEF->gite_nom?></p>
            <p><?php echo $sGEF->type_name?></p>
           
          
            <label for="delete_gite">
            <a type="button" method="POST" href="_update.php?id=<?php echo $sGEF->id_gite?>"><i class='bx bx-pencil'></i></a>
            <a type="button" method="POST" href="_delete.php?id=<?php echo $sGEF->id_gite?>"><i class='bx bx-trash'></i></a>
            
            
        </div>
    <?php } ?>
</div>

</div>
    <div class="form formulaire generalContainer">
        
        <form  class="allFormulaire" action="./_add_gite.php" method="POST" enctype="multipart/form-data">
            <h1>Ajout d'un Gites</h1>
            <div class="box test">
                <label for="gite_nom">
                    <input type="text" id="gite_name" name="gite_nom" placeholder="Nom du gîte">
                </label>

                <label for="gite_adresse">
                    <input type="text" id="gite_adresse" name="gite_adresse" placeholder="Adresse">
                </label>
                <label for="gite_cp">
                    <input type="text" id="gite_cp" name="gite_cp" placeholder="Code postal">
                </label>
                <label for="gite_ville">
                    <input type="text" id="gite_ville" name="gite_ville" placeholder="Ville">
                </label>
                <label for="gite_pays">
                    <input type="text" id="gite_pays" name="gite_pays" placeholder="Pays">
                </label>
                <label for="gite_lien">
                    <input type="text" id="gite_lien" name="gite_lien" placeholder="Lien html">

                </label> 
                
                <label for="file">
                    <input type="file" id="gite_photo" name="file" placeholder="photo">
                </label>

                <select name="id_type" id="id_type" name="id_type" >
                    <?php while($sTypes = $selectTypes->fetch(PDO::FETCH_OBJ)){?>
                        <option value="<?php echo $sTypes->id_type?>" name="<?php echo $sTypes->id_type?>"><?php echo $sTypes->type_name?></option>
                    </div>
                    <?php } ?>

                </select>
                <button class="BtnConnexion" type="submit">Ok</button>
            </div>


    