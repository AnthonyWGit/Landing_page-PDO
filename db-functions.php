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
    foreach ($_POST as $fieldName=>$value)              //looping over all field values
    {
        if (!empty($value) && $fieldName !== "id_pricing") //id is a field in hidden form
        {       
            if (($fieldName =="supportNo" && mb_strtolower($value) !== "yes" || "no") || 
            ($fieldName=="hiddenFees" && mb_strtolower($value) !== "yes" || "no"))
            {
                $success = false;
            }
            else
            {
                $sqlQuery = 'UPDATE pricing             /*SQL request*/
                SET '. $fieldName .' = :'.$fieldName.' 
                WHERE id_pricing = :id_pricing';
                $mySQLconnection = connexion();
                $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);
                $persoLieuStatement->bindValue($fieldName, $value, PDO::PARAM_STR);
                $persoLieuStatement->bindValue('id_pricing', $_POST["id_pricing"], PDO::PARAM_STR);
                var_dump($persoLieuStatement);
                $persoLieuStatement->execute();
                $success = true;                
            }
        }
    }       
            unset($_POST);
            var_dump($persoLieuStatement);          
            return $success;
}

var_dump($_POST);
