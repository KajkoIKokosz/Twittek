<?php
    session_start();
    $username = $_SESSION['username'];
    session_unset();
?>

<html>
    <body>
        <h3>Trzymaj sie. Będziemy za Tobą tęstnić <?=$username?>.</h3>
    </body>
</html>

