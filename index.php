<?php
    require_once 'config.php';
?>
<html>
<!DOCTYPE html>
<head>
        <link rel="stylesheet" href="./css/flipclock.css">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <h1>Shotgun in:</h1>
    <br>
    <div class="your-clock" style="text-align:center;"></div> 
    <p>This page will refresh itself when the shotgun is open. </p>
</body>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/flipclock.min.js"></script>
    <?php
        echo('
            <script>
                var currentDate  = new Date("'.date("Y-m-d\TH:i:s\Z").'");
                var openningDate = new Date("'.$config['openningDate'].'");
            </script>   
        ');
    ?>
    <script src="./js/index.js"></script>
</html>