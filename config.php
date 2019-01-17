<?php
    date_default_timezone_set('Europe/Paris');
    $config = [

        // It's the ISO date-time format of the openning date. 
        // Example: for 14 january 2042at 18h30, type "2042-01-14T18:30:00Z"
        // "openningDate" =>  'YYYY-MM-DDTHH:MM:SSZ',
        "openningDate" => '2019-01-17T20:22:00Z',

        // Database config
        'dbHost'          => 'hostName',
        'dbName'          => 'databaseName',
        'dbUser'          => 'username',
        'dbPassword'      => 'mySuperSecretPassword'
    ]
?>