<?php require "db-functions.php"; 
var_dump($_POST);
if (empty($_POST) || !isset($_POST))
{
    echo "lul";
}
else
{
    $switch = true;
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
                } 
            }
        }
    }
    var_dump($switch);
    $switch == true ? updatePricings() : "";
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
            echo "MAJ ok";
        }
        else
        {
            echo "Pas de MAJ";
        }
    ?>
</body>
</html>

<?php
unset($_POST);
unset($switch);
?>