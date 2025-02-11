<?php
    // php.net


    try{
        $db = new PDO('mysql:host=localhost;dbname=gef','root','');
        //$db = new PDO('mysql:host=82.163.176.123;dbname=ludovicl_via','ludovicl_V','Via&Best5566&');
        $db->setattribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $db->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setattribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");


    }catch(Exception $e){
        echo "Impossible de se connecter à la basse de données. $e";
        die();

};
?>
