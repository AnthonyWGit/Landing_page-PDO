<?php require "db-functions.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="tablePrices">
                    <div class="gridFlexes">
                        <div class="cardPrice">
                            <h4>Starter</h4>
                            <p><span class="bigNumeric">$<?= $price1 ?></span><span class="grey">/month</span></p>
                            <div class="twoLists">
                                <ul class="left">
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Bandwith</li>
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Onlinespace</li>
                                    <li><i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>Support:NO</li>
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Domain</li>
                                    <li><i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>Hidden Fees</li>
                                </ul>
                                <ul class="right">
                                    <li>1 GB</li>
                                    <li>500 MB</li>
                                    <li>No</li>
                                    <li>1</li>
                                    <li>No</li>
                                </ul>
                            </div>
                            <div class="pushButton"><button>Join now !</button></div>
                        </div>
                        <div class="cardPrice sale">
                            <h4>Advanced</h4><?= $sale2 > 0 ? "<div class = sticker>".$sale2."% <br/>SALE</div>" : "";?> 
                            <p><span class="bigNumeric">$<?= $price2 ?></span><span class="grey">/month</span></p>
                            <div class="twoLists">
                                <ul class="left">
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Bandwith</li>
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Onlinespace</li>
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Support:NO</li>
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Domain</li>
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Hidden Fees</li>
                                </ul>
                                <ul class="right">
                                    <li>2 GB</li>
                                    <li>1 GB</li>
                                    <li>Yes</li>
                                    <li>3</li>
                                    <li>No</li>
                                </ul>
                            </div>
                            <div class="pushButton"><button>Join now !</button></div>
                        </div>
                        <div class="cardPrice">
                            <h4>Professionnal</h4>
                            <p><span class="bigNumeric">$<?= $price3 ?></span><span class="grey">/month</span></p>
                            <div class="twoLists">
                                <ul class="left">
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Bandwith</li>
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Onlinespace</li>
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Support:NO</li>
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Domain</li>
                                    <li><i class="fa-regular fa-circle-check" style="color: #59ff00;"></i>Hidden Fees</li>
                                </ul>
                                <ul class="right">
                                    <li>3 GB</li>
                                    <li>1 GB</li>
                                    <li>Yes</li>
                                    <li>Unlimited</li>
                                    <li>No</li>
                                </ul>
                            </div>
                            <div class="pushButton"><button>Join now !</button></div>
                        </div>
                    </div>
        </div>
    </div>
</body>