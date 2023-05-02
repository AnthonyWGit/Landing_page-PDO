<?php require "db-functions.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="stylesheetAdmin.css">
    <title>Document</title>
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
                                    <li>Name</li>
                                    <li>Sale</li>
                                    <li>OnlineSpace</li>
                                    <li>Domain</li>
                                </ul>
                                <ul class="right">
                                    <li>Price</li>       <!-- using db data -->
                                    <li>bandwidth</li>
                                    <li>Support</li>
                                    <li>Hidden Fees</li>
                                </ul>
                            </div>
                        </div>
                    <?php }?>                        
                    </div>

        </div>
    </div>
</body>