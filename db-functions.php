<?php
$mySQLConnection = new PDO(                                                     //Connecting to SQL server
    'mysql:host=127.0.0.1;dbname=gaulois;charset=utf8',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);   