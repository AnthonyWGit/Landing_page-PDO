<?php 
session_start();                //We need session for notifications
require "db-functions.php";     //Our queries are in there

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="stylesheetAdmin.css">
    <title>Admin</title>
</head>
<body>
    <div class="wrapper">
        <div class="tablePrices">
            <?php 
            if (isset($_SESSION["admin"]))                              //Displaying notifications when form sent
            {
                if ($_SESSION["admin"] == "No changes were made")   //Need to work on that : id is always sent so the form is never empty
                {
                    echo $_SESSION["admin"];
                    unset($_SESSION["admin"]);
                }
                else if ($_SESSION["admin"]== "There is an error somewhere")
                {
                    echo $_SESSION["admin"];
                    unset($_SESSION["admin"]);
                }
                else if ($_SESSION["admin"] == "Good boy")
                {
                    echo $_SESSION["admin"];
                    unset($_SESSION["admin"]);
                }                
            }
            ?>
                    <div class="gridFlexes">
                        <div class="msg">
                        </div>
                        <?php foreach (getPricings() as $pricing)
                        {
                        ?>  <!-- below HTML construction of a card -->
                        <div class="cardPrice">
                            <div class="twoLists">
                                <ul class="left">
                                    <li>Name</br>
                                    <form action="confirm.php" method="post" class="form-example">
                                        <input type="text" name="name" id="name">
                                        </li>
                                        <li>Sale
                                        <input type="text" name="sale" id="sale">
                                        </li>
                                        <li>OnlineSpace
                                        <input type="text" name="onlineSpace" id="onlinespace">
                                        </li>
                                        <li>Domain
                                        <input type="text" name="domain" id="domain">
                                        </li>
                                    </ul>
                                    <ul class="right">
                                        <li>Price
                                        <input type="text" name="price" id="price">
                                        </li>       <!-- using db data -->
                                        <li>bandwidth
                                        <input type="text" name="bandwidth" id="bandwidth">
                                        </li>
                                        <li>supportNo
                                        <input type="text" name="supportNo" id="supportNo">
                                        </li>
                                        <li>Hidden Fees
                                        <input type="text" name="hiddenFees" id="hiddenFees">
                                        </li>   
                                    </ul>
                                </div> <!-- Need the imput below to retrieve the id of wich card we modify -->
                            <input type="hidden" value="<?= $pricing["id_pricing"]?>" id="id_pricing" name="id_pricing">                                  
                                <button type="submit">Envoyez</button></form>                                
                            </div>
                        <?php }?>                   
                     </div>
        </div>
    </div>
</body>
