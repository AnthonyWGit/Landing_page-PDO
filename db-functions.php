<?php


function connexion()
{
    try {
        $mySQLconnection = new PDO(                                                     //Connecting to SQL server
            'mysql:host=127.0.0.1;dbname=landing_page;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        return $mySQLconnection;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getPricings()
{
    $mySQLconnection = connexion();
    $sqlQuery1 =    'SELECT * , FORMAT(price, 2, "fr_FR") AS "priceF" FROM pricing LIMIT 3';
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery1);                        //Prepare, execute, then fetch to retrieve data
    $persoLieuStatement->execute();                                                     //The data we retrieve are in array form
    $pricings = $persoLieuStatement->fetchAll();
    return $pricings;
}
