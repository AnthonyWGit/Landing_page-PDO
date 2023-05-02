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
    $sqlQuery =    'SELECT * , FORMAT(price, 2, "fr_FR") AS "priceF" FROM pricing LIMIT 3'; //priceF means priceFormated
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);                        //Prepare, execute, then fetch to retrieve data
    $persoLieuStatement->execute();                                                     //The data we retrieve are in array form
    $pricings = $persoLieuStatement->fetchAll();
    return $pricings;
}

function updatePricings()
{

    {
            $mySQLconnection = connexion();
            $sqlQuery =    'UPDATE pricing 
            SET sale = :sale,
                name = :name,
                bandwidth = :bandwidth,
                price = :price,
                onlineSpace = :onlineSpace,
                supportNo = :supportNo,
                domain = :domain,
                hiddenFees = :hiddenFees
            WHERE    id_pricing = :id_pricing';
            $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);    
            $persoLieuStatement->bindValue('sale', $_POST["sale"], PDO::PARAM_STR);
            $persoLieuStatement->bindValue('name', $_POST["name"], PDO::PARAM_STR);
            $persoLieuStatement->bindValue('bandwidth', $_POST["bandwidth"], PDO::PARAM_STR);
            $persoLieuStatement->bindValue('price', $_POST["price"], PDO::PARAM_STR);
            $persoLieuStatement->bindValue('onlineSpace', $_POST["onlineSpace"], PDO::PARAM_STR);
            $persoLieuStatement->bindValue('supportNo', $_POST["supportNo"], PDO::PARAM_STR);
            $persoLieuStatement->bindValue('domain', $_POST["domain"], PDO::PARAM_STR);
            $persoLieuStatement->bindValue('hiddenFees', $_POST["hiddenFees"], PDO::PARAM_STR); 
            $persoLieuStatement->bindValue('id_pricing', $_POST["id_pricing"], PDO::PARAM_STR);             
            $persoLieuStatement->execute();      
            unset($_POST);  
    }

}

var_dump($_POST);
