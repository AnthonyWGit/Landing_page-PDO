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
            <form action="" method="post">
            <input type="email" id="email" size="30">
            <button type="submit" name="news" id="news">Soubscribe</button>
            </form>
        </div>
    </div>
</body>
</html>