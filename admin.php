<?php 
require "db-functions.php"; 
var_dump($_POST);
if (empty($_POST))
{
    echo "lul";
}
else
{
    updatePricings();
    header("Location:admin.php");
}
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
                    <div class="gridFlexes">
                        <?php foreach (getPricings() as $pricing)
                        {
                        ?>  <!-- below HTML construction of a card -->
                        <div class="cardPrice">
                            <div class="twoLists">
                                <ul class="left">
                                    <li>Name</br>
                                    <form action="admin.php?update" method="post" class="form-example">
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
                                </div>
                            <input type="hidden" value="<?= $pricing["id_pricing"]?>" id="id_pricing" name="id_pricing">                                
                                <button type="submit" type="button">Envoyez</button></form>                                
                            </div>
                        <?php }?>                        
                     </div>
        </div>
    </div>
</body>

