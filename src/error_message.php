<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            echo $_SESSION['error_message'];
            unset ($_SESSION['error_message']);
        ?>
        
    </body>
</html>