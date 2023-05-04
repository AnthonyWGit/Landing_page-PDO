<?php 
session_start();
require "db-functions.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheetNews.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">

            <div class="newsletter">
                <?php
                if (isset($_SESSION["news"]))
                {
                    echo $_SESSION["news"];
                    unset($_SESSION["news"]);
                }
                ?>

                <form action="newsletterTreatment.php" method="post">

                    <input type="email" name="email" id="email" size="30">

                    <button type="submit">Soubscribe</button>
                </form>
            </div>
    </div>
</body>
</html>