<?php
    session_start();
    
    if( isset($_SESSION['email']) ) {
        header('Location: src/logedIn.php');
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="CSS/styleShit.css" rel="stylesheet" type="text/css"/>
        <script src="JS/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="JS/logowanie.js" type="text/javascript"></script>
    </head>
    
    <body>
        <div class='logowanie'>
            <form name='logIn' action='src/formHandling.php' method='POST'>
                <!--w przypadku wciśnięcia button '#goToCountForm' wyłączona zostanie klasa hiddenLoging, która ukrywa obiekt-->
                <!-- elementy klasy hiddenLoging początkowo są nie widoczne - stają sie widoczne dopiero po kliknięciu buttona
                '#goToCountForm'-->
                <input type='text' name='username' id='username' class='logowanie hiddenLoging fieldNotEmpty' placeholder="username"  >
                <p>
                <input type='text' name='email' id='email' placeholder="email" class='logowanie fieldNotEmpty'>
                <p>
                <input type='password' name='passwd' id='passwd' class='logowanie fieldNotEmpty' placeholder="hasło">
                <p>
                <input type='password' name='passwdRepeat' id="passwdRepeat" class='logowanie hiddenLoging fieldNotEmpty' placeholder="powtórz">
                <p>
                <input type='submit' name='twitaj' id='twitaj' class='logowanie' value='Twitaj' ><p>
                <input type='submit' name="createCount" id='createCount' class='logowanie hiddenLoging' value='Załóż Twitka'><p>
                <span id='lub' class='logowanie'>lub</span>
                <p>
                <button name='goToCountForm' id='goToCountForm' class='logowanie' value='goToCountForm' >Załóż Twitka</button>
                <a href='index.html'>
                    <button name='backLoging' id='backLoging' class='logowanie hiddenLoging' value='backLogging'>Wróć</button>
                </a>
            </form>    
           <div id='formComment'></div>
        </div>
        
        
        
        
       
    </body>
</html>
