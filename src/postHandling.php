<?php
session_start();
include_once 'DBConnectConfig.php';

if(  $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( isset($_POST['twitYourself']) ) {
        $conn = DBConnectConfig::getDbConnection();
        $twit = $_POST['twitYourself'];
        $userId = $_SESSION['id'];
        $statement = $conn->prepare("INSERT INTO `twits` (twit, user_id) VALUES (?, ?)");
        $statement->bind_param('ss', $twit, $userId);
        if ($statement->execute() ) {
            header('Location: logedIn.php');
        } else { 
            echo "coś poszło nie tak z Twoim Twitkiem"; 
        }
    }
}

?>
