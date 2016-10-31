<?php
session_start();
include_once 'C:\xampp\htdocs\Twittek\src\User.php';
include_once 'C:\xampp\htdocs\Twittek\src\DBConnectConfig.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
     header('Location: ../index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if( isset($_POST['backLoging']) ) {
        header('Location: ../index.php');
    }
    
    if( isset($_POST['createCount']) ) {   
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['passwd'];
        
        $conn = DBConnectConfig::getDbConnection();
        $sqlCzyMailIstnieje = "SELECT email FROM users WHERE email = '$email'";
        $result = $conn->query($sqlCzyMailIstnieje);
        if( $result->num_rows > 0 ) {
            $_SESSION['error_message'] = '
                    <span>użytkownik o podanym adresie email istnieje</span>
                    <p>
                    <a href="../index.php">
                        <button name="backLog">Powrót do logowania</button>
                    </a>';
            header('Location: error_message.php');
        } else {
            $user = new User();
            $user->setUsername($username)
                 ->setEmail($email)
                 ->setPassword($password)
                 ->saveToDB($conn);

            if( $user->getId() != -1 ){
                $_SESSION['username'] = $user->getUsername();
                header('Location: logedIn.php');
            } else {
                echo "Coś poszło nie tak";
            }
        }
    } else if ( isset($_POST['twitaj']) ) {
        
    }
} // $_SERVER['REQUEST_METHOD']

// 1. Jeżeli hasło zapisane jest w bazie danych, należy zwrócić odpowiedni komunikat


?>


