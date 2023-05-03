<?php require "db-functions.php";   //We need session for notifications
session_start();                    //Our queries are in there
var_dump($_POST);
if (empty($_POST) || !isset($_POST))
{
    echo "lul";
    $_SESSION["admin"] = "No changes were made";
}
else
{
    $switch = true;                                     //$switch var used for displaying messages 
    foreach ($_POST as $fieldName=>$value)              //looping over all field values
    {echo"aa";
        if (!empty($value) && $fieldName != "id_pricing") //id is a field in hidden form
        {echo"bb";
            if ($fieldName == "supportNo")
            {
                if ($value !="Yes" && $value !="No")
                {
                    var_dump($fieldName);
                    var_dump($value);
                    echo"cc";   
                    $switch = false;
                    $_SESSION["admin"] = "There is an error somewhere";
                } 
            }
        }
    }
    var_dump($switch);
    $switch == true ? $_SESSION["admin"] = "Good boy" : "";
    $switch == true ? updatePricings() : "";
    header("Location:admin.php");
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
        if ($switch == true)
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

<?php
unset($_POST);
unset($switch);
?>