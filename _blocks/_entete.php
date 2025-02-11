<?php
// création de requête préparée



$selectGites = $db->prepare('SELECT * FROM gef_gites 
NATURAL JOIN gef_types 

ORDER BY gite_nom ASC


');

$selectGites->execute();

$searchGites = $db->prepare('SELECT * FROM gef_gites');
$searchGites->execute();

$countGites = count($searchGites->fetchAll());
//var_dump($countStudent);

$selectTypes = $db->prepare('SELECT * FROM gef_types 

ORDER BY type_name DESC

');

$selectTypes->execute();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gîtes en folie</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Gites en folie</title>
    <link rel="stylesheet" href="./_styles/generic.css">
    <link rel="stylesheet" href="./_styles/responsive.css">
    <link rel="stylesheet" href="./_styles/style.css">
    <link rel="stylesheet" href="../_styles/apropos.css">


    <link rel="stylesheet" href="./_styles/burger.css">
    <link rel="stylesheet" href="./_styles/admin.css">
    <link rel="stylesheet" href="./_styles/contact.css">
</head>