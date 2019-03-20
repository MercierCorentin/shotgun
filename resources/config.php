<?php

    // Chose your own timezone
    date_default_timezone_set('Europe/Paris');

    $config = [

        
        // It's the ISO date-time format of the openning date. 
        // Example: for 14 january 2042at 18h30, type "2042-01-14T18:30:00Z"
        "openningDate"          => 'YYYY-MM-DDTHH:MM:SSZ',

        // Close configuration
        "closeOnDate"           => false, // Set it on true if you want a close date 
        "closingDate"           => 'YYYY-MM-DDTHH:MM:SSZ',
        "limitNumber"           => 255,

        // Database config
        'dbHost'                => 'localhost',
        'dbName'                => 'shotgun',
        'dbUser'                => 'shotgun',
        'dbPassword'            => 'test',

        // Table config
        'shotgunTable'          => 'shotgun',

        ###########################################################
        // Specific to University of Technology of Compiègne config
        ###########################################################
        'gingerApiKey'          => "my_key",

        ###### Mail Config #####
        ########################

        // Be careful to Follow the following syntaxe
        // NameOfOrganisation <blabla@domain.domainExtension>
        "mailFromHeader"        => "Cabaret <cabaret@assos.utc.fr>",
        
        // Mail sended when Success
        "mailSuccessObject"     => "Cabaret A18 - Votre Résultat",
        "mailSuccessContent"    => "Bonjour <br/>
                                    Tu as réussi le shotgun de ce super évènement. <br/> 
                                    A plus.",
        // Mail sended when Fail
        "sendFailMail"          => true, //Set false to disable 
        "mailFailObject"        => "Cabaret A18 - Votre Résultat",
        "mailFailContent"       => "Bonjour, <br/>
                                    Ce shotgun tu l'as raté,
                                    L'agilité et la rapidité tu n'as pas eu ;) <br/>
                                    A plus, 
                                    La team info."

    ];
?>
