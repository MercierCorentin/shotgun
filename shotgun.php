<?php
    // Start session to store input field name
    session_start();

    // Get useful functions
    require_once('functions.php');
    
    // Check if shotgun opened
    if(!check_time()){
        header('Location: index.php');
        exit();
    }

    // Generate login input name to prevent CSRF (Cross Site Request Forgery)
    $generated_name = name_gen();
    $_SESSION['generated_name'] = $generated_name;

    // Display errors if any
    $error_array = isset($_SESSION['error_array'])? $_SESSION['error_array'] : array();
    
    display_errors($error_array);
    
    $_SESSION['error_array'] = array();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shotgun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="./treatments/insert.php" method="post" id="fuck">
        <!-- display login input with generated name -->
        <br>
        <?php
            echo('
            <label for="'.$generated_name.'">Login:</label>
            <br>
            <input type="text" name="'.$generated_name.'" required>
            ');
        ?>
        <br>
        <br>
        <input type="submit" value="Shotgun!">
    </form>
</body>
</html>
