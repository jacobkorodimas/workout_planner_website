<?php
    $host = 'localhost';
    $user = 'jacob';
    $password = '1234';
    $dbname = 'workoutdb';

    //Set DSN
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    // Options
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    //PDO instance
    $pdo = new PDO($dsn, $user, $password, $options);
?>