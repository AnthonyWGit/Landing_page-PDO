<?php


function handleShutdown() {
    $error = error_get_last();
    if ($error !== null && $error['type'] === E_ERROR) {        //If there is an error and it is Fatal
      // A fatal error occurred - store message in session
      $_SESSION["admin"] = "There is an error somewhere";
      header('Location: index.php');
      exit();
    }
  }
  
register_shutdown_function('handleShutdown');

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
    } catch (\Exception $e) 
    { 
        die('Erreur : ' . $e->getMessage());
    }
}

function getPricings()
{
    $mySQLconnection = connexion();
    $sqlQuery = 'SELECT * , FORMAT(price, 2, "fr_FR") AS "priceF" FROM pricing LIMIT 3'; //priceF means priceFormated
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);                        //Prepare, execute, then fetch to retrieve data
    $persoLieuStatement->execute();                                                     //The data we retrieve are in array form
    $pricings = $persoLieuStatement->fetchAll();
    return $pricings;
}

// fonction d'origine - Original function
// function updatePricings()
// {
//     foreach ($_POST as $fieldName=>$value)              //looping over all field values
//     {
//         if (!empty($value) && $fieldName !== "id_pricing") //id is a field in hidden form
//         {
//             switch ($fieldName)
//             {
//                 case "price":
//                     filter_input(INPUT_POST, $fieldName, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);   //filtering data
//                     $sqlQuery = 'UPDATE pricing             /*SQL request*/
//                     SET '. $fieldName .' = :'.$fieldName.'
//                     WHERE id_pricing = :id_pricing';
//                     $mySQLconnection = connexion();
//                     $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);
//                     $value = str_replace(",",".",$value);
//                     $persoLieuStatement->bindValue($fieldName, $value, PDO::PARAM_STR);
//                     $persoLieuStatement->bindValue('id_pricing', $_POST["id_pricing"], PDO::PARAM_INT);
//                     $persoLieuStatement->execute();   
//                 break;
//                 case "sale":
//                     filter_input(INPUT_POST, $fieldName, FILTER_VALIDATE_INT);   //filtering data
//                     $sqlQuery = 'UPDATE pricing             /*SQL request*/
//                     SET '. $fieldName .' = :'.$fieldName.' 
//                     WHERE id_pricing = :id_pricing';
//                     $mySQLconnection = connexion();
//                     $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);
//                     $persoLieuStatement->bindValue($fieldName, $value, PDO::PARAM_STR);
//                     $persoLieuStatement->bindValue('id_pricing', $_POST["id_pricing"], PDO::PARAM_INT);
//                     $persoLieuStatement->execute();   
//                 break;
//                 default:
//                     filter_input(INPUT_POST, $fieldName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);   //filtering data
//                     $sqlQuery = 'UPDATE pricing             /*SQL request*/
//                     SET '. $fieldName .' = :'.$fieldName.' 
//                     WHERE id_pricing = :id_pricing';
//                     $mySQLconnection = connexion();
//                     $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);
//                     $persoLieuStatement->bindValue($fieldName, $value, PDO::PARAM_STR);
//                     $persoLieuStatement->bindValue('id_pricing', $_POST["id_pricing"], PDO::PARAM_INT);
//                     $persoLieuStatement->execute();
//                 break;
//             }
//         }
//     }
// }
// fonction améliorée, en suivant la même logique - Better function with same logic
function updatePricings()
{
    $sqlQuerySetPart = "SET ";
    $fieldsNameValue = [];
    foreach ($_POST as $fieldName => $value)              //looping over all field values
    {
        if (!empty($value)) //id is a field in hidden form
        {
            $filteredValue = null;

            switch ($fieldName)
            {
                case "price":
                    $value = str_replace("," , "." , $value);
                    $filteredValue = filter_var($value, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);   //filtering data. F commas :-)
                    echo "VIRGULE"; 
                    var_dump($filteredValue);
                break;

                case "id_pricing":
                case "sale":
                    $filteredValue = filter_input(INPUT_POST, $fieldName, FILTER_VALIDATE_INT);   //filtering data using input because we can use it raw
                break;

                default:
                    $filteredValue = filter_input(INPUT_POST, $fieldName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);   //filtering data
                break;
            }
            
            $fieldsNameValue[$fieldName] = $filteredValue;
            // $sqlQuerySetPart .= $fieldName . " = " . $filteredValue . ", ";
            $sqlQuerySetPart .= $fieldName . " = :" . $fieldName . ", ";
        }
    }

    echo "CHECK >> <br />>";
    var_dump($fieldsNameValue);
    $fieldsNameValue["id_pricing"] = $_GET["id"];

    $sqlQuerySetPart = rtrim($sqlQuerySetPart, ", ");

    $sqlQuery = 'UPDATE pricing '. $sqlQuerySetPart
                . ' WHERE id_pricing = :id_pricing';
    var_dump($sqlQuery);
    var_dump($_GET);
    $mySQLconnection = connexion();
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);
    $persoLieuStatement->execute($fieldsNameValue); //This basically does the same thing as bindValue but on multiple ones but 
                                                    //we can't specify datatype : int by default
}

function updateQuantity()
{
    $sqlQuery = 'UPDATE pricing SET commandes = (commandes + 1)
        WHERE id_pricing = :id_pricing';
    $mySQLconnection = connexion();
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);
    $persoLieuStatement->bindValue('id_pricing', $_POST["id_pricing"], PDO::PARAM_INT);
    $persoLieuStatement->execute();       
}

function addEmail()
{
    $filteredEmailValue = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $sqlQuery = "INSERT INTO email (email) VALUES (:email)";
    $mySQLconnection = connexion();
    $persoLieuStatement = $mySQLconnection->prepare($sqlQuery);
    $persoLieuStatement->bindValue('email', $filteredEmailValue, PDO::PARAM_STR);
    $persoLieuStatement->execute();  
}
?>
