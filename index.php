<?php require "db-functions.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="tablePrices">
                    <div class="gridFlexes">
                        <?php foreach (getPricings() as $pricing)
                        {
                        $ifSaleCard = $pricing["sale"] > 0 ? "sale" : "";
                        $ifSaleSticker = $pricing["sale"] > 0 ? "<div class = sticker>".$pricing["sale"]."% <br/>SALE</div>": ""; //Need this one to apply CSS class to a card when sale exists
                        $BandwidthIcon = ($pricing['bandwidth']) ? "fa-circle-check'"." style='color: #59ff00;'" : "fa-circle-xmark";
                        $onlineSpaceIcon = ($pricing['onlineSpace']) ? "fa-circle-check'"." style='color: #59ff00;'" : "fa-circle-xmark";
                        $supportNoIcon = ($pricing['supportNo'])  == "Yes" ? "fa-circle-check'"." style='color: #59ff00;'" : "fa-circle-xmark'"." style='color: #ff0000;'"; 
                        $domainIcon = ($pricing['domain']) ? "fa-circle-check'"." style='color: #59ff00;'" : "fa-circle-xmark";
                        $hiddenFeesIcon = ($pricing['hiddenFees']) == "Yes" ? "fa-circle-check'"." style='color: #59ff00;'" : "fa-circle-xmark'"." style='color: #ff0000;'"; 
                        ?>  <!-- below HTML construction of a card -->
                        <div class="cardPrice <?= $ifSaleCard?>">
                            <h4><?= $pricing["name"] ?></h4><?= $ifSaleSticker?>
                            <p><span class="bigNumeric">$<?= $pricing["priceF"] ?></span><span class="grey">/month</span></p>
                            <div class="twoLists">
                                <ul class="left">
                                    <li><i class='fa-regular <?= $BandwidthIcon ?> '></i>Bandwith</li>
                                    <li><i class='fa-regular <?= $onlineSpaceIcon ?> '></i>Onlinespace</li>
                                    <li><i class='fa-regular <?= $supportNoIcon ?>' ></i>Support:No</li>
                                    <li><i class='fa-regular <?= $domainIcon ?>' ></i>Domain</li>
                                    <li><i class='fa-regular <?= $hiddenFeesIcon ?>' ></i>Hidden Fees</li>
                                </ul>
                                <ul class="right">
                                    <li><?= $pricing["bandwidth"] ?></li>       <!-- using db data -->
                                    <li><?= $pricing["onlineSpace"] ?></li>
                                    <li><?= $pricing["supportNo"] ?></li>
                                    <li><?= $pricing["domain"] ?></li>
                                    <li><?= $pricing["hiddenFees"] ?></li>
                                </ul>
                            </div>
                            <div class="pushButton"><button>Join now !</button></div>
                        </div>
                    <?php }?>                        
                    </div>

        </div>
    </div>
</body>