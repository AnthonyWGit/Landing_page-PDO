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
            filter_input(INPUT_POST, $fieldName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);   //filtering data
            $sqlQuery = 'UPDATE pricing             /*SQL request*/
            SET '. $fieldName .' = :'.$fieldName.' 
            WHERE id_pricing = :id_pricing';
            $mySQLconnection = connexion();
            $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);
            $persoLieuStatement->bindValue($fieldName, $value, PDO::PARAM_STR);
            $persoLieuStatement->bindValue('id_pricing', $_POST["id_pricing"], PDO::PARAM_STR);
            $persoLieuStatement->execute();       
        }
    }
}       

function updateQuantity()
{
    $sqlQuery = 'UPDATE pricing SET commandes = (commandes + 1)
    WHERE id_pricing = :id_pricing';
    $mySQLconnection = connexion();
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);
    $persoLieuStatement->bindValue('id_pricing', $_POST["id_pricing"], PDO::PARAM_STR);
    $persoLieuStatement->execute();       
}


function addEmail()
{
    $sqlQuery = "INSERT INTO email (email) VALUES (:email)";
    $mySQLconnection = connexion();
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);
    $persoLieuStatement->bindValue('email', $_POST["email"], PDO::PARAM_STR);
    $persoLieuStatement->execute();  
}
?>
