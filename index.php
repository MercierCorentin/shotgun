<?php
    require_once './resources/config.php';

    $current_time_string    = date("Y-m-d\TH:i:s");
    $current_time 	        = strtotime($current_time_string);
    $shotgun_ended          = false;

    if($config['closeOnDate']){
        $closing_time 	= strtotime(substr($config['closingDate'],0,-1));
        if($current_time >= $closing_time){
            $shotgun_ended = true;
        }
    }
?>
<html>
<!DOCTYPE html>
<head>
        <link rel="stylesheet" href="./resources/flipclock/flipclock.css">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="./resources/css/index.css">
</head>
<body>

<?php
    if(!$shotgun_ended){
        echo('
    <h1>Shotgun in:</h1>
    <br>
    <div class="your-clock" style="text-align:center;"></div> 
    <p>This page will refresh itself when the shotgun is open. </p>
    <script src="./resources/js/jquery.min.js"></script>
    <script src="./resources/flipclock/flipclock.min.js"></script>
    <script>
        var currentDate  = new Date("'.$current_time_string."Z".'");
        var openningDate = new Date("'.$config['openningDate'].'");
    </script>   
    <script src="./resources/js/index.js"></script>
            ');
    }else{
        echo('
    <h1>Sorry, shotgun is over</h1>
    <br>
    <p>If you tried, you\'ll received an email soon. </p>');
    }
?>

</body>

</html>