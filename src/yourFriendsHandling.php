<?php
session_start();

// obsługa wysyłania wiadomości użytkownik 2 użytkownik
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( isset($_POST['sendMessage']) && isset($_POST['chooseFriend']) ) {
        $senderId = $_SESSION['id'];
        $receiverId = $_POST['chooseFriend'];
        // nie muszę sprawdzać czy $receiverId jest wśród znajomych $sendera bo z założenia
        // przycisk wyślij w logedIn.php pozwala tylko na wysłanie do swoich znajomych
        echo "
            <html>
            <head>
                <link href='CSS/styleShit.css' rel='stylesheet' type='text/css'/>
            </head>
            <body>
                <form method='POST' action=''>
                    <textarea name='message2friend' id='message2friend' class='textArea' placeholder='Wpisz mnie'></textarea>

                    </textarea>
                    <br>
                    <input type='submit' value='wyślij mnie'>
                </form>
            </body>
            </html>
        ";
        
    } else if ( isset($_POST['message2friend']) ){
        echo $_POST['message2friend'];
    }
} // koniec if $_SERVER['REQUEST_METHOD']

