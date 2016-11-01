<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Twit yourself</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../CSS/styleShit.css" rel="stylesheet" type="text/css"/>
    </head>
    <body> 
        <div id='container'>
            <div id='logedInH'>
                <div style='float: left; width: 800px;'>
                    <?php 
                        echo "T-witaj ".$_SESSION['username']; 
                    ?>
                </div>
                <div style='float: left;'>
                    <form action="logout.php">
                        <button name='logout'class='myButton'>Wyloguj</button>
                    </form>
                </div>
                <div style='clear: both;'></div>
                
            </div>
            <div id='left'>
                <h3>Znajdź znajomych:</h3>
                <form method='POST' action='invitationHandling.php'>
                    <?php
                        include_once './DBConnectConfig.php';
                        $conn = DBConnectConfig::getDbConnection();
                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);
                        if ( $result->num_rows > 0 ) {
                            echo "<select name='chooseFriend'>";
                            foreach ($result as $res) {
                                if ( $res['id'] != $_SESSION['id'] ) {
                                    echo  "<option value={$res['id']}>{$res['username']}</option>";
                                }
                            }
                            echo "</select>";
                        }
                    ?>
                    <p>
                    <input type='submit' value='Wyślij zaproszeie'>
                </form>
                <div id='message'>
                    <?php
                        if( isset($_SESSION['report']) ) {
                            echo $_SESSION['report'];
                           // unset($_SESSION['report']);
                        }
                    ?>
                </div>
            </div>
            <div id='center'>
                <div id='zaTwituj'>
                    <form action='postHandling.php' method='POST'>
                        <label><h3>Twitnij se:<h3>
                            <textarea name="twitYourself" class='textArea' placeholder="Tu można twitować i robić różne inne rzeczy"></textarea>
                        </label>
                        <br>
                        <input type='submit' value='Twitnij se' class='myButton'>
                    </form>
                </div>
                <div id='Twity'>
                    
                </div>
                
            </div> 
            <div id='right'>
                
            </div> 
            <div id='foohter'>
                
            </div> 
         
        </div>
        
    </body>
</html>
