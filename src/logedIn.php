<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
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
                
            </div>
            <div id='center'>
                <div id='zaTwituj'>
                    <form>
                        <label>Twitnij se:<br>
                            <textarea name="twityourself" class='textArea' placeholder="Tu można twitować i robić różne inne rzeczy"></textarea>
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
