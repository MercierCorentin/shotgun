<?php
    date_default_timezone_set('Europe/Paris');
    $config = [

        
        // It's the ISO date-time format of the openning date. 
        // Example: for 14 january 2042at 18h30, type "2042-01-14T18:30:00Z"
        "openningDate" =>  'YYYY-MM-DDTHH:MM:SSZ',

        // Database config
        'dbHost'          => 'dbHhost',
        'dbName'          => 'dbName',
        'dbUser'          => 'dbUser',
        'dbPassword'      => 'mySuperSecretPassword',

        // Table config
        'shotgunTable'   => 'myTable'

    ]
?>