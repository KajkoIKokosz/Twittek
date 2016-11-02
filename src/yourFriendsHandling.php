<?php
session_start();
include_once './DBConnectConfig.php';

// obsługa wysyłania wiadomości użytkownik 2 użytkownik
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( isset($_POST['sendMessage']) && isset($_POST['chooseFriend']) ) {
        $senderId = $_SESSION['id'];
        $receiverId = $_POST['chooseFriend'];
        $_SESSION['reveiverId'] = $receiverId;
        $conn = DBConnectConfig::getDbConnection();
        $sql = "SELECT username FROM users WHERE id = $receiverId";
        $result = $conn->query($sql);
        
        if ( $result->num_rows == 1 ) {
            $row = $result->fetch_assoc();
            $receiverName = $row['username'];
        } else {
            echo $conn->error;
        }
        $conn->close();
        $conn = null;
        //echo $receiverName;
        // nie muszę sprawdzać czy $receiverId jest wśród znajomych $sendera bo z założenia
        // przycisk wyślij w logedIn.php pozwala tylko na wysłanie do swoich znajomych
        echo "
            <html>
            <head>
                <link href='CSS/styleShit.css' rel='stylesheet' type='text/css'/>
            </head>
            <body>
                <form method='POST' action=''>
                    <textarea name='message2friend' id='message2friend' class='textArea' placeholder='Wpisz wiadomość do ".$receiverName."'></textarea>
                    <br>
                    <input type='submit' value='wyślij mnie'>
                    <a href='logedIn.php'>
                        <button>Wróć</buttn>
                    </a>
                </form>
            </body>
            </html>
        ";
    }
    $senderId = $_SESSION['id'];
    $receiverId = $_SESSION['reveiverId'];
    if ( isset($_POST['message2friend']) ){
        $message2friend = $_POST['message2friend'];
        $conn = DBConnectConfig::getDbConnection();
        $statement = $conn->prepare("INSERT INTO `messages` "
              . "(sender_id, receiver_id, sender_id_bckp, receiver_id_bckp, message) "
              . "VALUES (?, ?, ?, ?, ?)");
        $statement->bind_param('iiiis', $senderId, $receiverId, $senderId, $receiverId, $message2friend);
        if ( $statement->execute() ) {
            header('Location: logedIn.php');
        }
        
    }
} // koniec if $_SERVER['REQUEST_METHOD']

