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
                if ($_SESSION["admin"]== "There is an error somewhere")
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
                                <form action="confirm.php" method="post" class="form-example">
                                    <div class="twoLists">
                                        <ul class="left">
                                            <li>
                                                <label for="admin-form-name">Name</label>
                                                <input type="text" name="name" id="admin-form-name" value="<?= $pricing["name"] ?>">
                                            <li>
                                                <label for="admin-form-sale">Sale</label>
                                                <input type="text" name="sale" id="admin-form-sale" value="<?= $pricing["sale"] ?>">
                                            </li>
                                            <li>
                                                <label for="admin-form-onlinespace">OnlineSpace</label>
                                                <input type="text" name="onlineSpace" id="admin-form-onlinespace" value="<?= $pricing["onlineSpace"] ?>">
                                            </li>
                                            <li>
                                                <label for="admin-form-domain">Domain</label>
                                                <input type="text" name="domain" id="admin-form-domain" value="<?= $pricing["domain"] ?>">
                                            </li>
                                        </ul>
                                        <ul class="right">
                                            <li>
                                                <label for="admin-form-price">Price</label>
                                                <input type="text" name="price" id="admin-form-price" value="<?= $pricing["price"] ?>">
                                            </li>       <!-- using db data -->
                                            <li>
                                                <label for="admin-form-bandwidth">bandwidth</label>
                                                <input type="text" name="bandwidth" id="admin-form-bandwidth" value="<?= $pricing["bandwidth"] ?>">
                                            </li>
                                            <li>
                                                <label for="admin-form-supportNo">supportNo</label>
                                                <input type="text" name="supportNo" id="admin-form-supportNo" value="<?= $pricing["supportNo"] ?>">
                                            </li>
                                            <li>
                                                <label for="admin-form-hiddenFees">Hidden Fees</label>
                                                <input type="text" name="hiddenFees" id="admin-form-hiddenFees" value="<?= $pricing["hiddenFees"] ?>">
                                            </li>   
                                        </ul>
                                    </div> <!-- Need the imput below to retrieve the id of wich card we modify -->

                                <input type="hidden" value="<?= $pricing["id_pricing"]?>" id="id_pricing" name="id_pricing" />

                                <button type="submit">Envoyer</button>
                                
                                </form>
                            </div>
                        <?php }?>                   
                     </div>
        </div>
    </div>
</body>
