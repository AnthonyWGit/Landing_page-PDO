<?php

try
{
    $mySQLconnection = new PDO(                                                     //Connecting to SQL server
        'mysql:host=127.0.0.1;dbname=landing_page;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);   
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$sqlQuery1 =    'SELECT icon, FORMAT(price, 2, "fr_FR") AS "price", sale FROM pricing';
$persoLieuStatement = $mySQLconnection->prepare($sqlQuery1);                        //Prepare, execute, then fetch to retrieve data
$persoLieuStatement->execute();                                                     //The data we retrieve are in array form
$table = $persoLieuStatement->fetchAll();

$price1 = $table[0]["price"];
$price2 = $table[1]["price"];
$price3 = $table[2]["price"];
$sale1 = $table[0]["sale"];
$sale2 = $table[1]["sale"];
$sale3 = $table[2]["sale"];
$icon1 = $table[0]["icon"];
$icon2 = $table[1]["icon"];
$icon3 = $table[2]["icon"];
