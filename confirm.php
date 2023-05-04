<?php require "db-functions.php";   //We need session for notifications
session_start();                    //Our queries are in there
var_dump($_POST);

if (empty($_POST) || !isset($_POST))
{
    echo "";
    header("Location:admin.php");
}
else
{
    $allowConfirm = true;                                     //$allowConfirm var used for displaying messages 
    $filteredSale = filter_input(INPUT_POST, "sale", FILTER_VALIDATE_INT); //Filtering sale
    foreach ($_POST as $fieldName=>$value)              //looping over all field values
    {
        echo "aa";
        if (!empty($value) && $fieldName != "id_pricing") //id is a field in hidden form
        {
            echo "bb";
            if ($fieldName == "supportNo" || $fieldName == "hiddenFees")
            {
                if (mb_strtolower($value) !="yes" && mb_strtolower($value) != "no")   //user can write Yes yes No no yEs nO, etc.
                {
                    var_dump($fieldName);
                    var_dump($value);
                    echo "cc";   
                    $allowConfirm = false;
                    $_SESSION["admin"] = "There is an error somewhere";
                }
            }
            if (!$filteredSale) //If sale is false then it means something else than int has been sent
            {
                $allowConfirm = false;
                $_SESSION["admin"] = "There is an error somewhere";
                echo "VALUE FILTER";
                var_dump($filteredSale);
            }
        }
    }

    if ($allowConfirm) 
    {
        $_SESSION["admin"] = "Good boy";
        updatePricings();
    }
    //header("Location:admin.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if ($allowConfirm == true)
        {
            echo "Update ok";
        }
        else
        {
            echo "something went wrong";
        }
    ?>
</body>
</html>

