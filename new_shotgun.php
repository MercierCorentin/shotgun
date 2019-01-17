<?php
    // required to get name attribute value of the login input
    // required to send error_array;
    session_start();

    // Useful for fonctions: check_time, check_login, sql_connect and sql_query
    require_once('functions.php');


    if(!check_time()){
        header('Location: index.php');
        exit();
    }

    $error_array    = array();
    
    // Get login value
    $login          = $_POST[$_SESSION['generated_name']];

    // Treatment and check
    $login          = mb_strtolower($login);
    $login          = trim($login);
    $error_array    = check_login($login,$error_array);

    if(empty($error_array)){ // If there is no error

        // Connection to database
        $db = sql_connect();
        
        // insert into database NULL => id, :login => login, NULL => current_timestamp
        $query = "INSERT INTO ".$config['shotgunTable']." VALUES(NULL, :login, NULL) ";
        $params = array(
            'login' => $login,
        );
        $result = sql_query($query,$params,false);
      
        // If error
        if( isset($result[0]) && $result[0] == "error"){
            // If MySQL "Duplicate entry" error
            if($result[2] == 1062){ 
                array_push($error_array, "Erreur, ce login a déjà été entré.");
                $_SESSION['error_array'] = $error_array;
                header("Location: ".$_SERVER['HTTP_REFERER']);
            }
        }else{
            session_destroy();
        }
    }else{
        //Get back to enter_login.php with error messages 
        $_SESSION['error_array'] = $error_array;
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shotgun terminé</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Shotgun Terminé</h1>
    <p>Merci à toi d'avoir participé au shotgun, tu seras bientôt informé par mail de la réussite ou non du shotgun ;) </p>

    </form>
</body>
</html>